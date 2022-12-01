<?php

	// Llamada al documento con la conexión a la base de datos
	require_once "../Databases/Database.php";

	// Llamada al documento con las consultas en la base de datos
	require_once "../Models/Model_Login.php";
	
	// Llamada a los documentos que componen la vista
	require_once "../Views/Header.php";
	require_once "../Views/View_Login.php";
	require_once "../Views/Footer.php";

	// Cuando se envia el formulario
	if ($_POST) {
		$conexion = conexion();
		if (empty($_POST["nombre"]) || empty($_POST["password"])) {
			echo "<script>alert('Dede rellenar los campos para iniciar sesión');</script>";
		} else if (loginUsuario($conexion, $_POST["nombre"], MD5($_POST["password"]))) { // Si es correcto redirigimos
			session_start();
			$_SESSION["nombre"] = $_POST["nombre"];
			$datosUsuario = datosUsuario($conexion, $_SESSION["nombre"]); // Obtenemos los datos del usuario
			$_SESSION["idUsuario"] = $datosUsuario[0];
			$_SESSION["tipoUsuario"] = $datosUsuario[1];
			if ($_SESSION["tipoUsuario"] == "administrador") { // Dependiendo del usuario cambiará la ruta
				header("Location: ./Controller_Welcome_Administrador.php");
			} else {
                header("Location: ./Controller_Welcome_Jugador.php");
			}
		} else { // Si no hay errores al rellenar los campos se muestra un error
			echo "<script>alert('Los datos introducidos son incorrectos');</script>";
		}
	}

?>
