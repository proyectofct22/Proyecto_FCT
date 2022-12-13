<?php


# Obtener el id del equipo al que pertenece el usuario

function datosEquipo($conexion, $id) {
	try {
		$datos = array();
		$stmt = $conexion -> prepare("SELECT equipo FROM usuario WHERE idUsuario = '$id';");
		$stmt -> execute();
		$resultado = $stmt -> setFetchMode(PDO::FETCH_ASSOC);
		foreach ($stmt -> fetchAll() as $row) {
			$datos[0] = $row["equipo"];
		}
		return $datos;
	} catch (PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Obtener los datos del equipo al que pertenece el usuario

function datosEquipoJugador($conexion, $id) {
	try {
		$stmt = $conexion->prepare("SELECT nombreEquipo, numeroJugadores, torneo FROM equipo WHERE idequipo = '$id';");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Obtener el id y el usuario de los jugadores del equipo del usuario registrado

function datosJugadoresEquipo($conexion, $id) {
	try {
		$stmt = $conexion->prepare("SELECT idUsuario, nickUsuario FROM usuario WHERE equipo = '$id';");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Comprobar que no existe el equipo

function comprobarEquipo($conexion, $nombreEquipo) {
	try {
		$stmt = $conexion->prepare("SELECT nombreEquipo FROM equipo WHERE nombreEquipo = '".$nombreEquipo."'");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Crear equipo

function crearEquipo($conexion, $nombreEquipo) {
	try {
		$stmt = "INSERT INTO equipo(nombreEquipo, numeroJugadores) VALUES ('$nombreEquipo', '5')";
		$conexion -> exec($stmt);
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}
function altaUsuario($conexion, $nickUsuario, $tipoUsuario, $nombreUsuario, $apellidoUsuario, $correoUsuario, $passwordUsuario, $cicloUsuario) {
	try {
		$stmt = "INSERT INTO usuario (nickUsuario, tipoUsuario, nombreUsuario, apellidosUsuario, correoUsuario, passwordUsuario, cicloFormativo, liderEquipo) VALUES ('$nickUsuario', '$tipoUsuario', '$nombreUsuario', '$apellidoUsuario', '$correoUsuario', MD5('$passwordUsuario'), '$cicloUsuario' , 'No')";
		$conexion -> exec($stmt);
	} catch (PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}

# Obtener el id del equipo creado

function obtenerIdEquipoCreado($conexion, $nombreEquipo) {
	try {
		$stmt = $conexion->prepare("SELECT idequipo FROM equipo WHERE nombreEquipo = '".$nombreEquipo."'");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Actualizar equipo del usuario y convertirlo en líder de equipo

function actualizarUsuario($conexion, $idEquipo, $idUsuario) {
	try {
		$stmt = "UPDATE usuario SET liderEquipo='Si', equipo='$idEquipo' WHERE idUsuario = '$idUsuario'";
		$conexion -> exec($stmt);
	} catch (PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Obtener el id del equipo creado

function esLiderEquipo($conexion, $idUsuario) {
	try {
		$stmt = $conexion->prepare("SELECT liderEquipo FROM usuario WHERE idUsuario = '".$idUsuario."'");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Obtener el id del torneo en el que se encuentra el equipo

function torneoActivo($conexion, $idEquipo) {
	try {
		$stmt = $conexion->prepare("SELECT torneo.estado FROM torneo, equipo WHERE equipo.torneo = torneo.idTorneo AND torneo.estado = 'Activo' and equipo.idequipo = '$idEquipo'");
		$stmt -> execute();
		$resultado = $stmt -> fetch(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


# Obtener el id del torneo en el que se encuentra el equipo

function torneoInactivo($conexion, $idEquipo) {
	try {
		$stmt = $conexion->prepare("SELECT torneo.estado FROM torneo, equipo WHERE equipo.torneo = torneo.idTorneo AND torneo.estado = 'Inactivo' and equipo.idequipo = '$idEquipo'");
		$stmt -> execute();
		$resultado = $stmt -> fetch(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: " . $e -> getMessage();
	}
}


function abandonarEquipo($conexion, $idEquipo, $idUsuario){
 try{
  $updates="UPDATE `usuario` SET equipo=NULL WHERE `equipo`='idEquipo' AND`idUsuario`='$idUsuario'";
  $conexion->exec($updates);
 }  
 catch(PDOException $e){
  echo "Error abandonarEquipo()"."<br>";
  echo $e->getMessage();
 } 
}


?>
