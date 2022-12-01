<?php

	session_start();

	require_once "../../Views/Header.php";
	require_once "../../Views/Menu_Registrado.php";
	require_once "../../Views/Usuario_Jugador/View_Editar_Perfil.php";
	require_once "../../Views/Footer.php";

	if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Upload') { // Si se envía el formulario
		if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) { // Si se ha subido un archivo
			$fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
			$fileName = $_FILES['uploadedFile']['name'];
			$fileSize = $_FILES['uploadedFile']['size'];
			$fileType = $_FILES['uploadedFile']['type'];
			$filesegments = explode(".", $fileName); // Separamos por el punto el archivo subido
			$fileExtension = strtolower(end($filesegments)); // Guardamos la extensión del archivo

			$newFileName = $_SESSION['nick'].".".$fileExtension; // Asignamos el nombre y la extensión del fichero

			$allowedfileExtensions = array('png'); // Extensiones aceptadas

			if (in_array($fileExtension, $allowedfileExtensions)) { // Si la extensión del archivo está en el array
				$uploadFileDir = '../../Images/Usuarios/'; // Ruta de subida
				$dest_path = $uploadFileDir . $newFileName;
				if (move_uploaded_file($fileTmpPath, $dest_path)) { // Si todo es correcto
					echo "<script>Swal.fire({ title: '¡Enhorabuena!', text: 'Se ha subido su imagen correctamente', showCancelButton: false, showConfirmButton: false, });</script>";
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

?>
