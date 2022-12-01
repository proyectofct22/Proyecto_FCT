<?php
session_start();

if (empty($_SESSION["idUsuario"])) 
	{ // Verificamos que el usuario ha iniciado sesión
		header("Location: ../../index.php");
	}
	else
	{
				// Llamada al documento con la conexión a la base de datos
		include_once "../../Databases/Database.php";
		$conexion = conexion();

		// Llamada al documento con las consultas en la base de datos
		include_once "../../Models/Usuario_Administrador/Model_EditarPartido_Admin.php";
		
		// Llamada a los documentos que componen la vista
		include_once "../../Views/Header.php";
		include_once "../../Views/Menu_Registrado_Admin.php";
		include_once "../../Views/Usuario_Administrador/View_EditarPartido_Admin.php";
		include_once "../../Views/Footer.php";

// var_dump($_POST);
		if(isset($_POST['MostrarPartidos'])){
			$torneoDatos=datosTorneo($conexion);
			// var_dump($torneoDatos);
			mostrarDatos($conexion,$torneoDatos);
		}

	}

?>