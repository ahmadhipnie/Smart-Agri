<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DaerahRawanPanganController extends Controller
{
    public function index()
    {
        return view('backend.daerahpangan.index');
    }
}
