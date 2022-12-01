<div class="container" align="center">
	<div class="px-4 pt-5 my-5 text-center">
		<header>
			<h1 class="display-5 fw-bold pt-5">Mi perfil</h1>
		</header>
		<div class="card-body">
			<div class="pt-5">
				<div class="row g-0 border rounded-4 overflow-hidden flex-md-row shadow-sm position-relative">
					<div class="col-auto d-none d-lg-block">
						<?php
							$nombre_fichero = '../../Images/Usuarios/'.$_SESSION['nick'].'.png';
							// var_dump($nombre_fichero);
							if (file_exists($nombre_fichero)) {
								echo '<img src="../../Images/Usuarios/'.$_SESSION['nick'].'.png" alt="Foto Perfil" class="me-2 center" width="300px" height="300px">';
							} else {
								echo '<img src="../../Images/Usuarios/Default.png" alt="Foto Perfil" class="me-2 center" width="300px" height="300px">';
							}
						?>
					</div>
					<div class="col d-flex flex-column position-static">
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
						<div class="justify-content-sm-center pt-3">
							<?php 
								if (!empty($equipoJugador)) {
									echo '<a href="./Controller_Equipo_Jugador.php" class="btn btn-primary btn-lg" style="width: 170px;">Ver Equipo</a>';
								}
							?>
							<a href="./Controller_Editar_Perfil" class="btn btn-primary btn-lg" style="width: 170px;">Editar Perfil</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	
?>