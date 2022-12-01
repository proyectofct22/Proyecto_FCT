<div class="container" align="center">
	<div class="pt-5 pb-5">
		<header>
			<h1 class="display-5 fw-bold pt-5">Equipos</h1>
		</header>
		<div class="card-body">
			<div class="row row-cols-1 row-cols-lg-4 text-white g-4 p-4">
				<?php
					$datosEquipo = datosEquipo($conexion); // Datos de los equipos
					foreach($datosEquipo as $dato) {
						echo '<div class="col">';
							echo '<div class="card rounded-4 shadow-lg" style="background-image:url(../Images/Equipos/FondoEquipos.png);">';
								echo "<div class='p-5'>";
									echo "<a class='btn btn-outline-light' href='./Controller_Jugadores.php/".$dato[0]."'>" . $dato[1] . "</a>";
								echo "</div>";
							echo "</div>";
						echo "</div>";
					}
				?>
			</div>
		</div>
	</div>
</div>
