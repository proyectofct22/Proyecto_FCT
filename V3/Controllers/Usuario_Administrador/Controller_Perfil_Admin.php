<?php
	session_start();

	if (empty($_SESSION["idUsuario"])) 
	{ // Verificamos que el usuario ha iniciado sesión
			header("Location: ../../index.php");
	}
	else
	{
			// Llamada a los documentos que componen la vista
			require_once "../../Views/Header.php";
			require_once "../../Views/Menu_Registrado_Admin.php";
			require_once "../../Views/Usuario_Administrador/View_Perfil_Admin.php";
			require_once "../../Views/Footer.php";
	}
?>