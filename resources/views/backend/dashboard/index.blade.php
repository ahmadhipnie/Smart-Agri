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
                            <form action="{{ route('dashboard.index') }}" method="GET" class="d-flex w-100 flex-wrap">
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
                        <div class="card-header">
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
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
var options = {
    chart: {
        type: 'line',
        height: 350,
        zoom: {
            enabled: false
        }
    },
    series: [
        {
            name: 'Suhu (°C)',
            data: @json($temperatureData)
        },
        {
            name: 'Cloudcover (%)',
            data: @json($cloudcoverData)
        },
        {
            name: 'Kelembaban (%)',
            data: @json($humidityData)
        },
        {
            name: 'Precipitation (mm)',
            data: @json($precipData)
        },
        {
            name: 'Kecepatan Angin (km/h)',
            data: @json($windspeedData)
        }
    ],
    xaxis: {
        categories: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
        labels: {
            style: {
                fontSize: '12px'
            }
        }
    },
    yaxis: {
        labels: {
            formatter: function (val) {
                return val.toFixed(1); // Format labels to 1 decimal place
            }
        }
    },
    tooltip: {
        x: {
            formatter: function (val, opts) {
                let bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                let dataIndex = opts.dataPointIndex;
                let tanggal = {{ request('tanggalSelect', 1) }};
                return `${tanggal} ${bulan[dataIndex]} {{ $year }}`;
            }
        },
        y: {
            formatter: function (val) {
                return `${val.toFixed(1)}`;
            }
        }
    },
    dataLabels: {
        enabled: false // Disable data labels (the blue boxes)
    }
};

var chart = new ApexCharts(document.querySelector("#chart"), options);
chart.render();
</script>

@endsection
