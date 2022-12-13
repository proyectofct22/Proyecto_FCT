<?php
	session_start();

	if (empty($_SESSION["idUsuario"])) { // Verificamos que el usuario ha iniciado sesión
			header("Location: ../../index.php");
	} else {
		// Borrado de las sesiones
		if (!empty($_SESSION['torneos']) || !empty($_SESSION['fase']) || !empty($_SESSION['TorneoParticipante'])) {
			unset($_SESSION['torneos']);
			unset($_SESSION['fase']);
			unset($_SESSION['TorneoParticipante']);
		}
		// Llamada a los documentos que componen la vista
		require_once "../../Views/Header.php";
		require_once "../../Views/Menu_Administrador.php";
		require_once "../../Views/Usuario_Administrador/View_Perfil_Admin.php";
		require_once "../../Views/Footer.php";
	}
?>