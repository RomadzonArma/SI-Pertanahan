<?php

namespace App\Http\Controllers;

use App\model\AsetPoint;
use Illuminate\Http\Request;

class DataAsetController extends Controller
{
    public function transferData()
    {
        $dataTransfer = AsetPoint::on('mysql_2')->get();

        foreach ($dataTransfer as $data) {
            AsetPoint::create([
                'kec_id' => $data->kec_id,
                'kel_id' => $data->kel_id,
                'luas' => $data->luas,
                'tgl_sertif' => $data->tgl_sertif,
                'no_sertif' => $data->no_sertif,
                'no_hp' => $data->no_hp,
                'pengg_seka' => $data->pengg_seka,
                'pengg_sertif' => $data->pengg_sertif,
                'file_sertif' => $data->file_sertif,
                'klasifikasi' => $data->klasifikasi,
                'lat' => $data->lat,
                'lng' => $data->lng,
                'foto' => $data->foto,
                'foto_survei' => $data->foto_survei,
                'is_active' => $data->is_active,
                'tampil_publik' => $data->tampil_publik,
            ]);
        }

        return "Data berhasil ditransfer.";
    }

    public function truncateTable()
    {
        AsetPoint::truncate();
        return redirect()->back()->with('success', 'Tabel berhasil dikosongkan.');
    }
}
