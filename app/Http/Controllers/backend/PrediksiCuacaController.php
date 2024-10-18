<?php
namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PrediksiCuacaController extends Controller
{
    public function index(Request $request)
    {
        $yearData = [2024, 2025];
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 
                    'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                ];

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

        // Ambil input dari form, dengan default untuk pertama kali halaman dibuka
        $prov = $request->input('prov', 'JAWA TIMUR');
        $date = $request->input('date', 1);
        $bulan = $request->input('month', 1);
        $year = $request->input('year', 2024);

        // Menyiapkan array untuk menampung data cuaca
        $weatherData = [];
        $keys = ['temp', 'cloudcover', 'humidity', 'precip', 'windspeed', 'sealevelpressure'];

        // Loop melalui setiap bulan untuk mendapatkan data cuaca
        for ($month = 1; $month <= 12; $month++) {
            // Request ke API untuk mengambil data prediksi cuaca
            $response = Http::retry(3, 1000)->timeout(60)->get("http://103.210.69.119:5000/predictions", [
                'name' => $prov,
                'tanggal' => $date,
                'bulan' => $month,
                'tahun' => $year,
            ]);

            if ($response->successful() && !empty($response->json()) && isset($response->json()[0])) {
                $data = $response->json()[0];

                foreach ($keys as $key) {
                    $weatherData[$month][$key] = number_format($data[$key], 1);
                }

            } else {
                foreach ($keys as $key) {
                    $weatherData[$month][$key] = null;
                }
            }
            
        }

        // Mengembalikan data ke view
        return view('backend.cuaca.index', compact(
            'weatherData', 'year', 'prov', 'provinceData', 'yearData', 'date', 'bulan', 'months'
        ));
    }
}
