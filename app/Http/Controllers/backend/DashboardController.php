<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Service\DashboardService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Static provinces and years (2024, 2025)
        $provinceData = config('province');
        $yearData = [2024, 2025];   

        $allData = DashboardService::getData($request);
        $data = $allData['data'];
        $main = $allData['main'];

        return view('backend.dashboard.index', compact(
            'data',
            'main',
            'provinceData',
            'yearData', 
        ));
    }

    public function fetch(Request $request){
        $allData = DashboardService::getData($request);
        $data = $allData['data'];
        $main = $allData['main'];

        return response()->json(['data' => $data, 'main' => $main], 200);
    }
}
