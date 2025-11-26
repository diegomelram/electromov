<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Electromov</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/estilazo.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
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

    <section class="location">
        <div id="map"></div>
        var map = L.map('map').setView([51.505, -0.09], 13);
    </section>

    <footer>
        <p>© 2025 Electromov — La Movilidad Inteligente</p>
    </footer>

</body>
</html>
