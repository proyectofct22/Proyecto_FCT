<style>
	body{
		background-color: #8080803d;
	}
</style>

<div class="container pt-5" align="center">
	<div>
		<header>
			<h1 class="display-5 fw-bold pt-5">Gestionar partidos</h1>
		</header>
		<div class="card-body">
			<div class="row g-4 px-5">
				<div class="col">
					<div class="py-5" style="max-width: 50%;">
						<form method="POST" action="Controller_EditarPartido_Admin.php">
							<label for="JuegoTorneo" class="form-label fs-4">Seleccione un torneo</label>
							<select class="form-select" name="torneos" id="torneos">
								<?php
									$torneos=torneosActivos($conexion);
									foreach ($torneos as $indice2 => $valor) {
										echo "<option class='textoCentrado' value='".$torneos[$indice2][0]."'>".$torneos[$indice2][1]."</option>";
										$_SESSION['torneos']=$torneos[$indice2][0];
									}
								?> 
							</select>
							<label for="JuegoTorneo" class="form-label fs-4 pt-4">Seleccione la fase del torneo</label>
								<select class="form-select" name="fase" id="fase">
								<?php
									$torneo=$_SESSION['torneos'];
									$fases=fases($conexion,$torneo);
									foreach ($fases as $indice2 => $valor) {
										echo "<option class='textoCentrado' value='".$fases[$indice2][0]."'>".$fases[$indice2][0]."</option>";
									}
								?>
								</select>
							<hr class="my-4" style="width: 100%;">
							<button name="MostrarPartidos" class="w-10 btn btn-primary" style="width: 25%; margin-top: 0px;" type="submit">Mostrar Partidos</button>
							<button name="SiguienteRonda" class="w-10 btn btn-primary" style="width: 50%; margin-top: 0px;width: 25%;" type="submit">Siguiente Ronda</button>
						</form>
					</div>
					<div>
						<!-- Tabla para mostrar los partidos con los equipos -->
						<?php
							function mostrarDatos($conexion,$torneoDatos,$tabla) {
								if($tabla==true) {
						?>
							<table class="table table-bordered text-center align-middle" align="center" style="max-width:80%;">
								<tr>
									<th class="table-primary" width="100px">
										<?php 
											echo "<form method='POST' action='Controller_EditarPartido_Admin.php'><button value='' id='botonEditar' name='botonEditar' class='text-dark text-decoration-none btn'><i style='font-size: 22px;' class='bi bi-tools'></i></button></form>";
										?>
									</th>
									<th class="table-primary" width="100px">Fase</th>
									<th class="table-primary" width="100px">Equipo 1</th>
									<th class="table-primary" width="100px">Equipo 2</th>
									<th class="table-primary" width="100px">Ganador</th>
									<th class="table-primary" width="100px">Resultado</th>
									<th class="table-primary" width="100px">Fecha Partido</th>
									<th class="table-primary" width="100px">Turno</th>
									<th class="table-primary" width="100px">Torneo</th>
								</tr>
									<?php
										$cont=1;
										if($torneoDatos!=FALSE) {
											foreach($torneoDatos as $indice => $dato){
												echo "<tr class='table-light'>";
													echo "<td>".$cont++."</td>";
													echo "<td>".$torneoDatos[$indice]['Fase']."</td>";
													$equipo1=$torneoDatos[$indice]['Equipo1'];
													$equipo1=obtenerNombreEquipo($conexion,$equipo1);
													$equipo1=$equipo1[0];
													echo "<td>".$equipo1."</td>";
													$equipo2=$torneoDatos[$indice]['Equipo2'];
													$equipo2=obtenerNombreEquipo($conexion,$equipo2);
													$equipo2=$equipo2[0];
													echo "<td>".$equipo2."</td>";
													$equipoGanador=$torneoDatos[$indice]['EquipoGanador'];
													if($equipoGanador!=NULL){
														$equipoGanador=obtenerNombreEquipo($conexion,$equipoGanador);
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
									?>
							</table>
						<?php
								}
							}
						?>
						<!-- Tabla para editar los partidos con los equipos -->
						<?php
							function mostrarDatos2($conexion,$torneoDatos,$tabla2) {
								if($tabla2==true) {
						?>
							<table class="table table-bordered text-center align-middle" align="center" style="max-width:80%;">
								<tr>
									<th class="table-primary" width="100px">
									<?php
										echo "<form method='POST' action='Controller_EditarPartido_Admin.php'>";
										echo "<button class='btn' type='submit' id='confirmar' name='confirmar'><img src='../../Images/icons8-save-30.png'></button>";
									?>
									</th>
									<th class="table-primary" width="100px">Fase</th>
									<th class="table-primary" width="100px">Equipo 1</th>
									<th class="table-primary" width="100px">Equipo 2</th>
									<th class="table-primary" width="100px">Ganador</th>
									<th class="table-primary" width="100px">Resultado</th>
									<th class="table-primary" width="100px">Fecha Partido</th>
									<th class="table-primary" width="100px">Turno</th>
									<th class="table-primary" width="100px">Torneo</th>
								</tr>
									<?php
										$cont=1;
										if($torneoDatos!=FALSE) {
											foreach($torneoDatos as $indice => $dato) {
												echo "<tr class='table-light'>";
													echo "<td>".$cont."</td>";
													echo "<td>".$torneoDatos[$indice]['Fase']."</td>";
													$IDequipo1=$torneoDatos[$indice]['Equipo1'];
													$equipo1=obtenerNombreEquipo($conexion,$IDequipo1);
													$equipo1=$equipo1[0];
													echo "<td>".$equipo1."</td>";
													$IDequipo2=$torneoDatos[$indice]['Equipo2'];
													$equipo2=obtenerNombreEquipo($conexion,$IDequipo2);
													$equipo2=$equipo2[0];
													echo "<td>".$equipo2."</td>";
													$equipoGanador=obtenerNombreEquipo($conexion,$torneoDatos[$indice]['EquipoGanador']);
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
													echo "<td><input class='form-control text-lg-center' type='text' name='resultado".$cont."' value='".$torneoDatos[$indice]['Resultado']."'/></td>";
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
									?>
							</table>
						<?php
								}
							}
						?>
						<!-- Tabla para ver los datos en modo solo lectura -->
						<?php
							function mostrarDatos3($conexion,$torneoDatos,$tabla2) {
								if($tabla2==true) {
						?>
							<table class="table table-bordered text-center align-middle" align="center" style="max-width:80%;">
								<tr>
									<th class="table-primary" width="100px"><i style="font-size: 22px;" class="bi bi-eye-fill"></i></th>
									<th class="table-primary" width="100px">Fase</th>
									<th class="table-primary" width="100px">Equipo 1</th>
									<th class="table-primary" width="100px">Equipo 2</th>
									<th class="table-primary" width="100px">Ganador</th>
									<th class="table-primary" width="100px">Resultado</th>
									<th class="table-primary" width="100px">Fecha Partido</th>
									<th class="table-primary" width="100px">Turno</th>
									<th class="table-primary" width="100px">Torneo</th>
								</tr>
									<?php
										$cont=1;
										if($torneoDatos!=FALSE) {
											foreach($torneoDatos as $indice => $dato){
												echo "<tr class='table-light'>";
													echo "<td>".$cont."</td>";
													echo "<td>".$torneoDatos[$indice]['Fase']."</td>";
													$IDequipo1=$torneoDatos[$indice]['Equipo1'];
													$equipo1=obtenerNombreEquipo($conexion,$IDequipo1);
													$equipo1=$equipo1[0];
													echo "<td>".$equipo1."</td>";
													$IDequipo2=$torneoDatos[$indice]['Equipo2'];
													$equipo2=obtenerNombreEquipo($conexion,$IDequipo2);
													$equipo2=$equipo2[0];
													echo "<td>".$equipo2."</td>";
													$equipoGanador=obtenerNombreEquipo($conexion,$torneoDatos[$indice]['EquipoGanador']);
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
									?>
							</table>
						<?php
								}
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
