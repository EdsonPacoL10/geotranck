<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Container-->
	<div class="container-xxl" id="kt_content_container">
		<!--begin::Row-->
		<div class="row g-5 g-xl-8">
			<div class="col-xl-4">
				<div class="card bgi-no-repeat card-xl-stretch mb-xl-8"
					style="background-position: right top; background-size: 30% auto; background-image: url(recursos/metronic/assets/media/svg/shapes/abstract-4.svg)">
					<!--begin::Body-->
					<div class="card-body">
						<a href="#" class="card-title fw-bold text-muted text-hover-primary fs-4">HORA DEL SISTEMA</a>
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

			<div class="col-xl-4">
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
						<p class="text-dark-75 fw-semibold fs-5 m-0">Número de estudiantes registrador en el sistema del
							colegio con el servicio del transporte</p>
					</div>
					<!--end::Body-->
				</div>
				<!--end::Statistics Widget 1-->
			</div>
			<div class="col-xl-4">
				<!--begin::Statistics Widget 1-->
				<div class="card bgi-no-repeat card-xl-stretch mb-5 mb-xl-8"
					style="background-position: right top; background-size: 30% auto; background-image: url(recursos/metronic/assets/media/svg/shapes/abstract-1.svg)">
					<!--begin::Body-->
					<div class="card-body">
						<a href="#" class="card-title fw-bold text-muted text-hover-primary fs-4">Número de Usuario</a>
						<div class="fw-bold text-primary my-6" style=" font-size: 3rem; ">
							<?php
							echo $nroPerfil[0]['numeroper'];
							?>

						</div>
						<p class="text-dark-75 fw-semibold fs-5 m-0">Este es el número de usuarios que podran ingresar
							al sistema en diferentes roles</p>
					</div>
					<!--end::Body-->
				</div>
				<!--end::Statistics Widget 1-->
			</div>
		</div>
		<!--end::Row-->
		<!--begin::Row-->



		<div class="card mb-6 ">
			<div class="card-body pt-8 pb-0">
				<center>
					<h2>REPORTES DEL SISTEMA</h2>
				</center>
				<!--begin::Details-->
				<div class="d-flex flex-wrap flex-sm-nowrap">
					<!--begin: Pic-->
					<div class="me-7 mb-4">
						<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
							<img src="uploads/Usuarios/<?php echo session()->foto_perfil ?>" alt="image">
							<div
								class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
							</div>
						</div>
					</div>
					<!--end::Pic-->
					<!--begin::Info-->
					<div class="flex-grow-1">
						<!--begin::Title-->
						<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
							<!--begin::User-->
							<div class="d-flex flex-column">
								<!--begin::Name-->
								<div class="d-flex align-items-center mb-2">
									<a class="text-gray-900 text-hover-primary fs-2 fw-bold me-1"><?php echo session()->nombre ?>
										<?php echo session()->apellido ?> </a>
									<a>
										<!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
										<span class="svg-icon svg-icon-1 svg-icon-primary">
											<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
												viewBox="0 0 24 24">
												<path
													d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
													fill="currentColor"></path>
												<path
													d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
													fill="white"></path>
											</svg>
										</span>
										<!--end::Svg Icon-->
									</a>
								</div>
								<!--end::Name-->
								<!--begin::Info-->
								<div class="d-flex flex-wrap fw-semibold fs-4">
									<a href="#"
										class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
										<!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
										<span class="svg-icon svg-icon-4 me-1">
											<svg width="18" height="18" viewBox="0 0 18 18" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<path opacity="0.3"
													d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z"
													fill="currentColor"></path>
												<path
													d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z"
													fill="currentColor"></path>
												<rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor">
												</rect>
											</svg>
										</span>
										<!--end::Svg Icon-->Administrador</a>

								</div>
								<!--end::Info-->
							</div>
							<!--end::User-->

						</div>
						<!--end::Title-->

						<div class="row mb-6 align-items-center">
							<!--begin::Label-->
							<label class="col-lg-2 col-form-label fw-semibold fs-6 d-flex align-items-center">
								<span>Automovil</span>
								<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
									title="Seleccionar Automovil previamente creado"></i>
							</label>
							<!--end::Label-->
							<!--begin::Col-->
							<div class="col-lg-6 fv-row">
								<select id="automovil" aria-label="Seleccionar Automovil"
									data-placeholder="Seleccionar Automovil..."
									class="form-select form-select-solid form-select-lg fw-semibold"
									style="max-height: 160px; overflow-y: auto;">
									<option value="">Seleccionar Automovil...</option>
									<?php if (!empty($automovil)): ?>
										<?php foreach ($automovil as $value): ?>
											<option value="<?php echo $value['id'] ?>">
												Conductor: <?php echo $value['nombreconductor']; ?> Telefono:
												<?php echo $value['nrotelefono']; ?> Marca: <?php echo $value['marca']; ?>
												Placa:
												<?php echo $value['placa']; ?>
											</option>
										<?php endforeach; ?>
									<?php else: ?>
										<option value="">Sin Datos</option>
									<?php endif; ?>
								</select>
							</div>
							<!--end::Col-->
							<div class="col-lg-4 d-flex flex-column justify-content-start">
								<div class="mb-0">
									<label class="col-form-label fw-semibold fs-6 d-flex align-items-center">
										<span>Fecha Inicio</span>
										<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
											title="Seleccionar fecha inicial del filtrado"></i>
									</label>
									<input type="date" class="form-control" id="fecha_inicio"
										placeholder="Seleccionar fecha">
								</div>

								<div class="mb-0">
									<label class="col-form-label fw-semibold fs-6 d-flex align-items-center">
										<span>Fecha Final</span>
										<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
											title="Seleccionar fecha final del filtrado"></i>
									</label>
									<input type="date" class="form-control" id="fecha_final"
										placeholder="Seleccionar fecha">
								</div>
							</div>
						</div>
						<span id="automovilErrorEdit" style="color: red;"></span>


						<div class="d-flex flex-wrap flex-stack">
							<!--begin::Wrapper-->
							<div class="d-flex flex-column flex-grow-1 pe-8">
								<!--begin::Stats-->
								<div class="d-flex flex-wrap">
									<!--begin::Stat-->
									<div
										class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">
											<a class="btn btn-primary ms-2"  id="enviar">
												<i class="fas fa-print me-1"></i>Imprimir
											</a>
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-semibold fs-6 text-gray-400">Puntos de parada <br>de las
											movilidades</div>
										<!--end::Label-->
									</div>
									<!--end::Stat-->

									<!--begin::Stat-->
									<div
										class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">
											<a class="btn btn-primary ms-2" id="enviar1">
												<i class="fas fa-print me-1"></i>Imprimir
											</a>
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-semibold fs-6 text-gray-400">Lista de <br>Estudiantes del
											Servicio</div>
										<!--end::Label-->
									</div>
									<!--end::Stat-->
									<!--begin::Stat-->
									<div
										class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">
											<a class="btn btn-primary ms-2" id="enviar2" >
												<i class="fas fa-print me-1"></i>Imprimir
											</a>
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-semibold fs-6 text-gray-400">Lista de movilidades</div>
										<!--end::Label-->
									</div>
									<!--end::Stat-->
								</div>
								<!--end::Stats-->
								<!--begin::Stats-->
								<div class="d-flex flex-wrap">
									<!--begin::Stat-->
									<div
										class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">
											<a class="btn btn-primary ms-2" id="enviar3">
												<i class="fas fa-print me-1"></i>Imprimir
											</a>
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-semibold fs-6 text-gray-400">Guia Telefonica</div>
										<!--end::Label-->
									</div>
									<!--end::Stat-->
									<!--begin::Stat-->
									<div
										class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
										<!--begin::Number-->
										<div class="d-flex align-items-center">
											<a class="btn btn-primary ms-2" id="enviar4">
												<i class="fas fa-print me-1"></i>Imprimir
											</a>
										</div>
										<!--end::Number-->
										<!--begin::Label-->
										<div class="fw-semibold fs-6 text-gray-400">Lista de Estudiantes <br> en los
											automoviles
										</div>
										<!--end::Label-->
									</div>
									<!--end::Stat-->

								</div>
								<!--end::Stats-->
							</div>
							<!--end::Wrapper-->

						</div>
					</div>
					<!--end::Info-->
				</div>
				<!--end::Details-->

			</div>
		</div>

		<div class="row g-6 g-xl-9 mb-5">
			<div class="col-xl-6">
				<div id="container2" style="width: 100%; height: 450px;"></div>
			</div>
			<div class="col-xl-6">
				<div id="container1" style="width: 100%; height: 450px;"></div>
			</div>
		</div>
		<div class="row g-6 g-xl-9 mb-8">

			<div class="col-xl-6">
				<button class="btn btn-primary mt-3" id="export-csv">Exportar a CSV</button>
				<button class="btn btn-primary mt-3" id="export-excel">Exportar a Excel</button>
				<button class="btn btn-primary mt-3" id="toggle-fullscreen">Ver en pantalla completa</button>
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