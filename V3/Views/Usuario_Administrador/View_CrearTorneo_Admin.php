<style>
	body{
		background-color: #8080803d;
	}
</style>

<div class="container" style="padding-top: 7%; max-width: 80rem; ">
	<div class="row g-3">
		<div class="col" align="center">
			<h4 class="fw-normal fs-4 fw-bolder">Crear Torneo</h4>
			<form method="POST" action="Controller_CrearTorneo_Admin.php">
				<div class="row">
					<div class="col">
						<label for="NombreTorneo" class="form-label text-lg-center fw-normal fs-5">Nombre del Torneo</label>
						<input type="text" class="form-control text-lg-center fw-normal fs-6" id="NombreTorneo" name="NombreTorneo" placeholder="" value="" required>
					</div>

					<div class="col">
						<label width="" for="JuegoTorneo" class="form-label text-lg-center fw-normal fs-5">Juego del Torneo</label>
						<select class="form-select fw-normal fs-6 text-lg-center" name="juegos" id="juegos" aria-label="juegos">
							<?php
							$juegos=juegosTorneos($conexion);
							foreach ($juegos as $indice2 => $valor) {
								echo "<option class='fw-normal fs-6 text-lg-center ' align='center' value='".$juegos[$indice2][0]."'>".$juegos[$indice2][0]."</option>";
							}
							?> 
						</select>
					</div>
					<hr class="my-4">
					<div align="center">
						<button name="CrearTorneo" class="w-10 btn btn-primary" style="width: 50%; margin-top: 0px;" type="submit">Crear Torneo</button>
					</div>
				</div>
			</form>	
		</div>

		<div class="col">
		</div>

		<div class="col">
			<form method="POST" action="Controller_CrearTorneo_Admin.php">
				<div>
					<h4 class="fw-normal fs-4 fw-bolder">Iniciar Torneo</h4>
					<label width="" for="JuegoTorneo" class="form-label text-lg-center fw-normal fs-5">Torneos</label>
					<select class="form-select fw-normal fs-6 text-lg-center" name="torneos" id="torneos" aria-label="Jugadores">
						<?php
						$torneos=torneosActivos($conexion);
						foreach ($torneos as $indice2 => $valor) {
							echo "<option class='fw-normal fs-6 text-lg-center ' align='center' value='".$torneos[$indice2][0]."'>".$torneos[$indice2][1]."</option>";
						}
						?> 
					</select>

				</div>
				<hr class="my-4">
				<div align="center">
					<button name="IniciarTorneo" class="w-10 btn btn-primary" style="width: 50%; margin-top: 0px;" type="submit">Iniciar Torneo</button>
				</div>
			</form>
		</div>

		<div class="row" style="padding-top: 5%;">
			<div class="container" style="max-width: 30rem;" align="center">

				<form method="POST" action="">
					<h4 align="center" width="350px" class="fw-normal fs-4 fw-bolder">Ver Torneos</h4>
					<br>
					<div align="center">
						<button name="MostrarDatos" class="btn btn-primary" style="width: 60%;" type="submit">Mostrar datos</button>
					</div>
				</form>

			</div>
		</div>

		<br>

		<div class="row" style="padding-top: 5%; margin-bottom: 100px;">
			<table class="table"style='text-align: center; vertical-align: middle;'>
				<tr>
					<th class="table-primary">Nombre del Torneo</th>
					<th class="table-primary">Juego</th>
					<th class="table-primary">Estado</th>
					<th class="table-primary">Fecha de inicio</th>
					<th class="table-primary">Fecha fin</th>
					<th class="table-primary">Acciones</th>
				</tr>
				<?php
				function mostrarDatos($conexion,$torneoDatos){
					if($torneoDatos!=FALSE){
						foreach($torneoDatos as $indice => $dato){
							echo "<tr class='table-light'>";

							echo "<td>".$torneoDatos[$indice]['Nombre del Torneo']."</td>";

							echo "<td>".$torneoDatos[$indice]['Juego']."</td>";

							echo "<td>".$torneoDatos[$indice]['Estado']."</td>";

							echo "<td>".$torneoDatos[$indice]['Fecha de inicio']."</td>";

							echo "<td>".$torneoDatos[$indice]['Fecha fin']."</td>";

							echo "<td><button value=' id='botonBorrado' name='botonBorrado' class='text-info text-decoration-none btn'><i class='bi bi-pencil-fill'></i></button></td>";

							echo "</tr>";
						}
					}
					else if($torneoDatos==FALSE){
						echo "<tr>";
						echo "<td colspan='7'>No hay datos</td>";
						echo "</tr>";
					}
					echo "</table>";
				}

				?> 

			</div>
</div>


