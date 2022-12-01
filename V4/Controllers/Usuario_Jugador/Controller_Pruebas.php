<?php

	session_start();

	// Llamada al documento con la conexión a la base de datos
	require_once "../../Databases/Database.php";

	// Llamada al documento con las consultas en la base de datos
	// require_once "../../Models/Usuario_Jugador/Model_Pruebas.php";
	$conexion = conexion();

	if (empty($_SESSION["idUsuario"])) { // Verificamos que el usuario ha iniciado sesión
			header("Location: ../../index.php");
		} else {
			// Llamada a los documentos que componen la vista
			require_once "../../Views/Header.php";
			require_once "../../Views/Menu_Registrado.php";
			require_once "../../Views/Usuario_Jugador/View_Pruebas.php";
			require_once "../../Views/Footer.php";

			//Pintar una tabla y al pulsar un boton pintar una diferente:
			$editarTabla = false;
			echo '<div class="container pt-5"><div class="pt-5">';

				
				if ($_POST) {
					$editarTabla = true;
				}


				if ($editarTabla == false) {
					echo "<table class='table table-bordered'><tr><td>aaaa</td><td>";
				echo '<form method="post"><input type="submit" value="editar" name="editar"></form>';
				echo "</td></tr></table>";
				} else {
					echo "<table class='table table-bordered'><tr><td>aaaa</td><td>modifica</td></tr></table>";
				}
			echo '</div></div>';
}

?>
