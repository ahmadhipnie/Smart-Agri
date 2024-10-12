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

        // Default values if none are selected in the dropdown
        $year = $request->input('tahunSelect', 2024);
        $province = $request->input('provinsiSelect', 'JAWA TIMUR');
        $tanggal = $request->input('tanggalSelect', 1); // Default to 1st day of the month

        // Prepare arrays to hold data
        $temperatureData = [];
        $cloudcoverData = [];
        $humidityData = [];
        $precipData = [];
        $windspeedData = [];

        // Loop through each month and get data for the selected day of each month
        for ($month = 1; $month <= 12; $month++) {
            // API request with retry and timeout handling
            $response = Http::retry(3, 1000)->timeout(60)->get("http://103.210.69.119:5000/predictions", [
                'name' => $province,
                'tanggal' => $tanggal, // Fetching data for selected day
                'bulan' => $month,
                'tahun' => $year,
            ]);

            // Check if the API call was successful and data is present
            if ($response->successful() && !empty($response->json()) && isset($response->json()[0])) {
                $data = $response->json()[0];

                // Push data for each category
                $temperatureData[] = $data['temp'] ?? null;
                $cloudcoverData[] = $data['cloudcover'] ?? null;
                $humidityData[] = $data['humidity'] ?? null;
                $precipData[] = $data['precip'] ?? null;
                $windspeedData[] = $data['windspeed'] ?? null;
            } else {
                // Handle missing data
                $temperatureData[] = $cloudcoverData[] = $humidityData[] = $precipData[] = $windspeedData[] = null;
            }
        }

        // Pass all data to the view
        return view('backend.dashboard.index', compact(
            'temperatureData',
            'cloudcoverData',
            'humidityData',
            'precipData',
            'windspeedData',
            'year',
            'province',
            'provinceData', // Pass province data to Blade
            'yearData', // Pass year data to Blade
            'tanggal' // Pass selected date to Blade
        ));
    }
}
