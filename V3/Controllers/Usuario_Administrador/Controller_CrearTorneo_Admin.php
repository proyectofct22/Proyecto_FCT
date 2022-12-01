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
						$maxIdTorneo=maxidTorneo($conexion);
						$maxIdTorneo=(int)$maxIdTorneo[0]+1;
						insertarTorneo($conexion,$maxIdTorneo,$nombreTorneo,$juego);
					// header("Refresh:1");
					}
					else{
						echo "<script>alert('No se puede añadir más torneos');</script>";
					}

				}
				else{
					echo "<script>alert('Nombre de Torneo Existe');</script>";
				}
			}
			else{
				echo "<script>alert('Rellena el campo Torneo');</script>";
			}
		}

		if(isset($_POST['MostrarDatos'])){
			$torneoDatos=datosTorneo($conexion);
			mostrarDatos($conexion,$torneoDatos);
				// header("Refresh:1");
		}
		if(isset($_POST['IniciarTorneo'])){
			if(!empty($_POST['torneos'])){
				$torneo=$_POST['torneos'];
				$torneo=(int)$torneo;
				$Fecha=date('Y-m-d h:i:s');
				iniciarTorneo($conexion,$torneo,$Fecha);	
				// header("Refresh:1");
			}
		}
	}

	function iniciarTorneo($conexion,$torneo,$Fecha){
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
		header("Refresh:1");
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