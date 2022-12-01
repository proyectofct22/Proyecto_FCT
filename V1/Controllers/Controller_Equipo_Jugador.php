<?php

	session_start();

	// Llamada al documento con la conexión a la base de datos
	require_once "../Databases/Database.php";

	// Llamada al documento con las consultas en la base de datos
	require_once "../Models/Model_Equipo_Jugador.php";
	$conexion = conexion();

	if (empty($_SESSION["idUsuario"])) { // Verificamos que el usuario ha iniciado sesión
			header("Location: ../index.php");
		} else {
			// Llamada a los documentos que componen la vista
			require_once "../Views/Header.php";
			require_once "../Views/Menu_Registrado.php";
			require_once "../Views/View_Equipo_Jugador.php";
			require_once "../Views/Footer.php";
	}

?>
