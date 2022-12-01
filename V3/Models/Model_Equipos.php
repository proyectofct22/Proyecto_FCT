<?php


# Obtener el nombre y el número de jugadores

function datosEquipo($conexion) {
	try {
		$stmt = $conexion->prepare("SELECT nombreEquipo, numeroJugadores FROM equipo");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}

?>
