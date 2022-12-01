<style>
	body{
		background-color: #8080803d;
	}
</style>

<div class="container pt-5" align="center">
	<div>
		<header>
			<h1 class="display-5 fw-bold pt-5">Gestionar torneos</h1>
		</header>
		<div class="card-body">
			<div class="row g-4 px-5">
				<div class="col">
					<div class="py-5">
						<form method="POST" action="Controller_CrearTorneo_Admin.php">
							<h4 class="fw-bolder">Crear Torneo</h4>
							<div class="row pt-3">
								<div class="col">
									<input type="text" class="form-control textoCentrado" id="NombreTorneo" name="NombreTorneo" placeholder="Nombre">
								</div>
								<div class="col">
									<select class="form-select" name="juegos" id="juegos">
										<option align='center' value='Valorant'>Valorant</option>
										<option align='center' value='LOL'  >LOL</option>
									</select>
								</div>
							</div>
							<div class="pt-3">
								<button name="CrearTorneo" class="btn btn-primary" style="width: 50%;" type="submit">Crear Torneo</button>
							</div>
						</form>
					</div>
				</div>
				<div class="col">
					<div class="py-5">
						<form method="POST" action="Controller_CrearTorneo_Admin.php">
							<h4 class="fw-bolder">Iniciar Torneo</h4>
							<div class="pt-3">
								<select class="form-select fw-normal fs-6 text-lg-center" name="torneos" id="torneos" aria-label="torneos">
								<?php
									$torneos=torneosInactivos($conexion);
									foreach ($torneos as $indice2 => $valor) {
										echo "<option class='fw-normal fs-6 text-lg-center ' align='center' value='".$torneos[$indice2][0]."'>".$torneos[$indice2][1]."</option>";
									}
								?> 
								</select>
							</div>
							<div class="pt-3">
								<button name="IniciarTorneo" class="btn btn-primary" style="width: 50%;" type="submit">Iniciar Torneo</button>
							</div>
						</form>
					</div>
				</div>
				<div class="col">
					<div class="py-5">
						<form method="POST" action="Controller_CrearTorneo_Admin.php">
							<h4 class="fw-bolder">Finalizar Torneo</h4>
							<div class="pt-3">
								<select class="form-select fw-normal fs-6 text-lg-center" name="torneoFinalizado" id="torneos" aria-label="Jugadores">
								<?php
									$torneos=torneosActivos($conexion);
									foreach ($torneos as $indice2 => $valor) {
										echo "<option class='fw-normal fs-6 text-lg-center ' align='center' value='".$torneos[$indice2][0]."'>".$torneos[$indice2][1]."</option>";
									}
								?> 
								</select>
							</div>
							<div class="pt-3">
								<button name="FinalizarTorneo" class="btn btn-primary" style="width: 50%;" type="submit">Finalizar Torneo</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="row g-4 px-5">
				<div class="col">
					<div class="py-5 px-5">
						<form method="POST" action="">
							<h4 class="fw-bolder">Ver Torneos</h4>
							<div class="pt-3">
								<button name="MostrarDatos" class="btn btn-primary" style="width: 100%;" type="submit">Mostrar Torneos</button>
							</div>
						</form>
					</div>
				</div>
				<div class="col">
					<div class="py-5 px-5">
						<form method="POST" action="Controller_CrearTorneo_Admin.php">
							<h4 class="fw-bolder">Ver equipos del torneo</h4>
							<div class="row pt-3">
								<div class="col">
									<select class="form-select" name="equipos" id="equipos" aria-label="Torneos">
									<?php
										$torneos=torneosInactivos($conexion);
										foreach ($torneos as $indice2 => $valor) {
											echo "<option class='textoCentrado' value='".$torneos[$indice2][0]."'>".$torneos[$indice2][1]."</option>";
										}
									?> 
									</select>
								</div>
								<div class="col">
										<button name="VerEquipos" class="btn btn-primary" style="width: 100%;" type="submit">Mostrar Equipos</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="row g-4 px-5">
				<div class="col">
					<!-- Tabla para mostrar los equipos asignados a un torneo -->
					<?php
						function mostrarDatos($conexion,$equiposDatos){
					?>
						<table class="table table-bordered text-center" align="center" style="max-width:80%;">
							<tr>
								<th class="table-primary" width="100px">#</th>
								<th class="table-primary" width="100px">Equipo</th>
								<th class="table-primary" width="100px">Jugadores</th>
								<th class="table-primary" width="100px">Nombre Torneo</th>
								<th class="table-primary" width="100px">Acciones</th>
							</tr>
								<?php
									$cont=1;
									if($equiposDatos!=FALSE) {
										foreach($equiposDatos as $indice => $dato){
											echo "<tr class='table-light'>";
												echo "<td>".$cont++."</td>";
												echo "<td>".$equiposDatos[$indice]['Equipo']."</td>";
												echo "<td>".$equiposDatos[$indice]['Jugadores']."</td>";
												echo "<td>".$equiposDatos[$indice]['NombreTorneo']."</td>";
												echo "<td><form method='POST' action='../../Controllers/Usuario_Administrador/Controller_CrearTorneo_Admin.php'><button value='".$equiposDatos[$indice]['id']."' id='botonBorrado' name='botonBorrado' class='btn text-info'><i class='bi bi-trash3'></i></button></form></td>";
											echo "</tr>";
										}
									} else if ($equiposDatos==FALSE) {
										echo "<tr class='table-light'>";
											echo "<td colspan='7'>No hay datos</td>";
										echo "</tr>";
									}
								?>
						</table>
					<?php
						}
					?>

					<!-- Tabla para mostrar los datos de todos los torneos -->
					<?php
						function mostrarDatos2($conexion,$torneoDatos) {
					?>
						<table class="table table-bordered text-center" align="center" style="max-width:80%;">
							<tr>
								<th class="table-primary" width="100px">Nombre del Torneo</th>
								<th class="table-primary" width="100px">Juego</th>
								<th class="table-primary" width="100px">Estado</th>
								<th class="table-primary" width="100px">Fecha de Creación</th>
								<th class="table-primary" width="100px">Fecha de inicio</th>
								<th class="table-primary" width="100px">Fecha fin</th>
							<?php
								if($torneoDatos!=FALSE) {
									foreach($torneoDatos as $indice => $dato){
										echo "<tr class='table-light'>";
											echo "<td>".$torneoDatos[$indice]['Nombre del Torneo']."</td>";
											echo "<td>".$torneoDatos[$indice]['Juego']."</td>";
											echo "<td>".$torneoDatos[$indice]['Estado']."</td>";
											echo "<td>".$torneoDatos[$indice]['Fecha de creacion']."</td>";
											echo "<td>".$torneoDatos[$indice]['Fecha de inicio']."</td>";
											echo "<td>".$torneoDatos[$indice]['Fecha fin']."</td>";
										echo "</tr>";
									}
								} else if($torneoDatos==FALSE){
									echo "<tr>";
										echo "<td colspan='7'>No hay datos</td>";
									echo "</tr>";
								}
							?>
						</table>
					<?php
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>