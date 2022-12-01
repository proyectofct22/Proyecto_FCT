<?php
//----------------------------------------------------------------------------------------------------------
//CONSULTAS TABLAS
//----------------------------------------------------------------------------------------------------------

function torneosActivosFinalizados($conexion){
	try {
		$consulta=$conexion->prepare("SELECT idTorneo,nombreTorneo FROM torneo WHERE estado='Activo' OR estado='Finalizado'");
		$consulta->execute();
		$resultado=$consulta->fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error torneosActivosFinalizados"."<br>";
		echo $e->getMessage();
	}
}

function fechaDeLosPartidosDeUnTorneo($conexion,$idTorneo){
	try {
		$consulta=$conexion->prepare("SELECT DISTINCT(fechaPartido) FROM partido WHERE torneoId='$idTorneo'");
		$consulta->execute();
		$resultado=$consulta->fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error fechaDeLosPartidosDeUnTorneo"."<br>";
		echo $e->getMessage();
	}
}
function obtenerEquiposParticipantes($conexion,$idTorneo,$fecha){
	try {
		$consulta=$conexion->prepare("SELECT partido.idEquipoGanador,partido.idEquipoPerdedor,partido.responsableId FROM partido WHERE partido.torneoId='$idTorneo' AND partido.fechaPartido='$fecha'");
		$consulta->execute();
		$resultado=$consulta->fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error obtenerEquiposParticipantes"."<br>";
		echo $e->getMessage();
	}
}
function obtenerLiderDeEquipo($conexion,$idEquipo){
	try {
		$consulta=$conexion->prepare("SELECT usuario.nickUsuario AS 'Nick' ,usuario.nombreUsuario AS 'Nombre',usuario.apellidosUsuario AS 'Apellidos' ,usuario.correoUsuario AS 'Correo',
			usuario.cicloFormativo AS 'Ciclo', equipo.nombreEquipo AS 'NombreEquipo' FROM equipo,usuario
			WHERE equipo.idequipo=usuario.equipo AND equipo.idequipo='$idEquipo' AND usuario.liderEquipo='Si'");
		$consulta->execute();
		$resultado=$consulta->fetchAll();
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error obtenerParticipantes"."<br>";
		echo $e->getMessage();
	}
}
function obtenerResponsable($conexion,$responsable){
	try {
		$consulta=$conexion->prepare("SELECT usuario.nickUsuario AS 'Nick' ,usuario.nombreUsuario AS 'Nombre',usuario.apellidosUsuario AS 'Apellidos' ,usuario.correoUsuario AS 'Correo',
			usuario.cicloFormativo AS 'Ciclo', usuario.tipoUsuario AS 'TipoUsuario' FROM equipo,usuario
			WHERE usuario.idUsuario='$responsable'
			GROUP BY usuario.idUsuario");
		$consulta->execute();
		$resultado=$consulta->fetchAll();
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error obtenerParticipantes"."<br>";
		echo $e->getMessage();
	}
}
function obtenerInformaciónDeLosJugadores($conexion,$equipo){
	try {
		$consulta=$conexion->prepare("SELECT usuario.nickUsuario AS 'Nick' ,usuario.nombreUsuario AS 'Nombre',usuario.apellidosUsuario AS 'Apellidos' ,usuario.correoUsuario AS 'Correo',
			usuario.cicloFormativo AS 'Ciclo', equipo.nombreEquipo AS 'NombreEquipo' FROM equipo,usuario
			WHERE equipo.idequipo=usuario.equipo AND equipo.nombreEquipo='$equipo'");
		$consulta->execute();
		$resultado=$consulta->fetchAll();
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error obtenerParticipantes"."<br>";
		echo $e->getMessage();
	}
}

//----------------------------------------------------------------------------------------------------------
//VALIDACIONES
//----------------------------------------------------------------------------------------------------------





//----------------------------------------------------------------------------------------------------------
//INSERTAR DATOS EN TABLAS
//----------------------------------------------------------------------------------------------------------





//----------------------------------------------------------------------------------------------------------
//ACTUALIZAR TABLAS
//----------------------------------------------------------------------------------------------------------


?>