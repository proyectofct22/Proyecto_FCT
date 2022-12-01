<div class="container" align="center">
	<div>
		<header>
			<h1 style="margin-top: 5%;">Equipos</h1>
		</header>
		<div class="card-body">
			<div class="container px-4 py-5" id="custom-cards">
				<div class="row row-cols-1 row-cols-lg-8 align-items-stretch g-4 py-2">
					<?php
						$datosEquipo = datosEquipo($conexion, $_SESSION['idUsuario']);
						// var_dump($datosEquipo[0]);
						$datosEquipoJugador = datosEquipoJugador($conexion, $datosEquipo[0]);
						// var_dump($datosEquipoJugador);
					?>
					<div class="col">
						<div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('../../Images/Test.png');"> <!-- Imagen de fondo del div -->
							<div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
								<h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">
									<?php
										if (isset($datosEquipo) && empty($datosEquipoJugador)) {
											echo "No pertenece a ningún equipo.";
										} else {
											echo $datosEquipoJugador[0][0];
											echo "<br><br>" . $datosEquipoJugador[0][1] . "&nbsp;Jugadores";
											echo "<br><br>Torneo: " . $datosEquipoJugador[0][2];
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
