@section('script')
    <script>
        window.addEventListener('load', function() {
            document.body.classList.add('loaded');
        });
        
        $('#weatherForm').on('submit', function(e){
            e.preventDefault();
            preload();

            let dataRequest = $('#weatherForm').serialize()
            $.ajax({
                url: '{{ route('cuaca.fetch') }}',
                data: dataRequest,
                method: 'GET',
                success: function(res){
                    $('#gif').addClass('d-none');
                    addInfo(res.data, res.main);
                },
                error: function(err){
                    console.log(err);
                }
            });
        })

        function preload(){
            $('#gif').removeClass('d-none');
            $('.weatherInfo').html('');
        }

        function addInfo(data, main){
            let menu = `
            <div class="mt-4 text-center">
                <h4>Data Prediksi Cuaca untuk Provinsi ${main.provinceSelect}, Tanggal ${main.tanggal}, Bulan ${main.bulan}, Tahun ${main.year}</h4>
            </div>
    
             @if(isset($weatherData) && !is_null($weatherData['temp']))
             <div class="row mt-4 information">
                <div class="col-xl-4 col-lg-4 col-sm-6 mb-3">
                    <div class="widget-stat card bg-primary">
                        <div class="card-body p-4">
                            <div class="media">
                                <span class="mr-3">
                                    <i class="fas fa-thermometer-half"></i> 
                                </span>
                                <div class="media-body text-white text-right">
                                    <p class="mb-1">Suhu</p>
                                    <h4 class="text-white">${data.temp} °C</h4>
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
                                    <h4 class="text-white">${data.cloudcover}%</h4>
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
                                    <h4 class="text-white">${data.humidity}%</h4>
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
                                    <h4 class="text-white">${data.precip} mm</h4>
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
                                    <h4 class="text-white">${data.windspeed} km/jam</h4>
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
                                    <h4 class="text-white">${data.sealevelpressure} hPa</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
                <p class="mt-3 text-danger">Data tidak ditemukan atau terjadi kesalahan dalam memuat data.</p>
            @endif
            `;
            $('.weatherInfo').html(menu);
        }
    </script>
@endsection