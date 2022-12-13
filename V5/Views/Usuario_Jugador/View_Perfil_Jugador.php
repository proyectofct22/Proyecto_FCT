<style type="text/css">
	body { /* Imagen de fondo */
		background-image: url('../../Media/Fondo.jpg');
		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
		background-attachment: fixed;
	}
	.popoverPersonalizado { /* Estilos para popovers */
		--bs-popover-border-color: var(--bs-light);
		--bs-popover-header-bg: var(--bs-dark);
		--bs-popover-header-color: var(--bs-white);
	}
</style>
<div class="container py-5 my-5">
	<form method="post" class="form-floating" action="../Usuario_Jugador/Controller_Perfil_Jugador.php" enctype="multipart/form-data">
		<div class="card border-light" style="background:rgba(0,0,0,0.8);">
			<div class="row p-5">
				<div class="col-lg-4 col-md-6">
					<?php
						$nombre_fichero = '../../Media/Usuarios/'.$_SESSION['idUsuario'].'.jpg';
						if (file_exists($nombre_fichero)) {
							echo '<img src="'.$nombre_fichero.'" class="img-fluid rounded-2">';
						} else {
							echo '<img src="../../Media/Usuarios/Default.jpg" class="img-fluid rounded-2">';
						}
					?>
					<div class="row gy-2 pt-2">
						<div class="col-lg-6">
							<label class="btn btn-primary w-100">Subir imagen<input type="file" name="imagen" hidden></label>
						</div>
						<div class="col-lg-6">
							<input class="btn btn-primary cambiarImagen w-100" type="submit" value="Confirmar subida" name="cambiarImagen">
						</div>
						<div class="col-lg-12">
							<a tabindex="0" class="btn btn-danger w-100" role="button" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-custom-class="popoverPersonalizado" data-bs-html="true" data-bs-title="<div class='text-center'>Imagen</div>"
							data-bs-content="El tipo de imagen debe ser .jpg">Requisitos previos para la subida</a>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-md-6 py-5">
					<h1 class="display-4 text-center text-white fuentePersonalizadaRegistrado">Perfil de usuario</h1>
					<?php
						$datosJugador = datosJugador($conexion, $_SESSION['idUsuario']);
						$equipoJugador = equipoJugador($conexion, $_SESSION['idUsuario']);
						if (empty($equipoJugador)) {
							$equipoJugador[0] = "Sin equipo";
						}
					?>
					<div class="row px-5">
						<div class="col-md">
							<div class="form-floating pb-4">
								<input type="text" class="form-control" id="nombre" placeholder="nombre" value="<?php echo $datosJugador[0][0]; ?>" readonly>
								<label for="nombre">Nombre</label>
							</div>
							<div class="form-floating pb-4">
								<input type="text" class="form-control" id="usuario" placeholder="usuario" value="<?php echo $_SESSION['nick']; ?>" readonly>
								<label for="usuario">Usuario</label>
							</div>
							<div class="form-floating pb-4">
								<input type="text" class="form-control" id="ciclo" placeholder="ciclo" value="<?php echo $datosJugador[0][3]; ?>" readonly>
								<label for="ciclo">Ciclo formativo</label>
							</div>
						</div>
						<div class="col-md">
							<div class="form-floating pb-4">
								<input type="text" class="form-control" id="apellidos" placeholder="apellidos" value="<?php echo $datosJugador[0][1]; ?>" readonly>
								<label for="apellidos">Apellidos</label>
							</div>
							<div class="form-floating pb-4">
								<input type="email" class="form-control" id="correo" placeholder="correo" value="<?php echo $datosJugador[0][2]; ?>" readonly>
								<label for="correo">Correo</label>
							</div>
							<div class="form-floating pb-4">
								<input type="text" class="form-control" id="equipo" placeholder="equipo" value="<?php echo $equipoJugador[0]; ?>" readonly>
								<label for="equipo">Equipo</label>
							</div>
						</div>
					</div>
					<div class="row px-5">
						<div class="col">
							<a class="btn btn-outline-light w-100" href="./Controller_Editar_Perfil.php">Editar datos</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<!-- JavaScript para el botón con la información previa a subir la imagen -->
<script type="text/javascript">
	const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]');
	const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl));
</script>
