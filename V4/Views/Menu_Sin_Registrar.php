<!-- Menú antiguo -->
<!--
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<a href="../Controllers/Controller_Inicio.php" class="d-flex align-items-center mb-2 mb-lg-0 text-light text-decoration-none botonLogo">
		<img src="../Images/Logo.png" class="nav-link ms-5 me-2" width="50px" height="50px">Gaming Room
	</a>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a href="../Controllers/Controller_Torneo.php" class="nav-link px-2 text-light botonMenu">Torneos</a>
			</li>
			<li class="nav-item active">
				<a href="../Controllers/Controller_Equipos.php" class="nav-link px-2 text-light botonMenu">Equipos</a>
			</li>
			<li class="nav-item active">
				<a href="../Controllers/Controller_Sobre_Nosotros.php" class="nav-link px-2 text-light botonMenu">Sobre Nosostros</a>
			</li>
		</ul>
	</div>
	<div class="mx-2">
		<a href="../Controllers/Controller_Login.php" type="button" class="btn btn-outline-light" style="width: 150px;">Iniciar Sesión</a>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="../Controllers/Controller_Alta_Usuario.php" type="button" class="btn btn-outline-warning me-5" style="width: 150px;">Registrarse</a>
	</div>
</nav>
-->

<!-- Menú nuevo -->
<!-- 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top text-center px-3">
	<div class="container-fluid">
		<a href="../Controllers/Controller_Inicio.php" class="navbar-brand">
			<img src="../Images/Logo.png" width="50px" height="50px">Gaming Room
		</a>
		<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<div class="navbar-nav">
				<a href="../Controllers/Controller_Torneo.php" class="nav-item nav-link botonMenu px-3">Torneos</a>
				<a href="../Controllers/Controller_Equipos.php" class="nav-item nav-link botonMenu px-3">Equipos</a>
				<a href="../Controllers/Controller_Sobre_Nosotros.php" class="nav-item nav-link botonMenu px-3">Sobre Nosostros</a>
			</div>
			<div class="navbar-nav ms-auto">
				<a href="../Controllers/Controller_Login.php" class="nav-item nav-link botonMenu px-3">Iniciar Sesión</a>
				<a href="../Controllers/Controller_Alta_Usuario.php" class="nav-item nav-link botonMenu px-3">Registrarse</a>
			</div>
		</div>
	</div>
</nav>
 -->
<!-- Menú aún más nuevo -->

<nav class="navbar navbar-dark bg-dark fixed-top">
	<div class="container-fluid justify-content-start">
		<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand mx-5" href="../Controllers/Controller_Inicio.php">Gaming Room</a>
		<div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
			<div class="offcanvas-header">
				<h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Gaming Room</h5>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<div class="offcanvas-body">
				<ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
					<li class="nav-item"><a class="nav-link ms-2" aria-current="page" href="../Controllers/Controller_Inicio.php"><i class="bi bi-house-door-fill"></i>&nbsp;&nbsp;Inicio</a></li>
					<li class="nav-item"><a class="nav-link ms-2" href="../Controllers/Controller_Equipos.php"><i class="bi bi-people-fill"></i>&nbsp;&nbsp;Equipos</a></li>
					<li class="nav-item"><a class="nav-link ms-2" href="../Controllers/Controller_Torneo.php"><i class="bi bi-trophy-fill"></i>&nbsp;&nbsp;Torneos</a></li>
					<li class="nav-item"><a class="nav-link ms-2" href="../Controllers/Controller_Sobre_Nosotros.php"><i class="bi bi-info-square-fill"></i>&nbsp;&nbsp;Sobre Nosotros</a></li>
					<hr class="ms-2" style="width: 98%;">
					<li class="nav-item"><a class="nav-link ms-2" href="../Controllers/Controller_Login.php"><i class="bi bi-person-check-fill"></i>&nbsp;&nbsp;Iniciar sesión</a></li>
					<li class="nav-item"><a class="nav-link ms-2" href="../Controllers/Controller_Alta_Usuario.php"><i class="bi bi-person-plus-fill"></i>&nbsp;&nbsp;Registrarse</a></li>
				</ul>
			</div>
		</div>
	</div>
</nav>
