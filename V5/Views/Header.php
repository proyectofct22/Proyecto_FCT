<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gaming Room LDV</title>
	<!-- Logo -->
	<link rel="icon" type="image/x-icon" href="../Media/Logo.png">
	<link rel="icon" type="image/x-icon" href="../../Media/Logo.png">
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
		/* Estilos para el menú */
		@media all and (min-width: 992px) {
			.navbar .nav-item .dropdown-menu{ display: none; }
			.navbar .nav-item:hover .nav-link{  }
			.navbar .nav-item:hover .dropdown-menu{ display: block; }
			.navbar .nav-item .dropdown-menu{ margin-top: 0; }
		}

		/* Fondo del inicio */
		.fondoInicio {
			background-image: url('../Media/Inicio/Fondo.gif');
			background-size: cover;
			background-position: center;
			background-repeat: no-repeat;
			background-attachment: fixed;
		}

		/* Cargamos la fuente personalizada */
		@font-face { font-family: OriginTech; src: url('../Fonts/OriginTech.otf'); }
		@font-face { font-family: OriginTech; src: url('../../Fonts/OriginTech.otf'); }
		.fuentePersonalizada { font-family: OriginTech; }
		.fuentePersonalizadaRegistrado { font-family: OriginTech; }

		/* Color de fondo */
		.fondoOscuro { background-color: #121212; }

		/* Barra de desplazamiento personalizada */
		::-webkit-scrollbar { width: 10px; } /* Ancho de la barra */
		::-webkit-scrollbar-track { background: #f1f1f1; } /* Color de fondo de la barra */
		::-webkit-scrollbar-thumb { background: #888; } /* Color de la posición de la barra */
		::-webkit-scrollbar-thumb:hover { background: #555; } /* Color de la posición de la barra en hover */
	</style>
</head>
<body>
