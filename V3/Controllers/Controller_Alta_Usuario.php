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
		if (empty($_POST["nombre"]) || empty($_POST["apellidos"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["ciclo"])) {
			echo "<script>alert('Dede rellenar todos los campos para poder registrarse');</script>";
		} else { // Si no hay errores al rellenar los campos se procede con la inserción
			$tipoUsuario = "jugador"; // Por defecto será jugador
			$nombreUsuario = $_POST["nombre"];
			$apellidoUsuario = $_POST["apellidos"];
			$nickUsuario = $_POST["usuario"];
			$correoUsuario = $_POST["email"];
			$cicloUsuario = $_POST["ciclo"];
			$passwordUsuario = $_POST["password"];
			$comprobacion = comprobarUsuario($conexion, $nickUsuario);
			if (empty($comprobacion)) { // Si no existe el usuario proceder con el alta
				altaUsuario($conexion, $nickUsuario, $tipoUsuario, $nombreUsuario, $apellidoUsuario, $correoUsuario, $passwordUsuario, $cicloUsuario);
				header("Location: ../index.php");
			} else {
				// echo "<script>alert('El usuario introducido ya existe. Por favor introduzca uno nuevo.');</script>";
				echo "<script>swal('Error', 'El usuario introducido ya existe. Introduzca uno nuevo.', 'error');</script>";
			}
		}
	}

?>
