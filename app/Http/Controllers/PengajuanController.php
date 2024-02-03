<?php

namespace App\Http\Controllers;

use App\Model\Pengajuan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PengajuanController extends Controller
{
    public function index(Request $request)
    {
        return view('contents.pengajuan.list', [
            'title' => 'Pengajuan',
        ]);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        // return $user;
        return view('contents.pengajuan.create', [
            'title' => 'Tambah Pengajuan',
            'user'  => $user,
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'nama'              => 'required',
            'alamat'            => 'required',
            'pekerjaan'         => 'required',
            'lokasi'            => 'required',
            'tanggal_pengajuan' => 'required',
            'selaku'            => 'required',
            'kondisi_lapangan'  => 'required',
        ]);

        try {

            $data = new Pengajuan();
            $data->nama              = $request->nama;
            $data->alamat            = $request->alamat;
            $data->pekerjaan         = $request->pekerjaan;
            $data->lokasi            = $request->lokasi;
            $data->tanggal_pengajuan = $request->tanggal_pengajuan;
            $data->selaku            = $request->selaku;
            $data->kondisi_lapangan  = $request->kondisi_lapangan;
            $data->status            = '100';
            $data->created_by        = $user->id;

            $data->save();

            // if ($request->hasFile('file')) {
            //     $allowedfileExtension = ['pdf', 'jpg', 'png'];
            //     $file = $request->file('file');
            //     $filename   = $file->getClientOriginalName();
            //     $extension  = $file->getClientOriginalExtension();
            //     $check      = in_array($extension, $allowedfileExtension);

            //     if ($check) {
            //         $name       = date('Y-m-d') . '' . Str::slug($filename) . '' . rand(1, 999) . '.' . $extension;

            //         $add_path   = 'bukti/' . Session::get('code_role') . '/' . Auth::user()->sp_id . '/Sertifikasi-Kompetensi/' . $pelaksanaan_sertifikasi_kompetensi_id . '/';
            //         $path       = storage_path() . '/app/public/' . $add_path;
            //         if (!File::isDirectory($path)) {
            //             File::makeDirectory($path, 0775, true, true);
            //         }
            //         if ($file->move($path, $name)) {
            //             $path_dokumen = $add_path . $name;
            //             // $path_dokumen = $add_path .  $file->hashName(); Bisa Juga menggunakan ini
            //             $pelaksanaan_sertifikasi_kompetensi->path_bukti                 = $path_dokumen;
            //             $pelaksanaan_sertifikasi_kompetensi->path_bukti_original_name   = $filename;
            //             $pelaksanaan_sertifikasi_kompetensi->save();
            //         }
            //     }
            // }

            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function data(Request $request)
    {
        $list = Pengajuan::where('deleted_at', NULL)->get();

        return DataTables::of($list)
            ->addIndexColumn()
            ->make(true);
    }

    public function delete(Request $request)
    {
        try {
            $pengajuan = Pengajuan::find($request->id);

            $pengajuan->delete();

            if ($pengajuan->trashed()) {
                return response()->json(['status' => true], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function edit(Request $request, $id)
    {
        $edit = Pengajuan::first();
        return view('contents.pengajuan.edit', [
            'title' => 'Edit Pengajuan',
            'edit'  => $edit
        ]);
    }

    public function update(Request $request)
    {
        return "oke";
    }
}
