<?php

namespace App\Http\Controllers;

use App\Helpers\CustomHelper;
use App\Model\Pengajuan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class PengajuanController extends Controller
{
    public function index(Request $request)
    {

        $user = $request->session()->get('role_id');
        // dd($user);
        return view('contents.pengajuan.list', [
            'title' => 'Pengajuan',
        ]);
    }

    public function create(Request $request)
    {
        $user = Auth::user();

        return view('contents.pengajuan.create', [
            'title' => 'Tambah Pengajuan',
            'user'  => $user,
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        try {

            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'nama'              => 'required',
                'alamat'            => 'required',
                'pekerjaan'         => 'required',
                'lokasi'            => 'required',
                'tanggal_pengajuan' => 'required',
                'selaku'            => 'required',
                'kondisi_lapangan'  => 'required',
            ], [
                'required' => ':attribute Tidak Boleh Kosong',
                'bukti_kepemilikan_tanah.max' => 'required|mimes:jpeg,png,jpg,pdf|max:6000',
            ]);

            if ($validator->fails()) {

                return response()->json(array(
                    'status' => false,
                    'errors' => $validator->getMessageBag()->all()
                ), 200);
            } else {

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

                $dok = null;
                if ($request->hasFile('bukti_kepemilikan_tanah')) {

                    $file = $request->file('bukti_kepemilikan_tanah');
                    $name = date('Y-m-d') . '' . rand(1, 999) . '_' . str_replace(' ', '_', $request->bukti_kepemilikan_tanah->getClientOriginalName());
                    $path = storage_path() . '/app/public/pengajuan/bukti_kepemilikan_tanah';

                    if (!File::isDirectory($path)) {
                        File::makeDirectory($path, 0775, true, true);
                    }

                    if ($file->move($path, $name)) {
                        $dok = $name;
                    }

                    if (File::exists(storage_path('app/public/' . $data->bukti_kepemilikan_tanah))) {
                        File::delete(storage_path('app/public/' . $data->bukti_kepemilikan_tanah));
                    }
                    $data->bukti_kepemilikan_tanah_file = $dok;
                    $data->bukti_kepemilikan_tanah_path = '/pengajuan/bukti_kepemilikan_tanah/' . $dok;
                }

                $data->save();
            }

            DB::commit();

            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function data(Request $request)
    {
        $user_id = Auth::user();
        $user = $request->session()->get('role_id');

        $query = DB::table('pengajuan as a')
            ->leftJoin('ref_status_pengajuan as b', 'b.kode', '=', 'a.STATUS')
            ->select('a.*', 'b.nama as nama_status')
            ->whereNull('a.deleted_at')
            ->whereNull('a.deleted_by');

        if ($user == '1') {
        } elseif ($user == '6') {
            $query->whereNotIn('a.status', ['100']);
        } elseif ($user == '7') {
            $query->where('a.created_by', '=', $user_id->id);
        } elseif ($user == '5') {
            $query->whereNotIn('a.status', ['100', '200', '300', '400']);
        }

        // Eksekusi query dan dapatkan hasil
        $result = $query->get();

        // Mengenkripsi ID sebelum menyajikan data ke DataTables
        $encryptedList = $result->map(function ($item) {
            $item->encrypted_id = encrypt($item->id);
            return $item;
        });

        return DataTables::of($encryptedList)
            ->addIndexColumn()
            ->make(true);
    }

    public function delete(Request $request)
    {
        $user = Auth::user();

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

    public function edit(Request $request, $encrypted_id)
    {
        $id = decrypt($encrypted_id);

        $edit = Pengajuan::find($id);

        if (!$edit) {
            abort(404);
        }

        return view('contents.pengajuan.edit', [
            'title' => 'Edit Pengajuan',
            'edit'  => $edit
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $id = decrypt($request->id);

        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'nama'              => 'required',
                'alamat'            => 'required',
                'pekerjaan'         => 'required',
                'lokasi'            => 'required',
                'tanggal_pengajuan' => 'required',
                'selaku'            => 'required',
                'kondisi_lapangan'  => 'required',
            ], [
                'required' => ':attribute Tidak Boleh Kosong',
                'bukti_kepemilikan_tanah.max' => 'required|mimes:jpeg,png,jpg, pdf|max:6000',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->getMessageBag()->all()
                ], 200);
            } else {
                $data = Pengajuan::findOrFail($id);

                $data->nama              = $request->nama;
                $data->alamat            = $request->alamat;
                $data->pekerjaan         = $request->pekerjaan;
                $data->lokasi            = $request->lokasi;
                $data->tanggal_pengajuan = $request->tanggal_pengajuan;
                $data->selaku            = $request->selaku;
                $data->kondisi_lapangan  = $request->kondisi_lapangan;
                $data->status            = $request->status;
                $data->updated_by        = $user->id;

                $dok = null;
                if ($request->hasFile('bukti_kepemilikan_tanah')) {
                    $file = $request->file('bukti_kepemilikan_tanah');
                    $name = date('Y-m-d') . '' . rand(1, 999) . '_' . str_replace(' ', '_', $request->bukti_kepemilikan_tanah->getClientOriginalName());
                    $path = storage_path() . '/app/public/pengajuan/bukti_kepemilikan_tanah';

                    if (!File::isDirectory($path)) {
                        File::makeDirectory($path, 0775, true, true);
                    }

                    if ($file->move($path, $name)) {
                        $dok = $name;
                    }

                    if (File::exists(storage_path('app/public/' . $data->bukti_kepemilikan_tanah))) {
                        File::delete(storage_path('app/public/' . $data->bukti_kepemilikan_tanah));
                    }
                    $data->bukti_kepemilikan_tanah_file = $dok;
                    $data->bukti_kepemilikan_tanah_path = '/pengajuan/bukti_kepemilikan_tanah/' . $dok;
                }

                $data->save();
            }

            DB::commit();

            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function ajukanpemohon(Request $request)
    {
        $id = decrypt($request->post('id'));

        $edit = Pengajuan::leftJoin('ref_status_pengajuan', 'ref_status_pengajuan.kode', '=', 'pengajuan.status')
            ->where('pengajuan.id', '=', $id)
            ->select('pengajuan.*', 'ref_status_pengajuan.nama as nama_status') // Sesuaikan dengan kolom yang ingin Anda ambil
            ->first();

        if (!$edit) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        $html = View::make('contents.pengajuan.modal-ajukan-pemohon', [
            'title' => 'Detail Pengajuan Permohonan',
            'edit'  => $edit
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function send_ajukan_pemohon(Request $request)
    {
        $user = Auth::user();
        $id = decrypt($request->id);

        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'id'              => 'required',
                'status'            => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->getMessageBag()->all()
                ], 200);
            } else {
                $data = Pengajuan::findOrFail($id);
                $data->status = $request->status;
                $data->save();
            }

            DB::commit();

            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function ajukanoperator(Request $request)
    {
        $id = decrypt($request->post('id'));

        $edit = Pengajuan::leftJoin('ref_status_pengajuan', 'ref_status_pengajuan.kode', '=', 'pengajuan.status')
            ->where('pengajuan.id', '=', $id)
            ->select('pengajuan.*', 'ref_status_pengajuan.nama as nama_status') // Sesuaikan dengan kolom yang ingin Anda ambil
            ->first();

        if (!$edit) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        $html = View::make('contents.pengajuan.modal-ajukan-operator', [
            'title' => 'Verifikasi Pengajuan Permohonan',
            'edit'  => $edit
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function send_ajukan_operator(Request $request)
    {
        $user = Auth::user();
        $id = decrypt($request->id);

        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'id'      => 'required',
                'status'  => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->getMessageBag()->all()
                ], 200);
            } else {
                $data = Pengajuan::findOrFail($id);
                $data->status = $request->status;
                $data->alasan = $request->alasan;
                $data->no_reg = $request->no_reg;
                $data->survey = $request->survey;

                $data->save();
            }

            DB::commit();

            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function ajukanlapangan(Request $request)
    {
        $id = decrypt($request->post('id'));

        $edit = Pengajuan::leftJoin('ref_status_pengajuan', 'ref_status_pengajuan.kode', '=', 'pengajuan.status')
            ->where('pengajuan.id', '=', $id)
            ->select('pengajuan.*', 'ref_status_pengajuan.nama as nama_status') // Sesuaikan dengan kolom yang ingin Anda ambil
            ->first();

        if (!$edit) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        $html = View::make('contents.pengajuan.modal-ajukan-lapangan', [
            'title' => 'Detail Pengajuan Permohonan',
            'edit'  => $edit
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function send_ajukan_tidak_survey(Request $request)
    {
        $user = Auth::user();
        $id = decrypt($request->id);

        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'id'              => 'required',
            ], [
                'required' => ':attribute Tidak Boleh Kosong',
                'surat_pernyataan_gsb.max' => 'required|mimes:pdf, jpg, png, pdf|max:6000',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'errors' => $validator->getMessageBag()->all()
                ], 200);
            } else {
                $data = Pengajuan::findOrFail($id);
                $data->mengukur = $request->mengukur;
                $data->status = "600";

                $dok = null;
                if ($request->hasFile('surat_pernyataan_gsb')) {
                    $file = $request->file('surat_pernyataan_gsb');
                    $name = date('Y-m-d') . '' . rand(1, 999) . '_' . str_replace(' ', '_', $request->surat_pernyataan_gsb->getClientOriginalName());
                    $path = storage_path() . '/app/public/pengajuan/surat_pernyataan_gsb';

                    if (!File::isDirectory($path)) {
                        File::makeDirectory($path, 0775, true, true);
                    }

                    if ($file->move($path, $name)) {
                        $dok = $name;
                    }

                    if (File::exists(storage_path('app/public/' . $data->surat_pernyataan_gsb))) {
                        File::delete(storage_path('app/public/' . $data->surat_pernyataan_gsb));
                    }
                    $data->surat_pernyataan_gsb_file = $dok;
                    $data->surat_pernyataan_gsb_path = '/pengajuan/surat_pernyataan_gsb/' . $dok;
                }

                $data->save();
            }

            DB::commit();

            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }
}
