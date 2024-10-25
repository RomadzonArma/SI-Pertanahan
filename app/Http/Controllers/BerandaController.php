<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;

use App\Model\Data;
use App\Model\JalanLingkungan;
use App\Model\JalanLingkunganCoord;
use App\Model\LocalJalanLingkungan;
use App\Model\Ref\RefKecamatanSijali;
use App\Model\Ref\RefKelurahanSijali;
use App\Model\AsetPoint;
use App\Model\LocalAsetPoint;
use App\Model\Ref\RefKecamatanSinta;
use App\Model\Ref\RefKelurahanSinta;

class BerandaController extends Controller
{
    public function index()
    {

        return view('contents.front.home.home', [
            'title' => 'Sistem Informasi Pemakaman Surakarta',
        ]);
    }

    public function peta()
    {
        // return view('contents.front.home.home');
        return view('contents.front.peta.index', [
            'title' => 'Peta'
        ]);
    }

    // data tanah
    public function data()
    {
        $ref_kec = RefKecamatanSinta::all();
        $ref_kel = RefKelurahanSinta::all();
        return view('contents.front.data.index', [
            'title' => 'Data Tanah',
            'ref_kec' => $ref_kec,
            'ref_kel' => $ref_kel
        ]);
    }

    public function dataTanah(Request $request)
    {
        $kecId = $request->input('kode_kec');
        $kelId = $request->input('kode_kel');

        $list = LocalAsetPoint::with(['kec', 'kel'])
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
            ->make(true);
    }




}
