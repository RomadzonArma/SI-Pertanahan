<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Model\JalanLingkunganCoord;
use App\Http\Controllers\Controller;

class JalanLingkunganCoordController extends Controller
{
    public function getAllData()
    {
        return response()->json([
            'message'   => 'success',
            'data'      => JalanLingkunganCoord::all()
        ], 200);
    }
}
