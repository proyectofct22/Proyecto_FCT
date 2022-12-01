<nav class="navbar navbar-dark border-bottom border-white fixed-top fondoOscuro">
	<div class="container-fluid justify-content-start">
		<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand fuentePersonalizadaRegistrado mx-5" href="./Controller_Perfil_Admin.php">Gaming Room</a>
		<div class="offcanvas offcanvas-start fondoOscuro" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
			<div class="offcanvas-header">
				<h5 class="offcanvas-title text-white fuentePersonalizadaRegistrado" id="offcanvasDarkNavbarLabel">Gaming Room</h5>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<div class="offcanvas-body">
				<ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
					<li class="nav-item"><a class="nav-link ms-2" aria-current="page" href="./Controller_Perfil_Admin.php"><i class="bi bi-house-door-fill"></i>&nbsp;&nbsp;Inicio</a></li>
					<li class="nav-item"><a class="nav-link ms-2" href="./Controller_CrearTorneo_Admin.php"><i class="bi bi-trophy-fill"></i>&nbsp;&nbsp;Torneos</a></li>
					<li class="nav-item"><a class="nav-link ms-2" href="./Controller_EditarPartido_Admin.php"><i class="bi bi-joystick"></i>&nbsp;&nbsp;Partidos</a></li>
					<li class="nav-item"><a class="nav-link ms-2" href="./Controller_Participantes_Admin.php"><i class="bi bi-people-fill"></i>&nbsp;&nbsp;Participantes</a></li>
					<hr class="ms-2" style="width: 98%;">
					<li class="nav-item"><a class="nav-link ms-2" href="../Controller_Cerrar_Sesion.php"><i class="bi bi-door-open-fill"></i>&nbsp;&nbsp;Cerrar sesión</a></li>
				</ul>
			</div>
		</div>
	</div>
</nav>
