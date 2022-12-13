<?php

	session_start();

	if (empty($_SESSION["idUsuario"])) { // Verificamos que el usuario ha iniciado sesión
		header("Location: ../../index.php");
	} else {
		// Llamada al documento con la conexión a la base de datos
		require_once "../../Databases/Database.php";
		// Llamada al documento con las consultas en la base de datos
		require_once "../../Models/Usuario_Jugador/Model_Historial_Jugador.php";
		$conexion = conexion();
		// Llamada a los documentos que componen la vista
		require_once "../../Views/Header.php";
		require_once "../../Views/Menu_Jugador.php";
		require_once "../../Views/Usuario_Jugador/View_Historial_Jugador.php";
		require_once "../../Views/Footer.php";

		if (isset($_POST['MostrarPartidos'])) { // Si se envía el formulario para ver los partidos
			if (!empty($_POST['torneoFinalizado'])) {
				$tabla=TRUE;
				$torneo=$_POST['torneoFinalizado'];
				$datos=datosDePartidos($conexion,$torneo);
				mostrarPartidos($conexion,$datos,$tabla);
				echo "<script>$('html,body').animate({scrollTop: document.body.scrollHeight},'fast');</script>";
			} else {
				echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'No hay partidos para mostrar', showConfirmButton: false, timer: 2000, })</script>";
			}
		}
	}

?>
