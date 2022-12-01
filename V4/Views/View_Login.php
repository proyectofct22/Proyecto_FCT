<div class="container" align="center">
	<div class="pt-5 px-4 my-5">
		<header>
			<h1 class="display-5 fw-bold pt-5">Iniciar Sesión</h1>
		</header>
		<div class="card-body">
			<br>
			<form method="post">
				<div class="form-group" style="width: 75%;">
					<input type="text" name="nick" class="form-control form-control-lg textoCentrado" placeholder="Usuario" autofocus>
				</div>
				<br>
				<div class="form-group" style="width: 75%;">
					<input type="password" name="password" class="form-control form-control-lg textoCentrado" placeholder="Contraseña">
				</div>
				<br>
				<input type="submit" value="Iniciar Sesión" class="btn btn-primary btn-lg">
				<h5 class="pt-4">¿No tiene cuenta?&nbsp;
					<a href="../Controllers/Controller_Alta_Usuario.php">Regístrese</a>
				</h5>
				<h5 class="pt-3">¿Olvidó su contraseña?&nbsp;
					<a href="../Controllers/Controller_Restaurar_Contrasena.php">Restaurar contraseña</a>
				</h5>
			</form>
		</div>
	</div>
</div>
