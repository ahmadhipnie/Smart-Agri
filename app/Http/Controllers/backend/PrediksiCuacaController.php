<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PrediksiCuacaController extends Controller
{
    public function index()
    {
        $provinces = $this->getProvincesAndCities();

        return view('backend.cuaca.index', compact('provinces'));
    }


    public function fetchWeatherData(Request $request)
    {
        $provinsi = $request->input('provinsi');
        $kabupaten = $request->input('kabupaten');
        $bulan = str_pad($request->input('bulan'), 2, '0', STR_PAD_LEFT);
        $tahun = $request->input('tahun');

        $startDate = "$tahun-$bulan-01";
        $endDate = "$tahun-$bulan-" . cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);

        $apiKey = '293N98Y9M2J6Y6XPLLERL8XQ2'; //ganti api key yang baru dari buat akun(biar bisa)
        $url = "https://weather.visualcrossing.com/VisualCrossingWebServices/rest/services/timeline/$kabupaten/$startDate/$endDate?unitGroup=metric&key=$apiKey&contentType=json";

        $response = Http::get($url);

        Log::info('Request URL: ' . $url);
        Log::info('Response Status: ' . $response->status());
        Log::info('Response Body: ' . $response->body());

        $weatherData = $response->json();

        $cityName = $weatherData['address'] ?? 'Kota tidak diketahui';

        $provinces = $this->getProvincesAndCities();

        return view('backend.cuaca.index', compact('weatherData', 'cityName', 'provinces'));
    }


    public function getProvincesAndCities()
{
    $data = [
        'Aceh' => [
            'Banda Aceh',
            'Sabang',
            'Lhokseumawe',
            'Langsa',
            'Sigli',
            'Bireuen',
        ],
        'Sumatera Utara' => [
            'Medan',
            'Binjai',
            'Pematangsiantar',
            'Sibolga',
            'Tebing Tinggi',
            'Kisaran',
        ],
        'Sumatera Barat' => [
            'Padang',
            'Solok',
            'Bukittinggi',
            'Payakumbuh',
            'Pariaman',
        ],
        'Riau' => [
            'Pekanbaru',
            'Dumai',
            'Bengkalis',
            'Siak',
            'Pangkalan Kerinci',
        ],
        'Jambi' => [
            'Jambi',
            'Sungai Penuh',
            'Muaro Jambi',
        ],
        'Sumatera Selatan' => [
            'Palembang',
            'Prabumulih',
            'Lubuklinggau',
            'Baturaja',
        ],
        'Bengkulu' => [
            'Bengkulu',
            'Rejang Lebong',
            'Seluma',
        ],
        'Lampung' => [
            'Bandar Lampung',
            'Metro',
            'Pringsewu',
        ],
        'DKI Jakarta' => [
            'Jakarta Pusat',
            'Jakarta Utara',
            'Jakarta Barat',
            'Jakarta Selatan',
            'Jakarta Timur',
        ],
        'Jawa Barat' => [
            'Bandung',
            'Bogor',
            'Bekasi',
            'Cirebon',
            'Depok',
            'Tasikmalaya',
            'Sumedang',
            'Sukabumi',
        ],
        'Jawa Tengah' => [
            'Semarang',
            'Solo',
            'Magelang',
            'Tegal',
            'Salatiga',
            'Pekalongan',
        ],
        'DI Yogyakarta' => [
            'Yogyakarta',
            'Bantul',
            'Sleman',
            'Gunungkidul',
            'Kulon Progo',
        ],
        'Jawa Timur' => [
            'Surabaya',
            'Malang',
            'Kediri',
            'Banyuwangi',
            'Jember',
            'Bondowoso',
            'Sidoarjo',
        ],
        'Bali' => [
            'Denpasar',
            'Badung',
            'Gianyar',
            'Karangasem',
            'Buleleng',
        ],
        'Nusa Tenggara Barat' => [
            'Mataram',
            'Bima',
            'Sumbawa Besar',
        ],
        'Nusa Tenggara Timur' => [
            'Kupang',
            'Ruteng',
            'Maumere',
        ],
        'Kalimantan Barat' => [
            'Pontianak',
            'Singkawang',
            'Sambas',
        ],
        'Kalimantan Tengah' => [
            'Palangka Raya',
            'Sampit',
            'Pangkalan Bun',
        ],
        'Kalimantan Selatan' => [
            'Banjarmasin',
            'Banjarbaru',
            'Martapura',
        ],
        'Kalimantan Timur' => [
            'Samarinda',
            'Balikpapan',
            'Bontang',
        ],
        'Kalimantan Utara' => [
            'Tarakan',
            'Nunukan',
            'Malinau',
        ],
        'Sulawesi Utara' => [
            'Manado',
            'Bitung',
            'Tomohon',
        ],
        'Sulawesi Tengah' => [
            'Palu',
            'Donggala',
            'Poso',
        ],
        'Sulawesi Selatan' => [
            'Makassar',
            'Parepare',
            'Palopo',
        ],
        'Sulawesi Tenggara' => [
            'Kendari',
            'Baubau',
            'Buton',
        ],
        'Gorontalo' => [
            'Gorontalo',
            'Boalemo',
            'Pohuwato',
        ],
        'Maluku' => [
            'Ambon',
            'Tual',
        ],
        'Maluku Utara' => [
            'Ternate',
            'Tidore',
        ],
        'Papua Barat' => [
            'Manokwari',
            'Sorong',
            'Kaimana',
        ],
        'Papua' => [
            'Jayapura',
            'Merauke',
            'Sorong',
        ],
    ];

    return $data;

}
}
