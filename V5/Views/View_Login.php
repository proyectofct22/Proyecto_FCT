<style type="text/css">
	body { /* Imagen de fondo */
		background-image: url('../Media/Fondo.jpg');
		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
		background-attachment: fixed;
	}
</style>
<div class="container py-5">
	<div class="card border-light text-center px-5 py-5 my-5" style="background:rgba(0,0,0,0.8);">
		<h1 class="display-4 text-white fuentePersonalizada">Iniciar Sesión</h1>
		<p class="lead text-white">Rellene los campos para comenzar a explorar el Gaming Room.</p>
		<div class="card-body">
			<form method="post">
				<div class="form-group pb-4">
					<input type="text" name="nick" class="form-control form-control-lg text-center" placeholder="Usuario" autofocus>
				</div>
				<div class="form-group pb-4">
					<input type="password" name="password" class="form-control form-control-lg text-center" placeholder="Contraseña">
				</div>
				<input type="submit" value="Iniciar Sesión" class="w-50 btn btn-outline-light btn-lg">
				<h5 class="text-white pt-3">¿No tiene cuenta?&nbsp;
					<a style="color: #41a5ee;" href="../Controllers/Controller_Alta_Usuario.php">Regístrese</a>
				</h5>
				<h5 class="text-white">¿Olvidó su contraseña?&nbsp;
					<a style="color: #41a5ee;" href="../Controllers/Controller_Restaurar_Contrasena.php">Restaurar contraseña</a>
				</h5>
			</form>
		</div>
	</div>
</div>
