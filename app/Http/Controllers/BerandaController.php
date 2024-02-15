<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        // return view('contents.front.home._home');
        return view('contents.front.home.home', [
            'title' => 'Sistem Informasi Pertanahan Surakarta'
        ]);
    }

    public function peta()
    {
        // return view('contents.front.home.home');
        return view('contents.front.peta.index', [
            'title' => 'Peta'
        ]);
    }

    public function data()
    {
        // return view('contents.front.home.home');
        return view('contents.front.data.index', [
            'title' => 'Data'
        ]);
    }
}
