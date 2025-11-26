
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
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile  bx-lg'></i>
			<span class="text">AdminHub</span>
		</a>
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
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
    <nav>
        <a href="#" class="nav-link">Categories</a>


        <!-- Profile Menu -->
        <!-- Checkbox oculto que controla el menú -->
        <input type="checkbox" id="profile-toggle" hidden>

        <!-- Icono de perfil -->
        <label for="profile-toggle" class="profile">
            <img src="https://placehold.co/600x400/png" alt="Profile">
        </label>

        <!-- Menú de perfil -->
        <div class="profile-menu">
            <ul>
                <li><a href="#">My Profile</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Log Out</a></li>
            </ul>
        </div>
    </nav>
    

		<!-- MAIN -->
    <main class="main content">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	

	<script src="script.js"></script>
</body>
</html>