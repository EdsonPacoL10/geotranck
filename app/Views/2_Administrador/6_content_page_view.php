<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Container-->
	<div class="container-xxl" id="kt_content_container">
		<!--begin::Row-->

		<!--end::Row-->
		<!--begin::Row-->
		<?php if (session()->rolnombre == 'Administrador' || session()->rolnombre == 'Conductor') { ?>

			<div class="row g-5 g-xl-8">

				<!--begin::Hero-->
				<div class="position-relative mb-2">
					<!--begin::Overlay-->
					<div class="overlay overlay-show">
						<!--begin::Image-->
						<div class="bgi-no-repeat bgi-position bgi-size-cover card-rounded min-h-350px"
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
						<h3 class="text-white fs-2qx fw-bold mb-3 m">Rastreo de Automoviles</h3>
						<!--end::Title-->
						<!--begin::Text-->
						<div class="fs-5 fw-semibold">En este sector del sistema se puede apreciar el rastreo que el sistema
							realiza a la movilidad .</div>
						<!--end::Text-->
					</div>
					<!--end::Heading-->
				</div>
				<!--end::-->
				<!--begin::Layout-->
				<div class="d-flex flex-column flex-lg-row ">
					<!--begin::Content-->
					<div class="flex-lg-row-fluid me-0 me-lg-10">
						<!--begin::Job-->
						<div class="mb-xl-8">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title text-gray-800 w-bolder mb-4">Datos GPS del Dispositivo</h4>
									<div class="row g-10">
										<div class="col-md-4">
											<p class="card-text fw-semibold fs-5 text-gray-600">Latitud:.<span
													id="latitude">Cargando...</span> </p>
										</div>
										<div class="col-md-4">
											<p class="card-text fw-semibold fs-5 text-gray-600">longitud:.<span
													id="longitude">Cargando...</span></p>
										</div>
										<div class="col-md-4">
											<p class="card-text fw-semibold fs-5 text-gray-600">Presicion:.<span
													id="accuracy">Cargando...</span></p>
											<br>
										</div>
									</div>
									<div class="mb-3">
										<input type="hidden" id="updateInterval" class="form-control" min="1" value="30">
									</div>
									<div class="row">
										<div class="col-md-6 mb-3">
											<label for="hours" class="form-label">Horas: </label>
											<input type="number" id="hours" class="form-control" min="0" value="1">
										</div>
										<div class="col-md-6 mb-3">
											<label for="minutes" class="form-label">Minutos: </label>
											<input type="number" id="minutes" class="form-control" min="0" max="59"
												value="0">
										</div>
									</div>
									<button class="btn btn-primary mt-3" id="startTracking">Iniciar Seguimiento</button>
									<button class="btn btn-primary mt-3" id="startJourney">Iniciar Viaje</button>
									<button class="btn btn-primary mt-3" id="endJourney">Finalizar Viaje</button>
									<button class="btn btn-primary mt-3" id="GuardarRuta">Guardar Ruta</button>
								

								</div>
							</div>
							<div id="map" class="mt-4"></div>
						</div>
						<!--end::Job-->
					</div>
					<!--end::Content-->
					<!--begin::Sidebar-->
					<div class="flex-lg-row-auto w-100 w-lg-275px w-xxl-250px">
						<!--begin::Careers about-->
						<div class="card bg-light">
							<!--begin::Body-->
							<div class="card-body">
								<!--begin::Top-->
								<div class="mb-7">
									<!--begin::Title-->
									<h2 class="fs-1 text-gray-800 w-bolder mb-6">Advertencia</h2>
									<!--end::Title-->
									<!--begin::Text-->
									<p class="fw-semibold fs-6 text-gray-600">Verifique los siguientes puntos para mejorar
										la experiencia</p>
									<!--end::Text-->
								</div>
								<!--end::Top-->
								<!--begin::Item-->
								<div class="mb-8">
									<!--begin::Title-->
									<h4 class="text-gray-700 w-bolder mb-0">Requerimientos:</h4>
									<!--end::Title-->
									<!--begin::Section-->
									<div class="my-2">
										<!--begin::Row-->
										<div class="d-flex align-items-center mb-3">
											<!--begin::Bullet-->
											<span class="bullet me-3"></span>
											<!--end::Bullet-->
											<!--begin::Label-->
											<div class="text-gray-600 fw-semibold fs-6">Dar permisos al navegador para
												acceder a la ubicacion</div>
											<!--end::Label-->
										</div>
										<!--end::Row-->
										<!--begin::Row-->
										<div class="d-flex align-items-center mb-3">
											<!--begin::Bullet-->
											<span class="bullet me-3"></span>
											<!--end::Bullet-->
											<!--begin::Label-->
											<div class="text-gray-600 fw-semibold fs-6">Activar el dispositivo GPS del
												equipo</div>
											<!--end::Label-->
										</div>
										<!--end::Row-->
										<!--begin::Row-->
										<div class="d-flex align-items-center mb-3">
											<!--begin::Bullet-->
											<span class="bullet me-3"></span>
											<!--end::Bullet-->
											<!--begin::Label-->
											<div class="text-gray-600 fw-semibold fs-6">Por favor siga las indicaciones o
												mensajes del sistema con cuidado.</div>
											<!--end::Label-->
										</div>
										<!--end::Row-->

									</div>
									<!--end::Section-->
								</div>
								<!--end::Item-->

								<!--begin::Link-->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Careers about-->
						<!--begin::Careers about-->
						<div class="card bg-light">
							<!--begin::Body-->
							<div class="card-body">
								<!--begin::Top-->
								<div class="mb-7">
									<!--begin::Title-->
									<h2 class="fs-1 text-gray-800 w-bolder mb-6">Porceso de rastreo</h2>
									<!--end::Title-->
									<div class="my-15 mx-15">
										<div id="flashingLight" style="display: none;"></div>
									</div>

								</div>
								<!--end::Top-->
								<!--begin::Link-->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Careers about-->
					</div>

					<!--end::Sidebar-->
				</div>
				<!--end::Layout-->
			</div>
		<?php } else { ?>

			<div class="row g-5 g-xl-8">

				<!--begin::Hero-->
				<div class="position-relative mb-2">
					<!--begin::Overlay-->
					<div class="overlay overlay-show">
						<!--begin::Image-->
						<div class="bgi-no-repeat bgi-position bgi-size-cover card-rounded min-h-350px"
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
						<h3 class="text-white fs-2qx fw-bold mb-3 m">Rastreo de Automoviles</h3>
						<!--end::Title-->
						<!--begin::Text-->
						<div class="fs-5 fw-semibold">En este sector del sistema se puede apreciar el rastreo que el sistema
							realiza a la movilidad .</div>
						<!--end::Text-->
					</div>
					<!--end::Heading-->
				</div>
				<!--end::-->
				<!--begin::Layout-->
				<div class="d-flex flex-column flex-lg-row ">
					<!--begin::Content-->
					<div class="flex-lg-row-fluid me-0 me-lg-10">
						<!--begin::Job-->
						<div class="mb-xl-10">
							<div class="card">
								<div class="card-body">
									<button class="btn btn-primary" id="SeguimientoReal">Seguimiento Tiempo
										Real</button>
								</div>
							</div>
							<div id="mapid" class="mt-4"></div>
						</div>
						<!--end::Job-->
					</div>
					<!--end::Content-->

					<div style="max-height: 550px; overflow-x: auto; overflow-y: auto; white-space: nowrap;">


						<!--begin::Content-->
						<div class="flex-lg-row-fluid me-0 me-lg-2">
							<!--begin::Job-->
							<div class="mb-xl-8">
								<div class="card">
									<div class="card-body">
										<h2>INFORMACION Y DATOS IMPORTANTES</h2>
									</div>
								</div>
							</div>
							<!--end::Job-->
						</div>
						<!--end::Content-->
						<!-- Datos de Estudiantes y Conductores -->
						<?php if (!empty($datosEstudiantePadre)): ?>
							<?php foreach ($datosEstudiantePadre as $dato): ?>
								<div class="card bg-light my-3">
									<div class="card-body">
										<h4 class="text-gray-700 w-bolder mb-0">Estudiante:</h4>
										<p class="text-gray-600 fw-semibold fs-6">
											<img src="<?= base_url('uploads/Estudiante/' . $dato['img']) ?>"
												alt="<?= $dato['nomestudiante'] ?>" class="img-thumbnail" width="100">
											<br>
											Nombre: <?= $dato['nomestudiante'] ?> 			<?= $dato['apeestudiant'] ?><br>
											CI: <?= $dato['cedulaestudiante'] ?><br>
										</p>
										<h4 class="text-gray-700 w-bolder mb-0">Padre/Madre:</h4>
										<p class="text-gray-600 fw-semibold fs-6">
											Nombre: <?= $dato['nompadre'] ?> 			<?= $dato['apellidopadre'] ?><br>
											Teléfono: <?= $dato['telefonopadre'] ?><br>

										</p>
										<h4 class="text-gray-700 w-bolder mb-0">Conductor:</h4>
										<p class="text-gray-600 fw-semibold fs-6">
											Nombre: <?= $dato['nomconductor'] ?> 			<?= $dato['apellidoconductor'] ?><br>
											Teléfono: <?= $dato['telefono'] ?><br>

										</p>
										<h4 class="text-gray-700 w-bolder mb-0">Automovil:</h4>
										<p class="text-gray-600 fw-semibold fs-6">
											<img src="<?= base_url('uploads/Automoviles/' . $dato['imgauto']) ?>"
												alt="<?= $dato['marca'] ?>" class="img-thumbnail" width="100">
											<br>
											Vehículo: <?= $dato['marca'] ?>, Modelo: <?= $dato['modelo'] ?>, <br>Color:
											<?= $dato['color'] ?>, Placa: <?= $dato['placa'] ?><br>
										</p>
										<h4 class="text-gray-700 w-bolder mb-0">Hogar:</h4>
										<p class="text-gray-600 fw-semibold fs-6" style="font-size: 14px; word-wrap: break-word;">
											Hogar: <?= $dato['tipo'] ?>
											<br>Descripcion:
											<?= $dato['descripcion'] ?><br> Avenida:
											<?= $dato['color'] ?>
										</p>
									</div>
								</div>

							<?php endforeach; ?>

						<?php else: ?>
							<p class="text-gray-600 fw-semibold fs-6">No hay datos disponibles.</p>
						<?php endif; ?>

					</div>

				</div>

			</div>
			<!--end::Layout-->

		<?php } ?>
		<!--end::Row-->

	</div>
	<!--end::Container-->
</div>
<!--end::Content-->