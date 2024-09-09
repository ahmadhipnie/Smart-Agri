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
        position: absolute; /* Ubah menjadi posisi absolut */
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

    // Custom icons
    var cornIcon = L.icon({
        iconUrl: '/backend/icons/iconJagung.png',
        iconSize: [32, 32], // ukuran ikon
        iconAnchor: [16, 32] // titik jangkar ikon
    });

    var riceIcon = L.icon({
        iconUrl: '/backend/icons/iconPadi.png',
        iconSize: [32, 32],
        iconAnchor: [16, 32]
    });

    var cassavaIcon = L.icon({
        iconUrl: '/backend/icons/iconSingkong.png',
        iconSize: [32, 32],
        iconAnchor: [16, 32]
    });

    // Menambahkan marker dengan ikon custom ke lokasi yang diinginkan
    L.marker([-7.797068, 110.370529], {icon: riceIcon}).addTo(map).bindPopup("Padi");
    L.marker([-3.318606, 114.592339], {icon: cornIcon}).addTo(map).bindPopup("Jagung");
    L.marker([-2.548926, 118.014863], {icon: cassavaIcon}).addTo(map).bindPopup("Singkong");
    L.marker([0.7893, 113.9213], {icon: cornIcon}).addTo(map).bindPopup("Jagung");
    L.marker([-4.269928, 138.080353], {icon: cassavaIcon}).addTo(map).bindPopup("Singkong");

</script>
@endsection
