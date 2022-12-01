<?php

	// Llamada al documento con la conexión a la base de datos
	require_once "../Databases/Database.php";

	// Llamada al documento con las consultas en la base de datos
	require_once "../Models/Model_Alta_Usuario.php";
	
	// Llamada a los documentos que componen la vista
	require_once "../Views/Header.php";
	require_once "../Views/Menu_Login.php";
	require_once "../Views/View_Alta_Usuario.php";
	require_once "../Views/Footer.php";

	// Cuando se envia el formulario
	if ($_POST) {
		$conexion = conexion();
		if (empty($_POST["nombre"]) || empty($_POST["apellido"]) || empty($_POST["ciclo"]) || empty($_POST["password"])) {
			echo "<script>alert('Dede rellenar todos los campos para poder registrarse');</script>";
		} else { // Si no hay errores al rellenar los campos se procede con la inserción
			// session_start();
			$tipoUsuario = "jugador"; // Por defecto será jugador
			$nombre = $_POST["nombre"];
			$apellido = $_POST["apellido"];
			$password = $_POST["password"];
			$ciclo = $_POST["ciclo"];
			altaUsuario($conexion, $tipoUsuario, $nombre, $apellido, $password, $ciclo); // Insertar datos
			// $datosUsuario = datosUsuario($conexion, $_SESSION["nombre"]); // Obtenemos los datos del usuario
			// $_SESSION["idUsuario"] = $datosUsuario[0];
			// $_SESSION["tipoUsuario"] = $datosUsuario[1];
			// header("Location: ./Controller_Welcome_Jugador.php"); // Redirigir al nuevo usuario
			header("Location: ../index.php");
		}
	}

?>
