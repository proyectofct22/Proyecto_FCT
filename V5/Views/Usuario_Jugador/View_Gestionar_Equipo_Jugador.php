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
		<h1 class="display-4 text-white fuentePersonalizadaRegistrado">Gestionar equipo</h1>
		<p class="lead text-white">Desde aquí puede realizar todas las gestiones deseadas para su equipo</p>
		<div class="row g-4 p-4">
			<div class="col-lg-6">
				<div class="card rounded-4 border-light text-white" style="background:rgba(0,0,0,0.8);">
					<div class="p-5">
						<p class="lead text-white">Agregar jugadores al equipo</p>
						<form method="post" action="Controller_Gestionar_Equipo_Jugador.php">
							<select class="form-select text-center mb-4" name="jugadorLibre" required>
								<option selected disabled hidden>Seleccionar jugador</option>
								<?php
									$jugadoresLibres = desplegableJugadoresLibres($conexion);
									if (empty($jugadoresLibres)) {
											echo "<option disabled>No hay jugadores</option>";
									} else {
										foreach ($jugadoresLibres as $desplegable => $row) {
											echo "<option value='".$jugadoresLibres[$desplegable][0]."'>".$jugadoresLibres[$desplegable][1]."</option>";
										}
									}
								?>
							</select>
							<input type='submit' class='w-50 btn btn-outline-light' name='agregarJugador' value='Agregar'>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="card rounded-4 border-light text-white" style="background:rgba(0,0,0,0.8);">
					<div class="p-5">
						<p class="lead text-white">Eliminar jugador del equipo</p>
						<form method="post" action="Controller_Gestionar_Equipo_Jugador.php">
							<select class="form-select text-center mb-4" name="jugadorEquipo">
								<option selected disabled hidden>Seleccionar jugador</option>
								<?php
									$equipo = obtenerEquipo($conexion, $_SESSION['idUsuario']);
									$jugadoresEquipo = desplegableJugadoresEquipo($conexion, $equipo[0][0]);
									if (empty($jugadoresEquipo)) {
											echo "<option disabled>No hay jugadores</option>";
									} else {
										foreach ($jugadoresEquipo as $desplegable2 => $row) {
											echo "<option value='".$jugadoresEquipo[$desplegable2][0]."'>".$jugadoresEquipo[$desplegable2][1]."</option>";
										}
									}
								?>
							</select>
							<input type='submit' class='w-50 btn btn-outline-light' name='quitarJugador' value='Quitar'>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row g-4 p-4">
			<div class="col-lg-6">
				<div class="card rounded-4 border-light text-white" style="background:rgba(0,0,0,0.8);">
					<div class="p-5">
						<p class="lead text-white">Unirse a un torneo</p>
						<form method="post" action="Controller_Gestionar_Equipo_Jugador.php">
							<select class="form-select text-center mb-4" name="SeleccionaTorneo">
								<option selected disabled hidden>Seleccionar torneo</option>
								<?php
									$torneo = torneosInactivos($conexion);
									if (empty($torneo)) {
											echo "<option disabled>No hay torneos</option>";
									} else {
										echo "<option value='".$torneo[0][0]."'>".$torneo[0][1]."</option>";
									}
								?>
							</select>
							<input type='submit' class='w-50 btn btn-outline-light' name='UnirTorneo' value='Unirse'>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="card rounded-4 border-light text-white" style="background:rgba(0,0,0,0.8);">
					<div class="p-5">
						<p class="lead text-white">Abandonar torneo</p>
						<form method="post" action="Controller_Gestionar_Equipo_Jugador.php">
							<select class="form-select text-center mb-4" name="SeleccionaTorneo2">
								<option selected disabled hidden>Seleccionar torneo</option>
								<?php
									$torneo = torneosInactivos($conexion);
									if (empty($torneo)) {
											echo "<option disabled>No hay torneos</option>";
									} else {
										echo "<option value='".$torneo[0][0]."'>".$torneo[0][1]."</option>";
									}
								?>
							</select>
							<input type='submit' class='w-50 btn btn-outline-light' name='Abandonar' value='Abandonar'>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row g-4 p-4">
			<div class="col-lg-12">
				<div class="card rounded-4 border-light" style="background:rgba(0,0,0,0.8);">
					<div class="p-5">
						<p class="lead text-white">Eliminar equipo</p>
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar						</button>

						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="exampleModalLabel">¿Desea eliminar el equipo?</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<img src="../../Media/Iconos/IconoWarning.png" style="width: 100px; height: 100px;">
									</div>
									<div class="modal-footer">
										<form method="post" action="Controller_Gestionar_Equipo_Jugador.php">
											<button type="submit" name="EliminarEquipo" class="btn btn-success">Confirmar</button>
											<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>