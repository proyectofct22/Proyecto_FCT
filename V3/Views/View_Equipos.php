<div class="container" align="center">
	<div class="px-4 pt-5 my-5 text-center">
		<header>
			<h1 class="display-5 fw-bold pt-5">Equipos</h1>
		</header>
		<div class="card-body">
			<div class="container px-4 py-5" id="custom-cards">
				<div class="row row-cols-1 row-cols-lg-4 align-items-stretch g-4 py-2">
					<?php
						$datosEquipo = datosEquipo($conexion);

						foreach($datosEquipo as $dato) {
							$fotoEquipo = "url('../Images/Equipos/".$dato[0].".png')";
					?>
						<div class="col">
							<div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: <?php echo $fotoEquipo; ?>;">
								<div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
									<h3 class="pt-5 mt-5 mb-4 lh-1 fw-bold">
										<?php
											echo $dato[0] . "<br><br>" . $dato[1] . "&nbsp;Jugadores";
										?>
									</h3>
								</div>
							</div>
						</div>
					<?php
						}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
