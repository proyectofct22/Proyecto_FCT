<?php


# Insertar el nuevo usuario en la base de datos. Por defecto será un usuario de tipo Jugador.

function altaUsuario($conexion, $tipoUsuario, $nombre, $apellido, $password, $ciclo) {
		try {
			$stmt = "INSERT INTO usuario (tipoUsuario, nombreUsuario, apellidosUsuario, passwordUsuario, cicloFormativo) VALUES ('$tipoUsuario', '$nombre', '$apellido', MD5('$password'), '$ciclo')";
			$conexion -> exec($stmt);
			echo "<script>alert('Se ha registrado correctamente');</script>";
		} catch (PDOException $e) {
			echo "Error: " . $e -> getMessage();
		}
	}


# Obtener el id y el tipo de usuario

function datosUsuario($conexion, $nombre) {
	try {
		$datos = array();
		$stmt = $conexion -> prepare("SELECT idUsuario, tipoUsuario FROM usuario WHERE nombreUsuario = '$nombre'");
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
