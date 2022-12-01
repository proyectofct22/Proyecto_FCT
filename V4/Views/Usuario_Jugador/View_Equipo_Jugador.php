<div class="container" align="center">
	<div class="pt-5 pb-5">
		<header>
			<?php
				$datosEquipo = datosEquipo($conexion, $_SESSION['idUsuario']);
				$datosEquipoJugador = datosEquipoJugador($conexion, $datosEquipo[0]);
				if (empty($datosEquipoJugador)) { // Si el usuario no pertenece a ningún equipo
					echo '<h1 class="display-5 fw-bold pt-5">Mi equipo</h1>';
				} else { // Si el usuario pertenece a un equipo
					echo '<h1 class="display-5 fw-bold pt-5">'.$datosEquipoJugador[0][0].'</h1>';
				}
				$fondoEquipo = "url('../../Images/Default.png')";
			?>
		</header>
		<div class="card-body">
			<?php
				if (isset($datosEquipo) && empty($datosEquipoJugador)) { // Si el usuario no pertenece a ningún equipo
					echo '<div class="row g-4 p-4">';
						echo '<div class="col">';
							echo '<div class="card rounded-4 shadow-lg text-white" style="background-image:url(../../Images/Default.png);">';
								echo '<div class="p-5">';
									echo '<h3 class="fw-bold p-3">No pertenece a ningún equipo.';
								echo '</div>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
				}
				$datosJugadoresEquipo = datosJugadoresEquipo($conexion, $datosEquipo[0]);
				if (!empty($datosJugadoresEquipo)) { // Si el usuario pertenece a un equipo
					echo '<div class="row row-cols-1 row-cols-lg-5 g-4 p-4">';
					foreach($datosJugadoresEquipo as $dato) {
						$fondoJugador = "url('../../Images/Usuarios/FondoUsuario.png')";
						$fotoJugador = "../../Images/Usuarios/".$dato[0].".png";
						if (file_exists($fotoJugador)) {
							$fotoJugador = "../../Images/Usuarios/".$dato[0].".png";
						} else {
							$fotoJugador = "../../Images/Usuarios/Default.png";
						}
						echo '<div class="col">';
							echo '<div class="card rounded-4 shadow-lg text-white" style="background-image:'.$fondoJugador.';">';
								echo '<div class="p-5 fw-bold">';
										echo '<img class="rounded-5" src="'.$fotoJugador.'" width="100px" height="100px"><br><br>';
										echo $dato[1];
								echo '</div>';
							echo '</div>';
						echo '</div>';
					}
					echo '</div>';
					echo "<br><a class='btn btn-primary btn-lg' href='./Controller_Estadisticas_Equipo_Jugador.php'>Estadísticas del equipo</a>";
				}
			?>
		</div>
	</div>
</div>
