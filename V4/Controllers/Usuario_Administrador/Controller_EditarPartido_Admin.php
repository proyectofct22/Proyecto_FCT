<?php
session_start();

if (empty($_SESSION["idUsuario"])) { // Verificamos que el usuario ha iniciado sesión
	header("Location: ../../index.php");
}
else{
		// Llamada al documento con la conexión a la base de datos
	include_once "../../Databases/Database.php";
	$conexion = conexion();

		// Llamada al documento con las consultas en la base de datos
	include_once "../../Models/Usuario_Administrador/Model_EditarPartido_Admin.php";

		// Llamada a los documentos que componen la vista
	include_once "../../Views/Header.php";
	include_once "../../Views/Menu_Registrado_Admin.php";
	include_once "../../Views/Usuario_Administrador/View_EditarPartido_Admin.php";
	include_once "../../Views/Footer.php";


	if(isset($_POST['MostrarPartidos'])){
		if(!empty($_POST['torneos']) && !empty($_POST['fase'])){
			$torneo=(int)$_POST['torneos'];
			$_SESSION['torneos']=$torneo;
			$fase=$_POST['fase'];
			$_SESSION['fase']=$fase;
			$tabla=true;
			$torneoDatos=datosTorneo($conexion,$torneo,$fase);
			mostrarDatos($conexion,$torneoDatos,$tabla);
		}
	}


	if(isset($_POST['botonEditar'])){
		$torneo=$_SESSION['torneos'];
		$fase=$_SESSION['fase'];
		$tabla2=true;
		$datosFase=comprobarFase($conexion,$fase,$torneo);
		$estado=$datosFase[2];

		if($estado!=NULL){
			$torneoDatos=datosTorneo($conexion,$torneo,$fase);
			mostrarDatos2($conexion,$torneoDatos,$tabla2);
		}
		else if($estado==NULL){
			$torneoDatos=datosTorneo($conexion,$torneo,$fase);
			mostrarDatos3($conexion,$torneoDatos,$tabla2);
		}
	}


	if(isset($_POST['confirmar'])){
		if(!empty($_POST['ganador1']) && !empty($_POST['ganador2']) && !empty($_POST['ganador3']) && !empty($_POST['ganador4']) && !empty($_POST['resultado1']) && !empty($_POST['resultado2']) && !empty($_POST['resultado3']) && !empty($_POST['resultado4']) && !empty($_POST['fechaPartido1']) && !empty($_POST['fechaPartido2']) && !empty($_POST['fechaPartido3']) && !empty($_POST['fechaPartido4']) && !empty($_POST['Turno1']) && !empty($_POST['Turno2']) && !empty($_POST['Turno3']) && !empty($_POST['Turno4'])){

			$torneo=$_SESSION['torneos'];
			$fase=$_SESSION['fase'];
			$torneoDatos=datosTorneo($conexion,$torneo,$fase);


			$partidos=array();
			foreach($torneoDatos as $datos2){
				$equipo1=$datos2['Equipo1'];
				$equipo2=$datos2['Equipo2'];
				$partido=array($equipo1,$equipo2);
				array_push($partidos,$partido);
			}

			$ganador1=$_POST['ganador1'];
			$ganador2=$_POST['ganador2'];
			$ganador3=$_POST['ganador3'];
			$ganador4=$_POST['ganador4'];

			$equiposGanadores=array();
			array_push($equiposGanadores,$ganador1,$ganador2,$ganador3,$ganador4);

			$equiposPerdedores=perdedores($conexion,$equiposGanadores,$partidos,$torneo);


			$datos1=array();
			array_push($datos1,$_POST['ganador1'],$_POST['resultado1'],$_POST['fechaPartido1'],$_POST['Turno1']);


			$datos2=array();
			array_push($datos2,$_POST['ganador2'],$_POST['resultado2'],$_POST['fechaPartido2'],$_POST['Turno2']);


			$datos3=array();
			array_push($datos3,$_POST['ganador3'],$_POST['resultado3'],$_POST['fechaPartido3'],$_POST['Turno3']);


			$datos4=array();
			array_push($datos4,$_POST['ganador4'],$_POST['resultado4'],$_POST['fechaPartido4'],$_POST['Turno4']);


			$datos=array();
			array_push($datos,$datos1,$datos2,$datos3,$datos4);

			foreach($datos as $indice => $dato){
				$torneo=$_SESSION['torneos'];
				$equipoGanador=$dato[0];
				$equipoPerdedor=$equiposPerdedores[$indice][2];
				$resultado=$dato[1];
				$fecha=$dato[2];
				$turno=$dato[3];
				$idPartido=$equiposPerdedores[$indice][0];
				$idJuega=$equiposPerdedores[$indice][1];

				actualizarTablaPartido($conexion,$idPartido,$fecha,$equipoGanador,$equipoPerdedor);
				actualizarTablaJuega($conexion,$idPartido,$resultado,$turno);
				actualizarTablaEquipo($conexion,$equipoPerdedor);

			}
			// header("Refresh:0");
		}
		else if(!empty($_POST['ganador1']) && !empty($_POST['ganador2']) && !empty($_POST['resultado1']) && !empty($_POST['resultado2']) && !empty($_POST['fechaPartido1']) && !empty($_POST['fechaPartido2']) && !empty($_POST['Turno1']) && !empty($_POST['Turno2']) && $_SESSION['fase']=='Semifinales'){

			$torneo=$_SESSION['torneos'];
			$fase=$_SESSION['fase'];
			$torneoDatos=datosTorneo($conexion,$torneo,$fase);


			$partidos=array();
			foreach($torneoDatos as $datos2){
				$equipo1=$datos2['Equipo1'];
				$equipo2=$datos2['Equipo2'];
				$partido=array($equipo1,$equipo2);
				array_push($partidos,$partido);
			}

			$ganador1=$_POST['ganador1'];
			$ganador2=$_POST['ganador2'];

			$equiposGanadores=array();
			array_push($equiposGanadores,$ganador1,$ganador2);

			$equiposPerdedores=perdedores($conexion,$equiposGanadores,$partidos,$torneo);


			$datos1=array();
			array_push($datos1,$_POST['ganador1'],$_POST['resultado1'],$_POST['fechaPartido1'],$_POST['Turno1']);


			$datos2=array();
			array_push($datos2,$_POST['ganador2'],$_POST['resultado2'],$_POST['fechaPartido2'],$_POST['Turno2']);


			$datos=array();
			array_push($datos,$datos1,$datos2);

			foreach($datos as $indice => $dato){
				$torneo=$_SESSION['torneos'];
				$equipoGanador=$dato[0];
				$equipoPerdedor=$equiposPerdedores[$indice][2];
				$resultado=$dato[1];
				$fecha=$dato[2];
				$turno=$dato[3];
				$idPartido=$equiposPerdedores[$indice][0];
				$idJuega=$equiposPerdedores[$indice][1];

				actualizarTablaPartido($conexion,$idPartido,$fecha,$equipoGanador,$equipoPerdedor);
				actualizarTablaJuega($conexion,$idPartido,$resultado,$turno);
				actualizarTablaEquipo($conexion,$equipoPerdedor);
			}
		}
		else if(!empty($_POST['ganador1'])  && !empty($_POST['resultado1']) && !empty($_POST['fechaPartido1']) && !empty($_POST['Turno1']) && $_SESSION['fase']=='Final'){

			$torneo=$_SESSION['torneos'];
			$fase=$_SESSION['fase'];
			$torneoDatos=datosTorneo($conexion,$torneo,$fase);

			$partidos=array();

			$equipo1=$torneoDatos[0]['Equipo1'];
			$equipo2=$torneoDatos[0]['Equipo2'];
			$partido=array($equipo1,$equipo2);
			array_push($partidos,$partido);

			$ganador=$_POST['ganador1'];

			if($equipo1==$ganador){
				$equipoPerdedor=$equipo2;
			}
			else if($equipo2==$ganador){
				$equipoPerdedor=$equipo1;
			}

			$datos=array();
			array_push($datos,$_POST['ganador1'],$_POST['resultado1'],$_POST['fechaPartido1'],$_POST['Turno1']);

			foreach($datos as $indice => $dato){
				$torneo=$_SESSION['torneos'];
				$equipoGanador=$datos[0];
				$resultado=$datos[1];
				$fecha=$datos[2];
				$turno=$datos[3];
				$idPartido=$torneoDatos[0]['idPartido'];
				$idJuega=$equipoPerdedor;

				actualizarTablaPartido($conexion,$idPartido,$fecha,$equipoGanador,$equipoPerdedor);
				actualizarTablaJuega($conexion,$idPartido,$resultado,$turno);
				actualizarTablaEquipo($conexion,$equipoPerdedor);
			}

		}
		else{
			echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Rellene todos los campos de la tabla para continuar', showConfirmButton: false, })</script>";
			$torneo=$_SESSION['torneos'];
			$fase=$_SESSION['fase'];
			$tabla2=true;
			$torneoDatos=datosTorneo($conexion,$torneo,$fase);
			mostrarDatos2($conexion,$torneoDatos,$tabla2);
		}
	}


	if(isset($_POST['SiguienteRonda'])){
		if(!empty($_POST['torneos']) && !empty($_POST['fase'])){
			$fase=$_POST['fase'];
			$torneo=$_POST['torneos'];

			if($fase=="Cuartos"){
				$fase2="Semifinales";
				$datosFase=comprobarFase($conexion,$fase,$torneo);
				if($datosFase[0]==$datosFase[1] && $datosFase[2]=='Activo'){
			echo "<script>Swal.fire({ icon: 'success', title: '¡Enhorabuena!', text: 'Iniciando las semifinales', showConfirmButton: false, })</script>";

					asignarSiguientesPartidos($conexion,$fase,$fase2,$torneo);

				}
				else if($datosFase[0]==$datosFase[1] && $datosFase[2]==NULL){
			echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Los cuartos ya se finalizaron', showConfirmButton: false, })</script>";
				}
				else{
			echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Los cuartos no se han disputado aún', showConfirmButton: false, })</script>";
				}
			}
			else if($fase=="Semifinales"){
				$fase2="Final";
				$datosFase=comprobarFase($conexion,$fase,$torneo);
				if($datosFase[0]==$datosFase[1] && $datosFase[2]=='Activo'){
			echo "<script>Swal.fire({ icon: 'success', title: '¡Enhorabuena!', text: 'Iniciando la final', showConfirmButton: false, })</script>";
					
					asignarSiguientesPartidos($conexion,$fase,$fase2,$torneo);

				}
				else if($datosFase[0]==$datosFase[1] && $datosFase[2]==NULL){
			echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Las semifinales ya se finalizaron', showConfirmButton: false, })</script>";
				}
				else{
			echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Las semifinales no se han disputado aún', showConfirmButton: false, })</script>";
				}
			}
			else if($fase=="Final"){
				$datosFase=comprobarFase($conexion,$fase,$torneo);
				if($datosFase[0]==$datosFase[1] && $datosFase[2]=='Activo'){
			echo "<script>Swal.fire({ icon: 'success', title: '¡Enhorabuena!', text: 'La final se ha finalizado', showConfirmButton: false, })</script>";
					$ganador=ganadoresFase($conexion,$fase,$torneo);
					$ganador=$ganador[0][0];
					
					finalizarRonda($conexion,$fase,$torneo);
					actualizarTablaTorneo($conexion,$ganador,$torneo);
					insertarEstadiscas($conexion,$torneo,$ganador);
					


			echo "<script>Swal.fire({ icon: 'info', title: 'Espere', text: 'Actualizando las estadísticas de los equipos participantes', showConfirmButton: false, })</script>";

				}
				else if($datosFase[0]==$datosFase[1] && $datosFase[2]==NULL){
			echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'La final ya se ha disputado', showConfirmButton: false, })</script>";
				}
				else{
			echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'La final no se ha disputado aún', showConfirmButton: false, })</script>";
					// echo "<script>alert('El partido de la Final no ha Finalizado');</script>";
				}
			}
		// header("Refresh:0");
		}
	}
}

function asignarSiguientesPartidos($conexion,$fase,$fase2,$torneo){
	$ganadores=ganadoresFase($conexion,$fase,$torneo);
	$ganadores=limpiezaDatos($ganadores);
	$encuentrosSiguienteRonda=encuentros($ganadores);

	foreach ($encuentrosSiguienteRonda as $indice => $dato) {
		$equipo1=$encuentrosSiguienteRonda[$indice][0];
		$equipo2=$encuentrosSiguienteRonda[$indice][1];

		insertarPartidoSiguienteRonda($conexion,$fase2,$torneo);

		$maxIdPartido=maxIDpartido($conexion);
		$maxIdPartido=(int)$maxIdPartido[0];

		insertarSiguienteRondaJuega($conexion,$maxIdPartido,$equipo1,$equipo2);

		finalizarRonda($conexion,$fase,$torneo);

	}
}

function insertarEstadiscas($conexion,$torneo,$ganador){
	// $a=datosTorneo($conexion,$torneo);
	$idEquipos=idEquiposEstadisticas($conexion,$torneo);
	$equipos=array();
	foreach ($idEquipos as $indice => $valor) {
		array_push($equipos,$idEquipos[$indice][0]);
		
	}

	foreach ($equipos as $indice => $valor) {
		$equipo=$equipos[$indice];
		$torneoJugado=1;
		actualizarTorneoJugados($conexion,$torneoJugado,$equipo);

		$partidosGanados=partidosGanados($conexion,$torneo,$equipo);
		$partidosGanados=(int)$partidosGanados[0];
		if($partidosGanados!=0){
			actualizarPartidosGanados($conexion,$partidosGanados,$equipo);
		}
		$partidosPerdidos=partidosPerdidos($conexion,$torneo,$equipo);
		$partidosPerdidos=(int)$partidosPerdidos[0];
		if($partidosPerdidos!=0){
			actualizarPartidosPerdidos($conexion,$partidosPerdidos,$equipo);
		}
		
		$partidosJugados=$partidosGanados+$partidosPerdidos;
		if($partidosJugados!=0){
			actualizarPartidosJugados($conexion,$partidosJugados,$equipo);

		}
		$ganadorTorneo=ganadorTorneo($conexion,$torneo,$equipo);
		$ganadorTorneo=(int)$ganadorTorneo[0];
		if($ganadorTorneo!=0){
			actualizarGanadorTorneo($conexion,$ganadorTorneo,$equipo);
		}
	}	
}

function encuentros($equipos){
	$encuentros=array();
	foreach ($equipos as $indice => $valor) {
		if($indice<sizeof($equipos)){
			$aleatorio = array_rand($equipos, 2);
			array_push($encuentros, array($equipos[$aleatorio[0]],$equipos[$aleatorio[1]]));
			unset($equipos[$aleatorio[0]]);
			unset($equipos[$aleatorio[1]]);
		}
	}
	return $encuentros;
}

function limpiezaDatos($equipos){
	$datosLimpios=array();
	foreach($equipos as $indice => $dato){
		foreach ($dato as $indice2 => $dato2) {
			array_push($datosLimpios, (int)$dato2);
		}
	}
	return $datosLimpios;
}

function perdedores($conexion,$equiposGanadores,$partidos,$torneo){
	$equiposPerdedores=array();

	foreach($partidos as $indice => $partido){
		$equipo1=$partido[0];
		$equipo2=$partido[1];

		$idJuegaidPartido=idJuegaidPartido($conexion,$equipo1,$equipo2,$torneo);

		$idPartido=$idJuegaidPartido[0]['IDPARTIDO'];
		$idJuega=$idJuegaidPartido[0]['IDJUEGA'];

		if($equiposGanadores[$indice]==$equipo1){
			$equipoPerdedor=$equipo2;
			array_push($equiposPerdedores,array($idPartido,$idJuega,$equipoPerdedor));
		}
		if($equiposGanadores[$indice]==$equipo2){
			$equipoPerdedor=$equipo1;
			array_push($equiposPerdedores,array($idPartido,$idJuega,$equipoPerdedor));
		}
	}
	return $equiposPerdedores;
}

?>