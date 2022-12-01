<?php


# Obtener el id y el tipo de usuario

function equipoJugador($conexion, $id) {
	try {
		$datos = array();
		$stmt = $conexion->prepare("SELECT equipo.nombreEquipo AS Equipo FROM usuario INNER JOIN equipo ON usuario.equipo = equipo.idequipo WHERE usuario.idUsuario = '$id'");
		$stmt -> execute();
		$resultado = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
		foreach ($stmt -> fetchAll() as $row) {
			$datos[0] = $row["Equipo"];
		}
		return $datos;
	} catch (PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Obtener el ciclo al que pertenece el jugador

function cicloJugador($conexion, $id) {
	try {
		$datos = array();
		$stmt = $conexion->prepare("SELECT cicloFormativo AS Ciclo FROM usuario WHERE idUsuario = '$id'");
		$stmt -> execute();
		$resultado = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
		foreach ($stmt -> fetchAll() as $row) {
			$datos[0] = $row["Ciclo"];
		}
		return $datos;
	} catch (PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}

?>
