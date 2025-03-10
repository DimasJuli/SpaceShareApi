<?php

namespace App\Http\Controllers;

use App\Models\Ruang;

class DaftarRuang extends Controller
{
    public function index()
    {
        $barang = Ruang::with('statusRuang')->get();

        return response()->json([
            'message' => 'Daftar barang berhasil diambil',
            'data' => $barang
        ]);
    }
}
