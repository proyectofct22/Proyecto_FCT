<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<a href="./Controller_Perfil_Jugador.php" class="d-flex align-items-center mb-2 mb-lg-0 text-light text-decoration-none botonLogo">
		<img src="../../Images/Logo.png" class="nav-link ms-5 me-2" width="50px" height="50px">Gaming Room
	</a>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a href="./Controller_Equipo_Jugador.php" class="nav-link px-2 text-light botonMenu">Equipo</a>
			</li>
			<li class="nav-item active">
				<a href="./Controller_Torneo_Jugador.php" class="nav-link px-2 text-light botonMenu">Torneo</a>
			</li>
			<li class="nav-item active">
				<a href="./Controller_Sobre_Nosotros_Jugador.php" class="nav-link px-2 text-light botonMenu">Sobre Nosotros</a>
			</li>
		</ul>
	</div>
	<div class="flex-shrink-0 dropdown me-5">
		<a href="#" class="d-block text-decoration-none dropdown-toggle text-light botonMenu" data-bs-toggle="dropdown" aria-expanded="false">
			<?php
				$nombre_fichero = '../../Images/Usuarios/'.$_SESSION['nick'].'.png';
				// var_dump($nombre_fichero);
				if (file_exists($nombre_fichero)) {
					echo $_SESSION['nick'] . "&nbsp;&nbsp;";
					echo '<img src="../../Images/Usuarios/'.$_SESSION['nick'].'.png" width="32px" height="32px" class="rounded-circle">';
				} else {
					echo $_SESSION['nick'] . "&nbsp;&nbsp;";
					echo '<img src="../../Images/Usuarios/Default.png" width="32px" height="32px" class="rounded-circle">';
				}

			?>
		</a>
		<ul class="dropdown-menu text-small shadow">
			<li><a class="dropdown-item textoCentrado" href="./Controller_Perfil_Jugador.php">Editar Mi Perfil</a></li></li>
			<li><hr class="dropdown-divider"></li>
			<li><a class="dropdown-item textoCentrado" href="../Controller_Cerrar_Sesion.php">Cerrar Sesión</a></li>
		</ul>
	</div>
</nav>
