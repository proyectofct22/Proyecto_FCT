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
			require_once "../../Views/Menu_Registrado.php";
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

			// Subir imagen
			if (isset($_POST['subirImagen']) && $_POST['subirImagen'] == 'Subir Imagen') { // Si se envía el formulario
				if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) { // Si se ha subido un archivo
					$fileTmpPath = $_FILES['imagen']['tmp_name'];
					$fileName = $_FILES['imagen']['name'];
					$fileSize = $_FILES['imagen']['size'];
					$fileType = $_FILES['imagen']['type'];
					$filesegments = explode(".", $fileName); // Separamos por el punto el archivo subido
					$fileExtension = strtolower(end($filesegments)); // Guardamos la extensión del archivo

					$newFileName = $_SESSION['idUsuario'].".".$fileExtension; // Asignamos el nombre y la extensión del fichero

					$allowedfileExtensions = array('png'); // Extensiones aceptadas

					if (in_array($fileExtension, $allowedfileExtensions)) { // Si la extensión del archivo está en el array
						$uploadFileDir = '../../Images/Usuarios/'; // Ruta de subida
						$dest_path = $uploadFileDir . $newFileName;
						if (move_uploaded_file($fileTmpPath, $dest_path)) { // Si todo es correcto
							echo "<script>swal({ title: '¡Enhorabuena!', text: 'Se ha subido su imagen correctamente', buttons: false });</script>";
							header("Refresh:5; url=./Controller_Perfil_Jugador.php");
						} else { // Si la ruta de guardado es incorrecta
							error_reporting(0);
							echo "<script>swal('Error', 'Hubo un error al subir la imagen.', 'error');</script>";
						}
					} else { // Si la extensión de la imagen no es válida
						echo "<script>swal('Error', 'La imagen no es válida. Suba una imagen .".implode(',', $allowedfileExtensions)."', 'error');</script>";
					}
				} else { // Si no ha subido ninguna imagen
					echo "<script>swal('Error', 'No ha subido ninguna imagen.', 'error');</script>";
				}
			}
	}

?>
