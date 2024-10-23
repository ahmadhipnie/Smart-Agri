<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PetaRekomendasiController extends Controller
{
    public function index(){
        return view('petarekomendasi.index');
    }
}
