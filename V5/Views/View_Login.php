<div class="container centrarContenido pt-5">
	<div class="pt-5 px-4 my-5 text-center">
		<h1 class="display-4 text-white fuentePersonalizada">Iniciar Sesión</h1>
		<p class="lead text-white">Rellene los campos para comenzar a explorar el Gaming Room.</p>
		<div class="card-body pt-3">
			<form method="post">
				<div class="form-group">
					<input type="text" name="nick" class="form-control form-control-lg text-center" placeholder="Usuario" autofocus>
				</div>
				<br>
				<div class="form-group">
					<input type="password" name="password" class="form-control form-control-lg text-center" placeholder="Contraseña">
				</div>
				<br>
				<input type="submit" value="Iniciar Sesión" class="w-50 btn btn-outline-light btn-lg">
				<h5 class="text-white pt-4">¿No tiene cuenta?&nbsp;
					<a style="color: #41a5ee;" href="../Controllers/Controller_Alta_Usuario.php">Regístrese</a>
				</h5>
				<h5 class="text-white pt-3">¿Olvidó su contraseña?&nbsp;
					<a style="color: #41a5ee;" href="../Controllers/Controller_Restaurar_Contrasena.php">Restaurar contraseña</a>
				</h5>
			</form>
		</div>
	</div>
</div>
