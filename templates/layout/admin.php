
<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
	
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

	<?= $this->Html->css(['navbar_admin']) ?>
    <?= $this->fetch('css') ?>

	<title>AdminHub</title>
</head>
<body>
	<section id="sidebar">
		<div class="logo_content">
			<a href="/admin/dashboard" class="brand">
				<?= $this->Html->image('electromov.png', ['alt' => 'Electromov Logo']) ?>
			</a>
		</div>
		<ul class="side-menu top">
			<li class="active">
				<a href="/admin/dashboard">
					<i class='bx bxs-dashboard bx-sm' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="/admin/trips">
					<i class='bx  bx-trip bx-sm'></i> 
					<span class="text">Viajes</span>
				</a>
			</li>
			<li>
				<a href="/admin/stations">
					<i class='bx  bx-current-location bx-sm'></i> 
					<span class="text">Estaciones</span>
				</a>
			</li>
			<li>
				<a href="/admin/vehicles">
					<i class='bx  bx-car bx-sm'></i>    
					<span class="text">Vehículos</span>
				</a>
			</li>
			<li>
				<a href="/admin/models">
					<i class='bx  bx-tachometer bx-sm'></i>  
					<span class="text">Modelos</span>
				</a>
			</li>
			<li>
				<a href="/admin/users">
					<i class='bx bxs-group bx-sm' ></i>
					<span class="text">Usuarios</span>
				</a>
			</li>
			<li>
				<a href="/admin/paymethods">
					<i class='bx bx-wallet bx-sm' ></i>
					<span class="text">Metodos de Pago</span>
				</a>
			</li>
			<li>
				<a href="/admin/promotions">
					<i class='bx bx-dollar bx-sm' ></i>
					<span class="text">Promociones</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu bottom">
			<li>
				<a href="#" class="logout">
					<i class='bx bx-power-off bx-sm bx-burst-hover' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>

	<section id="content">
    <nav>
		<input type="checkbox" id="profile-toggle" hidden>

		<div class="right">
			<label for="profile-toggle" class="profile">
			<i class='bx bx-user bx-sm'></i>
			</label>
		</div>

		<div class="profile-menu">
			<ul>
				<li><a href="#">Mi Perfil</a></li>
				<li><a href="#">Cerrar Sesión</a></li>
			</ul>
		</div>
</nav>


    <main class="main content">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>
	</section>

	<script src="script.js"></script>
</body>
</html>