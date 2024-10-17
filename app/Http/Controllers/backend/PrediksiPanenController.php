<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PrediksiPanenController extends Controller
{
    public function index()
    {
        $provinces = $this->getProvincesAndCities();
        $months = [
                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $years = ['2024', '2023', '2022', '2021', '2020', '2019'];
        return view('backend.prediksipanen.index', compact('provinces', 'months', 'years'));
    }

    public function getProvincesAndCities()
    {
        $path = database_path('data/regions.json');
        $json = file_get_contents($path);

        $regions = json_decode($json, true);

        return $regions;
    }
}