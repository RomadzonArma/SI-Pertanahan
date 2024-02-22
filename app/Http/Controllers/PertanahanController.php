<?php

namespace App\Http\Controllers;

use App\Model\AsetPoint;
use App\Model\LocalAsetPoint;
use App\Model\Pertanahan\PertanahanFoto;
use App\Model\Pertanahan\PertanahanUpdate;
use App\Model\Ref\RefKecamatanSijali;
use App\Model\Ref\RefKelurahanSijali;
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
        $ref_kec = RefKecamatanSijali::all();
        $ref_kel = RefKelurahanSijali::all();
        return view('contents.pertanahan.list', [
            'title' => 'Pertanahan',
            'ref_kec' => $ref_kec,
            'ref_kel' => $ref_kel
        ]);
    }

    public function data(Request $request) {
        $kecId = $request->input('kode_kec');
        $kelId = $request->input('kode_kel');

        $list = AsetPoint::on('mysql')->with(['kec', 'kel'])
            ->when($kecId, function($query) use ($kecId) {
                if($kecId!='') return $query->where('kec_id', $kecId);
            })
            ->when($kelId, function($query) use ($kelId) {
                if($kelId!='') return $query->where('kel_id', $kelId);
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
        $tanah = AsetPoint::on('mysql')->with(['data_update', 'data_foto'])->findOrFail($request->id);
        $data_update = $tanah->data_update;
        $data_foto = $tanah->data_foto;
        return view('contents.pertanahan.update', [
            'title' => 'Update Pertanahan',
            'tanah' => $tanah,
            'data_update' => $data_update,
            'data_foto' => $data_foto
        ]);
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

            if ($request->hasFile('foto')) {
                $fotoPaths = [];

                foreach ($request->file('foto') as $foto) {
                    $destinationPath = 'uploads/tanah/' . $request->aset_point_id . '/foto';

                    if (!file_exists(public_path($destinationPath))) {
                        mkdir(public_path($destinationPath), 0777, true);
                    }

                    $filename = time() . '_' . $foto->getClientOriginalName();
                    $foto->move(public_path($destinationPath), $filename);
                    $file_path = $destinationPath . '/' . $filename;
                    $fotoPaths[] = $file_path;
                    PertanahanFoto::create([
                        'aset_point_id' => $request->aset_point_id,
                        'foto_file' => $file_path,
                    ]);
                }
            }
            return response()->json(['status' => true, 'msg' => 'Data tanah telah diperbarui'], 200);
        } catch (\Throwable $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function deletePhoto($id)
    {
        try {
            $photo = PertanahanFoto::find($id);

            if (!$photo) {
                return response()->json(['status' => false, 'msg' => 'Photo not found'], 404);
            }

            // Get the file path from the database
            $filePath = $photo->foto_file;

            // Soft delete the photo by setting deleted_at timestamp
            $photo->delete();

            // Delete the physical file from storage
            Storage::delete($filePath);

            // Alternatively, you can force delete the photo (permanently delete it)
            // $photo->forceDelete();

            return back();
        } catch (\Throwable $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }
}
