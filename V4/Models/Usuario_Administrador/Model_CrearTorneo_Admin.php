<?php
//----------------------------------------------------------------------------------------------------------
//CONSULTAS TABLAS
//----------------------------------------------------------------------------------------------------------

function datosTorneo($conexion){
	try {
		$consulta=$conexion->prepare("SELECT nombreTorneo as 'Nombre del Torneo',juego as Juego, estado as Estado, fechaCreacion as 'Fecha de creacion', fechaInicio as 'Fecha de inicio',fechafin as 'Fecha fin' FROM torneo");
		$consulta->execute();
		$resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);//array
		//$resultado= $consulta->fetch(PDO::FETCH_NUM);
		//$resultado= $consulta->fetch(PDO::FETCH_BOTH);
		//$resultado= $consulta->fetchAll();
		//$resultado = $consulta->fetchAll(PDO::FETCH_COLUMN, 0);  //Obtener una columna de un base de datos
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error datosTorneo"."<br>";
		echo $e->getMessage();
	}
}

function datosEquipos($conexion,$torneo){
	try {
		$consulta=$conexion->prepare("SELECT idequipo AS id, nombreEquipo AS Equipo,numeroJugadores AS Jugadores ,torneo.nombreTorneo AS NombreTorneo FROM equipo, torneo WHERE torneo.idTorneo=equipo.torneo AND equipo.torneo='$torneo'");
		$consulta->execute();
		$resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);//array
		//$resultado= $consulta->fetch(PDO::FETCH_NUM);
		//$resultado= $consulta->fetch(PDO::FETCH_BOTH);
		//$resultado= $consulta->fetchAll();
		//$resultado = $consulta->fetchAll(PDO::FETCH_COLUMN, 0);  //Obtener una columna de un base de datos
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error datosEquipos"."<br>";
		echo $e->getMessage();
	}
}

function maxidTorneo($conexion){
	try {
		$consulta=$conexion->prepare("SELECT Max(idTorneo) FROM torneo");
		$consulta->execute();

		$resultado= $consulta->fetch(PDO::FETCH_NUM);//array
		// $resultado= $consulta->fetch(PDO::FETCH_NUM);
		//$resultado= $consulta->fetch(PDO::FETCH_BOTH);
		// $resultado= $consulta->fetchAll();
		//$resultado = $consulta->fetchAll(PDO::FETCH_COLUMN, 0);  //Obtener una columna de un base de datos
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error maxidTorneo"."<br>";
		echo $e->getMessage();
	}
}

function torneosInactivos($conexion){
	try {
		$consulta=$conexion->prepare("SELECT idTorneo,nombreTorneo FROM torneo WHERE estado='Inactivo'");
		$consulta->execute();
		$resultado= $consulta->fetchAll(PDO::FETCH_NUM);//array
		//$resultado= $consulta->fetch(PDO::FETCH_NUM);
		//$resultado= $consulta->fetch(PDO::FETCH_BOTH);
		//$resultado= $consulta->fetchAll();
		//$resultado = $consulta->fetchAll(PDO::FETCH_COLUMN, 0);  //Obtener una columna de un base de datos
		
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error torneosInactivos"."<br>";
		echo $e->getMessage();
	}
}

function torneosActivos($conexion){
	try {
		$consulta=$conexion->prepare("SELECT idTorneo,nombreTorneo FROM torneo,partido WHERE torneo.idTorneo=partido.torneoId AND torneo.estado='Activo' AND partido.fasePartido='Final' AND partido.estadoPartido='Finalizado'");

		$consulta->execute();
		$resultado= $consulta->fetchAll(PDO::FETCH_NUM);//array
		//$resultado= $consulta->fetch(PDO::FETCH_NUM);
		//$resultado= $consulta->fetch(PDO::FETCH_BOTH);
		//$resultado= $consulta->fetchAll();
		//$resultado = $consulta->fetchAll(PDO::FETCH_COLUMN, 0);  //Obtener una columna de un base de datos
		
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error torneosActivos"."<br>";
		echo $e->getMessage();
	}
}

function obtenerNombreTorneo($conexion,$idTorneo){
	try {
		$consulta=$conexion->prepare("SELECT nombreEquipo FROM equipo WHERE idequipo='$idTorneo'");
		$consulta->execute();
		// $resultado= $consulta->fetch(PDO::FETCH_ASSOC);
		$resultado= $consulta->fetch(PDO::FETCH_NUM);
		//$resultado= $consulta->fetch(PDO::FETCH_BOTH);
		//$resultado= $consulta->fetchAll();
		//$resultado = $consulta->fetchAll(PDO::FETCH_COLUMN, 0);  //Obtener una columna de un base de datos
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error obtenerNombreTorneo"."<br>";
		echo $e->getMessage();
	}
}

function maxEquiposEnTorneo($conexion,$torneo){
	try {
		$consulta=$conexion->prepare("SELECT COUNT(idequipo) as 'Numeros de Equipos' FROM equipo,torneo WHERE equipo.torneo=torneo.idTorneo AND torneo.idTorneo='$torneo'");
		$consulta->execute();
		$resultado= $consulta->fetch(PDO::FETCH_NUM);
		//array
		//$resultado= $consulta->fetch(PDO::FETCH_NUM);
		//$resultado= $consulta->fetch(PDO::FETCH_BOTH);
		//$resultado= $consulta->fetchAll();
		//$resultado = $consulta->fetchAll(PDO::FETCH_COLUMN, 0);  //Obtener una columna de un base de datos
		
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error maxEquiposEnTorneo"."<br>";
		echo $e->getMessage();
	}
}

function idEquiposEstadisticas($conexion,$torneo){
	try {
		$consulta=$conexion->prepare("SELECT idequipo FROM equipo WHERE equipo.torneo='$torneo'");
		$consulta->execute();
		// $resultado= $consulta->fetch(PDO::FETCH_ASSOC);
		$resultado= $consulta->fetchAll(PDO::FETCH_NUM);
		//$resultado= $consulta->fetch(PDO::FETCH_BOTH);
		//$resultado= $consulta->fetchAll();
		//$resultado = $consulta->fetchAll(PDO::FETCH_COLUMN, 0);  //Obtener una columna de un base de datos
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error idEquiposEstadisticas"."<br>";
		echo $e->getMessage();
	}
}
 function comprobarEquipoEstadistica($conexion,$equipo){
 	try {
		$consulta=$conexion->prepare("SELECT equipoId FROM estadistica WHERE estadistica.equipoId='$equipo'");
		$consulta->execute();
		$resultado= $consulta->fetch(PDO::FETCH_NUM);
		// $resultado= $consulta->fetchAll(PDO::FETCH_NUM);
		//$resultado= $consulta->fetch(PDO::FETCH_BOTH);
		//$resultado= $consulta->fetchAll();
		//$resultado = $consulta->fetchAll(PDO::FETCH_COLUMN, 0);  //Obtener una columna de un base de datos
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error idEquiposEstadisticas"."<br>";
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

function insertarEstadisticasEquipos($conexion,$equipo){
	try{
		$insert="INSERT INTO estadistica VALUES (NULL,0,0,0,0,0,'$equipo')";
		$conexion->exec($insert);
	}
	catch(PDOException $e){
			echo "Error insertarEstadisticas"."<br>";
			echo $e->getMessage();
	}
}

//----------------------------------------------------------------------------------------------------------
//VALIDACIONES
//----------------------------------------------------------------------------------------------------------
function comprobarTorneo($conexion,$nombreTorneo,$juego){
	try {
		$consulta=$conexion->prepare("SELECT nombreTorneo
			FROM torneo 
			WHERE nombreTorneo='$nombreTorneo' AND estado='Inactivo'");
		$consulta->execute();
		$resultado= $consulta->fetch(PDO::FETCH_NUM);
		//array
		//$resultado= $consulta->fetch(PDO::FETCH_NUM);
		//$resultado= $consulta->fetch(PDO::FETCH_BOTH);
		//$resultado= $consulta->fetchAll();
		//$resultado = $consulta->fetchAll(PDO::FETCH_COLUMN, 0);  //Obtener una columna de un base de datos
		
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error comprobarTorneo"."<br>";
		echo $e->getMessage();
	}
}

function validarMaxTorneo($conexion){
	try {
		$consulta=$conexion->prepare("SELECT COUNT(nombreTorneo) as numTorneos FROM `torneo` WHERE juego IN (SELECT juego FROM torneo WHERE juego='LOL' OR juego='Valorant') AND estado='Inactivo' OR estado='Activo'");
		$consulta->execute();
		$resultado= $consulta->fetch(PDO::FETCH_NUM);
		//array
		//$resultado= $consulta->fetch(PDO::FETCH_NUM);
		//$resultado= $consulta->fetch(PDO::FETCH_BOTH);
		//$resultado= $consulta->fetchAll();
		//$resultado = $consulta->fetchAll(PDO::FETCH_COLUMN, 0);  //Obtener una columna de un base de datos
		
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error validarMaxTorneo"."<br>";
		echo $e->getMessage();
	}
}

//----------------------------------------------------------------------------------------------------------
//ACTUALIZAR TABLAS
//----------------------------------------------------------------------------------------------------------
function eliminarEquipoTorneo($conexion,$equipo){
	try{
		$updates= "UPDATE equipo SET torneo =NULL WHERE idequipo = '$equipo'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
		echo "Error eliminarEquipoTorneo()"."<br>";
		echo $e->getMessage();
	}		
}

function finalizarTorneo($conexion,$torneo,$fecha){
	try{
		$updates= "UPDATE torneo SET estado='Finalizado',fechaFin='$fecha' WHERE idTorneo='$torneo'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
		echo "Error finalizarTorneo()"."<br>";
		echo $e->getMessage();
	}		
}

function liberarEquipos($conexion,$torneo){
	try{
		$updates="UPDATE equipo SET equipo.torneo=NULL WHERE equipo.torneo='$torneo'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
		echo "Error actualizarTablaTorneo()"."<br>";
		echo $e->getMessage();
	}	
}


//----------------------------------------------------------------------------------------------------------
//CONSULTAS PARA LA FUNCION INICIAR TORNEO 
//----------------------------------------------------------------------------------------------------------
function actualizarDatosTorneo($conexion,$torneo,$Fecha){
	try{
		$updates= "UPDATE torneo SET estado ='Activo', fechaInicio='$Fecha' WHERE torneo.idTorneo = '$torneo'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
			echo "Error actualizar()"."<br>";
			echo $e->getMessage();
	}	
}

function obtenerEquipos($conexion,$torneo){
	try {
		$consulta=$conexion->prepare("SELECT equipo.idequipo FROM equipo,torneo WHERE torneo.idTorneo=equipo.torneo AND torneo.idTorneo='$torneo'");
		$consulta->execute();
		// $resultado= $consulta->fetch(PDO::FETCH_ASSOC);
		$resultado= $consulta->fetchAll(PDO::FETCH_NUM);
		//$resultado= $consulta->fetch(PDO::FETCH_BOTH);
		//$resultado= $consulta->fetchAll();
		//$resultado = $consulta->fetchAll(PDO::FETCH_COLUMN, 0);  //Obtener una columna de un base de datos
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error consulta"."<br>";
		echo $e->getMessage();
	}
}

function insertarDatosJuega($conexion,$torneo){
	try {
		$consulta=$conexion->prepare("SELECT equipo.idequipo FROM equipo,torneo WHERE torneo.idTorneo=equipo.torneo AND torneo.idTorneo='$torneo'");
		$consulta->execute();
		// $resultado= $consulta->fetch(PDO::FETCH_ASSOC);
		$resultado= $consulta->fetchAll(PDO::FETCH_NUM);
		//$resultado= $consulta->fetch(PDO::FETCH_BOTH);
		//$resultado= $consulta->fetchAll();
		//$resultado = $consulta->fetchAll(PDO::FETCH_COLUMN, 0);  //Obtener una columna de un base de datos
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error consulta"."<br>";
		echo $e->getMessage();
	}
}

function insertarDatosPartido($conexion,$torneo){
	try{
		$insert="INSERT INTO partido VALUES (NULL, NULL, NULL, NULL, 'Cuartos','Activo','$torneo')";
		$conexion->exec($insert);
	}
	catch(PDOException $e){
			echo "Error insertar"."<br>";
			echo $e->getMessage();
	}
}

function insertarPartidasJuega($conexion,$maxIdPartido,$equipo1,$equipo2){
	try{
		$insert="INSERT INTO juega VALUES (NULL,NULL,NULL,'$maxIdPartido','$equipo1','$equipo2')";
		$conexion->exec($insert);
	}
	catch(PDOException $e){
			echo "Error insertar"."<br>";
			echo $e->getMessage();
	}
}

function maxIDpartido($conexion){
	try {
		$consulta=$conexion->prepare("SELECT MAX(idPartido) as num FROM partido");
		$consulta->execute();
		// $resultado= $consulta->fetch(PDO::FETCH_ASSOC);
		$resultado= $consulta->fetch(PDO::FETCH_NUM);
		//$resultado= $consulta->fetch(PDO::FETCH_BOTH);
		//$resultado= $consulta->fetchAll();
		//$resultado = $consulta->fetchAll(PDO::FETCH_COLUMN, 0);  //Obtener una columna de un base de datos
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error consulta"."<br>";
		echo $e->getMessage();
	}
}



?>
