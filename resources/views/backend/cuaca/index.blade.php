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
                            <form action="{{ route('cuaca.index') }}" method="GET" class="d-flex justify-content-between w-100 flex-wrap">
                                @csrf
                                <div class="form-group mr-3">
                                    <label for="prov">Nama Provinsi</label>
                                    <select name="prov" class="form-control select" id="prov">
                                        <option value="">Pilih Provinsi</option>
                                        @foreach($provinceData as $province)
                                            <option value="{{ $province }}" {{ $province === $prov ? 'selected' : '' }}>
                                                {{ $province }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mr-3">
                                    <label for="date">Tanggal</label>
                                    <input type="number" name="date" style="width: auto" class="form-control select" id="date" min="1" max="31" value="{{ $date }}">
                                </div>

                                <div class="form-group mr-3">
                                    <label for="month">Bulan</label>
                                    <select name="month" class="form-control select" id="month">
                                        @foreach($months as $i => $month)
                                            <option value="{{ $i + 1 }}" {{ ($i + 1) == $bulan ? 'selected' : '' }}>{{ $month }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mr-3">
                                    <label for="year">Tahun</label>
                                    <select name="year" class="form-control select" id="year">
                                        @foreach($yearData as $yearOption)
                                            <option value="{{ $yearOption }}" {{ $yearOption == $year ? 'selected' : '' }}>{{ $yearOption }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </form>
                        </div>

                        <!-- Menampilkan informasi mengenai kota, tanggal, bulan, dan tahun yang dipilih -->
                        <div class="mt-4 text-center">
                            <h4>Data Prediksi Cuaca untuk Provinsi {{ $prov }}, Tanggal {{ $date }}, Bulan {{ $bulan }}, Tahun {{ $year }}</h4>
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

@section('script')
    <script>
        $('.select').change(function() {
            const urlLocation = document.location.href.split('?')[0];
            const urlParam = new URLSearchParams(window.location.search);
            urlParam.set(this.id, this.value);

            $('.select').each(function() {
                if (this.value) {
                    urlParam.set(this.id, this.value);
                }
            });
            document.location.href = `${urlLocation}?${urlParam.toString()}`;
        
        });
    </script>
@endsection
