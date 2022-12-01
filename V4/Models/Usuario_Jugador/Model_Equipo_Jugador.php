<?php


# Obtener el id del equipo al que pertenece el usuario

function datosEquipo($conexion, $id) {
	try {
		$datos = array();
		$stmt = $conexion -> prepare("SELECT equipo FROM usuario WHERE idUsuario = '$id';");
		$stmt -> execute();
		$resultado = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
		foreach ($stmt -> fetchAll() as $row) {
			$datos[0] = $row["equipo"];
		}
		return $datos;
	} catch (PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}

# Obtener los datos del equipo al que pertenece el usuario

function datosEquipoJugador($conexion, $id) {
	try {
		$stmt = $conexion->prepare("SELECT nombreEquipo, numeroJugadores, torneo FROM equipo WHERE idequipo = '$id';");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}

# Obtener el id y el usuario de los jugadores del equipo del usuario registrado

function datosJugadoresEquipo($conexion, $id) {
	try {
		$stmt = $conexion->prepare("SELECT idUsuario, nickUsuario FROM usuario WHERE equipo = '$id';");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


?>
