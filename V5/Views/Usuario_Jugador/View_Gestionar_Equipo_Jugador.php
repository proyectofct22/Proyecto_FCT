<style type="text/css">
	body { /* Imagen de fondo */
		background-image: url('../../Media/Fondo.jpg');
		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
		background-attachment: fixed;
	}
</style>
<div class="container">
	<div class="pt-5 px-4 my-5 text-center">
		<h1 class="display-4 text-white fuentePersonalizadaRegistrado">Gestionar equipo</h1>
		<p class="lead text-white">Desde aquí puede realizar todas las gestiones deseadas para su equipo</p>
		<div class="row g-4 p-4">
			<div class="col-lg-6">
				<div class="card rounded-4 border-light text-white" style="background:rgba(0,0,0,0.5);">
					<div class="p-5">
						<p class="lead text-white">Agregar jugadores al equipo</p>
						<form method="post" action="Controller_Gestionar_Equipo_Jugador.php">
							<select class="form-select text-center" name="jugadorLibre" required>
								<option selected disabled hidden>Seleccionar jugador</option>
								<?php
									$jugadoresLibres = desplegableJugadoresLibres($conexion);
									foreach ($jugadoresLibres as $desplegable => $row) {
										echo "<option value='".$jugadoresLibres[$desplegable][0]."'>".$jugadoresLibres[$desplegable][1]."</option>";
									}
								?>
							</select>
							<br>
							<input type='submit' class='w-50 btn btn-outline-light' name='agregarJugador' value='Agregar'>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="card rounded-4 border-light text-white" style="background:rgba(0,0,0,0.5);">
					<div class="p-5">
						<p class="lead text-white">Eliminar jugador del equipo</p>
						<form method="post" action="Controller_Gestionar_Equipo_Jugador.php">
							<select class="form-select text-center" name="jugadorEquipo">
								<option selected disabled hidden>Seleccionar jugador</option>
								<?php
									$equipo = obtenerEquipo($conexion, $_SESSION['idUsuario']);
									$jugadoresEquipo = desplegableJugadoresEquipo($conexion, $equipo[0][0]);
									foreach ($jugadoresEquipo as $desplegable2 => $row) {
										echo "<option value='".$jugadoresEquipo[$desplegable2][0]."'>".$jugadoresEquipo[$desplegable2][1]."</option>";
									}
								?>
							</select>
							<br>
							<input type='submit' class='w-50 btn btn-outline-light' name='quitarJugador' value='Quitar'>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row g-4 p-4">
			<div class="col-lg-6">
				<div class="card rounded-4 border-light text-white" style="background:rgba(0,0,0,0.5);">
					<div class="p-5">
						<p class="lead text-white">Unirse a un torneo</p>
						<form method="post" action="Controller_Gestionar_Equipo_Jugador.php">
							<select class="form-select text-center" name="SeleccionaTorneo">
								<option selected disabled hidden>Seleccionar torneo</option>
								<?php
									$torneo = torneosInactivos($conexion);
									echo "<option value='".$torneo[0][0]."'>".$torneo[0][1]."</option>";
								?>
							</select>
							<br>
							<input type='submit' class='w-50 btn btn-outline-light' name='UnirTorneo' value='Unirse'>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="card rounded-4 border-light text-white" style="background:rgba(0,0,0,0.5);">
					<div class="p-5">
						<p class="lead text-white">Abandonar torneo</p>
						<form method="post" action="Controller_Gestionar_Equipo_Jugador.php">
							<select class="form-select text-center" name="SeleccionaTorneo2">
								<option selected disabled hidden>Seleccionar torneo</option>
								<?php
								$torneo = torneosInactivos($conexion);
								echo "<option value='".$torneo[0][0]."'>".$torneo[0][1]."</option>";
								?>
							</select>
							<br>
							<input type='submit' class='w-50 btn btn-outline-light' name='Abandonar' value='Abandonar'>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="row g-4 p-4">
			<div class="col-lg-12">
				<div class="card rounded-4 border-light text-white" style="background:rgba(0,0,0,0.5);">
					<div class="p-5">
						<p class="lead text-white">Eliminar equipo</p>
						<form method="post" action="Controller_Gestionar_Equipo_Jugador.php">
							<input type='submit' class='w-50 btn btn-outline-danger' name='EliminarEquipo' value='Eliminar'>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>