<?php
//Función: conexion()
//Parámetros entrada: --
//Parámetros salida: devuelve el identificador de la conexión
	function conexion(){
	  $servername = "localhost";
	  $username = "id19614322_root";
	  $password = "Un}XFUQmhZO7zyZC";
	  $dbname = "id19614322_gamingroom";

	  try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  return $conn;
	  }

	  catch(PDOException $e)
	  {
		echo "Error: " . $e->getMessage();
	  }

	}
?>