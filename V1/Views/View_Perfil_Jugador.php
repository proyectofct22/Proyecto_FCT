<div class="container" align="center">
	<div>
		<header>
			<h1 style="margin-top: 5%;">Mi perfil</h1>
		</header>
		<div class="card-body">
			<div class="col-md-6" style="margin-top: 5%;">
				<div class="row g-0 border rounded-4 overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
					<div class="col-auto d-none d-lg-block">
						<img src="../Images/FotoPerfil.png" alt="foto" class="me-2 center" width="200" height="200">
					</div>
					<div class="col p-4 d-flex flex-column position-static">
						<h3 class="mb-0"><?php echo $_SESSION['nombre']; ?></h3><br>
						<?php 
							$equipoJugador = equipoJugador($conexion, $_SESSION['idUsuario']);
							$cicloJugador = cicloJugador($conexion, $_SESSION['idUsuario']);
							
							if (empty($equipoJugador)) {
								echo "<p class='card-text mb-auto'>Actualmente no pertenece a ningún equipo.<br>Ciclo Formativo: ".$cicloJugador[0]."</p>";
							} else {
								echo "<p class='card-text mb-auto'>Equipo: ".$equipoJugador[0]."<br>Ciclo Formativo: ".$cicloJugador[0]."</p>";
							}
						?>
						<a href="#">¿Editar?</a> <!-- ¿Foto, Nombre, Apellidos, Contraseña, Ciclo? -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
