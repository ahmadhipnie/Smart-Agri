<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PrediksiPanenController extends Controller
{
    public function index()
    {
        $provinces = $this->getProvincesAndCities();
        return view('backend.prediksipanen.index', compact('provinces'));
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