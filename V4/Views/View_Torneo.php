<div class="container" align="center">
	<div class="pt-5 pb-5">
		<header>
			<h1 class="display-5 fw-bold pt-5">Torneos</h1>
		</header>
		<div class="card-body">
			<div class="row row-cols-1 row-cols-lg-2 g-4 p-4">
				<?php
					$datosTorneo = datosTorneo($conexion);

					foreach($datosTorneo as $dato) {
						$fotoJuego = "../Images/Juegos/".$dato[1].".png";
						echo '<div class="col">';
						if (file_exists($fotoJuego)) {
							echo '<div class="card rounded-4 shadow-lg" style="background-image:url('.$fotoJuego.'); background-size: cover;">';
						} else {
							echo '<div class="card rounded-4 shadow-lg" style="background-image:url(../Images/Juegos/Default.png); background-size: cover;">';
						}
				?>
								<h3 class="p-5 text-white">
									<?php
										echo $dato[0] . "<br>";
										if (empty($dato[2]) && empty($dato[3])) {
											echo "<br>El torneo aún no se ha iniciado<br>&nbsp;";
										} else {
											echo "<br>El torneo se inició el&nbsp;" . $dato[2] . "<br>&nbsp;";
											if (!empty($dato[3])) {
												echo "y finalizó el&nbsp;" . $dato[3];
											}
										}
									?>
								</h3>
				<?php
							echo "</div>";
						echo "</div>";
					}
				?>
			</div>
		</div>
	</div>
</div>
