<style>
body{
	background-color: #8080803d;
}
</style>

<div class="container" style="padding-top: 7%; max-width: 80rem; ">
	<div class="row g-3 col-md g-3" align="center">	
		<div class="col">
			<form method="POST" action="Controller_CrearEquipos_Admin.php">
				<div class="row g-2 col-md g-2" style="max-width: 20rem;">
					<div class="row">
						<h1 class="fw-normal fs-4 fw-bolder" align="center">Crear Equipo</h1>
						<h4 style="max-width: 40rem;"class="fw-normal fs-5 text-lg-center">Nombre del Equipo</h4>
						<input type="text" class="form-control fw-normal fs-5 text-lg-center" style="max-width: 40rem;" id="NombreEquipo" name="NombreEquipo" placeholder="" value="">
					</div> 
					<div align="center">
					</div> 
					<div class="row">
						<h4 style="max-width: 40rem;" class="fw-normal fs-5 text-lg-center">Selecciona Torneo</h4>
						<select class="form-select fw-normal fs-5 text-lg-center" name="torneos" id="torneos" aria-label="Jugadores">
							<?php
							$torneos=torneosActivos($conexion);
							foreach ($torneos as $indice2 => $valor) {
								echo "<option class='fw-normal fs-5 text-lg-center ' align='center' value='".$torneos[$indice2][0]."'>".$torneos[$indice2][1]."</option>";
							}
							?> 
						</select>
					</div>
					<br>
					<div align="center">
						<button name="CrearEquipo" class="btn btn-primary" style="width: 50%;" type="submit">Crear Equipo</button>
					</div>
				</form>
			</div>
		</div>

		<br>

		<div class="col">
			<div class="container">
				<div style="max-width: 20rem;">
					<form method="POST" action="Controller_CrearEquipos_Admin.php">
						<div class="row g-2 col-md g-2" style="max-width: 20rem;">
							<div class="row" align="center">
								<h1 class="fw-normal fs-4 fw-bolder" align="center">Asignar Jugadores</h1>
								<h4 style="max-width: 40rem;" class="fw-normal fs-5 text-lg-center">Nombre del Equipo</h4>
								<select class="form-select fs-5 text-lg-center" name="Equipos" id="Equipos" aria-label="Equipos">
									<?php
									$equipos=equiposTorneo($conexion);
									foreach ($equipos as $indice => $valor) {
										echo "<option class='fw-normal fs-5 text-lg-center ' align='center' value='".$equipos[$indice][0]."'>".$equipos[$indice][1]."</option>";
									}
									?> 
								</select>
							</div> 
							<div align="center">
							</div> 
							<div class="row" align="center">
								<h4 style="max-width: 40rem;" class="fw-normal fs-5 text-lg-center">Jugador</h4>
								<select class="form-select fs-5 text-lg-center" name="Jugador" id="Jugadores" aria-label="Equipos">
									<?php
									$jugadores=jugadoresSinEquipo($conexion);
									foreach ($jugadores as $indice2 => $valor) {
										echo "<option class='fw-normal fs-5 text-lg-center ' align='center' value='".$jugadores[$indice2][0]."'>".$jugadores[$indice2][1]."</option>";
									}
									?> 
								</select>
							</div> 
							<div align="center">
								<button name="AsignarJugador" class="btn btn-primary" style="width: 60%;" type="submit">Asignar Jugador</button>
							</div>
						</div>	
					</form>
				</div>
			</div>
		</div>

		<br>

		<div class="row" style="padding-top: 5%;">
			<div class="container">
				<div style="max-width: 30rem;">
					<form method="POST" action="">
						<div align="center">
							<h4 align="center" width="350px" class="fw-normal fs-4 fw-bolder" >Mostrar datos del Equipo</h4>
							<select style="width: 60%;"class="form-select fs-5 text-lg-center" name="datos" aria-label="datos" >

								<?php
								$idEquipo=$_POST['datos'];
								$nombre=obtenerNombreEquipo($conexion,$idEquipo);
								$nombre2=$nombre[0];
								
								echo "<option disabled hidden selected='selected'>".$nombre2."</option>";
								$equipos=equiposTorneo($conexion);
								foreach ($equipos as $indice => $valor) {
									echo "<option class='fw-normal fs-5 text-lg-center ' align='center' value='".$equipos[$indice][0]."'>".$equipos[$indice][1]."</option>";
								}
								?> 
							</select>
							<br>
							<div align="center">
								<button name="MostrarDatos" class="btn btn-primary" style="width: 60%;" type="submit">Mostrar datos</button>
							</div>
						</div>	
					</form>
				</div>
			</div>
		</div>

		<br>
		
		<div class="row" style="padding-top: 5%; margin-bottom: 100px;">
			<table class="table"style='text-align: center; vertical-align: middle;'>
				<tr>
					<th class="table-primary">Usuario</th>
					<th class="table-primary">Nombre</th>
					<th class="table-primary">Apellidos</th>
					<th class="table-primary">Ciclo Formativo</th>
					<th class="table-primary">Torneo</th>
					<th class="table-primary">Juego</th>
					<th class="table-primary">Acciones</th>
				</tr>
				<?php
				function mostrarDatos($conexion,$equipoDatos){
					if($equipoDatos!=FALSE){
						foreach($equipoDatos as $indice => $dato){
							echo "<tr class='table-light'>";
						
							echo "<td>".$equipoDatos[$indice]['Usuario']."</td>";
						
							echo "<td>".$equipoDatos[$indice]['Nombre']."</td>";
							
							echo "<td>".$equipoDatos[$indice]['Apellidos']."</td>";
							
							echo "<td>".$equipoDatos[$indice]['Ciclo Formativo']."</td>";
							
							echo "<td>".$equipoDatos[$indice]['Torneo']."</td>";
							
							echo "<td>".$equipoDatos[$indice]['Juego']."</td>";
							
							echo "<td><button value=' id='botonBorrado' name='botonBorrado' class='text-info text-decoration-none btn'><i class='bi bi-trash3'></i></button></td>";
							
							echo "</tr>";
						}
					}
					else if($equipoDatos==FALSE){
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

<!-- <script type="text/javascript">
    function enviar(ticketID) {
        if (window.confirm("¿Desea eliminar el ticket?")) {
            <?php 
                // $url = base_url();
                // $ruta = "MisIncidencias/borrarTicket";
                // $rutaCompleta = $url.$ruta."/";
            ?>
            // window.location.replace("<?php ///echo $rutaCompleta; ?>"+ticketID, "Thanks for Visiting!");
        }
    }
</script>
 -->