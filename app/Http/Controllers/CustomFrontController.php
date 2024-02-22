<?php

namespace App\Http\Controllers;

use App\Model\CustomFront;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Contracts\DataTable;

class CustomFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = CustomFront::all();
        return view('contents.custom-front.index',[
            'title' => 'Custom Front',
            'list'  => $list
        ]);
    }
    public function data(Request $request)
    {
        $list = CustomFront::all();
        return DataTables::of($list)
        ->addIndexColumn()
        ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'title_header' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'telp' => 'required',
        ]);

        try{
            $logoHeaderPath = $request->file('logo_header')->store('custom_fronts');
            $logoFooterPath = $request->file('logo_footer')->store('custom_fronts');

            // Simpan data ke database
            $customFront = CustomFront::create([
                'judul' => $request->judul,
                'title_header' => $request->title_header,
                'alamat' => $request->alamat,
                'email' => $request->email,
                'telp' => $request->telp,
                'logo_header' => $logoHeaderPath,
                'logo_footer' => $logoFooterPath,
            ]);
            return response()->json(['status' => true], 200);
        }catch (\Exception $e){
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
