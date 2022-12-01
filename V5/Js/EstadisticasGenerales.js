$(function() {
	// Obtenemos las estadísticas de los partidos globales
	let jsonPartidosGlobales = document.getElementById("datosPartidosGlobales").value;
	let datosPartidosGlobales = JSON.parse(jsonPartidosGlobales);
	// console.log(datosPartidosGlobales);
	
	// Gráfica de partidos globales
	$('#partidosGlobales').highcharts({
		chart: {
			type: 'pie',
			options3d: {
				enabled: true,
				alpha: 45
			}
		},
		title: {
			text: 'Partidos Globales'
		},
		subtitle: {
			text: 'Número de partidos ganados de los equipos'
		},
		plotOptions: {
			pie: {
				innerSize: 100,
				depth: 45
			}
		},
		series: [
			{
				name: 'Victorias',
				data: datosPartidosGlobales
			}
		]
	});

	// Obtenemos las estadísticas de los partidos globales
	let jsonTorneosGlobales = document.getElementById("datosTorneosGlobales").value;
	let datosTorneosGlobales = JSON.parse(jsonTorneosGlobales);
	// console.log(datosPartidosGlobales);
	
	// Gráfica de partidos globales
	$('#torneosGlobales').highcharts({
		chart: {
			type: 'pie',
			options3d: {
				enabled: true,
				alpha: 45
			}
		},
		title: {
			text: 'Torneos Globales'
		},
		subtitle: {
			text: 'Número de torneos ganados de los equipos'
		},
		plotOptions: {
			pie: {
				innerSize: 100,
				depth: 45
			}
		},
		series: [
			{
				name: 'Victorias',
				data: datosTorneosGlobales
			}
		]
	});
});
