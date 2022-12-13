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
	<div class="card border-light py-5 px-5 my-5 text-center text-white" style="background:rgba(0,0,0,0.8);">
		<?php
			$idEquipo = obtenerEquipo($conexion, $_SESSION['idUsuario']);
			$nombreEquipo = obtenerNombreEquipo($conexion, $idEquipo[0][0]);
			$estadisticasEquipo = obtenerEstadisticasEquipo($conexion, $idEquipo[0][0]);
			
			$validarEstadistica=1; // Inicializar la variable de validación
			if (empty($estadisticasEquipo)) { // Si el equipo no tiene estadísticas
				$validarEstadistica = 0;
			}

			$estadisticasEquipoVacia = false;
			if ($validarEstadistica == 0 || $estadisticasEquipo[0][0] == 0 || $estadisticasEquipo[0][1] == 0) {
				$estadisticasEquipoVacia = true; // Si el equipo aún no ha jugado nada
			}

			if (!empty($nombreEquipo) && $estadisticasEquipoVacia == false) { // Si el usuario tiene equipo y ha participado
				echo '<h1 class="display-4 text-white fuentePersonalizadaRegistrado">Estadísticas de&nbsp;'.$nombreEquipo[0][0].'</h1>';
				echo '<p class="lead text-white">Historial de los resultados de&nbsp;'.$nombreEquipo[0][0].' en los partidos y en los torneos realizados.</p>';
		?>
			<div class="row">
				<div class="col-lg-6">
					<div class="card p-2 mb-2">
						<div id="partidos"></div>
						<?php
							$partido = datosPartidos($conexion, $idEquipo[0][0]);
							$datosPartido = json_encode($partido, JSON_NUMERIC_CHECK);
							echo "<input id='datosPartido' type='hidden' value='".$datosPartido."'>";
						?>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="card p-2 mb-2">
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
		<?php
			}
		?>
		<h1 class="display-4 fuentePersonalizadaRegistrado">Estadísticas generales</h1>
		<p class="lead">Historial de los resultados de los equipos en los partidos y en los torneos realizados.</p>
			<div class="row">
				<div class="col-lg-6">
					<div class="card p-2 mb-2">
						<div id="partidosGlobales"></div>
						<?php
							$partidosGlobales = datosPartidosGlobales($conexion);
							$datosPartidosGlobales = json_encode($partidosGlobales, JSON_NUMERIC_CHECK);
							echo "<input id='datosPartidosGlobales' type='hidden' value='".$datosPartidosGlobales."'>";
						?>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="card p-2 mb-2">
						<div id="torneosGlobales"></div>
						<?php
							$torneosGlobales = datosTorneosGlobales($conexion);
							$datosTorneosGlobales = json_encode($torneosGlobales, JSON_NUMERIC_CHECK);
							echo "<input id='datosTorneosGlobales' type='hidden' value='".$datosTorneosGlobales."'>";
						?>
					</div>
				</div>
			</div>
		<?php
			if (!empty($nombreEquipo)) { // Si el usuario tiene equipo cargamos las gráficas de equipo
		?>
				<script src="../../Js/EstadisticasEquipo.js" type="text/javascript"></script>
		<?php
			}
		?>
		<script src="../../Js/EstadisticasGenerales.js" type="text/javascript"></script>
	</div>
</div>
