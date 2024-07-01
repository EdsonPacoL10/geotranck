<!--begin::Container-->
<div class="container-xxl" id="kt_content_container">
	<!--begin::Card-->
	<div class="card">
		<!--begin::Card header-->
		<div class="card-header border-0 pt-6">
			<!--begin::Card title-->
			<div class="card-title">
				<!--begin::Search-->
				<div class="d-flex align-items-center position-relative my-1">
					<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
					<span class="svg-icon svg-icon-1 position-absolute ms-6">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
								transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
							<path
								d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
								fill="currentColor" />
						</svg>
					</span>
					<!--end::Svg Icon-->
					<input type="text" data-kt-docs-table-filter="search"
						class="form-control form-control-solid w-250px ps-14" placeholder="Busqueda" />
				</div>
				<!--end::Search-->
			</div>
			<!--begin::Card title-->
			<!--begin::Card toolbar-->
			<div class="card-toolbar">
				<!--begin::Toolbar-->
				<div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
					<!--begin::Add user-->
					<?php if ($agregar || $administrador): ?>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal"
							data-bs-target="#kt_modal_update_role">
							<!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
							<span class="svg-icon svg-icon-2">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
										transform="rotate(-90 11.364 20.364)" fill="currentColor" />
									<rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->
							Adicionar Grupo
						</button>
					<?php endif; ?>
					<!--end::Add user-->
				</div>
				<!--end::Toolbar-->


				<!--begin::Modal - Update role-->
				<div class="modal fade" id="kt_modal_update_role" tabindex="-1" aria-hidden="true">
					<!--begin::Modal dialog-->
					<div class="modal-dialog modal-dialog-centered mw-750px">
						<!--begin::Modal content-->
						<div class="modal-content">
							<!--begin::Modal header-->
							<div class="modal-header">
								<!--begin::Modal title-->
								<h2 class="fw-bold">Agregar grupo de privilegios</h2>
								<!--end::Modal title-->
								<!--begin::Close-->
								<div class="btn btn-icon btn-sm btn-active-icon-primary"
									data-kt-roles-modal-action="close">
									<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
									<span class="svg-icon svg-icon-1">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
											xmlns="http://www.w3.org/2000/svg">
											<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
												transform="rotate(-45 6 17.3137)" fill="currentColor" />
											<rect x="7.41422" y="6" width="16" height="2" rx="1"
												transform="rotate(45 7.41422 6)" fill="currentColor" />
										</svg>
									</span>
									<!--end::Svg Icon-->
								</div>
								<!--end::Close-->
							</div>
							<!--end::Modal header-->
							<!--begin::Modal body-->
							<div class="modal-body scroll-y mx-5 my-7">
								<!--begin::Scroll-->
								<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll"
									data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
									data-kt-scroll-max-height="auto"
									data-kt-scroll-dependencies="#kt_modal_update_role_header"
									data-kt-scroll-wrappers="#kt_modal_update_role_scroll"
									data-kt-scroll-offset="300px">
									<!--begin::Input group-->
									<div class="fv-row mb-10">
										<!--begin::Label-->
										<label class="fs-5 fw-bold form-label mb-2">
											<span class="required">Nombre del grupo </span>
										</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input class="form-control form-control-solid"
											placeholder="Ingresar nombre al grupo de permisos" name="nombreGrupo"
											id="nombreGrupo" />
										<!--end::Input-->
										<span id="nombreError" style="color: red;"></span>
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="fv-row mb-10">
										<!--begin::Label-->
										<label class="fs-5 fw-bold form-label mb-2">
											<span class="required">Descripcion </span>
										</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input class="form-control form-control-solid"
											placeholder="Ingrese una descripcion corta" name="descripcionGrupo"
											id="descripcionGrupo" />
										<!--end::Input-->
										<span id="descripcionError" style="color: red;"></span>
									</div>
									<!--end::Input group-->
									<!--begin::Permissions-->
									<div class="fv-row">
										<!--begin::Label-->
										<label class="fs-5 fw-bold form-label mb-2">Permisos</label>
										<!--end::Label-->
										<!--begin::Table wrapper-->
										<div class="table-responsive">
											<!--begin::Table-->
											<table class="table align-middle table-row-dashed fs-6 gy-5">
												<!--begin::Table body-->
												<tbody class="text-gray-600 fw-semibold">
													<!--begin::Table row-->
													<tr>
														<td class="text-gray-800">Administrator
															<i class="fas fa-exclamation-circle ms-1 fs-7"
																data-bs-toggle="tooltip"
																title="Permite un acceso completo al sistema."></i>
														</td>
														<td>
															<!--begin::Checkbox-->
															<label
																class="form-check form-check-sm form-check-custom form-check-solid me-9">
																<input class="form-check-input" type="checkbox"
																	value="0" id="administrador" />
																<span class="form-check-label"
																	for="kt_roles_select_all">Todos los
																	privilegios</span>
															</label>
															<!--end::Checkbox-->
														</td>
													</tr>
													<!--end::Table row-->
													<!--begin::Table row-->
													<tr>
														<!--begin::Label-->
														<td class="text-gray-800">Privilegios</td>
														<!--end::Label-->
														<!--begin::Input group-->
														<span id="nombreErrorCkeck" style="color: red;"></span>
														<td>
															<!--begin::Wrapper-->
															<div class="d-flex">
																<!--begin::Checkbox-->
																<label
																	class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																	<input class="form-check-input" type="checkbox"
																		value="1" name="privilegioAgregar"
																		id="privilegioAgregar" />
																	<span class="form-check-label">Agregar</span>
																</label>
																<!--end::Checkbox-->
																<!--begin::Checkbox-->
																<label
																	class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																	<input class="form-check-input" type="checkbox"
																		value="2" name="privilegioModificar"
																		id="privilegioModificar" />
																	<span class="form-check-label">Modificar</span>
																</label>
																<!--end::Checkbox-->
																<!--begin::Checkbox-->
																<label
																	class="form-check form-check-custom form-check-solid">
																	<input class="form-check-input" type="checkbox"
																		value="3" name="privilegioEliminar"
																		id="privilegioEliminar" />
																	<span class="form-check-label">Eliminar</span>
																</label>
																<!--end::Checkbox-->
															</div>
															<!--end::Wrapper-->
														</td>
														<!--end::Input group-->
													</tr>
													<!--end::Table row-->
												</tbody>
												<!--end::Table body-->
											</table>
											<!--end::Table-->
										</div>
										<!--end::Table wrapper-->
									</div>
									<!--end::Permissions-->
								</div>
								<!--end::Scroll-->
								<!--begin::Actions-->
								<div class="text-center pt-15">
									<button type="button" class="btn btn-light me-3"
										data-kt-roles-modal-action="cancel">Cancelar</button>
									<button type="button" class="btn btn-primary" id="submitBtn">
										<span class="indicator-label">Enviar</span>
										</span>
									</button>

								</div>
								<!--end::Actions-->
							</div>
							<!--end::Modal body-->
						</div>
						<!--end::Modal content-->
					</div>
					<!--end::Modal dialog-->
				</div>
				<!--end::Modal - Update role-->

				<!-------------------------------------------------------------------------------------------------------------
				  begin::Modal - editar privilegio
				--------------------------------------------------------------------------------------------------------------->
				<!--begin::Modal - editar privilegio-->
				<div class="modal fade" id="editar_modal" tabindex="-1" aria-hidden="true">
					<!--begin::Modal dialog-->
					<div class="modal-dialog modal-dialog-centered mw-750px">
						<!--begin::Modal content-->
						<div class="modal-content">
							<!--begin::Modal header-->
							<div class="modal-header">
								<!--begin::Modal title-->
								<h2 class="fw-bold">Editar Privilegio</h2>
								<!--end::Modal title-->
								<!--begin::Close-->
								<div class="btn btn-icon btn-sm btn-active-icon-primary"
									data-kt-roles-modal-action="closeModalEdit">
									<!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
									<span class="svg-icon svg-icon-1">
										<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
											xmlns="http://www.w3.org/2000/svg">
											<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
												transform="rotate(-45 6 17.3137)" fill="currentColor" />
											<rect x="7.41422" y="6" width="16" height="2" rx="1"
												transform="rotate(45 7.41422 6)" fill="currentColor" />
										</svg>
									</span>
									<!--end::Svg Icon-->
								</div>
								<!--end::Close-->
							</div>
							<!--end::Modal header-->
							<!--begin::Modal body-->
							<div class="modal-body scroll-y mx-5 my-7">
								<!--begin::Scroll-->
								<div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_update_role_scroll"
									data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
									data-kt-scroll-max-height="auto"
									data-kt-scroll-dependencies="#kt_modal_update_role_header"
									data-kt-scroll-wrappers="#kt_modal_update_role_scroll"
									data-kt-scroll-offset="300px">
									<!--begin::Input group-->
									<input type="hidden" name="id" id="id" />

									<div class="fv-row mb-10">
										<!--begin::Label-->
										<label class="fs-5 fw-bold form-label mb-2">
											<span class="required">Nombre del grupo </span>
										</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input class="form-control form-control-solid"
											placeholder="Ingresar nombre al grupo de permisos" name="editNombre"
											id="editNombre" />
										<!--end::Input-->
										<span id="editnombreError" style="color: red;"></span>
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="fv-row mb-10">
										<!--begin::Label-->
										<label class="fs-5 fw-bold form-label mb-2">
											<span class="required">Descripcion </span>
										</label>
										<!--end::Label-->
										<!--begin::Input-->
										<input class="form-control form-control-solid"
											placeholder="Ingrese una descripcion corta" name="editDescripcion"
											id="editDescripcion" />
										<!--end::Input-->
										<span id="editdescripcionError" style="color: red;"></span>
									</div>
									<!--end::Input group-->
									<!--begin::Permissions-->
									<div class="fv-row">
										<!--begin::Label-->
										<label class="fs-5 fw-bold form-label mb-2">Permisos</label>
										<!--end::Label-->
										<!--begin::Table wrapper-->
										<div class="table-responsive">
											<!--begin::Table-->
											<table class="table align-middle table-row-dashed fs-6 gy-5">
												<!--begin::Table body-->
												<tbody class="text-gray-600 fw-semibold">
													<!--begin::Table row-->
													<tr>
														<td class="text-gray-800">Administrator
															<i class="fas fa-exclamation-circle ms-1 fs-7"
																data-bs-toggle="tooltip"
																title="Permite un acceso completo al sistema."></i>
														</td>
														<td>
															<!--begin::Checkbox-->
															<label
																class="form-check form-check-sm form-check-custom form-check-solid me-9">
																<input class="form-check-input" type="checkbox"
																	value="0" id="administradorEdit" />
																<span class="form-check-label"
																	for="kt_roles_select_all">Todos los
																	privilegios</span>
															</label>
															<!--end::Checkbox-->
														</td>
													</tr>
													<!--end::Table row-->
													<!--begin::Table row-->
													<tr>
														<!--begin::Label-->
														<td class="text-gray-800">Privilegios</td>
														<!--end::Label-->
														<!--begin::Input group-->
														<span id="editnombreErrorCkeck" style="color: red;"></span>
														<td>
															<!--begin::Wrapper-->
															<div class="d-flex">
																<!--begin::Checkbox-->
																<label
																	class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
																	<input class="form-check-input" type="checkbox"
																		value="1" name="privilegioAgregarEdit"
																		id="privilegioAgregarEdit" />
																	<span class="form-check-label">Agregar</span>
																</label>
																<!--end::Checkbox-->
																<!--begin::Checkbox-->
																<label
																	class="form-check form-check-custom form-check-solid me-5 me-lg-20">
																	<input class="form-check-input" type="checkbox"
																		value="2" name="privilegioModificarEdit"
																		id="privilegioModificarEdit" />
																	<span class="form-check-label">Modificar</span>
																</label>
																<!--end::Checkbox-->
																<!--begin::Checkbox-->
																<label
																	class="form-check form-check-custom form-check-solid">
																	<input class="form-check-input" type="checkbox"
																		value="3" name="privilegioEliminarEdit"
																		id="privilegioEliminarEdit" />
																	<span class="form-check-label">Eliminar</span>
																</label>
																<!--end::Checkbox-->
															</div>
															<!--end::Wrapper-->
														</td>
														<!--end::Input group-->
													</tr>
													<!--end::Table row-->
												</tbody>
												<!--end::Table body-->
											</table>
											<!--end::Table-->
										</div>
										<!--end::Table wrapper-->
									</div>
									<!--end::Permissions-->
								</div>
								<!--end::Scroll-->
								<!--begin::Actions-->
								<div class="text-center pt-15">
									<button type="button" class="btn btn-light me-3"
										data-kt-roles-modal-action="cancelModalEdit">Cancelar</button>
									<button type="button" class="btn btn-primary" id="modificarBtn">
										<span class="indicator-label">Modificar</span>
										</span>
									</button>

								</div>
								<!--end::Actions-->
							</div>
							<!--end::Modal body-->
						</div>
						<!--end::Modal content-->
					</div>
					<!--end::Modal dialog-->
				</div>
				<!--end::Modal - editar privilegio-->
			</div>
			<!--end::Card toolbar-->
		</div>
		<!--end::Card header-->
		<!--begin::Card body-->
		<div class="card-body py-4">
			<div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
				<!--begin::Icon-->
				<!--begin::Svg Icon | path: icons/duotune/art/art006.svg-->
				<span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path opacity="0.3"
							d="M22 19V17C22 16.4 21.6 16 21 16H8V3C8 2.4 7.6 2 7 2H5C4.4 2 4 2.4 4 3V19C4 19.6 4.4 20 5 20H21C21.6 20 22 19.6 22 19Z"
							fill="currentColor"></path>
						<path
							d="M20 5V21C20 21.6 19.6 22 19 22H17C16.4 22 16 21.6 16 21V8H8V4H19C19.6 4 20 4.4 20 5ZM3 8H4V4H3C2.4 4 2 4.4 2 5V7C2 7.6 2.4 8 3 8Z"
							fill="currentColor"></path>
					</svg>
				</span>
				<!--end::Svg Icon-->
				<!--end::Icon-->
				<!--begin::Wrapper-->
				<div class="d-flex flex-stack flex-grow-1">
					<!--begin::Content-->
					<div class="fw-semibold">
						<div class="fs-6 text-gray-700">Sector de administracion de grupo de privilegios para asignacion
							a los roles con el fin del control total del acceso al sistema.</div>
					</div>
					<!--end::Content-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--begin::Table-->
			<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_privilegios">
				<thead>
					<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
						<th class="min-w-175px">Tipo de privilegio</th>
						<th class="min-w-100px">Privilegios</th>
						<th class="min-w-100px">Fecha creacion</th>
						<th class="text-end min-w-70px">Acciones</th>
					</tr>
				</thead>
				<tbody class="text-gray-600 fw-semibold">
					<!-- Aquí van los datos de tu tabla -->
				</tbody>
			</table>
			<!--end::Table-->
		</div>
		<!--end::Card body-->
	</div>
	<!--end::Card-->
</div>
<!--end::Container-->