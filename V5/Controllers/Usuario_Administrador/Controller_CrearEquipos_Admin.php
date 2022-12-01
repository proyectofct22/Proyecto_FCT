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
			include_once "../../Models/Usuario_Administrador/Model_CrearEquipos_Admin.php";
			
			// Llamada a los documentos que componen la vista
			include_once "../../Views/Header.php";
			include_once "../../Views/Menu_Administrador.php";
			include_once "../../Views/Usuario_Administrador/View_CrearEquipos_Admin.php";
			include_once "../../Views/Footer.php";


			//Crear Equipo
			if(isset($_POST['CrearEquipo'])){
				if(!empty($_POST['NombreEquipo'])){
					$nombreEquipo=$_POST['NombreEquipo'];
					$validar=comprobarEquipo($conexion,$nombreEquipo);

					if($validar==FALSE){
						$maxIdTorneo=idEquipo($conexion);
						$maxIdTorneo=(int)$maxIdTorneo[0]+1;
						// var_dump($maxIdTorneo);
						insertarEquipo($conexion,$maxIdTorneo,$nombreEquipo);
						echo "<script>Swal.fire({ icon: 'success', title: '¡Enhorabuena!', text: 'Has creado un nuevo equipo', showConfirmButton: false, })</script>";
						// header("Refresh:0");
					}
					else
					{
						echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'El equipo ya existe', showConfirmButton: false, })</script>";
					}
				}	
			}

			//Asignar Jugador un Equipo
			if(isset($_POST['AsignarJugador'])){
				if(!empty($_POST['Equipos']) && !empty($_POST['Jugador'])){
					$equipo=(int)$_POST['Equipos']; 
					
					$idTorneo=torneoEquipo($conexion,$equipo);
					$idTorneo=(int)$idTorneo[0];

					$max=jugadoresPorEquipo($conexion,$equipo);
					$max=(int)$max[0];

					$jugadores=cuantosJugadoresPorEquipo($conexion,$idTorneo,$equipo);
					$jugadores=(int)$jugadores[0];

					if($jugadores<$max){
						$jugador=(int)$_POST['Jugador'];
						asignarJugadores($conexion,$equipo,$jugador);
						// header("Refresh:0");
					}
					else
					{
						echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'El equipo está completo', showConfirmButton: false, })</script>";
					}
				}
			}

			//Asignar un Equipo a un Torneo
			if(isset($_POST['AsignarTorneo'])){
				if(!empty($_POST['Equipos']) && !empty($_POST['torneos'])){
					$equipo=(int)$_POST['Equipos'];
					$torneo=(int)$_POST['torneos'];
					$maxEquipos=maxEquiposEnTorneo($conexion,$torneo);
					$maxEquipos=(int)$maxEquipos[0];
					if($maxEquipos<8){
						asignarEquipoTorneo($conexion,$equipo,$torneo);
						// header("Refresh:0");
					}
					else{
						echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'El torneo está completo', showConfirmButton: false, })</script>";
					}
				}
			}

			//Mostrar Datos de los equipos
			if(isset($_POST['MostrarDatos'])){
				if(!empty($_POST['datos'])){
					$equipo=(int)$_POST['datos']; 
					$equipoDatos=jugadoresConEquipo($conexion,$equipo);
					mostrarDatos($conexion,$equipoDatos);
					$_SESSION['equipo']=$equipo;
					// header("Refresh:1");
				}
			}
			
			//Borrar jugador
			if(isset($_POST['botonBorrado'])){
				if(!empty($_POST['botonBorrado'])){
					$jugador=$_POST['botonBorrado'];
					$equipo=$_SESSION['equipo'];
					unset($_SESSION['equipo']);
					eliminarJugadorDelEquipo($conexion,$equipo,$jugador);
					// header("Refresh:0");
				}
			}
	}

?>
