<?php

	// Llamada al documento con la conexión a la base de datos
	require_once "../Databases/Database.php";

	// Llamada al documento con las consultas en la base de datos
	require_once "../Models/Model_Restaurar_Contrasena.php";
	$conexion = conexion();
	
	// Llamada a los documentos que componen la vista
	require_once "../Views/Header.php";
	require_once "../Views/Menu_Login.php";
	require_once "../Views/View_Restaurar_Contrasena.php";
	require_once "../Views/Footer.php";

	// Cuando se envia el formulario
	if ($_POST) {
		$nombre = $_POST["nombre"];
		$password1 = $_POST["password1"];
		$password2 = $_POST["password2"];
		$idUsuario = verificarUsuario($conexion, $nombre);
		if (empty($idUsuario)) { // Comprobamos que el usuario introducido existe
			echo "<script>alert('El usuario introducido no existe.');</script>";
		} else {
			if ($password1 != $password2) { // Comprobamos que ambas contraseñas son iguales
				echo "<script>alert('Las contraseñas introducidas son diferentes.');</script>";
			} else { // Si todo es correcto procesar la actualización de contraseña
				$id = $idUsuario[0][0];
				restaurarContrasena($conexion, $password1, $id);
				echo "<script>alert('Se restauró la contraseña correctamente.');</script>";
				header("Refresh:0; url=./Controller_Login.php");
			}
		}
	}

?>
