<div class="container" align="center">
	<div class="pt-5 pb-5">
		<?php
			$idEquipo = obtenerEquipo($conexion, $_SESSION['idUsuario']);
			$nombreEquipo = obtenerNombreEquipo($conexion, $idEquipo[0][0]);
			if (empty($nombreEquipo)) { // Si el usuario no está en un equipo
		?>
			<header>
				<h1 class="display-5 fw-bold pt-5">Estadísticas de equipo</h1>
			</header>
			<div class="row row-cols-1 row-cols-lg-8 align-items-stretch g-4 p-4">
				<div class="col">
					<div class="card card-cover overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('../../Images/Default.png');">
						<div class="d-flex flex-column h-100 p-3 text-white text-shadow-1">
							<h3 class="fw-bold p-5">No pertenece a ningún equipo.</h3>
						</div>
					</div>
				</div>
			</div>
		<?php
			} else { // Si el usuario pertenece a un equipo
		?>
			<header>
				<h1 class="display-5 fw-bold pt-5">Estadísticas de <?php echo $nombreEquipo[0][0]; ?></h1>
			</header>
			<div class="card-body">
				<div class="row pt-4">
					<div class="col-lg-6 pt-2">
						<div class="card">
							<div class="card-body">
								<div id="partidos"></div>
								<?php
									$partido = datosPartidos($conexion, $idEquipo[0][0]);
									$datosPartido = json_encode($partido, JSON_NUMERIC_CHECK);
									echo "<input id='datosPartido' type='hidden' value='".$datosPartido."'>";
								?>
							</div>
						</div>
					</div>
					<div class="col-lg-6 pt-2">
						<div class="card">
							<div class="card-body">
								<div id="torneos"></div>
								<?php
									$torneo = datosTorneos($conexion, $idEquipo[0][0]);
									$torneosPerdidos=$torneo[0][1]-$torneo[0][0]; // Obtenemos los torneos perdidos
									$perdidos = strval($torneosPerdidos); // Convertimos el dato a string
									$torneo[0][1] = $perdidos; // Lo guardamos en el array
									$datosTorneo = json_encode($torneo, JSON_NUMERIC_CHECK);
									echo "<input id='datosTorneo' type='hidden' value='".$datosTorneo."'>";
								?>
							</div>
						</div>
					</div>
				</div>
				<h1 class="display-5 fw-bold pt-5">Estadísticas globales</h1>
				<div class="row pt-4">
					<div class="col-lg-6 pt-2">
						<div class="card">
							<div class="card-body">
								<div id="partidosGlobales"></div>
								<?php
									$partidosGlobales = datosPartidosGlobales($conexion);
									$datosPartidosGlobales = json_encode($partidosGlobales, JSON_NUMERIC_CHECK);
									echo "<input id='datosPartidosGlobales' type='hidden' value='".$datosPartidosGlobales."'>";
								?>
							</div>
						</div>
					</div>
					<div class="col-lg-6 pt-2">
						<div class="card">
							<div class="card-body">
								<div id="torneosGlobales"></div>
								<?php
									$torneosGlobales = datosTorneosGlobales($conexion);
									$datosTorneosGlobales = json_encode($torneosGlobales, JSON_NUMERIC_CHECK);
									echo "<input id='datosTorneosGlobales' type='hidden' value='".$datosTorneosGlobales."'>";
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Llamada al documento JavaScript con las gráficas -->
			<script src="../../Js/Estadisticas.js" type="text/javascript"></script>
		<?php
			}
		?>
	</div>
</div>
