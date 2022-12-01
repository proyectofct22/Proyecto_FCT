<style>
	body{
		background-color: #8080803d;
	}
</style>

<div class="container" align="center" style="padding-top: 7%; max-width: 80rem; ">
	<div class="row" align="center">
		<div class="col">
			<form method="POST" action="Controller_CrearEquipos_Admin.php">
				<div class="row">
					<div class="col">
						<h1 class="fw-normal fs-4 fw-bolder" align="center">Crear Equipo</h1>
						<h4 style="max-width: 40rem;"class="fw-normal fs-5 text-lg-center">Nombre del Equipo</h4>
						<input type="text" class="form-control fw-normal fs-5 text-lg-center" style="max-width: 40rem;" id="NombreEquipo" name="NombreEquipo" placeholder="" value="">
						<button name="CrearEquipo" class="btn btn-primary " style="width: 50%;margin: 5%;" type="submit">Crear</button>
					</div>
				</div> 
			</form>
		</div>

		<br>

		<div class="col">
			<form method="POST" action="Controller_CrearEquipos_Admin.php">
				<div class="row">
					<div class="col">
						<h1 class="fw-normal fs-4 fw-bolder">Asignar Jugadores</h1>
						<h4 class="fw-normal fs-5 text-lg-center">Nombre del Equipo</h4>
						<select class="form-select fs-5 text-lg-center" name="Equipos" id="Equipos" aria-label="Equipos">
							<?php
							$equipos=equiposAsignadoTorneo($conexion);
							foreach ($equipos as $indice => $valor) {
								echo "<option class='fw-normal fs-5 text-lg-center ' align='center' value='".$equipos[$indice][0]."'>".$equipos[$indice][1]."</option>";
							}
							?> 
						</select>
						<br>
						<h4 class="fw-normal fs-5 text-lg-center">Jugador</h4>
						<select class="form-select fs-5 text-lg-center" name="Jugador" id="Jugadores" aria-label="Equipos">
							<?php
							$jugadores=jugadoresSinEquipo($conexion);
							foreach ($jugadores as $indice2 => $valor) {
								echo "<option class='fw-normal fs-5 text-lg-center ' align='center' value='".$jugadores[$indice2][0]."'>".$jugadores[$indice2][1]."</option>";
							}
							?> 
						</select>

					</div> 

					<br>

					<div class="row">
						<div class="col">
							<button name="AsignarJugador" class="btn btn-primary" style="width: 50%;margin: 5%;" type="submit">Asignar Jugador</button>
						</div>
					</div>
				</div>	
			</form>
		</div>

		<br>

		<div class="col">
			<form method="POST" action="Controller_CrearEquipos_Admin.php">
				<div class="row">
					<div class="col">
						<h1 class="fw-normal fs-4 fw-bolder">Asignar Torneo</h1>
						<h4 style="max-width: 40rem;" class="fw-normal fs-5 text-lg-center">Nombre del Equipo</h4>
						<select class="form-select fs-5 text-lg-center" name="Equipos" id="Equipos" aria-label="Equipos">
							<?php
							$equipos=equiposTorneo($conexion);
							foreach ($equipos as $indice => $valor) {
								echo "<option class='fw-normal fs-5 text-lg-center ' align='center' value='".$equipos[$indice][0]."'>".$equipos[$indice][1]."</option>";
							}
							?> 
						</select>
						<br>
						<h4 style="max-width: 40rem;" class="fw-normal fs-5 text-lg-center">Selecciona Torneo</h4>
						<select class="form-select fw-normal fs-5 text-lg-center" name="torneos" id="torneos" aria-label="Jugadores">
							<?php
							$torneos=torneosActivos($conexion);
							foreach ($torneos as $indice2 => $valor) {
								echo "<option class='fw-normal fs-5 text-lg-center ' align='center' value='".$torneos[$indice2][0]."'>".$torneos[$indice2][1]."</option>";
							}
							?> 
						</select>
					</div>
				</div> 

				<div class="row">
					<div class="col">

						<button name="AsignarTorneo" style="width: 50%;margin: 5%;" class="btn btn-primary" type="submit">Asignar Torneo</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<br>

	<div class="row" style="max-width:50%;">	
		<form method="POST" action="">
			<div class="col" align="center">
				<h4 align="center" width="350px" class="fw-normal fs-4 fw-bolder" >Mostrar datos del Equipo</h4>
				<select style="width: 60%;"class="form-select fs-5 text-lg-center" name="datos" aria-label="datos" >
					<?php
					$nombre2="";
					$idEquipo=$_POST['datos'];
					$nombre=obtenerNombreEquipo($conexion,$idEquipo);
					$nombre2=$nombre[0];
					echo "<option disabled hidden selected='selected'>".$nombre2."</option>";
					$equipos=equiposAsignadoTorneo($conexion);
					foreach ($equipos as $indice => $valor) {
						echo "<option class='fw-normal fs-5 text-lg-center ' align='center' value='".$equipos[$indice][0]."'>".$equipos[$indice][1]."</option>";
					}
					?> 
				</select>
				<br>
				<div align="center">
					<button name="MostrarDatos" class="btn btn-primary" style="width: 60%;" type="submit">Mostrar</button>
				</div>
			</div>	
		</form>
	</div>
</div>


<?php
function mostrarDatos($conexion,$equipoDatos){
?>
<div class="container" align="center" style="max-width:70%;padding-top: 5%;">
		<div class="row">
			<div class="col">
				<table class="table" style='text-align: center; vertical-align: middle;'>
					<tr>
						<th class="table-primary" style="width:100px">Usuario</th>
						<th class="table-primary" style="width:100px">Nombre</th>
						<th class="table-primary" style="width:100px">Apellidos</th>
						<th class="table-primary" style="width:100px">Ciclo Formativo</th>
						<th class="table-primary" style="width:100px">Torneo</th>
						<th class="table-primary" style="width:100px">Juego</th>
						<th class="table-primary" style="width:100px">Acciones</th>
					</tr>
					<?php
					if($equipoDatos!=FALSE){
						foreach($equipoDatos as $indice => $dato){
							echo "<tr class='table-light'>";

							echo "<td>".$equipoDatos[$indice]['Usuario']."</td>";

							echo "<td>".$equipoDatos[$indice]['Nombre']."</td>";

							echo "<td>".$equipoDatos[$indice]['Apellidos']."</td>";

							echo "<td>".$equipoDatos[$indice]['Ciclo Formativo']."</td>";

							echo "<td>".$equipoDatos[$indice]['Torneo']."</td>";

							echo "<td>".$equipoDatos[$indice]['Juego']."</td>";

							$id=$equipoDatos[$indice]['Usuario'];

							echo "<form method='POST' action='../../Controllers/Usuario_Administrador/Controller_CrearEquipos_Admin.php'>";
							echo "<td><button value='".$id."' id='botonBorrado' name='botonBorrado' class='text-info text-decoration-none btn'><i class='bi bi-trash3'></i></button></td>";
							echo "</form>";

							echo "</tr>";
						}
					}
					else if($equipoDatos==FALSE){
						echo "<tr>";
						echo "<td class='table-light' colspan='7'>No hay datos</td>";
						echo "</tr>";
					}	
				}
				?> 
			</table>
		</div>
</div>

