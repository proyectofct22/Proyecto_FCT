<?php


# Obtener el nombre del equipo seleccionado

function nombreEquipo($conexion, $equipo) {
	try {
		$stmt = $conexion->prepare("SELECT nombreEquipo FROM equipo WHERE idequipo = '".$equipo."'");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Obtener el id y el nombre de los jugadores del equipo seleccionado

function jugadoresEquipo($conexion, $equipo) {
	try {
		$stmt = $conexion->prepare("SELECT idUsuario, nickUsuario FROM usuario WHERE equipo = '".$equipo."'");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


?>
