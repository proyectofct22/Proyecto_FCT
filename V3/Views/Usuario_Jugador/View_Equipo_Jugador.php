<div class="container" align="center">
	<div class="px-4 pt-5 my-5 text-center">
		<header>
			<h1 class="display-5 fw-bold pt-5">Mi equipo</h1>
		</header>
		<div class="card-body">
			<div class="container px-4 py-5" id="custom-cards">
				<div class="row row-cols-1 row-cols-lg-8 align-items-stretch g-4 py-2">
					<?php
						$datosEquipo = datosEquipo($conexion, $_SESSION['idUsuario']);
						// var_dump($datosEquipo[0]);
						$datosEquipoJugador = datosEquipoJugador($conexion, $datosEquipo[0]);
						// var_dump($datosEquipoJugador);
						if (!empty($datosEquipoJugador)) {
							$fondoEquipo = "url('../../Images/Equipos/FondoEquipo.png')";
							// $fotoEquipo = "../../Images/Equipos/".$datosEquipoJugador[0][0].".png";
							$fotoEquipo = "../../Images/Equipos/Default.png";
						} else {
							$fondoEquipo = "url('../../Images/Equipos/FondoEquipo.png')";
						}
					?>
					<div class="col">
						<div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: <?php echo $fondoEquipo; ?>;"> <!-- Imagen de fondo del div -->
							<div class="d-flex flex-column h-100 p-3 text-white text-shadow-1">
								<h3 class="pt-5 pb-5 fw-bold">
									<?php
										if (isset($datosEquipo) && empty($datosEquipoJugador)) {
											echo "No pertenece a ningún equipo.";
										} else {
											echo '<img class="rounded-5" src="'.$fotoEquipo.'" width="100px" height="100px"><br><br>';
											echo $datosEquipoJugador[0][0];
											$datosJugadoresEquipo = datosJugadoresEquipo($conexion, $datosEquipo[0]);
											// var_dump($datosJugadoresEquipo);
										}
									?>
								</h3>
							</div>
						</div>
					</div>
				</div>
				<?php
					if (!empty($datosJugadoresEquipo)) {
				?>
					<div class="row row-cols-1 row-cols-lg-5 align-items-stretch g-4 py-2">
						<?php
							foreach($datosJugadoresEquipo as $dato) {
								$fondoJugador = "url('../../Images/Usuarios/FondoUsuario.png')";
								// $fotoJugador = "../../Images/Usuarios/".$dato[0].".png";
								$fotoJugador = "../../Images/Usuarios/Default.png";
						?>
							<div class="col">
								<div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: <?php echo $fondoJugador; ?>;">
									<div class="d-flex flex-column h-100 p-3 text-white text-shadow-1">
										<h3 class="pt-5 pb-5 fw-bold">
											<?php
												echo '<img class="rounded-5" src="'.$fotoJugador.'" width="100px" height="100px"><br><br>';
												echo $dato[0];
											?>
										</h3>
									</div>
								</div>
							</div>
						<?php
							}
						?>
					</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>
</div>
