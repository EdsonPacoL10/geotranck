<!--begin::Javascript-->
<script>var hostUrl = "recursos/metronic/assets/";</script>
<?php
// Obtiene la URL actual
$currentUrl = current_url();
?>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="recursos/metronic/assets/plugins/global/plugins.bundle.js"></script>
<script src="recursos/metronic/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used by this page)-->
<!--<script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
		<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>-->
<!--end::Vendors Javascript-->



<script>
$(document).ready(function () {
    // Enviar mensaje de alerta
    $('.confirmButton').on('click', function (e) {
        e.preventDefault(); // Prevenir la acción por defecto del enlace
        
        var container = $(this).closest('.estudiante');
        var data = {
            nom_estudiante: container.find('.nom_estudiante').val(),
            ape_estudiante: container.find('.ape_estudiante').val()
        };

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function (position) { // Success callback
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;
                    var accuracy = position.coords.accuracy;

                    console.log('Latitud:', lat);
                    console.log('Longitud:', lng);
                    console.log('Precisión:', accuracy + ' metros');

                    data.latitud = lat;
                    data.longitud = lng;
                    data.precision = accuracy;

                    $.ajax({
                        url: '/sgcue', // URL a la que se enviará la solicitud
                        type: 'POST',
                        data: data,
                        success: function (response) {
                            Swal.fire({
                                text: 'Mensaje enviado con alerta éxitosamente: ' + response.message,
                                icon: 'success',
                                buttonsStyling: false,
                                confirmButtonText: 'Ok!',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                }
                            });
                        },
                        error: function (xhr, status, error) {
                            Swal.fire({
                                text: 'Error al enviar el mensaje: ' + error,
                                icon: 'error',
                                buttonsStyling: false,
                                confirmButtonText: 'Ok!',
                                customClass: {
                                    confirmButton: 'btn btn-danger'
                                }
                            });
                        }
                    });
                },
                function (error) { // Error callback
                    let errorMessage = '';

                    switch (error.code) {
                        case error.PERMISSION_DENIED:
                            errorMessage = 'Permiso denegado para obtener ubicación.';
                            break;
                        case error.POSITION_UNAVAILABLE:
                            errorMessage = 'Información de ubicación no disponible.';
                            break;
                        case error.TIMEOUT:
                            errorMessage = 'La solicitud para obtener la ubicación ha caducado.';
                            break;
                        case error.UNKNOWN_ERROR:
                            errorMessage = 'Ha ocurrido un error desconocido.';
                            break;
                    }
                    Swal.fire({
                        text: errorMessage,
                        icon: 'error',
                        buttonsStyling: false,
                        confirmButtonText: 'Ok!',
                        customClass: {
                            confirmButton: 'btn btn-danger'
                        }
                    });
                },
                {
                    enableHighAccuracy: true,
                    timeout: 10000,
                    maximumAge: 0
                }
            );
        } else {
            Swal.fire({
                text: 'Geolocalización no soportada por este navegador.',
                icon: 'error',
                buttonsStyling: false,
                confirmButtonText: 'Ok!',
                customClass: {
                    confirmButton: 'btn btn-danger'
                }
            });
        }
    });
});



$(document).ready(function () {
		// Enviar mensaje de alerta
		$('.alertButton').on('click', function (e) {
			e.preventDefault(); // Prevenir la acción por defecto del enlace
			var container = $(this).closest('.estudiante');
			var data = {
				nom_estudiante: container.find('.nom_estudiante').val(),
				ape_estudiante: container.find('.ape_estudiante').val(),
				cur_estudiante: container.find('.cur_estudiante').val(),
				nom_padre: container.find('.nom_padre').val(),
				ape_padre: container.find('.ape_padre').val(),
				tel_padre: container.find('.tel_padre').val(),
				nom_conductor: container.find('.nom_conductor').val(),
				ape_conductor: container.find('.ape_conductor').val(),
				tel_conductor: container.find('.tel_conductor').val(),
				mar_automovil: container.find('.mar_automovil').val(),
				mod_automovil: container.find('.mod_automovil').val(),
				color_automovil: container.find('.color_automovil').val(),
				placa_automovil: container.find('.placa_automovil').val()
			};
			$.ajax({
				url: '/acacs', // URL a la que se enviará la solicitud
				type: 'POST',
				data: data,
				success: function (response) {
					Swal.fire({
						text: 'Mensaje enviado con alerta éxitosamente: ' + response.message,
						icon: 'success',
						buttonsStyling: false,
						confirmButtonText: 'Ok!',
						customClass: {
							confirmButton: 'btn btn-primary'
						}
					});
				},
				error: function (xhr, status, error) {
					Swal.fire({
						text: 'Error al enviar el mensaje: ' + error,
						icon: 'error',
						buttonsStyling: false,
						confirmButtonText: 'Ok!',
						customClass: {
							confirmButton: 'btn btn-danger'
						}
					});

				}
			});
		});

		// Eliminar dato
		$('.deleteButton').on('click', function (e) {
			e.preventDefault(); // Prevenir la acción por defecto del enlace

			var container = $(this).closest('.estudiante');
			var id = container.data('id');

			$.ajax({
				url: '/aceel', // URL a la que se enviará la solicitud
				type: 'POST',
				data: { id: id },
				success: function (response) {
					Swal.fire({
						text: "Estudiante Elimando Con Exito",
						icon: "success",
						buttonsStyling: false,
						confirmButtonText: "Ok!",
						customClass: {
							confirmButton: "btn btn-primary"
						}
					})
					container.remove(); // Eliminar el contenedor del DOM
				},
				error: function (xhr, status, error) {
					Swal.fire({
						text: "Error al elimanar Estudiante",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok!",
						customClass: {
							confirmButton: "btn btn-danger"
						}
					});
				}
			});
		});
	});

</script>
<!--begin::Custom Javascript(used by this page)-->
<?php if (strpos($currentUrl, "ai") !== false) { ?>
	<!-- geolocalizacion -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Agregamos SweetAlert2 -->
	<style>
		#map {
			height: 400px;
			width: 100%;
		}

		#mapid {
			height: 400px;
			width: 100%;
		}

		#flashingLight {
			width: 100px;
			height: 90px;
			position: center;
			background-color: rgba(255, 0, 0, 0.5);
			/* Color rojo semi-transparente */
			border-radius: 50%;
			/* Para que sea un círculo */
			animation: flashing 1s infinite;
			box-shadow: 0 0 10px rgba(255, 0, 0, 0.5);
			/* Sombra para resaltar */
		}

		@keyframes flashing {
			0% {
				opacity: 1;
			}

			50% {
				opacity: 0.5;
				transform: scale(1.5);
				/* Escala para efecto de pulso */
			}

			100% {
				opacity: 1;
			}
		}
	</style>
	<?php if (session()->rolnombre == 'Administrador' || session()->rolnombre == 'Conductor') { ?>
		<script>
			var map, marker;
			let timer;

			function initMap() {
				// Centra el mapa en una ubicación predeterminada
				map = L.map('map').setView([-16.5603569, -68.1953074], 15);
				L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
					attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
				}).addTo(map);
			}

			function getLocation() {
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(showPosition, showError, {
						enableHighAccuracy: true, // Habilitar alta precisión
						timeout: 10000,
						maximumAge: 0
					});
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Geolocalización no soportada',
						text: 'La geolocalización no es compatible con este navegador.',
					});
					cancelTracking();
				}
			}

			function showPosition(position) {
				const latitude = position.coords.latitude;
				const longitude = position.coords.longitude;
				const accuracy = position.coords.accuracy; // Precisión en metros

				document.getElementById('latitude').innerText = latitude;
				document.getElementById('longitude').innerText = longitude;
				document.getElementById('accuracy').innerText = accuracy + " metros";

				// Enviar datos al servidor
				const xhr = new XMLHttpRequest();
				xhr.open("POST", "/sgcgg", true);
				xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

				// Manejar la respuesta del servidor
				xhr.onreadystatechange = function () {
					if (xhr.readyState == 4 && xhr.status == 200) {
						console.log(xhr.responseText); // Mostrar la respuesta en la consola
						const response = JSON.parse(xhr.responseText);
					}
				};

				xhr.send("latitude=" + latitude + "&longitude=" + longitude + "&accuracy=" + accuracy);

				// Actualizar marcador en el mapa
				if (marker) {
					marker.setLatLng([latitude, longitude]);
				} else {
					marker = L.marker([latitude, longitude]).addTo(map);
				}
				map.setView([latitude, longitude], 15);
			}

			function showError(error) {
				switch (error.code) {
					case error.PERMISSION_DENIED:
						Swal.fire({
							icon: 'error',
							title: 'Permiso denegado',
							text: 'El usuario ha denegado la solicitud de geolocalización. Por favor, habilite los permisos de ubicación.',
						});
						break;
					case error.POSITION_UNAVAILABLE:
						Swal.fire({
							icon: 'error',
							title: 'Posición no disponible',
							text: 'La información de la ubicación no está disponible.',
						});
						break;
					case error.TIMEOUT:
						Swal.fire({
							icon: 'error',
							title: 'Solicitud caducada',
							text: 'La solicitud de ubicación ha caducado.',
						});
						break;
					case error.UNKNOWN_ERROR:
						Swal.fire({
							icon: 'error',
							title: 'Error desconocido',
							text: 'Se ha producido un error desconocido.',
						});
						break;
				}
				cancelTracking();
			}

			function startTracking() {
				const updateInterval = document.getElementById('updateInterval').value * 1000; // Convertir a milisegundos
				const hours = parseInt(document.getElementById('hours').value);
				const minutes = parseInt(document.getElementById('minutes').value);
				const duration = (hours * 60 + minutes) * 60 * 1000; // Convertir a milisegundos
				// Mostrar la luz intermitente al iniciar el rastreo
				document.getElementById('flashingLight').style.display = 'block';

				// Deshabilitar el botón de seguimiento
				document.getElementById('startTracking').disabled = true;

				// Prevenir la actualización de la página
				window.addEventListener('beforeunload', preventPageUnload);

				getLocation();
				timer = setInterval(getLocation, updateInterval); // Actualizar cada N segundos
				setTimeout(() => {
					clearInterval(timer); // Detener seguimiento después de la duración especificada
					endTracking();
				}, duration);
			}

			function cancelTracking() {
				clearInterval(timer);
				document.getElementById('startTracking').disabled = false;
				window.removeEventListener('beforeunload', preventPageUnload);
			}

			function endTracking() {
				document.getElementById('flashingLight').style.display = 'none'; // Ocultar la luz intermitente
				document.getElementById('startTracking').disabled = false;
				window.removeEventListener('beforeunload', preventPageUnload);
				Swal.fire({
					icon: 'success',
					title: 'Tiempo de rastreo terminado',
					text: '¡El tiempo de rastreo ha finalizado!',
					showConfirmButton: false,
					timer: 2000
				});
			}

			function preventPageUnload(event) {
				const confirmationMessage = "El seguimiento está en progreso. ¿Estás seguro de que deseas salir?";
				event.returnValue = confirmationMessage; // Estándar moderno
				return confirmationMessage; // Compatibilidad con navegadores más antiguos
			}

			function startJourney() {
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(function (position) {
						const latitude = position.coords.latitude;
						const longitude = position.coords.longitude;
						const accuracy = position.coords.accuracy;

						$.ajax({
							url: '/sgciv',
							type: 'POST',
							data: {
								latitude: latitude,
								longitude: longitude,
								accuracy: accuracy
							},
							success: function (response) {
								Swal.fire({
									icon: 'success',
									title: 'Viaje iniciado',
									text: '¡El viaje ha comenzado!',
								});
								startTracking();
								document.getElementById('startJourney').disabled = true;
								document.getElementById('endJourney').disabled = false;
							},
							error: function () {
								Swal.fire({
									icon: 'error',
									title: 'Error',
									text: 'No se pudo iniciar el viaje.',
								});
							}
						});
					}, showError, {
						enableHighAccuracy: true,
						timeout: 10000,
						maximumAge: 0
					});
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Geolocalización no soportada',
						text: 'La geolocalización no es compatible con este navegador.',
					});
				}
			}

			function endJourney() {
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(function (position) {
						const latitude = position.coords.latitude;
						const longitude = position.coords.longitude;
						const accuracy = position.coords.accuracy;

						$.ajax({
							url: '/sgcfv',
							type: 'POST',
							data: {
								latitude: latitude,
								longitude: longitude,
								accuracy: accuracy
							},
							success: function (response) {
								Swal.fire({
									icon: 'success',
									title: 'Viaje finalizado',
									text: '¡El viaje ha terminado!',
								});
								clearInterval(timer);
								document.getElementById('startJourney').disabled = false;
								document.getElementById('endJourney').disabled = true;
								cancelTracking();
								document.getElementById('flashingLight').style.display = 'none'; 
								
							},
							error: function () {
								Swal.fire({
									icon: 'error',
									title: 'Error',
									text: 'No se pudo finalizar el viaje.',
								});
							}
						});
					}, showError, {
						enableHighAccuracy: true,
						timeout: 10000,
						maximumAge: 0
					});
				} else {
					Swal.fire({
						icon: 'error',
						title: 'Geolocalización no soportada',
						text: 'La geolocalización no es compatible con este navegador.',
					});
				}
			}

			window.onload = function () {
				initMap();
				document.getElementById('startTracking').addEventListener('click', startTracking);
				document.getElementById('startJourney').addEventListener('click', startJourney);
				document.getElementById('endJourney').addEventListener('click', endJourney);
			};
		</script>
		<script>
			$(document).ready(function () {
				$('#GuardarRuta').click(function () {
					$.ajax({
						url: '/sggru',
						type: 'POST',
						success: function (response) {
							Swal.fire({
								icon: 'success',
								title: 'Datos Rastreo',
								text: '¡Datos Guardados!',
								showConfirmButton: false,
								timer: 2000
							});
						},
						error: function (xhr, status, error) {
							Swal.fire({
								icon: 'error',
								title: 'Error',
								//text: xhr.responseJSON ? xhr.responseJSON.message : 'Error interno del servidor',
								text: 'Por favor inicie seguimiento o espere hasta que el seguimiento acabe para guardar ruta',
								showConfirmButton: true
							});
						}
					});
				});
			});
		</script>

	<?php } else { ?>
		<script>
			var ubicaciones = [
				<?php foreach ($datosEstudiantePadre as $dato): ?>
					, {
						latitud: <?= $dato['latitud'] ?>,
						longitud: <?= $dato['longitud'] ?>,
						nombre: "<?= $dato['nomconductor'] ?>			 			<?= $dato['apellidoconductor'] ?> ",
						placa: "<?= $dato['placa'] ?>",
						telefono: "<?= $dato['telefono'] ?>"
					},
				<?php endforeach; ?>

			]
			console.log(ubicaciones);
		</script>

		<script>
			$(document).ready(function () {
				var map = L.map('mapid').setView([-16.5000, -68.1500], 13);

				L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
					maxZoom: 19
				}).addTo(map);

				// Función para cargar los marcadores desde el controlador
				function cargarMarcadores() {
					$.ajax({
						url: '/sgcua', // Reemplaza esto por la ruta correcta a tu controlador y método
						type: 'GET',
						success: function (response) {
							if (response && response.latitud && response.longitud) {
								// Si la respuesta tiene datos de latitud y longitud
								console.log(response.latitud);
								L.marker([response.latitud, response.longitud]).addTo(map)
									.bindPopup('Ubicacion Actual del Conductor<br>' + response.nombre + ' ' + response.apellido + '<br>' + 'Telefono: ' + response.telefono + '<br>' + 'Hora Actualizado: ' + response.created_at).openPopup();
							} else {
								Swal.fire({
									icon: 'info',
									title: 'Rastreo finalizado',
									text: 'No hay más ubicaciones disponibles.'
								});
							}
						},
						error: function (xhr, status, error) {
							console.log('Error al cargar los marcadores');
						}
					});
				}
				function cargarMarcadoresHogares() {
					if (ubicaciones.length > 0) {
						ubicaciones.forEach(function (ubicacion) {
							L.marker([ubicacion.latitud, ubicacion.longitud]).addTo(map)
								.bindPopup('<b>Hogar del Estudiante</b> <br>Inf Conductor<br>' + ubicacion.nombre + '<br>Placa: ' + ubicacion.placa + '<br>' + 'Telefono: ' + ubicacion.telefono).openPopup();
						});
					} else {
						Swal.fire({
							icon: 'info',
							title: 'Datos del Hogar NO RECIBIDOS ',
							text: 'No se tiene los datos del hogar del estudiantes verifique la en el registro.'
						});
					}
				}


				// Cargar los marcadores al hacer clic en el botón
				$('#SeguimientoReal').click(function () {
					cargarMarcadores();
					cargarMarcadoresHogares();
				});
			});

		</script>


	<?php } ?>

<?php } elseif (strpos($currentUrl, "acdd") !== false) { ?>

	<!-- js y stilo para el grafico de la torta -->
	<script src="https://code.highcharts.com/maps/highmaps.js"></script>
	<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

	<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
	<script src="https://code.highcharts.com/modules/variable-pie.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>

	<!-- Leaflet y jsPDF JS -->
	<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
	<!-- -------------------------------------------------------------------------------------------- -->
	<style>
		#map {
			height: 400px;
		}

		.card-img-top {
			border-radius: 10px 10px 0 0;
			width: 100%;
			/* Ancho deseado */
			height: 90px;
			/* Alto deseado */
			object-fit: cover;
			/* Ajustar la imagen sin deformarla */
		}
	</style>
	<style>
		.highcharts-figure,
		.highcharts-data-table table {
			min-width: 320px;
			max-width: 800px;
			margin: 1em auto;
		}

		.highcharts-data-table table {
			font-family: Verdana, sans-serif;
			border-collapse: collapse;
			border: 1px solid #ebebeb;
			margin: 10px auto;
			text-align: center;
			width: 100%;
			max-width: 500px;
		}

		.highcharts-data-table caption {
			padding: 1em 0;
			font-size: 1.2em;
			color: #555;
		}

		.highcharts-data-table th {
			font-weight: 600;
			padding: 0.5em;
		}

		.highcharts-data-table td,
		.highcharts-data-table th,
		.highcharts-data-table caption {
			padding: 0.5em;
		}

		.highcharts-data-table thead tr,
		.highcharts-data-table tr:nth-child(even) {
			background: #f8f8f8;
		}

		.highcharts-data-table tr:hover {
			background: #f1f7ff;
		}

		input[type="number"] {
			min-width: 50px;
		}
	</style>
	<script>

		Highcharts.setOptions({
			lang: {
				contextButtonTitle: 'Menú contextual',
				decimalPoint: ',',
				viewFullscreen: 'Ver en pantalla completa',
				downloadJPEG: 'Descargar JPEG',
				downloadPDF: 'Descargar PDF',
				downloadPNG: 'Descargar PNG',
				downloadSVG: 'Descargar SVG',
				drillUpText: 'Volver a {series.name}',
				viewFullscreen: 'Ver en pantalla completa',
				downloadCSV: 'Descargar CSV',
				downloadXLS: 'Descargar XLS',
				viewData: 'Ver tabla de datos',
				loading: 'Cargando...',
				months: [
					'Enero', 'Febrero', 'Marzo', 'Abril',
					'Mayo', 'Junio', 'Julio', 'Agosto',
					'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
				],
				noData: 'No hay datos para mostrar',
				numericSymbols: null,
				printChart: 'Imprimir gráfica',
				resetZoom: 'Restablecer zoom',
				resetZoomTitle: 'Restablecer nivel de zoom 1:1',
				shortMonths: [
					'Ene', 'Feb', 'Mar', 'Abr',
					'May', 'Jun', 'Jul', 'Ago',
					'Sep', 'Oct', 'Nov', 'Dic'
				],
				thousandsSep: '.',
				weekdays: [
					'Domingo', 'Lunes', 'Martes', 'Miércoles',
					'Jueves', 'Viernes', 'Sábado'
				]
			}
		});
		$.ajax({
			url: '/gfdgd',
			dataType: 'json',
			success: function (data) {

				Highcharts.chart('container2', {

					chart: {
						type: 'pie'
					},
					title: {
						text: 'INFORMACION DE USUARIOS'
					},
					tooltip: {
						valueSuffix: '%'
					},
					subtitle: {
						text:
							'Porcentaje de usuario en el sistema'
					},
					plotOptions: {
						series: {
							allowPointSelect: true,
							cursor: 'pointer',
							dataLabels: [{
								enabled: true,
								distance: 20,
								style: {
									fontSize: '12px',
									textOutline: 'none',
									opacity: 0.7
								},
							},
							{
								enabled: true,
								distance: -40,
								format: '{point.percentage:.1f}%',
								style: {
									fontSize: '20px',
									textOutline: 'none',
									opacity: 0.7
								},
								filter: {
									operator: '>',
									property: 'percentage',
									value: 10
								}
							}]
						}
					},
					series: [
						{
							name: 'Porcentaje',
							colorByPoint: true,
							data: data
						}
					]
				});
			},
			error: function () {
				alert('Error al cargar los datos');
			}
		});



	</script>
	<style>
		#container1 {
			height: 300px;
		}

		.highcharts-figure,
		.highcharts-data-table table {
			min-width: 320px;
			max-width: 700px;
			margin: 1em auto;
		}

		.highcharts-data-table table {
			font-family: Verdana, sans-serif;
			border-collapse: collapse;
			border: 1px solid #ebebeb;
			margin: 10px auto;
			text-align: center;
			width: 100%;
			max-width: 500px;
		}

		.highcharts-data-table caption {
			padding: 1em 0;
			font-size: 1.2em;
			color: #555;
		}

		.highcharts-data-table th {
			font-weight: 600;
			padding: 0.5em;
		}

		.highcharts-data-table td,
		.highcharts-data-table th,
		.highcharts-data-table caption {
			padding: 0.5em;
		}

		.highcharts-data-table thead tr,
		.highcharts-data-table tr:nth-child(even) {
			background: #f8f8f8;
		}

		.highcharts-data-table tr:hover {
			background: #f1f7ff;
		}
	</style>
	<script>
		Highcharts.setOptions({
			lang: {
				contextButtonTitle: 'Menú contextual',
				decimalPoint: ',',
				viewFullscreen: 'Ver en pantalla completa',
				downloadJPEG: 'Descargar JPEG',
				downloadPDF: 'Descargar PDF',
				downloadPNG: 'Descargar PNG',
				downloadSVG: 'Descargar SVG',
				drillUpText: 'Volver a {series.name}',
				viewFullscreen: 'Ver en pantalla completa',
				downloadCSV: 'Descargar CSV',
				downloadXLS: 'Descargar XLS',
				viewData: 'Ver tabla de datos',
				loading: 'Cargando...',
				months: [
					'Enero', 'Febrero', 'Marzo', 'Abril',
					'Mayo', 'Junio', 'Julio', 'Agosto',
					'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
				],
				noData: 'No hay datos para mostrar',
				numericSymbols: null,
				printChart: 'Imprimir gráfica',
				resetZoom: 'Restablecer zoom',
				resetZoomTitle: 'Restablecer nivel de zoom 1:1',
				shortMonths: [
					'Ene', 'Feb', 'Mar', 'Abr',
					'May', 'Jun', 'Jul', 'Ago',
					'Sep', 'Oct', 'Nov', 'Dic'
				],
				thousandsSep: '.',
				weekdays: [
					'Domingo', 'Lunes', 'Martes', 'Miércoles',
					'Jueves', 'Viernes', 'Sábado'
				]
			}
		});

		$.ajax({
			url: '/gfdgdg',
			type: 'GET',
			success: function (response) {

				Highcharts.chart('container1', {
					chart: {
						type: 'variablepie'
					},
					title: {
						text: ' Datos Númericos de los Dispositivos y Automoviles.',
						align: 'left'
					},
					tooltip: {
						headerFormat: '',
						pointFormat: '<span style="color:{point.color}">\u25CF</span> <b> ' +
							'{point.name}</b><br/>' +
							'Cantidad: <b>{point.y}</b><br/>'
					},
					plotOptions: {
						variablepie: {
							minPointSize: 10,
							innerSize: '20%',
							zMin: 0,
							dataLabels: {
								enabled: true,
								format: '{point.name}',
								style: {
									fontSize: '12px',
									textOutline: 'none',
									opacity: 0.7
								}
							}
						}
					},
					series: [{
						name: 'countries',
						data: response,
						borderRadius: 5,
						colors: [
							'#4caefe',
							'#3dc3e8',
							'#2dd9db',
							'#1feeaf',
							'#0ff3a0',
							'#00e887',
							'#23e274'
						]
					}]
				});




			},
			error: function () {
				alert('Error al cargar los datos');
			}
		});


	</script>
	<!------------------------------------fin----------------------------------------->
<!-- mapa grafica ubicacion del hogar del estudiante-->
	<script>
		// Inicializar el mapa centrado en La Paz, Bolivia
		var map = L.map('map').setView([-16.5000, -68.1500], 13);

		// Agregar la capa de mapa base
		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			maxZoom: 19
		}).addTo(map);

		// Agregar un marker en La Paz, Bolivia
		// L.marker([-16.5000, -68.1500]).addTo(map)
		// 	.bindPopup('La Paz, Bolivia').openPopup();

		// Cargar los marcadores desde el controlador al cargar la página
		$(document).ready(function () {
			$.ajax({
				url: '/dgcodh', // Ruta al controlador en CodeIgniter
				type: 'GET',
				success: function (response) {
					response.forEach(function (marcador) {
						var marker = L.marker([marcador.lat, marcador.lng]).addTo(map);
						marker.bindPopup(marcador.nombre).openPopup();

						marker.on('mouseover', function (e) {
							var mensajeEstudiante = document.getElementById('mensajeEstudiante');
							mensajeEstudiante.innerHTML = `
																					<p class="card-title fw-bold text-muted text-hover-primary fs-4">DATOS ESTUDIANTE</p>
																					<p class="text-dark-75 fw-semibold fs-5 m-0">FOTO ESTUDIANTE</p>
																					<img src="uploads/Estudiante/${marcador.foto}" class="card-img-top" alt="...">
																							<p class="text-dark-75 fw-semibold fs-5 m-0">Nombre: ${marcador.nombre}</p>
																							<p class="text-dark-75 fw-semibold fs-5 m-0">Curso: ${marcador.curso}</p>
																							<p class="card-title fw-bold text-muted text-hover-primary fs-4">DATOS HOGAR</p>
																							<p class="text-dark-75 fw-semibold fs-5 m-0">Tipo: ${marcador.tipo}</p>
																							<p class="text-dark-75 fw-semibold fs-5 m-0">Descripcion: ${marcador.descripcion}</p>
																							<p class="text-dark-75 fw-semibold fs-5 m-0">Avenida: ${marcador.avenida}</p>
																							<p class="text-dark-75 fw-semibold fs-5 m-0">Puerta: ${marcador.puerta}</p>
																				`;

							mensajeEstudiante.style.display = 'block';
						});

						marker.on('mouseout', function (e) {
							document.getElementById('mensajeEstudiante').style.display = 'none';
						});
						// L.marker([marcador.lat, marcador.lng]).addTo(map)
						// 	.bindPopup(marcador.nombre).openPopup();
					});
				},
				error: function (xhr, status, error) {
					console.log('Error al obtener los datos de los marcadores');
				}
			});
		});


		// Exportar a CSV al hacer clic en el botón
		document.getElementById('export-csv').addEventListener('click', function () {
		});

		// Exportar a Excel al hacer clic en el botón
		document.getElementById('export-excel').addEventListener('click', function () {
		});

		// Función para convertir datos a CSV y descargarlo
		function exportarCSV() {

			$.ajax({
				url: '/dgcoh', // Ruta al controlador en CodeIgniter
				type: 'GET',
				success: function (response) {

					// Convertir los datos JSON a CSV
					var csv = response.map(function (row) {
						return Object.values(row).join(',');
					}).join('\n');

					// Obtener la fecha actual y formatearla
					var date = new Date();
					var day = date.getDate().toString().padStart(2, '0');
					var month = (date.getMonth() + 1).toString().padStart(2, '0'); // Los meses son 0-11
					var year = date.getFullYear();
					var formattedDate = `${day}-${month}-${year}`;

					// Nombre del archivo con la fecha
					var filename = `UbicacionEstudiantes_${formattedDate}.csv`;

					// Crear un blob y descargar el archivo
					var blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
					var url = URL.createObjectURL(blob);
					var link = document.createElement('a');
					link.setAttribute('href', url);
					link.setAttribute('download', filename);
					document.body.appendChild(link);
					link.click();
					document.body.removeChild(link);
				},
				error: function (xhr, status, error) {
					console.log('Error al obtener los datos');
				}
			});

		}

		// Asignar la función al enlace de exportar a CSV
		document.getElementById('export-csv').addEventListener('click', exportarCSV);

		// Función para exportar a Excel
		function exportarExcel() {
			$.ajax({
				url: '/dgcoh', // Ruta al controlador en CodeIgniter
				type: 'GET',
				success: function (response) {
					var wb = XLSX.utils.book_new();
					var ws = XLSX.utils.json_to_sheet(response);
					XLSX.utils.book_append_sheet(wb, ws, 'Datos');
					// Obtener la fecha actual y formatearla
					var date = new Date();
					var day = date.getDate().toString().padStart(2, '0');
					var month = (date.getMonth() + 1).toString().padStart(2, '0'); // Los meses son 0-11
					var year = date.getFullYear();
					var formattedDate = `${day}-${month}-${year}`;

					// Nombre del archivo con la fecha
					var filename = `UbicacionEstudiantes_${formattedDate}.xlsx`;
					XLSX.writeFile(wb, filename);
				},
				error: function (xhr, status, error) {
					console.log('Error al obtener los datos');
				}
			});
		}

		// Asignar la función al enlace de exportar a Excel
		document.getElementById('export-excel').addEventListener('click', exportarExcel);

		// Función para ver el mapa en pantalla completa
		function toggleFullscreen(element) {
			if (!document.fullscreenElement) {
				element.requestFullscreen();
			} else {
				if (document.exitFullscreen) {
					document.exitFullscreen();
				}
			}
		}

		// Asignar la función al botón de pantalla completa
		document.getElementById('toggle-fullscreen').addEventListener('click', function () {
			var mapElement = document.getElementById('map');
			toggleFullscreen(mapElement);
		});
	</script>
	<!------------------------------------fin----------------------------------------->
<!-- Reportes del sistema -->
<script>
    $(document).ready(function(){
        $('#enviar').click(function(e){
            e.preventDefault();
            var automovilId = $('#automovil').val();
            var fechaInicio = $('#fecha_inicio').val();
            var fechaFinal = $('#fecha_final').val();

            var errorMessage = '';
            if (!automovilId) {
                errorMessage += 'Por favor, seleccione un automóvil.<br>';
            }
            if (!fechaInicio) {
                errorMessage += 'Por favor, seleccione una fecha de inicio.<br>';
            }
            if (!fechaFinal) {
                errorMessage += 'Por favor, seleccione una fecha final.<br>';
            }

            if (errorMessage) {
                Swal.fire({
                    icon: 'error',
                    title: 'Campos incompletos',
                    html: errorMessage
                });
            } else {
                var url = '/ecf1?id=' + automovilId + '&fecha_inicio=' + fechaInicio + '&fecha_final=' + fechaFinal;
				window.open(url, '_blank');
			}
        });
    });
    $(document).ready(function(){
        $('#enviar1').click(function(e){
		   e.preventDefault();
		  var fechaInicio = $('#fecha_inicio').val();
		  var fechaFinal = $('#fecha_final').val();
                var url = '/ecf2?fecha_inicio='+ fechaInicio + '&fecha_final=' + fechaFinal;
				window.open(url, '_blank');
		 });
    });
    $(document).ready(function(){
        $('#enviar2').click(function(e){
		   e.preventDefault();
		  var fechaInicio = $('#fecha_inicio').val();
		  var fechaFinal = $('#fecha_final').val();
                var url = '/ecf3?fecha_inicio='+ fechaInicio + '&fecha_final=' + fechaFinal;
				window.open(url, '_blank');
		 });
    });
	$(document).ready(function(){
        $('#enviar3').click(function(e){
		   e.preventDefault();
		        var url = '/ecf4';
				window.open(url, '_blank');
		 });
    });
	$(document).ready(function(){
        $('#enviar4').click(function(e){
            e.preventDefault();
            var automovilId = $('#automovil').val();
            var errorMessage = '';
            if (!automovilId) {
                errorMessage += 'Por favor, seleccione un automóvil.<br>';
            }
            if (errorMessage) {
                Swal.fire({
                    icon: 'error',
                    title: 'Campos incompletos',
                    html: errorMessage
                });
            } else {
                var url = '/ecf5?id=' + automovilId;
				window.open(url, '_blank');
			}
        });
    });
   

	
   </script>






<?php } elseif (strpos($currentUrl, "acec") !== false) { ?>
	<!-- Leaflet y jsPDF JS -->
	<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
	<!-- -------------------------------------------------------------------------------------------- -->
	<style>
		#map {
			height: 400px;
		}

		.card-img-top {
			border-radius: 10px 10px 0 0;
			width: 100%;
			/* Ancho deseado */
			height: 90px;
			/* Alto deseado */
			object-fit: cover;
			/* Ajustar la imagen sin deformarla */
		}
	</style>

	<style>
		#container1 {
			height: 300px;
		}

		.highcharts-figure,
		.highcharts-data-table table {
			min-width: 320px;
			max-width: 700px;
			margin: 1em auto;
		}

		.highcharts-data-table table {
			font-family: Verdana, sans-serif;
			border-collapse: collapse;
			border: 1px solid #ebebeb;
			margin: 10px auto;
			text-align: center;
			width: 100%;
			max-width: 500px;
		}

		.highcharts-data-table caption {
			padding: 1em 0;
			font-size: 1.2em;
			color: #555;
		}

		.highcharts-data-table th {
			font-weight: 600;
			padding: 0.5em;
		}

		.highcharts-data-table td,
		.highcharts-data-table th,
		.highcharts-data-table caption {
			padding: 0.5em;
		}

		.highcharts-data-table thead tr,
		.highcharts-data-table tr:nth-child(even) {
			background: #f8f8f8;
		}

		.highcharts-data-table tr:hover {
			background: #f1f7ff;
		}
	</style>
	<!------------------------------------fin----------------------------------------->
<!-- mapa grafica ubicacion del hogar del estudiante-->
	<script>
		// Inicializar el mapa centrado en La Paz, Bolivia
		var map = L.map('map').setView([-16.5000, -68.1500], 13);

		// Agregar la capa de mapa base
		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			maxZoom: 19
		}).addTo(map);

		// Agregar un marker en La Paz, Bolivia
		// L.marker([-16.5000, -68.1500]).addTo(map)
		// 	.bindPopup('La Paz, Bolivia').openPopup();

		// Cargar los marcadores desde el controlador al cargar la página
		$(document).ready(function () {
			$.ajax({
				url: '/dgcodhec', // Ruta al controlador en CodeIgniter
				type: 'GET',
				success: function (response) {
					response.forEach(function (marcador) {
						var marker = L.marker([marcador.lat, marcador.lng]).addTo(map);
						marker.bindPopup(marcador.nombre).openPopup();

						marker.on('mouseover', function (e) {
							var mensajeEstudiante = document.getElementById('mensajeEstudiante');
							mensajeEstudiante.innerHTML = `
																				<p class="card-title fw-bold text-muted text-hover-primary fs-4">DATOS ESTUDIANTE</p>
																				<p class="text-dark-75 fw-semibold fs-5 m-0">FOTO ESTUDIANTE</p>
																				<img src="uploads/Estudiante/${marcador.foto}" class="card-img-top" alt="${marcador.nombre}">
																						<p class="text-dark-75 fw-semibold fs-5 m-0">Nombre: ${marcador.nombre}</p>
																						<p class="text-dark-75 fw-semibold fs-5 m-0">Curso: ${marcador.curso}</p>
																						<p class="card-title fw-bold text-muted text-hover-primary fs-4">DATOS HOGAR</p>
																						<p class="text-dark-75 fw-semibold fs-5 m-0">Tipo: ${marcador.tipo}</p>
																						<p class="text-dark-75 fw-semibold fs-5 m-0">Descripcion: ${marcador.descripcion}</p>
																						<p class="text-dark-75 fw-semibold fs-5 m-0">Avenida: ${marcador.avenida}</p>
																						<p class="text-dark-75 fw-semibold fs-5 m-0">Puerta: ${marcador.puerta}</p>
																						<p class="card-title fw-bold text-muted text-hover-primary fs-4">DATOS PADRE</p>
																						<p class="text-dark-75 fw-semibold fs-5 m-0">Nombre: ${marcador.padre}</p>
																						<p class="text-dark-75 fw-semibold fs-5 m-0">Telefono: ${marcador.telefono} <span class="badge badge-light-success">${marcador.parentesco}</span> </p>
																			`;

							mensajeEstudiante.style.display = 'block';
						});

						marker.on('mouseout', function (e) {
							document.getElementById('mensajeEstudiante').style.display = 'none';
						});
						// L.marker([marcador.lat, marcador.lng]).addTo(map)
						// 	.bindPopup(marcador.nombre).openPopup();
					});
				},
				error: function (xhr, status, error) {
					console.log('Error al obtener los datos de los marcadores');
				}
			});
		});


		// Función para ver el mapa en pantalla completa
		function toggleFullscreen(element) {
			if (!document.fullscreenElement) {
				element.requestFullscreen();
			} else {
				if (document.exitFullscreen) {
					document.exitFullscreen();
				}
			}
		}

		// Asignar la función al botón de pantalla completa
		document.getElementById('toggle-fullscreen').addEventListener('click', function () {
			var mapElement = document.getElementById('map');
			toggleFullscreen(mapElement);
		});
	</script>
	<!------------------------------------fin----------------------------------------->
<!-- Reportes de problemas -->


































<?php } elseif (strpos($currentUrl, "mcua") !== false) { ?>
	<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js"></script>
	<script>
		var map = L.map('map').setView([-16.2902, -63.5887], 6);

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);

		var lc = L.control.locate({
			position: 'topleft',
			drawCircle: false,
			follow: true,
			setView: 'once',
			keepCurrentZoomLevel: false,
			markerStyle: {
				weight: 1,
				opacity: 0.8,
				fillOpacity: 0.8
			},
			circleStyle: {
				weight: 1,
				clickable: false
			},
			icon: 'fa fa-location-arrow',
			metric: true,
			strings: {
				title: "Mostrar mi ubicación"
			},
			locateOptions: {
				maxZoom: 16,
				enableHighAccuracy: true, // Utilizar alta precisión
				maximumAge: 10000, // Tiempo máximo de caché de la ubicación en milisegundos
				timeout: 10000 // Tiempo máximo para obtener la ubicación en milisegundos
			},
			onLocationError: function (err) {
				alert("No se pudo encontrar la ubicación: " + err.message);
			}
		}).addTo(map);

		lc.stop();

		map.on('locationfound', function (e) {
			var marker = L.marker(e.latlng).addTo(map);
			marker.bindPopup("Ubicación actual");
		});

		map.on('locationerror', function (e) {
			Swal.fire({
				icon: 'error',
				title: 'Error al encontrar la ubicación',
				text: 'No se pudo encontrar la ubicación actual por favor de los permisos',
				confirmButtonText: 'Aceptar'
			});
		});


	</script>
<?php } elseif (strpos($currentUrl, "mcur") !== false) { ?>
	<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js"></script>
	<script>
		var map = L.map('map').setView([-16.2902, -63.5887], 6);

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);

		var lc = L.control.locate({
			position: 'topleft',
			drawCircle: false,
			follow: true,
			setView: 'once',
			keepCurrentZoomLevel: false,
			markerStyle: {
				weight: 1,
				opacity: 0.8,
				fillOpacity: 0.8
			},
			circleStyle: {
				weight: 1,
				clickable: false
			},
			icon: 'fa fa-location-arrow',
			metric: true,
			strings: {
				title: "Mostrar mi ubicación"
			},
			locateOptions: {
				maxZoom: 16,
				enableHighAccuracy: true, // Utilizar alta precisión
				maximumAge: 10000, // Tiempo máximo de caché de la ubicación en milisegundos
				timeout: 10000 // Tiempo máximo para obtener la ubicación en milisegundos
			},
			onLocationError: function (err) {
				alert("No se pudo encontrar la ubicación: " + err.message);
			}
		}).addTo(map);

		lc.stop();

		map.on('locationfound', function (e) {
			var marker = L.marker(e.latlng).addTo(map);
			marker.bindPopup("Ubicación actual");
		});

		map.on('locationerror', function (e) {
			Swal.fire({
				icon: 'error',
				title: 'Error al encontrar la ubicación',
				text: 'No se pudo encontrar la ubicación actual por favor de los permisos',
				confirmButtonText: 'Aceptar'
			});
		});


	</script>
<?php } elseif (strpos($currentUrl, "mcut") !== false) { ?>
	<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js"></script>
	<script>
		var map = L.map('map').setView([-16.2902, -63.5887], 6);

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);

		// Definir los puntos de la línea
		var points = [
			[-16.2902, -63.5887],
			[-16.3, -63.7],
			[-16.4, -63.8],
			[-16.5, -63.9],
			[-16.6, -64],
			[-16.7, -64.1],
			[-16.8, -64.2],
			[-16.9, -64.3]
		];

		// Crear una polilínea con los puntos y ajustar el estilo
		var polyline = L.polyline(points, {
			color: 'blue',  // Color de la línea
			weight: 8,      // Grosor de la línea
			opacity: 0.7,   // Opacidad de la línea
			dashArray: '5, 10' // Patrón de línea punteada
		}).addTo(map);

		// Al acercar el cursor a la polilínea, hacer zoom al área de la línea
		polyline.on('mouseover', function (e) {
			map.fitBounds(polyline.getBounds());
		});

		// Al alejar el cursor de la polilínea, restaurar el zoom
		polyline.on('mouseout', function (e) {
			map.setView([-16.2902, -63.5887], 6);
		});

		// Agregar marcadores al punto inicial y final
		var startMarker = L.marker(points[0]).addTo(map);
		var endMarker = L.marker(points[points.length - 1]).addTo(map);

		// Añadir etiquetas a los marcadores
		startMarker.bindPopup('Inicio');
		endMarker.bindPopup('Fin');


	</script>
<?php } elseif (strpos($currentUrl, "gupv") !== false) { ?>
	<script src="recursos/metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<script>
		//cierre de modal
		document.addEventListener('DOMContentLoaded', function () {
			const closeBtn = document.querySelector('[data-kt-roles-modal-action="close"]');
			if (closeBtn) {
				closeBtn.addEventListener('click', function () {
					const modal = document.querySelector('.modal');
					if (modal) {
						const modalInstance = bootstrap.Modal.getInstance(modal);
						modalInstance.hide();
					}
				});
			}
		});
		//Accion de boton cerrar
		document.addEventListener('DOMContentLoaded', function () {
			const cancelBtn = document.querySelector('[data-kt-roles-modal-action="cancel"]');
			if (cancelBtn) {
				cancelBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.querySelector('.modal');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});
		$(document).ready(function () {
			$('#submitBtn').click(function () {
				const nombreGrupo = $('#nombreGrupo').val();
				const descripcionGrupo = $('#descripcionGrupo').val();
				const administrador = $('#administrador').prop('checked');
				const privilegioAgregar = $('#privilegioAgregar').prop('checked');
				const privilegioModificar = $('#privilegioModificar').prop('checked');
				const privilegioEliminar = $('#privilegioEliminar').prop('checked');
				// Validación de campo nombre  del rol
				const validacion = /^[a-zA-Z0-9\s]+$/;
				if (!validacion.test(nombreGrupo)) {
					$('#nombreError').text('Ingrese nombre que contengan letras y números. Verifique por favor.');
					return;
				}
				// Ocultar mensaje de error
				$('#nombreError').text('');
				//validacion de la descripcion
				if (!validacion.test(descripcionGrupo)) {
					$('#descripcionError').text('Ingrese descripcion que contengan letras y números. Verifique por favor.');
					return;
				}
				// Ocultar mensaje de error
				$('#descripcionError').text('');

				// Validar los ckecked que uno este seleccion
				if (!privilegioAgregar && !privilegioModificar && !privilegioEliminar && !administrador) {
					$('#nombreErrorCkeck').text('Seleccione privilegios. Verifique por favor.');
					return;
				}
				// Ocultar mensaje de error
				$('#nombreErrorCkeck').text('');
				//console.log(privilegioAgregar);
				$.ajax({
					url: '/agudp',
					type: 'POST',
					dataType: 'json',
					data: { nombreGrupo: nombreGrupo, descripcionGrupo: descripcionGrupo, administrador: administrador, privilegioAgregar: privilegioAgregar, privilegioModificar: privilegioModificar, privilegioEliminar: privilegioEliminar },
					success: function (response) {
						if (response.success) {
							Swal.fire({
								text: "Datos enviados correctamente.",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, entendido!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then((result) => {
								if (result.isConfirmed) {
									const modal = document.querySelector('.modal');
									if (modal) {
										const modalInstance = bootstrap.Modal.getInstance(modal);
										modalInstance.hide();
									}
								}
							});
							$('#nombreGrupo').val('');
							$('#descripcionGrupo').val('');
							$('#administrador').prop('checked', false);
							$('#privilegioAgregar').prop('checked', false);
							$('#privilegioModificar').prop('checked', false);
							$('#privilegioEliminar').prop('checked', false);
							recargar_tabla();
						} else {
							Swal.fire({
								text: "ERROR, Por favor veridicar e intentar nuevamente ",
								icon: "error",
								buttonsStyling: !1,
								confirmButtonText: "Aceptar!",
								customClass: { confirmButton: "btn btn-primary" },
							});
							$('#nombreGrupo').val('');
							$('#descripcionGrupo').val('');
							$('#administrador').prop('checked', false);
							$('#privilegioAgregar').prop('checked', false);
							$('#privilegioModificar').prop('checked', false);
							$('#privilegioEliminar').prop('checked', false);
						}
					},
					error: function () {
						Swal.fire({
							text: "Error Fatal, Sistema fuera de servicio intentar mas tarde por favor ",
							icon: "error",
							buttonsStyling: !1,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
						$('#nombreGrupo').val('');
						$('#descripcionGrupo').val('');
						$('#administrador').prop('checked', false);
						$('#privilegioAgregar').prop('checked', false);
						$('#privilegioModificar').prop('checked', false);
						$('#privilegioEliminar').prop('checked', false);
					}
				});
			});
		});
		function recargar_tabla() {
			dt.ajax.reload();
		}
	</script>
	<script>
		//datos a editar
		$(document).ready(function () {
			$('#modificarBtn').click(function () {
				const id = $('#id').val();
				const editNombre = $('#editNombre').val();
				const editDescripcion = $('#editDescripcion').val();
				const administradorEdit = $('#administradorEdit').prop('checked');
				const privilegioAgregarEdit = $('#privilegioAgregarEdit').prop('checked');
				const privilegioModificarEdit = $('#privilegioModificarEdit').prop('checked');
				const privilegioEliminarEdit = $('#privilegioEliminarEdit').prop('checked');
				// Validación de campo nombre  del rol

				const validacion = /^[a-zA-Z0-9\s]+$/;
				if (!validacion.test(editNombre)) {
					$('#editnombreError').text('Ingrese nombre que contengan letras y números. Verifique por favor.');
					return;
				}
				// Ocultar mensaje de error
				$('#editnombreError').text('');
				//validacion de la descripcion
				if (!validacion.test(editDescripcion)) {
					$('#editdescripcionError').text('Ingrese descripcion que contengan letras y números. Verifique por favor.');
					return;
				}
				// Ocultar mensaje de error
				$('#editdescripcionError').text('');

				// Validar los ckecked que uno este seleccion
				if (!privilegioAgregarEdit && !privilegioModificarEdit && !privilegioEliminarEdit && !administradorEdit) {
					$('#editnombreErrorCkeck').text('Seleccione privilegios. Verifique por favor.');
					return;
				}
				// Ocultar mensaje de error
				$('#editnombreErrorCkeck').text('');
				//console.log(privilegioAgregar);
				//console.log(id);
				$.ajax({
					url: '/guce',
					type: 'POST',
					dataType: 'json',
					data: { id: id, editNombre: editNombre, editDescripcion: editDescripcion, administradorEdit: administradorEdit, privilegioAgregarEdit: privilegioAgregarEdit, privilegioModificarEdit: privilegioModificarEdit, privilegioEliminarEdit: privilegioEliminarEdit },
					success: function (response) {
						if (response.success) {
							Swal.fire({
								text: "Datos editados con exito.",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, entendido!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then((result) => {
								if (result.isConfirmed) {
									const modal = document.querySelector('.modal');
									if (modal) {
										$('#editar_modal').modal('hide');
									}
								}
							});
							$('#administradorEdit').prop('checked', false);
							$('#privilegioAgregarEdit').prop('checked', false);
							$('#privilegioModificarEdit').prop('checked', false);
							$('#privilegioEliminarEdit').prop('checked', false);
							recargar_tabla();
						} else {
							Swal.fire({
								text: "ERROR, Por favor veridicar e intentar nuevamente ",
								icon: "error",
								buttonsStyling: !1,
								confirmButtonText: "Aceptar!",
								customClass: { confirmButton: "btn btn-primary" },
							});
							$('#administrador').prop('checked', false);
							$('#privilegioAgregar').prop('checked', false);
							$('#privilegioModificar').prop('checked', false);
							$('#privilegioEliminar').prop('checked', false);
						}
					},
					error: function () {
						Swal.fire({
							text: "Error Fatal, Sistema fuera de servicio intentar mas tarde por favor ",
							icon: "error",
							buttonsStyling: !1,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
						$('#administrador').prop('checked', false);
						$('#privilegioAgregar').prop('checked', false);
						$('#privilegioModificar').prop('checked', false);
						$('#privilegioEliminar').prop('checked', false);
					}
				});
			});
		});

		function recargar_tabla() {
			dt.ajax.reload();
		}

	</script>
	<script>
		$.urlParam = function (name) {
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		var table;
		var dt;
		var filterPayment;
		// Class definition
		var KTDatatablesServerSide = function () {
			// Private functions
			var initDatatable = function () {
				dt = $("#kt_datatable_privilegios").DataTable({
					searchDelay: 500,
					processing: true,
					serverSide: true,
					order: [[1, 'asc']],
					stateSave: true,
					select: {
						style: 'multi',
						selector: 'td:first-child input[type="checkbox"]',
						className: 'row-selected'
					},
					ajax: {
						//hostUrl+"allTipoIndice?c="+$.urlParam('c'),
						url: '/gudp',
						dataSrc: 'data' // La propiedad que contiene los datos en la respuesta JSON
					},
					columns: [
						{
							data: 'nombre',
							render: function (data, type, row) {
								return `
																																																																																																																																				<div class="ms-5">
																																																																																																																																					<a
																																																																																																																																						class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																																																																																																																						data-kt-ecommerce-category-filter="category_name">${data}</a>
																																																																																																																																					<div class="text-muted fs-7 fw-bolder">${row.descripcion}</div>
																																																																																																																																				</div>
																																																																																																																																			`;
							}
						},
						{
							data: null,
							render: function (data, type, row) {
								var privileges = '';
								if (row.administrador == 'true') {
									privileges += '<a class="badge badge-light-primary fs-7 m-1">Administrator</a>';
								}
								if (row.agregar == 'true') {
									privileges += '<a class="badge" style="background-color: rgba(128, 0, 128, 0.5); color: white;" fs-7 m-1>Agregar</a>';
								}
								if (row.modificar == 'true') {
									privileges += '<a class="badge badge-light-success fs-7 m-1">Modificar</a>';
								}
								if (row.eliminar == 'true') {
									privileges += '<a class="badge badge-light-warning fs-7 m-1">Eliminar</a>';
								}
								return '<div class="d-flex">' +
									'<div class="ms-0">' +
									privileges +
									'</div>' +
									'</div>';
							}
						},
						{
							data: 'created_at',
							render: function (data) {
								// Convertir la fecha a un objeto Date
								var date = new Date(data);
								// Obtener el día, mes y año
								var day = date.getDate();
								var month = date.getMonth(); // Se suma 1 porque los meses van de 0 a 11 en JavaScript
								var year = date.getFullYear();
								var monthNames = [
									"Enero", "Febrero", "Marzo",
									"Abril", "Mayo", "Junio", "Julio",
									"Agosto", "Septiembre", "Octubre",
									"Noviembre", "Diciembre"
								];
								// Formatear la fecha como "dd de mes de yyyy"
								return day + ' de ' + monthNames[month] + ' de ' + year;
							}
						},
						{
							data: 'Actions',
							render: function (data, type, row) {
								return `
																					<div class="text-end">
																						<?php if ($editar || $administrador): ?>
																																	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="btn_editar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-nombre="${row.nombre}" data-descripcion="${row.descripcion}">
																																		<i class="fa-regular fa-pen-to-square"></i>
																																	</a>
																						<?php endif; ?>
																						<?php if ($eliminar || $administrador): ?>
																																	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="eliminar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-nombre="${row.nombre}">
																																		<i class="fa-solid fa-trash"></i>
																																	</a>
																						<?php endif; ?>
																					</div>
																				`;
							}
						},
					],
					// columnDefs: [
					//     {
					//         targets: 0,
					//         orderable: false,
					//         render: function (data) {
					//             return `
					//                 <div class="form-check form-check-sm form-check-custom form-check-solid">
					//                     <input class="form-check-input" type="checkbox" value="${data}" />
					//                 </div>`;
					//         }
					//     },
					// ],
					// Add data-filter attribute
					createdRow: function (row, data, dataIndex) {
						$(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
					}
				});
				table = dt.$;
				// Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
				dt.on('draw', function () {
					initToggleToolbar();
					KTMenu.createInstances();
				});

			}
			// Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
			var handleSearchDatatable = function () {
				const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
				filterSearch.addEventListener('keyup', function (e) {
					dt.search(e.target.value).draw();
				});
			}
			// Init toggle toolbar
			var initToggleToolbar = function () {
				// Toggle selected action toolbar
				// Select all checkboxes
				const container = document.querySelector('#kt_datatable_privilegios');
				const checkboxes = container.querySelectorAll('[type="checkbox"]');

				// Select elements
				const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

				// Toggle delete selected toolbar
				checkboxes.forEach(c => {
					// Checkbox on click event
					//console.log()
					c.addEventListener('click', function () {

						setTimeout(function () {
							toggleToolbars();
						}, 50);
					});
				});
			}
			return {
				init: function () {
					initDatatable();
					handleSearchDatatable();
					initToggleToolbar();
				}
			}
		}();
		function recargar_tabla() {
			dt.ajax.reload();
		}
		// On document ready
		KTUtil.onDOMContentLoaded(function () {
			KTDatatablesServerSide.init();
		});


		$(document).on("click", "tbody td #eliminar", function () {
			var el = $(this);
			Swal.fire({
				text: "Está seguro de eliminar el grupo de privilegios " + el.data("nombre"),
				icon: "error",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Si, eliminar!",
				cancelButtonText: "No, eliminar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						data: { "id": el.data('id'), "nombre": el.data('nombre') },
						type: "POST",
						dataType: "json",
						url: '/gucep'
					})
						.done(function (data, textStatus, jqXHR) {

							if (data.success) {

								Swal.fire({
									text: data.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.value) {
									}
								});
							} else {
								Swal.fire({
									text: data.message,
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-danger"
									}
								}).then(function (result) {
									if (result.value) {
										//	console.log("error");
									}
								});
							}

							recargar_tabla();
						})
						.fail(function (jqXHR, textStatus, errorThrown) {

							Swal.fire({
								text: "Ocurrio un Error!",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok!",
								customClass: {
									confirmButton: "btn btn-danger"
								}
							}).then(function (result) {

							});

							recargar_tabla();
						});
				}
			});
		});
		$(document).on("click", "#btn_editar", function () {
			var id = $(this).data('id');
			var nombre = $(this).data('nombre');
			var descripcion = $(this).data('descripcion');
			$('#id').val(id);
			$('#editNombre').val(nombre);
			$('#editDescripcion').val(descripcion); // Limpia el campo Descripción
			$('#editar_modal').modal('show');
		});
		//cerrar modal
		document.addEventListener('DOMContentLoaded', function () {
			const closeBtn = document.querySelector('[data-kt-roles-modal-action="closeModalEdit"]');
			const cancelBtn = document.querySelector('[data-kt-roles-modal-action="cancelModalEdit"]');

			if (closeBtn) {
				closeBtn.addEventListener('click', function () {
					confirmAndCloseModal();
				});
			}

			if (cancelBtn) {
				cancelBtn.addEventListener('click', function () {
					confirmAndCloseModal();
				});
			}

			function confirmAndCloseModal() {
				Swal.fire({
					icon: 'warning',
					title: '¿Estás seguro?',
					text: '¡Los cambios no se guardarán!',
					showCancelButton: true,
					confirmButtonText: 'Sí, descartar cambios',
					cancelButtonText: 'Cancelar'
				}).then((result) => {
					if (result.isConfirmed) {
						const modal = document.querySelector('.modal');
						if (modal) {
							$('#editar_modal').modal('hide');
						}
					}
				});
			}
		});
	</script>
<?php } elseif (strpos($currentUrl, "gurv") !== false) { ?>
	<script src="recursos/metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<script>
		//cierre de modal
		document.addEventListener('DOMContentLoaded', function () {
			const closeModalBtn = document.getElementById('kt_modal_edit_rol_close');
			const cancelarModalBtn = document.getElementById('kt_modal_edit_rol_calcelar');
			if (closeModalBtn) {
				closeModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_edit_rol');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_edit_rol');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});
		document.addEventListener('DOMContentLoaded', function () {
			const closeModalBtn = document.getElementById('kt_modal_rol_close');
			const cancelarModalBtn = document.getElementById('kt_modal_rol_calcelar');
			if (closeModalBtn) {
				closeModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_add_customer');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_add_customer');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});
		$(document).ready(function () {
			$('#submitBtnRol').click(function () {
				const nombreRol = $('#nombreRol').val();
				const descripcionRol = $('#descriptionRol').val();
				const grupoPrivilegio = $('select[name="country"]').val();
				// Validación de campo nombre  del rol
				const validacion = /^[a-zA-Z0-9\s]+$/;
				if (!validacion.test(nombreRol)) {
					$('#nombreRolError').text('Seleccione rol.');
					return;
				}
				// Ocultar mensaje de error
				$('#nombreRolError').text('');
				//validacion de la descripcion
				if (!validacion.test(descripcionRol)) {
					$('#descriptionRolError').text('Ingrese descripcion que contengan letras y números. Verifique por favor.');
					return;
				}
				// Ocultar mensaje de error
				$('#descriptionRolError').text('');

				if (!grupoPrivilegio) {
					$('#grupoRolError').text('Seleccione un grupo de privilegio.');
					return;
				}
				// Ocultar mensaje de error
				$('#grupoRolError').text('');
				//console.log(grupoPrivilegio);
				$.ajax({
					url: '/gucar',
					type: 'POST',
					dataType: 'json',
					data: { nombreRol: nombreRol, descripcionRol: descripcionRol, grupoPrivilegio: grupoPrivilegio },
					success: function (response) {
						if (response.success) {
							Swal.fire({
								text: "Datos enviados correctamente.",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, entendido!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then((result) => {
								if (result.isConfirmed) {
									const modal = document.querySelector('.modal');
									if (modal) {
										const modalInstance = bootstrap.Modal.getInstance(modal);
										modalInstance.hide();
									}
								}
							});

							$('#descriptionRol').val('');
							document.querySelector('select[name="country"]').selectedIndex = 0;
							recargar_tabla();
						} else {
							Swal.fire({
								text: "ERROR, Por favor veridicar e intentar nuevamente ",
								icon: "error",
								buttonsStyling: !1,
								confirmButtonText: "Aceptar!",
								customClass: { confirmButton: "btn btn-primary" },
							});

							$('#descriptionRol').val('');
							$('select[name="country"]').val('');
						}
					},
					error: function () {
						Swal.fire({
							text: "Error Fatal, Sistema fuera de servicio intentar mas tarde por favor ",
							icon: "error",
							buttonsStyling: !1,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});

						$('#descriptionRol').val('');
						$('select[name="country"]').val('');
					}
				});
			});
		});
		function recargar_tabla() {
			dt.ajax.reload();
		}
	</script>
	<script>
		//datos a editar
		$(document).ready(function () {
			$('#modificarBtnRol').click(function () {
				const id = $('#id').val();
				const editNombreRol = $('select[name="nombreRolEdit"]').val();

				const editDescripcionRol = $('#descriptionRolEdit').val();
				const editGrupoPrivilegio = $('select[name="grupoedit"]').val();
				// Validación de campo nombre  del rol
				const validacion = /^[a-zA-Z0-9\s]+$/;
				if (!validacion.test(editNombreRol)) {
					$('#nombreEditRolError').text('Ingrese nombre que contengan letras y números. Verifique por favor.');
					return;
				}
				// Ocultar mensaje de error
				$('#nombreEditRolError').text('');
				if (!validacion.test(editDescripcionRol)) {
					$('#descripcionEditRolError').text('Ingrese nombre que contengan letras y números. Verifique por favor.');
					return;
				}
				// Ocultar mensaje de error
				$('#descripcionEditRolError').text('');
				if (!validacion.test(editGrupoPrivilegio)) {
					$('#grupoEditRolError').text('Ingrese nombre que contengan letras y números. Verifique por favor.');
					return;
				}
				// Ocultar mensaje de error
				$('#grupoEditRolError').text('');


				//console.log(grupoPrivilegio);
				$.ajax({
					url: '/gucedr',
					type: 'POST',
					dataType: 'json',
					data: { id: id, editNombreRol: editNombreRol, editDescripcionRol: editDescripcionRol, editGrupoPrivilegio: editGrupoPrivilegio },
					success: function (response) {
						if (response.success) {
							Swal.fire({
								text: "Datos editados con exito.",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, entendido!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then((result) => {
								if (result.isConfirmed) {
									const modal = document.querySelector('.modal');
									if (modal) {
										$('#kt_modal_edit_rol').modal('hide');
									}
								}
							});
							$('#administradorEdit').prop('checked', false);
							$('#privilegioAgregarEdit').prop('checked', false);
							$('#privilegioModificarEdit').prop('checked', false);
							$('#privilegioEliminarEdit').prop('checked', false);
							recargar_tabla();
						} else {
							Swal.fire({
								text: "ERROR, Por favor veridicar e intentar nuevamente ",
								icon: "error",
								buttonsStyling: !1,
								confirmButtonText: "Aceptar!",
								customClass: { confirmButton: "btn btn-primary" },
							});
							$('#administrador').prop('checked', false);
							$('#privilegioAgregar').prop('checked', false);
							$('#privilegioModificar').prop('checked', false);
							$('#privilegioEliminar').prop('checked', false);
						}
					},
					error: function () {
						Swal.fire({
							text: "Error Fatal, Sistema fuera de servicio intentar mas tarde por favor ",
							icon: "error",
							buttonsStyling: !1,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
						$('#administrador').prop('checked', false);
						$('#privilegioAgregar').prop('checked', false);
						$('#privilegioModificar').prop('checked', false);
						$('#privilegioEliminar').prop('checked', false);
					}
				});
			});
		});

		function recargar_tabla() {
			dt.ajax.reload();
		}

	</script>
	<!-- script para listar datos , para eliminar y llena los datos para modificar  -->
	<script>
		$.urlParam = function (name) {
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		var table;
		var dt;
		var filterPayment;
		// Class definition
		var KTDatatablesServerSide = function () {
			// Private functions
			var initDatatable = function () {
				dt = $("#kt_datatable_rol").DataTable({
					searchDelay: 500,
					processing: true,
					serverSide: true,
					order: [[1, 'asc']],
					stateSave: true,
					select: {
						style: 'multi',
						selector: 'td:first-child input[type="checkbox"]',
						className: 'row-selected'
					},
					ajax: {
						//hostUrl+"allTipoIndice?c="+$.urlParam('c'),
						url: '/gucdrv',
						dataSrc: 'data' // La propiedad que contiene los datos en la respuesta JSON
					},
					columns: [
						{
							data: 'nombre',
							render: function (data, type, row) {
								return `
																																																																																																																																				<div class="ms-5">
																																																																																																																																					<a 
																																																																																																																																						class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																																																																																																																						data-kt-ecommerce-category-filter="category_name">${data}</a>
																																																																																																																																					<div class="text-muted fs-7 fw-bolder">${row.descripcion}</div>
																																																																																																																																				</div>
																																																																																																																																			`;
							}
						},
						{
							data: 'grupo_privilegio',
							render: function (data, type, row) {
								return `<div class="d-flex">
																																																																																																																																		<div class="ms-0">
																																																																																																																																		<a class="badge badge-light-primary fs-7 m-1">${data}</a>
																																																																																																																																		</div>
																																																																																																																																		</div>`;
							}
						},
						{
							data: 'created_at',
							render: function (data) {
								// Convertir la fecha a un objeto Date
								var date = new Date(data);
								// Obtener el día, mes y año
								var day = date.getDate();
								var month = date.getMonth(); // Se suma 1 porque los meses van de 0 a 11 en JavaScript
								var year = date.getFullYear();
								var monthNames = [
									"Enero", "Febrero", "Marzo",
									"Abril", "Mayo", "Junio", "Julio",
									"Agosto", "Septiembre", "Octubre",
									"Noviembre", "Diciembre"
								];
								// Formatear la fecha como "dd de mes de yyyy"
								return day + ' de ' + monthNames[month] + ' de ' + year;
							}
						},
						{
							data: 'Actions',
							render: function (data, type, row) {
								return `
																							<div class="text-end">
																							<?php if ($editar || $administrador): ?>
																																			<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="btn_editar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-nombre="${row.nombre}" data-descripcion="${row.descripcion}" data-privilegio="${row.grupo_privilegio}">
																																				<i class="fa-regular fa-pen-to-square"></i>
																																			</a>
																								<?php endif; ?>
																								<?php if ($eliminar || $administrador): ?>
																																			<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="eliminar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-nombre="${row.nombre}">
																																				<i class="fa-solid fa-trash"></i>
																																			</a>
																								<?php endif; ?>
																							</div>
																						`;
							}
						},
					],
					// columnDefs: [
					//     {
					//         targets: 0,
					//         orderable: false,
					//         render: function (data) {
					//             return `
					//                 <div class="form-check form-check-sm form-check-custom form-check-solid">
					//                     <input class="form-check-input" type="checkbox" value="${data}" />
					//                 </div>`;
					//         }
					//     },
					// ],
					// Add data-filter attribute
					createdRow: function (row, data, dataIndex) {
						$(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
					}
				});
				table = dt.$;
				// Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
				dt.on('draw', function () {
					initToggleToolbar();
					KTMenu.createInstances();
				});

			}
			// Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
			var handleSearchDatatable = function () {
				const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
				filterSearch.addEventListener('keyup', function (e) {
					dt.search(e.target.value).draw();
				});
			}
			// Init toggle toolbar
			var initToggleToolbar = function () {
				// Toggle selected action toolbar
				// Select all checkboxes
				const container = document.querySelector('#kt_datatable_rol');
				const checkboxes = container.querySelectorAll('[type="checkbox"]');

				// Select elements
				const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

				// Toggle delete selected toolbar
				checkboxes.forEach(c => {
					// Checkbox on click event
					//console.log()
					c.addEventListener('click', function () {

						setTimeout(function () {
							toggleToolbars();
						}, 50);
					});
				});
			}
			return {
				init: function () {
					initDatatable();
					handleSearchDatatable();
					initToggleToolbar();
				}
			}
		}();
		function recargar_tabla() {
			dt.ajax.reload();
		}
		// On document ready
		KTUtil.onDOMContentLoaded(function () {
			KTDatatablesServerSide.init();
		});

		$(document).on("click", "tbody td #eliminar", function () {
			var el = $(this);
			Swal.fire({
				text: "Está seguro de eliminar el rol de nombre :" + el.data("nombre"),
				icon: "error",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Si, eliminar!",
				cancelButtonText: "No, eliminar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						data: { "id": el.data('id'), "nombre": el.data('nombre') },
						type: "POST",
						dataType: "json",
						url: '/gucer'
					})
						.done(function (data, textStatus, jqXHR) {

							if (data.success) {

								Swal.fire({
									text: data.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.value) {
									}
								});
							} else {
								Swal.fire({
									text: data.message,
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-danger"
									}
								}).then(function (result) {
									if (result.value) {
										//	console.log("error");
									}
								});
							}

							recargar_tabla();
						})
						.fail(function (jqXHR, textStatus, errorThrown) {

							Swal.fire({
								text: "Ocurrio un Error!",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok!",
								customClass: {
									confirmButton: "btn btn-danger"
								}
							}).then(function (result) {

							});

							recargar_tabla();
						});
				}
			});
		});
		$(document).on("click", "#btn_editar", function () {
			var id = $(this).data('id');
			var nombre = $(this).data('nombre');
			var descripcion = $(this).data('descripcion');
			$('#id').val(id);
			$('#nombreRolEdit').val(nombre);
			$('#descriptionRolEdit').val(descripcion);
			$('#kt_modal_edit_rol').modal('show');
		});

	</script>
<?php } elseif (strpos($currentUrl, "gucev") !== false) { ?>
	<script src="recursos/metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
	<script>
		$(document).ready(function () {
			lightbox.option({
				'resizeDuration': 100,
				'wrapAround': true
			});
		});

	</script>

	<!--control de menu-->
	<script>
		function mostrarContenido(id) {
			// Ocultar todos los contenidos
			document.getElementById('sectorTabla').style.display = 'none';
			document.getElementById('agregarEstudiante').style.display = 'none';
			document.getElementById('hogar').style.display = 'none';

			// Mostrar el contenido correspondiente al id
			document.getElementById(id).style.display = 'block';
		}

		// Mostrar por defecto el contenido de lista
		mostrarContenido('hogar');

	</script>
	<!-- validacion de campos-->
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			document.querySelectorAll('.validar').forEach(function (input) {
				input.addEventListener('input', function () {
					const valor = this.value.trim();
					const validacion = new RegExp(this.getAttribute('data-validacion'));
					const mensaje = this.getAttribute('data-mensaje');

					if (!validacion.test(valor)) {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'No Ingrese caracteres que no corresponden al campo. Verifique por favor.',
							customClass: {
								confirmButton: 'btn btn-primary' // Agrega la clase 'btn btn-success' al botón de confirmación
							}
						});

						this.value = '';
					}
				});
			});
		});
	</script>
	<!-- agregar datos estudiante-->
	<script>

		$('#submitEstudiante').click(function () {
			// Obtener la imagen seleccionad estudiante
			var fileInputAutomovil = $('#avatarEstudiante')[0];
			var fileAutomovil = fileInputAutomovil.files[0];
			//validacion de foto
			if (!fileAutomovil) {
				$('#avatarError').text('Seleccione una imagen del estudiante.');
				return;
			}
			$('#avatarError').text('');
			// validar llenado obligatorio
			const nombre = $('#nombre').val();
			const apellido = $('#apellido').val();
			const ci = $('#ci').val();
			const telefono = $('#telefono').val();
			const edad = $('#edad').val();
			const genero = $('#genero').val();
			const curso = $('#curso').val();
			const fechainscripcion = $('#fechainscripcion').val();
			const fechainscripcionFormat = fechainscripcion.split('/').reverse().join('-');
			const fechanacimiento = $('#fechanacimiento').val();
			const fechanacimientoFormat = fechanacimiento.split('/').reverse().join('-');
			const tutor = $('#tutor').val();
			const automovil = $('#automovil').val();
			const rfid = $('#rfid').val();
			const codigo = $('#codigo').val();
			//para ubicacion
			const tipo = $('#tipo').val();
			const descripcion = $('#descripcion').val();
			const avenida = $('#avenida').val();
			const puerta = $('#puerta').val();
			const latitud = $('#latitud').val();
			const longitud = $('#longitud').val();


			// Validar que el archivo seleccionado sea una imagen
			if (!['image/png', 'image/jpeg', 'image/jpg'].includes(fileAutomovil.type)) {
				Swal.fire({
					text: "El archivo subido del estudiante debe ser una imagen (PNG, JPEG).",
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: "Aceptar",
					customClass: { confirmButton: "btn btn-primary" },
				});
				return;
			}

			if (nombre.trim() === '') {
				$('#nombreError').text('Por favor ingrese los nombres');
				return;
			}
			// Ocultar mensaje de error
			$('#nombreError').text('');

			if (apellido.trim() === '') {
				$('#apellidoError').text('Por favor ingrese los apellidos');
				return;
			}
			// Ocultar mensaje de error
			$('#apellidoError').text('');
			//////////////////
			if (!ci) {
				$('#ciError').text('Por favor ingrese la cedula de identidad');
				return;
			}
			$('#ciError').text('');
			//////////////////
			if (telefono.trim() === '') {
				$('#telefonoError').text('Por favor telefono si no fuera el caso dar un valor 0');
				return;
			}
			// Ocultar mensaje de error
			$('#telefonoError').text('');
			//////////////////
			if (edad.trim() === '') {
				$('#edadError').text('Por favor ingrese la edad del estudiante');
				return;
			}
			// Ocultar mensaje de error
			$('#edadError').text('');
			//////////////////
			if (genero.trim() === '') {
				$('#generoError').text('Por favor seleccione genero');
				return;
			}
			// Ocultar mensaje de error
			$('#generoError').text('');
			//////////////////
			if (curso.trim() === '') {
				$('#cursoError').text('Por favor ingrese curso del estudiante');
				return;
			}
			// Ocultar mensaje de error
			$('#cursoError').text('');
			//////////////////
			if (fechainscripcion.trim() === '') {
				$('#fechainscripcionError').text('Por favor seleccione fecha');
				return;
			}
			// Ocultar mensaje de error
			$('#fechainscripcionError').text('');
			//////////////////
			if (fechanacimiento.trim() === '') {
				$('#fechanacimientoError').text('Por favor seleccione fecha');
				return;
			}
			// Ocultar mensaje de error
			$('#fechanacimientoError').text('');

			if (tutor.trim() === '0') {
				$('#tutorError').text('Por favor seleccione uno');
				return;
			}
			// Ocultar mensaje de error
			$('#tutorError').text('');
			if (automovil.trim() === '') {
				$('#automovilError').text('Por favor seleccione la placa del automovil');
				return;
			}
			// Ocultar mensaje de error
			$('#automovilError').text('');

			if (rfid.trim() === '') {
				$('#rfidError').text('Por favor seleccione el dispositivo');
				return;
			}
			// Ocultar mensaje de error
			$('#rfidError').text('');

			if (codigo.trim() === '') {
				$('#codigoError').text('Por favor ingrese codigo');
				return;
			}
			// Ocultar mensaje de error
			$('#codigoError').text('');

			if (tipo === '' || descripcion === '' || avenida === '' || puerta === '' || latitud === '' || longitud === '') {
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: 'Por favor llene todos los datos de la seccion hogar',
				});
				return;
			}
			// Crear un objeto FormData y agregar la imagen seleccionada
			var formData = new FormData();
			formData.append('avatarestudiante', fileAutomovil);
			formData.append('nombre', nombre);
			formData.append('apellido', apellido);
			formData.append('ci', ci);
			formData.append('telefono', telefono);
			formData.append('edad', edad);
			formData.append('genero', genero);
			formData.append('curso', curso);
			formData.append('fechainscripcion', fechainscripcionFormat);
			formData.append('fechanacimiento', fechanacimientoFormat);
			formData.append('tutor', tutor);
			formData.append('automovil', automovil);
			formData.append('rfid', rfid);
			formData.append('codigo', codigo);
			formData.append('tipo', tipo);
			formData.append('descripcion', descripcion);
			formData.append('avenida', avenida);
			formData.append('puerta', puerta);
			formData.append('latitud', latitud);
			formData.append('longitud', longitud);

			console.log(formData);
			// Enviar la imagen y otros datos al controlador mediante AJAX
			$.ajax({
				url: '/gucaes',
				type: 'POST',
				dataType: 'json',
				data: formData,
				processData: false,
				contentType: false,
				success: function (response) {
					if (response.success) {
						// Tu código de éxito
						console.log(response);
						Swal.fire({
							text: "Datos enviados correctamente.",
							icon: "success",
							buttonsStyling: false,
							confirmButtonText: "Ok, entendido!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						}).then((result) => {
							if (result.isConfirmed) {
								const modal = document.querySelector('.modal');
								if (modal) {
									const modalInstance = bootstrap.Modal.getInstance(modal);
									modalInstance.hide();
								}
							}
						});
						limpiarAutomovil();
						recargar_tabla();
					} else {
						// Tu código de error
						Swal.fire({
							text: "ERROR, Por favor verifique e intente nuevamente ",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
						limpiarAutomovil();
					}
				},
				error: function () {
					// Tu código de error
					Swal.fire({
						text: "Error Fatal, Sistema fuera de servicio, intentar más tarde por favor ",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Aceptar!",
						customClass: { confirmButton: "btn btn-primary" },
					});
					limpiarAutomovil();
				}
			});
		});


		function limpiarAutomovil() {
			// Limpiar los campos del formulario después de enviar
			$('#nombre').val('');
			$('#apellido').val('');
			$('#ci').val('');
			$('#telefono').val('');
			$('#edad').val('');
			$('#genero').val('');
			$('#curso').val('');
			$('#fechainscripcion').val('');
			$('#fechanacimiento').val('');
			$('#tutor').val('');
			$('#automovil').val('');
			$('#rfid').val('');
			$('#codigo').val('');
			$('#tipo').val('');
			$('#descripcion').val('');
			$('#avenida').val('');
			$('#puerta').val('');
			$('#latitud').val('');
			$('#longitud').val('');
			// Limpiar el campo de la foto
			$('#avatarEstudiante').val('');
			// Limpiar mensajes de error
			$('#avatarError').text('');

		}
		function recargar_tabla() {
			dt.ajax.reload();
		}
	</script>
	<!-- script para listar datos , para eliminar y llena los datos para modificar   -->
	<script>
		$.urlParam = function (name) {
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		var table;
		var dt;
		var filterPayment;
		// Class definition
		var KTDatatablesServerSide = function () {
			// Private functions
			var initDatatable = function () {
				dt = $("#kt_datatable_rol").DataTable({
					searchDelay: 500,
					processing: true,
					serverSide: true,
					order: [[1, 'asc']],
					stateSave: true,
					select: {
						style: 'multi',
						selector: 'td:first-child input[type="checkbox"]',
						className: 'row-selected'
					},
					ajax: {
						//hostUrl+"allTipoIndice?c="+$.urlParam('c'),
						url: '/gucdev',
						dataSrc: 'data' // La propiedad que contiene los datos en la respuesta JSON
					},
					columns: [
						{
							data: 'imagenestudiante',
							render: function (data, type, row) {
								let badgeClass = row.genero === 'M' ? 'badge-light-primary' : 'badge-light-danger';
								let badgeText = row.genero === 'M' ? 'Masculino' : 'Femenino';

								return `
																																																																			<div class="d-flex align-items-center">
																																																																				<div class="symbol symbol-45px me-5">
																																																																					<a href="uploads/Estudiante/${data}" data-lightbox="gallery" data-title="Estudiante: ${row.nombre} ${row.apellido} " class="lightbox-link">
																																																																						<img src="uploads/Estudiante/${data}" alt="" style="max-width: 45px; max-height: 45px; position:align-items-center ">
																																																																					</a>
																																																																				</div>
																																																																				<div class="d-flex justify-content-start flex-column">
																																																																					<a  class="text-dark fw-bold text-hover-primary fs-6">Nombre: ${row.nombre}</a>
																																																																					<span class="text-muted fw-semibold text-muted d-block fs-7">Apellido: ${row.apellido}</span>
																																																																					<span class="text-dark fw-bold text-hover-primary d-block fs-6">
																																																																					<a class="badge ${badgeClass} fs-7 m-1">${badgeText}</a>
																																																																					</span>
																																																																					<span class="text-dark fw-bold text-hover-primary d-block fs-6">
																																																																					<a class="badge badge-light-primary fs-7 m-1">Codigo: ${row.codigoestudiante}</a>
																																																																					</span>
																																																																				</div>
																																																																			</div>
																																																																			`;
							}
						},
						{
							data: 'ci',
							render: function (data, type, row) {
								return `
																																																																				<a class="text-dark fw-bold text-hover-primary d-block fs-6">Nro. C.I: ${data}</a>
																																																																				<span class="text-muted fw-semibold text-muted d-block fs-7">Telefono: ${row.telefono}</span>
																																																																				<span class="text-muted fw-semibold text-muted d-block fs-7">Edad: ${row.edad}</span>																																									
																																																																			`;
							}
						},
						{
							data: 'curso',
							render: function (data, type, row) {
								return `
																																																																															<a class="text-dark fw-bold text-hover-primary d-block fs-6">Curso: ${data}</a>
																																																																															<span class="text-muted fw-semibold text-muted d-block fs-7">Fecha Inscripcion: ${row.fechainscripcion}</span>
																																																																															<span class="text-muted fw-semibold text-muted d-block fs-7">Fecha Nacimiento: ${row.fechanacimiento}</span>
																																																											
																																																																										`;
							}
						},
						{
							data: 'nombretutor',
							render: function (data, type, row) {
								let badgeClass = data !== null ? 'badge-light-primary' : 'badge-light-danger';
								let badgeText = data !== null ? data + row.apellidopadre : 'Sin Dato';

								return `
																									<div class="d-flex">
																										<div class="ms-0">
																										<span class="text-dark fw-bold text-hover-primary d-block fs-6">
																										Padre: <a class="badge ${badgeClass} fs-7 m-1">${data} ${row.apellidotutor}</a>
																										</span>
																										</div>
																									</div>
														
																									`;
							}
						},
						{
							data: 'placa',
							render: function (data, type, row) {
								return `
																																																																															<a class="text-dark fw-bold text-hover-primary d-block fs-6">Nombre: ${row.nombreconductor} ${row.apellidoconductor}</a>
																																																																															<span class="text-muted fw-semibold text-muted d-block fs-7">Placa: ${data}</span>
																																																																															<span class="text-muted fw-semibold text-muted d-block fs-7">Telefono: ${row.telefonoconductor}</span>																																																				
																																																																										`;
							}
						},
						{
							data: 'created_at',
							render: function (data) {
								// Convertir la fecha a un objeto Date
								var date = new Date(data);
								// Obtener el día, mes y año
								var day = date.getDate();
								var month = date.getMonth(); // Se suma 1 porque los meses van de 0 a 11 en JavaScript
								var year = date.getFullYear();
								var monthNames = [
									"Enero", "Febrero", "Marzo",
									"Abril", "Mayo", "Junio", "Julio",
									"Agosto", "Septiembre", "Octubre",
									"Noviembre", "Diciembre"
								];
								// Formatear la fecha como "dd de mes de yyyy"
								return day + ' de ' + monthNames[month] + ' de ' + year;
							}
						},
						{
							data: 'Actions',
							render: function (data, type, row) {
								return `
																		<div class="text-end">
																		<?php if ($eliminar || $administrador): ?>
																													<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="eliminar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-nombre="${row.nombre} ${row.apellido}">
																														<i class="fa-solid fa-trash"></i>
																													</a>
																		<?php endif; ?>
																		</div>
																	`;
							}
						},
					],
					// columnDefs: [
					//     {
					//         targets: 0,
					//         orderable: false,
					//         render: function (data) {
					//             return `
					//                 <div class="form-check form-check-sm form-check-custom form-check-solid">
					//                     <input class="form-check-input" type="checkbox" value="${data}" />
					//                 </div>`;
					//         }
					//     },
					// ],
					// Add data-filter attribute
					createdRow: function (row, data, dataIndex) {
						$(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
					}
				});
				table = dt.$;
				// Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
				dt.on('draw', function () {
					initToggleToolbar();
					KTMenu.createInstances();
				});

			}
			// Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
			var handleSearchDatatable = function () {
				const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
				filterSearch.addEventListener('keyup', function (e) {
					dt.search(e.target.value).draw();
				});
			}
			// Init toggle toolbar
			var initToggleToolbar = function () {
				// Toggle selected action toolbar
				// Select all checkboxes
				const container = document.querySelector('#kt_datatable_rol');
				const checkboxes = container.querySelectorAll('[type="checkbox"]');

				// Select elements
				const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

				// Toggle delete selected toolbar
				checkboxes.forEach(c => {
					// Checkbox on click event
					//console.log()
					c.addEventListener('click', function () {

						setTimeout(function () {
							toggleToolbars();
						}, 50);
					});
				});
			}
			return {
				init: function () {
					initDatatable();
					handleSearchDatatable();
					initToggleToolbar();
				}
			}
		}();
		function recargar_tabla() {
			dt.ajax.reload();
		}
		// On document ready
		KTUtil.onDOMContentLoaded(function () {
			KTDatatablesServerSide.init();
		});

		$(document).on("click", "tbody td #eliminar", function () {
			var el = $(this);
			Swal.fire({
				text: "Está seguro de eliminar al estudiante :" + el.data("nombre"),
				icon: "error",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Si, eliminar!",
				cancelButtonText: "No, eliminar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						data: { "id": el.data('id'), "nombre": el.data('nombre') },
						type: "POST",
						dataType: "json",
						url: '/gucee'
					})
						.done(function (data, textStatus, jqXHR) {

							if (data.success) {

								Swal.fire({
									text: data.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.value) {
									}
								});
							} else {
								Swal.fire({
									text: data.message,
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-danger"
									}
								}).then(function (result) {
									if (result.value) {
										//	console.log("error");
									}
								});
							}

							recargar_tabla();
						})
						.fail(function (jqXHR, textStatus, errorThrown) {

							Swal.fire({
								text: "Ocurrio un Error!",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok!",
								customClass: {
									confirmButton: "btn btn-danger"
								}
							}).then(function (result) {

							});

							recargar_tabla();
						});
				}
			});
		});

	</script>
	<!--manejo del mapa en el sector hogar-->
	<script>
		var map = L.map('map', {
			zoomControl: false // Desactivar el control de zoom predeterminado
		}).setView([-16.55789107367668, -68.19129840217435], 15);

		L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);

		var marker = L.marker([-16.55789107367668, -68.19129840217435], { draggable: true }).addTo(map);

		var popup = L.popup();

		function onMapClick(e) {
			marker.setLatLng(e.latlng);
			popup
				.setLatLng(e.latlng)
				.setContent("Las coordenadas de la ubicación seleccionada son: " + e.latlng.toString())
				.openOn(map);

			// Mostrar una alerta con SweetAlert2
			Swal.fire({
				icon: 'info',
				title: 'Ubicación seleccionada',
				html: 'Latitud: ' + e.latlng.lat + '<br>Longitud: ' + e.latlng.lng,
				confirmButtonText: 'Aceptar'
			});

			// Colocar los datos de latitud y longitud en los campos de entrada
			document.getElementById('latitud').value = e.latlng.lat;
			document.getElementById('longitud').value = e.latlng.lng;
		}

		map.on('click', onMapClick);

	</script>

<?php } elseif (strpos($currentUrl, "gucpv") !== false) { ?>
	<script src="recursos/metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>

	<!--Validacion de campos e ingreso de texto-->
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			document.querySelectorAll('.validar').forEach(function (input) {
				input.addEventListener('input', function () {
					const valor = this.value.trim();
					const validacion = new RegExp(this.getAttribute('data-validacion'));
					const mensaje = this.getAttribute('data-mensaje');

					if (!validacion.test(valor)) {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'No Ingrese caracteres que no corresponden al campo. Verifique por favor.',
							customClass: {
								confirmButton: 'btn btn-primary' // Agrega la clase 'btn btn-success' al botón de confirmación
							}
						});

						this.value = '';
					}
				});
			});
		});

	</script>
	<!--Agregar datos de los padres a la BD-->
	<script>

		$(document).ready(function () {
			$('#submitBtnPadre').click(function () {
				const NombreTutor = $('#NombreTutor').val();
				const ApellidoTutor = $('#ApellidoTutor').val();
				const CedulaTutor = $('#CedulaTutor').val();
				const TelefonoTutor = $('#TelefonoTutor').val();
				const ParentescoTutor = $('#ParentescoTutor').val();
				const CorreoDatoAdicional = $('#CorreoDatoAdicional').val();
				const Direccion = $('#Direccion').val();
				const NumeroEmergencia = $('#NumeroEmergencia').val();
				const Extra = $('#Extra').val();
				console.log(NombreTutor);
				$.ajax({
					url: '/gucap',
					type: 'POST',
					dataType: 'json',
					data: {
						NombreTutor: NombreTutor,
						ApellidoTutor: ApellidoTutor,
						CedulaTutor: CedulaTutor,
						TelefonoTutor: TelefonoTutor,
						ParentescoTutor: ParentescoTutor,
						CorreoDatoAdicional: CorreoDatoAdicional,
						Direccion: Direccion,
						NumeroEmergencia: NumeroEmergencia,
						Extra: Extra
					},
					success: function (response) {
						if (response.success) {
							Swal.fire({
								text: "Datos enviados correctamente.",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, entendido!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then((result) => {
								if (result.isConfirmed) {
									const modal = document.querySelector('.modal');
									if (modal) {
										const modalInstance = bootstrap.Modal.getInstance(modal);
										modalInstance.hide();
									}
								}
							});
							limpiarCampo();
							recargar_tabla();
						} else {
							Swal.fire({
								text: "ERROR, Por favor veridicar e intentar nuevamente ",
								icon: "error",
								buttonsStyling: !1,
								confirmButtonText: "Aceptar!",
								customClass: { confirmButton: "btn btn-primary" },
							});
						}
					},
					error: function () {
						Swal.fire({
							text: "Error Fatal, Sistema fuera de servicio intentar mas tarde por favor ",
							icon: "error",
							buttonsStyling: !1,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
						limpiarCampo();
					}
				});
			});
		});


		function recargar_tabla() {
			dt.ajax.reload();
		}
		function limpiarCampo() {
			$('#NombreTutor').val('');
			$('#ApellidoTutor').val('');
			$('#CedulaTutor').val('');
			$('#TelefonoTutor').val('');
			$('#ParentescoTutor').val('');
			$('#CorreoDatoAdicional').val('');
			$('#Direccion').val('');
			$('#NumeroEmergencia').val('');
			$('#Extra').val('');

		}
	</script>
	<!--Edicion de valores-->
	<script>
		$(document).ready(function () {
			$('#submitBtnPadreEdit').click(function () {
				const id = $('#id').val();
				const NombreTutor = $('#NombreTutorEdit').val();
				const ApellidoTutor = $('#ApellidoTutorEdit').val();
				const CedulaTutor = $('#CedulaTutorEdit').val();
				const TelefonoTutor = $('#TelefonoTutorEdit').val();
				const ParentescoTutor = $('#ParentescoTutorEdit').val();
				const CorreoDatoAdicional = $('#CorreoDatoAdicionalEdit').val();
				const Direccion = $('#DireccionEdit').val();
				const NumeroEmergencia = $('#NumeroEmergenciaEdit').val();
				const Extra = $('#ExtraEdit').val();

				$.ajax({
					url: '/gucepsp',
					type: 'POST',
					dataType: 'json',
					data: {
						id: id,
						NombreTutor: NombreTutor,
						ApellidoTutor: ApellidoTutor,
						CedulaTutor: CedulaTutor,
						TelefonoTutor: TelefonoTutor,
						ParentescoTutor: ParentescoTutor,
						CorreoDatoAdicional: CorreoDatoAdicional,
						Direccion: Direccion,
						NumeroEmergencia: NumeroEmergencia,
						Extra: Extra
					},
					success: function (response) {
						if (response.success) {
							Swal.fire({
								text: "Datos Modificado con exito.",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, entendido!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then((result) => {
								if (result.isConfirmed) {
									const modal = document.getElementById('Edit_modal_padre');
									if (modal) {
										const modalInstance = bootstrap.Modal.getInstance(modal);
										modalInstance.hide();
									}
								}
							});
							recargar_tabla();
						} else {
							Swal.fire({
								text: "ERROR, Por favor veridicar e intentar nuevamente ",
								icon: "error",
								buttonsStyling: !1,
								confirmButtonText: "Aceptar!",
								customClass: { confirmButton: "btn btn-primary" },
							});
						}
					},
					error: function () {
						Swal.fire({
							text: "Error Fatal, Sistema fuera de servicio intentar mas tarde por favor ",
							icon: "error",
							buttonsStyling: !1,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});

					}
				});
			});
		});

		function recargar_tabla() {
			dt.ajax.reload();
		}

	</script>
	<!-- script para listar datos , para eliminar y llena los datos para modificar  -->
	<script>
		$.urlParam = function (name) {
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		var table;
		var dt;
		var filterPayment;
		// Class definition
		var KTDatatablesServerSide = function () {
			// Private functions
			var initDatatable = function () {
				dt = $("#kt_datatable_rol").DataTable({
					searchDelay: 500,
					processing: true,
					serverSide: true,
					order: [[1, 'asc']],
					stateSave: true,
					select: {
						style: 'multi',
						selector: 'td:first-child input[type="checkbox"]',
						className: 'row-selected'
					},
					ajax: {
						//hostUrl+"allTipoIndice?c="+$.urlParam('c'),
						url: '/gucdpv',
						dataSrc: 'data' // La propiedad que contiene los datos en la respuesta JSON
					},
					columns: [
						{
							data: 'nombretutor',
							render: function (data, type, row) {
								return `
																					<div class="ms-5">
																						<a class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																							data-kt-ecommerce-category-filter="category_name">${data}</a>
																						<div class="text-muted fs-7 fw-bolder">${row.apellidotutor}</div>
																					</div>
																				`;
							}
						},
						{
							data: 'ci_tutor',
							render: function (data, type, row) {
								return `<div class="ms-5">
																					<a class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																						data-kt-ecommerce-category-filter="category_name">C.I.:${data}</a> <br> 
																						<a class="badge badge-light-primary fs-7 m-1">Codigo: ${row.codigopadre}</a>
																				</div>`;
							}
						},
						{
							data: 'telefonotutor',
							render: function (data, type, row) {
								return `<div class="d-flex">
																					<div class="ms-0">
																					<a class="text-dark fw-bold text-hover-primary d-block fs-6">Telefono: ${data}</a>
																					<span class="text-muted fw-semibold text-muted d-block fs-7">Correo: ${row.correoelectronico}</span>
																					</div>
																					</div>`;
							}
						},
						{
							data: 'parentesco',
							render: function (data, type, row) {
								if (data == 'padre') {
									return `<a class="badge badge-light-success fs-7 m-1">${data}</a>`;
								} else if (data == 'madre') {
									return `<a class="badge badge-light-primary fs-7 m-1">${data}</a>`;
								} else {
									return `<a class="badge badge-light-warning fs-7 m-1">${data}</a>`;
								}
							}
						},
						{
							data: 'direccion',
							render: function (data, type, row) {
								return `<div class="d-flex">
																																																																																																																		<div class="ms-0">
																																																																																																																		<a class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																																																																																																				data-kt-ecommerce-category-filter="category_name">${data}</a>
																																																																																																																		</div>
																																																																																																																		</div>`;
							}
						},
						{
							data: 'indicacionextra',
							render: function (data, type, row) {
								return `<div class="d-flex">
																																																																																																																		<div class="ms-0">
																																																																																																																		<a class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																																																																																																				data-kt-ecommerce-category-filter="category_name">${data}</a>
																																																																																																																		</div>
																																																																																																																		</div>`;
							}
						},

						{
							data: 'created_at',
							render: function (data) {
								// Convertir la fecha a un objeto Date
								var date = new Date(data);
								// Obtener el día, mes y año
								var day = date.getDate();
								var month = date.getMonth(); // Se suma 1 porque los meses van de 0 a 11 en JavaScript
								var year = date.getFullYear();
								var monthNames = [
									"Enero", "Febrero", "Marzo",
									"Abril", "Mayo", "Junio", "Julio",
									"Agosto", "Septiembre", "Octubre",
									"Noviembre", "Diciembre"
								];
								// Formatear la fecha como "dd de mes de yyyy"
								return day + ' de ' + monthNames[month] + ' de ' + year;
							}
						},
						{
							data: 'Actions',
							render: function (data, type, row) {
								return `
																						<div class="text-end">
																						<?php if ($editar || $administrador): ?>
																																	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="btn_editar" data-kt-users-table-filter="delete_row" data-id="${row.id}">
																																		<i class="fa-regular fa-pen-to-square"></i>
																																	</a>
																							<?php endif; ?>
																						<?php if ($eliminar || $administrador): ?>
																																	<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="eliminar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-nombre="${row.nombretutor}">
																																		<i class="fa-solid fa-trash"></i>
																																	</a>
																							<?php endif; ?>

																						</div>
																					`;
							}
						},
					],
					// columnDefs: [
					//     {
					//         targets: 0,
					//         orderable: false,
					//         render: function (data) {
					//             return `
					//                 <div class="form-check form-check-sm form-check-custom form-check-solid">
					//                     <input class="form-check-input" type="checkbox" value="${data}" />
					//                 </div>`;
					//         }
					//     },
					// ],
					// Add data-filter attribute
					createdRow: function (row, data, dataIndex) {
						$(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
					}
				});
				table = dt.$;
				// Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
				dt.on('draw', function () {
					initToggleToolbar();
					KTMenu.createInstances();
				});

			}
			// Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
			var handleSearchDatatable = function () {
				const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
				filterSearch.addEventListener('keyup', function (e) {
					dt.search(e.target.value).draw();
				});
			}
			// Init toggle toolbar
			var initToggleToolbar = function () {
				// Toggle selected action toolbar
				// Select all checkboxes
				const container = document.querySelector('#kt_datatable_rol');
				const checkboxes = container.querySelectorAll('[type="checkbox"]');

				// Select elements
				const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

				// Toggle delete selected toolbar
				checkboxes.forEach(c => {
					// Checkbox on click event
					//console.log()
					c.addEventListener('click', function () {

						setTimeout(function () {
							toggleToolbars();
						}, 50);
					});
				});
			}
			return {
				init: function () {
					initDatatable();
					handleSearchDatatable();
					initToggleToolbar();
				}
			}
		}();
		function recargar_tabla() {
			dt.ajax.reload();
		}
		// On document ready
		KTUtil.onDOMContentLoaded(function () {
			KTDatatablesServerSide.init();
		});

		$(document).on("click", "tbody td #eliminar", function () {
			var el = $(this);
			Swal.fire({
				text: "Está seguro de eliminar el padre de familia :" + el.data("nombre"),
				icon: "error",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Si, eliminar!",
				cancelButtonText: "No, eliminar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						data: { "id": el.data('id'), "nombre": el.data('nombre') },
						type: "POST",
						dataType: "json",
						url: '/gucepp'
					})
						.done(function (data, textStatus, jqXHR) {

							if (data.success) {

								Swal.fire({
									text: data.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.value) {
									}
								});
							} else {
								Swal.fire({
									text: data.message,
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-danger"
									}
								}).then(function (result) {
									if (result.value) {
										//	console.log("error");
									}
								});
							}

							recargar_tabla();
						})
						.fail(function (jqXHR, textStatus, errorThrown) {

							Swal.fire({
								text: "Ocurrio un Error!",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok!",
								customClass: {
									confirmButton: "btn btn-danger"
								}
							}).then(function (result) {

							});

							recargar_tabla();
						});
				}
			});
		});

		$(document).on("click", "#btn_editar", function () {
			var el = $(this);
			console.log(el.data('id'));
			$.ajax({
				data: { "id": el.data('id') },
				type: "POST",
				dataType: "json",
				url: '/gucepv',
				success: function (response) {
					//	console.log(response); // Aquí puedes manejar la respuesta del controlador
					//	var estado = response[0].estado;
					//	console.log(estado);
					$('#id').val(response[0].id);
					$('#NombreTutorEdit').val(response[0].nombretutor);
					$('#ApellidoTutorEdit').val(response[0].apellidotutor);
					$('#CedulaTutorEdit').val(response[0].ci_tutor);
					$('#TelefonoTutorEdit').val(response[0].telefonotutor);
					$('#ParentescoTutorEdit').val(response[0].parentesco);
					$('#CorreoDatoAdicionalEdit').val(response[0].correoelectronico);
					$('#DireccionEdit').val(response[0].direccion);
					$('#NumeroEmergenciaEdit').val(response[0].numeroemergencia);
					$('#ExtraEdit').val(response[0].indicacionextra);
					$('#kt_modal_edit_padre').modal('show');

				},
				error: function (xhr, status, error) {
					console.error(xhr.responseText); // Manejo de errores
				}
			});
		});

	</script>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const cancelarModalBtn = document.getElementById('kt_modal_padre_close');
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_offer_a_deal');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});
		document.addEventListener('DOMContentLoaded', function () {
			const cancelarModalBtn = document.getElementById('kt_modal_padre_closeEdit');
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_edit_padre');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});


	</script>

<?php } elseif (strpos($currentUrl, "gucav") !== false) { ?>
	<script src="recursos/metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<!--Validacion de campos e ingreso de texto-->
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			document.querySelectorAll('.validar').forEach(function (input) {
				input.addEventListener('input', function () {
					const valor = this.value.trim();
					const validacion = new RegExp(this.getAttribute('data-validacion'));
					const mensaje = this.getAttribute('data-mensaje');

					if (!validacion.test(valor)) {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'No Ingrese caracteres que no corresponden al campo. Verifique por favor.',
							customClass: {
								confirmButton: 'btn btn-primary' // Agrega la clase 'btn btn-success' al botón de confirmación
							}
						});

						this.value = '';
					}
				});
			});
		});



	</script>

	<script>
		//cierre de modal
		document.addEventListener('DOMContentLoaded', function () {
			const closeModalBtn = document.getElementById('kt_modal_edit_adm_close');
			const cancelarModalBtn = document.getElementById('kt_modal_edit_adm_calcelar');
			if (closeModalBtn) {
				closeModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_edit_Administrador');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_edit_Administrador');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});
		document.addEventListener('DOMContentLoaded', function () {
			const closeModalBtn = document.getElementById('kt_modal_adm_close');
			const cancelarModalBtn = document.getElementById('kt_modal_rol_calcelar');
			if (closeModalBtn) {
				closeModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_add_customer');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_add_customer');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});
		$(document).ready(function () {
			$('#submitBtnAdministrador').click(function () {
				const nombreAdministrador = $('#nombreAdministrador').val();
				const apellidoAdministrador = $('#apellidoAdministrador').val();
				const correoElectronico = $('#correoElectronico').val();
				const cedulaIdentidad = $('#cedulaIdentidad').val();
				const telefonoAdministrador = $('#telefonoAdministrador').val();
				const direccionAdministrador = $('#direccionAdministrador').val();
				const cargoAdministrador = $('#cargoAdministrador').val();
				const generoAdministrador = $('#generoAdministrador').val();
				const fechaNacimientoAdministrador = $('#fechaNacimientoAdministrador').val();
				// Convertir la fecha al formato YYYY-MM-DD
				const fechaNacimientoFormatted = fechaNacimientoAdministrador.split('/').reverse().join('-');
				const fechaInicioAdministrador = $('#fechaInicioAdministrador').val();
				// Convertir la fecha al formato YYYY-MM-DD
				const fechaInicioFormatted = fechaInicioAdministrador.split('/').reverse().join('-');
				const rolAdministrador = $('#rolAdministrador').val();


				//validacion de nombre
				if (nombreAdministrador.trim() === '' && apellidoAdministrador.trim() === '') {
					$('#nombreApellidoError').text('Por favor ingrese el nombre completo del usuario administrador');
					return;
				}
				// Ocultar mensaje de error
				$('#nombreApellidoError').text('');
				//validacion de cedula
				if (correoElectronico.trim() === '') {
					$('#correoElectronicoError').text('Por favor ingrese correo electronico del usuario administrador');
					return;
				}
				// Ocultar mensaje de error
				$('#correoElectronicoError').text('');
				//validacion de cedula
				if (cedulaIdentidad.trim() === '') {
					$('#cedulaIdentidadError').text('Por favor ingrese la cedula de identidad del usuario administrador');
					return;
				}
				// Ocultar mensaje de error
				$('#cedulaIdentidadError').text('');
				//validacion de telefono
				if (telefonoAdministrador.trim() === '') {
					$('#telefonoAdministradorError').text('Por favor ingrese numero de telefono del usuario administrador');
					return;
				}
				// Ocultar mensaje de error
				$('#telefonoAdministradorError').text('');
				//validacion de telefono
				if (direccionAdministrador.trim() === '') {
					$('#direccionAdministradorError').text('Por favor ingrese direccion del usuario administrador');
					return;
				}
				// Ocultar mensaje de error
				$('#direccionAdministradorError').text('');
				//validacion de telefono
				if (cargoAdministrador.trim() === '') {
					$('#cargoAdministradorError').text('Por favor ingrese cargo del usuario administrador');
					return;
				}
				// Ocultar mensaje de error
				$('#cargoAdministradorError').text('');
				//validacion de telefono
				if (generoAdministrador.trim() === '') {
					$('#generoAdministradorError').text('Por favor seleccion el genero del usuario administrador');
					return;
				}
				// Ocultar mensaje de error
				$('#generoAdministradorError').text('');
				//validacion de telefono
				if (fechaNacimientoAdministrador.trim() === '') {
					$('#fechaNacimientoAdministradorError').text('Por favor seleccione fecha de nacimiento del usuario administrador');
					return;
				}
				// Ocultar mensaje de error
				$('#fechaNacimientoAdministradorError').text('');
				if (fechaInicioAdministrador.trim() === '') {
					$('#fechaInicioAdministradorError').text('Por favor seleccione fecha de inicio de contrato del usuario administrador');
					return;
				}
				// Ocultar mensaje de error
				$('#fechaInicioAdministradorError').text('');
				if (rolAdministrador.trim() === '') {
					$('#rolAdministradorError').text('Por favor seleccione rol del usuario administrador');
					return;
				}
				// Ocultar mensaje de error
				$('#rolAdministradorError').text('');

				$.ajax({
					url: '/gucaa',
					type: 'POST',
					dataType: 'json',
					data: {
						nombreAdministrador: nombreAdministrador,
						apellidoAdministrador: apellidoAdministrador,
						correoElectronico: correoElectronico,
						cedulaIdentidad: cedulaIdentidad,
						telefonoAdministrador: telefonoAdministrador,
						direccionAdministrador: direccionAdministrador,
						cargoAdministrador: cargoAdministrador,
						generoAdministrador: generoAdministrador,
						fechaNacimientoFormatted: fechaNacimientoFormatted,
						fechaInicioFormatted: fechaInicioFormatted,
						rolAdministrador: rolAdministrador
					},

					success: function (response) {
						if (response.success) {
							Swal.fire({
								text: "Datos enviados correctamente.",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, entendido!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then((result) => {
								if (result.isConfirmed) {
									const modal = document.querySelector('.modal');
									if (modal) {
										const modalInstance = bootstrap.Modal.getInstance(modal);
										modalInstance.hide();
									}
								}
							});
							limpiarCampoAdministrador();
							recargar_tabla();
						} else {
							Swal.fire({
								text: "ERROR, Por favor veridicar e intentar nuevamente ",
								icon: "error",
								buttonsStyling: !1,
								confirmButtonText: "Aceptar!",
								customClass: { confirmButton: "btn btn-primary" },
							});
							limpiarCampoAdministrador();
						}
					},
					error: function () {
						Swal.fire({
							text: "Error Fatal, Sistema fuera de servicio intentar mas tarde por favor ",
							icon: "error",
							buttonsStyling: !1,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
						limpiarCampoAdministrador();
					}
				});
			});
		});
		function recargar_tabla() {
			dt.ajax.reload();
		}
		function limpiarCampoAdministrador() {
			$('#nombreAdministrador').val('');
			$('#apellidoAdministrador').val('');
			$('#correoElectronico').val('');
			$('#cedulaIdentidad').val('');
			$('#telefonoAdministrador').val('');
			$('#direccionAdministrador').val('');
			$('#cargoAdministrador').val('');
			$('#generoAdministrador').val('');
			$('#fechaNacimientoAdministrador').val('');
			$('#fechaInicioAdministrador').val('');
			$('#rolAdministrador').val('');
		}
	</script>
	<script>
		//datos a editar
		$(document).ready(function () {
			$('#editBtnAdministrador').click(function () {
				const id = $('#id').val();
				const nombreAdministrador = $('#nombreAdministradorEdit').val();
				const apellidoAdministrador = $('#apellidoAdministradorEdit').val();
				const correoElectronico = $('#correoElectronicoEdit').val();
				const cedulaIdentidad = $('#cedulaIdentidadEdit').val();
				const telefonoAdministrador = $('#telefonoAdministradorEdit').val();
				const direccionAdministrador = $('#direccionAdministradorEdit').val();
				const cargoAdministrador = $('#cargoAdministradorEdit').val();
				const generoAdministrador = $('#generoAdministradorEdit').val();
				const fechaNacimientoAdministrador = $('#fechaNacimientoAdministradorEdit').val();
				// Convertir la fecha al formato YYYY-MM-DD
				const fechaNacimientoFormatted = fechaNacimientoAdministrador.split('/').reverse().join('-');
				const fechaInicioAdministrador = $('#fechaInicioAdministradorEdit').val();
				// Convertir la fecha al formato YYYY-MM-DD
				const fechaInicioFormatted = fechaInicioAdministrador.split('/').reverse().join('-');
				const rolAdministrador = $('#rolAdministradorEdit').val();
				//validacion de nombre
				if (nombreAdministrador.trim() === '' && apellidoAdministrador.trim() === '') {
					$('#nombreApellidoErrorEdit').text('Por favor ingrese el nombre completo del usuario administrador');
					return;
				}
				// Ocultar mensaje de error
				$('#nombreApellidoErrorEdit').text('');
				//validacion de cedula
				if (correoElectronico.trim() === '') {
					$('#correoElectronicoErrorEdit').text('Por favor ingrese correo electronico del usuario administrador');
					return;
				}
				// Ocultar mensaje de error
				$('#correoElectronicoErrorEdit').text('');
				//validacion de cedula
				if (cedulaIdentidad.trim() === '') {
					$('#cedulaIdentidadErrorEdit').text('Por favor ingrese la cedula de identidad del usuario administrador');
					return;
				}
				// Ocultar mensaje de error
				$('#cedulaIdentidadErrorEdit').text('');
				//validacion de telefono
				if (telefonoAdministrador.trim() === '') {
					$('#telefonoAdministradorErrorEdit').text('Por favor ingrese numero de telefono del usuario administrador');
					return;
				}
				// Ocultar mensaje de error
				$('#telefonoAdministradorErrorEdit').text('');
				//validacion de telefono
				if (direccionAdministrador.trim() === '') {
					$('#direccionAdministradorErrorEdit').text('Por favor ingrese direccion del usuario administrador');
					return;
				}
				// Ocultar mensaje de error
				$('#direccionAdministradorErrorEdit').text('');
				//validacion de telefono
				if (cargoAdministrador.trim() === '') {
					$('#cargoAdministradorErrorEdit').text('Por favor ingrese cargo del usuario administrador');
					return;
				}
				// Ocultar mensaje de error
				$('#cargoAdministradorErrorEdit').text('');
				//validacion de telefono
				if (generoAdministrador.trim() === '') {
					$('#generoAdministradorErrorEdit').text('Por favor seleccion el genero del usuario administrador');
					return;
				}
				// Ocultar mensaje de error
				$('#generoAdministradorErrorEdit').text('');
				//validacion de telefono
				if (fechaNacimientoAdministrador.trim() === '') {
					$('#fechaNacimientoAdministradorErrorEdit').text('Por favor seleccione fecha de nacimiento del usuario administrador');
					return;
				}
				// Ocultar mensaje de error
				$('#fechaNacimientoAdministradorErrorEdit').text('');
				if (fechaInicioAdministrador.trim() === '') {
					$('#fechaInicioAdministradorErrorEdit').text('Por favor seleccione fecha de inicio de contrato del usuario administrador');
					return;
				}
				// Ocultar mensaje de error
				$('#fechaInicioAdministradorErrorEdit').text('');
				if (rolAdministrador.trim() === '') {
					$('#rolAdministradorErrorEdit').text('Por favor seleccione rol del usuario administrador');
					return;
				}
				// Ocultar mensaje de error
				$('#rolAdministradorErrorEdit').text('');
				$.ajax({
					url: '/gucedita',
					type: 'POST',
					dataType: 'json',
					data: {
						id: id,
						nombreAdministrador: nombreAdministrador,
						apellidoAdministrador: apellidoAdministrador,
						correoElectronico: correoElectronico,
						cedulaIdentidad: cedulaIdentidad,
						telefonoAdministrador: telefonoAdministrador,
						direccionAdministrador: direccionAdministrador,
						cargoAdministrador: cargoAdministrador,
						generoAdministrador: generoAdministrador,
						fechaNacimientoFormatted: fechaNacimientoFormatted,
						fechaInicioFormatted: fechaInicioFormatted,
						rolAdministrador: rolAdministrador
					},
					success: function (response) {
						if (response.success) {
							Swal.fire({
								text: "Datos editados con exito.",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, entendido!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then((result) => {
								if (result.isConfirmed) {
									const modal = document.querySelector('.modal');
									if (modal) {
										$('#kt_modal_edit_Administrador').modal('hide');
									}
								}
							});
							recargar_tabla();
						} else {
							Swal.fire({
								text: "ERROR, Por favor veridicar e intentar nuevamente ",
								icon: "error",
								buttonsStyling: !1,
								confirmButtonText: "Aceptar!",
								customClass: { confirmButton: "btn btn-primary" },
							});
						}
					},
					error: function () {
						Swal.fire({
							text: "Error Fatal, Sistema fuera de servicio intentar mas tarde por favor ",
							icon: "error",
							buttonsStyling: !1,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
					}
				});
			});
		});

		function recargar_tabla() {
			dt.ajax.reload();
		}

	</script>
	<!-- script para listar datos , para eliminar y llena los datos para modificar  -->
	<script>
		$.urlParam = function (name) {
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		var table;
		var dt;
		var filterPayment;
		// Class definition
		var KTDatatablesServerSide = function () {
			// Private functions
			var initDatatable = function () {
				dt = $("#kt_datatable_rol").DataTable({
					searchDelay: 500,
					processing: true,
					serverSide: true,
					order: [[1, 'asc']],
					stateSave: true,
					select: {
						style: 'multi',
						selector: 'td:first-child input[type="checkbox"]',
						className: 'row-selected'
					},
					ajax: {
						//hostUrl+"allTipoIndice?c="+$.urlParam('c'),
						url: '/gucdav',
						dataSrc: 'data' // La propiedad que contiene los datos en la respuesta JSON
					},
					columns: [
						{
							data: 'nombre',
							render: function (data, type, row) {
								return `
																																																																																																					<div class="ms-5">
																																																																																																						<a 
																																																																																																							class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																																																																																							data-kt-ecommerce-category-filter="category_name">${data}</a>
																																																																																																						<div class="text-muted fs-7 fw-bolder">${row.apellido}</div>
																																																																																																					</div>
																																																																																																				`;
							}
						},
						{
							data: 'correo',
							render: function (data, type, row) {
								return `<div class="ms-5">
																																																																																																						<a 
																																																																																																							class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																																																																																							data-kt-ecommerce-category-filter="category_name">${data}</a>
										
																																																																																																					</div>`;
							}
						},
						{
							data: 'telefono',
							render: function (data, type, row) {
								return `<div class="ms-5">
																																																																																																						<a 
																																																																																																							class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																																																																																							data-kt-ecommerce-category-filter="category_name">${data}</a>
										
																																																																																																					</div>`;
							}
						},
						{
							data: 'direccion',
							render: function (data, type, row) {
								return `<div class="ms-5">
																																																																																																						<a 
																																																																																																							class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																																																																																							data-kt-ecommerce-category-filter="category_name">${data}</a>
										
																																																																																																					</div>`;
							}
						},
						{
							data: 'cargo',
							render: function (data, type, row) {
								return `<div class="ms-5">
																																																																																																						<a 
																																																																																																							class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																																																																																							data-kt-ecommerce-category-filter="category_name">${data}</a>
										
																																																																																																					</div>`;
							}
						},
						{
							data: 'nombrerol',
							render: function (data, type, row) {
								return `<div class="d-flex">
																																																																																																					<div class="ms-0">
																																																																																																					<a class="badge badge-light-primary fs-7 m-1">${data}</a>
																																																																																																					</div>
																																																																																																				</div>`;
							}
						},
						{
							data: 'created_at',
							render: function (data) {
								// Convertir la fecha a un objeto Date
								var date = new Date(data);
								// Obtener el día, mes y año
								var day = date.getDate();
								var month = date.getMonth(); // Se suma 1 porque los meses van de 0 a 11 en JavaScript
								var year = date.getFullYear();
								var monthNames = [
									"Enero", "Febrero", "Marzo",
									"Abril", "Mayo", "Junio", "Julio",
									"Agosto", "Septiembre", "Octubre",
									"Noviembre", "Diciembre"
								];
								// Formatear la fecha como "dd de mes de yyyy"
								return day + ' de ' + monthNames[month] + ' de ' + year;
							}
						},
						{
							data: 'Actions',
							render: function (data, type, row) {
								return `
															<div class="text-end">
															<?php if ($editar || $administrador): ?>
												
																										<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="btn_editar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-nombre="${row.nombre}" data-descripcion="${row.descripcion}" data-privilegio="${row.grupo_privilegio}">
																											<i class="fa-regular fa-pen-to-square"></i>
																										</a>
																<?php endif; ?>
																<?php if ($eliminar || $administrador): ?>
							
																										<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="eliminar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-nombre="${row.nombre}">
																											<i class="fa-solid fa-trash"></i>
																										</a>
															<?php endif; ?>
															</div>
														`;
							}
						},
					],
					// columnDefs: [
					//     {
					//         targets: 0,
					//         orderable: false,
					//         render: function (data) {
					//             return `
					//                 <div class="form-check form-check-sm form-check-custom form-check-solid">
					//                     <input class="form-check-input" type="checkbox" value="${data}" />
					//                 </div>`;
					//         }
					//     },
					// ],
					// Add data-filter attribute
					createdRow: function (row, data, dataIndex) {
						$(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
					}
				});
				table = dt.$;
				// Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
				dt.on('draw', function () {
					initToggleToolbar();
					KTMenu.createInstances();
				});

			}
			// Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
			var handleSearchDatatable = function () {
				const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
				filterSearch.addEventListener('keyup', function (e) {
					dt.search(e.target.value).draw();
				});
			}
			// Init toggle toolbar
			var initToggleToolbar = function () {
				// Toggle selected action toolbar
				// Select all checkboxes
				const container = document.querySelector('#kt_datatable_rol');
				const checkboxes = container.querySelectorAll('[type="checkbox"]');

				// Select elements
				const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

				// Toggle delete selected toolbar
				checkboxes.forEach(c => {
					// Checkbox on click event
					//console.log()
					c.addEventListener('click', function () {

						setTimeout(function () {
							toggleToolbars();
						}, 50);
					});
				});
			}
			return {
				init: function () {
					initDatatable();
					handleSearchDatatable();
					initToggleToolbar();
				}
			}
		}();
		function recargar_tabla() {
			dt.ajax.reload();
		}
		// On document ready
		KTUtil.onDOMContentLoaded(function () {
			KTDatatablesServerSide.init();
		});

		$(document).on("click", "tbody td #eliminar", function () {
			var el = $(this);
			Swal.fire({
				text: "Está seguro de eliminar el rol de nombre :" + el.data("nombre"),
				icon: "error",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Si, eliminar!",
				cancelButtonText: "No, eliminar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						data: { "id": el.data('id'), "nombre": el.data('nombre') },
						type: "POST",
						dataType: "json",
						url: '/gucea'
					})
						.done(function (data, textStatus, jqXHR) {

							if (data.success) {

								Swal.fire({
									text: data.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.value) {
									}
								});
							} else {
								Swal.fire({
									text: data.message,
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-danger"
									}
								}).then(function (result) {
									if (result.value) {
										//	console.log("error");
									}
								});
							}

							recargar_tabla();
						})
						.fail(function (jqXHR, textStatus, errorThrown) {

							Swal.fire({
								text: "Ocurrio un Error!",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok!",
								customClass: {
									confirmButton: "btn btn-danger"
								}
							}).then(function (result) {

							});

							recargar_tabla();
						});
				}
			});
		});

		$(document).on("click", "#btn_editar", function () {
			var el = $(this);
			//console.log(el.data('id'));
			$.ajax({
				data: { "id": el.data('id') },
				type: "POST",
				dataType: "json",
				url: '/guceav',
				success: function (response) {
					//console.log(response); // Aquí puedes manejar la respuesta del controlador
					$('#id').val(response[0].id);
					$('#nombreAdministradorEdit').val(response[0].nombre);
					$('#apellidoAdministradorEdit').val(response[0].apellido);
					$('#correoElectronicoEdit').val(response[0].correo);
					$('#cedulaIdentidadEdit').val(response[0].ci);
					$('#telefonoAdministradorEdit').val(response[0].telefono);
					$('#direccionAdministradorEdit').val(response[0].direccion);
					$('#cargoAdministradorEdit').val(response[0].cargo);
					$('#generoAdministradorEdit').val(response[0].genero);
					$('#fechaNacimientoAdministradorEdit').val(response[0].fechanacimiento);
					$('#fechaInicioAdministradorEdit').val(response[0].fechainicio);
					$('#rolAdministradorEdit').val(response[0].rol);
					$('#kt_modal_edit_Administrador').modal('show');

				},
				error: function (xhr, status, error) {
					console.error(xhr.responseText); // Manejo de errores
				}
			});
		});

	</script>


<?php } elseif (strpos($currentUrl, "guccv") !== false) { ?>
	<script src="recursos/metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<!--Validacion de campos e ingreso de texto-->
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			document.querySelectorAll('.validar').forEach(function (input) {
				input.addEventListener('input', function () {
					const valor = this.value.trim();
					const validacion = new RegExp(this.getAttribute('data-validacion'));
					const mensaje = this.getAttribute('data-mensaje');

					if (!validacion.test(valor)) {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'No Ingrese caracteres que no corresponden al campo. Verifique por favor.',
							customClass: {
								confirmButton: 'btn btn-primary' // Agrega la clase 'btn btn-success' al botón de confirmación
							}
						});

						this.value = '';
					}
				});
			});
		});
	</script>
	<script>
		//cierre de modal editar
		document.addEventListener('DOMContentLoaded', function () {
			const closeModalBtn = document.getElementById('kt_edit_modal_conductor_close');
			const cancelarModalBtn = document.getElementById('kt_modal_edit_conductor_calcelar');
			if (closeModalBtn) {
				closeModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_editar_conductor');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_editar_conductor');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});
		//cierre de modal agregar
		document.addEventListener('DOMContentLoaded', function () {
			const closeModalBtn = document.getElementById('kt_modal_conductor_close');
			const cancelarModalBtn = document.getElementById('kt_modal_conductor_calcelar');
			if (closeModalBtn) {
				closeModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_add_customer');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_add_customer');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});

		//manejo de check
		$(document).ready(function () {
			$('#licenciaCheckbox').change(function () {
				if ($(this).is(':checked')) {
					$(this).val('1');
					$('.form-check-label-li').text('Si');
				} else {
					$(this).val('0');
					$('.form-check-label-li').text('No');
				}
			});
		});

		$(document).ready(function () {
			$('#submitBtnConductor').click(function () {
				const nombreConductor = $('#nombreConductor').val();
				const apellidoConductor = $('#apellidoConductor').val();
				const cedulaIdentidad = $('#cedulaIdentidad').val();
				const numeroLicencia = $('#numeroLicencia').val();
				const fechalicencia = $('#fechalicencia').val();
				// Convertir la fecha al formato YYYY-MM-DD
				const fechalicenciaFormat = fechalicencia.split('/').reverse().join('-');
				const licenciaCheckbox = $('#licenciaCheckbox').val();
				//const catlicencia = $('#catlicencia').val();
				//extracion de datos 
				var radios = document.getElementsByName('catlicencia');
				radios.forEach(function (radio) {
					if (radio.checked) {
						valorRadioCatLic = radio.value;
					}
				});
				const correoElectronicoConductor = $('#correoElectronicoConductor').val();
				const NroConductor = $('#NroConductor').val();
				const direccionConductor = $('#direccionConductor').val();
				const CargoConductor = $('#CargoConductor').val();
				const generoConductor = $('#generoConductor').val();
				const fechainicio = $('#fechainicio').val();
				// Convertir la fecha al formato YYYY-MM-DD
				const fechainicoFormat = fechainicio.split('/').reverse().join('-');
				const fechaFin = $('#fechaFin').val();
				// Convertir la fecha al formato YYYY-MM-DD
				const fechafinFormat = fechaFin.split('/').reverse().join('-');
				//validacion de nombre
				if (nombreConductor.trim() === '' || apellidoConductor.trim() === '') {
					$('#nombreConductorError').text('Por favor ingrese el nombre completo del conductor');
					return;
				}
				// Ocultar mensaje de error
				$('#nombreConductorError').text('');
				//validacion de cedula
				if (cedulaIdentidad.trim() === '') {
					$('#cedulaIdentidadError').text('Por favor ingrese cedula de identidad del conductor');
					return;
				}
				// Ocultar mensaje de error
				$('#cedulaIdentidadError').text('');
				//validacion de numero de licencia
				if (numeroLicencia.trim() === '' || fechalicencia.trim() === '') {
					$('#licencia1Error').text('Por favor ingrese datos de licencia');
					return;
				}
				// Ocultar mensaje de error
				$('#licencia1Error').text('');
				//validacion de conductor
				if (correoElectronicoConductor.trim() === '') {
					$('#correoElectronicoConductorError').text('Por favor ingrese el correo electronico del conductor ');
					return;
				}
				// Ocultar mensaje de error
				$('#correoElectronicoConductorError').text('');
				//validacion de numero de telefono
				if (NroConductor.trim() === '') {
					$('#NroConductorError').text('Por favor ingrese el numero de telefono del conductor ');
					return;
				}
				// Ocultar mensaje de error
				$('#NroConductorError').text('');
				//validacion de direccion
				if (direccionConductor.trim() === '') {
					$('#direccionConductorError').text('Por favor ingrese la direccion del conductor ');
					return;
				}
				// Ocultar mensaje de error
				$('#direccionConductorError').text('');
				//validacion de cargo
				if (CargoConductor.trim() === '') {
					$('#CargoConductorError').text('Por favor ingrese la direccion del conductor ');
					return;
				}
				// Ocultar mensaje de error
				$('#CargoConductorError').text('');

				//validacion de genero
				if (generoConductor.trim() === '') {
					$('#generoConductorError').text('Por favor seleccion el genero del conductor ');
					return;
				}
				// Ocultar mensaje de error
				$('#generoConductorError').text('');

				//validacion de fecha de inicio
				if (fechainicio.trim() === '') {
					$('#FechaInicioError').text('Por favor seleccionar la fecha de inicio de contrato conductor ');
					return;
				}
				// Ocultar mensaje de error
				$('#FechaInicioError').text('');

				//validacion de fecha de fin
				if (fechaFin.trim() === '') {
					$('#FechaFinError').text('Por favor seleccione la fecha del fin de contrato del conductor ');
					return;
				}
				// Ocultar mensaje de error
				$('#FechaFinError').text('');

				$.ajax({
					url: '/gtcac',
					type: 'POST',
					dataType: 'json',
					data: {
						nombreConductor: nombreConductor,
						apellidoConductor: apellidoConductor,
						cedulaIdentidad: cedulaIdentidad,
						numeroLicencia: numeroLicencia,
						fechalicenciaFormat: fechalicenciaFormat,
						licenciaCheckbox: licenciaCheckbox,
						valorRadioCatLic: valorRadioCatLic,
						correoElectronicoConductor: correoElectronicoConductor,
						NroConductor: NroConductor,
						direccionConductor: direccionConductor,
						CargoConductor: CargoConductor,
						generoConductor: generoConductor,
						fechainicoFormat: fechainicoFormat,
						fechafinFormat: fechafinFormat
					},
					success: function (response) {
						if (response.success) {
							Swal.fire({
								text: "Datos enviados correctamente.",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, entendido!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then((result) => {
								if (result.isConfirmed) {
									const modal = document.querySelector('.modal');
									if (modal) {
										const modalInstance = bootstrap.Modal.getInstance(modal);
										modalInstance.hide();
									}
								}
							});
							limpiarCampoConductor();
							recargar_tabla();
						} else {
							Swal.fire({
								text: "ERROR, Por favor veridicar e intentar nuevamente ",
								icon: "error",
								buttonsStyling: !1,
								confirmButtonText: "Aceptar!",
								customClass: { confirmButton: "btn btn-primary" },
							});
							limpiarCampoConductor();

						}
					},
					error: function () {
						Swal.fire({
							text: "Error Fatal, Sistema fuera de servicio intentar mas tarde por favor ",
							icon: "error",
							buttonsStyling: !1,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
						limpiarCampoConductor();
					}
				});
			});
		});

		function limpiarCampoConductor() {

			$('#nombreConductor').val('');
			$('#apellidoConductor').val('');
			$('#cedulaIdentidad').val('');
			$('#numeroLicencia').val('');
			$('#fechalicencia').val('');
			$('#correoElectronicoConductor').val('');
			$('#NroConductor').val('');
			$('#direccionConductor').val('');
			$('#CargoConductor').val('');
			$('#generoConductor').val('');
			$('#fechainicio').val('');
			$('#fechaFin').val('');
		}

		function recargar_tabla() {
			dt.ajax.reload();
		}
	</script>
	<script>
		//datos a editar
		$(document).ready(function () {
			$('#editBtnConductor').click(function () {
				const id = $('#id').val();
				const nombreConductor = $('#nombreConductorEdit').val();
				const apellidoConductor = $('#apellidoConductorEdit').val();
				const cedulaIdentidad = $('#cedulaIdentidadEdit').val();
				const numeroLicencia = $('#numeroLicenciaEdit').val();
				const fechalicencia = $('#fechalicenciaEdit').val();
				// Convertir la fecha al formato YYYY-MM-DD
				const fechalicenciaFormat = fechalicencia.split('/').reverse().join('-');
				const licenciaCheckbox = $('#licenciaCheckboxEdit').val();
				//const catlicencia = $('#catlicencia').val();
				//extracion de datos 
				var radios = document.getElementsByName('catlicenciaedit');
				radios.forEach(function (radio) {
					if (radio.checked) {
						valorRadioCatLic = radio.value;
					}
				});
				const correoElectronicoConductor = $('#correoElectronicoConductorEdit').val();
				const NroConductor = $('#NroConductorEdit').val();
				const direccionConductor = $('#direccionConductorEdit').val();
				const CargoConductor = $('#CargoConductorEdit').val();
				const generoConductor = $('#generoConductorEdit').val();
				const fechainicio = $('#fechainicioEdit').val();
				// Convertir la fecha al formato YYYY-MM-DD
				const fechainicoFormat = fechainicio.split('/').reverse().join('-');
				const fechaFin = $('#fechaFinEdit').val();
				// Convertir la fecha al formato YYYY-MM-DD
				const fechafinFormat = fechaFin.split('/').reverse().join('-');
				//validacion de nombre
				//console.log(id);
				if (nombreConductor.trim() === '' || apellidoConductor.trim() === '') {
					$('#nombreConductorErrorEdit').text('Por favor ingrese el nombre completo del conductor');
					return;
				}
				// Ocultar mensaje de error
				$('#nombreConductorErrorEdit').text('');
				//validacion de cedula
				if (cedulaIdentidad.trim() === '') {
					$('#cedulaIdentidadErrorEdit').text('Por favor ingrese cedula de identidad del conductor');
					return;
				}
				// Ocultar mensaje de error
				$('#cedulaIdentidadErrorEdit').text('');
				//validacion de numero de licencia
				if (numeroLicencia.trim() === '' || fechalicencia.trim() === '') {
					$('#licencia1ErrorEdit').text('Por favor ingrese datos de licencia');
					return;
				}
				// Ocultar mensaje de error
				$('#licencia1ErrorEdit').text('');
				//validacion de conductor
				if (correoElectronicoConductor.trim() === '') {
					$('#correoElectronicoConductorErrorEdit').text('Por favor ingrese el correo electronico del conductor ');
					return;
				}
				// Ocultar mensaje de error
				$('#correoElectronicoConductorErrorEdit').text('');
				//validacion de numero de telefono
				if (NroConductor.trim() === '') {
					$('#NroConductorErrorEdit').text('Por favor ingrese el numero de telefono del conductor ');
					return;
				}
				// Ocultar mensaje de error
				$('#NroConductorErrorEdit').text('');
				//validacion de direccion
				if (direccionConductor.trim() === '') {
					$('#direccionConductorErrorEdit').text('Por favor ingrese la direccion del conductor ');
					return;
				}
				// Ocultar mensaje de error
				$('#direccionConductorErrorEdit').text('');
				//validacion de cargo
				if (CargoConductor.trim() === '') {
					$('#CargoConductorErrorEdit').text('Por favor ingrese la direccion del conductor ');
					return;
				}
				// Ocultar mensaje de error
				$('#CargoConductorErrorEdit').text('');

				//validacion de genero
				if (generoConductor.trim() === '') {
					$('#generoConductorErrorEdit').text('Por favor seleccion el genero del conductor ');
					return;
				}
				// Ocultar mensaje de error
				$('#generoConductorErrorEdit').text('');

				//validacion de fecha de inicio
				if (fechainicio.trim() === '') {
					$('#FechaInicioErrorEdit').text('Por favor seleccionar la fecha de inicio de contrato conductor ');
					return;
				}
				// Ocultar mensaje de error
				$('#FechaInicioErrorEdit').text('');

				//validacion de fecha de fin
				if (fechaFin.trim() === '') {
					$('#FechaFinErrorEdit').text('Por favor seleccione la fecha del fin de contrato del conductor ');
					return;
				}
				// Ocultar mensaje de error
				$('#FechaFinErrorEdit').text('');

				$.ajax({
					url: '/gtcactc',
					type: 'POST',
					dataType: 'json',
					data: {
						id: id,
						nombreConductor: nombreConductor,
						apellidoConductor: apellidoConductor,
						cedulaIdentidad: cedulaIdentidad,
						numeroLicencia: numeroLicencia,
						fechalicenciaFormat: fechalicenciaFormat,
						licenciaCheckbox: licenciaCheckbox,
						valorRadioCatLic: valorRadioCatLic,
						correoElectronicoConductor: correoElectronicoConductor,
						NroConductor: NroConductor,
						direccionConductor: direccionConductor,
						CargoConductor: CargoConductor,
						generoConductor: generoConductor,
						fechainicoFormat: fechainicoFormat,
						fechafinFormat: fechafinFormat
					},
					success: function (response) {
						if (response.success) {
							Swal.fire({
								text: "Datos editados correctamente.",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Ok, entendido!",
								customClass: {
									confirmButton: "btn btn-primary"
								}
							}).then((result) => {
								if (result.isConfirmed) {
									const modal = document.getElementById('kt_modal_editar_conductor');
									if (modal) {
										const modalInstance = bootstrap.Modal.getInstance(modal);
										modalInstance.hide();
									}
								}
							});

							recargar_tabla();
						} else {
							Swal.fire({
								text: "ERROR, Por favor veridicar e intentar nuevamente ",
								icon: "error",
								buttonsStyling: !1,
								confirmButtonText: "Aceptar!",
								customClass: { confirmButton: "btn btn-primary" },
							});
						}
					},
					error: function () {
						Swal.fire({
							text: "Error Fatal, Sistema fuera de servicio intentar mas tarde por favor ",
							icon: "error",
							buttonsStyling: !1,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});

					}
				});
			});
		});

		function recargar_tabla() {
			dt.ajax.reload();
		}

	</script>
	<!-- script para listar datos , para eliminar y llena los datos para modificar  -->
	<script>
		$.urlParam = function (name) {
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		var table;
		var dt;
		var filterPayment;
		// Class definition
		var KTDatatablesServerSide = function () {
			// Private functions
			var initDatatable = function () {
				dt = $("#kt_datatable_rol").DataTable({
					searchDelay: 500,
					processing: true,
					serverSide: true,
					order: [[1, 'asc']],
					stateSave: true,
					select: {
						style: 'multi',
						selector: 'td:first-child input[type="checkbox"]',
						className: 'row-selected'
					},
					ajax: {
						//hostUrl+"allTipoIndice?c="+$.urlParam('c'),
						url: '/gucdcv',
						dataSrc: 'data' // La propiedad que contiene los datos en la respuesta JSON
					},
					columns: [
						{
							data: 'nombre',
							render: function (data, type, row) {
								return `
																																																																																														<div class="ms-5">
																																																																																															<a 
																																																																																																class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																																																																																data-kt-ecommerce-category-filter="category_name">${data}</a>
																																																																																															<div class="text-muted fs-7 fw-bolder">${row.apellido}</div>
																																																																																														</div>
																																																																																													`;
							}
						},
						{
							data: 'numlicencia',
							render: function (data, type, row) {
								return `
																																																																																														<div class="ms-5">
																																																																																															<a 
																																																																																																class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																																																																																data-kt-ecommerce-category-filter="category_name">Numero:${data}</a>
																																																																																															<div class="text-muted fs-7 fw-bolder">Fecha Ven:${row.fechalicencia}</div>
																																																																																															<div class="text-muted fs-7 fw-bolder">Categoria: ${row.catlic}</div>
																																																																																														</div>
																																																																																													`;
							}
						},
						{
							data: 'correoelectronico',
							render: function (data, type, row) {
								return `
																																																																																														<div class="ms-5">
																																																																																															<a 
																																																																																																class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																																																																																data-kt-ecommerce-category-filter="category_name">Gmail:${data}</a>
																																																																																															<div class="text-muted fs-7 fw-bolder">Telefono:${row.telefono}</div>
																																																																																															<div class="text-muted fs-7 fw-bolder">Direccion: ${row.direccion}</div>
																																																																																														</div>
																																																																																													`;
							}
						},
						{
							data: 'genero',
							render: function (data, type, row) {
								return `<div class="d-flex">
																																																																																															<div class="ms-0">
																																																																																															<a class="badge badge-light-primary fs-7 m-1">${data}</a>
																																																																																															</div>
																																																																																															</div>`;
							}
						},
						{
							data: 'fechainiciocontrato',
							render: function (data, type, row) {
								return `
																																																																																														<div class="ms-5">
																																																																																															<a 
																																																																																																class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
																																																																																																data-kt-ecommerce-category-filter="category_name">Inicio:${data}</a>
																																																																																															<div class="text-muted fs-7 fw-bolder">Finalizacion:${row.fechafincontrato}</div>
									
																																																																																														</div>
																																																																																													`;
							}
						},
						{
							data: 'created_at',
							render: function (data) {
								// Convertir la fecha a un objeto Date
								var date = new Date(data);
								// Obtener el día, mes y año
								var day = date.getDate();
								var month = date.getMonth(); // Se suma 1 porque los meses van de 0 a 11 en JavaScript
								var year = date.getFullYear();
								var monthNames = [
									"Enero", "Febrero", "Marzo",
									"Abril", "Mayo", "Junio", "Julio",
									"Agosto", "Septiembre", "Octubre",
									"Noviembre", "Diciembre"
								];
								// Formatear la fecha como "dd de mes de yyyy"
								return day + ' de ' + monthNames[month] + ' de ' + year;
							}
						},
						{
							data: 'Actions',
							render: function (data, type, row) {
								return `
																		<div class="text-end">
																		<?php if ($editar || $administrador): ?>
																													<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="btn_editar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-nombre="${row.nombre}" data-descripcion="${row.descripcion}" data-privilegio="${row.grupo_privilegio}">
																														<i class="fa-regular fa-pen-to-square"></i>
																													</a>
																			<?php endif; ?>
																						<?php if ($eliminar || $administrador): ?>
												
																													<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="eliminar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-nombre="${row.nombre}">
																														<i class="fa-solid fa-trash"></i>
																													</a>
																			<?php endif; ?>
																		</div>
																	`;
							}
						},
					],
					// columnDefs: [
					//     {
					//         targets: 0,
					//         orderable: false,
					//         render: function (data) {
					//             return `
					//                 <div class="form-check form-check-sm form-check-custom form-check-solid">
					//                     <input class="form-check-input" type="checkbox" value="${data}" />
					//                 </div>`;
					//         }
					//     },
					// ],
					// Add data-filter attribute
					createdRow: function (row, data, dataIndex) {
						$(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
					}
				});
				table = dt.$;
				// Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
				dt.on('draw', function () {
					initToggleToolbar();
					KTMenu.createInstances();
				});

			}
			// Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
			var handleSearchDatatable = function () {
				const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
				filterSearch.addEventListener('keyup', function (e) {
					dt.search(e.target.value).draw();
				});
			}
			// Init toggle toolbar
			var initToggleToolbar = function () {
				// Toggle selected action toolbar
				// Select all checkboxes
				const container = document.querySelector('#kt_datatable_rol');
				const checkboxes = container.querySelectorAll('[type="checkbox"]');

				// Select elements
				const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

				// Toggle delete selected toolbar
				checkboxes.forEach(c => {
					// Checkbox on click event
					//console.log()
					c.addEventListener('click', function () {

						setTimeout(function () {
							toggleToolbars();
						}, 50);
					});
				});
			}
			return {
				init: function () {
					initDatatable();
					handleSearchDatatable();
					initToggleToolbar();
				}
			}
		}();
		function recargar_tabla() {
			dt.ajax.reload();
		}
		// On document ready
		KTUtil.onDOMContentLoaded(function () {
			KTDatatablesServerSide.init();
		});

		$(document).on("click", "tbody td #eliminar", function () {
			var el = $(this);
			Swal.fire({
				text: "Está seguro de eliminar el conductor :" + el.data("nombre"),
				icon: "error",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Si, eliminar!",
				cancelButtonText: "No, eliminar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						data: { "id": el.data('id'), "nombre": el.data('nombre') },
						type: "POST",
						dataType: "json",
						url: '/gtcec'
					})
						.done(function (data, textStatus, jqXHR) {

							if (data.success) {

								Swal.fire({
									text: data.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.value) {
									}
								});
							} else {
								Swal.fire({
									text: data.message,
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-danger"
									}
								}).then(function (result) {
									if (result.value) {
										//	console.log("error");
									}
								});
							}

							recargar_tabla();
						})
						.fail(function (jqXHR, textStatus, errorThrown) {

							Swal.fire({
								text: "Ocurrio un Error!",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok!",
								customClass: {
									confirmButton: "btn btn-danger"
								}
							}).then(function (result) {

							});

							recargar_tabla();
						});
				}
			});
		});

		$(document).on("click", "#btn_editar", function () {
			var el = $(this);
			//console.log(el.data('id'));
			$.ajax({
				data: { "id": el.data('id') },
				type: "POST",
				dataType: "json",
				url: '/gtcecv',
				success: function (response) {
					//console.log(response);
					//console.log(response[0].id); // Aquí puedes manejar la respuesta del controlador
					$('#id').val(response[0].id);
					$('#nombreConductorEdit').val(response[0].nombre);
					$('#apellidoConductorEdit').val(response[0].apellido);
					$('#cedulaIdentidadEdit').val(response[0].ci);
					$('#numeroLicenciaEdit').val(response[0].numlicencia);
					$('#fechalicenciaEdit').val(response[0].fechalicencia);
					$('#licenciaCheckboxEdit').prop('checked', response[0].licencia == 1);
					$('input[name="catlicenciaedit"][value="' + response[0].catlic + '"]').prop('checked', true);
					$('#correoElectronicoConductorEdit').val(response[0].correoelectronico);
					$('#NroConductorEdit').val(response[0].telefono);
					$('#direccionConductorEdit').val(response[0].direccion);
					$('#CargoConductorEdit').val(response[0].cargo);
					$('#generoConductorEdit').val(response[0].genero);
					$('#fechainicioEdit').val(response[0].fechainiciocontrato);
					$('#fechaFinEdit').val(response[0].fechafincontrato);
					$('#kt_modal_editar_conductor').modal('show');

				},
				error: function (xhr, status, error) {
					console.error(xhr.responseText); // Manejo de errores
				}
			});
		});


	</script>


<?php } elseif (strpos($currentUrl, "gtcav") !== false) { ?>
	<script src="recursos/metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

	<!-- control de modal cerrar-->
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const closeModalBtn = document.getElementById('kt_modal_Automovil_Edit_close');
			const cancelarModalBtn = document.getElementById('kt_modal_Edit_close');
			if (closeModalBtn) {
				closeModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_edit_automovil');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_edit_automovil');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});
		document.addEventListener('DOMContentLoaded', function () {
			const closeModalBtn = document.getElementById('kt_modal_rol_close');
			const cancelarModalBtn = document.getElementById('kt_modal_rol_calcelar');
			if (closeModalBtn) {
				closeModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_add_customer');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_add_customer');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});
	</script>
	<!-- validacion de campos-->
	<script>

		document.addEventListener('DOMContentLoaded', function () {
			document.querySelectorAll('.validar').forEach(function (input) {
				input.addEventListener('input', function () {
					const valor = this.value.trim();
					const validacion = new RegExp(this.getAttribute('data-validacion'));
					const mensaje = this.getAttribute('data-mensaje');

					if (!validacion.test(valor)) {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'No Ingrese caracteres que no corresponden al campo. Verifique por favor.',
							customClass: {
								confirmButton: 'btn btn-primary' // Agrega la clase 'btn btn-success' al botón de confirmación
							}
						});

						this.value = '';
					}
				});
			});
		});
	</script>
	<!-- agregar datos -->
	<script>
		//manejo de check
		$(document).ready(function () {
			$('#soatCheckboxEdit').change(function () {
				if ($(this).is(':checked')) {
					$(this).val('1');
					$('.form-check-label-li-soat').text('Si');
				} else {
					$(this).val('0');
					$('.form-check-label-li-soat').text('No');
				}
			});
		});
		$(document).ready(function () {
			$('#inspeccionCheckboxEdit').change(function () {
				if ($(this).is(':checked')) {
					$(this).val('1');
					$('.form-check-label-li').text('Si');
				} else {
					$(this).val('0');
					$('.form-check-label-li').text('No');
				}
			});
		});
		$('#submitBtnAutomovil').click(function () {
			// Obtener la imagen seleccionada automóvil
			var fileInputAutomovil = $('#avatarAutomovil')[0];
			var fileAutomovil = fileInputAutomovil.files[0];
			// Obtener la imagen seleccionada conductor
			var fileInputConductor = $('#avatarConductor')[0];
			var fileConductor = fileInputConductor.files[0];
			//validacion de foto
			if (!fileAutomovil || !fileConductor) {
				$('#avatarError').text('Seleccione una imagen para automóvil y una imagen para conductor.');
				return;
			}
			$('#avatarError').text('');
			// validar llenado obligatorio
			const marca = $('#marca').val();
			const modelo = $('#modelo').val();
			const nroPasajero = $('#nroPasajero').val();
			const conductoAutomovil = $('#conductoAutomovil').val();
			const nroChasis = $('#nroChasis').val();
			const soatCheckbox = $('#soatCheckbox').val();
			const añoSoat = $('#añoSoat').val();
			const inspeccionCheckbox = $('#inspeccionCheckbox').val();
			const color = $('#color').val();
			const placa = $('#placa').val();
			const dueñoAutomovil = $('#dueñoAutomovil').val();
			const telefono = $('#telefono').val();
			const tipo = $('#tipo').val();
			// Validar que el archivo seleccionado sea una imagen
			if (!['image/png', 'image/jpeg', 'image/jpg'].includes(fileAutomovil.type)) {
				Swal.fire({
					text: "El archivo subio de automovil debe ser una imagen (PNG, JPEG).",
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: "Aceptar",
					customClass: { confirmButton: "btn btn-primary" },
				});
				return;
			}
			// Validar que el archivo seleccionado sea una imagen
			if (!['image/png', 'image/jpeg', 'image/jpg'].includes(fileConductor.type)) {
				Swal.fire({
					text: "El archivo subido del conductor debe ser una imagen (PNG, JPEG).",
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: "Aceptar",
					customClass: { confirmButton: "btn btn-primary" },
				});
				return;
			}

			if (marca.trim() === '' || modelo.trim() === '' || nroPasajero.trim() === '') {
				$('#datosAutomovilError').text('Por favor ingrese los datos pedidos');
				return;
			}
			// Ocultar mensaje de error
			$('#datosAutomovilError').text('');
			//////////////////
			if (!conductoAutomovil) {
				$('#conductorError').text('Por favor seleccione un conductor');
				return;
			}
			$('#conductorError').text('');
			////////////////////////////
			if (nroChasis.trim() === '' || añoSoat.trim() === '' || color.trim() === '' || placa.trim() === '') {
				$('#datosCompletosError').text('Por favor ingrese los datos pedidos');
				return;
			}
			// Ocultar mensaje de error
			$('#datosCompletosError').text('');
			//////////////////
			if (dueñoAutomovil.trim() === '') {
				$('#dueñoAutomovilError').text('Por favor ingrese dueño del conductor');
				return;
			}
			// Ocultar mensaje de error
			$('#dueñoAutomovilError').text('');
			//////////////////
			if (telefono.trim() === '') {
				$('#telefonoError').text('Por favor ingrese telefono del dueño del conductor');
				return;
			}
			// Ocultar mensaje de error
			$('#telefonoError').text('');
			//////////////////
			if (tipo.trim() === '') {
				$('#tipoError').text('Por favor ingrese el tipo de automovil');
				return;
			}
			// Ocultar mensaje de error
			$('#tipoError').text('');


			// Crear un objeto FormData y agregar la imagen seleccionada
			var formData = new FormData();
			formData.append('avatarAutomovil', fileAutomovil);
			formData.append('avatarConductor', fileConductor);
			formData.append('marca', marca);
			formData.append('modelo', modelo);
			formData.append('nroPasajero', nroPasajero);
			formData.append('conductoAutomovil', conductoAutomovil);
			formData.append('nroChasis', nroChasis);
			formData.append('soatCheckbox', soatCheckbox);
			formData.append('añoSoat', añoSoat);
			formData.append('inspeccionCheckbox', inspeccionCheckbox);
			formData.append('color', color);
			formData.append('placa', placa);
			formData.append('dueñoAutomovil', dueñoAutomovil);
			formData.append('telefono', telefono);
			formData.append('tipo', tipo);

			console.log(formData);
			// Enviar la imagen y otros datos al controlador mediante AJAX
			$.ajax({
				url: '/gtcaa',
				type: 'POST',
				dataType: 'json',
				data: formData,
				processData: false,
				contentType: false,
				success: function (response) {
					if (response.success) {
						// Tu código de éxito
						console.log(response);
						Swal.fire({
							text: "Datos enviados correctamente.",
							icon: "success",
							buttonsStyling: false,
							confirmButtonText: "Ok, entendido!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						}).then((result) => {
							if (result.isConfirmed) {
								const modal = document.querySelector('.modal');
								if (modal) {
									const modalInstance = bootstrap.Modal.getInstance(modal);
									modalInstance.hide();
								}
							}
						});
						limpiarAutomovil();
						recargar_tabla();
					} else {
						// Tu código de error
						Swal.fire({
							text: "ERROR, Por favor verifique e intente nuevamente ",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
						limpiarAutomovil();
					}
				},
				error: function () {
					// Tu código de error
					Swal.fire({
						text: "Error Fatal, Sistema fuera de servicio, intentar más tarde por favor ",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Aceptar!",
						customClass: { confirmButton: "btn btn-primary" },
					});
					limpiarAutomovil();
				}
			});
		});


		function limpiarAutomovil() {
			$('#marca').val('');
			$('#modelo').val('');
			$('#nroPasajero').val('');
			$('#conductoAutomovil').val('');
			$('#nroChasis').val('');
			$('#añoSoat').val('');
			$('#color').val('');
			$('#placa').val('');
			$('#dueñoAutomovil').val('');
			$('#telefono').val('');
			$('#tipo').val('');
		}
		function recargar_tabla() {
			dt.ajax.reload();
		}
	</script>
	<!-- editar datos -->
	<script>
		//datos a editar
		$('#submitBtnEditAutomovil').click(function () {
			const id = $('#id').val();
			// Obtener la imagen seleccionada automóvil
			var fileInputAutomovil = $('#avatarAutomovilEdit')[0];
			var fileAutomovil = fileInputAutomovil.files[0];
			// Obtener la imagen seleccionada conductor
			var fileInputConductor = $('#avatarConductorEdit')[0];
			var fileConductor = fileInputConductor.files[0];
			//validacion de foto
			if (!fileAutomovil || !fileConductor) {
				$('#avatarErrorEdit').text('Seleccione una imagen para automóvil y una imagen para conductor.');
				return;
			}
			$('#avatarErrorEdit').text('');
			// validar llenado obligatorio
			const marca = $('#marcaEdit').val();
			const modelo = $('#modeloEdit').val();
			const nroPasajero = $('#nroPasajeroEdit').val();
			const conductoAutomovil = $('#conductoAutomovilEdit').val();
			const nroChasis = $('#nroChasisEdit').val();
			const soatCheckbox = $('#soatCheckboxEdit').val();
			const añoSoat = $('#añoSoatEdit').val();
			const inspeccionCheckbox = $('#inspeccionCheckboxEdit').val();
			const color = $('#colorEdit').val();
			const placa = $('#placaEdit').val();
			const dueñoAutomovil = $('#dueñoAutomovilEdit').val();
			const telefono = $('#telefonoEdit').val();
			const tipo = $('#tipoEdit').val();
			// Validar que el archivo seleccionado sea una imagen
			if (!['image/png', 'image/jpeg', 'image/jpg'].includes(fileAutomovil.type)) {
				Swal.fire({
					text: "El archivo subio de automovil debe ser una imagen (PNG, JPEG).",
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: "Aceptar",
					customClass: { confirmButton: "btn btn-primary" },
				});
				return;
			}
			// Validar que el archivo seleccionado sea una imagen
			if (!['image/png', 'image/jpeg', 'image/jpg'].includes(fileConductor.type)) {
				Swal.fire({
					text: "El archivo subido del conductor debe ser una imagen (PNG, JPEG).",
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: "Aceptar",
					customClass: { confirmButton: "btn btn-primary" },
				});
				return;
			}

			if (marca.trim() === '' || modelo.trim() === '' || nroPasajero.trim() === '') {
				$('#datosAutomovilErrorEdit').text('Por favor ingrese los datos pedidos');
				return;
			}
			// Ocultar mensaje de error
			$('#datosAutomovilErrorEdit').text('');
			//////////////////
			if (!conductoAutomovil) {
				$('#conductorErrorEdit').text('Por favor seleccione un conductor');
				return;
			}
			$('#conductorErrorEdit').text('');
			////////////////////////////
			if (nroChasis.trim() === '' || añoSoat.trim() === '' || color.trim() === '' || placa.trim() === '') {
				$('#datosCompletosErrorEdit').text('Por favor ingrese los datos pedidos');
				return;
			}
			// Ocultar mensaje de error
			$('#datosCompletosErrorEdit').text('');
			//////////////////
			if (dueñoAutomovil.trim() === '') {
				$('#dueñoAutomovilErrorEdit').text('Por favor ingrese dueño del conductor');
				return;
			}
			// Ocultar mensaje de error
			$('#dueñoAutomovilErrorEdit').text('');
			//////////////////
			if (telefono.trim() === '') {
				$('#telefonoErrorEdit').text('Por favor ingrese telefono del dueño del conductor');
				return;
			}
			// Ocultar mensaje de error
			$('#telefonoErrorEdit').text('');
			//////////////////
			if (tipo.trim() === '') {
				$('#tipoErrorEdit').text('Por favor ingrese el tipo de automovil');
				return;
			}
			// Ocultar mensaje de error
			$('#tipoErrorEdit').text('');


			// Crear un objeto FormData y agregar la imagen seleccionada

			var formData = new FormData();
			formData.append('id', id);
			formData.append('avatarAutomovil', fileAutomovil);
			formData.append('avatarConductor', fileConductor);
			formData.append('marca', marca);
			formData.append('modelo', modelo);
			formData.append('nroPasajero', nroPasajero);
			formData.append('conductoAutomovil', conductoAutomovil);
			formData.append('nroChasis', nroChasis);
			formData.append('soatCheckbox', soatCheckbox);
			formData.append('añoSoat', añoSoat);
			formData.append('inspeccionCheckbox', inspeccionCheckbox);
			formData.append('color', color);
			formData.append('placa', placa);
			formData.append('dueñoAutomovil', dueñoAutomovil);
			formData.append('telefono', telefono);
			formData.append('tipo', tipo);

			console.log(formData);
			// Enviar la imagen y otros datos al controlador mediante AJAX
			$.ajax({
				url: '/gtcau',
				type: 'POST',
				dataType: 'json',
				data: formData,
				processData: false,
				contentType: false,
				success: function (response) {
					if (response.success) {
						// Tu código de éxito
						console.log(response);
						Swal.fire({
							text: "Datos editados correctamente.",
							icon: "success",
							buttonsStyling: false,
							confirmButtonText: "Ok, entendido!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						}).then((result) => {
							if (result.isConfirmed) {
								const modal = document.getElementById('kt_modal_edit_automovil');
								if (modal) {
									const modalInstance = bootstrap.Modal.getInstance(modal);
									modalInstance.hide();
								}
							}
						});
						recargar_tabla();
					} else {
						// Tu código de error
						Swal.fire({
							text: "ERROR, Por favor verifique e intente nuevamente ",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
						limpiarAutomovil();
					}
				},
				error: function () {
					// Tu código de error
					Swal.fire({
						text: "Error Fatal, Sistema fuera de servicio, intentar más tarde por favor ",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Aceptar!",
						customClass: { confirmButton: "btn btn-primary" },
					});
					limpiarAutomovil();
				}
			});
		});


		function recargar_tabla() {
			dt.ajax.reload();
		}

	</script>
	<!-- script para listar datos , para eliminar y llena los datos para modificar  -->
	<script>
		$.urlParam = function (name) {
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		var table;
		var dt;
		var filterPayment;
		// Class definition
		var KTDatatablesServerSide = function () {
			// Private functions
			var initDatatable = function () {
				dt = $("#kt_datatable_rol").DataTable({
					searchDelay: 500,
					processing: true,
					serverSide: true,
					order: [[1, 'asc']],
					stateSave: true,
					select: {
						style: 'multi',
						selector: 'td:first-child input[type="checkbox"]',
						className: 'row-selected'
					},
					ajax: {
						//hostUrl+"allTipoIndice?c="+$.urlParam('c'),
						url: '/gtcdav',
						dataSrc: 'data' // La propiedad que contiene los datos en la respuesta JSON
					},
					columns: [
						{
							data: 'nombreconductor',
							render: function (data, type, row) {
								return `
																																																																														<div class="d-flex align-items-center">
																																																																															<div class="symbol symbol-45px me-5">
																																																																																<a href="uploads/Automoviles/${row.imagenautomovil}" data-lightbox="gallery" data-title="CONDUCTOR: ${data} ${row.apellidoconductor}" class="lightbox-link">
																																																																																	<img src="uploads/Automoviles/${row.imagenautomovil}" alt="" style="max-width: 45px; max-height: 45px; position:align-items-center ">
																																																																																</a>
																																																																															</div>
																																																																															<div class="d-flex justify-content-start flex-column">
																																																																																<a  class="text-dark fw-bold text-hover-primary fs-6">${data}</a>
																																																																																<span class="text-muted fw-semibold text-muted d-block fs-7">${row.apellidoconductor}</span>
																																																																															</div>
																																																																														</div>
																																																																													`;
							}
						},
						{
							data: 'placa',
							render: function (data, type, row) {
								return `

																																																																																	<div class="d-flex align-items-center">
																																																																															<div class="symbol symbol-45px me-5">
																																																																																<a href="uploads/Conductores/${row.imagenconductor}" data-lightbox="gallery" data-title="AUTOMOVIL: NRO. PLACA: ${data} MARCA: ${row.marca}" class="lightbox-link">
																																																																																	<img src="uploads/Conductores/${row.imagenconductor}" alt="" style="max-width: 45px; max-height: 45px; position:align-items-center ">
																																																																																</a>
																																																																															</div>
																																																																															<div class="d-flex justify-content-start flex-column">
																																																																																							<a  class="text-dark fw-bold text-hover-primary fs-6">Placa:${data}</a>
																																																																																							<span class="text-muted fw-semibold text-muted d-block fs-7">Marca:${row.marca}</span>
																																																																																							<span class="text-muted fw-semibold text-muted d-block fs-7">Modelo:${row.modelo}</span>
																																																																																							<span class="text-muted fw-semibold text-muted d-block fs-7">Color:${row.color}</span>
																																																																																						</div>
																																																																														</div>
																																																																																				`;
							}
						},
						{
							data: 'nrochasis',
							render: function (data, type, row) {
								return `
																																																																																	<a class="text-dark fw-bold text-hover-primary d-block fs-6">Nro. de Chasis: ${data}</a>
																																																																																	<span class="text-muted fw-semibold text-muted d-block fs-7">Nro. de Pasajeros: ${row.nropasajeros}</span>
																																																																																	<span class="text-muted fw-semibold text-muted d-block fs-7">Tipo de vehiculo: ${row.tipovehiculo}</span>
																																																													
																																																																												`;
							}
						},
						{
							data: 'soat',
							render: function (data, type, row) {
								let badgeClass = data === '1' ? 'badge-light-primary' : 'badge-light-danger';
								let badgeText = data === '1' ? 'Sí' : 'No';
								let badgeClass1 = row.inspeccion === '1' ? 'badge-light-primary' : 'badge-light-danger';
								let badgeText1 = row.inspeccion === '1' ? 'Sí' : 'No';

								return `
																																																																															<div class="d-flex">
																																																																																<div class="ms-0">
																																																																																<span class="text-dark fw-bold text-hover-primary d-block fs-6">
																																																																																¿Soat?=<a class="badge ${badgeClass} fs-7 m-1">${badgeText}</a> ${data} Año: ${row.a_soat}
																																																																																</span>
																																																																																</div>
																																																																															</div>
																																																																															<div class="d-flex">
																																																																															<div class="ms-0">
																																																																																<span class="text-dark fw-bold text-hover-primary d-block fs-6">
																																																																																Inspeccion?=<a class="badge ${badgeClass1} fs-7 m-1">${badgeText1}</a>
																																																																																</span>
																																																																																</div>
																																																																															</div>
																																																																															`;
							}
						},
						{
							data: 'duenomovil',
							render: function (data, type, row) {
								return `
																																																																																	<a class="text-dark fw-bold text-hover-primary d-block fs-6">Nombre: ${data}</a>
																																																																																	<span class="text-muted fw-semibold text-muted d-block fs-7">Telefono: ${row.nrotelefono}</span>																																																				
																																																																												`;
							}
						},
						{
							data: 'created_at',
							render: function (data) {
								// Convertir la fecha a un objeto Date
								var date = new Date(data);
								// Obtener el día, mes y año
								var day = date.getDate();
								var month = date.getMonth(); // Se suma 1 porque los meses van de 0 a 11 en JavaScript
								var year = date.getFullYear();
								var monthNames = [
									"Enero", "Febrero", "Marzo",
									"Abril", "Mayo", "Junio", "Julio",
									"Agosto", "Septiembre", "Octubre",
									"Noviembre", "Diciembre"
								];
								// Formatear la fecha como "dd de mes de yyyy"
								return day + ' de ' + monthNames[month] + ' de ' + year;
							}
						},
						{
							data: 'Actions',
							render: function (data, type, row) {
								return `
																		<div class="text-end">
																		<?php if ($editar || $administrador): ?>
																													<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="btn_editar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-modelo="${row.nombre}" data-descripcion="${row.descripcion}">
																														<i class="fa-regular fa-pen-to-square"></i>
																													</a>
																			<?php endif; ?>
																						<?php if ($eliminar || $administrador): ?>
																													<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="eliminar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-modelo="${row.modelo}">
																														<i class="fa-solid fa-trash"></i>
																													</a>
																			<?php endif; ?>
																		</div>
																	`;
							}
						},
					],
					// columnDefs: [
					//     {
					//         targets: 0,
					//         orderable: false,
					//         render: function (data) {
					//             return `
					//                 <div class="form-check form-check-sm form-check-custom form-check-solid">
					//                     <input class="form-check-input" type="checkbox" value="${data}" />
					//                 </div>`;
					//         }
					//     },
					// ],
					// Add data-filter attribute
					createdRow: function (row, data, dataIndex) {
						$(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
					}
				});
				table = dt.$;
				// Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
				dt.on('draw', function () {
					initToggleToolbar();
					KTMenu.createInstances();
				});

			}
			// Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
			var handleSearchDatatable = function () {
				const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
				filterSearch.addEventListener('keyup', function (e) {
					dt.search(e.target.value).draw();
				});
			}
			// Init toggle toolbar
			var initToggleToolbar = function () {
				// Toggle selected action toolbar
				// Select all checkboxes
				const container = document.querySelector('#kt_datatable_rol');
				const checkboxes = container.querySelectorAll('[type="checkbox"]');

				// Select elements
				const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

				// Toggle delete selected toolbar
				checkboxes.forEach(c => {
					// Checkbox on click event
					//console.log()
					c.addEventListener('click', function () {

						setTimeout(function () {
							toggleToolbars();
						}, 50);
					});
				});
			}
			return {
				init: function () {
					initDatatable();
					handleSearchDatatable();
					initToggleToolbar();
				}
			}
		}();
		function recargar_tabla() {
			dt.ajax.reload();
		}
		// On document ready
		KTUtil.onDOMContentLoaded(function () {
			KTDatatablesServerSide.init();
		});

		$(document).on("click", "tbody td #eliminar", function () {
			var el = $(this);
			Swal.fire({
				text: "Está seguro de eliminar el vehiculo de modelo :" + el.data("modelo"),
				icon: "error",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Si, eliminar!",
				cancelButtonText: "No, eliminar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						data: { "id": el.data('id'), "nombre": el.data('modelo') },
						type: "POST",
						dataType: "json",
						url: '/gtcea'
					})
						.done(function (data, textStatus, jqXHR) {

							if (data.success) {

								Swal.fire({
									text: data.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.value) {
									}
								});
							} else {
								Swal.fire({
									text: data.message,
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-danger"
									}
								}).then(function (result) {
									if (result.value) {
										//	console.log("error");
									}
								});
							}

							recargar_tabla();
						})
						.fail(function (jqXHR, textStatus, errorThrown) {

							Swal.fire({
								text: "Ocurrio un Error!",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok!",
								customClass: {
									confirmButton: "btn btn-danger"
								}
							}).then(function (result) {

							});

							recargar_tabla();
						});
				}
			});
		});

		$(document).on("click", "#btn_editar", function () {
			var el = $(this);
			//console.log(el.data('id'));
			$.ajax({
				data: { "id": el.data('id') },
				type: "POST",
				dataType: "json",
				url: '/gtceav',
				success: function (response) {
					console.log(response);
					//console.log(response[0].id); // Aquí puedes manejar la respuesta del controlador
					$('#id').val(response[0].id);

					// Obtener los nombres de imagen de la respuesta
					const nombreImagen1 = response[0].imagenautomovil;
					const nombreImagen2 = response[0].imagenconductor;

					// Construir la URL de la imagen utilizando los nombres de imagen
					const urlImagen1 = "uploads/Automoviles/" + nombreImagen1;
					const urlImagen2 = "uploads/Conductores/" + nombreImagen2;

					const divImagen1 = $('#image-wrapper-1'); // Ajusta el ID según corresponda
					const divImagen2 = $('#image-wrapper-2');

					// Establecer la URL de la imagen en el estilo background-image de los divs
					divImagen1.css('background-image', `url('${urlImagen1}')`);
					divImagen2.css('background-image', `url('${urlImagen2}')`);

					$('#marcaEdit').val(response[0].marca);
					$('#modeloEdit').val(response[0].modelo);
					$('#nroPasajeroEdit').val(response[0].nropasajeros);
					$('#conductoAutomovilEdit').val(response[0].conductorid);
					$('#nroChasisEdit').val(response[0].nrochasis);
					$('#soatCheckboxEdit').prop('checked', response[0].soat == 1);
					$('#añoSoatEdit').val(response[0].a_soat);
					$('#inspeccionCheckboxEdit').prop('checked', response[0].inspeccion == 1);
					$('#colorEdit').val(response[0].color);
					$('#placaEdit').val(response[0].placa);
					$('#dueñoAutomovilEdit').val(response[0].duenomovil);
					$('#telefonoEdit').val(response[0].nrotelefono);
					$('#tipoEdit').val(response[0].tipovehiculo);
					$('#kt_modal_edit_automovil').modal('show');

				},
				error: function (xhr, status, error) {
					console.error(xhr.responseText); // Manejo de errores
				}
			});
		});

	</script>

	<script>
		$(document).ready(function () {
			lightbox.option({
				'resizeDuration': 100,
				'wrapAround': true
			});
		});

	</script>

<?php } elseif (strpos($currentUrl, "gtctv") !== false) { ?>
	<script src="recursos/metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<!-- control de modal cerrar-->
	<script>
		//modal de editar
		document.addEventListener('DOMContentLoaded', function () {
			const closeModalBtn = document.getElementById('kt_modal_Guia_close_Edit');
			const cancelarModalBtn = document.getElementById('kt_modal_Guia_Edit_cancelar');
			if (closeModalBtn) {
				closeModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_telefono_edit');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_telefono_edit');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});
		//modal de agregar
		document.addEventListener('DOMContentLoaded', function () {
			const closeModalBtn = document.getElementById('kt_modal_Guia_close');
			const cancelarModalBtn = document.getElementById('kt_modal_Guia_cancelar');
			if (closeModalBtn) {
				closeModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_add_customer');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_add_customer');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});
	</script>
	<!-- validacion de campos-->
	<script>

		document.addEventListener('DOMContentLoaded', function () {
			document.querySelectorAll('.validar').forEach(function (input) {
				input.addEventListener('input', function () {
					const valor = this.value.trim();
					const validacion = new RegExp(this.getAttribute('data-validacion'));
					const mensaje = this.getAttribute('data-mensaje');

					if (!validacion.test(valor)) {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'No Ingrese caracteres que no corresponden al campo. Verifique por favor.',
							customClass: {
								confirmButton: 'btn btn-primary' // Agrega la clase 'btn btn-success' al botón de confirmación
							}
						});

						this.value = '';
					}
				});
			});
		});
	</script>
	<!-- agregar datos -->
	<script>
		$('#submitBtnContacto').click(function () {
			const nombre = $('#nombre').val();
			const cargo = $('#cargo').val();
			const correoElectronico = $('#correoElectronico').val();
			const numeroTelefonico = $('#numeroTelefonico').val();
			const direccionDomicilio = $('#direccionDomicilio').val();
			//////////////////
			if (nombre.trim() === '') {
				$('#nombreError').text('Por favor ingrese el nombre del contacto');
				return;
			}
			// Ocultar mensaje de error
			$('#nombreError').text('');
			//////////////////
			if (cargo.trim() === '') {
				$('#cargoError').text('Por favor ingrese el cargo del registro del contacto');
				return;
			}
			// Ocultar mensaje de error
			$('#cargoError').text('');
			//////////////////
			if (correoElectronico.trim() === '') {
				$('#correoElectronicoError').text('Por favor ingrese el correo electronico');
				return;
			}
			// Ocultar mensaje de error
			$('#correoElectronicoError').text('');
			//////////////////
			if (numeroTelefonico.trim() === '') {
				$('#numeroTelefonicoError').text('Por favor ingrese el numero de telefono');
				return;
			}
			// Ocultar mensaje de error
			$('#numeroTelefonicoError').text('');
			//////////////////
			if (direccionDomicilio.trim() === '') {
				$('#direccionDomicilioError').text('Por favor ingrese la direccion del domicilio');
				return;
			}
			// Ocultar mensaje de error
			$('#direccionDomicilioError').text('');

			// Crear un objeto FormData y agregar la imagen seleccionada
			var formData = new FormData();
			formData.append('nombre', nombre);
			formData.append('cargo', cargo);
			formData.append('correoElectronico', correoElectronico);
			formData.append('numeroTelefonico', numeroTelefonico);
			formData.append('direccionDomicilio', direccionDomicilio);

			console.log(formData);
			// Enviar la imagen y otros datos al controlador mediante AJAX
			$.ajax({
				url: '/gtcat',
				type: 'POST',
				dataType: 'json',
				data: formData,
				processData: false,
				contentType: false,
				success: function (response) {
					if (response.success) {
						// Tu código de éxito
						console.log(response);
						Swal.fire({
							text: "Datos enviados correctamente.",
							icon: "success",
							buttonsStyling: false,
							confirmButtonText: "Ok, entendido!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						}).then((result) => {
							if (result.isConfirmed) {
								const modal = document.querySelector('.modal');
								if (modal) {
									const modalInstance = bootstrap.Modal.getInstance(modal);
									modalInstance.hide();
								}
							}
						});
						limpiarAutomovil();
						recargar_tabla();
					} else {
						// Tu código de error
						Swal.fire({
							text: "ERROR, Por favor verifique e intente nuevamente ",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
						limpiarAutomovil();
					}
				},
				error: function () {
					// Tu código de error
					Swal.fire({
						text: "Error Fatal, Sistema fuera de servicio, intentar más tarde por favor ",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Aceptar!",
						customClass: { confirmButton: "btn btn-primary" },
					});
					limpiarAutomovil();
				}
			});
		});
		function limpiarAutomovil() {
			$('#nombre').val('');
			$('#cargo').val('');
			$('#correoElectronico').val('');
			$('#numeroTelefonico').val('');
			$('#direccionDomicilio').val('');

		}
		function recargar_tabla() {
			dt.ajax.reload();
		}
	</script>
	<!-- script para listar datos , para eliminar y llena los datos para modificar  -->
	<script>
		$.urlParam = function (name) {
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		var table;
		var dt;
		var filterPayment;
		// Class definition
		var KTDatatablesServerSide = function () {
			// Private functions
			var initDatatable = function () {
				dt = $("#kt_datatable_rol").DataTable({
					searchDelay: 500,
					processing: true,
					serverSide: true,
					order: [[1, 'asc']],
					stateSave: true,
					select: {
						style: 'multi',
						selector: 'td:first-child input[type="checkbox"]',
						className: 'row-selected'
					},
					ajax: {
						//hostUrl+"allTipoIndice?c="+$.urlParam('c'),
						url: '/gtcdtv',
						dataSrc: 'data' // La propiedad que contiene los datos en la respuesta JSON
					},
					columns: [
						{
							data: 'nombre',
							render: function (data, type, row) {
								return `
																																																																							<a class="text-dark fw-bold text-hover-primary d-block fs-6">Nombre: ${data}</a>
																																																																							<span class="text-muted fw-semibold text-muted d-block fs-7">Cargo: ${row.cargo}</span>
																																																																												`;
							}
						},
						{
							data: 'telefono',
							render: function (data, type, row) {
								return `
																																																																																	<a class="text-dark fw-bold text-hover-primary d-block fs-6">Telefono: ${data}</a>
																																																																																	<span class="text-muted fw-semibold text-muted d-block fs-7">Gmail: ${row.correoelectronico}</span>																																																				
																																																																												`;
							}
						},
						{
							data: 'direccion',
							render: function (data, type, row) {
								return `
																																																																																	<a class="text-dark fw-bold text-hover-primary d-block fs-6">Direccion: ${data}</a>
																																																																												`;
							}
						},
						{
							data: 'created_at',
							render: function (data) {
								// Convertir la fecha a un objeto Date
								var date = new Date(data);
								// Obtener el día, mes y año
								var day = date.getDate();
								var month = date.getMonth(); // Se suma 1 porque los meses van de 0 a 11 en JavaScript
								var year = date.getFullYear();
								var monthNames = [
									"Enero", "Febrero", "Marzo",
									"Abril", "Mayo", "Junio", "Julio",
									"Agosto", "Septiembre", "Octubre",
									"Noviembre", "Diciembre"
								];
								// Formatear la fecha como "dd de mes de yyyy"
								return day + ' de ' + monthNames[month] + ' de ' + year;
							}
						},
						{
							data: 'Actions',
							render: function (data, type, row) {
								return `
																				<div class="text-end">
																				<?php if ($editar || $administrador): ?>
																															<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="btn_editar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-modelo="${row.nombre}" data-descripcion="${row.descripcion}">
																																<i class="fa-regular fa-pen-to-square"></i>
																															</a>
																					<?php endif; ?>
																						<?php if ($eliminar || $administrador): ?>
												
																															<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="eliminar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-nombre="${row.nombre}">
																																<i class="fa-solid fa-trash"></i>
																															</a>
																					<?php endif; ?>
																				</div>
																			`;
							}
						},
					],
					// columnDefs: [
					//     {
					//         targets: 0,
					//         orderable: false,
					//         render: function (data) {
					//             return `
					//                 <div class="form-check form-check-sm form-check-custom form-check-solid">
					//                     <input class="form-check-input" type="checkbox" value="${data}" />
					//                 </div>`;
					//         }
					//     },
					// ],
					// Add data-filter attribute
					createdRow: function (row, data, dataIndex) {
						$(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
					}
				});
				table = dt.$;
				// Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
				dt.on('draw', function () {
					initToggleToolbar();
					KTMenu.createInstances();
				});

			}
			// Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
			var handleSearchDatatable = function () {
				const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
				filterSearch.addEventListener('keyup', function (e) {
					dt.search(e.target.value).draw();
				});
			}
			// Init toggle toolbar
			var initToggleToolbar = function () {
				// Toggle selected action toolbar
				// Select all checkboxes
				const container = document.querySelector('#kt_datatable_rol');
				const checkboxes = container.querySelectorAll('[type="checkbox"]');

				// Select elements
				const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

				// Toggle delete selected toolbar
				checkboxes.forEach(c => {
					// Checkbox on click event
					//console.log()
					c.addEventListener('click', function () {

						setTimeout(function () {
							toggleToolbars();
						}, 50);
					});
				});
			}
			return {
				init: function () {
					initDatatable();
					handleSearchDatatable();
					initToggleToolbar();
				}
			}
		}();
		function recargar_tabla() {
			dt.ajax.reload();
		}
		// On document ready
		KTUtil.onDOMContentLoaded(function () {
			KTDatatablesServerSide.init();
		});

		$(document).on("click", "tbody td #eliminar", function () {
			var el = $(this);
			Swal.fire({
				text: "Está seguro de eliminar el contacto del usuario:" + el.data("nombre"),
				icon: "error",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Si, eliminar!",
				cancelButtonText: "No, eliminar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						data: { "id": el.data('id'), "nombre": el.data('modelo') },
						type: "POST",
						dataType: "json",
						url: '/gtcet'
					})
						.done(function (data, textStatus, jqXHR) {

							if (data.success) {

								Swal.fire({
									text: data.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.value) {
									}
								});
							} else {
								Swal.fire({
									text: data.message,
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-danger"
									}
								}).then(function (result) {
									if (result.value) {
										//	console.log("error");
									}
								});
							}

							recargar_tabla();
						})
						.fail(function (jqXHR, textStatus, errorThrown) {

							Swal.fire({
								text: "Ocurrio un Error!",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok!",
								customClass: {
									confirmButton: "btn btn-danger"
								}
							}).then(function (result) {

							});

							recargar_tabla();
						});
				}
			});
		});

		$(document).on("click", "#btn_editar", function () {
			var el = $(this);
			//console.log(el.data('id'));
			$.ajax({
				data: { "id": el.data('id') },
				type: "POST",
				dataType: "json",
				url: '/gtcetv',
				success: function (response) {
					console.log(response);
					//console.log(response[0].id); // Aquí puedes manejar la respuesta del controlador
					$('#id').val(response[0].id);
					$('#nombreEdit').val(response[0].nombre);
					$('#cargoEdit').val(response[0].cargo);
					$('#correoElectronicoEdit').val(response[0].correoelectronico);
					$('#numeroTelefonicoEdit').val(response[0].telefono);
					$('#direccionDomicilioEdit').val(response[0].direccion);
					$('#kt_modal_telefono_edit').modal('show');

				},
				error: function (xhr, status, error) {
					console.error(xhr.responseText); // Manejo de errores
				}
			});
		});

	</script>
	<!-- agregar editar -->
	<script>
		$('#submitBtnTelefonoEdit').click(function () {
			const id = $('#id').val();
			const nombre = $('#nombreEdit').val();
			const cargo = $('#cargoEdit').val();
			const correoElectronico = $('#correoElectronicoEdit').val();
			const numeroTelefonico = $('#numeroTelefonicoEdit').val();
			const direccionDomicilio = $('#direccionDomicilioEdit').val();
			if (nombre.trim() === '') {
				$('#nombreErrorEdit').text('Por favor ingrese el nombre del contacto');
				return;
			}
			// Ocultar mensaje de error
			$('#nombreErrorEdit').text('');
			if (cargo.trim() === '') {
				$('#cargoErrorEdit').text('Por favor ingrese el cargo del registro del contacto');
				return;
			}
			// Ocultar mensaje de error
			$('#cargoErrorEdit').text('');
			if (correoElectronico.trim() === '') {
				$('#correoElectronicoErrorEdit').text('Por favor ingrese el correo electronico');
				return;
			}
			// Ocultar mensaje de error
			$('#correoElectronicoErrorEdit').text('');
			if (numeroTelefonico.trim() === '') {
				$('#numeroTelefonicoErrorEdit').text('Por favor ingrese el numero de telefono');
				return;
			}
			// Ocultar mensaje de error
			$('#numeroTelefonicoErrorEdit').text('');
			if (direccionDomicilio.trim() === '') {
				$('#direccionDomicilioErrorEdit').text('Por favor ingrese la direccion del domicilio');
				return;
			}
			// Ocultar mensaje de error
			$('#direccionDomicilioErrorEdit').text('');
			// Crear un objeto FormData y agregar la imagen seleccionada
			var formData1 = new FormData();
			formData1.append('id', id);
			formData1.append('nombre', nombre);
			formData1.append('cargo', cargo);
			formData1.append('correoElectronico', correoElectronico);
			formData1.append('numeroTelefonico', numeroTelefonico);
			formData1.append('direccionDomicilio', direccionDomicilio);
			//console.log(formData1);
			// Enviar la imagen y otros datos al controlador mediante AJAX
			$.ajax({
				url: '/gtcate',
				type: 'POST',
				dataType: 'json',
				data: formData1,
				processData: false,
				contentType: false,
				success: function (response) {
					if (response.success) {
						// Tu código de éxito
						//console.log(response);
						Swal.fire({
							text: "Datos editados correctamente.",
							icon: "success",
							buttonsStyling: false,
							confirmButtonText: "Ok, entendido!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						}).then((result) => {
							if (result.isConfirmed) {
								const modal = document.getElementById('kt_modal_telefono_edit');
								if (modal) {
									const modalInstance = bootstrap.Modal.getInstance(modal);
									modalInstance.hide();
								}
							}
						});
						recargar_tabla();
					} else {
						// Tu código de error
						Swal.fire({
							text: "ERROR, Por favor verifique e intente nuevamente ",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
					}
				},
				error: function () {
					// Tu código de error
					Swal.fire({
						text: "Error Fatal, Sistema fuera de servicio, intentar más tarde por favor ",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Aceptar!",
						customClass: { confirmButton: "btn btn-primary" },
					});
				}
			});
		});

		function recargar_tabla() {
			dt.ajax.reload();
		}
	</script>

<?php } elseif (strpos($currentUrl, "gdcgv") !== false) { ?>
	<script src="recursos/metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<!-- control de modal cerrar-->
	<script>
		//modal de editar
		document.addEventListener('DOMContentLoaded', function () {
			const closeModalBtn = document.getElementById('kt_modal_GPS_Edit_close');
			const cancelarModalBtn = document.getElementById('kt_modal_GPS_cancelar_Edit');
			if (closeModalBtn) {
				closeModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_GPS_Edit');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_GPS_Edit');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});
		//modal de agregar
		document.addEventListener('DOMContentLoaded', function () {
			const closeModalBtn = document.getElementById('kt_modal_GPS_close');
			const cancelarModalBtn = document.getElementById('kt_modal_GPS_cancelar');
			if (closeModalBtn) {
				closeModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_add_customer');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_add_customer');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});
	</script>
	<!-- validacion de campos-->
	<script>

		document.addEventListener('DOMContentLoaded', function () {
			document.querySelectorAll('.validar').forEach(function (input) {
				input.addEventListener('input', function () {
					const valor = this.value.trim();
					const validacion = new RegExp(this.getAttribute('data-validacion'));
					const mensaje = this.getAttribute('data-mensaje');

					if (!validacion.test(valor)) {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'No Ingrese caracteres que no corresponden al campo. Verifique por favor.',
							customClass: {
								confirmButton: 'btn btn-primary' // Agrega la clase 'btn btn-success' al botón de confirmación
							}
						});

						this.value = '';
					}
				});
			});
		});
	</script>
	<!-- agregar datos -->
	<script>
		$('#submitBtnGPS').click(function () {

			const marca = $('#marca').val();
			const modelo = $('#modelo').val();
			const mobilidad = $('#movilidad').val();
			const descripcion = $('#descripcion').val();
			const detalles = $('#detalles').val();
			if (marca.trim() === '') {
				$('#marcaError').text('Por favor ingrese la marca del dispositivo');
				return;
			}
			// Ocultar mensaje de error
			$('#marcaError').text('');
			if (modelo.trim() === '') {
				$('#modeloError').text('Por favor ingrese el modelo del dispositivo');
				return;
			}
			// Ocultar mensaje de error
			$('#modeloError').text('');
			if (mobilidad.trim() === '') {
				$('#movilidadError').text('Por favor ingrese la placa de la movilidad donde se instala el dispositivo');
				return;
			}
			// Ocultar mensaje de error
			$('#movilidadError').text('');
			if (descripcion.trim() === '') {
				$('#descripcionError').text('Por favor ingrese una descripcion corta del dispositivo');
				return;
			}
			// Ocultar mensaje de error
			$('#descripcionError').text('');
			if (detalles.trim() === '') {
				$('#detallesError').text('Por favor ingrese detalles necesarios del dispositivo');
				return;
			}
			// Ocultar mensaje de error
			$('#detallesError').text('');
			// Crear un objeto FormData y agregar la imagen seleccionada
			//	console.log(mobilidad)

			var formData = new FormData();
			formData.append('marca', marca);
			formData.append('modelo', modelo);
			formData.append('mobilidad', mobilidad);
			formData.append('descripcion', descripcion);
			formData.append('detalles', detalles);

			console.log(formData);
			// Enviar la imagen y otros datos al controlador mediante AJAX
			$.ajax({
				url: '/gdcag',
				type: 'POST',
				dataType: 'json',
				data: formData,
				processData: false,
				contentType: false,
				success: function (response) {
					if (response.success) {
						// Tu código de éxito
						console.log(response);
						Swal.fire({
							text: "Datos enviados correctamente.",
							icon: "success",
							buttonsStyling: false,
							confirmButtonText: "Ok, entendido!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						}).then((result) => {
							if (result.isConfirmed) {
								const modal = document.querySelector('.modal');
								if (modal) {
									const modalInstance = bootstrap.Modal.getInstance(modal);
									modalInstance.hide();
								}
							}
						});
						limpiarAutomovil();
						recargar_tabla();
					} else {
						// Tu código de error
						Swal.fire({
							text: "ERROR, Por favor verifique e intente nuevamente ",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
						limpiarAutomovil();
					}
				},
				error: function () {
					// Tu código de error
					Swal.fire({
						text: "Error Fatal, Sistema fuera de servicio, intentar más tarde por favor ",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Aceptar!",
						customClass: { confirmButton: "btn btn-primary" },
					});
					limpiarAutomovil();
				}
			});
		});
		function limpiarAutomovil() {
			$('#marca').val('');
			$('#modelo').val('');
			$('#movilidad').val('');
			$('#descripcion').val('');
			$('#detalles').val('');

		}
		function recargar_tabla() {
			dt.ajax.reload();
		}
	</script>
	<!-- script para listar datos , para eliminar y llena los datos para modificar  -->
	<script>
		$.urlParam = function (name) {
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		var table;
		var dt;
		var filterPayment;
		// Class definition
		var KTDatatablesServerSide = function () {
			// Private functions
			var initDatatable = function () {
				dt = $("#kt_datatable_rol").DataTable({
					searchDelay: 500,
					processing: true,
					serverSide: true,
					order: [[1, 'asc']],
					stateSave: true,
					select: {
						style: 'multi',
						selector: 'td:first-child input[type="checkbox"]',
						className: 'row-selected'
					},
					ajax: {
						//hostUrl+"allTipoIndice?c="+$.urlParam('c'),
						url: '/gtcdv',
						dataSrc: 'data' // La propiedad que contiene los datos en la respuesta JSON
					},
					columns: [
						{
							data: 'marca',
							render: function (data, type, row) {
								return `
																																																																							<a class="text-dark fw-bold text-hover-primary d-block fs-6">Marca: ${data}</a>
																																																																							<span class="text-muted fw-semibold text-muted d-block fs-7">Movilidad: ${row.modelo}</span>
																																																																												`;
							}
						},
						{
							data: 'placa',
							render: function (data, type, row) {
								return `
																																																																																	<a class="text-dark fw-bold text-hover-primary d-block fs-6">Placa.: ${data}</a>
																																																																												`;
							}
						},
						{
							data: 'descripcion',
							render: function (data, type, row) {
								return `
																																																																																	<a class="text-dark fw-bold text-hover-primary d-block fs-6">${data}</a>
																																																																												`;
							}
						},
						{
							data: 'detalles',
							render: function (data, type, row) {
								return `
																																																																																	<a class="text-dark fw-bold text-hover-primary d-block fs-6">${data}</a>
																																																																												`;
							}
						},
						{
							data: 'created_at',
							render: function (data) {
								// Convertir la fecha a un objeto Date
								var date = new Date(data);
								// Obtener el día, mes y año
								var day = date.getDate();
								var month = date.getMonth(); // Se suma 1 porque los meses van de 0 a 11 en JavaScript
								var year = date.getFullYear();
								var monthNames = [
									"Enero", "Febrero", "Marzo",
									"Abril", "Mayo", "Junio", "Julio",
									"Agosto", "Septiembre", "Octubre",
									"Noviembre", "Diciembre"
								];
								// Formatear la fecha como "dd de mes de yyyy"
								return day + ' de ' + monthNames[month] + ' de ' + year;
							}
						},
						{
							data: 'Actions',
							render: function (data, type, row) {
								return `
																			<div class="text-end">
																			<?php if ($editar || $administrador): ?>												
																														<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="btn_editar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-modelo="${row.modelo}">
																															<i class="fa-regular fa-pen-to-square"></i>
																														</a>
																				<?php endif; ?>
																				<?php if ($eliminar || $administrador): ?>
																														<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="eliminar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-modelo="${row.modelo}">
																															<i class="fa-solid fa-trash"></i>
																														</a>
																				<?php endif; ?>
																			</div>
																		`;
							}
						},
					],
					// columnDefs: [
					//     {
					//         targets: 0,
					//         orderable: false,
					//         render: function (data) {
					//             return `
					//                 <div class="form-check form-check-sm form-check-custom form-check-solid">
					//                     <input class="form-check-input" type="checkbox" value="${data}" />
					//                 </div>`;
					//         }
					//     },
					// ],
					// Add data-filter attribute
					createdRow: function (row, data, dataIndex) {
						$(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
					}
				});
				table = dt.$;
				// Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
				dt.on('draw', function () {
					initToggleToolbar();
					KTMenu.createInstances();
				});

			}
			// Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
			var handleSearchDatatable = function () {
				const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
				filterSearch.addEventListener('keyup', function (e) {
					dt.search(e.target.value).draw();
				});
			}
			// Init toggle toolbar
			var initToggleToolbar = function () {
				// Toggle selected action toolbar
				// Select all checkboxes
				const container = document.querySelector('#kt_datatable_rol');
				const checkboxes = container.querySelectorAll('[type="checkbox"]');

				// Select elements
				const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

				// Toggle delete selected toolbar
				checkboxes.forEach(c => {
					// Checkbox on click event
					//console.log()
					c.addEventListener('click', function () {

						setTimeout(function () {
							toggleToolbars();
						}, 50);
					});
				});
			}
			return {
				init: function () {
					initDatatable();
					handleSearchDatatable();
					initToggleToolbar();
				}
			}
		}();
		function recargar_tabla() {
			dt.ajax.reload();
		}
		// On document ready
		KTUtil.onDOMContentLoaded(function () {
			KTDatatablesServerSide.init();
		});

		$(document).on("click", "tbody td #eliminar", function () {
			var el = $(this);
			Swal.fire({
				text: "Está seguro de eliminar el dispositivo :" + el.data("modelo"),
				icon: "error",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Si, eliminar!",
				cancelButtonText: "No, eliminar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						data: { "id": el.data('id'), "modelo": el.data('modelo') },
						type: "POST",
						dataType: "json",
						url: '/gtcedg'
					})
						.done(function (data, textStatus, jqXHR) {

							if (data.success) {

								Swal.fire({
									text: data.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.value) {
									}
								});
							} else {
								Swal.fire({
									text: data.message,
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-danger"
									}
								}).then(function (result) {
									if (result.value) {
										//	console.log("error");
									}
								});
							}

							recargar_tabla();
						})
						.fail(function (jqXHR, textStatus, errorThrown) {

							Swal.fire({
								text: "Ocurrio un Error!",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok!",
								customClass: {
									confirmButton: "btn btn-danger"
								}
							}).then(function (result) {

							});

							recargar_tabla();
						});
				}
			});
		});

		$(document).on("click", "#btn_editar", function () {
			var el = $(this);
			//console.log(el.data('id'));
			$.ajax({
				data: { "id": el.data('id') },
				type: "POST",
				dataType: "json",
				url: '/gtcev',
				success: function (response) {
					console.log(response);
					//console.log(response[0].id); // Aquí puedes manejar la respuesta del controlador
					$('#id').val(response[0].id);
					$('#marcaEdit').val(response[0].marca);
					$('#modeloEdit').val(response[0].modelo);
					$('#movilidadEdit').val(response[0].movilidad_id);
					$('#descripcionEdit').val(response[0].descripcion);
					$('#detallesEdit').val(response[0].detalles);
					$('#kt_modal_GPS_Edit').modal('show');

				},
				error: function (xhr, status, error) {
					console.error(xhr.responseText); // Manejo de errores
				}
			});
		});

	</script>
	<!-- editar datos -->
	<script>
		$('#submitBtnGPSEdit').click(function () {
			const id = $('#id').val();
			const marca = $('#marcaEdit').val();
			const modelo = $('#modeloEdit').val();
			const movilidad = $('#movilidadEdit').val();
			const descripcion = $('#descripcionEdit').val();
			const detalles = $('#detallesEdit').val();
			console.log(id)
			console.log(marca)
			console.log(modelo)
			console.log(movilidad)
			console.log(descripcion)
			console.log(detalles)

			if (marca.trim() === '') {
				$('#marcaErrorEdit').text('Por favor ingrese la marca');
				return;
			}
			// Ocultar mensaje de error
			$('#marcaErrorEdit').text('');
			if (modelo.trim() === '') {
				$('#modeloErrorEdit').text('Por favor ingrese el modelo');
				return;
			}
			// Ocultar mensaje de error
			$('#modeloErrorEdit').text('');
			if (movilidad.trim() === '') {
				$('#movilidadErrorEdit').text('Por favor ingrese la placa de la movilidad donde esta el dispositivo');
				return;
			}
			// Ocultar mensaje de error
			$('#movilidadErrorEdit').text('');
			if (descripcion.trim() === '') {
				$('#descripcionErrorEdit').text('Por favor ingrese una descripcion corta');
				return;
			}
			// Ocultar mensaje de error
			$('#descripcionErrorEdit').text('');
			if (detalles.trim() === '') {
				$('#detallesErrorEdit').text('Por favor ingrese detalles del dispositivo');
				return;
			}
			// Ocultar mensaje de error
			$('#detallesErrorEdit').text('');
			// Crear un objeto FormData y agregar la imagen seleccionada
			var formData = new FormData();
			formData.append('id', id);
			formData.append('marca', marca);
			formData.append('modelo', modelo);
			formData.append('mobilidad', movilidad);
			formData.append('descripcion', descripcion);
			formData.append('detalles', detalles);

			console.log(formData);
			$.ajax({
				url: '/gtcagp',
				type: 'POST',
				dataType: 'json',
				data: formData,
				processData: false,
				contentType: false,
				success: function (response) {
					if (response.success) {
						// Tu código de éxito
						console.log(response);
						Swal.fire({
							text: "Datos enviados correctamente.",
							icon: "success",
							buttonsStyling: false,
							confirmButtonText: "Ok, entendido!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						}).then((result) => {
							if (result.isConfirmed) {
								const modal = document.getElementById('kt_modal_GPS_Edit');
								if (modal) {
									const modalInstance = bootstrap.Modal.getInstance(modal);
									modalInstance.hide();
								}
							}
						});
						limpiarAutomovil();
						recargar_tabla();
					} else {
						// Tu código de error
						Swal.fire({
							text: "ERROR, Por favor verifique e intente nuevamente ",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
						limpiarAutomovil();
					}
				},
				error: function () {
					// Tu código de error
					Swal.fire({
						text: "Error Fatal, Sistema fuera de servicio, intentar más tarde por favor ",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Aceptar!",
						customClass: { confirmButton: "btn btn-primary" },
					});
					limpiarAutomovil();
				}
			});
		});
		function limpiarAutomovil() {
			$('#marca').val('');
			$('#modelo').val('');
			$('#movilidad').val('');
			$('#descripcion').val('');
			$('#detalles').val('');

		}
		function recargar_tabla() {
			dt.ajax.reload();
		}
	</script>


<?php } elseif (strpos($currentUrl, "gdcrv") !== false) { ?>
	<script src="recursos/metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<!-- control de modal cerrar-->
	<script>
		//modal de editar
		document.addEventListener('DOMContentLoaded', function () {
			const closeModalBtn = document.getElementById('kt_modal_RFID_Edit_close');
			const cancelarModalBtn = document.getElementById('kt_modal_RFID_cancelar_Edit');
			if (closeModalBtn) {
				closeModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_RFID_Edit');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_RFID_Edit');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});
		//modal de agregar
		document.addEventListener('DOMContentLoaded', function () {
			const closeModalBtn = document.getElementById('kt_modal_RFID_close');
			const cancelarModalBtn = document.getElementById('kt_modal_RFID_close');
			if (closeModalBtn) {
				closeModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_add_customer');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_add_customer');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});
	</script>
	<!-- validacion de campos-->
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			document.querySelectorAll('.validar').forEach(function (input) {
				input.addEventListener('input', function () {
					const valor = this.value.trim();
					const validacion = new RegExp(this.getAttribute('data-validacion'));
					const mensaje = this.getAttribute('data-mensaje');

					if (!validacion.test(valor)) {
						Swal.fire({
							icon: 'error',
							title: 'Oops...',
							text: 'No Ingrese caracteres que no corresponden al campo. Verifique por favor.',
							customClass: {
								confirmButton: 'btn btn-primary' // Agrega la clase 'btn btn-success' al botón de confirmación
							}
						});

						this.value = '';
					}
				});
			});
		});
	</script>
	<!-- agregar datos -->
	<script>
		$('#submitBtnRFID').click(function () {

			const marca = $('#marca').val();
			const modelo = $('#modelo').val();
			const mobilidad = $('#movilidad').val();
			const descripcion = $('#descripcion').val();
			const detalles = $('#detalles').val();
			if (marca.trim() === '') {
				$('#marcaError').text('Por favor ingrese la marca del dispositivo');
				return;
			}
			// Ocultar mensaje de error
			$('#marcaError').text('');
			if (modelo.trim() === '') {
				$('#modeloError').text('Por favor ingrese el modelo del dispositivo');
				return;
			}
			// Ocultar mensaje de error
			$('#modeloError').text('');
			if (mobilidad.trim() === '') {
				$('#movilidadError').text('Por favor ingrese la placa de la movilidad donde se instala el dispositivo');
				return;
			}
			// Ocultar mensaje de error
			$('#movilidadError').text('');
			if (descripcion.trim() === '') {
				$('#descripcionError').text('Por favor ingrese una descripcion corta del dispositivo');
				return;
			}
			// Ocultar mensaje de error
			$('#descripcionError').text('');
			if (detalles.trim() === '') {
				$('#detallesError').text('Por favor ingrese detalles necesarios del dispositivo');
				return;
			}
			// Ocultar mensaje de error
			$('#detallesError').text('');
			// Crear un objeto FormData y agregar la imagen seleccionada
			//	console.log(mobilidad)


			var formData = new FormData();
			formData.append('marca', marca);
			formData.append('modelo', modelo);
			formData.append('mobilidad', mobilidad);
			formData.append('descripcion', descripcion);
			formData.append('detalles', detalles);

			console.log(formData);
			// Enviar la imagen y otros datos al controlador mediante AJAX
			$.ajax({
				url: '/gdcarf',
				type: 'POST',
				dataType: 'json',
				data: formData,
				processData: false,
				contentType: false,
				success: function (response) {
					if (response.success) {
						// Tu código de éxito
						console.log(response);
						Swal.fire({
							text: "Datos enviados correctamente.",
							icon: "success",
							buttonsStyling: false,
							confirmButtonText: "Ok, entendido!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						}).then((result) => {
							if (result.isConfirmed) {
								const modal = document.querySelector('.modal');
								if (modal) {
									const modalInstance = bootstrap.Modal.getInstance(modal);
									modalInstance.hide();
								}
							}
						});
						limpiar();
						recargar_tabla();
					} else {
						// Tu código de error
						Swal.fire({
							text: "ERROR, Por favor verifique e intente nuevamente ",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
						limpiar();
					}
				},
				error: function () {
					// Tu código de error
					Swal.fire({
						text: "Error Fatal, Sistema fuera de servicio, intentar más tarde por favor ",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Aceptar!",
						customClass: { confirmButton: "btn btn-primary" },
					});
					limpiar();
				}
			});
		});
		function limpiar() {
			$('#marca').val('');
			$('#modelo').val('');
			$('#movilidad').val('');
			$('#descripcion').val('');
			$('#detalles').val('');

		}
		function recargar_tabla() {
			dt.ajax.reload();
		}
	</script>
	<!-- script para listar datos , para eliminar y llena los datos para modificar  -->
	<script>
		$.urlParam = function (name) {
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		var table;
		var dt;
		var filterPayment;
		// Class definition
		var KTDatatablesServerSide = function () {
			// Private functions
			var initDatatable = function () {
				dt = $("#kt_datatable_rol").DataTable({
					searchDelay: 500,
					processing: true,
					serverSide: true,
					order: [[1, 'asc']],
					stateSave: true,
					select: {
						style: 'multi',
						selector: 'td:first-child input[type="checkbox"]',
						className: 'row-selected'
					},
					ajax: {
						//hostUrl+"allTipoIndice?c="+$.urlParam('c'),
						url: '/gtcdrif',
						dataSrc: 'data' // La propiedad que contiene los datos en la respuesta JSON
					},
					columns: [
						{
							data: 'marca',
							render: function (data, type, row) {
								return `
																																																																							<a class="text-dark fw-bold text-hover-primary d-block fs-6">Marca: ${data}</a>
																																																																							<span class="text-muted fw-semibold text-muted d-block fs-7">Movilidad: ${row.modelo}</span>
																																																																												`;
							}
						},
						{
							data: 'placa',
							render: function (data, type, row) {
								return `
																																																																																	<a class="text-dark fw-bold text-hover-primary d-block fs-6">Placa.: ${data}</a>
																																																																												`;
							}
						},
						{
							data: 'descripcion',
							render: function (data, type, row) {
								return `
																																																																																	<a class="text-dark fw-bold text-hover-primary d-block fs-6">${data}</a>
																																																																												`;
							}
						},
						{
							data: 'detalle',
							render: function (data, type, row) {
								return `
																																																																																	<a class="text-dark fw-bold text-hover-primary d-block fs-6">${data}</a>
																																																																												`;
							}
						},
						{
							data: 'created_at',
							render: function (data) {
								// Convertir la fecha a un objeto Date
								var date = new Date(data);
								// Obtener el día, mes y año
								var day = date.getDate();
								var month = date.getMonth(); // Se suma 1 porque los meses van de 0 a 11 en JavaScript
								var year = date.getFullYear();
								var monthNames = [
									"Enero", "Febrero", "Marzo",
									"Abril", "Mayo", "Junio", "Julio",
									"Agosto", "Septiembre", "Octubre",
									"Noviembre", "Diciembre"
								];
								// Formatear la fecha como "dd de mes de yyyy"
								return day + ' de ' + monthNames[month] + ' de ' + year;
							}
						},
						{
							data: 'Actions',
							render: function (data, type, row) {
								return `
																				<div class="text-end">
																				<?php if ($editar || $administrador): ?>
																															<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="btn_editar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-modelo="${row.modelo}">
																																<i class="fa-regular fa-pen-to-square"></i>
																															</a>
																					<?php endif; ?>
																						<?php if ($eliminar || $administrador): ?>
												
																															<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="eliminar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-modelo="${row.modelo}">
																																<i class="fa-solid fa-trash"></i>
																															</a>
																					<?php endif; ?>
																				</div>
																			`;
							}
						},
					],
					// columnDefs: [
					//     {
					//         targets: 0,
					//         orderable: false,
					//         render: function (data) {
					//             return `
					//                 <div class="form-check form-check-sm form-check-custom form-check-solid">
					//                     <input class="form-check-input" type="checkbox" value="${data}" />
					//                 </div>`;
					//         }
					//     },
					// ],
					// Add data-filter attribute
					createdRow: function (row, data, dataIndex) {
						$(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
					}
				});
				table = dt.$;
				// Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
				dt.on('draw', function () {
					initToggleToolbar();
					KTMenu.createInstances();
				});

			}
			// Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
			var handleSearchDatatable = function () {
				const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
				filterSearch.addEventListener('keyup', function (e) {
					dt.search(e.target.value).draw();
				});
			}
			// Init toggle toolbar
			var initToggleToolbar = function () {
				// Toggle selected action toolbar
				// Select all checkboxes
				const container = document.querySelector('#kt_datatable_rol');
				const checkboxes = container.querySelectorAll('[type="checkbox"]');

				// Select elements
				const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

				// Toggle delete selected toolbar
				checkboxes.forEach(c => {
					// Checkbox on click event
					//console.log()
					c.addEventListener('click', function () {

						setTimeout(function () {
							toggleToolbars();
						}, 50);
					});
				});
			}
			return {
				init: function () {
					initDatatable();
					handleSearchDatatable();
					initToggleToolbar();
				}
			}
		}();
		function recargar_tabla() {
			dt.ajax.reload();
		}
		// On document ready
		KTUtil.onDOMContentLoaded(function () {
			KTDatatablesServerSide.init();
		});

		$(document).on("click", "tbody td #eliminar", function () {
			var el = $(this);
			Swal.fire({
				text: "Está seguro de eliminar el dispositivo :" + el.data("modelo"),
				icon: "error",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Si, eliminar!",
				cancelButtonText: "No, eliminar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						data: { "id": el.data('id'), "modelo": el.data('modelo') },
						type: "POST",
						dataType: "json",
						url: '/gtcerfi'
					})
						.done(function (data, textStatus, jqXHR) {

							if (data.success) {

								Swal.fire({
									text: data.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.value) {
									}
								});
							} else {
								Swal.fire({
									text: data.message,
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-danger"
									}
								}).then(function (result) {
									if (result.value) {
										//	console.log("error");
									}
								});
							}

							recargar_tabla();
						})
						.fail(function (jqXHR, textStatus, errorThrown) {

							Swal.fire({
								text: "Ocurrio un Error!",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok!",
								customClass: {
									confirmButton: "btn btn-danger"
								}
							}).then(function (result) {

							});

							recargar_tabla();
						});
				}
			});
		});

		$(document).on("click", "#btn_editar", function () {
			var el = $(this);
			//console.log(el.data('id'));
			$.ajax({
				data: { "id": el.data('id') },
				type: "POST",
				dataType: "json",
				url: '/gtcerv',
				success: function (response) {
					console.log(response);
					//console.log(response[0].id); // Aquí puedes manejar la respuesta del controlador
					$('#id').val(response[0].id);
					$('#marcaEdit').val(response[0].marca);
					$('#modeloEdit').val(response[0].modelo);
					$('#movilidadEdit').val(response[0].movilidad_id);
					$('#descripcionEdit').val(response[0].descripcion);
					$('#detallesEdit').val(response[0].detalle);
					$('#kt_modal_RFID_Edit').modal('show');

				},
				error: function (xhr, status, error) {
					console.error(xhr.responseText); // Manejo de errores
				}
			});
		});

	</script>
	<!-- editar datos -->
	<script>
		$('#submitBtnRFIDEdit').click(function () {
			const id = $('#id').val();
			const marca = $('#marcaEdit').val();
			const modelo = $('#modeloEdit').val();
			const movilidad = $('#movilidadEdit').val();
			const descripcion = $('#descripcionEdit').val();
			const detalles = $('#detallesEdit').val();

			if (marca.trim() === '') {
				$('#marcaErrorEdit').text('Por favor ingrese el nombre de la marca del dispositivo');
				return;
			}
			// Ocultar mensaje de error
			$('#marcaErrorEdit').text('');
			if (modelo.trim() === '') {
				$('#modeloErrorEdit').text('Por favor ingrese el modelo del dispositivo');
				return;
			}
			// Ocultar mensaje de error
			$('#modeloErrorEdit').text('');
			if (movilidad.trim() === '') {
				$('#movilidadErrorEdit').text('Por favor ingrese la placa de la movilidad donde se instala');
				return;
			}
			// Ocultar mensaje de error
			$('#movilidadErrorEdit').text('');
			if (descripcion.trim() === '') {
				$('#descripcionErrorEdit').text('Por favor ingrese una descripcion corta');
				return;
			}
			// Ocultar mensaje de error
			$('#descripcionErrorEdit').text('');
			if (detalles.trim() === '') {
				$('#detallesErrorEdit').text('Por favor ingrese detalles del dispositivo');
				return;
			}
			// Ocultar mensaje de error
			$('#detallesErrorEdit').text('');
			// Crear un objeto FormData y agregar la imagen seleccionada
			var formData = new FormData();
			formData.append('id', id);
			formData.append('marca', marca);
			formData.append('modelo', modelo);
			formData.append('mobilidad', movilidad);
			formData.append('descripcion', descripcion);
			formData.append('detalles', detalles);

			console.log(formData);
			$.ajax({
				url: '/gtdcar',
				type: 'POST',
				dataType: 'json',
				data: formData,
				processData: false,
				contentType: false,
				success: function (response) {
					if (response.success) {
						// Tu código de éxito
						console.log(response);
						Swal.fire({
							text: "Datos enviados correctamente.",
							icon: "success",
							buttonsStyling: false,
							confirmButtonText: "Ok, entendido!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						}).then((result) => {
							if (result.isConfirmed) {
								const modal = document.getElementById('kt_modal_RFID_Edit');
								if (modal) {
									const modalInstance = bootstrap.Modal.getInstance(modal);
									modalInstance.hide();
								}
							}
						});
						recargar_tabla();
					} else {
						// Tu código de error
						Swal.fire({
							text: "ERROR, Por favor verifique e intente nuevamente ",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
					}
				},
				error: function () {
					// Tu código de error
					Swal.fire({
						text: "Error Fatal, Sistema fuera de servicio, intentar más tarde por favor ",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Aceptar!",
						customClass: { confirmButton: "btn btn-primary" },
					});
					limpiarAutomovil();
				}
			});
		});
		function recargar_tabla() {
			dt.ajax.reload();
		}
	</script>


<?php } elseif (strpos($currentUrl, "gpfucp") !== false) { ?>
	<script src="recursos/metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
	<!--control de menu-->
	<script>
		function mostrarContenido(id) {
			// Ocultar todos los contenidos
			document.getElementById('Informacion').style.display = 'none';
			document.getElementById('Tablausuario').style.display = 'none';

			// Mostrar el contenido correspondiente al id
			document.getElementById(id).style.display = 'block';
		}

		// Mostrar por defecto el contenido de lista
		mostrarContenido('Informacion');

	</script>
	<!-- control de modal cerrar-->
	<script>
		//modal de editar
		document.addEventListener('DOMContentLoaded', function () {
			const closeModalBtn = document.getElementById('kt_modal_RFID_Edit_close');
			const cancelarModalBtn = document.getElementById('kt_modal_RFID_cancelar_Edit');
			if (closeModalBtn) {
				closeModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_RFID_Edit');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_RFID_Edit');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});
		//modal de agregar
		document.addEventListener('DOMContentLoaded', function () {
			const closeModalBtn = document.getElementById('kt_modal_perfil_close');
			const cancelarModalBtn = document.getElementById('kt_modal_perfil_calcelar');
			if (closeModalBtn) {
				closeModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_add_customer');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cancelar?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_add_customer');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});
		//modal de factura
		document.addEventListener('DOMContentLoaded', function () {
			const closeModalBtn = document.getElementById('kt_modal_factura_close');
			const cancelarModalBtn = document.getElementById('kt_modal_factura_cancelar');
			if (closeModalBtn) {
				closeModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar el proceso de factura?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_factura');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
			if (cancelarModalBtn) {
				cancelarModalBtn.addEventListener('click', function () {
					Swal.fire({
						icon: 'warning',
						title: '¿Estás seguro de cerrar el proceso de factura?',
						text: '¡Los cambios no se guardarán!',
						showCancelButton: true,
						confirmButtonText: 'Sí, descartar cambios',
						cancelButtonText: 'Cancelar'
					}).then((result) => {
						if (result.isConfirmed) {
							const modal = document.getElementById('kt_modal_factura');
							if (modal) {
								const modalInstance = bootstrap.Modal.getInstance(modal);
								modalInstance.hide();
							}
						}
					});
				});
			}
		});


	</script>
	<!-- funcion del ojito de password y control de fuerza de contrasena -->
	<script>
		document.getElementById('togglePassword').addEventListener('click', function () {
			var input = document.getElementById('contrasena');
			if (input.type === 'password') {
				input.type = 'text';
				setTimeout(function () {
					input.type = 'password';
				}, 1000);
			} else {
				input.type = 'password';
			}
		});

		document.getElementById('contrasena').addEventListener('input', function () {
			var contrasena = this.value;
			var contrasenaError = document.getElementById('contrasenaError');
			var strengthBar = document.getElementById('passwordStrengthBar');
			var strengthText = document.getElementById('passwordStrengthText');
			var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#\$%\^&\*]).{5,}");
			var mediumRegex = new RegExp("^((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9]))(?=.{8,})");

			if (strongRegex.test(contrasena)) {
				strengthBar.style.width = '100%';
				strengthBar.className = 'progress-bar bg-success';
				strengthText.textContent = 'Fuerte';
			} else if (mediumRegex.test(contrasena)) {
				strengthBar.style.width = '66.6%';
				strengthBar.className = 'progress-bar bg-warning';
				strengthText.textContent = 'Media';
			} else {
				strengthBar.style.width = '33.3%';
				strengthBar.className = 'progress-bar bg-danger';
				strengthText.textContent = 'Débil';
			}
		});
		document.getElementById('usuariopadre').addEventListener('input', function () {
			$('#usuariopadre').change(function () {
				if ($(this).val() !== "0") {
					$('#usuarioadministrador, #usuarioconductor').prop('disabled', true);
				} else {
					$('#usuarioadministrador, #usuarioconductor').prop('disabled', false);
				}
			});
		});
		document.getElementById('usuarioadministrador').addEventListener('input', function () {
			$('#usuarioadministrador').change(function () {
				if ($(this).val() !== "0") {
					$('#usuariopadre, #usuarioconductor').prop('disabled', true);
				} else {
					$('#usuariopadre, #usuarioconductor').prop('disabled', false);
				}
			});
		});
		document.getElementById('usuarioconductor').addEventListener('input', function () {

			$('#usuarioconductor').change(function () {
				if ($(this).val() !== "0") {
					$('#usuariopadre, #usuarioadministrador').prop('disabled', true);
				} else {
					$('#usuariopadre, #usuarioadministrador').prop('disabled', false);
				}
			});
		});

	</script>
	<!-- funcion de compara contrasena -->
	<script>
		document.getElementById('repetirContrasena').addEventListener('blur', function () {
			var contrasena = document.getElementById('contrasena').value.trim();
			var repetirContrasena = this.value.trim();
			var repetirContrasenaError = document.getElementById('repetirContrasenaError');

			if (contrasena !== repetirContrasena) {
				repetirContrasenaError.textContent = 'Las contraseñas no coinciden.';
			} else {
				repetirContrasenaError.textContent = '';
			}
		});
	</script>
	<!-- agregar datos -->
	<script>
		$('#submitPerfil').click(function () {
			var fileInputUsuario = $('#avatarUsuario')[0];
			var fileUsuario = fileInputUsuario.files[0];
			//validacion de foto
			if (!fileUsuario) {
				$('#avatarError').text('Seleccione una imagen para el usuario.');
				return;
			}
			$('#avatarError').text('');
			// Validar que el archivo seleccionado sea una imagen
			if (!['image/png', 'image/jpeg', 'image/jpg'].includes(fileUsuario.type)) {
				Swal.fire({
					text: "El archivo subio de automovil debe ser una imagen (PNG, JPEG).",
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: "Aceptar",
					customClass: { confirmButton: "btn btn-primary" },
				});
				return;
			}

			const usuariopadre = $('#usuariopadre').val();
			const usuarioadministrador = $('#usuarioadministrador').val();
			const usuarioconductor = $('#usuarioconductor').val();


			if (usuariopadre === "0" && usuarioadministrador === "0" && usuarioconductor === "0") {
				$('#usuarioconductorError').text('Por favor seleccione un usuario');
			} else {
				$('#usuarioconductorError').text('');
			}

			const rol = $('#rol').val();
			if (rol.trim() === '') {
				$('#rolError').text('Por favor ingrese rol');
				return;
			}
			// Ocultar mensaje de error
			$('#rolError').text('');
			var correoElectronico = $('#correoElectronico').val();
			var correoElectronicoError = document.getElementById('correoElectronicoError');
			var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

			if (!emailRegex.test(correoElectronico)) {
				correoElectronicoError.textContent = 'Por favor, introduzca un correo electrónico válido.';
				return;
			} else {
				correoElectronicoError.textContent = '';
			}

			var contrasena = $('#contrasena').val();
			var repetirContrasena = $('#repetirContrasena').val();

			// Validación de contraseña
			var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#\$%\^&\*]).{5,}");
			if (!strongRegex.test(contrasena)) {
				$('#contrasenaError').text('La contraseña debe tener al menos 8 caracteres, una letra mayúscula, una letra minúscula, un número y un carácter especial (!@#$%^&*)');
				return;
			} else {
				$('#contrasenaError').text('');
			}

			// Validación de repetir contraseña
			if (contrasena !== repetirContrasena) {
				$('#repetirContrasenaError').text('Las contraseñas no coinciden.');
				return;
			} else {
				$('#repetirContrasenaError').text('');
			}


			console.log(contrasena);
			var formData = new FormData();
			formData.append('fileUsuario', fileUsuario);
			formData.append('usuariopadre', usuariopadre);
			formData.append('usuarioadministrador', usuarioadministrador);
			formData.append('usuarioconductor', usuarioconductor);
			formData.append('rol', rol);
			formData.append('correoElectronico', correoElectronico);
			formData.append('contrasena', contrasena);

			console.log(formData);
			// Enviar la imagen y otros datos al controlador mediante AJAX
			$.ajax({
				url: '/gdpuca',
				type: 'POST',
				dataType: 'json',
				data: formData,
				processData: false,
				contentType: false,
				success: function (response) {
					if (response.success) {
						// Tu código de éxito
						//console.log(response);
						Swal.fire({
							text: "Datos enviados correctamente.",
							icon: "success",
							buttonsStyling: false,
							confirmButtonText: "Ok, entendido!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						}).then((result) => {
							if (result.isConfirmed) {
								const modal = document.querySelector('.modal');
								if (modal) {
									const modalInstance = bootstrap.Modal.getInstance(modal);
									modalInstance.hide();
								}
							}
						});
						limpiar();
						recargar_tabla();
					} else {
						// Tu código de error
						Swal.fire({
							text: "ERROR, Por favor verifique e intente nuevamente ",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
						limpiar();
					}
				},
				error: function () {
					// Tu código de error
					Swal.fire({
						text: "Error Fatal, Sistema fuera de servicio, intentar más tarde por favor ",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Aceptar!",
						customClass: { confirmButton: "btn btn-primary" },
					});
					limpiar();
				}
			});
		});
		function limpiar() {

			$('#rol').val('');
			$('#correoElectronico').val('');
			$('#contrasena').val('');
			$('#repetirContrasena').val('');
			$('#passwordStrength').val('');
		}

	</script>
	<!-- script para listar datos , para eliminar y llena los datos para modificar  -->
	<script>
		$.urlParam = function (name) {
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		var table;
		var dt;
		var filterPayment;
		// Class definition
		var KTDatatablesServerSide = function () {
			// Private functions
			var initDatatable = function () {
				dt = $("#kt_datatable_rol").DataTable({
					searchDelay: 500,
					processing: true,
					serverSide: true,
					order: [[1, 'asc']],
					stateSave: true,
					select: {
						style: 'multi',
						selector: 'td:first-child input[type="checkbox"]',
						className: 'row-selected'
					},
					ajax: {
						//hostUrl+"allTipoIndice?c="+$.urlParam('c'),
						url: '/gpfudp',
						dataSrc: 'data' // La propiedad que contiene los datos en la respuesta JSON
					},
					columns: [
						{
							data: 'foto',
							render: function (data, type, row) {
								return `
																																																								<div class="d-flex align-items-center">
																																																									<div class="symbol symbol-45px me-5">
																																																										<a href="uploads/Usuarios/${data}" data-lightbox="gallery" data-title="CONDUCTOR: ${data} ${row.nombre}" class="lightbox-link">
																																																											<img src="uploads/Usuarios/${data}" alt="" style="max-width: 45px; max-height: 45px; position:align-items-center ">
																																																										</a>
																																																									</div>
																																																									<div class="d-flex justify-content-start flex-column">
																																																										<a  class="text-dark fw-bold text-hover-primary fs-6">Nombre:${row.nombre}</a>
																																																										<span class="text-muted fw-semibold text-muted d-block fs-7">Apellido:${row.apellido}</span>
																																																									</div>
																																																								</div>
																																																							`;
							}
						},
						{
							data: 'correo',
							render: function (data, type, row) {
								return `
																																																									<a class="text-dark fw-bold text-hover-primary d-block fs-6">Correo electronico: ${data}</a>
																																																									<span class="text-muted fw-semibold text-muted d-block fs-7">Telefono: ${row.telefono}</span>
																																					
																																																				`;
							}
						},
						{
							data: 'cargo',
							render: function (data, type, row) {
								return `
																																																								<a class="text-dark fw-bold text-hover-primary d-block fs-6">Cargo:${data}</a>
																																																								<div class="d-flex">
																																																									<div class="ms-0">
																																																									<span class="text-dark fw-bold text-hover-primary d-block fs-6">
																																																									<a class="badge badge-light-primary fs-7 m-1">${row.rolnombre}</a> 
																																																									</span>
																																																									</div>
																																																								</div>
																																																								<span class="text-muted fw-semibold text-muted d-block fs-7">Telefono: ${row.roldes}</span>
												
											
																																																								`;
							}
						},
						{
							data: 'created_at',
							render: function (data) {
								// Convertir la fecha a un objeto Date
								var date = new Date(data);
								// Obtener el día, mes y año
								var day = date.getDate();
								var month = date.getMonth(); // Se suma 1 porque los meses van de 0 a 11 en JavaScript
								var year = date.getFullYear();
								var monthNames = [
									"Enero", "Febrero", "Marzo",
									"Abril", "Mayo", "Junio", "Julio",
									"Agosto", "Septiembre", "Octubre",
									"Noviembre", "Diciembre"
								];
								// Formatear la fecha como "dd de mes de yyyy"
								return day + ' de ' + monthNames[month] + ' de ' + year;
							}
						},
						{
							data: 'Actions',
							render: function (data, type, row) {
								return `
																<div class="text-end">
																<?php if ($editar || $administrador): ?>
																											<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="btn_editar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-modelo="${row.nombre}" data-descripcion="${row.descripcion}">
																												<i class="fa-regular fa-pen-to-square"></i>
																											</a>
																	<?php endif; ?>
																						<?php if ($eliminar || $administrador): ?>
																											<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="eliminar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-nombre="${row.nombre}">
																												<i class="fa-solid fa-trash"></i>
																											</a>
																	<?php endif; ?>
																</div>
															`;
							}
						},
					],
					// columnDefs: [
					//     {
					//         targets: 0,
					//         orderable: false,
					//         render: function (data) {
					//             return `
					//                 <div class="form-check form-check-sm form-check-custom form-check-solid">
					//                     <input class="form-check-input" type="checkbox" value="${data}" />
					//                 </div>`;
					//         }
					//     },
					// ],
					// Add data-filter attribute
					createdRow: function (row, data, dataIndex) {
						$(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
					}
				});
				table = dt.$;
				// Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
				dt.on('draw', function () {
					initToggleToolbar();
					KTMenu.createInstances();
				});

			}
			// Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
			var handleSearchDatatable = function () {
				const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
				filterSearch.addEventListener('keyup', function (e) {
					dt.search(e.target.value).draw();
				});
			}
			// Init toggle toolbar
			var initToggleToolbar = function () {
				// Toggle selected action toolbar
				// Select all checkboxes
				const container = document.querySelector('#kt_datatable_rol');
				const checkboxes = container.querySelectorAll('[type="checkbox"]');

				// Select elements
				const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

				// Toggle delete selected toolbar
				checkboxes.forEach(c => {
					// Checkbox on click event
					//console.log()
					c.addEventListener('click', function () {

						setTimeout(function () {
							toggleToolbars();
						}, 50);
					});
				});
			}
			return {
				init: function () {
					initDatatable();
					handleSearchDatatable();
					initToggleToolbar();
				}
			}
		}();
		function recargar_tabla() {
			dt.ajax.reload();
		}
		// On document ready
		KTUtil.onDOMContentLoaded(function () {
			KTDatatablesServerSide.init();
		});

		$(document).on("click", "tbody td #eliminar", function () {
			var el = $(this);
			Swal.fire({
				text: "Está seguro de eliminar el perfil de :" + el.data("nombre"),
				icon: "error",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Si, eliminar!",
				cancelButtonText: "No, eliminar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						data: { "id": el.data('id'), "nombre": el.data('nombre') },
						type: "POST",
						dataType: "json",
						url: '/gpucep'
					})
						.done(function (data, textStatus, jqXHR) {

							if (data.success) {

								Swal.fire({
									text: data.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.value) {
									}
								});
							} else {
								Swal.fire({
									text: data.message,
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-danger"
									}
								}).then(function (result) {
									if (result.value) {
										//	console.log("error");
									}
								});
							}

							recargar_tabla();
						})
						.fail(function (jqXHR, textStatus, errorThrown) {

							Swal.fire({
								text: "Ocurrio un Error!",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok!",
								customClass: {
									confirmButton: "btn btn-danger"
								}
							}).then(function (result) {

							});

							recargar_tabla();
						});
				}
			});
		});

		$(document).on("click", "#btn_editar", function () {
			var el = $(this);
			//console.log(el.data('id'));
			$.ajax({
				data: { "id": el.data('id') },
				type: "POST",
				dataType: "json",
				url: '/gtpuce',
				success: function (response) {
					console.log(response);
					//console.log(response[0].id); // Aquí puedes manejar la respuesta del controlador
					$('#id').val(response[0].id);

					// Obtener los nombres de imagen de la respuesta
					const nombreImagen1 = response[0].fotousuario;

					// Construir la URL de la imagen utilizando los nombres de imagen
					const urlImagen1 = "uploads/Usuarios/" + nombreImagen1;

					const divImagen1 = $('#image-wrapper-2'); // Ajusta el ID según corresponda

					// Establecer la URL de la imagen en el estilo background-image de los divs
					divImagen1.css('background-image', `url('${urlImagen1}')`);

					$('#rolEdit').val(response[0].rol_id);
					$('#kt_modal_editar_perfil').modal('show');

				},
				error: function (xhr, status, error) {
					console.error(xhr.responseText); // Manejo de errores
				}
			});
		});

	</script>
	<script>
		$(document).ready(function () {
			lightbox.option({
				'resizeDuration': 100,
				'wrapAround': true
			});
		});

	</script>
	<!-------------------------------------------------------------------------------------------- 
	edicion de datos
 ------------------------------------------------------------------------------------------------>
	<!-- funcion del ojito de password y control de fuerza de contrasena -->
	<script>
		document.getElementById('togglePasswordEdit').addEventListener('click', function () {
			var input = document.getElementById('contrasenaEdit');
			if (input.type === 'password') {
				input.type = 'text';
				setTimeout(function () {
					input.type = 'password';
				}, 1000);
			} else {
				input.type = 'password';
			}
		});

		document.getElementById('contrasenaEdit').addEventListener('input', function () {
			var contrasena = this.value;
			var contrasenaError = document.getElementById('contrasenaErrorEdit');
			var strengthBar = document.getElementById('passwordStrengthBarEdit');
			var strengthText = document.getElementById('passwordStrengthTextEdit');
			var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#\$%\^&\*]).{5,}");
			var mediumRegex = new RegExp("^((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9]))(?=.{8,})");

			if (strongRegex.test(contrasena)) {
				strengthBar.style.width = '100%';
				strengthBar.className = 'progress-bar bg-success';
				strengthText.textContent = 'Fuerte';
			} else if (mediumRegex.test(contrasena)) {
				strengthBar.style.width = '66.6%';
				strengthBar.className = 'progress-bar bg-warning';
				strengthText.textContent = 'Media';
			} else {
				strengthBar.style.width = '33.3%';
				strengthBar.className = 'progress-bar bg-danger';
				strengthText.textContent = 'Débil';
			}
		});
		document.getElementById('usuariopadreEdit').addEventListener('input', function () {
			$('#usuariopadreEdit').change(function () {
				if ($(this).val() !== "0") {
					$('#usuarioadministradorEdit, #usuarioconductorEdit').prop('disabled', true);
				} else {
					$('#usuarioadministradorEdit, #usuarioconductorEdit').prop('disabled', false);
				}
			});
		});
		document.getElementById('usuarioadministradorEdit').addEventListener('input', function () {
			$('#usuarioadministradorEdit').change(function () {
				if ($(this).val() !== "0") {
					$('#usuariopadreEdit, #usuarioconductorEdit').prop('disabled', true);
				} else {
					$('#usuariopadreEdit, #usuarioconductorEdit').prop('disabled', false);
				}
			});
		});
		document.getElementById('usuarioconductorEdit').addEventListener('input', function () {

			$('#usuarioconductorEdit').change(function () {
				if ($(this).val() !== "0") {
					$('#usuariopadreEdit, #usuarioadministradorEdit').prop('disabled', true);
				} else {
					$('#usuariopadreEdit, #usuarioadministradorEdit').prop('disabled', false);
				}
			});
		});




	</script>
	<!-- funcion de compara contrasena -->
	<script>
		document.getElementById('repetirContrasenaEdit').addEventListener('blur', function () {
			var contrasena = document.getElementById('contrasenaEdit').value.trim();
			var repetirContrasena = this.value.trim();
			var repetirContrasenaError = document.getElementById('repetirContrasenaErrorEdit');

			if (contrasena !== repetirContrasena) {
				repetirContrasenaError.textContent = 'Las contraseñas no coinciden.';
			} else {
				repetirContrasenaError.textContent = '';
			}
		});
	</script>
	<!-- editar datos -->
	<script>
		$('#submitPerfilEdit').click(function () {
			const id = $('#id').val();
			var fileInputUsuario = $('#avatarAutomovilEdit')[0];
			var fileUsuario = fileInputUsuario.files[0];
			//validacion de foto
			if (!fileUsuario) {
				$('#avatarErrorEdit').text('Seleccione una imagen para el usuario.');
				return;
			}
			$('#avatarErrorEdit').text('');
			// Validar que el archivo seleccionado sea una imagen
			if (!['image/png', 'image/jpeg', 'image/jpg'].includes(fileUsuario.type)) {
				Swal.fire({
					text: "El archivo subio de automovil debe ser una imagen (PNG, JPEG).",
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: "Aceptar",
					customClass: { confirmButton: "btn btn-primary" },
				});
				return;
			}

			const usuariopadre = $('#usuariopadreEdit').val();
			const usuarioadministrador = $('#usuarioadministradorEdit').val();
			const usuarioconductor = $('#usuarioconductorEdit').val();


			if (usuariopadre === "0" && usuarioadministrador === "0" && usuarioconductor === "0") {
				$('#usuarioconductorEdit').text('Por favor seleccione un usuario');
			} else {
				$('#usuarioconductorErrorEdit').text('');
			}

			const rol = $('#rolEdit').val();
			if (rol.trim() === '') {
				$('#rolErrorEdit').text('Por favor ingrese rol');
				return;
			}
			// Ocultar mensaje de error
			$('#rolErrorEdit').text('');
			var correoElectronico = $('#correoElectronicoEdit').val();
			var correoElectronicoError = document.getElementById('correoElectronicoErrorEdit');
			var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

			if (!emailRegex.test(correoElectronico)) {
				correoElectronicoError.textContent = 'Por favor, introduzca un correo electrónico válido.';
				return;
			} else {
				correoElectronicoError.textContent = '';
			}

			var contrasena = $('#contrasenaEdit').val();
			var repetirContrasena = $('#repetirContrasenaEdit').val();

			// Validación de contraseña
			var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#\$%\^&\*]).{5,}");
			if (!strongRegex.test(contrasena)) {
				$('#contrasenaErrorEdit').text('La contraseña debe tener al menos 8 caracteres, una letra mayúscula, una letra minúscula, un número y un carácter especial (!@#$%^&*)');
				return;
			} else {
				$('#contrasenaErrorEdit').text('');
			}

			// Validación de repetir contraseña
			if (contrasena !== repetirContrasena) {
				$('#repetirContrasenaErrorEdit').text('Las contraseñas no coinciden.');
				return;
			} else {
				$('#repetirContrasenaErrorEdit').text('');
			}


			var formData = new FormData();
			formData.append('id', id);
			formData.append('fileUsuario', fileUsuario);
			formData.append('usuariopadre', usuariopadre);
			formData.append('usuarioadministrador', usuarioadministrador);
			formData.append('usuarioconductor', usuarioconductor);
			formData.append('rol', rol);
			formData.append('correoElectronico', correoElectronico);
			formData.append('contrasena', contrasena);

			console.log(formData);
			// Enviar la imagen y otros datos al controlador mediante AJAX
			$.ajax({
				url: '/gtpucap',
				type: 'POST',
				dataType: 'json',
				data: formData,
				processData: false,
				contentType: false,
				success: function (response) {
					if (response.success) {
						// Tu código de éxito
						console.log(response);
						Swal.fire({
							text: "Datos actualizados correctamente.",
							icon: "success",
							buttonsStyling: false,
							confirmButtonText: "Ok, entendido!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						}).then((result) => {
							if (result.isConfirmed) {
								const modal = document.querySelector('.modal');
								if (modal) {
									const modalInstance = bootstrap.Modal.getInstance(modal);
									modalInstance.hide();
								}
							}
						});
						recargar_tabla();
					} else {
						// Tu código de error
						Swal.fire({
							text: "ERROR, Por favor verifique e intente nuevamente ",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
					}
				},
				error: function () {
					// Tu código de error
					Swal.fire({
						text: "Error Fatal, Sistema fuera de servicio, intentar más tarde por favor ",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Aceptar!",
						customClass: { confirmButton: "btn btn-primary" },
					});
				}
			});
		});

	</script>

<?php } elseif (strpos($currentUrl, "eacea") !== false) { ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/web-animations/2.3.2/web-animations.min.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/haltu/muuri@0.9.5/dist/muuri.min.js"></script>

	<style>
		.drag-container {
			position: fixed;
			left: 0;
			top: 0;
			z-index: 1000;
		}

		.board {
			position: relative;
		}

		.board-column {
			position: absolute;
			left: 0;
			top: 0;
			padding: 0 10px;
			width: calc(100% / 3);
			z-index: 1;
		}

		.board-column.muuri-item-releasing {
			z-index: 2;
		}

		.board-column.muuri-item-dragging {
			z-index: 3;
			cursor: move;
		}

		.board-column-container {
			position: relative;
			width: 100%;
			height: 100%;
		}

		.board-column-header {
			position: relative;
			height: 50px;
			line-height: 50px;
			overflow: hidden;
			padding: 0 20px;
			text-align: center;
			background: #333;
			color: #fff;
			border-radius: 5px 5px 0 0;
			font-weight: bold;
			letter-spacing: 0.5px;
			text-transform: uppercase;
		}

		@media (max-width: 600px) {
			.board-column-header {
				text-indent: -1000px;
			}
		}

		.board-column.todo .board-column-header {
			background: #4A9FF9;
		}

		.board-column.working .board-column-header {
			background: #f9944a;
		}

		.board-column.done .board-column-header {
			background: #2ac06d;
		}

		.board-column-content-wrapper {
			position: relative;
			padding: 8px;
			background: #f0f0f0;
			height: calc(100vh - 90px);
			overflow-y: auto;
			border-radius: 0 0 5px 5px;
		}

		.board-column-content {
			position: relative;
			min-height: 100%;
		}

		.board-item {
			position: absolute;
			width: calc(100% - 16px);
			margin: 8px;
		}

		.board-item.muuri-item-releasing {
			z-index: 9998;
		}

		.board-item.muuri-item-dragging {
			z-index: 9999;
			cursor: move;
		}

		.board-item.muuri-item-hidden {
			z-index: 0;
		}

		.board-item-content {
			position: relative;
			padding: 20px;
			background: #fff;
			border-radius: 4px;
			font-size: 17px;
			cursor: pointer;
			-webkit-box-shadow: 0px 1px 3px 0 rgba(0, 0, 0, 0.2);
			box-shadow: 0px 1px 3px 0 rgba(0, 0, 0, 0.2);
		}

		@media (max-width: 600px) {
			.board-item-content {
				text-align: center;
			}

			.board-item-content span {
				display: none;
			}
		}
	</style>
	<script>
		// Inicialización de Muuri.js para las columnas y los elementos
		var dragContainer = document.querySelector('.drag-container');
		var itemContainers = [].slice.call(document.querySelectorAll('.board-column-content'));
		var columnGrids = [];
		var boardGrid;

		// Inicializar las grids de las columnas para arrastrar los elementos
		itemContainers.forEach(function (container) {
			var grid = new Muuri(container, {
				items: '.board-item',
				dragEnabled: true,
				dragSort: function () {
					return columnGrids;
				},
				dragContainer: dragContainer,
				dragAutoScroll: {
					targets: (item) => {
						return [
							{ element: window, priority: 0 },
							{ element: item.getGrid().getElement().parentNode, priority: 1 },
						];
					}
				},
			})
				.on('dragInit', function (item) {
					item.getElement().style.width = item.getWidth() + 'px';
					item.getElement().style.height = item.getHeight() + 'px';
				})
				.on('dragReleaseEnd', function (item) {
					item.getElement().style.width = '';
					item.getElement().style.height = '';
					item.getGrid().refreshItems([item]);
				})
				.on('layoutStart', function () {
					boardGrid.refreshItems().layout();
				});

			columnGrids.push(grid);
		});

		// Inicializar la grid principal para arrastrar las columnas
		boardGrid = new Muuri('.board', {
			dragEnabled: true,
			dragHandle: '.board-column-header'
		});



		// Función para guardar los IDs de los elementos en la columna "Done"
		$(document).ready(function () {
			$('#saveDoneItems').click(function () {
				var doneItems = [];
				var automovil = $('#automovil').val();
				if (automovil.trim() === '') {
					$('#automovilErrorEdit').text('Por favor ingrese una movilidad donde se asignara los estudiantes');
					return;
				}
				$('#automovilErrorEdit').text('');

				$('.done .board-item').each(function () {
					doneItems.push($(this).attr('id')); // Suponiendo que cada board-item tiene un id
				});
				$.ajax({
					url: '/eacgi', // Cambia esto por la ruta correcta a tu controlador
					type: 'POST',
					data: { doneItems: doneItems, automovil: automovil },
					success: function (response) {
						Swal.fire({
							text: "Datos enviados correctamente.",
							icon: "success",
							buttonsStyling: false,
							confirmButtonText: "Ok, entendido!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						})
					},
					error: function () {
						Swal.fire({
							text: "ERROR, Por favor verifique e intente nuevamente ",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Aceptar!",
							customClass: { confirmButton: "btn btn-primary" },
						});
					}
				});
			});
		});

	</script>
	<script>
		$(document).ready(function(){
        $('#enviar4').click(function(e){
            e.preventDefault();
            var automovilId = $('#automovil').val();
            var errorMessage = '';
            if (!automovilId) {
                errorMessage += 'Por favor, seleccione un automóvil.<br>';
            }
            if (errorMessage) {
                Swal.fire({
                    icon: 'error',
                    title: 'Campos incompletos',
                    html: errorMessage
                });
            } else {
                var url = '/ecf5?id=' + automovilId;
				window.open(url, '_blank');
			}
        });
    });
   

</script>
<?php } elseif (strpos($currentUrl, "ecmeav") !== false) { ?>
	<script src="recursos/metronic/assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<script>
		$.urlParam = function (name) {
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		var table;
		var dt;
		var filterPayment;
		// Class definition
		var KTDatatablesServerSide = function () {
			// Private functions
			var initDatatable = function () {
				dt = $("#kt_datatable_privilegios").DataTable({
					searchDelay: 500,
					processing: true,
					serverSide: true,
					order: [[1, 'asc']],
					stateSave: true,
					select: {
						style: 'multi',
						selector: 'td:first-child input[type="checkbox"]',
						className: 'row-selected'
					},
					ajax: {
						//hostUrl+"allTipoIndice?c="+$.urlParam('c'),
						url: '/aclav',
						dataSrc: 'data' // La propiedad que contiene los datos en la respuesta JSON
					},
					columns: [
						{
							data: 'nom_estudiante',
							render: function (data, type, row) {
								return `
													<div class="ms-5">
														<a 
															class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
															data-kt-ecommerce-category-filter="category_name">${data} ${row.ape_estudiante}</a>
														<div class="text-muted fs-7 fw-bolder">Curso: ${row.cur_estudiante}</div>
													</div>
												`;
							}
						},
						{
							data: 'nom_padre',
							render: function (data, type, row) {
								return `
													<div class="ms-5">
														<a 
															class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
															data-kt-ecommerce-category-filter="category_name">${data} ${row.ape_padre}</a>
														<div class="text-muted fs-7 fw-bolder">Telefono: ${row.tel_padre}</div>
													</div>
												`;
							}
						},
						{
							data: 'nom_conductor',
							render: function (data, type, row) {
								return `
													<div class="ms-5">
														<a 
															class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
															data-kt-ecommerce-category-filter="category_name">${data} ${row.ape_conductor}</a>
														<div class="text-muted fs-7 fw-bolder">Telefono: ${row.tel_conductor}</div>
													</div>
												`;
							}
						},
						{
							data: 'mar_automovil',
							render: function (data, type, row) {
								return `
													<div class="ms-5">
														<a 
															class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
															data-kt-ecommerce-category-filter="category_name">Marca: ${data}</a>
														<div class="text-muted fs-7 fw-bolder">Modelo: ${row.mod_automovil}</div>
														<div class="text-muted fs-7 fw-bolder">Color: ${row.color_automovil}</div>
														<div class="text-muted fs-7 fw-bolder">Placa: ${row.placa_automovil}</div>
						
													</div>
												`;
							}
						},
						{
							data: 'mar_automovil',
							render: function (data, type, row) {
								return `
											<div class="ms-5">
					<a 
					   class="text-gray-800 text-hover-primary fs-5 fw-bolder mb-1"
					   data-kt-ecommerce-category-filter="category_name">Descripcion</a>
					<div class="alert alert-danger d-flex align-items-center mt-2" role="alert">
						<i class="fas fa-exclamation-triangle fa-2x me-3"></i>
						<div>
							<strong class="text-danger">Mensaje de alerta:</strong> Hubo un suceso inesperado fuera de lo comun comunicarce con el conductor y padres del estudiante..
						</div>
					</div>
				</div>

												`;
							}
						},

						{
							data: 'created_at',
							render: function (data) {
								// Convertir la fecha a un objeto Date
								var date = new Date(data);
								// Obtener el día, mes y año
								var day = date.getDate();
								var month = date.getMonth(); // Se suma 1 porque los meses van de 0 a 11 en JavaScript
								var year = date.getFullYear();
								var monthNames = [
									"Enero", "Febrero", "Marzo",
									"Abril", "Mayo", "Junio", "Julio",
									"Agosto", "Septiembre", "Octubre",
									"Noviembre", "Diciembre"
								];
								// Formatear la fecha como "dd de mes de yyyy"
								return day + ' de ' + monthNames[month] + ' de ' + year;
							}
						},
						{
							data: 'Actions',
							render: function (data, type, row) {
								return `
													<div class="text-end">
											
														<?php if ($eliminar || $administrador): ?>
																		<a href="javascript:;" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" id="eliminar" data-kt-users-table-filter="delete_row" data-id="${row.id}" data-nombre="${row.nom_estudiante}">
																				<i class="fa-solid fa-check"></i>
																			</a>

														<?php endif; ?>
													</div>
																				`;
							}
						},
					],
					// columnDefs: [
					//     {
					//         targets: 0,
					//         orderable: false,
					//         render: function (data) {
					//             return `
					//                 <div class="form-check form-check-sm form-check-custom form-check-solid">
					//                     <input class="form-check-input" type="checkbox" value="${data}" />
					//                 </div>`;
					//         }
					//     },
					// ],
					// Add data-filter attribute
					createdRow: function (row, data, dataIndex) {
						$(row).find('td:eq(4)').attr('data-filter', data.CreditCardType);
					}
				});
				table = dt.$;
				// Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
				dt.on('draw', function () {
					initToggleToolbar();
					KTMenu.createInstances();
				});

			}
			// Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
			var handleSearchDatatable = function () {
				const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
				filterSearch.addEventListener('keyup', function (e) {
					dt.search(e.target.value).draw();
				});
			}
			// Init toggle toolbar
			var initToggleToolbar = function () {
				// Toggle selected action toolbar
				// Select all checkboxes
				const container = document.querySelector('#kt_datatable_privilegios');
				const checkboxes = container.querySelectorAll('[type="checkbox"]');

				// Select elements
				const deleteSelected = document.querySelector('[data-kt-docs-table-select="delete_selected"]');

				// Toggle delete selected toolbar
				checkboxes.forEach(c => {
					// Checkbox on click event
					//console.log()
					c.addEventListener('click', function () {

						setTimeout(function () {
							toggleToolbars();
						}, 50);
					});
				});
			}
			return {
				init: function () {
					initDatatable();
					handleSearchDatatable();
					initToggleToolbar();
				}
			}
		}();
		function recargar_tabla() {
			dt.ajax.reload();
		}
		// On document ready
		KTUtil.onDOMContentLoaded(function () {
			KTDatatablesServerSide.init();
		});
		$(document).on("click", "tbody td #eliminar", function () {
			var el = $(this);
			Swal.fire({
				text: "Está ticker como leido esta alerta del estudiante: " + el.data("nombre"),
				icon: "error",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Si, eliminar!",
				cancelButtonText: "No, eliminar",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					$.ajax({
						data: { "id": el.data('id'), "nombre": el.data('nombre') },
						type: "POST",
						dataType: "json",
						url: '/acea'
					})
						.done(function (data, textStatus, jqXHR) {

							if (data.success) {

								Swal.fire({
									text: data.message,
									icon: "success",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-primary"
									}
								}).then(function (result) {
									if (result.value) {
									}
								});
							} else {
								Swal.fire({
									text: data.message,
									icon: "error",
									buttonsStyling: false,
									confirmButtonText: "Ok!",
									customClass: {
										confirmButton: "btn btn-danger"
									}
								}).then(function (result) {
									if (result.value) {
										//	console.log("error");
									}
								});
							}

							recargar_tabla();
						})
						.fail(function (jqXHR, textStatus, errorThrown) {

							Swal.fire({
								text: "Ocurrio un Error!",
								icon: "error",
								buttonsStyling: false,
								confirmButtonText: "Ok!",
								customClass: {
									confirmButton: "btn btn-danger"
								}
							}).then(function (result) {

							});

							recargar_tabla();
						});
				}
			});
		});

	</script>


<?php }
; ?>


<!--end::Custom Javascript-->
<!--end::Javascript-->