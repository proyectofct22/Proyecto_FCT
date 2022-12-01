<?php
//----------------------------------------------------------------------------------------------------------
//CONSULTAS TABLAS
//----------------------------------------------------------------------------------------------------------

function juegosTorneos($conexion){
	try {
		$consulta=$conexion->prepare("SELECT DISTINCT(juego) FROM torneo");
		$consulta->execute();
		$resultado= $consulta->fetchAll(PDO::FETCH_NUM);//array
		//$resultado= $consulta->fetch(PDO::FETCH_NUM);
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

function datosTorneo($conexion){
	try {
		$consulta=$conexion->prepare("SELECT nombreTorneo as 'Nombre del Torneo',juego as Juego, estado as Estado, fechaInicio as 'Fecha de inicio',fechafin as 'Fecha fin' FROM torneo");
		$consulta->execute();
		$resultado= $consulta->fetchAll(PDO::FETCH_ASSOC);//array
		//$resultado= $consulta->fetch(PDO::FETCH_NUM);
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
		echo "Error consulta"."<br>";
		echo $e->getMessage();
	}
}

function torneosActivos($conexion){
	try {
		$consulta=$conexion->prepare("SELECT idTorneo,nombreTorneo FROM torneo WHERE estado is NULL");
		$consulta->execute();
		$resultado= $consulta->fetchAll(PDO::FETCH_NUM);//array
		//$resultado= $consulta->fetch(PDO::FETCH_NUM);
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
		echo "Error consulta"."<br>";
		echo $e->getMessage();
	}
}


//----------------------------------------------------------------------------------------------------------
//INSERTAR DATOS EN TABLAS
//----------------------------------------------------------------------------------------------------------
function insertarTorneo($conexion,$maxIdTorneo,$nombreTorneo,$juego){
	try{
		$insert="INSERT INTO torneo VALUES ('$maxIdTorneo','$nombreTorneo','$juego',NULL,NULL,NULL,NULL)";
		$conexion->exec($insert);
	}
	catch(PDOException $e){
			echo "Error insertar"."<br>";
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
			WHERE nombreTorneo='$nombreTorneo' AND estado='Activo'");
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
		echo "Error consulta"."<br>";
		echo $e->getMessage();
	}
}

function validarMaxTorneo($conexion){
	try {
		$consulta=$conexion->prepare("SELECT COUNT(nombreTorneo) as numTorneos FROM `torneo` WHERE juego IN (SELECT juego FROM torneo WHERE juego='LOL' OR juego='Valorant') AND estado='Activo'");
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
		echo "Error consulta"."<br>";
		echo $e->getMessage();
	}
}

//----------------------------------------------------------------------------------------------------------
//ACTUALIZAR TABLAS
//----------------------------------------------------------------------------------------------------------


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
		$insert="INSERT INTO partido VALUES (NULL, NULL, NULL, NULL, 'Cuartos', '$torneo')";
		$conexion->exec($insert);
	}
	catch(PDOException $e){
			echo "Error insertar"."<br>";
			echo $e->getMessage();
	}
}


function insertarPartidasJuega($conexion,$maxIdPartido,$equipo1,$equipo2){
	try{
		$insert="INSERT INTO juega VALUES (NULL,NULL,'$maxIdPartido','$equipo1','$equipo2',NULL)";
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
