<?php

namespace App\Http\Controllers;

use App\Model\AsetPoint;
use App\Model\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class PertanahanController extends Controller
{
    public function index(Request $request)
    {
        // $roles = Role::all();
        return view('contents.pertanahan.list', [
            'title' => 'Pertanahan',
            // 'roles' => $roles,
        ]);
    }

    public function data(Request $request)
    {
        $list = AsetPoint::on('mysql')->select([
            'id',
            'kec_id',
            'kel_id',
            'luas',
            'tgl_sertif',
            'no_sertif',
            'no_hp',
            'pengg_seka',
            'pengg_sertif',
            'file_sertif',
            'klasifikasi',
            'lat',
            'lng',
            'foto',
            'foto_survei',
            'is_active',
            'tampil_publik',
        ]);

        return DataTables::of($list)
            ->addIndexColumn()
            ->make(true);
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'pekerjaan' => 'required',
            'email' => 'required|unique:users,email',
            'no_telp' => 'required',
            'alamat' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:5',
            'confirmation_password' => 'required|same:password'
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
                'pekerjaan' => $request->pekerjaan,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'is_verified' => 1,
                'username' => $request->username,
                'password' => Hash::make($request->password)
            ]);

            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'pekerjaan' => 'required',
            'email' => ['required', Rule::unique('users', 'email')->ignore($request->id)],
            'no_telp' => 'required',
            'alamat' => 'required',
            'username' => ['required', Rule::unique('users', 'username')->ignore($request->id)]
        ]);

        try {
            $user = User::find($request->id);

            $user->name = $request->name;
            $user->username = $request->username;
            $user->pekerjaan = $request->pekerjaan;
            $user->email = $request->email;
            $user->no_telp = $request->no_telp;
            $user->alamat = $request->alamat;

            if ($user->isDirty()) {
                $user->save();
            }

            if ($user->wasChanged()) {
                return response()->json(['status' => true], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function delete(Request $request)
    {
        try {
            $user = User::find($request->id);

            $user->delete();

            if ($user->trashed()) {
                return response()->json(['status' => true], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }
}
