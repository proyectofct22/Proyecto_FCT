<div class="container" align="center">
	<div class="pt-5 pb-5">
		<header>
			<?php
				$url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/')); // Obtenemos la url
				$nombreEquipo = nombreEquipo($conexion, $url[3]);
			?>
			<h1 class="display-5 fw-bold pt-5">Jugadores de <?php echo $nombreEquipo[0][0]; ?></h1>
		</header>
		<div class="card-body">
				<?php
					$jugadoresEquipo = jugadoresEquipo($conexion, $url[3]); // Datos de los equipos
					if (empty($jugadoresEquipo)) { // Si el equipo no tiene jugadores
						echo '<div class="row g-4 p-4">';
							echo '<div class="col">';
								echo '<div class="card rounded-4 shadow-lg text-white" style="background-image:url(../../Images/Default.png);">';
									echo '<div class="p-5">';
										echo "El equipo no tiene jugadores actualmente";
									echo "</div>";
								echo "</div>";
							echo "</div>";
						echo "</div>";
					} else { // Si el equipo tiene jugadores
						echo file_exists("../../Images/Usuarios/Default.png");
						echo '<div class="row row-cols-1 row-cols-lg-5 g-4 p-4">';
							foreach($jugadoresEquipo as $jugador) {
								$fotoJugador = "../../Images/Usuarios/".$jugador[0].".png";
								if (!file_exists(dirname(__FILE__) . $fotoJugador)) { // Si el usuario no tiene foto
									$fotoJugador = "../../Images/Usuarios/Default.png";
								}
								echo '<div class="col">';
									echo '<div class="card rounded-4 shadow-lg text-white" style="background: url(../../Images/Probar/9.png) no-repeat center;">';
										echo '<div class="p-5 fw-bold">';
											echo '<img class="rounded-5" src="'.$fotoJugador.'" width="100px" height="100px"><br><br>'.$jugador[1];
										echo "</div>";
									echo "</div>";
								echo "</div>";
							}
						echo "</div>";
					}
				?>
			</div>
			<a class='btn btn-primary' href='../Controller_Equipos.php'>Volver a los equipos</a>
		</div>
	</div>
</div>
