<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Static provinces and years (2024, 2025)
        $provinceData = [
            'ACEH', 'BALI', 'BANGKA BELITUNG', 'BANTEN', 'BENGKULU', 'GORONTALO', 'JAKARTA', 'JAMBI', 
            'JAWA BARAT', 'JAWA TENGAH', 'JAWA TIMUR', 'KALIMANTAN BARAT', 'KALIMANTAN SELATAN', 
            'KALIMANTAN TENGAH', 'KALIMANTAN TIMUR', 'KALIMANTAN UTARA', 'KEPULAUAN RIAU', 'LAMPUNG', 
            'MALUKU', 'MALUKU UTARA', 'NUSA TENGGARA BARAT', 'NUSA TENGGARA TIMUR', 'PAPUA', 'PAPUA BARAT', 
            'PAPUA BARAT DAYA', 'PAPUA PEGUNUNGAN', 'PAPUA SELATAN', 'PAPUA TENGAH', 'RIAU', 'SULAWESI BARAT', 
            'SULAWESI SELATAN', 'SULAWESI TENGAH', 'SULAWESI TENGGARA', 'SULAWESI UTARA', 'SUMATERA BARAT', 
            'SUMATERA SELATAN', 'SUMATERA UTARA', 'YOGYAKARTA'
        ];
        $yearData = [2024, 2025];

        $year = $request->input('tahunSelect', 2024);
        $province = $request->input('provinsiSelect', 'JAWA TIMUR');
        $tanggal = $request->input('tanggalSelect', 1); 

        $data = $this->getData($request);
        $temperatureData = $data['temperatureData'];
        $cloudcoverData = $data['cloudcoverData'];
        $humidityData = $data['humidityData'];
        $precipData = $data['precipData'];
        $windspeedData = $data['windspeedData'];

        return view('backend.dashboard.index', compact(
            'data',
            'year',
            'province',
            'provinceData',
            'yearData', 
            'tanggal' 
        ));
    }

    public function fetch(Request $request){
        $data = $this->getData($request);

        $main = [];
        $main['province'] = $request->input('provinsiSelect', 'JAWA TIMUR');
        $main['year'] = $request->input('tahunSelect', 2024);

        return response()->json(['data' => $data, 'main' => $main], 200);
    }

    public function getData(Request $request){

        $year = $request->input('tahunSelect', 2024);
        $province = $request->input('provinsiSelect', 'JAWA TIMUR');
        $tanggal = $request->input('tanggalSelect', 1); 

        $temperatureData = [];
        $cloudcoverData = [];
        $humidityData = [];
        $precipData = [];
        $windspeedData = [];

        for ($month = 1; $month <= 12; $month++) {
            try {
                $response = Http::retry(3, 1000)->timeout(60)->get("http://103.210.69.119:5000/predictions", [
                    'name' => $province,
                    'tanggal' => $tanggal,
                    'bulan' => $month,
                    'tahun' => $year,
                ]);

                $data = $response->json()[0];

                $temperatureData[] = $data['temp'] ?? null;
                $cloudcoverData[] = $data['cloudcover'] ?? null;
                $humidityData[] = $data['humidity'] ?? null;
                $precipData[] = $data['precip'] ?? null;
                $windspeedData[] = $data['windspeed'] ?? null;
            } catch (\Exception $e){

                $temperatureData[] = $cloudcoverData[] = $humidityData[] = $precipData[] = $windspeedData[] = null;
            }
        }

        $data = [];
        $data['temperatureData'] = $temperatureData;
        $data['cloudcoverData'] = $cloudcoverData;
        $data['humidityData'] = $humidityData;
        $data['precipData'] = $precipData;
        $data['windspeedData'] = $windspeedData;
        return $data;
    }
}
