<style type="text/css">
	body { /* Imagen de fondo */
		background-image: url('../../Media/Fondo.jpg');
		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
		background-attachment: fixed;
	}
</style>
<div class="container py-5">
	<div class="card border-light py-5 px-5 my-5 text-center" style="background:rgba(0,0,0,0.8);">
		<h1 class="display-4 text-white fuentePersonalizada">Editar perfil</h1>
		<p class="lead text-white">Rellene los siguientes campos para editar sus datos.</p>
		<div class="card-body pt-3">
			<form method="post" action="../Usuario_Jugador/Controller_Editar_Perfil.php">
				<div class="form-group">
					<input type="text" class="form-control form-control-lg text-center" name="usuario" pattern="^([A-Za-z])([A-Za-z0-9-._]){2,12}$" placeholder="Nuevo usuario" autofocus>
				</div>
				<div class="form-group pt-4">
					<input type="password" name="password1" pattern="^[A-Za-z0-9.\-\$]{8,16}$" class="form-control form-control-lg text-center" placeholder="Nueva contraseña">
				</div>
				<div class="form-group pt-4">
					<input type="password" name="password2" pattern="^[A-Za-z0-9.\-\$]{8,16}$" class="form-control form-control-lg text-center" placeholder="Repita la contraseña">
				</div>
				<div class="row pt-4">
					<div class="col-lg-6">
						<input type="submit" name="enviarDatos" value="Actualizar" class="w-100 btn btn-outline-success btn-lg">
					</div>
					<div class="col-lg-6">
						<a href="./Controller_Perfil_Jugador.php" class="w-100 btn btn-outline-danger btn-lg">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
