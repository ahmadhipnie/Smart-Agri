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

        var bounds = L.latLngBounds(L.latLng(-11.0, 95.0), L.latLng(6.0, 141.0));
        map.setMaxBounds(bounds);
        map.on('drag', function() {
            map.panInsideBounds(bounds, {animate: false});
        });

        var markers = [];

        function updateMarkers(year) {
            preload();
            markers.forEach(function(marker) {
                map.removeLayer(marker);
            });
            markers = [];

            $.ajax({
                url: '{{ route('daerah.rawan.pangan.fetch') }}',
                type: 'GET',
                data: { year: year },
                success: function(response) {
                    $('#gif').addClass('d-none');
                    $('.mapInfo').removeClass('d-none');

                    response.forEach(function(item) {
                        var customIcon = L.icon({
                            iconUrl: item.icon,
                            iconSize: [32, 32],
                            iconAnchor: [16, 32]
                        });

                        var marker = L.marker([item.latitude, item.longitude], { icon: customIcon }).addTo(map);
                        marker.bindPopup("<strong>" + item.nama_provinsi + "</strong><br><strong>" + item.recommended_crop + "</strong><br>" + item.deskripsi);

                        markers.push(marker);
                    });
                }
            });
        }

        updateMarkers($('#year').val());

        $('#year').on('change', function() {
            var selectedYear = $(this).val();
            updateMarkers(selectedYear);
        });

        function preload(){
            $('#gif').removeClass('d-none');
            $('.mapInfo').addClass('d-none');
        }

    </script>
@endsection