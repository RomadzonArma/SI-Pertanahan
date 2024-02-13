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

class TimLapanganController extends Controller
{
    public function index(Request $request)
    {
        return view('contents.timlapangan.list', [
            'title' => 'Tim Lapangan',
        ]);
    }

    public function data(Request $request)
    {
        $list = User::select(DB::raw('id, name, username, pekerjaan, email, no_telp, alamat, is_active, is_verified, created_at'))
            ->where('is_verified', 1)
            ->whereHas('roles', function($query) {
                $query->where('roles.id', 5);
            })
            ->with('roles');

        return DataTables::of($list)
            ->addIndexColumn()
            ->make(true);
    }
}
