<?php

	session_start();

	if (empty($_SESSION["idUsuario"])) { // Verificamos que el usuario ha iniciado sesión
		header("Location: ../../index.php");
	} else {
		// Llamada al documento con la conexión a la base de datos
		require_once "../../Databases/Database.php";
		// Llamada al documento con las consultas en la base de datos
		require_once "../../Models/Usuario_Jugador/Model_Gestionar_Equipo_Jugador.php";
		$conexion = conexion();
		// Llamada a los documentos que componen la vista
		require_once "../../Views/Header.php";
		require_once "../../Views/Menu_Jugador.php";
		require_once "../../Views/Usuario_Jugador/View_Gestionar_Equipo_Jugador.php";
		require_once "../../Views/Footer.php";

		if (isset($_POST['agregarJugador'])) { // Si se envía el formulario para agregar un jugador
			if (isset($_POST['jugadorLibre'])) {
				$equipo = obtenerEquipo($conexion, $_SESSION['idUsuario']);
				$contador = comprobarTotalJugadoresEquipo($conexion, $equipo[0][0]);
				if ($contador[0][0] < 5) {
					agregarJugador($conexion, $equipo[0][0], $_POST['jugadorLibre']);
					echo "<script>Swal.fire({ icon: 'success', title: '¡Enhorabuena!', text: 'Jugador agregado correctamente', showConfirmButton: false, timer: 2000, })</script>";
					header("Refresh:2");
				} else {
					echo "<script>Swal.fire({ icon: 'error', title: '¡Error!', text: 'El equipo está lleno actualmente', showConfirmButton: false, timer: 2000, })</script>";
					header("Refresh:2");
				}
			} else {
				echo "<script>Swal.fire({ icon: 'error', title: '¡Error!', text: 'No ha seleccionado ningún jugador', showConfirmButton: false, timer: 2000, })</script>";
				header("Refresh:2");
			}
		}

		if (isset($_POST['quitarJugador'])) { // Si se envía el formulario para agregar un jugador
			if (isset($_POST['jugadorEquipo'])) {
				$jugador = usuarioJugador($conexion, $_POST['jugadorEquipo']);
				$jugador=$jugador[0][0];
				desasignarJugador($conexion, $jugador);
				echo "<script>Swal.fire({ icon: 'success', title: '¡Enhorabuena!', text: 'Jugador eliminado correctamente', showConfirmButton: false, timer: 2000, })</script>";
				header("Refresh:2");
			} else {
				echo "<script>Swal.fire({ icon: 'error', title: '¡Error!', text: 'No ha seleccionado ningún jugador', showConfirmButton: false, timer: 2000, })</script>";
				header("Refresh:2");
			}
		}

		if (isset($_POST['UnirTorneo'])) { // Si se envía el formulario para unirse a un torneo
			if (isset($_POST['SeleccionaTorneo'])) {
				$torneo=$_POST['SeleccionaTorneo'];
				$idUsuario=$_SESSION['idUsuario'];
				$equipo=obtenerEquipo($conexion, $idUsuario);
				$equipo=$equipo[0][0];
				$maxEquipos=maxEquiposEnTorneo($conexion,$torneo);
				$maxEquipos=(int)$maxEquipos[0];
				$contador = comprobarTotalJugadoresEquipo($conexion, $equipo[0][0]);
				if ($contador[0][0] == 5) { // Si el equipo no está completo no puedes unirte al torneo
					if($maxEquipos<8){
						asignarEquipoAlTorneo($conexion,$torneo,$equipo);
						echo "<script>Swal.fire({ icon: 'success', title: '¡Enhorabuena!', text: 'Tu equipo se ha unido al torneo correctamente', showConfirmButton: false, timer: 2000, })</script>";
						header("Refresh:2");
					} else {
						echo "<script>Swal.fire({ icon: 'error', title: '¡Error!', text: 'El torneo está completo', showConfirmButton: false, timer: 2000, })</script>";
						header("Refresh:2");
					}
				} else {
					echo "<script>Swal.fire({ icon: 'error', title: '¡Error!', text: 'No se puede unir al torneo si su equipo no está lleno', showConfirmButton: false, timer: 2000, })</script>";
				}
			} else {
				echo "<script>Swal.fire({ icon: 'error', title: '¡Error!', text: 'No ha seleccionado ningún torneo', showConfirmButton: false, timer: 2000, })</script>";
				header("Refresh:2");
			}
		}

		if (isset($_POST['Abandonar'])) { // Si se envía el formulario para abandonar el torneo
			if (isset($_POST['SeleccionaTorneo2'])) {
				$torneo=$_POST['SeleccionaTorneo2'];
				$idUsuario=$_SESSION['idUsuario'];
				$equipo=obtenerEquipo($conexion, $idUsuario);
				$equipo=$equipo[0][0];
				abandonarTorneo($conexion,$equipo);
				echo "<script>Swal.fire({ icon: 'success', title: '¡Enhorabuena!', text: 'Tu equipo abandonó el torneo correctamente', showConfirmButton: false, timer: 2000, })</script>";
				header("Refresh:2");
			} else {
				echo "<script>Swal.fire({ icon: 'error', title: '¡Error!', text: 'No ha seleccionado ningún torneo', showConfirmButton: false, timer: 2000, })</script>";
				header("Refresh:2");
			}
		}

		if (isset($_POST['EliminarEquipo'])) { // Si se envía el formulario para eliminar el equipo
			$idUsuario=$_SESSION['idUsuario'];
			$equipo=obtenerEquipo($conexion, $idUsuario);
			$equipo=$equipo[0][0];
			$validar=equipoAsignadoATorneo($conexion,$equipo);
			$validar=$validar[0][0];
			if ($validar==NULL) {
				eliminarJugadoresDelEquipo($conexion,$equipo);
				eliminarLider($conexion,$idUsuario);
				echo "<script>Swal.fire({ icon: 'success', title: '¡Enhorabuena!', text: 'Tu equipo se eliminó correctamente', showConfirmButton: false, timer: 2000, })</script>";
				header("Refresh:2; url=./Controller_Equipo_Jugador.php");
			} else if($validar!=NULL) {
				header("Refresh:2");
				echo "<script>Swal.fire({ icon: 'warning', title: '¡Atención!', text: 'Debes primero abandonar el torneo que te has inscrito', showConfirmButton: false, })</script>";
			}
		}
	}

?>
