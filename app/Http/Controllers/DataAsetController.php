<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\CustomHelper;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

use App\Model\AsetPoint;
use App\Model\JalanLingkungan;
use App\Model\JalanLingkunganCoord;

use App\Model\LocalAsetPoint;
use App\Model\LocalJalanLingkungan;
use App\Model\LocalJalanLingkunganCoord;

use App\Jobs\SyncDataSinta;
use App\Jobs\SyncDataJalanLingkungan;
use App\Jobs\SyncDataJalanLingkunganCoord;

class DataAsetController extends Controller
{
    public function index(Request $request) {
        return view('contents.data-aset.list', [
            'title' => 'Data Aset'
        ]);
    }

    public function syncDataSijali(Request $request){
        try {
            // jaling
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            // CURLOPT_URL => env('API_SIJALI_JALAN_LINGKUNGAN'),
            // CURLOPT_RETURNTRANSFER => true,
            // CURLOPT_ENCODING => '',
            // CURLOPT_MAXREDIRS => 10,
            // CURLOPT_TIMEOUT => 0,
            // CURLOPT_FOLLOWLOCATION => true,
            // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            // CURLOPT_CUSTOMREQUEST => 'GET',
            // ));
            // $response = curl_exec($curl);
            // curl_close($curl);
            // $data = json_decode($response, true)['data'];
            // LocalJalanLingkungan::truncate();
            // LocalJalanLingkungan::insert($data);
            SyncDataJalanLingkungan::dispatch();
            
            // jaling coord
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            // CURLOPT_URL => env('API_SIJALI_JALAN_LINGKUNGAN_COORD'),
            // CURLOPT_RETURNTRANSFER => true,
            // CURLOPT_ENCODING => '',
            // CURLOPT_MAXREDIRS => 10,
            // CURLOPT_TIMEOUT => 0,
            // CURLOPT_FOLLOWLOCATION => true,
            // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            // CURLOPT_CUSTOMREQUEST => 'GET',
            // ));
            // $response = curl_exec($curl);
            // curl_close($curl);
            // $data = json_decode($response, true)['data'];
            // LocalJalanLingkunganCoord::truncate();
            // LocalJalanLingkunganCoord::insert($data);
            SyncDataJalanLingkunganCoord::dispatch();

            return response()->json(['status' => true, 'msg' => 'Data jalan Sync initiated'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function syncDataSinta(Request $request){
        try {
            // $curl = curl_init();
            // curl_setopt_array($curl, array(
            // CURLOPT_URL => env('API_SINTA_ASET_POINT'),
            // CURLOPT_RETURNTRANSFER => true,
            // CURLOPT_ENCODING => '',
            // CURLOPT_MAXREDIRS => 10,
            // CURLOPT_TIMEOUT => 0,
            // CURLOPT_FOLLOWLOCATION => true,
            // CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            // CURLOPT_CUSTOMREQUEST => 'GET',
            // ));
            // $response = curl_exec($curl);
            // curl_close($curl);
            // $data = json_decode($response, true)['data'];

            // LocalAsetPoint::truncate();
            // LocalAsetPoint::insert($data);

            SyncDataSinta::dispatch();

            return response()->json(['status' => true, 'msg' => 'Aset Point Sync initiated'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

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
