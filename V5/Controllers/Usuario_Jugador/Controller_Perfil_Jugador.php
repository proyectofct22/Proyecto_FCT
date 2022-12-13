<?php

	session_start();

	if (empty($_SESSION["idUsuario"])) { // Verificamos que el usuario ha iniciado sesión
			header("Location: ../../index.php");
		} else {
			// Llamada al documento con la conexión a la base de datos
			require_once "../../Databases/Database.php";
			// Llamada al documento con las consultas en la base de datos
			require_once "../../Models/Usuario_Jugador/Model_Perfil_Jugador.php";
			$conexion = conexion();
			// Llamada a los documentos que componen la vista
			require_once "../../Views/Header.php";
			require_once "../../Views/Menu_Jugador.php";
			require_once "../../Views/Usuario_Jugador/View_Perfil_Jugador.php";
			require_once "../../Views/Footer.php";
			// Subir imagen
			if (isset($_POST['cambiarImagen']) && $_POST['cambiarImagen'] == 'Confirmar subida') { // Si se envía el formulario
				if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) { // Si se ha subido un archivo
					$fileTmpPath = $_FILES['imagen']['tmp_name'];
					$fileName = $_FILES['imagen']['name'];
					$fileSize = $_FILES['imagen']['size'];
					$fileType = $_FILES['imagen']['type'];
					$filesegments = explode(".", $fileName); // Separamos por el punto el archivo subido
					$fileExtension = strtolower(end($filesegments)); // Guardamos la extensión del archivo
					$newFileName = $_SESSION['idUsuario'].".".$fileExtension; // Asignamos el nombre y la extensión del fichero

					$allowedfileExtensions = array('jpg'); // Extensiones aceptadas

					if (in_array($fileExtension, $allowedfileExtensions)) { // Si la extensión del archivo está en el array
						$uploadFileDir = '../../Media/Usuarios/'; // Ruta de subida
						$dest_path = $uploadFileDir . $newFileName;
						if (move_uploaded_file($fileTmpPath, $dest_path)) { // Si todo es correcto
							echo "<script>Swal.fire({ icon: 'success', title: '¡Enhorabuena!', text: 'Se ha subido su imagen correctamente', showConfirmButton: false, timer: 2000, })</script>";
							header("Refresh:2 url=./Controller_Perfil_Jugador.php");
						} else { // Si la ruta de guardado es incorrecta
							error_reporting(0);
							echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'Hubo un error al subir la imagen', showConfirmButton: false, timer: 2000})</script>";
						}
					} else { // Si la extensión de la imagen no es válida
						echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'La imagen no es válida. Suba una imagen .".implode(',', $allowedfileExtensions)."', showConfirmButton: false, timer: 2000, })</script>";
					}
				} else { // Si no ha subido ninguna imagen
					echo "<script>Swal.fire({ icon: 'error', title: 'Error', text: 'No ha subido ninguna imagen', showConfirmButton: false, timer: 2000, })</script>";
				}
			}
	}

?>
