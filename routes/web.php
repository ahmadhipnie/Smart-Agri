<?php

use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\JenisTanamanController;
use App\Http\Controllers\backend\HasilUjiTanamanController;
use App\Http\Controllers\backend\DaerahRawanPanganController;
use App\Http\Controllers\backend\PrediksiCuacaController;
use App\Http\Controllers\PetaRekomendasiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing_page');
});

Route::prefix('detail')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::get('/cuaca', [PrediksiCuacaController::class, 'index'])->name('cuaca.index');

    // Route untuk form POST request
    Route::get('/cuaca/fetch', [PrediksiCuacaController::class, 'fetch'])->name('cuaca.fetch');
    Route::get('/dashboard/fetch', [DashboardController::class, 'fetch'])->name('dashboard.fetch');
    Route::get('/jenis-tanaman-pangan', [JenisTanamanController::class, 'index'])->name('jenistanaman');
    Route::get('/hasil-uji-tanaman-pangan', [HasilUjiTanamanController::class, 'index'])->name('hasilujitanaman');
    Route::get('/daerah-rawan-pangan', [DaerahRawanPanganController::class, 'index'])->name('daerah.rawan.pangan');
    Route::get('/daerah-rawan-pangan/fetch', [DaerahRawanPanganController::class, 'fetch'])->name('daerah.rawan.pangan.fetch');
    Route::get('/filter-tahun', [DaerahRawanPanganController::class, 'index'])->name('filter.tahun');
    });

Route::get('/peta-rekomendasi', [PetaRekomendasiController::class, 'index'])->name('peta');
