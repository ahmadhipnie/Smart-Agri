<?php

namespace App\Service;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardService{

    public static function getData(Request $request){
        $year = $request->input('tahunSelect', 2024);
        $province = $request->input('provinsiSelect', 'JAWA TIMUR');
        $tanggal = $request->input('tanggalSelect', 1); 

        $temperatureData = $cloudcoverData = $humidityData = $precipData = $windspeedData = [];

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

        $allData = [
            'data' => [
                'temperatureData' => $temperatureData,
                'cloudcoverData' => $cloudcoverData,
                'humidityData' => $humidityData,
                'precipData' => $precipData,
                'windspeedData' => $windspeedData,
            ],
            'main' => [
                'province' => $request->input('provinsiSelect', 'JAWA TIMUR'),
                'year' => $request->input('tahunSelect', 2024),
                'tanggal' => $request->input('tanggalSelect', 1),
            ],
        ];
        return $allData;
    }
}