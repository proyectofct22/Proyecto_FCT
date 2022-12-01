<div class="container">
			<div class="card-body">
				<?php
					// var_dump($_SESSION);
					echo "<h4 style='color: white; text-align: center; margin: 3% 0% 3% 0%;'>¡Bienvenido a tu perfil <span class='nombreUsuario'>" . $_SESSION["nombre"] . "</span>!</h4>";
					// echo "http://" . $_SERVER['SERVER_NAME']."/ProyectoFct/Controllers/Controller_Torneo.php";
				?>
				<table class="table table-dark table-striped table-hover border-dark" style="text-align: center;">
					<thead>
						<tr>
							<!-- <th scope="col" style="width: 100px"></th> -->
							<th scope="col">Nombre del usuario</th>
							<th scope="col">Apellido del usuario</th>
							<th scope="col">Ciclo Formativo</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<!-- <th scope="row">1</th> -->
							<td style="width: 400px">Luis</td>
							<td style="width: 400px">Lopez</td>
							<td style="width: 400px">SMR</td>
						</tr>
					</tbody>
				</table>
				<table class="table table-dark table-striped table-hover border-dark" style="text-align: center;">
					<thead>
						<tr>
							<!-- <th scope="col" style="width: 100px"></th> -->
							<th scope="col">Nombre del Equipo</th>
							<th scope="col">Participando actualmente</th>
							<th scope="col">Componentes del equipo</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<!-- <th scope="row">1</th> -->
							<td style="width: 400px">KOI</td>
							<td style="width: 400px">Torneo de inauguración</td>
							<td style="width: 400px">4</td>
						</tr>
					</tbody>
				</table>
				<table class="table table-dark table-striped table-hover border-dark" style="text-align: center;">
					<thead>
						<tr>
							<!-- <th scope="col" style="width: 100px"></th> -->
							<th scope="col">Nombre del Torneo</th>
							<th scope="col">Juego del torneo</th>
							<th scope="col">Ganador del torneo</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<!-- <th scope="row">1</th> -->
							<td style="width: 400px">Inauguración</td>
							<td style="width: 400px">Juego del torneo</td>
							<td style="width: 400px">El torneo todavía no ha terminado</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
