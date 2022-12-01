<div class="container" align="center">
	<div class="px-4 pt-5 my-5">
		<header>
			<h1 class="display-5 fw-bold pt-5">Restaurar Contraseña</h1>
		</header>
		<div class="card-body">
			<br>
			<form method="post">
				<div class="form-group" style="width: 75%;">
					<input type="text" name="usuario" class="form-control form-control-lg textoCentrado" placeholder="Usuario" autofocus>
				</div>
				<br>
				<div class="form-group" style="width: 75%;">
					<input type="password" name="password1" pattern="^[A-Za-z0-9.\-\$]{8,16}$" class="form-control form-control-lg textoCentrado" placeholder="Nueva contraseña">
				</div>
				<br>
				<div class="form-group" style="width: 75%;">
					<input type="password" name="password2" pattern="^[A-Za-z0-9.\-\$]{8,16}$" class="form-control form-control-lg textoCentrado" placeholder="Repita la contraseña">
				</div>
				<br>
				<input type="submit" value="Confirmar restauración" class="btn btn-primary btn-lg">
			</form>
			<a href="./Controller_Login" class="btn btn-danger btn-lg mt-4">Cancelar</a>
		</div>
	</div>
</div>
