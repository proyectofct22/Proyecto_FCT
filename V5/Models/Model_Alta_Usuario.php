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


# Insertar el nuevo usuario en la base de datos. Por defecto será un usuario de tipo Jugador.

function altaUsuario($conexion, $nickUsuario, $tipoUsuario, $nombreUsuario, $apellidoUsuario, $correoUsuario, $passwordUsuario, $cicloUsuario) {
	try {
		$stmt = "INSERT INTO usuario (nickUsuario, tipoUsuario, nombreUsuario, apellidosUsuario, correoUsuario, passwordUsuario, cicloFormativo, liderEquipo) VALUES ('$nickUsuario', '$tipoUsuario', '$nombreUsuario', '$apellidoUsuario', '$correoUsuario', MD5('$passwordUsuario'), '$cicloUsuario' , 'No')";
		$conexion -> exec($stmt);
	} catch (PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


?>
