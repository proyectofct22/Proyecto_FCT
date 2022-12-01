<?php


# Obtener equipo del usuario

function obtenerEquipo($conexion, $idUsuario) {
	try {
		$stmt = $conexion->prepare("SELECT equipo FROM usuario WHERE idUsuario = '$idUsuario'");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: obtenerEquipo " . $e -> getMessage();
	}
}


# Obtener todos los jugadores libres de equipo

function desplegableJugadoresLibres($conexion) {
	try {
		$stmt = $conexion->prepare("SELECT idUsuario, nickUsuario FROM usuario WHERE tipoUsuario = 'jugador' AND equipo IS NULL");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: desplegableJugadoresLibres" . $e -> getMessage();
	}
}


# Comprobar que es posible agregar jugadores al equipo

function comprobarTotalJugadoresEquipo($conexion, $equipo) {
	try {
		$stmt = $conexion->prepare("SELECT COUNT(idUsuario) FROM usuario, equipo WHERE usuario.equipo = equipo.idequipo AND equipo.idequipo = '$equipo'");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: comprobarTotalJugadoresEquipo" . $e -> getMessage();
	}
}


# Agregar usuario al equipo seleccionado

function agregarJugador($conexion, $equipo, $usuario) {
	try {
		$stmt = $conexion->prepare("UPDATE usuario SET equipo = '$equipo' WHERE idUsuario = '$usuario'");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: agregarJugador " . $e -> getMessage();
	}
}


# Obtener todos los jugadores del equipo

function desplegableJugadoresEquipo($conexion, $equipo) {
	try {
		$stmt = $conexion->prepare("SELECT idUsuario, nickUsuario FROM usuario WHERE liderEquipo = 'No' AND equipo = '$equipo'");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: desplegableJugadoresEquipo" . $e -> getMessage();
	}
}


# Obtener el usuario del jugador

function usuarioJugador($conexion, $jugador) {
	try {
		$stmt = $conexion->prepare("SELECT nickUsuario FROM usuario WHERE idUsuario = '$jugador'");
		$stmt -> execute();
		$resultado = $stmt -> fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	} catch(PDOException $e) {
		echo "Error: usuarioJugador " . $e -> getMessage();
	}
}


# Desasignar un jugador del equipo
function desasignarJugador($conexion, $jugador){
	try{
		$updates= "UPDATE usuario SET equipo=NULL WHERE nickUsuario='$jugador'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
		echo "Error desasignarJugador()"."<br>";
		echo $e->getMessage();
	}	
}


# Obtener torneo aun no empezado 

function torneosInactivos($conexion){
	try {
		$consulta=$conexion->prepare("SELECT idTorneo,nombreTorneo FROM torneo WHERE estado='Inactivo'");
		$consulta->execute();
		$resultado= $consulta->fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error torneosInactivos"."<br>";
		echo $e->getMessage();
	}
}


function asignarEquipoAlTorneo($conexion,$torneo,$equipo){
	try{
		$updates= "UPDATE equipo SET torneo='$torneo' WHERE idequipo='$equipo'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
		echo "Error asignarEquipoAlTorneo()"."<br>";
		echo $e->getMessage();
	}	
}


function abandonarTorneo($conexion,$equipo){
	try{
		$updates= "UPDATE equipo SET torneo=NULL WHERE idequipo='$equipo'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
		echo "Error abandonarTorneo()"."<br>";
		echo $e->getMessage();
	}	
}


function equipoAsignadoATorneo($conexion,$equipo){
	try {
		$consulta=$conexion->prepare("SELECT torneo FROM equipo WHERE idequipo='$equipo'");
		$consulta->execute();
		$resultado= $consulta->fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error torneosInactivos"."<br>";
		echo $e->getMessage();
	}	
}


function eliminarTuEquipo($conexion,$equipo){
	try{
		$updates= "UPDATE equipo SET torneo=NULL WHERE idequipo='$equipo'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
		echo "Error abandonarTorneo()"."<br>";
		echo $e->getMessage();
	}		
}


function maxEquiposEnTorneo($conexion,$torneo){
	try {
		$consulta=$conexion->prepare("SELECT COUNT(idequipo) as 'Numeros de Equipos' FROM equipo,torneo WHERE equipo.torneo=torneo.idTorneo AND torneo.idTorneo='$torneo'");
		$consulta->execute();
		$resultado= $consulta->fetch(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error maxEquiposEnTorneo"."<br>";
		echo $e->getMessage();
	}
}


function eliminarJugadoresDelEquipo($conexion,$equipo){
try{
		$updates= "UPDATE usuario SET equipo=NULL WHERE equipo='$equipo'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
		echo "Error eliminarJugadoresDelEquipo()"."<br>";
		echo $e->getMessage();
	}	
}


function eliminarLider($conexion,$idUsuario){
try{
		$updates= "UPDATE usuario SET liderEquipo='No' WHERE idUsuario='$idUsuario'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
		echo "Error eliminarLider()"."<br>";
		echo $e->getMessage();
	}	
}


?>
