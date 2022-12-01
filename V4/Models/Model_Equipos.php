<?php


# Obtener el id y el nombre de todos los equipos

function datosEquipo($conexion) {
	try {
		$stmt = $conexion->prepare("SELECT idequipo, nombreEquipo FROM equipo");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


?>
