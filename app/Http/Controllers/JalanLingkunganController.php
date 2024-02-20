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

use App\Model\LocalJalanLingkungan;
use App\Model\LocalJalanLingkunganCoord;
use App\Model\Ref\RefKecamatanSijali;
use App\Model\Ref\RefKelurahanSijali;
use App\Model\Jalan\JalanLingkunganUpdate;

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
        } catch (\Throwable $th) {
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
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }
}
