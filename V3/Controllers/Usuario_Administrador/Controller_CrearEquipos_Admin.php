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
		include_once "../../Models/Usuario_Administrador/Model_CrearEquipos_Admin.php";
		
		// Llamada a los documentos que componen la vista
		include_once "../../Views/Header.php";
		include_once "../../Views/Menu_Registrado_Admin.php";
		include_once "../../Views/Usuario_Administrador/View_CrearEquipos_Admin.php";
		include_once "../../Views/Footer.php";


		//Crear Equipo
		if(isset($_POST['CrearEquipo'])){
			if(!empty($_POST['NombreEquipo']) && !empty($_POST['torneos'])){
				$torneo=$_POST['torneos'];
				$maxEquipos=maxEquiposEnTorneo($conexion,$torneo);
				$maxEquipos=(int)$maxEquipos[0];
				if($maxEquipos<8){
					$nombreEquipo=$_POST['NombreEquipo'];
					$validar=comprobarEquipo($conexion,$nombreEquipo);
					if($validar==FALSE)
					{
						$maxIdTorneo=idEquipo($conexion);
						$maxIdTorneo=(int)$maxIdTorneo[0]+1;
					// var_dump($maxIdTorneo);
						insertarEquipo($conexion,$maxIdTorneo,$nombreEquipo,$torneo);
						header("Refresh:1");
					}
					else
					{
						echo "<script>alert('Nombre de Equipo Repetido');</script>";
					}
				}
				else{
					echo "<script>alert('Maximo de equipos superado');</script>";
				}
			}
			else{
				echo "<script>alert('Rellena todos los datos');</script>";
			}
		}

		//Asignar Jugador un Equipo
		if(isset($_POST['AsignarJugador'])){
			if(!empty($_POST['Equipos']) && !empty($_POST['Jugador'])){
				$equipo=(int)$_POST['Equipos']; 
				$jugador=(int)$_POST['Jugador'];
				asignarJugadores($conexion,$equipo,$jugador);
				header("Refresh:1");
				// var_dump($equipo);
				// var_dump($jugador);
			}
		}

		//Mostrar Datos de los equipos

		if(isset($_POST['MostrarDatos']))
		{
			if(!empty($_POST['datos'])){
				$equipo=(int)$_POST['datos']; 
				$equipoDatos=jugadoresConEquipo($conexion,$equipo);
				mostrarDatos($conexion,$equipoDatos);

				// header("Refresh:1");
				// var_dump($equipo);
				// var_dump($jugador);
			}
		}

		
		//Mostrar Datos
		// $equipo=(int)$_POST['Equipos']; 
		// jugadoresConEquipo($conexion,$equipo);

	}

?>