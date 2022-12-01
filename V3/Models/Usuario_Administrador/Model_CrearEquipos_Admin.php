<?php

//----------------------------------------------------------------------------------------------------------
//CONSULTAS TABLAS
//----------------------------------------------------------------------------------------------------------

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

function jugEquipos($conexion){
	try {
		$consulta=$conexion->prepare("SELECT idequipo,nombreEquipo FROM equipo");
		$consulta->execute();

		$resultado= $consulta->fetchAll(PDO::FETCH_NUM);//array
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

function equiposTorneo($conexion){
	try {
		$consulta=$conexion->prepare("SELECT idequipo,nombreEquipo FROM equipo,torneo WHERE equipo.torneo=torneo.idTorneo and torneo.estado is NULL");
		$consulta->execute();

		$resultado= $consulta->fetchAll(PDO::FETCH_NUM);//array
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

function idEquipo($conexion){
	try {
		$consulta=$conexion->prepare("SELECT Max(idequipo) FROM equipo");
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

function jugadoresSinEquipo($conexion){
	try {
		$consulta=$conexion->prepare("SELECT idUsuario,nombreUsuario FROM usuario WHERE equipo IS NULL AND tipoUsuario!='administrador'");
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



function obtenerNombreEquipo($conexion,$idEquipo){
	try {
		$consulta=$conexion->prepare("SELECT nombreEquipo FROM equipo WHERE idequipo='$idEquipo'");
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



function datosDeJugadoresConEquipo($conexion){
	try {
		$consulta=$conexion->prepare("SELECT nombreUsuario FROM usuario WHERE equipo IS NULL AND tipoUsuario!='administrador'");
		$consulta->execute();
		$resultado= $consulta->fetch(PDO::FETCH_ASSOC);//array
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

function jugadoresConEquipo($conexion,$equipo){
	try {
		$consulta=$conexion->prepare("SELECT equipo.nombreEquipo as 'Equipo Actual',nickUsuario as Usuario, nombreUsuario as Nombre, apellidosUsuario as Apellidos,cicloFormativo as 'Ciclo Formativo', torneo.nombreTorneo as 'Torneo', torneo.juego as Juego FROM usuario,equipo,torneo WHERE usuario.equipo=equipo.idequipo AND equipo.torneo=torneo.idTorneo AND equipo='$equipo'");
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


//----------------------------------------------------------------------------------------------------------
//INSERTAR DATOS EN TABLAS
//----------------------------------------------------------------------------------------------------------
function insertarEquipo($conexion,$maxIdTorneo,$nombreEquipo,$torneo){
	try{
		$insert="INSERT INTO equipo VALUES ('$maxIdTorneo','$nombreEquipo',5,1,NULL,'$torneo');";
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
function comprobarEquipo($conexion,$nombreEquipo){
	try {
		$consulta=$conexion->prepare("SELECT nombreEquipo FROM equipo WHERE nombreEquipo='$nombreEquipo'");
		$consulta->execute();
		$resultado= $consulta->fetch(PDO::FETCH_ASSOC);//array
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
		echo "Error consulta"."<br>";
		echo $e->getMessage();
	}
}

//----------------------------------------------------------------------------------------------------------
//ACTUALIZAR TABLAS
//----------------------------------------------------------------------------------------------------------

function asignarJugadores($conexion,$equipo,$jugador){
	try{
		$updates= "UPDATE usuario SET equipo='$equipo' WHERE idUsuario='$jugador'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
			echo "Error actualizar()"."<br>";
			echo $e->getMessage();
	}	
}

function desAsignarJugadores($conexion,$equipo,$jugador){
	try{
		$updates= "UPDATE usuario SET equipo=NULL WHERE idUsuario='$jugador'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
			echo "Error actualizar()"."<br>";
			echo $e->getMessage();
	}	
}


// SELECT COUNT(idequipo) as 'Numeros de Equipos' FROM equipo WHERE juego IN (SELECT juego FROM torneo WHERE juego='LOL' OR juego='Valorant') AND estado='Activo'

?>
