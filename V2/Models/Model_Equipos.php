<?php


# Obtener el nombre, el número de jugadores y el torneo

function datosEquipo($conexion) {
	try {
		$stmt = $conexion->prepare("SELECT nombreEquipo, numeroJugadores, torneo FROM equipo");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}

?>
