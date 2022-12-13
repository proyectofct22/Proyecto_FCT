<style type="text/css">
	body { /* Imagen de fondo */
		background-image: url('../../Media/Fondo.jpg');
		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
		background-attachment: fixed;
	}
</style>
<div class="container py-5 my-5">
	<div class="card border-light p-5" style="background:rgba(0,0,0,0.8);">
		<div class="row text-center text-white">
			<h1 class="display-4 fuentePersonalizadaRegistrado"><?php echo $_SESSION['nick']; ?></h1>
			<div class="col-lg-12">
				<p class="lead">¡Bienvenido al gestor administrativo del gaming room!<br>Desde aqui podrá crear, iniciar, finalizar y verificar los torneos, los equipos y los partidos que se realizarán en el aula.</p>
				<div class="d-grid gap-2 px-5 d-sm-flex justify-content-sm-center">
					<a href="./Controller_CrearTorneo_Admin.php" class="btn btn-outline-light w-100">Gestionar Torneos</a>
					<a href="./Controller_EditarPartido_Admin.php" class="btn btn-outline-light w-100">Gestionar Partidos</a>
					<a href="./Controller_Participantes_Admin.php" class="btn btn-outline-light w-100">Participantes</a>
				</div>
			</div>
		</div>
	</div>
</div>
