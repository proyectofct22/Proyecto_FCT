<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gaming Room LDV</title>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<!-- Bootstrap JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
	<!-- Bootstrap Icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	<!-- Sweet Alerts -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- JQuery -->
	<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
	<!-- High Charts -->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/highcharts-3d.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>

	<style type="text/css">

		@media all and (min-width: 992px) { /* Estilos para el menú */
			.navbar .nav-item .dropdown-menu{ display: none; }
			.navbar .nav-item:hover .nav-link{  }
			.navbar .nav-item:hover .dropdown-menu{ display: block; }
			.navbar .nav-item .dropdown-menu{ margin-top: 0; }
		}

		.botonMenu { /* Estilos de los botones del menú. Se puede borrar más adelante */
			/* width: 150px; */
			/* text-align: center; */
		}

		.botonMenu:hover { /* Estilos de los botones del menú. Se puede borrar más adelante */
			color: white;
		}

		body { /* Estilos generales para el body */
			/* background-color: rgba(82, 72, 158, 1.0); */
			font-size: 13pt;
			font-family: arial;
		}

		@font-face { /* Cargamos la fuente personalizada */
			font-family: OriginTech;
			src: url('../Fonts/OriginTech.otf');
		}

		.fuentePersonalizada { /* Clase con la fuente personalizada */
			font-family: OriginTech;
		}

		.columnasAltaUsuario { /* Estilos para el alta de usuario */
			float: left;
			width: 48%;
		}

		.textoCentrado { /* Estilos para centrar el texto */
			text-align: center;
		}

	</style>
</head>
<body>
