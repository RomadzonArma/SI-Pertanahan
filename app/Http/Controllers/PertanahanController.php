<?php

namespace App\Http\Controllers;

use App\Model\AsetPoint;
use App\Model\Pertanahan\PertanahanUpdate;
use App\Model\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class PertanahanController extends Controller
{
    public function index(Request $request)
    {
        // $roles = Role::all();
        return view('contents.pertanahan.list', [
            'title' => 'Pertanahan',
            // 'roles' => $roles,
        ]);
    }

    public function data(Request $request)
    {
        $list = AsetPoint::on('mysql')->with(['data_update', 'data_foto'])->select([
            'id',
            'kec_id',
            'kel_id',
            'luas',
            'tgl_sertif',
            'no_sertif',
            'no_hp',
            'pengg_seka',
            'pengg_sertif',
            'file_sertif',
            'klasifikasi',
            'lat',
            'lng',
            'foto',
            'foto_survei',
            'is_active',
            'tampil_publik',
        ]);

        return DataTables::of($list)
            ->addIndexColumn()
            ->make(true);
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

            return response()->json(['status' => true, 'msg' => 'Data tanah telah diperbarui'], 200);
        } catch (\Throwable $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }
}
