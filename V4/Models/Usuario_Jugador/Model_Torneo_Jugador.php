<?php

# Obtener el nombre, el número de jugadores y el torneo

function datosTorneo($conexion) {
	try {
		$stmt = $conexion->prepare("SELECT nombreTorneo, juego, fechaInicio, fechaFin FROM torneo");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}
// # Obtener el id del equipo al que pertenece el usuario

// function obtenerIdEquipo($conexion, $idUsuario) {
// 	try {
// 		$stmt = $conexion->prepare("SELECT equipo FROM usuario WHERE idUsuario = '$idUsuario';");
// 		$stmt -> execute();
// 		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
// 		return $resultado;	
// 	} catch(PDOException $e) {
// 		echo "Error: " . $e -> getMessage();
// 	}
// }

// # Obtener el id del torneo en el que se encuentra el equipo del usuario

// function obtenerIdTorneo($conexion, $idEquipo) {
// 	try {
// 		$stmt = $conexion->prepare("SELECT torneo FROM equipo WHERE idequipo = '$idEquipo';");
// 		$stmt -> execute();
// 		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
// 		return $resultado;	
// 	} catch(PDOException $e) {
// 		echo "Error: " . $e -> getMessage();
// 	}
// }

// # Obtener los datos del torneo

// function obtenerDatosTorneo($conexion, $idTorneo) {
// 	try {
// 		$stmt = $conexion->prepare("SELECT nombreTorneo, juego, fechaInicio FROM torneo WHERE idTorneo = '$idTorneo';");
// 		$stmt -> execute();
// 		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
// 		return $resultado;	
// 	} catch(PDOException $e) {
// 		echo "Error: " . $e -> getMessage();
// 	}
// }


?>
