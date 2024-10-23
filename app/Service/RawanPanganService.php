<?php

namespace App\Service;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RawanPanganService
{
    public static function getData(Request $request){
        // Koordinat untuk masing-masing provinsi
        $provinceCoordinates = config('provinceLatLang');

        $year = $request->input('year', date('Y'));
        $data = [];

        foreach ($provinceCoordinates as $province => $coordinates) {
            $totalHumidity = 0;
            $totalPrecipitation = 0;
            $totalTemperature = 0;
            $daysInMonth = cal_days_in_month(CAL_GREGORIAN, 7, $year); // Ganti bulan sesuai kebutuhan
            $dataCount = 0;

            // Mengambil data untuk setiap tanggal dalam bulan
            for ($day = 1; $day <= $daysInMonth; $day++) {
                // $response = Http::get("http://103.210.69.119:5000/predictions?name={$province}&tanggal={$day}&bulan=7&tahun={$year}");
                $response = Http::retry(3, 1000)->timeout(60)->get("http://103.210.69.119:5000/predictions", [
                    'name' => $province,
                    'tanggal' => $day,
                    'bulan' => 7,
                    'tahun' => $year,
                ]);
                $weatherData = $response->json();

                if (!empty($weatherData)) {
                    $totalHumidity += array_sum(array_column($weatherData, 'humidity'));
                    $totalPrecipitation += array_sum(array_column($weatherData, 'precip'));
                    $totalTemperature += array_sum(array_column($weatherData, 'temp'));
                    $dataCount++; 
                }
            }

            if ($dataCount > 0) {
                // Hitung rata-rata kelembaban, curah hujan, dan temperatur
                $avgHumidity = $totalHumidity / $dataCount;

                // Logika untuk menentukan rekomendasi tanaman berdasarkan data cuaca
                $recommendedCrop = self::getRecommendedCrop($avgHumidity, $province);
                
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
        return $data;
    }

    public static function getRecommendedCrop($avgHumidity, $province)
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