<?php

namespace App\Http\Controllers;

use App\Model\Data;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BerandaController extends Controller
{
    public function index()
    {
        // return view('contents.front.home._home');
        return view('contents.front.home.home', [
            'title' => 'Sistem Informasi Pertanahan Surakarta'
        ]);
    }

    public function peta()
    {
        // return view('contents.front.home.home');
        return view('contents.front.peta.index', [
            'title' => 'Peta'
        ]);
    }

    public function data()
    {
        // return view('contents.front.home.home');
        return view('contents.front.data.index', [
            'title' => 'Data'
        ]);
    }

    public function data_isi(Request $request)
    {
        $data = Data::select('id', 'FID', 'Nama_Jalan', 'Kategori');

        return DataTables::of($data)->make(true);
    }

    public function data_store(Request $request)
    {
        // Validasi data formulir
        $request->validate([
            'FID' => 'required|array',
            'FID.*' => 'required|string',
            'Nama_Jalan' => 'required|array',
            'Nama_Jalan.*' => 'required|string',
            'Kategori' => 'required|array',
            'Kategori.*' => 'required|string',
        ]);

        // Proses penyimpanan data
        foreach ($request->FID as $key => $fid) {
            Data::create([
                'FID' => $fid,
                'Nama_Jalan' => $request->Nama_Jalan[$key],
                'Kategori' => $request->Kategori[$key],
            ]);
        }

        // Redirect atau response lainnya sesuai kebutuhan
        // return redirect()->route('data-isi')->with('success', 'Data berhasil disimpan.');
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    public function truncateTable()
    {
        // Truncate tabel menggunakan metode truncate pada model
        Data::truncate();

        // Redirect atau response lainnya sesuai kebutuhan
        return redirect()->back()->with('success', 'Tabel berhasil dikosongkan.');
    }
}
