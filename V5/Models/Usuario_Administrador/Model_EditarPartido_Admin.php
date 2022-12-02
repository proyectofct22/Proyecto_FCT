<?php
//----------------------------------------------------------------------------------------------------------
//CONSULTAS TABLAS
//----------------------------------------------------------------------------------------------------------
function torneosActivos($conexion){
	try {
		$consulta=$conexion->prepare("SELECT idTorneo,nombreTorneo FROM torneo WHERE estado='Activo'");
		$consulta->execute();
		$resultado=$consulta->fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error torneosActivos"."<br>";
		echo $e->getMessage();
	}
}

function idJuegaidPartido($conexion,$equipo1,$equipo2,$torneo){
	try {
		$consulta=$conexion->prepare("SELECT partido.idPartido AS IDPARTIDO,juega.idJuega AS IDJUEGA from partido, juega WHERE partido.idPartido=juega.partido AND juega.idEquipo1=$equipo1 AND juega.idEquipo2=$equipo2 AND partido.torneoId=$torneo");
		$consulta->execute();
		$resultado=$consulta->fetchAll();
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error idJuegaidPartido"."<br>";
		echo $e->getMessage();
	}
}

function datosDeLosPartidosDeUnTorneo($conexion,$idTorneo,$fase){
	try {
		$consulta=$conexion->prepare("SELECT
		 partido.idPartido AS idPartido,juega.idJuega AS idJuega,partido.fasePartido AS Fase,juega.idEquipo1 AS Equipo1 ,juega.idEquipo2 AS Equipo2, partido.idEquipoGanador AS EquipoGanador,juega.resultado AS Resultado,partido.fechaPartido AS Fecha, juega.turno AS Turno,torneo.estado AS Estado, torneo.nombreTorneo AS Torneo FROM partido,torneo,juega,equipo WHERE torneo.idTorneo=partido.torneoId AND torneo.idTorneo=equipo.torneo AND partido.idPartido=juega.partido AND equipo.idequipo=juega.idEquipo1 AND torneo.idTorneo='$idTorneo' AND partido.fasePartido='$fase'");
		$consulta->execute();
		$resultado=$consulta->fetchAll();
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error datosDeLosPartidosDeUnTorneo"."<br>";
		echo $e->getMessage();
	}
}

function obtenerNombresEquipos($conexion,$idEquipo){
	try {
		$consulta=$conexion->prepare("SELECT nombreEquipo FROM equipo WHERE idequipo='$idEquipo'");
		$consulta->execute();
		$resultado=$consulta->fetch(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error obtenerNombresEquipos"."<br>";
		echo $e->getMessage();
	}
}

function ganadoresFase($conexion,$fase,$torneo){
	try {
		$consulta=$conexion->prepare("SELECT idEquipoGanador FROM partido WHERE partido.fasePartido='$fase' AND partido.torneoId='$torneo'");
		$consulta->execute();
		$resultado=$consulta->fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error ganadoresFase"."<br>";
		echo $e->getMessage();
	}
}

function ultimaIDPartido($conexion){
	try {
		$consulta=$conexion->prepare("SELECT MAX(idPartido) as num FROM partido");
		$consulta->execute();
		$resultado=$consulta->fetch(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error ultimaIDPartido"."<br>";
		echo $e->getMessage();
	}
}

function fases($conexion,$torneo){
	try {
		$consulta=$conexion->prepare("SELECT fasePartido FROM partido WHERE torneoId='$torneo' GROUP BY fasePartido");
		$consulta->execute();
		$resultado=$consulta->fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error fases"."<br>";
		echo $e->getMessage();
	}
}

function idEquiposEstadisticas($conexion,$torneo){
	try {
		$consulta=$conexion->prepare("SELECT idequipo FROM equipo WHERE equipo.torneo='$torneo'");
		$consulta->execute();
		$resultado=$consulta->fetchAll(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error idEquiposEstadisticas"."<br>";
		echo $e->getMessage();
	}
}

function partidosGanados($conexion,$torneo,$equipo){
	try {
		$consulta=$conexion->prepare("SELECT COUNT(idEquipoGanador) FROM partido,equipo WHERE partido.idEquipoGanador=equipo.idequipo AND idEquipoGanador='$equipo' AND partido.torneoId='$torneo'");
		$consulta->execute();
		$resultado=$consulta->fetch(PDO::FETCH_NUM);
		return $resultado;
	}
	catch(PDOException $e){
		echo "Error partidosGanados"."<br>";
		echo $e->getMessage();
	}	
}

function partidosPerdidos($conexion,$torneo,$equipo){
	try {
		$consulta=$conexion->prepare("SELECT COUNT(idEquipoPerdedor) FROM partido,equipo WHERE partido.idEquipoPerdedor=equipo.idequipo AND idEquipoPerdedor='$equipo' AND partido.torneoId='$torneo'");
		$consulta->execute();
		$resultado=$consulta->fetch(PDO::FETCH_NUM);
		return $resultado;
	}
	catch(PDOException $e){
		echo "Error partidosPerdidos"."<br>";
		echo $e->getMessage();
	}	
}

function ganadorTorneo($conexion,$torneo,$equipo){
	try {
		$consulta=$conexion->prepare("SELECT COUNT(idEquipoGanador) FROM partido,equipo WHERE partido.idEquipoGanador=equipo.idequipo AND idEquipoGanador='$equipo' AND partido.torneoId='$torneo' AND partido.fasePartido='Final'");
		$consulta->execute();
		$resultado=$consulta->fetch(PDO::FETCH_NUM);
		return $resultado;
	}
	catch(PDOException $e){
		echo "Error ganadorTorneo"."<br>";
		echo $e->getMessage();
	}	
}

//----------------------------------------------------------------------------------------------------------
//INSERTAR DATOS EN TABLAS
//----------------------------------------------------------------------------------------------------------
function insertarPartidoSiguienteRonda($conexion,$fase2,$torneo,$responsable){
	try{
		$insert="INSERT INTO partido VALUES (NULL, NULL, NULL, NULL, '$fase2','Activo','$responsable', '$torneo')";
		$conexion->exec($insert);
	}
	catch(PDOException $e){
			echo "Error insertarPartidoSiguienteRonda"."<br>";
			echo $e->getMessage();
	}
}

function insertarSiguienteRondaJuega($conexion,$maxIdPartido,$equipo1,$equipo2){
	try{
		$insert="INSERT INTO juega VALUES (NULL,'0-0',NULL,'$maxIdPartido','$equipo1','$equipo2')";
		$conexion->exec($insert);
	}
	catch(PDOException $e){
			echo "Error insertarSiguienteRondaJuega"."<br>";
			echo $e->getMessage();
	}
}

function insertarEstadisticasEquipos($conexion,$equipo){
	try{
		$insert="INSERT INTO estadistica VALUES (NULL,NULL,NULL,NULL,NULL,NULL,'$equipo')";
		$conexion->exec($insert);
	}
	catch(PDOException $e){
			echo "Error insertarEstadisticas"."<br>";
			echo $e->getMessage();
	}
}


//----------------------------------------------------------------------------------------------------------
//VALIDACIONES
//----------------------------------------------------------------------------------------------------------
function comprobarFase($conexion,$fase,$torneo){
	try {
		$consulta=$conexion->prepare("SELECT COUNT(idPartido), COUNT(idEquipoGanador),partido.estadoPartido FROM partido WHERE partido.fasePartido='$fase' AND partido.torneoId='$torneo' AND partido.estadoPartido='Activo'");
		$consulta->execute();
		$resultado= $consulta->fetch(PDO::FETCH_NUM);
		return $resultado;	
	}
	catch(PDOException $e){
		echo "Error comprobarFase"."<br>";
		echo $e->getMessage();
	}
}

function comprobarFaseParaFinalizarTorneo($conexion,$fase,$torneo){
    try {
        $consulta=$conexion->prepare("SELECT idEquipoGanador FROM partido WHERE partido.fasePartido='$fase' AND partido.torneoId='$torneo' AND partido.estadoPartido='Finalizado'");
        $consulta->execute();
        $resultado= $consulta->fetch(PDO::FETCH_NUM);
        return $resultado;    
    }
    catch(PDOException $e){
        echo "Error comprobarFaseParaFinalizarTorneo"."<br>";
        echo $e->getMessage();
    }
}

//----------------------------------------------------------------------------------------------------------
//ACTUALIZAR TABLAS
//----------------------------------------------------------------------------------------------------------
function actualizarTablaPartido($conexion,$idPartido,$fecha,$equipoGanador,$equipoPerdedor,$responsable){
	try{
		$updates="UPDATE partido SET fechaPartido='$fecha',idEquipoGanador='$equipoGanador',
		idEquipoPerdedor='$equipoPerdedor', responsableId='$responsable' WHERE idPartido='$idPartido'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
		echo "Error actualizarTablaPartido()"."<br>";
		echo $e->getMessage();
	}	
}

function actualizarTablaJuega($conexion,$idPartido,$resultado,$turno){
	try{
		$updates= "UPDATE juega SET resultado='$resultado', turno='$turno' WHERE partido='$idPartido'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
		echo "Error actualizarTablaJuega()"."<br>";
		echo $e->getMessage();
	}	
}

function actualizarTablaTorneo($conexion,$ganador,$torneo){
	try{
		$updates="UPDATE torneo 
		SET torneo.idEquipoGanador='$ganador' WHERE torneo.idTorneo='$torneo'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
		echo "Error actualizarTablaTorneo()"."<br>";
		echo $e->getMessage();
	}	
}

function finalizarRonda($conexion,$fase,$torneo){
	try{
		$updates="UPDATE partido SET estadoPartido = 'Finalizado' WHERE partido.torneoId = '$torneo' AND partido.fasePartido='$fase'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
		echo "Error finalizarRonda()"."<br>";
		echo $e->getMessage();
	}	
}


function actualizarPartidosGanados($conexion,$partidosGanados,$equipo){
	try{
		$updates="UPDATE estadistica SET partidosGanados = partidosGanados+'$partidosGanados' WHERE estadistica.equipoId='$equipo'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
		echo "Error actualizarPartidosGanados()"."<br>";
		echo $e->getMessage();
	}	
}

function actualizarPartidosPerdidos($conexion,$partidosPerdidos,$equipo){
	try{
		$updates="UPDATE estadistica SET partidosPerdidos = partidosPerdidos+'$partidosPerdidos' WHERE estadistica.equipoId='$equipo'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
		echo "Error actualizarPartidosPerdidos()"."<br>";
		echo $e->getMessage();
	}	
}

function actualizarPartidosJugados($conexion,$partidosJugados,$equipo){
	try{
		$updates="UPDATE estadistica SET partidosJugados = partidosJugados+'$partidosJugados' WHERE estadistica.equipoId='$equipo'";
		$conexion->exec($updates);
	}			
	catch(PDOException $e){
		echo "Error actualizarPartidosJugados()"."<br>";
		echo $e->getMessage();
	}	
}

function actualizarGanadorTorneo($conexion,$ganadorTorneo,$equipo){
	try{
		$updates="UPDATE estadistica,partido SET torneosGanados = torneosGanados+'$ganadorTorneo' WHERE estadistica.equipoId='$equipo' AND partido.fasePartido='Final'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
		echo "Error actualizarGanadorTorneo()"."<br>";
		echo $e->getMessage();
	}	
}
function actualizarTorneoJugados($conexion,$torneoJugado,$equipo){
	try{
		$updates="UPDATE estadistica SET torneosJugados = torneosJugados+'$torneoJugado' WHERE estadistica.equipoId='$equipo'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
		echo "Error actualizarTorneoJugados()"."<br>";
		echo $e->getMessage();
	}	
}

function finalizarTorneo($conexion,$torneo,$fecha){
	try{
		$updates= "UPDATE torneo SET estado='Finalizado',fechaFin='$fecha' WHERE idTorneo='$torneo'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
		echo "Error finalizarTorneo()"."<br>";
		echo $e->getMessage();
	}		
}

function liberarEquiposDelTorneo($conexion,$torneo){
	try{
		$updates="UPDATE equipo SET equipo.torneo=NULL WHERE equipo.torneo='$torneo'";
		$conexion->exec($updates);
	}		
	catch(PDOException $e){
		echo "Error liberarEquiposDelTorneo()"."<br>";
		echo $e->getMessage();
	}	
}

?>


