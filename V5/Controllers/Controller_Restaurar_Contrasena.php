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
			echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Dede rellenar los campos para restaurar la contraseña', showConfirmButton: false, timer: 2000, })</script>";
		} else {
			if (empty($idUsuario)) {
				echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'El usuario introducido no existe', showConfirmButton: false, timer: 2000, })</script>";
			} else {
				if ($password1 != $password2) { // Si las contraseñas son diferentes
					echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Las contraseñas no coinciden', showConfirmButton: false, timer: 2000, })</script>";
				} else { // Si las contraseñas son iguales
					$id = $idUsuario[0][0];
					restaurarContrasena($conexion, $password1, $id);
					echo "<script>swal({ title: '¡Enhorabuena!', text: 'Contraseña restaurada correctamente', icon: 'success', buttons: false });</script>";
					header("Refresh:5; url=./Controller_Login.php");
				}
			}
		}
	}

?>
