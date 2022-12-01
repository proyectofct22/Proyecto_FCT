<div class="container" align="center">
	<div class="px-4 pt-5 my-5 text-center">
		<header>
			<h1 class="display-5 fw-bold pt-5">Torneo</h1>
		</header>
		<div class="card-body">
			<div class="container px-4 py-5" id="custom-cards">
				<div class="row row-cols-1 row-cols-lg-8 align-items-stretch g-4 py-2">
					<?php
						// var_dump($_SESSION);
						$idEquipo = obtenerIdEquipo($conexion, $_SESSION['idUsuario']);
						// var_dump($idEquipo[0][0]);
						$idTorneo = obtenerIdTorneo($conexion, $idEquipo[0][0]);
						// var_dump($idTorneo[0][0]);
						if (!empty($idTorneo)) {
							$datos = obtenerDatosTorneo($conexion, $idTorneo[0][0]);
							// var_dump($datos);
							$fotoJuego = "url('../../Images/Juegos/".$datos[0][1].".png')";
						} else {
							$fotoJuego = "url('../../Images/Juegos/SinTorneo.png')";
						}
					?>
					<div class="col">
						<div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: <?php echo $fotoJuego; ?>;"> <!-- Imagen de fondo del div -->
							<div class="d-flex flex-column h-100 p-3 text-white text-shadow-1">
								<h3 class="pt-5 pb-5 fw-bold">
									<?php
										if (isset($idEquipo) && empty($idTorneo)) {
											echo "El equipo no está en ningún torneo actualmente.";
										} else {
											echo $datos[0][0];
											echo "<br><br>" . $datos[0][1];
										}
									?>
								</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
