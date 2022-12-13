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
	<div class="card border-light text-center text-white px-5 my-5" style="background:rgba(0,0,0,0.8);">
		<h1 class="display-4 fuentePersonalizadaRegistrado pt-5">Participantes</h1>
		<p class="lead">Seleccione el torneo y la fecha del que quiera ver los datos.</p>
		<div class="card-body">
			<div class="row g-4">
				<div class="col-lg-6">
					<form method="POST" action="Controller_Participantes_Admin.php">
						<h4>Seleccione un torneo</h4>
						<select class="form-select text-center" name="torneos" id="torneos">
							<option selected disabled hidden>Seleccionar torneo</option>
							<?php
								$torneos=torneosActivosFinalizados($conexion);
								if (empty($torneos)) {
									echo "<option disabled>No hay torneos</option>";
								} else {
									foreach ($torneos as $indice2 => $valor) {
										echo "<option class='text-center' value='".$torneos[$indice2][0]."'>".$torneos[$indice2][1]."</option>";
										$_SESSION['torneos']=$torneos[$indice2][0];
									}
								}
							?> 
						</select>
						<button name="SeleccionTorneo" class="btn btn-outline-light w-50 m-3" type="submit">Seleccionar</button>     
					</form>
				</div>

				<div class="col-lg-6">
					<form method="POST" action="Controller_Participantes_Admin.php">
						<h4>Seleccione una fecha</h4>
						<select class="form-select text-center" name="fecha" id="fecha">
							<option selected disabled hidden>Seleccionar fecha</option>
							<?php
								$idTorneo=$_SESSION['TorneoParticipante'];
								$fechas=fechaDeLosPartidosDeUnTorneo($conexion,$idTorneo);
								if (empty($fechas)) {
									echo "<option disabled>No hay fechas</option>";
								} else {
									foreach ($fechas as $indice2 => $valor) {
										echo "<option class='text-center' value='".$fechas[$indice2][0]."'>".$fechas[$indice2][0]."</option>";
									}
								}
							?>
						</select>
						<button name="Fechas" class="btn btn-outline-light w-50 m-3" type="submit">Mostrar</button>
					</form>
				</div>
			</div>
			<div class="row g-4 pt-5">
				<div class="col px-5">
					<!-- Tabla para mostrar los partidos con los equipos -->
					<?php
						function mostrarDatosDeParticipantes($conexion, $datos, $tabla) {
							if($tabla==true) {
								$cont=1;
								if($datos!=FALSE) {
									echo "<h1 class='display-4 text-center text-white fuentePersonalizadaRegistrado'>Datos de los responsables</h1>";
									echo "<p class='lead text-center text-white'>Tablas que muestran los responsables de los partidos</p>";
									foreach($datos as $indice => $dato) {
										echo "<table class='table table-bordered table-hover text-center align-middle mb-5' align='center' style='max-width:80%;'>";
											echo "<thead class='table-dark'><tr>";
												echo "<th width='200px'>Usuario</th>";
												echo "<th width='200px'>Nombre</th>";
												echo "<th width='200px'>Correo</th>";
												echo "<th width='200px'>Ciclo formativo</th>";
												echo "<th width='200px'>Equipo</th>";
												echo "<th width='200px'>Cargo</th>";
											echo "</tr></thead>";
											foreach ($dato as $indice2 => $dato2) {
												if($indice2<=1) {
													echo "<tr class='table-light'>";
														echo "<td>".$dato[$indice2][0]."</td>";
														echo "<td>".$dato[$indice2][1]."&nbsp;".$dato[$indice2][2]."</td>";
														echo "<td>".$dato[$indice2][3]."</td>";
														echo "<td>".$dato[$indice2][4]."</td>";
														echo "<td><form method='post' action='Controller_Participantes_Admin.php'><input type='submit' class='btn btn-outline-dark' name='participantesEquipo' value='".$dato[$indice2][5]."'></form></td>";
														echo "<td>Líder</td>";
													echo "</tr>";
												} else if($indice2==2) {
													echo "<tr class='table-light'>";
														echo "<td>".$dato[$indice2][0]."</td>";
														echo "<td>".$dato[$indice2][1]."&nbsp;".$dato[$indice2][2]."</td>";
														echo "<td>".$dato[$indice2][3]."</td>";
														echo "<td>".$dato[$indice2][4]."</td>";
														echo "<td>-</td>";
														echo "<td>Administrador</td>";
													echo "</tr>";
												}
											}
										echo "</table>";
									}
								}
							}
						}
					?>
					<?php
						function mostrarDatosTotalesDeParticipantes($conexion,$datos) {
							$cont=1;
							if($datos!=FALSE) {
								echo "<h1 class='display-4 text-center text-white fuentePersonalizadaRegistrado'>Datos de los participantes</h1>";
								echo "<p class='lead text-center text-white'>Tabla que muestra los componentes del equipo seleccionado</p>";
								echo "<table class='table table-bordered table-hover text-center align-middle mb-5' align='center' style='max-width:80%;'>";
								echo "<thead class='table-dark'><tr>";
									echo "<th width='200px'>Usuario</th>";
									echo "<th width='200px'>Nombre</th>";
									echo "<th width='200px'>Correo</th>";
									echo "<th width='200px'>Ciclo formativo</th>";
									echo "<th width='200px'>Equipo</th>";
								echo "</tr></thead>";
								foreach($datos as $indice => $dato) {
											echo "<tr class='table-light'>";
											echo "<td>".$datos[$indice][0]."</td>";
											echo "<td>".$datos[$indice][1]."&nbsp;".$datos[$indice][2]."</td>";
											echo "<td>".$datos[$indice][3]."</td>";
											echo "<td>".$datos[$indice][4]."</td>";
											echo "<td>".$datos[$indice][5]."</td>";
											echo "</tr>";
								}
							} else if($datos==FALSE) {
								echo "<tr>";
								echo "<td class='table-light' colspan='10'>No hay datos</td>";
								echo "</tr>";
							}
							echo "</table>";
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
