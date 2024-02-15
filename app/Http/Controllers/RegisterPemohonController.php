<?php

namespace App\Http\Controllers;

use App\Model\ProfilPemohon;
use App\Model\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class RegisterPemohonController extends Controller
{
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
        ]);

        try {
            $profil_pemohon = ProfilPemohon::create([
                'name' => $request->name,
                'pekerjaan' => $request->pekerjaan,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'is_verified' => 0
            ]);

            $id = $profil_pemohon->id;
            $id_role = 7;

            $user = ProfilPemohon::with('roles')->find($id);
            $roles = Role::select('id')->where('is_active', 1)->get();
            $syncData = [$id_role => ['created_at' => now()]];
            $user->roles()->sync($syncData);

            // send WA
            $phone = formatPhoneNumberForWhatsApp($request->no_telp);
            $message = "Terima kasih telah mendaftarkan Akun KRK pada Platform KRK Online kami.

Untuk mengaksesnya silakan Bapak/Ibu log in melalui link ".route('login')."
Username : {$request->username}
Password : {$request->password}

Akun Anda belum Aktif, menunggu Aktivasi dari Super Admin.
Apabila akun belum aktif, dapat konfirmasi lebih lanjut dengan menghubungi Call Center 00000000000 (Japri WA).

Disperumkimtan Surakarta";
            sendMessage($phone, $message);

            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }
}
