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

    // data tanah
    public function data()
    {
        $ref_kec = RefKecamatanSinta::all();
        $ref_kel = RefKelurahanSinta::all();
        return view('contents.front.data.index', [
            'title' => 'Data',
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

    public function show($id)
    {
        try {
            $list = LocalAsetPoint::with('kec','kel')->findOrFail($id);
            return view('contents.front.data.detail', [
                'title' => 'Data Tanah | Detail',
                'list' => $list,
            ]);
        } catch (\Throwable $e) {
            return redirect()->route('data-tanah');
        }
    }
    // END data tanah

    // data jalan
    public function dataJalan()
    {
        $ref_kec = RefKecamatanSijali::all();
        $ref_kel = RefKelurahanSijali::all();
        return view('contents.front.data.data-jalan', [
            'title' => 'Data Jalan',
            'ref_kec' => $ref_kec,
            'ref_kel' => $ref_kel
        ]);
    }

    public function dataJalans(Request $request)
    {
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
    
    public function showJalan($id)
    {
        try {
            $list = LocalJalanLingkungan::with('kec', 'kel')
            ->select(
                'id', 'FID', 'Kecamatan', 'Kelurahan', 'No', 'RW', 'Nama_Jalan', 'Usulan_Nama_Jalan',
                'Kategori','Jenis_Perk','Pjg_Jln','Lbr_Perk','L_Bh_Kn','L_Bh_Kr',
                DB::raw("CASE WHEN Jenis_Perk = 'aspal' THEN Pjg_Aspal
                        WHEN Jenis_Perk = 'cor' THEN Pjg_Cor
                        WHEN Jenis_Perk = 'krkl' THEN Pjg_Krkl
                        WHEN Jenis_Perk = 'paving' THEN Pjg_Pav
                        WHEN Jenis_Perk = 'tanah' THEN Pjg_Tnh
                        ELSE NULL END AS Panjang_Perkerasan"),
                'Kond_Baik', 'Kond_Sed', 'Kond_RR', 'Lok_RR', 'Kond_RB', 'Lok_RB', 'Lbr_Drn_Kr', 'Lbr_Drn_Kn',
                'Pjg_Drn_Kn', 'Pjg_Drn_Kr', 'Dlm_Drn_Kr', 'Dlm_Drn_Kn', 'Tip_Drn_Kr', 'Tip_Drn_Kn', 'Knd_Drn_Kr',
                'Knd_Drn_Kn', 'Jen_Drn_Kn', 'Jen_Drn_Kr', 'Ket', 'Tahun', 'Koor_Ujg_X', 'Koor_Ujg_Y', 'Koor_Pkl_X',
                'Koor_Pkl_Y', 'Created_at', 'Verifikasi', 'Deleted_at'
            )
            ->findOrFail($id);
            return view('contents.front.data.detail-jalan', [
                'title' => 'Data Jalan | Detail',
                'list' => $list,
            ]);
        } catch (\Throwable $e) {
            return redirect()->route('data-jalan');
        }
    }
    // END data jalan
}
