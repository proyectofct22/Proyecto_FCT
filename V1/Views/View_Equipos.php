<div class="container" align="center">
	<div>
		<header>
			<h1 style="margin-top: 5%;">Equipos</h1>
		</header>
		<div class="card-body">
			<div class="container px-4 py-5" id="custom-cards">
				<div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-2">
					<?php
						$datosEquipo = datosEquipo($conexion);
						// Con bucle pero es menos personalizable
						// for ($i = 0; $i <= 2; $i++) {
					?>
					<!-- <div class="col">
						<div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('../Images/Test.png');">
							<div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
								<h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold"> -->
									<?php
										// echo $datosEquipo[$i][0];
									?>
								<!-- </h3>
							</div>
						</div>
					</div> -->
					<?php
						// }
					?>
					<!-- Sin bucles se puede personalizar más por cada equipo -->
					<div class="col">
						<div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('../Images/Test.png');">
							<div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
								<h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">
									<?php
										echo $datosEquipo[0][0];
										echo "<br><br>" . $datosEquipo[0][1] . "&nbsp;Jugadores";
									?>
								</h3>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('unsplash-photo-1.jpg');">
							<div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
								<h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">
									<?php
										echo $datosEquipo[1][0];
										echo "<br><br>" . $datosEquipo[1][1] . "&nbsp;Jugadores";
									?>
								</h3>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-4 shadow-lg" style="background-image: url('unsplash-photo-1.jpg');">
							<div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
								<h3 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">
									<?php
										echo $datosEquipo[2][0];
										echo "<br><br>" . $datosEquipo[2][1] . "&nbsp;Jugadores";
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
