<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\model\JalanLingkungan;
use App\Http\Controllers\Controller;

class JalanLingkunganController extends Controller
{
    public function getAllData()
    {
        return response()->json([
            'message'   => 'success',
            'data'      => JalanLingkungan::all()
        ], 200);
    }
}
