<!-- Funcion Mostrar equipos de un torneo -->
<select style="width: 60%;"class="form-select fs-5 text-lg-center" name="datos" aria-label="datos" >

						<?php
						// $idTorneo=$_POST['datos'];
						// $nombre=obtenerNombreTorneo($conexion,$idTorneo);
						// $nombre2=$nombre[0];

						// echo "<option disabled hidden selected='selected'>".$nombre2."</option>";
						// $torneos=torneosActivos($conexion);
						// foreach ($torneos as $indice => $valor) {
						// 	echo "<option class='fw-normal fs-5 text-lg-center ' align='center' value='".$torneos[$indice][0]."'>".$torneos[$indice][1]."</option>";
						// }
						?> 
</select>

<!-- Select para el modelo -->
<!-- SELECT nombreTorneo as 'Nombre del Torneo',juego as Juego, estado as Estado, fechaInicio as 'Fecha de inicio',fechafin as 'Fecha fin' FROM usuario,equipo,torneo 
WHERE usuario.equipo=equipo.idequipo AND equipo.torneo=torneo.idTorneo AND equipo='$nombreTorneo'; -->