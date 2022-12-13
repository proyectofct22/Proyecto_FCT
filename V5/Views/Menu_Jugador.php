<nav class="navbar navbar-dark border-bottom border-white fixed-top fondoOscuro">
	<div class="container-fluid justify-content-start">
		<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand fuentePersonalizadaRegistrado mx-5" href="./Controller_Perfil_Jugador.php">Gaming Room</a>
		<div class="offcanvas offcanvas-start fondoOscuro" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
			<div class="offcanvas-header">
				<h5 class="offcanvas-title text-white fuentePersonalizadaRegistrado" id="offcanvasDarkNavbarLabel">Gaming Room</h5>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<div class="offcanvas-body">
				<ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
					<li class="nav-item"><a class="nav-link ms-2" aria-current="page" href="./Controller_Perfil_Jugador.php"><i class="bi bi-house-door-fill"></i>&nbsp;&nbsp;Inicio</a></li>
					<li class="nav-item"><a class="nav-link ms-2" href="./Controller_Equipo_Jugador.php"><i class="bi bi-people-fill"></i>&nbsp;&nbsp;Equipo</a></li>
					<li class="nav-item"><a class="nav-link ms-2" href="./Controller_Historial_Jugador.php"><i class="bi bi-trophy-fill"></i>&nbsp;&nbsp;Historial</a></li>
					<li class="nav-item"><a class="nav-link ms-2" href="./Controller_Estadisticas_Equipo_Jugador.php"><i class="bi bi-bar-chart-line-fill"></i></i>&nbsp;&nbsp;Estadísticas</a></li>
					<hr class="ms-2" style="width: 98%;">
					<li class="nav-item dropdown ms-2">
						<?php
							echo "<a class='nav-link' href='#' role='button' data-bs-toggle='dropdown' aria-expanded='false'  style='text-transform: uppercase;''><i class='bi bi-person-circle'></i>&nbsp;&nbsp;" . $_SESSION['nick'] . "&nbsp;&nbsp;<i style='font-size: 15px;' class='bi bi-caret-down-fill'></i></a>";
						?>
						<ul class="dropdown-menu dropdown-menu-dark">
							<li><a class="dropdown-item" href="./Controller_Perfil_Jugador.php"><i class="bi bi-eye-fill"></i>&nbsp;&nbsp;Ver perfil</a></li>
							<li><a class="dropdown-item" href="./Controller_Editar_Perfil.php"><i class="bi bi-hammer"></i>&nbsp;&nbsp;Editar perfil</a></li>
							<hr class="dropdown-divider">
							<li><a class="dropdown-item" href="../Controller_Cerrar_Sesion.php"><i class="bi bi-door-open-fill"></i>&nbsp;&nbsp;Cerrar sesión</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</nav>
