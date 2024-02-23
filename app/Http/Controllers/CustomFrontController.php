<?php

namespace App\Http\Controllers;

use App\Model\CustomFront;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Contracts\DataTable;

class CustomFrontController extends Controller
{

    public function index()
    {
        $list = CustomFront::first();
        return view('contents.custom-front.index', [
            'title' => 'Custom Front',
            'list'  => $list
        ]);
    }

    public function show()
    {
        return CustomFront::first();
    }

    public function update(Request $request)
    {

        try {
            $customFront = CustomFront::first();

            $logoHeaderPath = $customFront->logo_header;
            $logoFooterPath = $customFront->logo_footer;

            if ($request->hasFile('logo_header')) {
                // Remove existing file
                if (!empty($logoHeaderPath) && file_exists(public_path('logo-header') . '/' . $logoHeaderPath)) {
                    unlink(public_path('logo-header') . '/' . $logoHeaderPath);
                }

                // Upload new file
                $logoHeaderPath = time() . '.' . $request->logo_header->extension();
                $request->logo_header->move(public_path('logo-header'), $logoHeaderPath);
            }

            if ($request->hasFile('logo_footer')) {
                // Remove existing file
                if (!empty($logoFooterPath) && file_exists(public_path('logo-footer') . '/' . $logoFooterPath)) {
                    unlink(public_path('logo-footer') . '/' . $logoFooterPath);
                }

                // Upload new file
                $logoFooterPath = time() . '.' . $request->logo_footer->extension();
                $request->logo_footer->move(public_path('logo-footer'), $logoFooterPath);
            }

            // Update data in the database
            $customFront->update([
                'judul'         => $request->judul,
                'title_header'  => $request->title_header,
                'alamat'        => $request->alamat,
                'email'         => $request->email,
                'telp'          => $request->telp,
                'footer'        => $request->footer,
                'logo_header'   => $logoHeaderPath,
                'logo_footer'   => $logoFooterPath,
            ]);

            return response()->json('Data berhasil disimpan', 200);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'msg' => $e->getMessage()], 400);
        }
    }
}
