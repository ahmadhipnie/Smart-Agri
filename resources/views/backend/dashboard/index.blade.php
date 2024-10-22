@extends('layouts.master')

@section('header-title', 'Dashboard')

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
                            <form action="{{ route('dashboard.index') }}" id="dashboardForm" method="GET" class="d-flex w-100 flex-wrap">
                                <div class="form-group mr-3">
                                    <label for="tahunSelect">Tahun</label>
                                    <select class="form-control" id="tahunSelect" name="tahunSelect">
                                        @foreach ($yearData as $yr)
                                            <option value="{{ $yr }}" {{ request('tahunSelect') == $yr ? 'selected' : '' }}>{{ $yr }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mr-3">
                                    <label for="provinsiSelect">Nama Provinsi</label>
                                    <select class="form-control" id="provinsiSelect" name="provinsiSelect">
                                        @foreach ($provinceData as $prov)
                                            <option value="{{ $prov }}" {{ request('provinsiSelect') == $prov ? 'selected' : '' }}>{{ $prov }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mr-3">
                                    <label for="tanggalSelect">Tanggal</label>
                                    <select class="form-control" id="tanggalSelect" name="tanggalSelect">
                                        @for ($i = 1; $i <= 31; $i++)
                                            <option value="{{ $i }}" {{ request('tanggalSelect') == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary align-self-end" style="background-color: #96a78d;">
                                    Cari
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div id="gif" class="text-center d-none">
                            <img src="{{ asset('backend/gif/preloader.gif')}}" alt="Loading..." />
                            <p>Memuat data prediksi cuaca...</p>
                        </div>
                        <div class="chartInfo">
                            <div class="card-header info">
                                <h4>Prediksi Cuaca untuk {{ $province }} di Tahun {{ $year }}</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@include('script.dashboard')
