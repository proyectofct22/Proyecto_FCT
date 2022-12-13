<?php

	session_start();

	if (empty($_SESSION["idUsuario"])) 
	{ // Verificamos que el usuario ha iniciado sesión
		header("Location: ../../index.php");
	} else {
		// Llamada al documento con la conexión a la base de datos
		include_once "../../Databases/Database.php";
		$conexion = conexion();

		// Llamada al documento con las consultas en la base de datos
		include_once "../../Models/Usuario_Administrador/Model_CrearTorneo_Admin.php";

		// Llamada a los documentos que componen la vista
		include_once "../../Views/Header.php";
		include_once "../../Views/Menu_Administrador.php";
		include_once "../../Views/Usuario_Administrador/View_CrearTorneo_Admin.php";
		include_once "../../Views/Footer.php";

		if(isset($_POST['CrearTorneo'])){
			if(!empty($_POST['NombreTorneo'])) {
				if(!empty($_POST['juegos'])) { 
					$nombreTorneo=$_POST['NombreTorneo'];
					$juego=$_POST['juegos'];
					$validar=comprobarSiExisteTorneoConMismoNombre($conexion,$nombreTorneo);
					if($validar==FALSE){
						$maxTorneos=maxTorneosCreados($conexion);
						$maxTorneos=(int)$maxTorneos[0];
						if($maxTorneos<1){
							$Fecha=date('Y-m-d h:i:s');
							$maxIdTorneo=ultimaIdTorneo($conexion);
							$maxIdTorneo=((int)$maxIdTorneo[0])+1;
							insertarTorneo($conexion,$maxIdTorneo,$nombreTorneo,$juego,$Fecha);
							echo "<script>Swal.fire({ icon: 'success', title: '¡Enhorabuena!', text: 'Has creado un nuevo torneo', showConfirmButton: false, timer: 2000, })</script>";
							header("Refresh:2");
						} else {
							echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'El máximo de torneos ya se ha alcanzado', showConfirmButton: false, timer: 2000, })</script>";
						}
					} else {
						echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'El torneo introducido ya existe', showConfirmButton: false, timer: 2000,  })</script>";
					}
				} else {
					echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Selecciona un juego para el torneo', showConfirmButton: false, timer: 2000,  })</script>";
				}
			} else {
				echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Rellena el nombre del torneo', showConfirmButton: false, timer: 2000, })</script>";
			}
		}

		if(isset($_POST['IniciarTorneo'])){
			if(!empty($_POST['torneos'])){
				$torneo=$_POST['torneos'];
				$torneo=(int)$torneo;
				$Fecha=date('Y-m-d h:i:s');
				iniciarTorneo($conexion,$torneo,$Fecha);
			} else {
				echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Debe seleccionar un torneo', showConfirmButton: false, timer: 2000, })</script>";
			}
		}

		if (isset($_POST['VerEquipos'])) {
			if(isset($_POST['equipos'])){
				$torneo=$_POST['equipos'];
				$equiposDatos=datosDeEquiposEnUnTorneo($conexion,$torneo);
				mostrarEquiposDelTorneo($conexion,$equiposDatos);
				echo "<script>$('html,body').animate({scrollTop: document.body.scrollHeight},'fast');</script>";
			}  else {
				echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Debe seleccionar un torneo', showConfirmButton: false, timer: 2000, })</script>";
			}
		}

		if(isset($_POST['MostrarTorneos'])){
			$torneoDatos=datosDeTorneos($conexion);
			mostrarDatosDeTodosLosTorneos($conexion,$torneoDatos);
			echo "<script>$('html,body').animate({scrollTop: document.body.scrollHeight},'fast');</script>";
		}	

		if(isset($_POST['botonBorrado'])){
			if(!empty($_POST['botonBorrado'])){
				$equipo=$_POST['botonBorrado'];
				eliminarEquipoTorneo($conexion,$equipo);
				echo "<script>Swal.fire({ icon: 'success', title: '¡Enhorabuena!', text: 'Equipo eliminado del torneo', showConfirmButton: false, timer: 2000, })</script>";
			}
		}
	}

	function iniciarTorneo($conexion,$torneo,$Fecha){
		$validar=maxEquiposParticipantesEnUnTorneo($conexion,$torneo);
		$validar=(int)$validar[0];
		$responsable=$_SESSION['idUsuario'];
		$responsable=(int)$responsable;
		if($validar==8){
			actualizarNuevoTorneo($conexion,$torneo,$Fecha);
			$equipos=obtenerEquiposDelTorneo($conexion,$torneo);

			$equipos=limpiezaDatos($equipos);

			$encuentros=emparejamientosDeLosPartidos($equipos);

			foreach ($encuentros as $indice => $dato) {
				$equipo1=$encuentros[$indice][0];
				$equipo2=$encuentros[$indice][1];

				insertarDatosPartido($conexion,$torneo,$responsable);

				$maxIdPartido=maxIDpartido($conexion);
				$maxIdPartido=(int)$maxIdPartido[0];

				insertarPartidosJuega($conexion,$maxIdPartido,$equipo1,$equipo2);
			}

			$equipos=idEquiposEnElTorneo($conexion,$torneo);

			foreach($equipos AS $indice => $datos){
				$equipo=$equipos[$indice][0];
				$valido=comprobarEquipoTieneEstadistica($conexion,$equipo);
				
				if($valido==FALSE){
					insertarEstadisticasAEquipos($conexion,$equipo);
				}
				
			}
			echo "<script>Swal.fire({ icon: 'success', title: '¡Enhorabuena!', text: 'El torneo se inició correctamente', showConfirmButton: false, timer: 2000, })</script>";
			header("Refresh:2");
		} else {
			echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Para iniciar el torneo debe añadir 8 equipos al mismo', showConfirmButton: false, timer: 2000, })</script>";
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

	function emparejamientosDeLosPartidos($equipos){
		$encuentros=array();
		foreach ($equipos as $indice => $valor) {
			if($indice<4){
				$aleatorio = array_rand($equipos, 2);
				array_push($encuentros, array($equipos[$aleatorio[0]],$equipos[$aleatorio[1]]));
				unset($equipos[$aleatorio[0]]);
				unset($equipos[$aleatorio[1]]);
			}
		}
		return $encuentros;
	}

?>