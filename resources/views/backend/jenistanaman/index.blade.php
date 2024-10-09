@extends('layouts.master')

@section('header-title', 'Prediksi Tahun Tanam')

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

<div class="col-xl-11 mx-auto p-2 card">
    <div style="height: 130px;" class="d-flex align-items-center" style="background-color: #b8dcb8;">
        <div class="gambar mr-3">
            <img src="{{ asset('backend/images/padi.jpeg') }}" alt="Padi" width="130px" height="130px" style="border-radius: 10px;">
        </div>
        <div class="text">
            <p>Pada Padi bulan Januari sangat cocok untuk ditanami, karena kebutuhan air terpenuhi.</p>
            <p style="font-weight: bold;">Prediksi panen padi sekitar 90 hari</p>
        </div>
    </div>
</div>
<div class="col-xl-11 mx-auto p-2 card">
    <div style="height: 130px;" class="d-flex align-items-center" style="background-color: #b8dcb8;">
        <div class="gambar mr-3">
            <img src="{{ asset('backend/images/jagung.jpeg') }}" alt="Padi" width="130px" height="130px" style="border-radius: 10px;">
        </div>
        <div class="text">
            <p>Pada Jagung bulan Januari tidak cocok untuk ditanami, karena Curah Hujan yang tinggi menyebabkan jagung rentan terserang penyakit.</p>
            <p style="font-weight: bold;">Prediksi panen jagung sekitar 90 hari</p>
        </div>
    </div>
</div>
<div class="col-xl-11 mx-auto p-2 card">
    <div style="height: 130px;" class="d-flex align-items-center" style="background-color: #b8dcb8;">
        <div class="gambar mr-3">
            <img src="{{ asset('backend/images/ubi.jpg') }}" alt="Padi" width="130px" height="130px" style="border-radius: 10px;">
        </div>
        <div class="text">
            <p>Pada Ubi bulan Januari sangat cocok untuk ditanami, karena ubi membutuhkan tanah yang lembab dan air yang banyak untuk tumbuh dengan optimal.</p>
            <p style="font-weight: bold;">Prediksi panen ubi sekitar 90-105 hari</p>
        </div>
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