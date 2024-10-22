<?php
namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PrediksiCuacaController extends Controller
{
    public function index(Request $request)
    {
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        // Daftar provinsi yang tersedia
        $provinceData = [
            'ACEH', 'BALI', 'BANGKA BELITUNG', 'BANTEN', 'BENGKULU', 'GORONTALO', 'JAKARTA', 'JAMBI',
            'JAWA BARAT', 'JAWA TENGAH', 'JAWA TIMUR', 'KALIMANTAN BARAT', 'KALIMANTAN SELATAN',
            'KALIMANTAN TENGAH', 'KALIMANTAN TIMUR', 'KALIMANTAN UTARA', 'KEPULAUAN RIAU', 'LAMPUNG',
            'MALUKU', 'MALUKU UTARA', 'NUSA TENGGARA BARAT', 'NUSA TENGGARA TIMUR', 'PAPUA', 'PAPUA BARAT',
            'PAPUA BARAT DAYA', 'PAPUA PEGUNUNGAN', 'PAPUA SELATAN', 'PAPUA TENGAH', 'RIAU', 'SULAWESI BARAT',
            'SULAWESI SELATAN', 'SULAWESI TENGAH', 'SULAWESI TENGGARA', 'SULAWESI UTARA', 'SUMATERA BARAT',
            'SUMATERA SELATAN', 'SUMATERA UTARA', 'YOGYAKARTA'
        ];

        // Tahun yang tersedia
        $yearData = [2024, 2025];

        // Ambil input dari form, dengan default untuk pertama kali halaman dibuka
        $provinceSelect = $request->input('provinsiSelect', 'JAWA TIMUR');
        $tanggal = $request->input('tanggalSelect', 1);
        $bulan = $request->input('bulanSelect', 1);
        $year = $request->input('tahunSelect', 2024);

        // get weather data
        $weatherData = ($this->getData($request))[0];

        // Mengembalikan data ke view
        return view('backend.cuaca.index', compact(
            'weatherData', 'year', 'provinceSelect', 'provinceData', 'yearData', 'tanggal', 'bulan', 'months'
        ));
    }

    public function fetch(Request $request)
    {
        $weatherData = $this->getData($request);
        
        $main = [];
        $main['provinceSelect'] = $request->input('provinsiSelect', 'JAWA TIMUR');
        $main['tanggal'] = $request->input('tanggalSelect', 1);
        $main['bulan'] = $request->input('bulanSelect', 1);
        $main['year'] = $request->input('tahunSelect', 2024);

        return response()->json(['data' => $weatherData['0'], 'main' => $main], 200);
    }

    public function getData(Request $request){
        $bulan = $request->input('bulanSelect', 1);
        $weatherData = [];
        $keys = ['temp', 'cloudcover', 'humidity', 'precip', 'windspeed', 'sealevelpressure'];
        

        for ($month = 1; $month <= 12; $month++) {
            try{
                $response = Http::retry(3, 1000)->timeout(60)->get("http://103.210.69.119:5000/predictions", [
                    'name' => $request->input('provinsiSelect', 'JAWA TIMUR'),
                    'tanggal' => $request->input('tanggalSelect', 1),
                    'bulan' => $month,
                    'tahun' => $request->input('tahunSelect', 2024),
                ]);

                $data = $response->json()[0];
                foreach ($keys as $key){
                    $weatherData[$month][$key] = number_format($data[$key], 1);
                }

            } catch (\Exception $e){
                foreach ($keys as $key) {
                    $weatherData[$month][$key] = null;
                }
            }
        }

        return [$weatherData[$bulan]];
    }
}
