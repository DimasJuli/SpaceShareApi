<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DaftarBarangController extends Controller
{
    public function index()
    {
        $barang = Barang::with('statusBarang')->get();

        return response()->json([
            'message' => 'Daftar barang berhasil diambil',
            'data' => $barang
        ]);
    }

    public function getBarangById($id)
    {
        $barangbyid = Barang::get()->where('id', $id)->first();
        return response()->json([
            'message' => 'Detail berhasil diambil',
            'data' => $barangbyid
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'stok' => 'required|integer|min:1',
            'status' => 'required|exists:status_barang,id',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'lokasi' => 'nullable|string',
        ]);

        $data = $request->all();
        $data['admin_id'] = auth()->id();

        $lastBarang = Barang::latest('id')->first();
        if ($lastBarang) {
            preg_match('/\d+$/', $lastBarang->nomor, $matches);
            $lastNumber = $matches ? (int)$matches[0] : 0;
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $data['nomor'] = 'BRG' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('barang_foto', 'public');
            $data['foto'] = $path;
        }

        $barang = Barang::create($data);

        return response()->json([
            'message' => 'Barang berhasil ditambahkan',
            'data' => $barang,
        ], 201);
    }
}
