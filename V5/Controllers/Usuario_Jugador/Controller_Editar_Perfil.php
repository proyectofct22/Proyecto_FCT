<?php

	session_start();

	if (empty($_SESSION["idUsuario"])) { // Verificamos que el usuario ha iniciado sesión
			header("Location: ../../index.php");
		} else {
			// Llamada al documento con la conexión a la base de datos
			require_once "../../Databases/Database.php";
			// Llamada al documento con las consultas en la base de datos
			require_once "../../Models/Usuario_Jugador/Model_Editar_Perfil.php";
			$conexion = conexion();
			// Llamada a los documentos que componen la vista
			require_once "../../Views/Header.php";
			require_once "../../Views/Menu_Jugador.php";
			require_once "../../Views/Usuario_Jugador/View_Editar_Perfil.php";
			require_once "../../Views/Footer.php";
			// Editar datos del usuario
			if (isset($_POST['enviarDatos']) && $_POST['enviarDatos'] == 'Actualizar') { // Si se envía el formulario
				$nickUsuario = $_POST["usuario"];
				$password1 = $_POST["password1"];
				$password2 = $_POST["password2"];

				if (empty($nickUsuario) && empty($password1) && empty($password2)) { // Si no ha rellenado el formulario
					echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Rellene los campos para actualizar sus datos', showConfirmButton: false, timer: 2000, })</script>";
				} else {
					if (empty($nickUsuario) || empty($password1) || empty($password2)) { // Si ha dejado algún campo sin rellenar
						echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Rellene los campos para actualizar sus datos', showConfirmButton: false, timer: 2000, })</script>";
					} else {
						if ($password1 != $password2) { // Si las contraseñas son diferentes
							echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Las contraseñas no coinciden', showConfirmButton: false, timer: 2000, })</script>";
						} else { // Si las contraseñas son iguales
							$comprobarUsuario = comprobarUsuario($conexion, $nickUsuario);
							if (empty($comprobarUsuario)) { // Si el nuevo usuario no existe
								actualizarDatos($conexion, $nickUsuario, $password1, $_SESSION['idUsuario']);
								$_SESSION['nick'] = $nickUsuario; // Actualizamos la sesión con el nuevo usuario
								echo "<script>Swal.fire({ icon: 'success', title: '¡Enhorabuena!', text: 'Sus datos se actualizaron correctamente', showConfirmButton: false, timer: 2000, })</script>";
								header("Refresh:5; url=./Controller_Perfil_Jugador.php");
							} else { // Si el nuevo usuario existe
								echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'El usuario introducido ya existe', showConfirmButton: false, timer: 2000, })</script>";
							}
						}
					}
				}
			}
	}

?>
