<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $user = User::get();

        return response()->json([
            'message' => 'Daftar barang berhasil diambil',
            'data' => $user
        ]);
    }
}
