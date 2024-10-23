@section('script')
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>

        window.addEventListener('load', function() {
            document.body.classList.add('loaded');
        });

        var chart;
        function renderChart(data) {
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
                        data: data.temperatureData
                    },
                    {
                        name: 'Cloudcover (%)',
                        data: data.cloudcoverData
                    },
                    {
                        name: 'Kelembaban (%)',
                        data: data.humidityData
                    },
                    {
                        name: 'Precipitation (mm)',
                        data: data.precipData
                    },
                    {
                        name: 'Kecepatan Angin (km/h)',
                        data: data.windspeedData
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
                            return val.toFixed(1); 
                        }
                    }
                },
                tooltip: {
                    x: {
                        formatter: function (val, opts) {
                            let bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                            let dataIndex = opts.dataPointIndex;
                            let tanggal = {{ request('tanggalSelect', 1) }};
                            return `${tanggal} ${bulan[dataIndex]} {{ $main['year'] }}`;
                        }
                    },
                    y: {
                        formatter: function (val) {
                            return `${val.toFixed(1)}`;
                        }
                    }
                },
                dataLabels: {
                    enabled: false
                }
            };

            if (chart) {
                chart.destroy();
            }

            chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
        }

        renderChart({
            temperatureData: @json($data['temperatureData']),
            cloudcoverData: @json($data['cloudcoverData']),
            humidityData: @json($data['humidityData']),
            precipData: @json($data['precipData']),
            windspeedData: @json($data['windspeedData'])
        });

        $('#dashboardForm').on('submit', function(e){
            e.preventDefault();
            preload();
            let dataDashboard = $('#dashboardForm').serialize();
            $.ajax({
                url: '{{ route('dashboard.fetch') }}',
                type: 'GET',
                data: dataDashboard,
                success: function(response) {
                    $('#gif').addClass('d-none');
                    $('.chartInfo').removeClass('d-none');
                    updateInfo(response.main);
                    renderChart(response.data);
                },
                error: function(xhr, status, error) {
                    console.log('Error: ' + error);
                }
            });
        })

        function preload(){
            $('#gif').removeClass('d-none');
            $('.chartInfo').addClass('d-none');
        }

        function updateInfo(data){
            let info = `
                <h4>Prediksi Cuaca untuk ${data.province} di Tahun ${data.year}</h4>
            `;

            $('.info').html(info);
        }

    </script>
@endsection