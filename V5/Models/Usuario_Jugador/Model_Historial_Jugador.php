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


function torneosFinalizados($conexion){
	try {
		$consulta=$conexion->prepare("SELECT idTorneo,nombreTorneo FROM torneo WHERE estado='Finalizado' OR estado='Activo'");
		$consulta->execute();
		$resultado= $consulta->fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error torneosFinalizados"."<br>";
		echo $e->getMessage();
	}
}


function datosDePartidos($conexion,$torneo){
	try {
		$consulta=$conexion->prepare("SELECT juega.idEquipo1, juega.idEquipo2, juega.resultado,partido.fechaPartido,partido.fasePartido FROM juega,partido WHERE juega.partido=partido.idPartido AND partido.torneoId='$torneo'");
		$consulta->execute();
		$resultado= $consulta->fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error datosDePartidos"."<br>";
		echo $e->getMessage();
	}
}


function obtenerNombresEquipos($conexion,$idEquipo){
	try {
		$consulta=$conexion->prepare("SELECT nombreEquipo FROM equipo WHERE idequipo='$idEquipo'");
		$consulta->execute();
		$resultado= $consulta->fetch(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error obtenerNombresEquipos"."<br>";
		echo $e->getMessage();
	}
}


?>
