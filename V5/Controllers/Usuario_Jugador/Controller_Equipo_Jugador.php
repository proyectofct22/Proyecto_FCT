<?php

	session_start();

	if (empty($_SESSION["idUsuario"])) { // Verificamos que el usuario ha iniciado sesión
			header("Location: ../../index.php");
		} else {
			// Llamada al documento con la conexión a la base de datos
			require_once "../../Databases/Database.php";
			// Llamada al documento con las consultas en la base de datos
			require_once "../../Models/Usuario_Jugador/Model_Equipo_Jugador.php";
			$conexion = conexion();
			// Llamada a los documentos que componen la vista
			require_once "../../Views/Header.php";
			require_once "../../Views/Menu_Jugador.php";
			require_once "../../Views/Usuario_Jugador/View_Equipo_Jugador.php";
			require_once "../../Views/Footer.php";
			// Si el usuario crea un equipo
			if ($_POST) {
				$conexion = conexion();
				$nombreEquipo = $_POST['nombreEquipo'];
				$comprobacion = comprobarEquipo($conexion, $nombreEquipo);
				if (empty($comprobacion)) { // Si no existe el equipo proceder con el alta
					crearEquipo($conexion, $nombreEquipo);
					$idEquipo = obtenerIdEquipoCreado($conexion, $nombreEquipo);
					actualizarUsuario($conexion, $idEquipo[0][0], $_SESSION['idUsuario']);
					echo "<script>swal({ icon: 'success', title: '¡Enhorabuena!', text: 'Se ha creado su equipo correctamente', buttons: false });</script>";
					header("Refresh:5; url=./Controller_Equipo_Jugador.php");
				} else {
					echo "<script>Swal.fire({ icon: 'error', title: '¡Error!', text: 'El nombre de equipo introducido ya existe', showConfirmButton: false, timer: 2000, })</script>";
				}

                if (isset($_POST['AbandonarEquipo'])) { //Si un jugador quiere abandonar un equipo
                    $nombreEquipo =$_SESSION['nombreEquipo'];
                    $idUsuario= $_SESSION['idUsuario'];
                    $idEquipo=obtenerIdEquipoCreado($conexion,$nombreEquipo);
                    // var_dump($idEquipo);
                    $idEquipo=$idEquipo[0][0];
                    abandonarEquipo($conexion, $idEquipo, $idUsuario);
                    echo "<script>swal({ icon: 'success', title: '¡Enhorabuena!', text: 'Has abandonado el equipo', buttons: false });</script>";
                    header("Refresh:2; url=./Controller_Perfil_Jugador.php");
                }
			}
	}

?>
