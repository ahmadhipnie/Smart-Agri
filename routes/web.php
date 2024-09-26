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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/prediksi-cuaca', [PrediksiCuacaController::class, 'index'])->name('prediksicuaca');
    Route::post('/prediksi-cuaca/fetch', [PrediksiCuacaController::class, 'fetchWeatherData'])->name('cuaca.fetch');
    Route::get('/jenis-tanaman-pangan', [JenisTanamanController::class, 'index'])->name('jenistanaman');
    Route::get('/hasil-uji-tanaman-pangan', [HasilUjiTanamanController::class, 'index'])->name('hasilujitanaman');
    Route::get('/daerah-rawan-pangan', [DaerahRawanPanganController::class, 'index'])->name('daerahrawan');

    });

Route::get('/peta-rekomendasi', [PetaRekomendasiController::class, 'index'])->name('peta');
