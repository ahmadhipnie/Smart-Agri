@extends('layouts.master')

@section('header-title', 'Prediksi Cuaca')

@section('css')
@endsection

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                        <form action="{{ route('cuaca.fetch') }}" method="POST" class="d-flex justify-content-between w-100 flex-wrap">
                                @csrf
                                <div class="form-group mr-3">
                                <label for="provinsiSelect">Nama Provinsi</label>
                                <select name="provinsi" class="form-control" id="provinsiSelect" onchange="updateCities()">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach($provinces as $province => $cities)
                                        <option value="{{ $province }}">{{ $province }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mr-3">
                                <label for="kabupatenSelect">Nama Kabupaten</label>
                                <select name="kabupaten" class="form-control" id="kabupatenSelect">
                                    <option value="">Pilih Kabupaten</option>
                                </select>
                            </div>
                                <div class="form-group mr-3">
                                    <label for="bulanSelect">Bulan</label>
                                    <select name="bulan" class="form-control" id="bulanSelect">
                                    <option value="01">Januari</option>
                                    <option value="02">Februari</option>
                                    <option value="03">Maret</option>
                                    <option value="04">April</option>
                                    <option value="05">Mei</option>
                                    <option value="06">Juni</option>
                                    <option value="07">Juli</option>
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>

                                    </select>
                                </div>
                                <div class="form-group mr-3">
                                    <label for="tahunSelect">Tahun</label>
                                    <select name="tahun" class="form-control" id="tahunSelect">
                                        <option value="2024">2024</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2024">2021</option>
                                        <option value="2023">2020</option>
                                        <option value="2022">2019</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary align-self-end" style="background-color: #96a78d;">
                                    Dapatkan
                                </button>
                            </form>

                        </div>

                        @if(isset($weatherData['days']))
    <div class="row mt-4">
        @foreach($weatherData['days'] as $day)
            <div class="col-xl-12 text-center d-flex align-items-center w-100">
                <div class="widget-stat card mr-2 bg-info" style="height: 50px;">
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <div class="infonya d-flex">
                            <i class="fas fa-calendar-alt mr-2 text-white"></i>
                            <h5 class="text-white">{{ $day['datetime'] }}</h5> 
                        </div>
                    </div>
                </div>
                <div class="widget-stat card bg-success" style="height: 50px;">
                    <div class="card-body d-flex justify-content-center align-items-center">
                        <div class="infonya d-flex">
                            <i class="fas fa-map-marker-alt text-white mr-2"></i>
                            <h5 class="text-white">{{ $cityName }}</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
                <div class="widget-stat card bg-primary">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fas fa-thermometer-half"></i> 
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Suhu Maks</p>
                                <h4 class="text-white">{{ $day['tempmax'] }} °C</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
                <div class="widget-stat card bg-primary">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fas fa-thermometer-empty"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Suhu Minimum</p>
                                <h4 class="text-white">{{ $day['tempmin'] }} °C</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
                <div class="widget-stat card bg-primary">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fas fa-water"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Kelembapan</p>
                                <h4 class="text-white">{{ $day['humidity'] }}%</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
                <div class="widget-stat card bg-primary">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fas fa-cloud-rain"></i> 
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Curah Hujan</p>
                                <h4 class="text-white">{{ $day['precip'] }} mm</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
                <div class="widget-stat card bg-primary">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fas fa-percent"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Probabilitas Hujan</p>
                                <h4 class="text-white">{{ $day['precipprob'] }}%</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
                <div class="widget-stat card bg-primary">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fas fa-wind"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Kecepatan Angin</p>
                                <h4 class="text-white">{{ $day['windspeed'] }} km/h</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
                <div class="widget-stat card bg-primary">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fas fa-sun"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Sinar Matahari</p>
                                <h4 class="text-white">{{ $day['solarradiation'] }} W/m²</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
                <div class="widget-stat card bg-primary">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="mr-3">
                                <i class="fas fa-cloud-sun"></i> 
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Kondisi Cuaca</p>
                                <h4 class="text-white">{{ $day['conditions'] }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
                <div class="widget-stat card bg-primary">
                    <div class="card-body p-4">
                        <div class="media">
                            <span class="mr-3">
                            <i class="fas fa-cloud"></i>
                            </span>
                            <div class="media-body text-white text-right">
                                <p class="mb-1">Deskripsi</p>
                                <h6 class="text-white">{{ $day['description'] }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p>Silakan pilih provinsi dan kota untuk mengetahui data cuaca.</p>
@endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
const citiesByProvince = {
    'Aceh': ['Banda Aceh', 'Sabang', 'Lhokseumawe', 'Langsa', 'Sigli', 'Bireuen'],
    'Sumatera Utara': ['Medan', 'Binjai', 'Pematangsiantar', 'Sibolga', 'Tebing Tinggi', 'Kisaran'],
    'Sumatera Barat': ['Padang', 'Solok', 'Bukittinggi', 'Payakumbuh', 'Pariaman'],
    'Riau': ['Pekanbaru', 'Dumai', 'Bengkalis', 'Siak', 'Pangkalan Kerinci'],
    'Jambi': ['Jambi', 'Sungai Penuh', 'Muaro Jambi'],
    'Sumatera Selatan': ['Palembang', 'Prabumulih', 'Lubuklinggau', 'Baturaja'],
    'Bengkulu': ['Bengkulu', 'Rejang Lebong', 'Seluma'],
    'Lampung': ['Bandar Lampung', 'Metro', 'Pringsewu'],
    'DKI Jakarta': ['Jakarta Pusat', 'Jakarta Utara', 'Jakarta Barat', 'Jakarta Selatan', 'Jakarta Timur'],
    'Jawa Barat': ['Bandung', 'Bogor', 'Bekasi', 'Cirebon', 'Depok', 'Tasikmalaya', 'Sumedang', 'Sukabumi'],
    'Jawa Tengah': ['Semarang', 'Solo', 'Magelang', 'Tegal', 'Salatiga', 'Pekalongan'],
    'DI Yogyakarta': ['Yogyakarta', 'Bantul', 'Sleman', 'Gunungkidul', 'Kulon Progo'],
    'Jawa Timur': ['Surabaya', 'Malang', 'Kediri', 'Banyuwangi', 'Jember', 'Bondowoso', 'Sidoarjo'],
    'Bali': ['Denpasar', 'Badung', 'Gianyar', 'Karangasem', 'Buleleng'],
    'Nusa Tenggara Barat': ['Mataram', 'Bima', 'Sumbawa Besar'],
    'Nusa Tenggara Timur': ['Kupang', 'Ruteng', 'Maumere'],
    'Kalimantan Barat': ['Pontianak', 'Singkawang', 'Sambas'],
    'Kalimantan Tengah': ['Palangka Raya', 'Sampit', 'Pangkalan Bun'],
    'Kalimantan Selatan': ['Banjarmasin', 'Banjarbaru', 'Martapura'],
    'Kalimantan Timur': ['Samarinda', 'Balikpapan', 'Bontang'],
    'Kalimantan Utara': ['Tarakan', 'Nunukan', 'Malinau'],
    'Sulawesi Utara': ['Manado', 'Bitung', 'Tomohon'],
    'Sulawesi Tengah': ['Palu', 'Donggala', 'Poso'],
    'Sulawesi Selatan': ['Makassar', 'Parepare', 'Palopo'],
    'Sulawesi Tenggara': ['Kendari', 'Baubau', 'Buton'],
    'Gorontalo': ['Gorontalo', 'Boalemo', 'Pohuwato'],
    'Maluku': ['Ambon', 'Tual'],
    'Maluku Utara': ['Ternate', 'Tidore'],
    'Papua Barat': ['Manokwari', 'Sorong', 'Kaimana'],
    'Papua': ['Jayapura', 'Merauke', 'Sorong'],
};


    function updateCities() {
        const provinceSelect = document.getElementById('provinsiSelect');
        const citySelect = document.getElementById('kabupatenSelect');
        const selectedProvince = provinceSelect.value;

        // Hapus opsi kota yang ada
        citySelect.innerHTML = '<option value="">Pilih Kabupaten</option>';

        if (selectedProvince in citiesByProvince) {
            const cities = citiesByProvince[selectedProvince];
            cities.forEach(city => {
                const option = document.createElement('option');
                option.value = city.toLowerCase(); // Mengubah nama kota menjadi lowercase untuk URL
                option.textContent = city;
                citySelect.appendChild(option);
            });
        }
    }
</script>
@endsection
