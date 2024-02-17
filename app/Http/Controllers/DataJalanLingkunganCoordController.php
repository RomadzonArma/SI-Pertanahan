<?php

namespace App\Http\Controllers;

use App\Model\JalanLingkunganCoord;
use Illuminate\Http\Request;

class DataJalanLingkunganCoordController extends Controller
{
    public function transferData()
    {
        $dataTransfer = JalanLingkunganCoord::on('mysql_3')->get();

        foreach ($dataTransfer as $data) {
            JalanLingkunganCoord::create([
                'FID' => $data->FID,
                'id_tbl_utama' => $data->id_tbl_utama,
                'layer_type' => $data->layer_type,
                'lat_lng' => $data->lat_lng,
                // 'created_at' => $data->created_at,
            ]);
        }

        return "Data berhasil ditransfer.";
    }

    public function truncateTable()
    {
        JalanLingkunganCoord::truncate();
        return redirect()->back()->with('success', 'Tabel berhasil dikosongkan.');
    }
}
