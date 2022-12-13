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
		<h1 class="display-4 text-white fuentePersonalizada">Restaurar Contraseña</h1>
		<p class="lead text-white">Si ha olvidado su contraseña rellene los siguientes campos para restaurarla.</p>
		<div class="card-body pt-3">
			<form method="post">
				<div class="form-group pb-4">
					<input type="text" name="usuario" class="form-control form-control-lg text-center" placeholder="Usuario" autofocus>
				</div>
				<div class="form-group pb-4">
					<input type="password" name="password1" pattern="^[A-Za-z0-9.\-\$]{8,16}$" class="form-control form-control-lg text-center" placeholder="Nueva contraseña">
				</div>
				<div class="form-group pb-4">
					<input type="password" name="password2" pattern="^[A-Za-z0-9.\-\$]{8,16}$" class="form-control form-control-lg text-center" placeholder="Repita la contraseña">
				</div>
				<div class="row">
					<div class="col">
						<input type="submit" value="Confirmar" class="w-100 btn btn-outline-success btn-lg">
					</div>
					<div class="col">
						<a href="./Controller_Login.php" class="w-100 btn btn-outline-danger btn-lg">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
