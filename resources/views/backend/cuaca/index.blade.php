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
                            <!-- Form untuk memilih provinsi, tanggal, bulan, dan tahun -->
                            <form action="{{ route('cuaca.fetch') }}" method="POST" class="d-flex justify-content-between w-100 flex-wrap">
                                @csrf
                                <div class="form-group mr-3">
                                    <label for="provinsiSelect">Nama Provinsi</label>
                                    <select name="provinsiSelect" class="form-control" id="provinsiSelect">
                                        <option value="">Pilih Provinsi</option>
                                        @foreach($provinceData as $province)
                                            <option value="{{ $province }}" {{ $province === $provinceSelect ? 'selected' : '' }}>
                                                {{ $province }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mr-3">
                                    <label for="tanggalSelect">Tanggal</label>
                                    <input type="number" name="tanggalSelect" class="form-control" id="tanggalSelect" min="1" max="31" value="{{ $tanggal }}">
                                </div>

                                <div class="form-group mr-3">
                                    <label for="bulanSelect">Bulan</label>
                                    <select name="bulanSelect" class="form-control" id="bulanSelect">
    @php
        $bulanNames = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];
    @endphp
    @foreach($bulanNames as $i => $name)
        <option value="{{ $i }}" {{ $i == $bulan ? 'selected' : '' }}>{{ $name }}</option>
    @endforeach
</select>

                                </div>

                                <div class="form-group mr-3">
                                    <label for="tahunSelect">Tahun</label>
                                    <select name="tahunSelect" class="form-control" id="tahunSelect">
                                        @foreach($yearData as $yearOption)
                                            <option value="{{ $yearOption }}" {{ $yearOption == $year ? 'selected' : '' }}>{{ $yearOption }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary align-self-end" style="background-color: #96a78d;">
                                    Dapatkan Data
                                </button>
                            </form>
                        </div>

                        <!-- Menampilkan informasi mengenai kota, tanggal, bulan, dan tahun yang dipilih -->
                        <div class="mt-4 text-center">
                            <h4>Data Prediksi Cuaca untuk Provinsi {{ $provinceSelect }}, Tanggal {{ $tanggal }}, Bulan {{ $bulan }}, Tahun {{ $year }}</h4>
                        </div>

                        @if(isset($weatherData[$bulan]) && !is_null($weatherData[$bulan]['temp']))
                            <div class="row mt-4">
                                <!-- Menampilkan informasi untuk bulan yang dipilih -->
                            

                                <!-- Data cuaca: Suhu -->
                                <div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
                                    <div class="widget-stat card bg-primary">
                                        <div class="card-body p-4">
                                            <div class="media">
                                                <span class="mr-3">
                                                    <i class="fas fa-thermometer-half"></i> 
                                                </span>
                                                <div class="media-body text-white text-right">
                                                    <p class="mb-1">Suhu</p>
                                                    <h4 class="text-white">{{ $weatherData[$bulan]['temp'] }} °C</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Data cuaca: Tutup Awan -->
                                <div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
                                    <div class="widget-stat card bg-primary">
                                        <div class="card-body p-4">
                                            <div class="media">
                                                <span class="mr-3">
                                                    <i class="fas fa-cloud"></i>
                                                </span>
                                                <div class="media-body text-white text-right">
                                                    <p class="mb-1">Tertutup Awan</p>
                                                    <h4 class="text-white">{{ $weatherData[$bulan]['cloudcover'] }}%</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Data cuaca: Kelembapan -->
                                <div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
                                    <div class="widget-stat card bg-primary">
                                        <div class="card-body p-4">
                                            <div class="media">
                                                <span class="mr-3">
                                                    <i class="fas fa-water"></i>
                                                </span>
                                                <div class="media-body text-white text-right">
                                                    <p class="mb-1">Kelembapan</p>
                                                    <h4 class="text-white">{{ $weatherData[$bulan]['humidity'] }}%</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Data cuaca: Presipitasi -->
                                <div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
                                    <div class="widget-stat card bg-primary">
                                        <div class="card-body p-4">
                                            <div class="media">
                                                <span class="mr-3">
                                                    <i class="fas fa-cloud-rain"></i>
                                                </span>
                                                <div class="media-body text-white text-right">
                                                    <p class="mb-1">Presipitasi</p>
                                                    <h4 class="text-white">{{ $weatherData[$bulan]['precip'] }} mm</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Data cuaca: Kecepatan Angin -->
                                <div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
                                    <div class="widget-stat card bg-primary">
                                        <div class="card-body p-4">
                                            <div class="media">
                                                <span class="mr-3">
                                                    <i class="fas fa-wind"></i>
                                                </span>
                                                <div class="media-body text-white text-right">
                                                    <p class="mb-1">Kecepatan Angin</p>
                                                    <h4 class="text-white">{{ $weatherData[$bulan]['windspeed'] }} km/jam</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Data cuaca: Tekanan Permukaan -->
                                <div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
                                    <div class="widget-stat card bg-primary">
                                        <div class="card-body p-4">
                                            <div class="media">
                                                <span class="mr-3">
                                                    <i class="fas fa-tachometer-alt"></i>
                                                </span>
                                                <div class="media-body text-white text-right">
                                                    <p class="mb-1">Tekanan Permukaan Laut</p>
                                                    <h4 class="text-white">{{ $weatherData[$bulan]['sealevelpressure'] }} hPa</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @else
                            <p class="mt-3 text-danger">Data tidak ditemukan atau terjadi kesalahan dalam memuat data.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
