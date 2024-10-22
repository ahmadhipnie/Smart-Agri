@extends('layouts.master')

@section('header-title', 'Daerah Rawan Pangan')

@section('style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<style>
    .containermap {
        height: 80vh;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1), 0 6px 10px rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        position: relative; 
    }
    #map {
        margin: 0;
        height: 100%;
        width: 100%;
        border-radius: 20px;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 2;
    }
    .leaflet-control-attribution {
        display: none;
    }
</style>
@endsection

@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="col-xl-12 p-2">
            <div class="card">
                <div class="card-body">
                    <form method="GET" action="{{ route('filter.tahun') }}">
                        <div class="form-group">
                            <label for="year">Pilih Tahun:</label>
                            <div class="d-flex align-items-center">
                                <select name="year" id="year" class="form-control mr-2" style="width: 200px;">
                                    @for ($i = 2024; $i <= 2025; $i++)
                                        <option value="{{ $i }}" {{ $i == request('year', date('Y')) ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div style="height: 80vh;" class="card">
            <div id="gif" class="text-center d-none">
                <img src="{{ asset('backend/gif/preloader.gif')}}" alt="Loading..." />
                <p>Memuat data prediksi Daerah Rawan Pangan...</p>
            </div>
            <div class="containermap mapInfo">
                <div id="map"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@include('script.daerahRawanPangan')
