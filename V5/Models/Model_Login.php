<?php


# Verificar el inicio de sesión del usuario

function loginUsuario($conexion, $nick, $password) {
	try {
		$stmt = $conexion -> prepare("SELECT nickUsuario, passwordUsuario FROM usuario WHERE nickUsuario = '$nick' AND passwordUsuario = '$password'");
		$stmt -> execute();
		$loginCorrecto = false;
		$resultado = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
		foreach ($stmt -> fetchAll() as $row) {
			if ($row["nickUsuario"] == $nick && $row["passwordUsuario"] == $password) {
				$loginCorrecto = true;
			}
		}
		return $loginCorrecto;
	} catch (PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Obtener el id y el tipo de usuario

function datosUsuario($conexion, $nick) {
	try {
		$datos = array();
		$stmt = $conexion -> prepare("SELECT idUsuario, tipoUsuario FROM usuario WHERE nickUsuario = '$nick'");
		$stmt -> execute();
		$resultado = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
		foreach ($stmt -> fetchAll() as $row) {
			$datos[0] = $row["idUsuario"];
			$datos[1] = $row["tipoUsuario"];
		}
		return $datos;
	} catch (PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


?>
