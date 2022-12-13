<?php

	session_start();

	if (empty($_SESSION["idUsuario"])) { // Verificamos que el usuario ha iniciado sesión
		header("Location: ../../index.php");
	} else {
		// Llamada al documento con la conexión a la base de datos
		include_once "../../Databases/Database.php";
		$conexion = conexion();

		// Llamada al documento con las consultas en la base de datos
		include_once "../../Models/Usuario_Administrador/Model_Participantes_Admin.php";
	
		// Llamada a los documentos que componen la vista
		include_once "../../Views/Header.php";
		include_once "../../Views/Menu_Administrador.php";
		include_once "../../Views/Usuario_Administrador/View_Participantes_Admin.php";
		include_once "../../Views/Footer.php";


		if(isset($_POST['SeleccionTorneo'])){
			if(!empty($_POST['torneos'])){
				$idTorneo=(int)$_POST['torneos'];
				$_SESSION['TorneoParticipante']=$idTorneo;
				header('Refresh: 0;');
			} else {
				echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Debe seleccionar un torneo', showConfirmButton: false, timer: 2000, })</script>";
			}
		}

		if(isset($_POST['Fechas'])){
			if(!empty($_POST['fecha'])){
				$idTorneo=$_SESSION['TorneoParticipante'];
				$fecha=$_POST['fecha'];
				$equiposParticipantes=obtenerEquiposParticipantes($conexion,$idTorneo,$fecha);
				$tabla=true;
				$datos=array();

				foreach ($equiposParticipantes as $indice => $valor) {
					$idEquipo1=(int)$equiposParticipantes[$indice][0];
					$idEquipo2=(int)$equiposParticipantes[$indice][1];
					$responsable=(int)$equiposParticipantes[$indice][2];
					$dato1=obtenerLiderDeEquipo($conexion,$idEquipo1);
					$dato1=$dato1[0];
					$dato2=obtenerLiderDeEquipo($conexion,$idEquipo2);
					$dato2=$dato2[0];
					$dato3=obtenerResponsable($conexion,$responsable,$idTorneo);
					$dato3=$dato3[0];

					$datos2=array();
					array_push($datos2,$dato1,$dato2,$dato3);
					array_push($datos,$datos2);
				}
				mostrarDatosDeParticipantes($conexion,$datos,$tabla);
				echo "<script>$('html,body').animate({scrollTop: document.body.scrollHeight},'fast');</script>";
			} else {
				echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Debe seleccionar una fecha', showConfirmButton: false, timer: 2000, })</script>";
			}
		}

		if(isset($_POST['participantesEquipo'])){
			$datos=obtenerInformaciónDeLosJugadores($conexion,$_POST['participantesEquipo']);
			mostrarDatosTotalesDeParticipantes($conexion,$datos);
			echo "<script>$('html,body').animate({scrollTop: document.body.scrollHeight},'fast');</script>";
		}
	}

?>
