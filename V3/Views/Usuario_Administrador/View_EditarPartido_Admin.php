<style>
	body{
		background-color: #8080803d;
	}
</style>
<div class="container" style="padding-top: 5%; max-width: 80rem; ">
	<div class="row g-4">
		<div class="row" style="margin: 2%;">
			<div class="card-body">
				<h1 style="margin: 10px;"class="fw-normal fs-3 text-lg-center fw-bolder">Editar Partidos</h1>
			</div>
		</div>
		<div class="row">
			<form method="POST" action="Controller_EditarPartido_Admin.php">
				<div class="col">
					<h4 class="fw-normal fs-4 fw-bolder">Torneos Iniciados</h4>
					<label width="" for="JuegoTorneo" class="form-label text-lg-center fw-normal fs-5">Torneos</label>
					<select class="form-select fw-normal fs-6 text-lg-center" name="torneos" id="torneos" aria-label="Jugadores">
						<?php
						$torneos=torneosActivos($conexion);
						foreach ($torneos as $indice2 => $valor) {
							echo "<option class='fw-normal fs-6 text-lg-center ' align='center' value='".$torneos[$indice2][0]."'>".$torneos[$indice2][1]."</option>";
						}
						?> 
					</select>
				</div>
				<hr class="my-4">
				<div align="center">
					<button name="MostrarPartidos" class="w-10 btn btn-primary" style="width: 50%; margin-top: 0px;" type="submit">Mostrar Partidos</button>
				</div>
			</form>
		</div>
		<div class="row" style="padding-top: 5%; margin-bottom: 100px;">
			<table class="table"style='text-align: center; vertical-align: middle;'>
				<tr>
					<th class="table-primary">#</th>
					<th class="table-primary">Nombre de Equipo 1</th>
					<th class="table-primary">Nombre de Equipo 2</th>
					<th class="table-primary">Fase Clasificación</th>
					<th class="table-primary">Torneo</th>
					<th class="table-primary">Estado</th>
					<th class="table-primary">Fecha partido</th>
					<th class="table-primary">Acciones</th>
				</tr>
				<?php
				function mostrarDatos($conexion,$torneoDatos){
					$cont=1;
					// var_dump($torneoDatos);
					if($torneoDatos!=FALSE){
						foreach($torneoDatos as $indice => $dato){
							echo "<tr class='table-light'>";

							echo "<td>".$cont++."</td>";

							echo "<td>".$torneoDatos[$indice]['Equipo1']."</td>";

							echo "<td>".$torneoDatos[$indice]['Equipo2']."</td>";

							echo "<td>".$torneoDatos[$indice]['Fase']."</td>";

							echo "<td>".$torneoDatos[$indice]['Torneo']."</td>";

							echo "<td>".$torneoDatos[$indice]['Estado']."</td>";

							echo "<td>".$torneoDatos[$indice]['Fecha']."</td>";

							echo "<td><button value=' id='botonBorrado' name='botonBorrado' class='text-info text-decoration-none btn'><i class='bi bi-pencil-fill'></i></button></td>";

							echo "</tr>";
						}
					}
					else if($torneoDatos==FALSE){
						echo "<tr>";
						echo "<td colspan='7'>No hay datos</td>";
						echo "</tr>";
					}
					echo "</table>";
				}

				?> 

			</div>
		</div>
	</div>
</div>


