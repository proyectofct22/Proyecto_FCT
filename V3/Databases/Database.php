<?php

	function conexion() {
		$servername = "localhost";
		$username   = "id19614322_root";
		$password   = "Un}XFUQmhZO7zyZC";
		$dbname     = "id19614322_gamingroom";

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
