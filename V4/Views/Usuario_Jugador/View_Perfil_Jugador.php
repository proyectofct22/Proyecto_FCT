<div class="container" align="center">
	<div class="pt-5 pb-5">
		<header>
			<h1 class="display-5 fw-bold pt-5">Mi perfil</h1>
		</header>
		<div class="card-body p-4">
			<div class="row g-0 border rounded-4 overflow-hidden flex-md-row shadow-sm position-relative">
				<div class="col-xl-3 col-lg-4 col-md-5" style="height: 300px;">
					<?php
						$nombre_fichero = '../../Images/Usuarios/'.$_SESSION['idUsuario'].'.png';
						if (file_exists($nombre_fichero)) {
							echo '<img src="'.$nombre_fichero.'" alt="Foto Perfil" width="100%" height="100%">';
						} else {
							echo '<img src="../../Images/Usuarios/Default.png" alt="Foto Perfil" width="300px" height="300px">';
						}
					?>
				</div>
				<div class="col-xl-9 col-lg-8 col-md-7 d-flex flex-column position-static" style="height: 300px;">
					<h2 class="pt-4" style="text-transform: uppercase;"><?php echo $_SESSION['nick']; ?></h2>
					<?php
						$datosJugador = datosJugador($conexion, $_SESSION['idUsuario']);
						echo "<br>Nombre:&nbsp;" . $datosJugador[0][0] ."&nbsp;" . $datosJugador[0][1];
						echo "<br>Correo:&nbsp;" . $datosJugador[0][2];
						echo "<br>Ciclo formativo:&nbsp;" . $datosJugador[0][3];

						$equipoJugador = equipoJugador($conexion, $_SESSION['idUsuario']);
						if (!empty($equipoJugador)) {
							echo "<br>Equipo: ".$equipoJugador[0];
						}
					?>
					<div class="justify-content-sm-center pt-3 pb-3">
						<?php 
							if (!empty($equipoJugador)) {
								echo '<a href="./Controller_Equipo_Jugador.php" class="btn btn-primary btn-lg m-2" style="width: 170px;">Ver Equipo</a>';
							}
						?>
						<a href="./Controller_Editar_Perfil" class="btn btn-primary btn-lg m-2" style="width: 170px;">Editar Perfil</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
