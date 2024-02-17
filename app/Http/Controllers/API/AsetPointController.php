<?php

namespace App\Http\Controllers\API;

use App\Model\AsetPoint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AsetPointController extends Controller
{
    public function getAllData()
    {
        return response()->json([
            'message'   => 'success',
            'data'      => AsetPoint::all()
        ], 200);
    }
}
