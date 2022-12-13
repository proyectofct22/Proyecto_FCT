$(function() {
	// Obtenemos las estadísticas de los partidos
	let jsonPartidos = document.getElementById("datosPartido").value;
	let datosPartidos = JSON.parse(jsonPartidos);
	// console.log(datosPartidos);

	// Gráfica de partidos
	$('#partidos').highcharts({
		chart: {
			plotBackgroundColor: null, // 'rgb(0,0,0)',
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie'
		},
		title: {
			text: 'Partidos'
		},
		tooltip: {
			pointFormat: '<b>{point.percentage:.1f}%</b>'
		},
		accessibility: {
			point: {
				valueSuffix: '%'
			}
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: false
				},
				showInLegend: true
			}
		},
		series: [{
			colorByPoint: true,
			data: [
				{
					name: 'Partidos Ganados',
					y: datosPartidos[0][0],
					sliced: true,
					selected: true
				},
				{
					name: 'Partidos Perdidos',
					y: datosPartidos[0][1]
				}
			]
		}]
	});

	// Obtenemos las estadísticas de los torneos
	let jsonTorneos = document.getElementById("datosTorneo").value;
	let datosTorneos = JSON.parse(jsonTorneos);
	// console.log(datosTorneos);

	// Gráfica de torneos
	$('#torneos').highcharts({
		chart: {
			type: 'column'
		},
		title: {
			text: 'Torneos'
		},
		xAxis: {
			categories: [''],
			visible: false
		},
		yAxis: {
			title: {
				text: ''
			},
			visible: false // Visibilidad del eje Y
		},
		plotOptions: {
			series: {
				stacking: 'normal',
				dataLabels: {
					enabled: true
				}
			}
		},
		series: [
			{
				data: [datosTorneos[0][0]],
				name: 'Torneos Ganados'
			},
			{
				data: [datosTorneos[0][1]],
				name: 'Torneos Perdidos'
			}
		]
	});
});
