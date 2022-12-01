<?php

	function conexion() {
		$servername = "localhost";
		$username   = "root";
		$password   = "root";
		$dbname     = "gamingroom";

		try {
			$conn = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
			// Set the PDO error mode to exception
			$conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			echo "Error: " . $e -> getMessage();
		}
		return $conn;
	}

?>
