<?php

namespace App\Http\Controllers;

use App\Model\Data;
use App\Model\AsetPoint;
use Illuminate\Http\Request;
use App\Model\LocalAsetPoint;
use App\Model\JalanLingkungan;
use App\Model\JalanLingkunganCoord;
use App\Model\LocalJalanLingkungan;
use Yajra\DataTables\Facades\DataTables;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

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
        $list = LocalAsetPoint::all();
        return view('contents.front.data.index', [
            'title' => 'Data',
            'list' => $list,
        ]);
    }
    public function dataTanah(Request $request)
    {
        $list = LocalAsetPoint::with(['kecamatan', 'kelurahan'])->get();
        return DataTables::of($list)
        ->addIndexColumn()
        ->make(true);
    }

    public function show($id)
    {
        $list = LocalAsetPoint::with('kecamatan','kelurahan')->find($id);
        return view('contents.front.data.detail', [
            'title' => 'Data Tanah | Detail',
            'list' => $list,
        ]);
    }


    // public function show(Request $request, $id)
    // {
    //     $list = LocalAsetPoint::with('kec', 'kel')->findOrFail($id);

    //     if (! $request->ajax()) {
    //         return view('contents.front.data.detail', compact('list'));
    //     }

    //     return response()->json(['data' => $l]);
    // }

    public function dataJalan()
    {
        return view('contents.front.data.data-jalan', [
            'title' => 'Data Jalan'
        ]);
    }
    public function dataJalans(Request $request)
    {
        $list = LocalJalanLingkungan::with(['kec', 'kel'])->get();

        return DataTables::of($list)
            ->addIndexColumn()
            ->make();
    }
    public function showJalan($id)
    {
        $list = LocalJalanLingkungan::with('kec','kel')->find($id);
        return view('contents.front.data.detail-jalan', [
            'title' => 'Data Jalan | Detail',
            'list' => $list,
        ]);
    }
}
