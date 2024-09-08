<?php

use App\Http\Controllers\PetaRekomendasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetaRekomendasiControllerr;

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
Route::get('/dashboard', function () {
    return view('layout.navigation');
})->name('dashboard');

Route::get('/cuaca', function () {
    return view('cuaca.index');
})->name('cuaca');

Route::get('/peta-rekomendasi', [PetaRekomendasiController::class, 'index'])->name('peta');
