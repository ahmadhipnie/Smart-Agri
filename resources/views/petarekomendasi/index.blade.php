<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Rekomendasi</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
        }
        #map {
            height: 100vh;
            width: 100%;
        }
        .leaflet-control-attribution {
            display: none;
        }
    </style>
</head>
<body>
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
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
</body>
</html>
