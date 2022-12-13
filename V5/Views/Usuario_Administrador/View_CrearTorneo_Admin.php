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
		<h1 class="display-4 fuentePersonalizadaRegistrado pt-5">Gestionar torneos</h1>
		<p class="lead">Desde aqui podrá gestionar todas las opciones de los torneos.</p>
		<div class="card-body">
			<div class="row g-4">
				<div class="col-lg-4">
					<form method="POST" action="Controller_CrearTorneo_Admin.php">
						<h4>Crear un torneo</h4>
						<div class="row">
							<div class="col-lg-6">
								<input type="text" class="form-control text-center" id="NombreTorneo" name="NombreTorneo" placeholder="Nombre">
							</div>
							<div class="col-lg-6">
								<select class="form-select" name="juegos" id="juegos">
									<option selected disabled hidden>Seleccionar juego</option>
									<option align='center' value='Valorant'>Valorant</option>
									<option align='center' value='CSGO'>CSGO</option>
									<option align='center' value='LOL'>LOL</option>
								</select>
							</div>
						</div>
						<button name="CrearTorneo" class="btn btn-outline-light mt-3 w-100" type="submit">Crear</button>
					</form>
				</div>

				<div class="col-lg-4">
					<form method="POST" action="Controller_CrearTorneo_Admin.php">
						<h4>Gestionar equipos</h4>
						<div class="row">
							<div class="col">
								<select class="form-select text-center" name="equipos" id="equipos" aria-label="Torneos">
									<option selected disabled hidden>Seleccionar torneo</option>
									<?php
										$torneos = torneosInactivos($conexion);
										if (empty($torneos)) {
											echo "<option disabled>No hay torneos</option>";
										} else {
											foreach ($torneos as $indice2 => $valor) {
												echo "<option class='text-center' value='".$torneos[$indice2][0]."'>".$torneos[$indice2][1]."</option>";
											}
										}
									?> 
								</select>
							</div>
						</div>
						<button name="VerEquipos" class="btn btn-outline-light mt-3 w-100" type="submit">Gestionar</button>
					</form>
				</div>
				
				<div class="col-lg-4">
					<form method="POST" action="Controller_CrearTorneo_Admin.php">
						<h4>Iniciar un torneo</h4>
						<div class="row">
							<div class="col">
								<select class="form-select text-center" name="torneos" id="torneos" aria-label="torneos">
									<option selected disabled hidden>Seleccionar torneo</option>
									<?php
										$torneos = torneosInactivos($conexion);
										if (empty($torneos)) {
											echo "<option disabled>No hay torneos</option>";
										} else {
											foreach ($torneos as $indice2 => $valor) {
												echo "<option class='fw-normal fs-6 text-lg-center ' align='center' value='".$torneos[$indice2][0]."'>".$torneos[$indice2][1]."</option>";
											}	
										}
									?> 
								</select>
							</div>
						</div>
						<button name="IniciarTorneo" class="btn btn-outline-light mt-3 w-100" type="submit">Iniciar</button>
					</form>
				</div>
			</div>
			<div class="row g-4 px-5">
				<div class="col-lg-12">
					<div class="py-5">
						<form method="POST" action="">
							<h4>Ver torneos creados</h4>
							<button name="MostrarTorneos" class="btn btn-outline-light" type="submit">Mostrar</button>
						</form>
					</div>
				</div>
			</div>
			<div class="row g-4 px-5">
				<div class="col">
					<!-- Tabla para mostrar los equipos asignados a un torneo -->
					<?php
						function mostrarEquiposDelTorneo($conexion,$equiposDatos) {
					?>
						<h1 class="display-4 fuentePersonalizadaRegistrado text-center text-white">Equipos del torneo</h1>
						<table class="table table-bordered table-hover text-center align-middle mb-5" align="center" style="max-width:80%;">
							<thead class="table-dark align-middle"><tr>
								<th width="100px"><i style="font-size: 22px;" class="bi bi-eye-fill"></i></th>
								<th width="100px">Equipo</th>
								<th width="100px">Jugadores</th>
								<th width="100px">Nombre Torneo</th>
								<th width="100px">Acciones</th>
							</tr></thead>
							<?php
								$cont=1;
								if($equiposDatos!=FALSE) {
									foreach($equiposDatos as $indice => $dato) {
										echo "<tr class='table-light'>";
										echo "<td>".$cont++."</td>";
										echo "<td>".$equiposDatos[$indice]['Equipo']."</td>";
										echo "<td>".$equiposDatos[$indice]['Jugadores']."</td>";
										echo "<td>".$equiposDatos[$indice]['NombreTorneo']."</td>";
										echo "<td><form method='POST' action='../../Controllers/Usuario_Administrador/Controller_CrearTorneo_Admin.php'><button value='".$equiposDatos[$indice]['id']."' id='botonBorrado' name='botonBorrado' class='btn'><i class='bi bi-trash3'></i></button></form></td>";
										echo "</tr>";
									}
								} else if ($equiposDatos==FALSE) {
									echo "<tr class='table-light'>";
										echo "<td colspan='7'>No hay equipos en el torneo</td>";
									echo "</tr>";
								}
							?>
						</table>
					<?php
						}
					?>
					
					<!-- Tabla para mostrar los datos de todos los torneos -->
					<?php
						function mostrarDatosDeTodosLosTorneos($conexion,$torneoDatos) {
					?>
						<h1 class="display-4 fuentePersonalizadaRegistrado text-center text-white">Datos de los torneos</h1>
						<table class="table table-bordered table-hover text-center align-middle mb-5" align="center" style="max-width:80%;">
							<thead class="table-dark align-middle"><tr>
									<th width="100px"><i style="font-size: 22px;" class="bi bi-eye-fill"></i></th>
									<th width="100px">Nombre del torneo</th>
									<th width="100px">Juego</th>
									<th width="100px">Estado</th>
									<th width="100px">Fecha de creación</th>
									<th width="100px">Fecha de inicio</th>
									<th width="100px">Fecha de fin</th>
							</tr></thead>
								<?php
									$cont=1;
									if($torneoDatos!=FALSE) {
										foreach($torneoDatos as $indice => $dato){
											echo "<tr class='table-light'>";
											echo "<td>".$cont++."</td>";
											echo "<td>".$torneoDatos[$indice]['Nombre del Torneo']."</td>";
											echo "<td>".$torneoDatos[$indice]['Juego']."</td>";
											echo "<td>".$torneoDatos[$indice]['Estado']."</td>";
											echo "<td>".$torneoDatos[$indice]['Fecha de creacion']."</td>";
											echo "<td>".$torneoDatos[$indice]['Fecha de inicio']."</td>";
											echo "<td>".$torneoDatos[$indice]['Fecha fin']."</td>";
											echo "</tr>";
										}
									} else if($torneoDatos==FALSE) {
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