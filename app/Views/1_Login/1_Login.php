<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
	<base href="#">
	<title>Sistema de Geolocalizacion GEOTRANCK</title>
	<meta charset="utf-8" />
	<meta name="description"
		content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
	<meta name="keywords"
		content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title"
		content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
	<meta property="og:url" content="https://keenthemes.com/metronic" />
	<meta property="og:site_name" content="Keenthemes | Metronic" />
	<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
	<link rel="shortcut icon" href="recursos/img/mapa/logo.png" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="recursos/metronic/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="recursos/metronic/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body data-kt-name="metronic" id="kt_body" class="app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
	<!--begin::Theme mode setup on page load-->
	<script>if (document.documentElement) { const defaultThemeMode = "system"; const name = document.body.getAttribute("data-kt-name"); let themeMode = localStorage.getItem("kt_" + (name !== null ? name + "_" : "") + "theme_mode_value"); if (themeMode === null) { if (defaultThemeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } else { themeMode = defaultThemeMode; } } document.documentElement.setAttribute("data-theme", themeMode); }</script>
	<!--end::Theme mode setup on page load-->
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page bg image-->
		<style>
			body {
				background-image: url('recursos/metronic/assets/media/auth/bg4.jpg');
			}

			[data-theme="dark"] body {
				background-image: url('recursos/metronic/assets/media/auth/bg4-dark.jpg');
			}
		</style>
		<!--end::Page bg image-->
		<!--begin::Authentication - Sign-in -->
		<div class="d-flex flex-column flex-column-fluid flex-lg-row">
			<!--begin::Body-->
			<div class="d-flex flex-center w-lg-100 p-50">
				<!--begin::Card-->
				<div class="card rounded-3 w-md-550px">
					<!--begin::Card body-->
					<div class="card-body p-10 p-lg-20">
						<!--begin::Form-->
						<!--begin::Heading-->
						<div class="text-center mb-11">
							<!--begin::Title-->
							<h1 class="text-dark fw-bolder mb-3">BIENVENIDO AL SISTEMA GEOTRANCK</h1>
							<!--end::Title-->
							<!--begin::Subtitle-->
							<div class="text-gray-500 fw-semibold fs-6">Sistema dedicado a la gestion y seguridad del
								transporte escolar.....</div>
							<!--end::Subtitle=-->
						</div>
						<!--begin::Heading-->
						<!--begin::Institution Image-->
						<div class="text-center mb-11">
							<img src="recursos/Colegio/escudocolegio.png" width="180px" height="180px" alt="Imagen de la Institución" class="institution-image">
						</div>
						<!--end::Institution Image-->
						<!--begin::Separator-->
						<div class="separator separator-content my-0">
							<span class="w-125px text-gray-500 fw-semibold fs-7">Ingreso</span>
						</div>
						<!--end::Separator-->
						<!--begin::Input group=-->
						<div class="fv-row mb-8">
							<!--begin::Email-->
							<label for="">Correo Electronico</label>
							<input type="text" placeholder="Correo Electronico" id="email" name="email"
								autocomplete="off" class="form-control bg-transparent" />
							<!--end::Email-->
							<span id="emailError" style="color: red;"></span>
						</div>
						<!--end::Input group=-->
						<div class="fv-row mb-8">
							<!--begin::Password-->
							<label for="">Contraseña</label>
							<div class="input-group">
								<input type="password" placeholder="Contraseña" id="password" name="password"
									autocomplete="off" class="form-control bg-transparent" />
								<span class="input-group-text" id="eyeIcon">
									<i class="eye-icon fas fa-eye"></i>
								</span>
							</div>
							<!--end::Password-->
						</div>
						<!--end::Input group=-->

						<!--begin::Submit button-->
						<div class="d-grid mb-2">
							<button type="submit" id="loginBtn" class="btn btn-primary" data-kt-redirect-url="/ai">
								<!--begin::Indicator label-->
								<span class="indicator-label">Ingresar</span>
								<!--end::Indicator label-->
								<!--begin::Indicator progress-->
								<span class="indicator-progress">Cargando...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								<!--end::Indicator progress-->
							</button>
						</div>
						<!--end::Submit button-->

						<!--end::Form-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Card-->
			</div>
			<!--end::Body-->
		</div>
		<!--end::Authentication - Sign-in-->
	</div>
	<!--end::Root-->
	<!--end::Main-->
	<!--begin::Javascript-->
	<script>var hostUrl = "recursos/metronic/assets/";</script>
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="recursos/metronic/assets/plugins/global/plugins.bundle.js"></script>
	<script src="recursos/metronic/assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Custom Javascript(used by this page)-->
	<!--end::Custom Javascript-->


	<script>
		// Mostrar la contraseña por un segundo
		$('#eyeIcon').click(function () {
			const passwordInput = $('#password');
			const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
			passwordInput.attr('type', type);
			setTimeout(function () {
				passwordInput.attr('type', 'password');
			}, 1000);
		});

		$(document).ready(function () {
			$('#loginBtn').click(function () {
				const email = $('#email').val();
				const password = $('#password').val();

				// Validación de correo electrónico
				const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
				if (!emailRegex.test(email)) {
					$('#emailError').text('Por favor ingrese un correo electrónico válido.');
					return;
				}

				// Ocultar mensaje de error
				$('#emailError').text('');

				// Validar que se ingresen ambos datos
				if (!email.trim() || !password.trim()) {
					Swal.fire({
						icon: 'error',
						title: 'Error',
						text: 'Por favor ingrese correo electrónico y contraseña.'
					});
					return;
				}

				$.ajax({
					url: '/lca',
					type: 'POST',
					dataType: 'json',
					data: { email: email, password: password },
					success: function (response) {
						if (response.success) {
							Swal.fire({
								text: "Bienvenido al Sistema!",
								icon: "success",
								buttonsStyling: false,
								confirmButtonText: "Aceptar!",
								customClass: {
									confirmButton: "btn btn-primary"
								},
								didOpen: () => {
									setTimeout(() => {
										window.location.href = '<?= base_url('/ai') ?>';
									}, 700); // Retrasar la redirección en milisegundos
								}
							});
						} else {
							Swal.fire({
								text: "ERROR, Por favor revisar los datos ingresados ",
								icon: "error",
								buttonsStyling: !1,
								confirmButtonText: "Aceptar!",
								customClass: { confirmButton: "btn btn-primary" },
							});
							$('#email').val('');
							$('#password').val('');

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
						$('#email').val('');
						$('#password').val('');


					}
				});
			});
			$(document).keypress(function (e) {
				if (e.which === 13) { // Verificar si se presionó la tecla "Enter"
					$('#loginBtn').click(); // Simular un clic en el botón "Ingresar"
					return false; // Evitar que el formulario se envíe automáticamente
				}
			});
		});

	</script>
</body>
<!--end::Body-->

</html>