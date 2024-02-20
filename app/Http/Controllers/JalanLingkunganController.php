<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

use App\Model\LocalJalanLingkungan;
use App\Model\LocalJalanLingkunganCoord;
use App\Model\Ref\RefKecamatanSijali;
use App\Model\Ref\RefKelurahanSijali;
use App\Model\Jalan\JalanLingkunganUpdate;
use App\Model\Jalan\JalanLingkunganFoto;

class JalanLingkunganController extends Controller
{
    public function index(Request $request) {
        $ref_kec = RefKecamatanSijali::all();
        $ref_kel = RefKelurahanSijali::all();
        return view('contents.jalan-lingkungan.list', [
            'title' => 'Jalan Lingkungan',
            'ref_kec' => $ref_kec,
            'ref_kel' => $ref_kel
        ]);
    }

    public function data(Request $request) {
        $kecId = $request->input('kode_kec');
        $kelId = $request->input('kode_kel');

        $list = LocalJalanLingkungan::with(['kec', 'kel'])
            ->when($kecId, function($query) use ($kecId) {
                if($kecId!='') return $query->where('Kecamatan', $kecId);
            })
            ->when($kelId, function($query) use ($kelId) {
                if($kelId!='') return $query->where('Kelurahan', $kelId);
            })
            ->get();
        $transformed = $list->map(function ($item, $key) {
            $item->nama_kecamatan = @$item->kec->nama ?: null;
            $item->nama_kelurahan = @$item->kel->nama ?: null;
            return $item;
        });

        return DataTables::of($transformed)
            ->addIndexColumn()
            ->make(true);
    }

    // update data
    public function update(Request $request) {
        try {
            $jalan = LocalJalanLingkungan::with(['data_update','data_foto'])->findOrFail($request->id);
            $data_update = $jalan->data_update;
            $data_foto = $jalan->data_foto;
            return view('contents.jalan-lingkungan.update', [
                'title' => 'Update Jalan Lingkungan',
                'jalan' => $jalan,
                'data_update' => $data_update,
                'data_foto' => $data_foto
            ]);
        } catch (\Throwable $e) {
            return redirect()->route('jalan-lingkungan');
        }
    }

    public function store(Request $request) {
        try {
            JalanLingkunganUpdate::updateOrCreate(
                ['jalan_lingkungan_id' => $request->jalan_lingkungan_id],
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
                $jalan_lingkungan_id = $request->jalan_lingkungan_id;
                
                $destination_path = 'uploads/jalan/' . $jalan_lingkungan_id . '/sertifikat';
                if (!file_exists(public_path($destination_path))) {
                    mkdir(public_path($destination_path), 0777, true);
                }
                
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path($destination_path), $filename);
                $file_path = $destination_path . '/' . $filename;

                JalanLingkunganUpdate::updateOrCreate(
                    ['jalan_lingkungan_id' => $request->jalan_lingkungan_id],
                    [
                        'sertifikat_file' => $file_path
                    ]
                );
            }
            
            return response()->json(['status' => true, 'msg'=> 'Data jalan telah diperbarui'], 200);
        } catch (\Throwable $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    // foto
    public function foto(Request $request) {
        try {
            $jalan = LocalJalanLingkungan::with(['data_foto'])->findOrFail($request->id);
            return response()->json(['status' => true, 'msg'=> 'Data foto', 'data'=>$jalan], 200);
        } catch (\Throwable $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function dataFoto(Request $request) {
        $list = JalanLingkunganFoto::where('jalan_lingkungan_id', $request->id)->get();
        $transformed = $list->map(function ($item, $key) {
            $item->image_url = asset($item->foto_file);
            return $item;
        });
        return DataTables::of($transformed)
            ->addIndexColumn()
            ->make(true);
    }

    public function storeFoto(Request $request) {
        try {
            $jalan_lingkungan_id = $request->jalan_lingkungan_id;
            $destination_path = 'uploads/jalan/' . $jalan_lingkungan_id . '/foto';
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

                    JalanLingkunganFoto::create([
                        'jalan_lingkungan_id' => $jalan_lingkungan_id,
                        'foto_file' => $file_path
                    ]);
                }
            }
            
            return response()->json(['status' => true, 'msg'=> 'Foto telah diupload'], 200);
        } catch (\Throwable $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function deleteFoto(Request $request) {
        try {
            $id = $request->id;
            $model = JalanLingkunganFoto::find($id);
            if ($model) {
                $model->delete();
                return response()->json(['status' => true, 'msg'=> 'Foto telah dihapus'], 200);
            } else {
                return response()->json(['status' => false, 'msg'=> 'Foto tidak ditemukan'], 200);
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
