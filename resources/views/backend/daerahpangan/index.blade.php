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
            <form method="GET" action="{{ route('filter.bulan') }}">
                <div class="form-group">
                    <label for="month">Pilih Bulan:</label>
                    <div class="d-flex align-items-center">
                        <select name="month" id="month" class="form-control mr-2" style="width: 200px;">
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>




            <div style="height: 80vh;" class="card">
                <div class="containermap">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('script')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    var map = L.map('map', {
        center: [-0.7893, 113.9213], // Titik pusat Indonesia
        zoom: 5,
        maxZoom: 10,
        minZoom: 4,
        zoomControl: true
    });

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var bounds = L.latLngBounds(
        L.latLng(-11.0, 95.0), 
        L.latLng(6.0, 141.0) 
    );
    map.setMaxBounds(bounds);
    
    map.on('drag', function() {
        map.panInsideBounds(bounds, {animate: false});
    });

    map.on('zoomend', function() {
        if (map.getZoom() > 10) {
            map.setZoom(10);
        }
        if (map.getZoom() < 4) {
            map.setZoom(4);
        }
    });

    // Menambahkan marker dengan ikon custom dari data
    @foreach($data as $item)
        var customIcon = L.icon({
            iconUrl: '{{ $item->gambar }}', // Mengambil path gambar dari database
            iconSize: [32, 32],
            iconAnchor: [16, 32]
        });

        var marker = L.marker([{{ $item->latitude }}, {{ $item->longitude }}], {icon: customIcon}).addTo(map);

        marker.bindPopup("<strong>{{ $item->nama_tanamanpangan }}</strong><br>{{ $item->deskripsi }}<br><small>{{ $item->tanggal ? $item->tanggal : 'Tanggal tidak tersedia' }}</small>");
    @endforeach
</script>
@endsection
