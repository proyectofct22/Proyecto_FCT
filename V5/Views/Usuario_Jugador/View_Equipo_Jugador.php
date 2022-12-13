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
	<div class="card border-light pt-5 px-4 my-5 text-center" style="background:rgba(0,0,0,0.8);">
		<?php
			$datosEquipo = datosEquipo($conexion, $_SESSION['idUsuario']);
			// var_dump($datosEquipo[0]);
			$datosEquipoJugador = datosEquipoJugador($conexion, $datosEquipo[0]);
			if (empty($datosEquipoJugador)) { // Si el usuario no pertenece a ningún equipo
				echo '<h1 class="display-4 text-white fuentePersonalizadaRegistrado">Equipo</h1>';
			} else { // Si el usuario pertenece a un equipo
				echo '<h1 class="display-4 text-white fuentePersonalizadaRegistrado">'.$datosEquipoJugador[0][0].'</h1>';
				echo '<p class="lead text-white">Listado de jugadores que pertenecen al equipo.</p>';
			}
			if (isset($datosEquipo) && empty($datosEquipoJugador)) { // Si el usuario no pertenece a ningún equipo
				echo '<div class="row g-4">';
					echo '<div class="col text-white px-5">';
						echo '<p class="lead text-white">No pertenece a ningún equipo.<br>¿Quiere crear el suyo propio?</p>';
						echo "<form method='post'>";
							echo '<input type="text" class="form-control text-center" name="nombreEquipo" placeholder="Nombre del equipo" required><br>';
							echo "<input type='submit' class='w-100 btn btn-outline-light mb-5' name='crearEquipo' value='Crear equipo'>";
						echo "</form>";
					echo '</div>';
				echo '</div>';
			}
			$datosJugadoresEquipo = datosJugadoresEquipo($conexion, $datosEquipo[0]);
			if (!empty($datosJugadoresEquipo)) { // Si el usuario pertenece a un equipo
				echo '<div class="row row-cols-lg-5 g-4">';
				foreach($datosJugadoresEquipo as $dato) {
					$fondoJugador = "url('../../Media/Usuarios/FondoUsuario.jpg')";
					$fotoJugador = "../../Media/Usuarios/".$dato[0].".jpg";
					if (file_exists($fotoJugador)) {
						$fotoJugador = "../../Media/Usuarios/".$dato[0].".jpg";
					} else {
						$fotoJugador = "../../Media/Usuarios/Default.jpg";
					}
					echo '<div class="col">';
						echo '<div class="card  border-light text-white" style="background-image:'.$fondoJugador.'; background-size: cover; background-position: center; background-repeat: no-repeat;">';
							echo '<div class="p-5 fw-bold">';
									echo '<img class="rounded" src="'.$fotoJugador.'" width="100px" height="100px"><br><br>';
									echo $dato[1];
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
				echo '</div>';
				echo "<div class='row g-4 p-4 mb-4'>";
					$esLiderEquipo = esLiderEquipo($conexion, $_SESSION['idUsuario']);
					$torneoActivo = torneoActivo($conexion, $datosEquipo[0]);
					$torneoInactivo = torneoInactivo($conexion, $datosEquipo[0]);
					if ($torneoInactivo != FALSE) {
						if ($esLiderEquipo[0][0] == 'Si') { // Si el usuario es líder y su equipo no está en un torneo
							echo "<div class='col'>";
								echo "<a class='btn btn-outline-light w-100' href='./Controller_Gestionar_Equipo_Jugador.php'>Gestionar equipo</a>";
							echo "</div>";
							echo "<div class='col'>";
								echo "<a class='btn btn-outline-light w-100' href='./Controller_Estadisticas_Equipo_Jugador.php'>Estadísticas del equipo</a>";
							echo "</div>";
						}
						if ($esLiderEquipo[0][0] == 'No') {// Si el usuario no es líder, quiere abandonar el equipo y su equipo no está en un torneo
							echo "<div class='col'>";
								echo "<form method='POST'>";
									echo "<button name='AbandonarEquipo' class='btn btn-outline-light w-100'>Abandonar equipo</button>";
								echo "</form>";
							echo "</div>";
							echo "<div class='col'>";
								echo "<a class='btn btn-outline-light w-100' href='./Controller_Estadisticas_Equipo_Jugador.php'>Estadísticas del equipo</a>";
							echo "</div>";
						}
					} else if ($torneoActivo != FALSE) {
						echo "<div class='col'>";
							echo "<a class='btn btn-outline-light w-100' href='./Controller_Estadisticas_Equipo_Jugador.php'>Estadísticas del equipo</a>";
						echo "</div>";
					}
				echo "</div>";
			}
		?>
	</div>
</div>
