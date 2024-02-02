<?php

namespace App\Http\Controllers;

use App\Model\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::all();
        return view('contents.user.list', [
            'title' => 'Pengguna',
            'roles' => $roles,
        ]);
    }

    public function data(Request $request)
    {
        $list = User::select(DB::raw('id, name, username, is_active, is_verified, created_at'))->with('roles');

        return DataTables::of($list)
            ->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:5',
            'confirmation_password' => 'required|same:password'
        ]);

        try {
            $user = User::create([
                'name' => $request->name,
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
            'username' => ['required', Rule::unique('users', 'username')->ignore($request->id)]
        ]);

        try {
            $user = User::find($request->id);

            $user->name = $request->name;
            $user->username = $request->username;

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

    public function switchStatus(Request $request)
    {
        try {
            $user = User::find($request->id);

            $user->is_active = $request->value;

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

    public function switchVerified(Request $request)
    {
        try {
            $user = User::find($request->id);

            $user->is_verified = $request->value;

            if ($user->isDirty()) {
                $user->save();
            }

            if ($user->wasChanged()) {
                $phone = formatPhoneNumberForWhatsApp($user->no_telp);
                switch ($request->value) {
                    case '1':
                        $message = "Selamat, akun Anda telah diaktivasi

Untuk mengaksesnya silakan Bapak/Ibu log in melalui link ".route('login').".
Konfirmasi lebih lanjut dapat menghubungi Call Center 00000000000 (Japri WA).

DPUPR Kota Tegal";
                        sendMessage($phone, $message);
                        break;
                    case '0':
                        sendMessage($phone, 'Akun Anda telah dinonaktifkan');
                        break;
                    default:
                        # code...
                        break;
                }
                
                return response()->json(['status' => true], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }

    public function resetPassword(Request $request)
    {
        try {
            $user = User::find($request->id);

            $user->password = Hash::make('pengguna12345');

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

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:5',
            'confirmation_password' => 'required|same:password'
        ]);

        try {
            $user = User::find(Auth::id());

            $user->password = Hash::make($request->password);

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

    public function updateRole(Request $request)
    {
        try {
            $user_id = $request->id;
            $role_id = $request->role_id;

            $user = User::with('roles')->find($user_id);

            $roles = Role::select('id')->where('is_active', 1)->get();

            $user->roles()->sync($role_id);

            return response()->json(['status' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }
}
