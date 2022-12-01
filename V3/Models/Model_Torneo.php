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

?>
