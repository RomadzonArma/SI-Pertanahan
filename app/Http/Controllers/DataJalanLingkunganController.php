<?php

namespace App\Http\Controllers;

use App\Model\JalanLingkungan;
use Illuminate\Http\Request;

class DataJalanLingkunganController extends Controller
{
    public function transferData()
    {
        $dataTransfer = JalanLingkungan::on('mysql_3')->get();

        foreach ($dataTransfer as $data) {
            JalanLingkungan::create([
                'FID' => $data->FID,
                'Kecamatan' => $data->Kecamatan,
                'Kelurahan' => $data->Kelurahan,
                'No' => $data->No,
                'RW' => $data->RW,
                'Nama_Jalan' => $data->Nama_Jalan,
                'Usulan_Nama_Jalan' => $data->Usulan_Nama_Jalan,
                'Kategori' => $data->Kategori,
                'Pjg_Jln' => $data->Pjg_Jln,
                'Lbr_Perk' => $data->Lbr_Perk,
                'L_Bh_Kn' => $data->L_Bh_Kn,
                'L_Bh_Kr' => $data->L_Bh_Kr,
                'Jenis_Perk' => $data->Jenis_Perk,
                'Pjg_Aspal' => $data->Pjg_Aspal,
                'Pjg_Cor' => $data->Pjg_Cor,
                'Pjg_Krkl' => $data->Pjg_Krkl,
                'Pjg_Pav' => $data->Pjg_Pav,
                'Pjg_Tnh' => $data->Pjg_Tnh,
                'Kond_Baik' => $data->Kond_Baik,
                'Kond_Sed' => $data->Kond_Sed,
                'Kond_RR' => $data->Kond_RR,
                'Lok_RR' => $data->Lok_RR,
                'Kond_RB' => $data->Kond_RB,
                'Lok_RB' => $data->Lok_RB,
                'Lbr_Drn_Kr' => $data->Lbr_Drn_Kr,
                'Lbr_Drn_Kn' => $data->Lbr_Drn_Kn,
                'Pjg_Drn_Kn' => $data->Pjg_Drn_Kn,
                'Pjg_Drn_Kr' => $data->Pjg_Drn_Kr,
                'Dlm_Drn_Kr' => $data->Dlm_Drn_Kr,
                'Dlm_Drn_Kn' => $data->Dlm_Drn_Kn,
                'Tip_Drn_Kr' => $data->Tip_Drn_Kr,
                'Tip_Drn_Kn' => $data->Tip_Drn_Kn,
                'Knd_Drn_Kr' => $data->Knd_Drn_Kr,
                'Knd_Drn_Kn' => $data->Knd_Drn_Kn,
                'Jen_Drn_Kn' => $data->Jen_Drn_Kn,
                'Jen_Drn_Kr' => $data->Jen_Drn_Kr,
                'Ket' => $data->Ket,
                'Tahun' => $data->Tahun,
                'Koor_Ujg_X' => $data->Koor_Ujg_X,
                'Koor_Ujg_Y' => $data->Koor_Ujg_Y,
                'Koor_Pkl_X' => $data->Koor_Pkl_X,
                'Koor_Pkl_Y' => $data->Koor_Pkl_Y,
                'Created_at' => $data->Created_at,
                'Verifikasi' => $data->Verifikasi,
                // 'Deleted_at' => $data->Deleted_at,
            ]);
        }

        return "Data berhasil ditransfer.";
    }

    public function truncateTable()
    {
        JalanLingkungan::truncate();
        return redirect()->back()->with('success', 'Tabel berhasil dikosongkan.');
    }
}
