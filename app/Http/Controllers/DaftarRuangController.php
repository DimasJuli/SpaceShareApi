<?php

namespace App\Http\Controllers;

use App\Models\Ruang;

class DaftarRuangController extends Controller
{
    public function index()
    {
        $barang = Ruang::with('statusRuang')->get();

        return response()->json([
            'message' => 'Daftar barang berhasil diambil',
            'data' => $barang
        ]);
    }

    public function getRuangById($id)
    {
        $ruangbyid = Ruang::get()->where('id',$id)->first();
        return response()->json([
            'message' => 'Detail berhasil diambil',
            'data' => $ruangbyid
        ]);
    }
}
