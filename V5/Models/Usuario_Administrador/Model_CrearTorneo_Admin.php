<?php
//----------------------------------------------------------------------------------------------------------
//CONSULTAS TABLAS
//----------------------------------------------------------------------------------------------------------

function datosDeTorneos($conexion){
	try {
		$consulta=$conexion->prepare("SELECT nombreTorneo as 'Nombre del Torneo',juego as Juego, estado as Estado, fechaCreacion as 'Fecha de creacion', fechaInicio as 'Fecha de inicio',fechafin as 'Fecha fin' FROM torneo");
		$consulta->execute();
		$resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error datosTorneo"."<br>";
		echo $e->getMessage();
	}
}

function datosDeEquiposEnUnTorneo($conexion,$torneo){
	try {
		$consulta=$conexion->prepare("SELECT idequipo AS id, nombreEquipo AS Equipo,numeroJugadores AS Jugadores ,torneo.nombreTorneo AS NombreTorneo FROM equipo, torneo WHERE torneo.idTorneo=equipo.torneo AND equipo.torneo='$torneo'");
		$consulta->execute();
		$resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error datosEquipos"."<br>";
		echo $e->getMessage();
	}
}

function ultimaIdTorneo($conexion){
	try {
		$consulta=$conexion->prepare("SELECT Max(idTorneo) FROM torneo");
		$consulta->execute();

		$resultado= $consulta->fetch(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error ultimaIdTorneo"."<br>";
		echo $e->getMessage();
	}
}

function torneosInactivos($conexion){
	try {
		$consulta=$conexion->prepare("SELECT idTorneo,nombreTorneo FROM torneo WHERE estado='Inactivo'");
		$consulta->execute();
		$resultado= $consulta->fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error torneosInactivos"."<br>";
		echo $e->getMessage();
	}
}

function finalizarTorneosActivos($conexion){
	try {
		$consulta=$conexion->prepare("SELECT idTorneo,nombreTorneo FROM torneo,partido WHERE torneo.idTorneo=partido.torneoId AND torneo.estado='Activo' AND partido.fasePartido='Final' AND partido.estadoPartido='Finalizado'");

		$consulta->execute();
		$resultado= $consulta->fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error finalizarTorneosActivos"."<br>";
		echo $e->getMessage();
	}
}

function maxEquiposParticipantesEnUnTorneo($conexion,$torneo){
	try {
		$consulta=$conexion->prepare("SELECT COUNT(idequipo) as 'Numeros de Equipos' FROM equipo,torneo WHERE equipo.torneo=torneo.idTorneo AND torneo.idTorneo='$torneo'");
		$consulta->execute();
		$resultado= $consulta->fetch(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error maxEquiposParticipantesEnUnTorneo"."<br>";
		echo $e->getMessage();
	}
}

function idEquiposEnElTorneo($conexion,$torneo){
	try {
		$consulta=$conexion->prepare("SELECT idequipo FROM equipo WHERE equipo.torneo='$torneo'");
		$consulta->execute();
		$resultado= $consulta->fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error idEquiposEnElTorneo"."<br>";
		echo $e->getMessage();
	}
}
 function comprobarEquipoTieneEstadistica($conexion,$equipo){
 	try {
		$consulta=$conexion->prepare("SELECT equipoId FROM estadistica WHERE estadistica.equipoId='$equipo'");
		$consulta->execute();
		$resultado= $consulta->fetch(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error comprobarEquipoTieneEstadistica"."<br>";
		echo $e->getMessage();
	}
 }

//----------------------------------------------------------------------------------------------------------
//INSERTAR DATOS EN TABLAS
//----------------------------------------------------------------------------------------------------------
function insertarTorneo($conexion,$maxIdTorneo,$nombreTorneo,$juego,$Fecha){
	try{
		$insert="INSERT INTO torneo VALUES (NULL,'$nombreTorneo','$juego','Inactivo',NULL,'$Fecha',NULL,NULL)";
		$conexion->exec($insert);
	}
	catch(PDOException $e){
			echo "Error insertarTorneo"."<br>";
			echo $e->getMessage();
	}
}

function insertarEstadisticasAEquipos($conexion,$equipo){
	try{
		$insert="INSERT INTO estadistica VALUES (NULL,0,0,0,0,0,'$equipo')";
		$conexion->exec($insert);
	}
	catch(PDOException $e){
			echo "Error insertarEstadisticasAEquipos"."<br>";
			echo $e->getMessage();
	}
}

//----------------------------------------------------------------------------------------------------------
//VALIDACIONES
//----------------------------------------------------------------------------------------------------------
function comprobarSiExisteTorneoConMismoNombre($conexion,$nombreTorneo){
	try {
		$consulta=$conexion->prepare("SELECT nombreTorneo FROM torneo WHERE nombreTorneo='$nombreTorneo'");
		// SELECT nombreTorneo FROM torneo WHERE nombreTorneo='WorldCup' AND estado IN (SELECT estado FROM Torneo Where estado='Inactivo' OR estado='Activo' OR estado='Finalizado');
		$consulta->execute();
		$resultado= $consulta->fetch(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error comprobarSiExisteTorneoConMismoNombre"."<br>";
		echo $e->getMessage();
	}
}

function maxTorneosCreados($conexion){
	try {
		$consulta=$conexion->prepare("SELECT COUNT(nombreTorneo) as numTorneos FROM `torneo` WHERE juego IN (SELECT juego FROM torneo WHERE juego='LOL' OR juego='CSGO' OR juego='Valorant') AND estado='Inactivo' OR estado='Activo'");
		$consulta->execute();
		$resultado= $consulta->fetch(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error maxTorneosCreados"."<br>";
		echo $e->getMessage();
	}
}

//----------------------------------------------------------------------------------------------------------
//ACTUALIZAR TABLAS
//----------------------------------------------------------------------------------------------------------
function eliminarEquipoTorneo($conexion,$equipo){
	try{
		$updates= "UPDATE equipo SET torneo = NULL WHERE idequipo = '$equipo'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
		echo "Error eliminarEquipoTorneo()"."<br>";
		echo $e->getMessage();
	}		
}

//----------------------------------------------------------------------------------------------------------
//CONSULTAS PARA LA FUNCION INICIAR TORNEO 
//----------------------------------------------------------------------------------------------------------
function actualizarNuevoTorneo($conexion,$torneo,$Fecha){
	try{
		$updates= "UPDATE torneo SET estado ='Activo', fechaInicio='$Fecha' WHERE torneo.idTorneo = '$torneo'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
			echo "Error insertarNuevoTorneo()"."<br>";
			echo $e->getMessage();
	}	
}

function obtenerEquiposDelTorneo($conexion,$torneo){
	try {
		$consulta=$conexion->prepare("SELECT equipo.idequipo FROM equipo,torneo WHERE torneo.idTorneo=equipo.torneo AND torneo.idTorneo='$torneo'");
		$consulta->execute();
		$resultado= $consulta->fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error obtenerEquiposDelTorneo"."<br>";
		echo $e->getMessage();
	}
}

function insertarDatosPartido($conexion,$torneo,$responsable){
	try{
		$insert="INSERT INTO partido VALUES (NULL, NULL, NULL, NULL, 'Cuartos','Activo','$responsable','$torneo')";
		$conexion->exec($insert);
	}
	catch(PDOException $e){
			echo "Error insertarDatosPartido"."<br>";
			echo $e->getMessage();
	}
}

function insertarPartidosJuega($conexion,$maxIdPartido,$equipo1,$equipo2){
	try{
		$insert="INSERT INTO juega VALUES (NULL,'0-0',NULL,'$maxIdPartido','$equipo1','$equipo2')";
		$conexion->exec($insert);
	}
	catch(PDOException $e){
			echo "Error insertarPartidosJuega"."<br>";
			echo $e->getMessage();
	}
}

function maxIDpartido($conexion){
	try {
		$consulta=$conexion->prepare("SELECT MAX(idPartido) as num FROM partido");
		$consulta->execute();
		$resultado= $consulta->fetch(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error maxIDpartido"."<br>";
		echo $e->getMessage();
	}
}



?>
