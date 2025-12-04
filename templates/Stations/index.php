<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electromov</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/estilazo.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>

<body>
    <section class="map-section-staions">
        <h2>Escoge tu estación y un vehiculo</h2>
        <div id="map">
        </div>
        <script>

                // 1. Get the stations data passed from PHP, converting it to a JS array
            // We use the PHP variable $stationsData, which is now available.
            const stationLocations = <?= json_encode($stationsData) ?>;
          var map = L.map('map').setView([20.68097, -101.37954], 13);

            L.tileLayer('https://api.maptiler.com/maps/streets-v4/{z}/{x}/{y}.png?key=dPzx6RQTiPhK08NfWVKU', {
                attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>'
            }).addTo(map);

                // 4. Loop through stations and add markers
            stationLocations.forEach(function(station) {
                // Create the marker using the coordinates
                // Note: The fields in the JS object must match the fields selected in the Controller ('latitude', 'longitude', 'name')
                const marker = L.marker([station.latitude, station.longitude]).addTo(map);
                
                // Add a popup with the station name (Public View requirement)
                marker.bindPopup("<b>" + station.name + "</b><br>Station").openPopup();
            });

        </script>
    </section>

    <section>
        <script>
            stationLocations.forEach(function(station) {

                if (station.id) {
                // Use a template literal (backticks ``) for clean string formatting:
        const url = `/stations/view/${station.id}`; // Link to the station's detail page 
                
                // Create the button/link element with the station name.
                const buttonHtml = `
                    <div class="station-popup">
                        <b>${station.name}</b>
                        <a href="${url}" class="view-vehicles-btn">
                            Ver vehículos
                        </a>
                    </div>
                `;

                L.marker([station.latitude, station.longitude])
                    .bindPopup(buttonHtml)
                    .addTo(map);
                }
            });
        </script>
    </section>

</body>

</html>