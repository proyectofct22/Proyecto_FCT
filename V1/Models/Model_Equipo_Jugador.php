<?php


# Obtener el nombre, el número de jugadores y el torneo

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

# Obtener el nombre, el número de jugadores y el torneo

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

?>
