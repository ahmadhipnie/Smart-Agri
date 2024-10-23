@extends('layouts.master')

@section('header-title', 'Hasil Uji Keleyakan Tanah')

@section('style')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<style>
   .containermap {
        height: 95vh;
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
        <div class="row">
            <!-- Sidebar Section (Kiri: 2 card atas dan 2 card bawah) -->
            <div class="col-xl-6 col-lg-6 col-md-12">
                <div class="row">
                    <!-- 2 Card Atas -->
                    <div class="col-xl-6 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-danger">
							<div class="card-body  p-4">
								<div class="media">
									<span class="mr-3">
										<i class="flaticon-381-calendar-1"></i>
									</span>
									<div class="media-body text-white text-right">
										<p class="mb-1">Suhu</p>
										<h4 class="text-white">30&deg;C</h4>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-success">
							<div class="card-body p-4">
								<div class="media">
									<span class="mr-3">
										<i class="flaticon-381-diamond"></i>
									</span>
									<div class="media-body text-white text-right">
										<p class="mb-1">Kelembaban</p>
										<h4 class="text-white">85% RH</h4>
									</div>
								</div>
							</div>
						</div>
                    </div>

                    <!-- 2 Card Bawah -->
                    <div class="col-xl-6 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-info">
							<div class="card-body p-4">
								<div class="media">
									<span class="mr-3">
										<i class="flaticon-381-heart"></i>
									</span>
									<div class="media-body text-white text-right">
										<p class="mb-1">PH</p>
										<h4 class="text-white">5,5</h4>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-primary">
							<div class="card-body p-4">
								<div class="media">
									<span class="mr-3">
										<i class="flaticon-381-user-7"></i>
									</span>
									<div class="media-body text-white text-right">
										<p class="mb-1">Salinitas</p>
										<h4 class="text-white">1 ds/m</h4>
									</div>
								</div>
							</div>
						</div>
                    </div>

                    <!-- 2 Card Horizontal -->
                    <div class="col-md-12 mb-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<h4 class="card-title">ketinggian</h4>
                                <hr>
								<h3>1300 mdpl</h3>
							</div>
						</div>
                    </div>
                    <div class="col-md-12 mb-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<h4 class="card-title">Waktu</h4>
                                <hr>
								<h4>9 Sep 2024 11.30 am</h4>
							</div>
						</div>
                    </div>
                </div>
            </div>
            <!-- Main Content Section (Kanan: Card full panjang ke bawah) -->
            <div class="col-xl-6 col-lg-6 col-md-12">

                <div style="height: 95vh;" class="card">
                    <div class="containermap">
                        <div id="map"></div>
                        </div>
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
    window.addEventListener('load', function() {
            document.body.classList.add('loaded');
        });
    var map = L.map('map', {
            center: [-0.7893, 113.9213],
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
</script>
@endsection
