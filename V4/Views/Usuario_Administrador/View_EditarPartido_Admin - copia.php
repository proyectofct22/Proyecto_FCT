<style>
	body{
		background-color: #8080803d;
	}
</style>
<div class="container" align="center" style="margin-top: 100px;max-width: 80rem;">
	<div class="row">
		<h1 style="margin: 10px;"class="fw-normal fs-3 text-lg-center fw-bolder">Editar Partidos</h1>
	</div>
	<div class="row">
		<form method="POST" action="Controller_EditarPartido_Admin.php">
			<div class="col">
				
				<h4 class="fw-normal fs-4 fw-bolder">Partidos</h4>
				<label width="" for="JuegoTorneo" class="form-label text-lg-center fw-normal fs-5">Torneos</label>
				<select class="form-select fw-normal fs-6 text-lg-center" name="torneos" id="torneos" aria-label="Jugadores" style="width: 50%;">
					<?php
					$torneos=torneosActivos($conexion);
					foreach ($torneos as $indice2 => $valor) {
						echo "<option class='fw-normal fs-6 text-lg-center ' align='center' value='".$torneos[$indice2][0]."'>".$torneos[$indice2][1]."</option>";
						$_SESSION['torneos']=$torneos[$indice2][0];
					}
					?> 
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<label width="" for="JuegoTorneo" class="form-label text-lg-center fw-normal fs-5">Fases</label>
				<select class="form-select fw-normal fs-6 text-lg-center" name="fase" id="fase" aria-label="Fases" style="width: 50%;">
					;
					<?php
					$torneo=$_SESSION['torneos'];
					var_dump($_SESSION);
					$fases=fases($conexion,$torneo);
					foreach ($fases as $indice2 => $valor) {
						echo "<option class='fw-normal fs-6 text-lg-center ' align='center' value='".$fases[$indice2][0]."'>".$fases[$indice2][0]."</option>";
					}
					?>
				</select>
			</div>
		</div>
		<hr class="my-4" style="width: 50%;">

		<div class="row">
			<div class="col">
				<button name="MostrarPartidos" class="w-10 btn btn-primary" style="width: 25%; margin-top: 0px;" type="submit">Mostrar Partidos</button>
			</div>
		</div>

		<br>

		<div class="row">
			<div class="col">
				<div align="center">
					<button name="SiguienteRonda" class="w-10 btn btn-primary" style="width: 50%; margin-top: 0px;width: 25%;" type="submit">Siguiente Ronda</button>
					<!-- onclick="executeExample()"  -->
				</div>
			</div>
		</div>

	</form>
</div>
</div>

<br>
<div class="row">
	<?php
		// $tabla=false;
	function mostrarDatos($conexion,$torneoDatos,$tabla){

		if($tabla==true){
			?>
			<div class="row" style="padding-top: 5%;margin-bottom: 100px;max-width: 80rem;margin-left: 100px;">
				<table class="table"style='text-align: center; vertical-align: middle;'>
					<tr>
						<th class="table-primary">
							<?php 
							echo "<form method='POST' action='Controller_EditarPartido_Admin.php'>";
							echo "<button value='' id='botonEditar' name='botonEditar' class='text-dark text-decoration-none btn'><i style='font-size: 22px;' class='bi bi-wrench-adjustable-circle-fill'></i></button>";
							echo "</form>";
							?>
						</th>
						<th class="table-primary">Fase</th>
						<th class="table-primary">Equipo 1</th>
						<th class="table-primary">Equipo 2</th>
						<th class="table-primary">Ganador</th>
						<th class="table-primary">Resultado</th>
						<th class="table-primary">Fecha Partido</th>
						<th class="table-primary">Turno</th>
						<th class="table-primary">Torneo</th>
					</tr>
					<?php
					$cont=1;
					if($torneoDatos!=FALSE){
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
							}
							else{
								echo "<td>-</td>";
							}

							echo "<td>".$torneoDatos[$indice]['Resultado']."</td>";

							echo "<td>".$torneoDatos[$indice]['Fecha']."</td>";

							echo "<td>".$torneoDatos[$indice]['Turno']."</td>";

							echo "<td>".$torneoDatos[$indice]['Torneo']."</td>";

							echo "</tr>";
						}
					}
					else if($torneoDatos==FALSE){
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

<div class="row">
	<?php
			// $tabla2=false;
		// error_reporting(0);
	function mostrarDatos2($conexion,$torneoDatos,$tabla2){

		if($tabla2==true){
			?>
			<div class="row" style="padding-top: 5%;margin-bottom: 100px;max-width: 80rem;margin-left: 100px;">
				<table class="table"style='text-align: center; vertical-align: middle;'>
					<tr>
						<th class="table-primary">
							#
						</th>
						<th class="table-primary">Fase</th>
						<th class="table-primary">Equipo 1</th>
						<th class="table-primary">Equipo 2</th>
						<th class="table-primary">Ganador</th>
						<th class="table-primary">Resultado</th>
						<th class="table-primary">Fecha Partido</th>
						<th class="table-primary">Turno</th>
						<th class="table-primary">Torneo</th>
					</tr>
					<?php
					$cont=1;
					if($torneoDatos!=FALSE){
						// var_dump($torneoDatos);
						foreach($torneoDatos as $indice => $dato){

							echo "<form method='POST' action='Controller_EditarPartido_Admin.php'>";
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
							}
							else{

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

					}
					else if($torneoDatos==FALSE){
						echo "<tr>";
						echo "<td class='table-light' colspan='10'>No hay datos</td>";
						echo "</tr>";
					}
					echo "</table>";

					echo "<button 
					style='width: 146px;'
					class='btn btn-primary' type='submit' id='confirmar' name='confirmar' class='text-info text-decoration-none btn'>Confirmar Datos</button>";
					echo "</form>";
				}

			}
			?> 
		</div>
	</div>
</div>
<div class="row">
	<?php
	function mostrarDatos3($conexion,$torneoDatos,$tabla2){

		if($tabla2==true){
			?>
			<div class="row" style="padding-top: 5%;margin-bottom: 100px;max-width: 80rem;margin-left: 100px;">
				<table class="table"style='text-align: center; vertical-align: middle;'>
					<tr>
						<th class="table-primary">
							#
						</th>
						<th class="table-primary">Fase</th>
						<th class="table-primary">Equipo 1</th>
						<th class="table-primary">Equipo 2</th>
						<th class="table-primary">Ganador</th>
						<th class="table-primary">Resultado</th>
						<th class="table-primary">Fecha Partido</th>
						<th class="table-primary">Turno</th>
						<th class="table-primary">Torneo</th>
					</tr>
					<?php
					$cont=1;
					if($torneoDatos!=FALSE){
						// var_dump($torneoDatos);
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
							}
							else{

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

					}
					else if($torneoDatos==FALSE){
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


