<?php


# Obtener el equipo al que pertenece el usuario

function obtenerEquipo($conexion, $usuario) {
	try {
		$stmt = $conexion->prepare("SELECT equipo FROM usuario WHERE idUsuario = '$usuario'");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Obtener el nombre del equipo al que pertenece el usuario

function obtenerNombreEquipo($conexion, $equipo) {
	try {
		$stmt = $conexion->prepare("SELECT nombreEquipo FROM equipo WHERE idEquipo = '$equipo'");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Obtener las estadísticas del equipo al que pertenece el usuario

function obtenerEstadisticasEquipo($conexion, $equipo) {
	try {
		$stmt = $conexion->prepare("SELECT torneosJugados, partidosJugados FROM estadistica WHERE equipoId = '$equipo'");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Obtener las estadísticas del equipo al que pertenece el usuario

function datosPartidos($conexion, $equipo) {
	try {
		$stmt = $conexion->prepare("SELECT partidosGanados, partidosPerdidos FROM estadistica WHERE equipoId = '$equipo'");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Obtener las estadísticas del equipo al que pertenece el usuario

function datosTorneos($conexion, $equipo) {
	try {
		$stmt = $conexion->prepare("SELECT torneosGanados, torneosJugados FROM estadistica WHERE equipoId = '$equipo'");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Obtener las estadísticas de los partidos globales de todos los equipos

function datosPartidosGlobales($conexion) {
	try {
		$stmt = $conexion->prepare("SELECT equipo.nombreEquipo, estadistica.partidosGanados FROM estadistica JOIN equipo ON equipo.idequipo = estadistica.equipoId");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Obtener las estadísticas de los torneos globales de todos los equipos

function datosTorneosGlobales($conexion) {
	try {
		$stmt = $conexion->prepare("SELECT equipo.nombreEquipo, estadistica.torneosGanados FROM estadistica JOIN equipo ON equipo.idequipo = estadistica.equipoId");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


?>
