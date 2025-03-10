<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class DaftarBarang extends Controller
{
    public function index()
    {
        $barang = Barang::with('statusBarang')->get();

        return response()->json([
            'message' => 'Daftar barang berhasil diambil',
            'data' => $barang
        ]);
    }
}
