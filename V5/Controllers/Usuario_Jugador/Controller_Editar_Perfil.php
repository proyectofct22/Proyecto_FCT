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
				$correoUsuario = $_POST["email"];
				$passwordUsuario = $_POST["password"];

				if (empty($nickUsuario) && empty($correoUsuario) && empty($passwordUsuario)) { // Si no rellenó los campos
					echo "<script>swal('Error', 'Dede rellenar todos los campos', 'error');</script>";
				} else { // Si rellenó los campos
					$comprobarUsuario = comprobarUsuario($conexion, $nickUsuario);
					$comprobarCorreo = comprobarCorreo($conexion, $correoUsuario);
					$comprobarPassword = comprobarPassword($conexion, $passwordUsuario);

					if (empty($comprobarUsuario) && empty($comprobarCorreo) && empty($comprobarPassword)) { // Si no existen los datos
						cambioUsuario($conexion, $nickUsuario, $_SESSION['idUsuario']);
						cambioCorreo($conexion, $correoUsuario, $_SESSION['idUsuario']);
						cambioPassword($conexion, $passwordUsuario, $_SESSION['idUsuario']);
						$_SESSION['nick'] = $nickUsuario; // Actualizamos la sesión con el nuevo usuario
						echo "<script>swal({ title: '¡Enhorabuena!', text: 'Los datos se actualizaron correctamente', icon: 'success', buttons: false });</script>";
						header("Refresh:5; url=./Controller_Perfil_Jugador.php");
					} else { // Si existen los campos
						echo "<script>swal('Error', 'El usuario introducido ya existe.', 'error');</script>";
					}
				}
			}
	}

?>
