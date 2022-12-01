<div class="container" align="center">
	<div class="pt-5 pb-5">
		<header>
			<h1 class="display-5 fw-bold pt-5">Editar perfil</h1>
		</header>
		<div class="card-body">
			<br>
			<form method="post" action="../Usuario_Jugador/Controller_Editar_Perfil.php">
				<div class="form-group" style="width: 75%;">
					<input type="text" class="form-control form-control-lg textoCentrado" name="usuario" pattern="^([A-Za-z])([A-Za-z0-9-._]){2,12}$" placeholder="Nuevo Usuario" autofocus>
				</div>
				<br>
				<div class="form-group" style="width: 75%;">
					<input type="email" class="form-control form-control-lg textoCentrado" name="email"pattern="^[a-z][0-9a-z-._]+[a-z0-9]@((gmail)|(hotmail)|(educa.madrid))\.((com)|(es)|(org))$" placeholder="Nuevo Email">
				</div>
				<br>
				<div class="form-group" style="width: 75%;">
					<input type="password" class="form-control form-control-lg textoCentrado" name="password" pattern="^[A-Za-z0-9.\-\$]{8,16}$" placeholder="Nueva Contraseña">
				</div>
				<br>
				<input type="submit" name="enviarDatos" value="Actualizar" class="btn btn-primary btn-lg">
			</form>
			<br>
			<form method="POST" action="../Usuario_Jugador/Controller_Editar_Perfil.php" enctype="multipart/form-data">
				<div class="form-group">
					<label class="btn btn-outline-warning btn-lg mt-2" style="width: 275px;">Adjuntar imagen de perfil
						<input type="file" name="imagen" hidden>
					</label>
					<a tabindex="0" class="btn btn-lg btn-outline-danger mt-2" style="width: 275px;" role="button" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-title="Subir imagen de perfil" data-bs-content="La imagen tiene que ser de tipo .png y se recomienda que sea cuadrada. Ejemplo: 480x480 píxeles.">Información antes de subir</a>
				</div>
				<br>
				<input type="submit" name="subirImagen" value="Subir Imagen" class="btn btn-outline-success btn-lg">
			</form>
		</div>
	</div>
</div>

<!-- JavaScript para el botón de información -->
<script type="text/javascript">
	const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
	const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
	const popover = new bootstrap.Popover('.popover-dismiss', { trigger: 'focus' })
</script>
