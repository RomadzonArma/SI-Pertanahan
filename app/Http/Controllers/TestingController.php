<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestingController extends Controller
{
    public function sendWa(Request $request)
    {
        $do = sendMessage('6289673341581', 'Hello');
        return $do;
    }
}
