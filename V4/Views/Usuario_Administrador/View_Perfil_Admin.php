<div class="px-4 py-5 my-5 text-center">
	<img class="d-block mx-auto mb-4" src="../../Images/Logo.png" alt="" width="90px" height="90px">
	<h1 class="display-5 fw-bold" style="text-transform: uppercase;"><?php echo $_SESSION['nick']; ?></h1>
	<div class="col-lg-6 mx-auto pt-3">
		<p class="lead mb-4">¡Bienvenido al gestor administrativo del gaming room!<br>Desde aqui podrá crear, iniciar, finalizar y verificar los torneos, los equipos y los partidos que se realizarán en el aula.</p>
		<div class="d-grid gap-2 d-sm-flex justify-content-sm-center pt-3">
			<a href="./Controller_CrearTorneo_Admin.php" class="btn btn-outline-dark btn-lg">Gestionar Torneos</a>
			<a href="./Controller_CrearEquipos_Admin.php" class="btn btn-outline-dark btn-lg">Gestionar Equipos</a>
			<a href="./Controller_EditarPartido_Admin.php" class="btn btn-outline-dark btn-lg">Gestionar Partidos</a>
		</div>
	</div>
</div>
