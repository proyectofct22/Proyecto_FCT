<?php

	// Llamada al documento con la conexión a la base de datos
	require_once "../Databases/Database.php";

	// Llamada al documento con las consultas en la base de datos
	require_once "../Models/Model_Login.php";
	
	// Llamada a los documentos que componen la vista
	require_once "../Views/Header.php";
	require_once "../Views/Menu_Login.php";
	require_once "../Views/View_Login.php";
	require_once "../Views/Footer.php";

	// Cuando se envia el formulario
	if ($_POST) {
		$conexion = conexion();
		// var_dump($_POST);
		if (empty($_POST["nick"]) || empty($_POST["password"])) {
			echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Dede rellenar los campos para iniciar sesión', showConfirmButton: false, timer: 2000})</script>";
		} else if (loginUsuario($conexion, $_POST["nick"], MD5($_POST["password"]))) { // Si es correcto redirigimos
			session_start();
			$_SESSION["nick"] = $_POST["nick"];
			$datosUsuario = datosUsuario($conexion, $_SESSION["nick"]); // Obtenemos los datos del usuario
			$_SESSION["idUsuario"] = $datosUsuario[0];
			$_SESSION["tipoUsuario"] = $datosUsuario[1];
			if ($_SESSION["tipoUsuario"] == "administrador") { // Dependiendo del usuario cambiará la ruta
				header("Location: ./Usuario_Administrador/Controller_Perfil_Admin.php");
			} else {
				header("Location: ./Usuario_Jugador/Controller_Perfil_Jugador.php");
			}
		} else { // Si no hay errores al rellenar los campos se muestra un error
			echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Los datos introducidos son incorrectos', showConfirmButton: false, timer: 2000})</script>";
		}
	}

?>
