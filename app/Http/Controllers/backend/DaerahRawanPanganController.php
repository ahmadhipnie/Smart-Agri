<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DaerahRawanPanganController extends Controller
{
    // Koordinat untuk masing-masing provinsi
    private $provinceCoordinates = [
        'ACEH' => ['latitude' => 4.695135, 'longitude' => 96.749397], // Provinsi di Sumatra
        'BANGKA BELITUNG' => ['latitude' => -2.7363, 'longitude' => 106.2247], // Provinsi di Sumatra
        'BANTEN' => ['latitude' => -6.3748, 'longitude' => 106.6002], // Provinsi di Pulau Jawa
        'BENGKULU' => ['latitude' => -3.8004, 'longitude' => 102.2652], // Provinsi di Sumatra
        'JAKARTA' => ['latitude' => -6.2088, 'longitude' => 106.8456], // Provinsi di Pulau Jawa
        'JAMBI' => ['latitude' => -1.6014, 'longitude' => 103.6100], // Provinsi di Sumatra
        'JAWA BARAT' => ['latitude' => -7.1966, 'longitude' => 107.9347], // Provinsi di Pulau Jawa
        'JAWA TENGAH' => ['latitude' => -7.3294, 'longitude' => 110.3491], // Provinsi di Pulau Jawa
        'JAWA TIMUR' => ['latitude' => -7.9824, 'longitude' => 112.6165], // Provinsi di Pulau Jawa
        'LAMPUNG' => ['latitude' => -5.3604, 'longitude' => 105.2704], // Provinsi di Sumatra
        'RIAU' => ['latitude' => 0.4644, 'longitude' => 101.4470], // Provinsi di Sumatra
        'SUMATERA BARAT' => ['latitude' => -0.5202, 'longitude' => 100.3680], // Provinsi di Sumatra
        'SUMATERA SELATAN' => ['latitude' => -3.0322, 'longitude' => 104.7539], // Provinsi di Sumatra
        'SUMATERA UTARA' => ['latitude' => 2.0718, 'longitude' => 99.5683], // Provinsi di Sumatra
        'YOGYAKARTA' => ['latitude' => -7.7956, 'longitude' => 110.3688], // Provinsi di Pulau Jawa


        
        //provinsi diluar pulau jawa & sumatra, aktifin aja tapi kena max execution nanti sama laravel karena datanya kebanyakan, kalau dihosting bisa, tapi lama prosesnya

    // 'BALI' => ['latitude' => -8.409518, 'longitude' => 115.188919], // Provinsi di Bali
        // 'GORONTALO' => ['latitude' => 0.6015, 'longitude' => 123.0536], // Provinsi di Sulawesi
        // 'KALIMANTAN BARAT' => ['latitude' => -0.7110, 'longitude' => 109.7453], // Provinsi di Kalimantan
        // 'KALIMANTAN SELATAN' => ['latitude' => -3.1583, 'longitude' => 115.2490], // Provinsi di Kalimantan
        // 'KALIMANTAN TENGAH' => ['latitude' => -2.6001, 'longitude' => 113.7852], // Provinsi di Kalimantan
        // 'KALIMANTAN TIMUR' => ['latitude' => -1.0943, 'longitude' => 116.9803], // Provinsi di Kalimantan
        // 'KALIMANTAN UTARA' => ['latitude' => 2.6111, 'longitude' => 117.6576], // Provinsi di Kalimantan
        // 'KEPULAUAN RIAU' => ['latitude' => 0.4869, 'longitude' => 104.2106], // Provinsi di Riau
        // 'MALUKU' => ['latitude' => -3.2478, 'longitude' => 128.1304], // Provinsi di Maluku
        // 'MALUKU UTARA' => ['latitude' => 1.4127, 'longitude' => 127.3445], // Provinsi di Maluku
        // 'NUSA TENGGARA BARAT' => ['latitude' => -8.6582, 'longitude' => 116.2603], // Provinsi di Nusa Tenggara
        // 'NUSA TENGGARA TIMUR' => ['latitude' => -10.8131, 'longitude' => 121.2951], // Provinsi di Nusa Tenggara
        // 'PAPUA' => ['latitude' => -4.5170, 'longitude' => 135.1219], // Provinsi di Papua
        // 'PAPUA BARAT' => ['latitude' => -2.2636, 'longitude' => 132.6997], // Provinsi di Papua
        // 'PAPUA BARAT DAYA' => ['latitude' => -5.0014, 'longitude' => 131.0124], // Provinsi di Papua
        // 'PAPUA PEGUNUNGAN' => ['latitude' => -4.0815, 'longitude' => 140.4545], // Provinsi di Papua
        // 'PAPUA SELATAN' => ['latitude' => -5.6715, 'longitude' => 138.5637], // Provinsi di Papua
        // 'PAPUA TENGAH' => ['latitude' => -4.6107, 'longitude' => 138.5264], // Provinsi di Papua
        // 'SULAWESI BARAT' => ['latitude' => -2.7010, 'longitude' => 118.8707], // Provinsi di Sulawesi
        // 'SULAWESI SELATAN' => ['latitude' => -3.1009, 'longitude' => 119.8512], // Provinsi di Sulawesi
        // 'SULAWESI TENGAH' => ['latitude' => -1.9402, 'longitude' => 120.8672], // Provinsi di Sulawesi
        // 'SULAWESI TENGGARA' => ['latitude' => -4.0083, 'longitude' => 121.6021], // Provinsi di Sulawesi
        // 'SULAWESI UTARA' => ['latitude' => 1.6207, 'longitude' => 124.8258], // Provinsi di Sulawesi
    ];

    public function index(Request $request)
    {
        $year = $request->input('year', date('Y'));
        $data = [];

        foreach ($this->provinceCoordinates as $province => $coordinates) {
            $totalHumidity = 0;
            $totalPrecipitation = 0;
            $totalTemperature = 0;
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, 7, $year); // Ganti bulan sesuai kebutuhan
            $dataCount = 0;

            // Mengambil data untuk setiap tanggal dalam bulan
            for ($day = 1; $day <= $daysInMonth; $day++) {
                $response = Http::get("http://103.210.69.119:5000/predictions?name={$province}&tanggal={$day}&bulan=7&tahun={$year}"); // Ganti bulan sesuai kebutuhan
                $weatherData = $response->json();

                if (!empty($weatherData)) {
                    $totalHumidity += array_sum(array_column($weatherData, 'humidity'));
                    $totalPrecipitation += array_sum(array_column($weatherData, 'precip'));
                    $totalTemperature += array_sum(array_column($weatherData, 'temp'));
                    $dataCount++; // Hitung jumlah data yang valid
                }
            }

            if ($dataCount > 0) {
                // Hitung rata-rata kelembaban, curah hujan, dan temperatur
                $avgHumidity = $totalHumidity / $dataCount;
                $avgPrecipitation = $totalPrecipitation / $dataCount;
                $avgTemperature = $totalTemperature / $dataCount;

                // Logika untuk menentukan rekomendasi tanaman berdasarkan data cuaca
                $recommendedCrop = $this->getRecommendedCrop($avgHumidity, $province);
                
                $data[] = [
                    'nama_provinsi' => $province,
                    'latitude' => $coordinates['latitude'],
                    'longitude' => $coordinates['longitude'],
                    'recommended_crop' => $recommendedCrop['name'],
                    'deskripsi' => $recommendedCrop['description'],
                    'icon' => $recommendedCrop['icon'],
                ];
            }
        }

        return view('backend.daerahpangan.index', compact('data'));
    }

    private function getRecommendedCrop($avgHumidity, $province)
    {
        // Pilih bulan secara acak dari kelompok yang ditentukan
        $monthRanges = [
            'Januari-Maret' => ['Januari', 'Februari', 'Maret'],
            'April-Mei' => ['April', 'Mei'],
            'Juni-Juli' => ['Juni', 'Juli'],
            'September-Desember' => ['September', 'Oktober', 'November', 'Desember'],
        ];

        // Memilih rentang bulan secara acak
        $randomRange = array_rand($monthRanges);
        $randomMonth = $monthRanges[$randomRange][array_rand($monthRanges[$randomRange])];

        // Deskripsi awal dengan bulan acak
        $description = "Di provinsi {$province}, tanaman ini sangat cocok ditanam pada periode {$randomRange}, khususnya bulan {$randomMonth}, karena rata-rata kelembaban adalah " . round($avgHumidity, 2) . "%.";

        // Rekomendasi tanaman berdasarkan kelembaban
        if ($avgHumidity >= 75 && $avgHumidity <= 100) {
            return [
                'name' => 'Padi',
                'description' => $description . ' Padi sangat cocok ditanam karena kondisi lembab dan cukup hujan.',
                'icon' => '/backend/icons/iconPadi.png',
            ];
        } elseif ($avgHumidity >= 60 && $avgHumidity < 75) {
            return [
                'name' => 'Kedelai',
                'description' => $description . ' Kedelai dapat ditanam pada kondisi kelembapan sedang dan curah hujan yang cukup.',
                'icon' => '/backend/icons/iconKedelai.png',
            ];
        } elseif ($avgHumidity >= 48 && $avgHumidity < 60) {
            return [
                'name' => 'Jagung',
                'description' => $description . ' Jagung lebih cocok ditanam di daerah kering dengan kelembapan yang lebih rendah.',
                'icon' => '/backend/icons/iconJagung.png',
            ];
        }

        // Jika tidak ada rekomendasi
        return [
            'name' => 'Tidak ada rekomendasi',
            'description' => 'Kondisi kelembapan tidak mendukung untuk penanaman.',
            'icon' => '',
        ];
    }
}
