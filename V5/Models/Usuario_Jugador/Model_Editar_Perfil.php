<?php


# Comprobar si el usuario introducido existe en la base de datos

function comprobarUsuario($conexion, $nickUsuario) {
	try {
		$stmt = $conexion->prepare("SELECT * FROM usuario WHERE nickUsuario = '$nickUsuario'");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Actualizar los datos del usuario en la base de datos.

function actualizarDatos($conexion, $nickUsuario, $passwordUsuario, $idUsuario) {
	try {
		$stmt = "UPDATE usuario SET nickUsuario = '$nickUsuario', passwordUsuario = MD5('$passwordUsuario') WHERE idUsuario = '$idUsuario'";
		$conexion -> exec($stmt);
	} catch (PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


?>
