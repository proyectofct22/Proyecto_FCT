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


# Actualizar el usuario en la base de datos.

function cambioUsuario($conexion, $nickUsuario, $idUsuario) {
	try {
		$stmt = "UPDATE usuario SET nickUsuario = '$nickUsuario' WHERE idUsuario = '$idUsuario'";
		$conexion -> exec($stmt);
	} catch (PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Comprobar si el correo introducido existe en la base de datos

function comprobarCorreo($conexion, $correoUsuario) {
	try {
		$stmt = $conexion->prepare("SELECT * FROM usuario WHERE correoUsuario = '$correoUsuario'");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Actualizar el usuario en la base de datos.

function cambioCorreo($conexion, $correoUsuario, $idUsuario) {
	try {
		$stmt = "UPDATE usuario SET correoUsuario = '$correoUsuario' WHERE idUsuario = '$idUsuario'";
		$conexion -> exec($stmt);
	} catch (PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Comprobar que la contraseña introducida no es la misma que en la base de datos

function comprobarPassword($conexion, $passwordUsuario) {
	try {
		$stmt = $conexion->prepare("SELECT * FROM usuario WHERE passwordUsuario = '$passwordUsuario'");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Actualizar la contraseña en la base de datos.

function cambioPassword($conexion, $passwordUsuario, $idUsuario) {
	try {
		$stmt = "UPDATE usuario SET passwordUsuario = MD5('$passwordUsuario') WHERE idUsuario = '$idUsuario'";
		$conexion -> exec($stmt);
	} catch (PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


?>
