<!DOCTYPE html>
<html lang="es">
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

    <nav class="top-nav">
        <img src="/img/electromov.png" alt="Logo Electromov" class="nav-logo">
        <a href="/users/login">Login</a>
    </nav>


    <header class="hero">
        <h1 class="hero-title">Movilidad eléctrica para Irapuato</h1>
        <p class="hero-sub">Rápido, ecológico y accesible. Muévete con Electromov.</p>
        <a href="/users/add" class="cta-btn">Comenzar</a>
    </header>

    <section class="benefits">
        <h2>¿Por qué elegir Electromov?</h2>

        <div class="benefit-grid">
            <div class="benefit-card">
                <h3>🍃 Ecológico 🍃</h3>
                <p>Reducirás tu huella ambiental mientras avanzas con libertad.</p>
            </div>

            <div class="benefit-card">
                <h3>🚲 Eficiente 🚲</h3>
                <p>Tarifas claras y sin complicaciones.</p>
            </div>

            <div class="benefit-card">
                <h3>✅ Inteligente ✅</h3>
                <p>¡Reserva, desbloquea y paga en segundos!</p>
            </div>
        </div>
    </section>

    <section>
        <div class="model-section">
            <h2>Nuestra Flota y Tarifas</h2>
            <p>Elige tu vehículo ideal y muévete por la ciudad.</p>
        </div>
            <div class="model-cards-container">
            <?php foreach ($vehicleModels as $model): ?>
                <div class="model-card">
                    <h3><?= h($model->name) ?></h3>
                    <?php if (!empty($model->image_path)): ?>
                        <?= $this->Html->image($model->image_path, [
                            'alt' => 'Imagen de ' . h($model->name), 
                            'class' => 'model-img',
                            'style' => 'max-width: 200px; height: 200px;' // Optional styling
                        ]) ?>
                    <?php else: ?>
                        <?= $this->Html->image('placeholder.png', ['alt' => 'Sin imagen', 'class' => 'model-img']) ?>
                    <?php endif; ?>
                    <p class="model-type">Tipo: <strong><?= h(ucfirst($model->type)) ?></strong></p>
                    <p class="model-brand">Marca: <?= h($model->brand) ?></p>
                    
                    <div class="price-box">
                        Tarifa Fija: 
                        <span class="rate-per-minute">
                            $<?= h(number_format($model->rate_per_minute, 2)) ?> / Minuto
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <?php pj($vehicleModels) ?>
    </section>


    <section class="map-section">
        <h2>Encuentra tu estación más cercana</h2>
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

    <footer>
        <p>© 2025 Electromov — La Movilidad Inteligente</p>
    </footer>

</body>
</html>
