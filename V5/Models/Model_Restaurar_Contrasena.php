<?php

# Obtener el id del usuario

function verificarUsuario($conexion, $usuario) {
	try {
		$stmt = $conexion->prepare("SELECT idUsuario FROM usuario WHERE nickUsuario = '$usuario'");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}

# Restaurar la contraseña

function restaurarContrasena($conexion, $password, $id) {
	try {
		$stmt = "UPDATE usuario SET passwordUsuario = md5('$password') WHERE idUsuario = '$id'";
		$conexion -> exec($stmt);
	} catch(PDOException $e) {
		echo "<div class='h5' align='center'>Error: " . $e -> getMessage() . "</div>";
	}
}


?>