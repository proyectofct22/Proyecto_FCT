<div class="container centrarContenido pt-5">
	<div class="pt-5 px-4 my-5 text-center">
		<h1 class="display-4 text-white fuentePersonalizada">Restaurar Contraseña</h1>
		<p class="lead text-white">Si ha olvidado su contraseña rellene los campos de abajo para restaurarla.</p>
		<div class="card-body pt-3">
			<form method="post">
				<div class="form-group">
					<input type="text" name="usuario" class="form-control form-control-lg text-center" placeholder="Usuario" autofocus>
				</div>
				<br>
				<div class="form-group">
					<input type="password" name="password1" pattern="^[A-Za-z0-9.\-\$]{8,16}$" class="form-control form-control-lg text-center" placeholder="Nueva contraseña">
				</div>
				<br>
				<div class="form-group">
					<input type="password" name="password2" pattern="^[A-Za-z0-9.\-\$]{8,16}$" class="form-control form-control-lg text-center" placeholder="Repita la contraseña">
				</div>
				<br>
				<input type="submit" value="Confirmar restauración" class="w-50 btn btn-outline-light btn-lg">
			</form>
			<a href="./Controller_Login" class="btn btn-outline-danger btn-lg mt-4">Cancelar</a>
		</div>
	</div>
</div>
