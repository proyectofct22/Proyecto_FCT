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
		<h1 class="display-4 fuentePersonalizadaRegistrado pt-5">Gestionar partidos</h1>
		<p class="lead">Seleccione el torneo y la fase que quiera gestionar. Cuando haya realizado todas las fases podrá finalizar el torneo.</p>
		<div class="card-body">
			<div class="row g-4" align="center">
				<div class="col-lg-12">
					<div class="pb-5" style="max-width: 75%;">
						<form method="POST" action="Controller_EditarPartido_Admin.php">
							<div class="form-group pb-4">
								<h4>Seleccione un torneo</h4>
								<select class="form-select text-center" name="torneos" id="torneos">
									<?php
										$torneos=torneosActivos($conexion);
										if (empty($torneos)) {
											echo "<option selected disabled hidden>No hay torneos</option>";
										} else {
											foreach ($torneos as $indice2 => $valor) {
												echo "<option class='text-center' value='".$torneos[$indice2][0]."'>".$torneos[$indice2][1]."</option>";
												$_SESSION['torneos']=$torneos[$indice2][0];
											}
										}
									?> 
								</select>
							</div>
							<div class="form-group pb-4">
								<h4>Seleccione la fase del torneo</h4>
								<select class="form-select text-center" name="fase" id="fase">
									<?php
										$torneo=$_SESSION['torneos'];
										$fases=fases($conexion,$torneo);
										if (empty($fases)) {
											echo "<option selected disabled hidden>No hay fases</option>";
										} else {
											foreach ($fases as $indice2 => $valor) {
												echo "<option class='text-center' value='".$fases[$indice2][0]."'>".$fases[$indice2][0]."</option>";
											}
										}
									?>
								</select>
							</div>
							<div class="row gy-2 pt-2">
								<div class="col-lg-6">
									<button name="MostrarPartidos" class="btn btn-outline-light w-100" type="submit">Mostrar Partidos</button>
								</div>
								<div class="col-lg-6">
									<button name="FinalizarTorneo" class="btn btn-outline-light w-100" >Finalizar Torneo</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="row g-4 px-5">
				<div class="col-lg-12">
						<!-- Tabla para mostrar los partidos con los equipos -->
						<?php
							function mostrarDatos($conexion,$torneoDatos,$tabla) {
								if($tabla==true) {
						?>
								<h1 class="display-4 fuentePersonalizadaRegistrado text-center text-white">Partidos del torneo</h1>
								<p class='lead text-center text-white'>Tabla que muestra los partidos dependiendo de la fase</p>
								<table class='table table-bordered table-hover text-center align-middle' align='center' style='max-width:80%;'>
									<thead class='table-dark align-middle'><tr>
										<th width="100px">
											<?php 
												echo "<form method='POST' action='Controller_EditarPartido_Admin.php'><button value='' id='botonEditar' name='botonEditar' class='text-white btn'><i style='font-size: 22px;' class='bi bi-tools'></i></button></form>";
											?>
										</th>
										<th width="100px">Fase</th>
										<th width="100px">Equipo 1</th>
										<th width="100px">Equipo 2</th>
										<th width="100px">Ganador</th>
										<th width="100px">Resultado</th>
										<th width="100px">Fecha Partido</th>
										<th width="100px">Turno</th>
										<th width="100px">Torneo</th>
									</tr></thead>
									<?php
										$cont=1;
										if($torneoDatos!=FALSE) {
											foreach($torneoDatos as $indice => $dato){
												echo "<tr class='table-light'>";
												echo "<td>".$cont++."</td>";
												echo "<td>".$torneoDatos[$indice]['Fase']."</td>";
												$equipo1=$torneoDatos[$indice]['Equipo1'];
												$equipo1=obtenerNombresEquipos($conexion,$equipo1);
												$equipo1=$equipo1[0];
												echo "<td>".$equipo1."</td>";
												$equipo2=$torneoDatos[$indice]['Equipo2'];
												$equipo2=obtenerNombresEquipos($conexion,$equipo2);
												$equipo2=$equipo2[0];
												echo "<td>".$equipo2."</td>";
												$equipoGanador=$torneoDatos[$indice]['EquipoGanador'];
												if($equipoGanador!=NULL){
													$equipoGanador=obtenerNombresEquipos($conexion,$equipoGanador);
													$equipoGanador=$equipoGanador[0];
													echo "<td>".$equipoGanador."</td>";
												} else {
													echo "<td>-</td>";
												}
												echo "<td>".$torneoDatos[$indice]['Resultado']."</td>";
												echo "<td>".$torneoDatos[$indice]['Fecha']."</td>";
												echo "<td>".$torneoDatos[$indice]['Turno']."</td>";
												echo "<td>".$torneoDatos[$indice]['Torneo']."</td>";
												echo "</tr>";
											}
										} else if($torneoDatos==FALSE) {
											echo "<tr>";
											echo "<td class='table-light' colspan='10'>No hay datos</td>";
											echo "</tr>";
										}
									echo "</table>";
									echo '<form method="POST" action="Controller_EditarPartido_Admin.php">';
									echo '<div class="text-center mb-5"><button name="SiguienteRonda" class="btn btn-outline-light" type="submit">Terminar Ronda</button></div>';
									echo '</form>';
							}
						}
						?>
						<!-- Tabla para editar los partidos con los equipos -->
						<?php
							function mostrarDatos2($conexion,$torneoDatos,$tabla2) {
								if($tabla2==true) {
						?>
								<h1 class="display-4 fuentePersonalizadaRegistrado text-center text-white">Partidos del torneo</h1>
								<p class='lead text-center text-white'>Tabla que muestra los partidos en modo edición</p>
								<table class="table table-bordered table-hover text-center align-middle mb-5" align="center" style="max-width:80%;">
									<thead class="table-dark align-middle"><tr>
										<th width="100px">
											<?php
												echo "<form method='POST' action='Controller_EditarPartido_Admin.php'>";
												echo "<button class='btn' type='submit' id='confirmar' name='confirmar'><img src='../../Media/Iconos/IconoGuardado.png' width='30px'></button>";
											?>
										</th>
										<th width="100px">Fase</th>
										<th width="100px">Equipo 1</th>
										<th width="100px">Equipo 2</th>
										<th width="100px">Ganador</th>
										<th width="100px">Resultado</th>
										<th width="100px">Fecha Partido</th>
										<th width="100px">Turno</th>
										<th width="100px">Torneo</th>
									</tr></thead>
									<?php
										$cont=1;
										if($torneoDatos!=FALSE) {
											foreach($torneoDatos as $indice => $dato) {
												echo "<tr class='table-light'>";
												echo "<td>".$cont."</td>";
												echo "<td>".$torneoDatos[$indice]['Fase']."</td>";
												$IDequipo1=$torneoDatos[$indice]['Equipo1'];
												$equipo1=obtenerNombresEquipos($conexion,$IDequipo1);
												$equipo1=$equipo1[0];
												echo "<td>".$equipo1."</td>";
												$IDequipo2=$torneoDatos[$indice]['Equipo2'];
												$equipo2=obtenerNombresEquipos($conexion,$IDequipo2);
												$equipo2=$equipo2[0];
												echo "<td>".$equipo2."</td>";
												$equipoGanador=obtenerNombresEquipos($conexion,$torneoDatos[$indice]['EquipoGanador']);
												if($equipoGanador!=NULL){
													echo "<td><select class='form-select text-lg-center' name='ganador".$cont."' id='Ganador'>
													<option value='".$torneoDatos[$indice]['EquipoGanador']."' hidden selected>".$equipoGanador[0]."</option>
													<option value='$IDequipo1'>$equipo1</option>
													<option value='$IDequipo2'>$equipo2</option>
													</select></td>";
												} else {
													echo "<td><select class='form-select text-lg-center' name='ganador".$cont."' id='Ganador'>
													<option value='$IDequipo1'>$equipo1</option>
													<option value='$IDequipo2'>$equipo2</option>
													</select></td>";
												}
												echo "<td><input class='form-control text-lg-center' type='text' pattern='^[0-9]{1,2}[-][0-9]{1,2}$' name='resultado".$cont."' value='".$torneoDatos[$indice]['Resultado']."'/></td>";
												echo "<td><input class='form-control text-lg-center' value='".$torneoDatos[$indice]['Fecha']."' type='date' name='fechaPartido".$cont."' /></td>";
												echo "<td><select class='form-select text-lg-center' name='Turno".$cont."' id='Turno'>
												<option value='".$torneoDatos[$indice]['Turno']."' hidden selected>".$torneoDatos[$indice]['Turno']."</option>
												<option value='Diurno'>Diurno</option>
												<option value='Vespertino'>Vespertino</option>
												</select></td>";
												echo "<td>".$torneoDatos[$indice]['Torneo']."</td>";
												echo "</tr>";
												$cont++;
											}
										} else if($torneoDatos==FALSE) {
											echo "<tr>";
											echo "<td class='table-light' colspan='10'>No hay datos</td>";
											echo "</tr>";
										}
										echo "</form>";
									echo "</table>";
							}
						}
						?>
						<!-- Tabla para ver los datos en modo solo lectura -->
						<?php
							function mostrarDatos3($conexion,$torneoDatos,$tabla2) {
								if($tabla2==true) {
						?>
								<h1 class="display-4 fuentePersonalizadaRegistrado text-center text-white">Partidos del torneo</h1>
								<p class='lead text-center text-white'>Tabla que muestra los partidos en modo lectura</p>
								<table class="table table-bordered table-hover text-center align-middle mb-5" align="center" style="max-width:80%;">
									<thead class="table-dark align-middle"><tr>
										<th width="100px"><i style="font-size: 22px;" class="bi bi-eye-fill"></i></th>
										<th width="100px">Fase</th>
										<th width="100px">Equipo 1</th>
										<th width="100px">Equipo 2</th>
										<th width="100px">Ganador</th>
										<th width="100px">Resultado</th>
										<th width="100px">Fecha Partido</th>
										<th width="100px">Turno</th>
										<th width="100px">Torneo</th>
									</tr></thead>
									<?php
										$cont=1;
										if($torneoDatos!=FALSE) {
											foreach($torneoDatos as $indice => $dato){
												echo "<tr class='table-light'>";
												echo "<td>".$cont."</td>";
												echo "<td>".$torneoDatos[$indice]['Fase']."</td>";
												$IDequipo1=$torneoDatos[$indice]['Equipo1'];
												$equipo1=obtenerNombresEquipos($conexion,$IDequipo1);
												$equipo1=$equipo1[0];
												echo "<td>".$equipo1."</td>";
												$IDequipo2=$torneoDatos[$indice]['Equipo2'];
												$equipo2=obtenerNombresEquipos($conexion,$IDequipo2);
												$equipo2=$equipo2[0];
												echo "<td>".$equipo2."</td>";
												$equipoGanador=obtenerNombresEquipos($conexion,$torneoDatos[$indice]['EquipoGanador']);
												if($equipoGanador!=NULL){
													echo "<td><select disabled class='form-select text-lg-center' name='ganador".$cont."' id='Ganador'>
													<option value='".$torneoDatos[$indice]['EquipoGanador']."' hidden selected>".$equipoGanador[0]."</option>
													<option value='$IDequipo1'>$equipo1</option>
													<option value='$IDequipo2'>$equipo2</option>
													</select></td>";
												} else {
													echo "<td><select class='form-select text-lg-center' disabled name='ganador".$cont."' id='Ganador'>
													<option value='$IDequipo1'>$equipo1</option>
													<option value='$IDequipo2'>$equipo2</option>
													</select></td>";
												}
												echo "<td><input disabled class='form-control text-lg-center' type='text' name='resultado".$cont."' value='".$torneoDatos[$indice]['Resultado']."'/></td>";
												echo "<td><input class='form-control text-lg-center' disabled value='".$torneoDatos[$indice]['Fecha']."' type='date' name='fechaPartido".$cont."' /></td>";
												echo "<td><select disabled class='form-select text-lg-center' name='Turno".$cont."' id='Turno'>
												<option value='".$torneoDatos[$indice]['Turno']."' hidden selected>".$torneoDatos[$indice]['Turno']."</option>
												<option value='Diurno'>Diurno</option>
												<option value='Vespertino'>Vespertino</option>
												</select></td>";
												echo "<td>".$torneoDatos[$indice]['Torneo']."</td>";
												echo "</tr>";
												$cont++;
											}
										} else if($torneoDatos==FALSE) {
											echo "<tr>";
											echo "<td class='table-light' colspan='10'>No hay datos</td>";
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
</div>
