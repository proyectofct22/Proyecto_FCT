<?php
session_start();

if (empty($_SESSION["idUsuario"])) 
{ // Verificamos que el usuario ha iniciado sesión
	header("Location: ../../index.php");
}
else
{
		// Llamada al documento con la conexión a la base de datos
	include_once "../../Databases/Database.php";
	$conexion = conexion();

		// Llamada al documento con las consultas en la base de datos
	include_once "../../Models/Usuario_Administrador/Model_CrearTorneo_Admin.php";

		// Llamada a los documentos que componen la vista
	include_once "../../Views/Header.php";
	include_once "../../Views/Menu_Registrado_Admin.php";
	include_once "../../Views/Usuario_Administrador/View_CrearTorneo_Admin.php";
	include_once "../../Views/Footer.php";

	if(isset($_POST['CrearTorneo'])){
		if(!empty($_POST['NombreTorneo']) && !empty($_POST['juegos'])){

			$nombreTorneo=$_POST['NombreTorneo'];
			$juego=$_POST['juegos'];
			$validar=comprobarTorneo($conexion,$nombreTorneo,$juego);

			// var_dump($validar);
			if($validar==FALSE){

				$maxTorneos=validarMaxTorneo($conexion);
				$maxTorneos=(int)$maxTorneos[0];

				if($maxTorneos<2){

					$Fecha=date('Y-m-d h:i:s');
					$maxIdTorneo=maxidTorneo($conexion);
					$maxIdTorneo=((int)$maxIdTorneo[0])+1;
					insertarTorneo($conexion,$maxIdTorneo,$nombreTorneo,$juego,$Fecha);
					header("Refresh:0");

				}
				else{
			echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'El máximo de torneos ya se ha alcanzado', showConfirmButton: false, })</script>";
				}
			}
			else{
				echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'El torneo introducido ya existe', showConfirmButton: false, })</script>";
			}
		}
		else{
			echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Rellena el nombre del torneo', showConfirmButton: false, })</script>";
		}
	}

	if(isset($_POST['IniciarTorneo'])){
		if(!empty($_POST['torneos'])){
			$torneo=$_POST['torneos'];
			$torneo=(int)$torneo;
			$Fecha=date('Y-m-d h:i:s');
			iniciarTorneo($conexion,$torneo,$Fecha);	
			// header("Refresh:0");
		}
	}

	if(isset($_POST['VerEquipos'])&&isset($_POST['equipos'])){
		$torneo=$_POST['equipos'];
		$equiposDatos=datosEquipos($conexion,$torneo);
		mostrarDatos($conexion,$equiposDatos);
		// header("Refresh:0");
	}	
// var_dump($_POST);
	if(isset($_POST['MostrarDatos'])){
		$torneoDatos=datosTorneo($conexion);
		mostrarDatos2($conexion,$torneoDatos);
		// header("Refresh:0");
	}	

	if(isset($_POST['botonBorrado'])){
		if(!empty($_POST['botonBorrado'])){
			$equipo=$_POST['botonBorrado'];
			eliminarEquipoTorneo($conexion,$equipo);
			header("Refresh:0");
		}
	}


	if(isset($_POST['FinalizarTorneo'])){
		if(!empty($_POST['torneoFinalizado'])){
			// var_dump('caca');
			// var_dump($_POST);
			$torneo=$_POST['torneoFinalizado'];
			$Fecha=date('Y-m-d h:i:s');
			liberarEquipos($conexion,$torneo);
			finalizarTorneo($conexion,$torneo,$Fecha);
			echo "<script>Swal.fire({ icon: 'success', title: '¡Enhorabuena!', text: 'El torneo se finalizó correctamente', showConfirmButton: false, })</script>";
		}
	}

}

function iniciarTorneo($conexion,$torneo,$Fecha){
	$validar=maxEquiposEnTorneo($conexion,$torneo);
	$validar=(int)$validar[0];
	
	if($validar==8){
		actualizarDatosTorneo($conexion,$torneo,$Fecha);
		$equipos=obtenerEquipos($conexion,$torneo);

		$equipos=limpiezaDatos($equipos);

		$encuentros=encuentros($equipos);

		foreach ($encuentros as $indice => $dato) {
			$equipo1=$encuentros[$indice][0];
			$equipo2=$encuentros[$indice][1];

			insertarDatosPartido($conexion,$torneo);

			$maxIdPartido=maxIDpartido($conexion);
			$maxIdPartido=(int)$maxIdPartido[0];

			insertarPartidasJuega($conexion,$maxIdPartido,$equipo1,$equipo2);
		}

		$equipos=idEquiposEstadisticas($conexion,$torneo);

		// $equipos=idEquiposEstadisticas($conexion,$torneo);

		foreach($equipos AS $indice => $datos){
			$equipo=$equipos[$indice][0];
			$valido=comprobarEquipoEstadistica($conexion,$equipo);
		
			if($valido==FALSE){
				insertarEstadisticasEquipos($conexion,$equipo);
			}
	
		}
			echo "<script>Swal.fire({ icon: 'success', title: '¡Enhorabuena!', text: 'El torneo se inició correctamente', showConfirmButton: false, })</script>";
	}
	else{
			echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Para iniciar el torneo debe añadir 8 equipos al mismo', showConfirmButton: false, })</script>";
	}
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

function encuentros($equipos){
	$encuentros=array();
	foreach ($equipos as $indice => $valor) {
		if($indice<4){
			$aleatorio = array_rand($equipos, 2);
			// var_dump($aleatorio);
			array_push($encuentros, array($equipos[$aleatorio[0]],$equipos[$aleatorio[1]]));
			unset($equipos[$aleatorio[0]]);
			unset($equipos[$aleatorio[1]]);
		}
	}
	return $encuentros;
	//sizeof + modulo
	// var_dump($aleatorio);
	// var_dump($encuentros);
}
?>