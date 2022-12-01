<?php

	// Llamada al documento con la conexión a la base de datos
	require_once "../Databases/Database.php";

	// Llamada al documento con las consultas en la base de datos
	require_once "../Models/Model_Torneo.php";
	$conexion = conexion();

	// Llamada a los documentos que componen la vista
	require_once "../Views/Header.php";
	require_once "../Views/Menu_Sin_Registrar.php";
	require_once "../Views/View_Torneo.php";
	require_once "../Views/Footer.php";

?>
