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
		<?php
			$datosEquipo = datosEquipo($conexion, $_SESSION['idUsuario']);
			if (!isset($datosEquipo[0])) { // Si el usuario no pertenece a ningún equipo
		?>
			<div class="row g-4 p-4">
				<div class="col">
					<h1 class="display-4 text-white fuentePersonalizadaRegistrado">Historial</h1>
					<div class="text-white">
						<div class="px-5">
							<p class="lead text-white">No pertenece a ningún equipo.</p>
							<a class='btn btn-outline-light w-100' href='./Controller_Equipo_Jugador.php'>¿Crear equipo?</a>
						</div>
					</div>
				</div>
			</div>
		<?php
			} else { // Si el usuario pertenece a un equipo
		?>
		<div class="row">
			<div class="col">
				<h1 class="display-4 text-white fuentePersonalizadaRegistrado">Historial</h1>
				<p class="lead text-white">Seleccione un torneo del que ver el historial de partidos</p>
				<form method="post" action="Controller_Historial_Jugador.php">
					<select class="form-select text-center mb-4" name="torneoFinalizado" required>
						<option selected disabled hidden>Seleccionar torneo</option>
						<?php
							$torneos=torneosFinalizados($conexion);
							if (empty($torneos)) {
								echo "<option disabled>No hay torneos</option>";
							} else {
								foreach ($torneos as $indice => $datos) {
									echo "<option value='".$torneos[$indice][0]."'>".$torneos[$indice][1]."</option>";
								}
							}
						?>
					</select>
					<input type='submit' class='w-50 btn btn-primary' name='MostrarPartidos' value="Ver">
				</form>
			</div>
		</div>
		<?php
			}
		?>
		<div class="row">
			<div class="col">
				<?php
					function mostrarPartidos($conexion,$datos,$tabla) {
						if($tabla==true) {
				?>
							<table class="table table-bordered table-hover text-center align-middle mb-5" align="center" style="max-width:80%;">
								<thead class="table-dark"><tr>			
									<th width="100px">Equipo 1</th>
									<th width="100px">Equipo 2</th>
									<th width="100px">Resultado</th>
									<th width="100px">Fecha Partido</th>
									<th width="100px">Fase</th>
								</tr></thead>
								<?php
									$cont=1;
									if($datos!=FALSE) {
										foreach($datos as $indice => $dato){
											echo "<tr class='table-light'>";
											$equipo1=$datos[$indice][0];
											$equipo1=obtenerNombresEquipos($conexion,$equipo1);
											$equipo1=$equipo1[0];
											// var_dump($equipo1);
											echo "<td>".$equipo1."</td>";
											$equipo2=$datos[$indice][1];
											$equipo2=obtenerNombresEquipos($conexion,$equipo2);
											$equipo2=$equipo2[0];
											echo "<td>".$equipo2."</td>";
											echo "<td>".$datos[$indice][2]."</td>";
											echo "<td>".$datos[$indice][3]."</td>";
											echo "<td>".$datos[$indice][4]."</td>";
										
											echo "</tr>";
										}
									} else if($datos==FALSE) {
										echo "<tr>";
										echo "<td class='table-light' colspan='5'>No hay datos</td>";
										echo "</tr>";
									}
							echo "</table>";
						}
					}
				?>	
			</div>
		</div>
	</div>
</div>
