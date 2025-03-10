<?php

namespace App\Http\Controllers;

use App\Models\PinjamRuang;
use App\Models\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class PeminjamanRuangController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'ruang_id' => 'required|exists:ruang,id',
            'tgl_mulai' => 'required|date|after_or_equal:today',
            'tgl_selesai' => 'required|date|after:tgl_mulai',
        ]);

        $ruang = Ruang::findOrFail($request->ruang_id);

        if ($ruang->status != 1) {
            return response()->json(['message' => 'Ruang tidak tersedia untuk dipinjam'], 400);
        }

        $peminjaman = PinjamRuang::create([
            'ruang_id' => $request->ruang_id,
            'user_id' => Auth::id(),
            'admin_id' => null,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'status' => 1,
            'is_returned' => false,
        ]);

        return response()->json([
            'message' => 'Peminjaman ruang berhasil diajukan, menunggu persetujuan admin',
            'data' => $peminjaman,
        ], 201);
    }
}
