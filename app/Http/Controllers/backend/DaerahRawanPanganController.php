<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Service\RawanPanganService;
use Illuminate\Http\Request;

class DaerahRawanPanganController extends Controller
{

    public function index(Request $request)
    {
        $data = RawanPanganService::getData($request);
        return view('backend.daerahpangan.index', compact('data'));
    }

    public function fetch(Request $request){
        $data = RawanPanganService::getData($request);
        return response()->json($data, 200);
    }
    
}
