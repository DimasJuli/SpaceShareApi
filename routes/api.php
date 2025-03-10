<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\DaftarBarang;
use App\Http\Controllers\DaftarRuang;
use App\Http\Controllers\DashboardAdmin;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('admin')->group(function () {
    Route::post('/login', [AdminAuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout']);
        Route::get('/barang', [DaftarBarang::class, 'index']);
        Route::get('/ruang', [DaftarRuang::class, 'index']);
        Route::get('/dashboard', [DashboardAdmin::class, 'index']);
        Route::get('/barang/{id}', [DaftarBarang::class, 'getBarangById']);
        Route::get('/ruang/{id}', [DaftarRuang::class, 'getRuangById']);
    });
});

Route::prefix('user')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/barang/{id}', [DaftarBarang::class, 'getBarangById']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/barang', [DaftarBarang::class, 'index']);
        Route::get('/ruang', [DaftarRuang::class, 'index']);
        Route::get('/barang/{id}', [DaftarBarang::class, 'getBarangById']);
        Route::get('/ruang/{id}', [DaftarRuang::class, 'getRuangById']);
    });
});
