<div class="container" align="center">
	<div>
		<header>
			<h1 style="margin-top: 5%;">Iniciar Sesión</h1>
		</header>
		<div class="card-body" style="max-width: 40rem;">
			<br>
			<form method="post">
				<div class="form-group">
					<input type="text" name="nombre" class="form-control form-control-lg" placeholder="Nombre" autofocus style="text-align: center;">
				</div>
				<br>
				<div class="form-group">
					<input type="password" name="password" class="form-control form-control-lg" placeholder="Contraseña" style="text-align: center;">
				</div>
				<br>
				<input type="submit" value="Iniciar Sesión" class="btn btn-outline-dark" style="width: 150px;">
				<h5 style="margin-top: 3%;">¿No tiene cuenta?&nbsp;
				<a href="../Controllers/Controller_Alta_Usuario.php" style="width: 150px;">Regístrese</a></h5>
				<h5 style="margin-top: 3%;">¿Olvidó su contraseña?&nbsp;
				<a href="../Controllers/Controller_Restaurar_Contrasena.php" style="width: 150px;">Restaurar contraseña</a></h5>
			</form>
		</div>
	</div>
</div>
