<!DOCTYPE html>
<head>
    <title>Admin Dashboard</title>  
    <link rel="stylesheet" href="/css/dashboard.css">

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <style>
        #map {
            width: 100%;
            height: 400px;
            margin-top: 20px;
            border-radius: 10px;
        }

        .filter-box {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <h1>Admin Dashboard</h1>

    <section class="dashboard-metrics">

        <div class="metric-card">
            <h2>Vehículos Rentados Hoy</h2>
            <p><?= h($vehiclesRentedToday) ?></p>
        </div>

        <div class="metric-card">
            <h2>Ingresos del Mes</h2>
            <p>$<?= h(number_format($totalIncomeMonth, 2)) ?></p>
        </div>

        <div class="metric-card">
            <canvas id="incomeChart"></canvas>
        </div>

        <div class="metric-card">
            <h2>Ocupación de Estaciones</h2>
            <p><?= h($stationOccupancy) ?>%</p>
        </div>

        <div class="metric-card">
            <h2>Vehículos Disponibles</h2>
            <p><?= h($vehiclesAvailable) ?></p>
        </div>

        <div class="metric-card">
            <h2>Vehículos en Uso</h2>
            <p><?= h($vehiclesInUse) ?></p>
        </div>
    </section>

    <!-- MAPA DE LEAFLET -->
    <h2>Mapa de Monitoreo en Tiempo Real</h2>

    <div class="filter-box">
        <label>Filtrar por estado: </label>
        <select id="statusFilter">
            <option value="all">Todos</option>
            <option value="disponible">Disponibles</option>
            <option value="en_uso">En uso</option>
        </select>

        <label style="margin-left: 15px;">Batería mínima: </label>
        <input type="number" id="batteryFilter" value="0" min="0" max="100" style="width: 60px;"> %
    </div>

    <div id="map"></div>


    <!-- CHART (NO LO MODIFIQUÉ) -->
    <script>
    document.addEventListener("DOMContentLoaded", () => {

        const ctx = document.getElementById('incomeChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Ingresos del Mes'],
                datasets: [{
                    label: 'Total ($)',
                    data: [<?= $totalIncomeMonth ?>],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
    </script>

    <!-- LEAFLET MAP SCRIPT -->
    <script>
        const map = L.map('map').setView([20.671159103504834, -101.374741854233], 12);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
        }).addTo(map);

        const vehicles = <?= json_encode($vehicles) ?>;
        const stations = <?= json_encode($stations) ?>;

        let vehicleMarkers = [];
        let stationMarkers = [];

        function loadMarkers() {
            // Limpiar marcadores existentes
            vehicleMarkers.forEach(m => map.removeLayer(m));
            stationMarkers.forEach(m => map.removeLayer(m));
            vehicleMarkers = [];
            stationMarkers = [];

            const statusFilter = document.getElementById("statusFilter").value;
            const batteryFilter = parseInt(document.getElementById("batteryFilter").value);

            // === Estaciones ===
            stations.forEach(st => {
                if (!st.latitude || !st.longitude) return;

                const marker = L.marker([st.latitude, st.longitude], {
                    title: st.name
                }).bindPopup(`<strong>Estación:</strong> ${st.name}`);

                stationMarkers.push(marker);
                marker.addTo(map);
            });

            // === Vehículos ===
            vehicles.forEach(v => {
                if (!v.latitude || !v.longitude) return;

                // Filtros
                if (statusFilter !== "all" && v.status !== statusFilter) return;
                if (v.battery_level < batteryFilter) return;

                const marker = L.circleMarker([v.latitude, v.longitude], {
                    radius: 8,
                    color: v.status === "en_uso" ? "red" : "green"
                }).bindPopup(`
                    <strong>Vehículo:</strong> ${v.model.name}<br>
                    <strong>Estado:</strong> ${v.status}<br>
                    <strong>Batería:</strong> ${v.battery_level}%
                `);

                vehicleMarkers.push(marker);
                marker.addTo(map);
            });
        }

        loadMarkers();

        // Actualizar cuando cambian los filtros
        document.getElementById("statusFilter").addEventListener("change", loadMarkers);
        document.getElementById("batteryFilter").addEventListener("input", loadMarkers);
    </script>

</body>
</html>
