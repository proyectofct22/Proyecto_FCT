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
		$usuario = $_POST["usuario"];
		$password1 = $_POST["password1"];
		$password2 = $_POST["password2"];
		$idUsuario = verificarUsuario($conexion, $usuario);
		
		if (empty($usuario) || empty($password1) || empty($password2)) {
			echo "<script>swal('Error', 'Dede rellenar los campos para restaurar la contraseña', 'error');</script>";
		} else {
			if (empty($idUsuario)) {
				echo "<script>swal('Error', 'El usuario introducido no existe', 'error');</script>";
			} else {
				if ($password1 != $password2) { // Comprobamos que ambas contraseñas son iguales
					echo "<script>swal('Error', 'Las contraseñas introducidas son diferentes', 'error');</script>";
				} else { // Si todo es correcto procesar la actualización de contraseña
					$id = $idUsuario[0][0];
					restaurarContrasena($conexion, $password1, $id);
					echo "<script>swal('Se restauró la contraseña correctamente', { buttons: false });</script>";
					header("Refresh:5; url=./Controller_Login.php");
				}
			}
		}
	}

?>
