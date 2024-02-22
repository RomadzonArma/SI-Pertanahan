<?php

namespace App\Http\Controllers;

use App\Model\AsetPoint;
use App\Model\LocalAsetPoint;
use App\Model\Pertanahan\PertanahanFoto;
use App\Model\Pertanahan\PertanahanUpdate;
use App\Model\Ref\RefKecamatanSinta;
use App\Model\Ref\RefKelurahanSinta;
use App\Model\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class PertanahanController extends Controller
{
    public function index(Request $request)
    {
        $ref_kec = RefKecamatanSinta::all();
        $ref_kel = RefKelurahanSinta::all();
        return view('contents.pertanahan.list', [
            'title' => 'Pertanahan',
            'ref_kec' => $ref_kec,
            'ref_kel' => $ref_kel
        ]);
    }

    public function data(Request $request)
    {
        $kecId = $request->input('kode_kec');
        $kelId = $request->input('kode_kel');

        $list = LocalAsetPoint::with(['kec', 'kel'])
            ->when($kecId, function ($query) use ($kecId) {
                if ($kecId != '') return $query->where('kec_id', $kecId);
            })
            ->when($kelId, function ($query) use ($kelId) {
                if ($kelId != '') return $query->where('kel_id', $kelId);
            })
            ->get();
        $transformed = $list->map(function ($item, $key) {
            $item->nama_kecamatan = @$item->kec->nama ?: null;
            $item->nama_kelurahan = @$item->kel->nama ?: null;
            return $item;
        });

        return DataTables::of($transformed)
            ->addIndexColumn()
            ->make();
    }

    public function update(Request $request)
    {
        try {
            $tanah = LocalAsetPoint::with(['data_update', 'data_foto'])->findOrFail($request->id);
            $data_update = $tanah->data_update;
            $data_foto = $tanah->data_foto;
            return view('contents.pertanahan.update', [
                'title' => 'Update Pertanahan',
                'tanah' => $tanah,
                'data_update' => $data_update,
                'data_foto' => $data_foto
            ]);
        } catch (\Throwable $e) {
            return redirect()->route('pertanahan');
        }
    }

    public function store(Request $request)
    {
        try {
            PertanahanUpdate::updateOrCreate(
                ['aset_point_id' => $request->aset_point_id],
                [
                    'nomor_sertifikat' => $request->nomor_sertifikat,
                    'nama_sertifikat' => $request->nama_sertifikat,
                    'penggunaan_saat_ini' => $request->penggunaan_saat_ini
                ]
            );

            $request->validate([
                'sertifikat' => 'file|max:2048|mimes:pdf,jpeg,png,jpg,gif',
            ]);

            if ($request->hasFile('sertifikat')) {
                $file = $request->file('sertifikat');
                $aset_point_id = $request->aset_point_id;

                $destination_path = 'uploads/tanah/' . $aset_point_id . '/sertifikat';
                if (!file_exists(public_path($destination_path))) {
                    mkdir(public_path($destination_path), 0777, true);
                }

                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path($destination_path), $filename);
                $file_path = $destination_path . '/' . $filename;

                PertanahanUpdate::updateOrCreate(
                    ['aset_point_id' => $request->aset_point_id],
                    [
                        'sertifikat_file' => $file_path
                    ]
                );
            }

            // if ($request->hasFile('foto')) {
            //     $fotoPaths = [];

            //     foreach ($request->file('foto') as $foto) {
            //         $destinationPath = 'uploads/tanah/' . $request->aset_point_id . '/foto';

            //         if (!file_exists(public_path($destinationPath))) {
            //             mkdir(public_path($destinationPath), 0777, true);
            //         }

            //         $filename = time() . '_' . $foto->getClientOriginalName();
            //         $foto->move(public_path($destinationPath), $filename);
            //         $file_path = $destinationPath . '/' . $filename;
            //         $fotoPaths[] = $file_path;
            //         PertanahanFoto::create([
            //             'aset_point_id' => $request->aset_point_id,
            //             'foto_file' => $file_path,
            //         ]);
            //     }
            // }
            return response()->json(['status' => true, 'msg' => 'Data tanah telah diperbarui'], 200);
        } catch (\Throwable $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function foto(Request $request)
    {
        try {
            $tanah = AsetPoint::on('mysql')->with(['data_foto'])->findOrFail($request->id);
            return response()->json(['status' => true, 'msg' => 'Data foto', 'data' => $tanah], 200);
        } catch (\Throwable $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function dataFoto(Request $request)
    {
        $list = PertanahanFoto::where('aset_point_id', $request->id)->get();
        $transformed = $list->map(function ($item, $key) {
            $item->image_url = asset($item->foto_file);
            return $item;
        });
        return DataTables::of($transformed)
            ->addIndexColumn()
            ->make(true);
    }

    public function storeFoto(Request $request)
    {
        try {
            $aset_point_id = $request->aset_point_id;
            $destination_path = 'uploads/tanah/' . $aset_point_id . '/foto';
            if (!file_exists(public_path($destination_path))) {
                mkdir(public_path($destination_path), 0777, true);
            }

            $request->validate([
                'file_foto.*' => 'file|max:2048|mimes:jpeg,png,jpg,gif',
            ]);

            if ($request->hasFile('file_foto')) {
                $files = $request->file('file_foto');
                foreach ($files as $file) {
                    // Sanitize the original file name
                    $originalName = $file->getClientOriginalName();
                    $safeName = $this->sanitizeFileName($originalName);

                    // Ensure the file name is unique
                    $filename = $this->makeFilenameUnique($safeName, $destination_path);

                    $file->move(public_path($destination_path), $filename);
                    $file_path = $destination_path . '/' . $filename;

                    PertanahanFoto::create([
                        'aset_point_id' => $aset_point_id,
                        'foto_file' => $file_path
                    ]);
                }
            }

            return response()->json(['status' => true, 'msg' => 'Foto telah diupload'], 200);
        } catch (\Throwable $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function deleteFoto(Request $request)
    {
        try {
            $id = $request->id;
            $model = PertanahanFoto::find($id);
            if ($model) {
                $model->delete();
                return response()->json(['status' => true, 'msg' => 'Foto telah dihapus'], 200);
            } else {
                return response()->json(['status' => false, 'msg' => 'Foto tidak ditemukan'], 200);
            }
        } catch (\Throwable $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    protected function sanitizeFileName($fileName) {
        $fileName = mb_ereg_replace("\s", '_', $fileName);
        $fileName = mb_ereg_replace("([^\w\d\-_~,;\[\]\(\).])", '', $fileName);
        $fileName = mb_ereg_replace("([\.]{2,})", '', $fileName);
        return $fileName;
    }

    protected function makeFilenameUnique($fileName, $destinationPath) {
        $originalName = pathinfo($fileName, PATHINFO_FILENAME);
        $extension = pathinfo($fileName, PATHINFO_EXTENSION);
        $counter = 1;
        $newFileName = $fileName;

        while (file_exists(public_path($destinationPath) . '/' . $newFileName)) {
            $newFileName = $originalName . '_' . $counter . '.' . $extension;
            $counter++;
        }

        return $newFileName;
    }
}
