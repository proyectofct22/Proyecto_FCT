<?php


# Insertar el nuevo usuario en la base de datos. Por defecto será un usuario de tipo Jugador.

function altaUsuario($conexion, $nickUsuario, $tipoUsuario, $nombreUsuario, $apellidoUsuario, $correoUsuario, $passwordUsuario, $cicloUsuario) {
		try {
			$stmt = "INSERT INTO usuario (nickUsuario, tipoUsuario, nombreUsuario, apellidosUsuario, correoUsuario, passwordUsuario, cicloFormativo) VALUES ('$nickUsuario', '$tipoUsuario', '$nombreUsuario', '$apellidoUsuario', '$correoUsuario', MD5('$passwordUsuario'), '$cicloUsuario')";
			$conexion -> exec($stmt);
			echo "<script>alert('Se ha registrado correctamente');</script>";
		} catch (PDOException $e) {
			echo "Error: " . $e -> getMessage();
		}
	}


# Comprobar que el usuario introducido no existe en la base de datos

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


?>
