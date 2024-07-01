<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Container-->
	<div class="container-xxl" id="kt_content_container">
		<!--begin::Row-->
		<div class="row g-5 g-xl-8">
			<div class="col-xl-6">
				<div class="card bgi-no-repeat card-xl-stretch mb-xl-8"
					style="background-position: right top; background-size: 30% auto; background-image: url(recursos/metronic/assets/media/svg/shapes/abstract-4.svg)">
					<!--begin::Body-->
					<div class="card-body">
						<a href="#" class="card-title fw-bold text-muted text-hover-primary fs-4">HORA conductor DEL SISTEMA</a>
						<div class="fw-bold text-primary my-6" style=" font-size: 3rem; " id="horaSistema"></div>
						<p class="text-dark-75 fw-semibold fs-5 m-0">Hora actual de sistema
						</p>
					</div>
					<!--end::Body-->
				</div>
				<!--end::Statistics Widget 1-->

				<script>
					// Obtener el elemento donde se mostrará la hora del sistema
					var horaSistemaElement = document.getElementById('horaSistema');

					// Función para obtener la hora actual y actualizar el contenido del elemento
					function actualizarHora() {
						var fecha = new Date();
						var hora = fecha.getHours();
						var minutos = fecha.getMinutes();
						var horaActual = hora + ':' + (minutos < 10 ? '0' + minutos : minutos);
						horaSistemaElement.innerText = horaActual;
					}

					// Llamar a la función para actualizar la hora cada segundo
					setInterval(actualizarHora, 1000);
				</script>
			</div>
			<div class="col-xl-6">
				<!--begin::Statistics Widget 1-->
				<div class="card bgi-no-repeat card-xl-stretch mb-5 mb-xl-8"
					style="background-position: right top; background-size: 30% auto; background-image: url(recursos/metronic/assets/media/svg/shapes/abstract-1.svg)">
					<!--begin::Body-->
					<div class="card-body">
						<a href="#" class="card-title fw-bold text-muted text-hover-primary fs-4">Número de
							Estudiantes</a>
						<div class="fw-bold text-primary my-6" style=" font-size: 3rem; ">
							<?php
							echo $nroEstu[0]['numeroes'];
							?>
						</div>
						<p class="text-dark-75 fw-semibold fs-5 m-0">Número de estudiantes que estan asignados a su movilidad para el recojo.</p>
					</div>
					<!--end::Body-->
				</div>
				<!--end::Statistics Widget 1-->
			</div>
		
		</div>
		<!--end::Row-->
		<!--begin::Row-->
		<div class="position-relative mb-4">
					<!--begin::Overlay-->
					<div class="overlay overlay-show">
						<!--begin::Image-->
						<div class="bgi-no-repeat bgi-position bgi-size-cover card-rounded min-h-250px"
							style="background-image:url('recursos/img/fondos/gps.png')"></div>
						<!--end::Image-->
						<!--begin::layer-->
						<div class="overlay-layer rounded bg-black" style="opacity: 0.4"></div>
						<!--end::layer-->
					</div>
					<!--end::Overlay-->
					<!--begin::Heading-->
					<div class="position-absolute text-white mb-8 ms-10 bottom-0">
						<!--begin::Title-->
						<h3 class="text-white fs-2qx fw-bold mb-3 m">Hogar de Estudiantes</h3>
						<!--end::Title-->
						<!--begin::Text-->
						<div class="fs-5 fw-semibold">En el siguiente mapa podra apreciar la informacion importante del estudiantes y la ubicacion del hogar del mismo</div>
						<!--end::Text-->
					</div>
					<!--end::Heading-->
				</div>

		<div class="row g-6 g-xl-9 mb-8">

			<div class="col-xl-6">
				<button class="btn btn-primary mt-0 col-xl-12" id="toggle-fullscreen">Ver en pantalla completa</button>
				<div id="map"></div>
			</div>
			<div class="col-xl-6">
				<!--begin::Statistics Widget 1-->
				<div class="card bgi-no-repeat card-xl-stretch mb-xl-8"
					style="background-position: right top; background-size: 30% auto; background-image: url('recursos/metronic/assets/media/svg/shapes/abstract-1.svg')">
					<!--begin::Body-->
					<div class="card-body">
						<h1>Información del Estudiante</h1>
						<p class="text-dark-75 fw-semibold fs-5 m-0">Seleccione una ubicacion para poder ver los datos
							del estudiante</p>

						<div id="mensajeEstudiante">
						</div>
					</div>
					<!--end::Body-->
				</div>
				<!--end::Statistics Widget 1-->
			</div>

		</div>



		<!--end::Row-->

	</div>
	<!--end::Container-->
</div>
<!--end::Content-->