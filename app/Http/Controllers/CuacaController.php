<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CuacaController extends Controller
{
    public function index(){
        return view('cuaca.index');
    }
}
