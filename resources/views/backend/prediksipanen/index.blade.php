@extends('layouts.master')

@section('header-title', 'Prediksi Panen')

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
                <form action="" class="d-flex justify-content-between w-100 flex-wrap">
                    <div class="form-group mr-3">
                        <label for="provinsiSelect">Nama Provinsi</label>
                        <select class="form-control" id="provinsiSelect">
                            <option value="">Jawa Timur</option>
                            <option value="">Jawa Tengah</option>
                            <option value="">Jawa Barat</option>
                        </select>
                    </div>
                    <div class="form-group mr-3">
                        <label for="kabupatenSelect">Nama Kabupaten</label>
                        <select class="form-control" id="kabupatenSelect">
                            <option value="">Kab. Jember</option>
                            <option value="">Kab. Bondowoso</option>
                            <option value="">Kab. Lumajang</option>
                        </select>
                    </div>
                    <div class="form-group mr-3">
                        <label for="bulanSelect">Bulan</label>
                        <select class="form-control" id="bulanSelect">
                            <option value="">Januari</option>
                            <option value="">Februari</option>
                            <option value="">Maret</option>
                        </select>
                    </div>
                    <div class="form-group mr-3">
                        <label for="tahunSelect">Tahun</label>
                        <select class="form-control" id="tahunSelect">
                            <option value="">2024</option>
                            <option value="">2023</option>
                            <option value="">2022</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary align-self-end" style="background-color: #96a78d;">
                        Cari
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-12 col-lg-6 col-md-12">
    <div class="row">
        <div class="col-md-6 mb-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<h4 class="card-title">Jenis Tanaman Pangan</h4>
                                <hr>
								<h3>Padi, Jagung, Ubi</h3>
							</div>
						</div>
                    </div>
                    <div class="col-md-3 mb-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<h4 class="card-title">Prediksi Panen</h4>
                                <hr>
								<h4>6.3 ton/ha</h4>
							</div>
						</div>
                    </div>
                    <div class="col-md-3 mb-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<h4 class="card-title">Varietas padi yang direkomendasikan</h4>
                                <hr>
								<h4>inpari 32</h4>
							</div>
						</div>
                    </div>
</div>
</div>
<div class="col-xl-12 col-lg-12 col-md-12">
    <div class="row">
        <div class="col-md-3 mb-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<h3 class="card-title">Kelebihan</h3>
                                <hr>
								<h4>1. Tahan penyakit kresek</h4>
                                <h4>2. Tahan penyakit bias</h4>
                                <h4>3. Tonase tinggi</h4>
                                <h4>4. Usia panen cepat</h4>
							</div>
						</div>
                    </div>
                    <div class="col-md-3 mb-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<h3 class="card-title">Kekurangan</h3>
                                <hr>
								<h4>1. Rentan hama wereng</h4>
                                <h4>2. Rentan hama sundep</h4>
                                <h4>3. Rentan roboh</h4>
							</div>
						</div>
                    </div>
                    <div class="col-md-6 mb-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<h4 class="card-title">Contoh Tanaman</h4>
								<img src="{{ asset('backend/images/padi.jpeg') }}" alt="Padi" width="300px" height="250px" style="border-radius: 10px;">
							</div>
						</div>
                    </div>
</div>
</div>
@endsection

@section('script')
<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/js/sweetalert2.min.js')}}"></script>
@endsection