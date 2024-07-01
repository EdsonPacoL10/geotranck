<!--begin::Aside-->
<div id="kt_aside" class="aside aside-extended" data-kt-drawer="true" data-kt-drawer-name="aside"
	data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="auto"
	data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
	<!--begin::Primary-->
	<div class="aside-primary d-flex flex-column align-items-lg-center flex-row-auto">
		<!--begin::Logo-->
		<div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto py-10"
			id="kt_aside_logo">
			<a href="#">
				<img alt="Logo" src="recursos/img/mapa/logo.png" class="h-35px" />
			</a>
		</div>
		<!--end::Logo-->
		<!--begin::Nav-->
		<div class="aside-nav d-flex flex-column align-items-center flex-column-fluid w-100 pt-5 pt-lg-0"
			id="kt_aside_nav">
			<!--begin::Wrapper-->
			<div class="hover-scroll-overlay-y mb-5 px-5" data-kt-scroll="true"
				data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
				data-kt-scroll-wrappers="#kt_aside_nav" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
				data-kt-scroll-offset="0px">
				<!--begin::Nav-->
				<ul class="nav flex-column w-100" id="kt_aside_nav_tabs">
					<!--begin::Nav item-->
					<li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right"
						data-bs-dismiss="click" title="Menu">
						<!--begin::Nav link-->
						<a class="nav-link btn btn-icon btn-active-color-primary btn-color-gray-400 btn-active-light"
							data-bs-toggle="tab" href="#kt_aside_nav_tab_menu">
							<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
							<span class="svg-icon svg-icon-2x">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
									xmlns="http://www.w3.org/2000/svg">
									<rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor" />
									<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor" />
									<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor" />
									<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</a>
						<!--end::Nav link-->
					</li>
					<!--end::Nav item-->
					<!--begin::Nav item-->
					<li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right"
						data-bs-dismiss="click" title="Localizacion">
						<!--begin::Nav link-->
						<a class="nav-link btn btn-icon btn-active-color-primary btn-color-gray-400 btn-active-light" 
							data-bs-toggle="tab" href="#kt_aside_nav_tab_mapas">
							<!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
							<span class="svg-icon svg-icon-2x">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
									stroke="currentColor" stroke-width="2" stroke-linecap="round"
									stroke-linejoin="round">
									<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
									<circle cx="12" cy="9" r="2" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</a>
						<!--end::Nav link-->
					</li>
					<!--end::Nav item-->
					<!--begin::Nav item-->
					<li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right"
						data-bs-dismiss="click" title="Estudiantes">
						<!--begin::Nav link-->
						<a class="nav-link btn btn-icon btn-active-color-primary btn-color-gray-400 btn-active-light"
							data-bs-toggle="tab" href="#kt_aside_nav_tab_projects">
							<!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 14C7.22386 14 7 14.2239 7 14.5V18.5C7 18.7761 7.22386 19 7.5 19H16.5C16.7761 19 17 18.7761 17 18.5V14.5C17 14.2239 16.7761 14 16.5 14H15.5V13H18C18.5523 13 19 12.5523 19 12V8C19 7.44772 18.5523 7 18 7H6C5.44772 7 5 7.44772 5 8V12C5 12.5523 5.44772 13 6 13H8.5V14H7.5ZM11 2C9.34315 2 8 3.34315 8 5V10H14V5C14 3.34315 12.6569 2 11 2ZM11 12C9.89543 12 9 12.8954 9 14V18H13V14C13 12.8954 12.1046 12 11 12Z" fill="currentColor"/>
							</svg>
							<!--end::Svg Icon-->
						</a>
						<!--end::Nav link-->
					</li>
					<!--end::Nav item-->
						<!--begin::Nav item-->
						<li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right"
						data-bs-dismiss="click" title="Mensaje de Alerta">
						<!--begin::Nav link-->
						<a class="nav-link1 btn btn-icon btn-active-color-primary btn-color-gray-400 btn-active-light position-relative"
							href="/ecmeav">
							<!--begin::Svg Icon | path: icons/duotune/general/gen017.svg-->
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
								xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd"
									d="M12 2C13.1046 2 14 2.89543 14 4V11C14 12.1046 13.1046 13 12 13C10.8954 13 10 12.1046 10 11V4C10 2.89543 10.8954 2 12 2ZM12 14C12.5523 14 13 14.4477 13 15V16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16V15C11 14.4477 11.4477 14 12 14ZM12 18C12.5523 18 13 18.4477 13 19V20C13 20.5523 12.5523 21 12 21C11.4477 21 11 20.5523 11 20V19C11 18.4477 11.4477 18 12 18Z"
									fill="currentColor" />
							</svg>
							<!--end::Svg Icon-->
							<!--begin::Counter-->
							
							<span class="badge badge-danger position-absolute top-0 start-100 translate-middle"><?= $NroMensajes ?></span>
							<!--end::Counter-->
						</a>
						<!--end::Nav link-->
					</li>
					<!--end::Nav item-->
					<style>
						.nav-link1:hover {
							color: red !important;
						}
					</style>
					<!--begin::Nav item-->
					<!--begin::Nav item-->
						<li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right"
						data-bs-dismiss="click" title="Automóviles">
						<!--begin::Nav link-->
						<a class="nav-link btn btn-icon btn-active-color-primary btn-color-gray-400 btn-active-light"
							href="/eacea">
							<i class="fas fa-car"></i> <!-- Ícono de automóvil -->
						</a>
						<!--end::Nav link-->
					</li>
					<!--end::Nav item-->
					
					<!--begin::Nav item-->
					<li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="right"
						data-bs-dismiss="click" title="Dispositivos">
						<!--begin::Nav link-->
						<a class="nav-link btn btn-icon btn-active-color-primary btn-color-gray-400 btn-active-light active"
							data-bs-toggle="tab" href="#kt_aside_nav_tab_authors">
							<!--begin::Svg Icon | path: icons/duotune/files/fil005.svg-->
							<span class="svg-icon svg-icon-2x" >
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
									<circle cx="12" cy="12" r="10" />
									<path d="M12 6v6l4 2" />
									<path d="M12 18v2m-4-2v-2m8 2v-2m-2 4h2m-16-2H4" />
									
								</svg>
							</span>
							<!--end::Svg Icon-->
						</a>
						<!--end::Nav link-->
					</li>
					<!--end::Nav item-->
				</ul>
				<!--end::Tabs-->
			</div>
			<!--end::Nav-->
		</div>
		<!--end::Nav-->
		
	</div>
	<!--end::Primary-->
	<!--begin::Secondary-->
	<div class="aside-secondary d-flex flex-row-fluid">
		<!--begin::Workspace-->
		<div class="aside-workspace my-5 p-5" id="kt_aside_wordspace">
			<div class="d-flex h-100 flex-column">
				<!--begin::Wrapper-->
				<div class="flex-column-fluid hover-scroll-y" data-kt-scroll="true" data-kt-scroll-activate="true"
					data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_aside_wordspace"
					data-kt-scroll-dependencies="#kt_aside_secondary_footer" data-kt-scroll-offset="0px">
					<!--begin::Tab content-->
					<div class="tab-content">
						<!--begin::Tab pane-->
						<div class="tab-pane fade" id="kt_aside_nav_tab_projects" role="tabpanel">
							<!--begin::Wrapper-->
							<div class="m-0">
								<!--begin::Projects-->
								<div class="m-0">
									<!--begin::Heading-->
									<h1 class="text-gray-800 fw-semibold mb-6 mx-5">Estudiantes</h1>
									<!--end::Heading-->
									<!--begin::Items-->
									<div class="mb-10">
										<!--begin::Item-->
										<a href="#"
											class="custom-list d-flex align-items-center px-5 py-4">
											<!--begin::Symbol-->
											<div class="symbol symbol-40px me-5">
												<span class="symbol-label">
													<img src="recursos/metronic/assets/media/svg/brand-logos/bebo.svg"
														class="h-50 align-self-center" alt="" />
												</span>
											</div>
											<!--end::Symbol-->
											<!--begin::Description-->
											<div class="d-flex flex-column flex-grow-1">
												<!--begin::Title-->
												<h5 class="custom-list-title fw-semibold text-gray-800 mb-1">Briviba
													SaaS</h5>
												<!--end::Title-->
												<!--begin::Link-->
												<span class="text-gray-400 fw-bold">By James</span>
												<!--end::Link-->
											</div>
											<!--begin::Description-->
										</a>
										<!--end::Item-->

									</div>
									<!--end::Items-->
								</div>
								<!--end::Projects-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Tab pane-->
						<!--begin::Tab pane-->
						<div class="tab-pane fade" id="kt_aside_nav_tab_mapas" role="tabpanel">
							<!--begin::Wrapper-->
							<div class="m-0">
								<!--begin::Projects-->
								<div class="m-0">
									<!--begin::Heading-->
									<h1 class="text-gray-800 fw-semibold mb-6 mx-5">Mapas</h1>
									<!--end::Heading-->
									<!--begin::Items-->
									<div class="mb-10">
										<!--begin::Item-->
										<a href="/mcua"
											class="custom-list d-flex align-items-center px-5 py-4">
											<!--begin::Symbol-->
											<div class="symbol symbol-70px me-5">
												<span class="symbol-label">
													<img src="recursos/img/mapa/LocAct.png"
														class="h-100 align-self-center" alt="" />
												</span>
											</div>
											<!--end::Symbol-->
											<!--begin::Description-->
											<div class="d-flex flex-column flex-grow-1">
												<!--begin::Title-->
												<h5 class="custom-list-title fw-semibold text-gray-800 mb-1">UBICACION ACTUAL
												</h5>
												<!--end::Title-->
												<!--begin::Link-->
												<span class="text-gray-500 fw-bold">Se desplegara la imagen de un Mapa para poder ubicar su ubicacion actual.</span>
												<!--end::Link-->
											</div>
											<!--begin::Description-->
										</a>
										<!--end::Item-->

									</div>
									<!--end::Items-->
									<!--begin::Items-->
									<div class="mb-10">
										<!--begin::Item-->
										<a href="#"
											class="custom-list d-flex align-items-center px-5 py-4">
											<!--begin::Symbol-->
											<div class="symbol symbol-70px me-5">
												<span class="symbol-label">
													<img src="recursos/img/mapa/LocReal.png"
														class="h-100 align-self-center" alt="" />
												</span>
											</div>
											<!--end::Symbol-->
											<!--begin::Description-->
											<div class="d-flex flex-column flex-grow-1">
												<!--begin::Title-->
												<h5 class="custom-list-title fw-semibold text-gray-800 mb-1">SEGUIMINETO EN TIEMPO REAL</h5>
												<!--end::Title-->
												<!--begin::Link-->
												<span class="text-gray-500 fw-bold">Se podra realizar un seguimiento en tiempo real de la movilidad donde se encuentra el estudiante</span>
												<!--end::Link-->
											</div>
											<!--begin::Description-->
										</a>
										<!--end::Item-->

									</div>
									<!--end::Items-->
									
								</div>
								<!--end::Projects-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Tab pane-->
						<!--begin::Tab pane-->
						<div class="tab-pane fade" id="kt_aside_nav_tab_menu" role="tabpanel">
							<!--begin::Menu-->
							<div class="menu menu-column menu-fit menu-rounded menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-semibold fs-5 px-6 my-5 my-lg-0"
								id="kt_aside_menu" data-kt-menu="true">
								<div id="kt_aside_menu_wrapper" class="menu-fit">
									<!--begin:Menu item-->
									<div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
										<!--begin:Menu link-->
										<span class="menu-link">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
														xmlns="http://www.w3.org/2000/svg">
														<rect x="2" y="2" width="9" height="9" rx="2"
															fill="currentColor" />
														<rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2"
															fill="currentColor" />
														<rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2"
															fill="currentColor" />
														<rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2"
															fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Dashboards</span>
											<span class="menu-arrow"></span>
										</span>
										<!--end:Menu link-->
										<!--begin:Menu sub-->
										<div class="menu-sub menu-sub-accordion">
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link active" href="/ai">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Seguimiento</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link " href="/acdd">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Dashboard</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
										</div>
										<!--end:Menu sub-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item pt-5">
										<!--begin:Menu content-->
										<div class="menu-content">
											<span class="menu-heading fw-bold text-uppercase fs-7">Gestion de Usuario</span>
										</div>
										<!--end:Menu content-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
										<!--begin:Menu link-->
										<span class="menu-link">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
														xmlns="http://www.w3.org/2000/svg">
														<path
															d="M6.5 11C8.98528 11 11 8.98528 11 6.5C11 4.01472 8.98528 2 6.5 2C4.01472 2 2 4.01472 2 6.5C2 8.98528 4.01472 11 6.5 11Z"
															fill="currentColor" />
														<path opacity="0.3"
															d="M13 6.5C13 4 15 2 17.5 2C20 2 22 4 22 6.5C22 9 20 11 17.5 11C15 11 13 9 13 6.5ZM6.5 22C9 22 11 20 11 17.5C11 15 9 13 6.5 13C4 13 2 15 2 17.5C2 20 4 22 6.5 22ZM17.5 22C20 22 22 20 22 17.5C22 15 20 13 17.5 13C15 13 13 15 13 17.5C13 20 15 22 17.5 22Z"
															fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Rol y privilegio</span>
											<span class="menu-arrow"></span>
										</span>
										<!--end:Menu link-->
										<!--begin:Menu sub-->
										<div class="menu-sub menu-sub-accordion">
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link"
													href="/gupv">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Privilegios</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link"
													href="/gurv">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Roles</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
										
										</div>
										<!--end:Menu sub-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
										<!--begin:Menu link-->
										<span class="menu-link">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
														xmlns="http://www.w3.org/2000/svg">
														<path
															d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z"
															fill="currentColor" />
														<path opacity="0.3"
															d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z"
															fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Usuarios</span>
											<span class="menu-arrow"></span>
										</span>
										<!--end:Menu link-->
										<!--begin:Menu sub-->
										<div class="menu-sub menu-sub-accordion">
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link"
													href="/gucev">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Estudiantes</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link"
													href="/gucpv">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Padres</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link"
													href="gucav">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Administracion</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
										</div>
										<!--end:Menu sub-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item pt-5">
										<!--begin:Menu content-->
										<div class="menu-content">
											<span class="menu-heading fw-bold text-uppercase fs-7">Gestion del transporte</span>
										</div>
										<!--end:Menu content-->
									</div>
									<!--end:Menu item-->
									<div class="menu-item pt-5">
										<!--begin:Menu content-->
										<div class="menu-content">
											<span class="menu-heading fw-bold text-uppercase fs-7">Guia
												Telefonica</span>
										</div>
										<!--end:Menu content-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link" 
										href="/gtctv">
										<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
														xmlns="http://www.w3.org/2000/svg">
														<rect x="7" y="2" width="10" height="20" rx="2" fill="none"
															stroke="currentColor" stroke-width="2" />
														<circle cx="12" cy="18" r="1" fill="currentColor" />
														<path d="M13 6H11V8H13V6ZM13 10H11V16H13V10Z"
															fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Guia Telefonica </span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item pt-5">
										<!--begin:Menu content-->
										<div class="menu-content">
											<span class="menu-heading fw-bold text-uppercase fs-7">Gestion de Dispositivos</span>
										</div>
										<!--end:Menu content-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
										<!--begin:Menu link-->
										<span class="menu-link">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/files/fil003.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
														xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3"
															d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22Z"
															fill="currentColor" />
														<path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z"
															fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Dispositivos</span>
											<span class="menu-arrow"></span>
										</span>
										<!--end:Menu link-->
										<!--begin:Menu sub-->
										<div class="menu-sub menu-sub-accordion">
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link" href="../../demo7/dist/pages/about.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">GPS</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link" href="../../demo7/dist/pages/team.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">RFID</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											
										</div>
										<!--end:Menu sub-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item pt-5">
										<!--begin:Menu content-->
										<div class="menu-content">
											<span class="menu-heading fw-bold text-uppercase fs-7">Pagos</span>
										</div>
										<!--end:Menu content-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
										<!--begin:Menu link-->
										<span class="menu-link">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/maps/map002.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
														xmlns="http://www.w3.org/2000/svg">
														<path
															d="M8.7 4.19995L4 6.30005V18.8999L8.7 16.8V19L3.1 21.5C2.6 21.7 2 21.4 2 20.8V6C2 5.4 2.3 4.89995 2.9 4.69995L8.7 2.09998V4.19995Z"
															fill="currentColor" />
														<path
															d="M15.3 19.8L20 17.6999V5.09992L15.3 7.19989V4.99994L20.9 2.49994C21.4 2.29994 22 2.59989 22 3.19989V17.9999C22 18.5999 21.7 19.1 21.1 19.3L15.3 21.8998V19.8Z"
															fill="currentColor" />
														<path opacity="0.3"
															d="M15.3 7.19995L20 5.09998V17.7L15.3 19.8V7.19995Z"
															fill="currentColor" />
														<path opacity="0.3"
															d="M8.70001 4.19995V2L15.4 5V7.19995L8.70001 4.19995ZM8.70001 16.8V19L15.4 22V19.8L8.70001 16.8Z"
															fill="currentColor" />
														<path opacity="0.3"
															d="M8.7 16.8L4 18.8999V6.30005L8.7 4.19995V16.8Z"
															fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Pagos y Facturas</span>
											<span class="menu-arrow"></span>
										</span>
										<!--end:Menu link-->
										<!--begin:Menu sub-->
										<div class="menu-sub menu-sub-accordion">
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link"
													href="../../demo7/dist/apps/subscriptions/getting-started.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Cobros</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link"
													href="../../demo7/dist/apps/subscriptions/list.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Pagos</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link"
													href="../../demo7/dist/apps/subscriptions/add.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Deudas</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link"
													href="../../demo7/dist/apps/subscriptions/view.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Facturas</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
										</div>
										<!--end:Menu sub-->
									</div>
									<!--end:Menu item-->
										<!--begin:Menu item-->
										<div class="menu-item pt-5">
										<!--begin:Menu content-->
										<div class="menu-content">
											<span class="menu-heading fw-bold text-uppercase fs-7">Gestion de Documentaciones</span>
										</div>
										<!--end:Menu content-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
										<!--begin:Menu link-->
										<span class="menu-link">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
														xmlns="http://www.w3.org/2000/svg">
														<path
															d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
															fill="currentColor" />
														<path opacity="0.3"
															d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
															fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Documentaciones</span>
											<span class="menu-arrow"></span>
										</span>
										<!--end:Menu link-->
										<!--begin:Menu sub-->
										<div class="menu-sub menu-sub-accordion">
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link"
													href="../../demo7/dist/apps/file-manager/folders.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Estudiantes</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link"
													href="../../demo7/dist/apps/file-manager/files.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Transporte</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
										</div>
										<!--end:Menu sub-->
									</div>
									<!--end:Menu item-->
										<!--begin:Menu item-->
										<div class="menu-item pt-5">
										<!--begin:Menu content-->
										<div class="menu-content">
											<span class="menu-heading fw-bold text-uppercase fs-7">Chat Interno</span>
										</div>
										<!--end:Menu content-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
										<!--begin:Menu link-->
										<span class="menu-link">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
														xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3"
															d="M20 3H4C2.89543 3 2 3.89543 2 5V16C2 17.1046 2.89543 18 4 18H4.5C5.05228 18 5.5 18.4477 5.5 19V21.5052C5.5 22.1441 6.21212 22.5253 6.74376 22.1708L11.4885 19.0077C12.4741 18.3506 13.6321 18 14.8167 18H20C21.1046 18 22 17.1046 22 16V5C22 3.89543 21.1046 3 20 3Z"
															fill="currentColor" />
														<rect x="6" y="12" width="7" height="2" rx="1"
															fill="currentColor" />
														<rect x="6" y="7" width="12" height="2" rx="1"
															fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Chat</span>
											<span class="menu-arrow"></span>
										</span>
										<!--end:Menu link-->
										<!--begin:Menu sub-->
										<div class="menu-sub menu-sub-accordion">
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link" href="../../demo7/dist/apps/chat/private.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Private Chat</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link" href="../../demo7/dist/apps/chat/group.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Group Chat</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
											<!--begin:Menu item-->
											<div class="menu-item">
												<!--begin:Menu link-->
												<a class="menu-link" href="../../demo7/dist/apps/chat/drawer.html">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Drawer Chat</span>
												</a>
												<!--end:Menu link-->
											</div>
											<!--end:Menu item-->
										</div>
										<!--end:Menu sub-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item pt-5">
										<!--begin:Menu content-->
										<div class="menu-content">
											<span class="menu-heading fw-bold text-uppercase fs-7">Ayuda</span>
										</div>
										<!--end:Menu content-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link" href="../../demo7/dist/documentation/base/utilities.html">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/general/gen002.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
														xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3"
															d="M4.05424 15.1982C8.34524 7.76818 13.5782 3.26318 20.9282 2.01418C21.0729 1.98837 21.2216 1.99789 21.3618 2.04193C21.502 2.08597 21.6294 2.16323 21.7333 2.26712C21.8372 2.37101 21.9144 2.49846 21.9585 2.63863C22.0025 2.7788 22.012 2.92754 21.9862 3.07218C20.7372 10.4222 16.2322 15.6552 8.80224 19.9462L4.05424 15.1982ZM3.81924 17.3372L2.63324 20.4482C2.58427 20.5765 2.5735 20.7163 2.6022 20.8507C2.63091 20.9851 2.69788 21.1082 2.79503 21.2054C2.89218 21.3025 3.01536 21.3695 3.14972 21.3982C3.28408 21.4269 3.42387 21.4161 3.55224 21.3672L6.66524 20.1802L3.81924 17.3372ZM16.5002 5.99818C16.2036 5.99818 15.9136 6.08615 15.6669 6.25097C15.4202 6.41579 15.228 6.65006 15.1144 6.92415C15.0009 7.19824 14.9712 7.49984 15.0291 7.79081C15.0869 8.08178 15.2298 8.34906 15.4396 8.55884C15.6494 8.76862 15.9166 8.91148 16.2076 8.96935C16.4986 9.02723 16.8002 8.99753 17.0743 8.884C17.3484 8.77046 17.5826 8.5782 17.7474 8.33153C17.9123 8.08486 18.0002 7.79485 18.0002 7.49818C18.0002 7.10035 17.8422 6.71882 17.5609 6.43752C17.2796 6.15621 16.8981 5.99818 16.5002 5.99818Z"
															fill="currentColor" />
														<path
															d="M4.05423 15.1982L2.24723 13.3912C2.15505 13.299 2.08547 13.1867 2.04395 13.0632C2.00243 12.9396 1.9901 12.8081 2.00793 12.679C2.02575 12.5498 2.07325 12.4266 2.14669 12.3189C2.22013 12.2112 2.31752 12.1219 2.43123 12.0582L9.15323 8.28918C7.17353 10.3717 5.4607 12.6926 4.05423 15.1982ZM8.80023 19.9442L10.6072 21.7512C10.6994 21.8434 10.8117 21.9129 10.9352 21.9545C11.0588 21.996 11.1903 22.0083 11.3195 21.9905C11.4486 21.9727 11.5718 21.9252 11.6795 21.8517C11.7872 21.7783 11.8765 21.6809 11.9402 21.5672L15.7092 14.8442C13.6269 16.8245 11.3061 18.5377 8.80023 19.9442ZM7.04023 18.1832L12.5832 12.6402C12.7381 12.4759 12.8228 12.2577 12.8195 12.032C12.8161 11.8063 12.725 11.5907 12.5653 11.4311C12.4057 11.2714 12.1901 11.1803 11.9644 11.1769C11.7387 11.1736 11.5205 11.2583 11.3562 11.4132L5.81323 16.9562L7.04023 18.1832Z"
															fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Mision Y Vision </span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link"
											href="https://preview.keenthemes.com/metronic8/demo7/layout-builder.html">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/abstract/abs014.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
														xmlns="http://www.w3.org/2000/svg">
														<path opacity="0.3"
															d="M11.8 5.2L17.7 8.6V15.4L11.8 18.8L5.90001 15.4V8.6L11.8 5.2ZM11.8 2C11.5 2 11.2 2.1 11 2.2L3.8 6.4C3.3 6.7 3 7.3 3 7.9V16.2C3 16.8 3.3 17.4 3.8 17.7L11 21.9C11.3 22 11.5 22.1 11.8 22.1C12.1 22.1 12.4 22 12.6 21.9L19.8 17.7C20.3 17.4 20.6 16.8 20.6 16.2V7.9C20.6 7.3 20.3 6.7 19.8 6.4L12.6 2.2C12.4 2.1 12.1 2 11.8 2Z"
															fill="currentColor" />
														<path
															d="M11.8 8.69995L8.90001 10.3V13.7L11.8 15.3L14.7 13.7V10.3L11.8 8.69995Z"
															fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Comunicados y Avisos</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
									<!--begin:Menu item-->
									<div class="menu-item">
										<!--begin:Menu link-->
										<a class="menu-link"
											href="../../demo7/dist/documentation/getting-started/changelog.html">
											<span class="menu-icon">
												<!--begin::Svg Icon | path: icons/duotune/coding/cod003.svg-->
												<span class="svg-icon svg-icon-2">
													<svg width="24" height="24" viewBox="0 0 24 24" fill="none"
														xmlns="http://www.w3.org/2000/svg">
														<path
															d="M16.95 18.9688C16.75 18.9688 16.55 18.8688 16.35 18.7688C15.85 18.4688 15.75 17.8688 16.05 17.3688L19.65 11.9688L16.05 6.56876C15.75 6.06876 15.85 5.46873 16.35 5.16873C16.85 4.86873 17.45 4.96878 17.75 5.46878L21.75 11.4688C21.95 11.7688 21.95 12.2688 21.75 12.5688L17.75 18.5688C17.55 18.7688 17.25 18.9688 16.95 18.9688ZM7.55001 18.7688C8.05001 18.4688 8.15 17.8688 7.85 17.3688L4.25001 11.9688L7.85 6.56876C8.15 6.06876 8.05001 5.46873 7.55001 5.16873C7.05001 4.86873 6.45 4.96878 6.15 5.46878L2.15 11.4688C1.95 11.7688 1.95 12.2688 2.15 12.5688L6.15 18.5688C6.35 18.8688 6.65 18.9688 6.95 18.9688C7.15 18.9688 7.35001 18.8688 7.55001 18.7688Z"
															fill="currentColor" />
														<path opacity="0.3"
															d="M10.45 18.9687C10.35 18.9687 10.25 18.9687 10.25 18.9687C9.75 18.8687 9.35 18.2688 9.55 17.7688L12.55 5.76878C12.65 5.26878 13.25 4.8687 13.75 5.0687C14.25 5.1687 14.65 5.76878 14.45 6.26878L11.45 18.2688C11.35 18.6688 10.85 18.9687 10.45 18.9687Z"
															fill="currentColor" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</span>
											<span class="menu-title">Contactor e Informacion</span>
										</a>
										<!--end:Menu link-->
									</div>
									<!--end:Menu item-->
								</div>
							</div>
							<!--end::Menu-->
						</div>
						<!--end::Tab pane-->
						
						
						
						<!--begin::Tab pane-->
						<div class="tab-pane fade active show" id="kt_aside_nav_tab_authors" role="tabpanel">
							<!--begin::Authors-->
							<div class="mx-5">
								<!--begin::Header-->
								<h3 class="fw-bold text-dark mx-0 mb-10">Dispositivos Electronicos</h3>
								<!--end::Header-->
								<div class="alert alert-primary d-flex align-items-center" role="alert">
								<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:"><use xlink:href="#info-fill"/></svg>
								<div>
								Sector donde se encuentra un resumen del estados de los dispositivos de seguridad en los automoviles
								</div>
								</div>
								<!--begin::Body-->
								<div class="mb-12">
									<!--begin::Item-->
									<div class="row mb-7">
										<div class="col-auto">
											<div class="symbol symbol-50px">
												<img src="recursos/img/dispositivos/Rastreo.jpg" class="" alt="" />
											</div>
										</div>
										<div class="col">
											<div class="flex-grow-1">
												<span class="text-muted d-block fw-bold ">RASTREO</span>
											</div>
										</div>
										<div class="col-auto" id="estadoGeolocalizacion1">
											
										</div>
										<script>
											if (navigator.geolocation) {
												navigator.geolocation.getCurrentPosition(
													function (position) {
														document.getElementById('estadoGeolocalizacion1').innerHTML = '<span class="badge py-3 px-4 fs-7 badge-light-primary">Online</span>';
													},
													function (error) {
														if (error.code === error.PERMISSION_DENIED) {
															document.getElementById('estadoGeolocalizacion1').innerHTML = '<span class="badge py-3 px-4 fs-7 badge-light-danger">Off</span>';
														}
													}
												);
											} else {
												document.getElementById('estadoGeolocalizacion1').innerText = 'Geolocalización no soportada por el navegador.';
											}
										</script>
									</div>
									<!--end::Item-->
									<!--begin::Item-->
									<div class="row mb-7">
										<div class="col-auto">
											<div class="symbol symbol-50px">
												<img src="recursos/img/dispositivos/gps.png" class="" alt="" />
											</div>
										</div>
										<div class="col">
											<div class="flex-grow-1">
												<span class="text-muted d-block fw-bold">GPS</span>
											</div>
										</div>
										<div class="col-auto" id="estadoGeolocalizacion">
											
										</div>
										<script>
											if (navigator.geolocation) {
												navigator.geolocation.getCurrentPosition(
													function (position) {
														document.getElementById('estadoGeolocalizacion').innerHTML = '<span class="badge py-3 px-4 fs-7 badge-light-primary">Online</span>';
													},
													function (error) {
														if (error.code === error.PERMISSION_DENIED) {
															document.getElementById('estadoGeolocalizacion').innerHTML = '<span class="badge py-3 px-4 fs-7 badge-light-danger">Off</span>';
														}
													}
												);
											} else {
												document.getElementById('estadoGeolocalizacion').innerText = 'Geolocalización no soportada por el navegador.';
											}
										</script>
									</div>
									<!--end::Item-->
									<!--begin::Item-->
									<div class="row mb-7">
										<div class="col-auto">
											<div class="symbol symbol-50px">
												<img src="recursos/img/dispositivos/rfid.png" class="" alt="" />
											</div>
										</div>
										<div class="col">
											<div class="flex-grow-1">
												<span class="text-muted d-block fw-bold">RFID</span>
											</div>
										</div>
										<div class="col-auto">
											<span class="badge py-3 px-4 fs-7 badge-light-primary">Online</span>
										</div>
									</div>
									<!--end::Item-->
									<!--begin::Item-->
									<div class="row mb-7">
										<div class="col-auto">
											<div class="symbol symbol-50px">
												<img src="recursos/img/dispositivos/internet.png" class="" alt="" />
											</div>
										</div>
										<div class="col">
											<div class="flex-grow-1">
												<span class="text-muted d-block fw-bold">INTERNET</span>
											</div>
										</div>
										<div class="col-auto">
											<span class="badge py-3 px-4 fs-7 badge-light-primary">Online</span>
										</div>
									</div>
									<!--end::Item-->
								</div>
								<!--end::Body-->
							</div>
							<!--end::Authors-->
						</div>
						<!--end::Tab pane-->
					</div>
					<!--end::Tab content-->
				</div>
				<!--end::Wrapper-->
				
			</div>
		</div>
		<!--end::Workspace-->
	</div>
	<!--end::Secondary-->
	<!--begin::Aside Toggle-->
	<button id="kt_aside_toggle"
		class="btn btn-sm btn-icon bg-body btn-color-gray-700 btn-active-primary position-absolute translate-middle start-100 end-0 bottom-0 shadow-sm d-none d-lg-flex mb-5"
		data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
		data-kt-toggle-name="aside-minimize">
		<!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
		<span class="svg-icon svg-icon-2 rotate-180">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="currentColor" />
				<path
					d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z"
					fill="currentColor" />
			</svg>
		</span>
		<!--end::Svg Icon-->
	</button>
	<!--end::Aside Toggle-->
</div>
<!--end::Aside-->
<!--begin::Wrapper-->
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">