<?php
namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PrediksiCuacaController extends Controller
{
    public function index(Request $request)
    {
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

        // Menyiapkan array untuk menampung data cuaca
        $weatherData = [];

        // Loop melalui setiap bulan untuk mendapatkan data cuaca
        for ($month = 1; $month <= 12; $month++) {
            // Request ke API untuk mengambil data prediksi cuaca
            $response = Http::retry(3, 1000)->timeout(60)->get("http://103.210.69.119:5000/predictions", [
                'name' => $provinceSelect,
                'tanggal' => $tanggal,
                'bulan' => $month,
                'tahun' => $year,
            ]);

            // Jika API merespon dengan sukses, masukkan data ke dalam array
            if ($response->successful() && !empty($response->json()) && isset($response->json()[0])) {
                $data = $response->json()[0];
                $weatherData[$month] = [
                    'temp' => number_format($data['temp'] ?? null, 1), // Membulatkan suhu ke 1 desimal
                    'cloudcover' => number_format($data['cloudcover'] ?? null, 1), // Membulatkan tutup awan ke 1 desimal
                    'humidity' => number_format($data['humidity'] ?? null, 1), // Membulatkan kelembapan ke 1 desimal
                    'precip' => number_format($data['precip'] ?? null, 1), // Membulatkan presipitasi ke 1 desimal
                    'windspeed' => number_format($data['windspeed'] ?? null, 1), // Membulatkan kecepatan angin ke 1 desimal
                    'sealevelpressure' => number_format($data['sealevelpressure'] ?? null, 1), // Membulatkan tekanan udara ke 1 desimal
                ];
            } else {
                // Jika data tidak tersedia, isi dengan null
                $weatherData[$month] = [
                    'temp' => null,
                    'cloudcover' => null,
                    'humidity' => null,
                    'precip' => null,
                    'windspeed' => null,
                    'sealevelpressure' => null,
                ];
            }
        }

        // Mengembalikan data ke view
        return view('backend.cuaca.index', compact(
            'weatherData', 'year', 'provinceSelect', 'provinceData', 'yearData', 'tanggal', 'bulan'
        ));
    }

    // Fungsi untuk menangani POST request dan redirect ke index
    public function fetch(Request $request)
    {
        // Redirect ke index dengan input yang dipilih
        return redirect()->route('cuaca.index', [
            'provinsiSelect' => $request->input('provinsiSelect'),
            'tanggalSelect' => $request->input('tanggalSelect'),
            'bulanSelect' => $request->input('bulanSelect'),
            'tahunSelect' => $request->input('tahunSelect'),
        ]);
    }
}
