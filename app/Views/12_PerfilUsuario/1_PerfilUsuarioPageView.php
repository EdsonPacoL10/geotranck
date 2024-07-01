<!--begin::Container-->
<div class="container-xxl" id="kt_content_container">
    <!--begin::Navbar-->
    <div class="card mb-5 mb-xl-10">
        <div class="card-body pt-9 pb-0">
            <!--begin::Details-->
            <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
                <!--begin: Pic-->
                <div class="me-7 mb-4">
                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                        <img src="uploads/Usuarios/<?php echo $foto_perfil; ?>" alt="image" />
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
                                <a href="#"
                                    class="text-gray-900 text-hover-primary fs-2 fw-bold me-1"><?php echo $nombre; ?>
                                    <?php echo $apellido; ?></a>
                                <a href="#">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen026.svg-->
                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M10.0813 3.7242C10.8849 2.16438 13.1151 2.16438 13.9187 3.7242V3.7242C14.4016 4.66147 15.4909 5.1127 16.4951 4.79139V4.79139C18.1663 4.25668 19.7433 5.83365 19.2086 7.50485V7.50485C18.8873 8.50905 19.3385 9.59842 20.2758 10.0813V10.0813C21.8356 10.8849 21.8356 13.1151 20.2758 13.9187V13.9187C19.3385 14.4016 18.8873 15.491 19.2086 16.4951V16.4951C19.7433 18.1663 18.1663 19.7433 16.4951 19.2086V19.2086C15.491 18.8873 14.4016 19.3385 13.9187 20.2758V20.2758C13.1151 21.8356 10.8849 21.8356 10.0813 20.2758V20.2758C9.59842 19.3385 8.50905 18.8873 7.50485 19.2086V19.2086C5.83365 19.7433 4.25668 18.1663 4.79139 16.4951V16.4951C5.1127 15.491 4.66147 14.4016 3.7242 13.9187V13.9187C2.16438 13.1151 2.16438 10.8849 3.7242 10.0813V10.0813C4.66147 9.59842 5.1127 8.50905 4.79139 7.50485V7.50485C4.25668 5.83365 5.83365 4.25668 7.50485 4.79139V4.79139C8.50905 5.1127 9.59842 4.66147 10.0813 3.7242V3.7242Z"
                                                fill="currentColor" />
                                            <path
                                                d="M14.8563 9.1903C15.0606 8.94984 15.3771 8.9385 15.6175 9.14289C15.858 9.34728 15.8229 9.66433 15.6185 9.9048L11.863 14.6558C11.6554 14.9001 11.2876 14.9258 11.048 14.7128L8.47656 12.4271C8.24068 12.2174 8.21944 11.8563 8.42911 11.6204C8.63877 11.3845 8.99996 11.3633 9.23583 11.5729L11.3706 13.4705L14.8563 9.1903Z"
                                                fill="white" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>

                            </div>
                            <!--end::Name-->
                            <!--begin::Info-->
                            <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                <a href="#"
                                    class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3"
                                                d="M16.5 9C16.5 13.125 13.125 16.5 9 16.5C4.875 16.5 1.5 13.125 1.5 9C1.5 4.875 4.875 1.5 9 1.5C13.125 1.5 16.5 4.875 16.5 9Z"
                                                fill="currentColor" />
                                            <path
                                                d="M9 16.5C10.95 16.5 12.75 15.75 14.025 14.55C13.425 12.675 11.4 11.25 9 11.25C6.6 11.25 4.57499 12.675 3.97499 14.55C5.24999 15.75 7.05 16.5 9 16.5Z"
                                                fill="currentColor" />
                                            <rect x="7" y="6" width="4" height="4" rx="2" fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon--><?php echo $rolnombre; ?></a>
                                <a href="#"
                                    class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3"
                                                d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z"
                                                fill="currentColor" />
                                            <path
                                                d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon--><?php echo $direccion; ?></a>
                                <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com011.svg-->
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3"
                                                d="M21 19H3C2.4 19 2 18.6 2 18V6C2 5.4 2.4 5 3 5H21C21.6 5 22 5.4 22 6V18C22 18.6 21.6 19 21 19Z"
                                                fill="currentColor" />
                                            <path
                                                d="M21 5H2.99999C2.69999 5 2.49999 5.10005 2.29999 5.30005L11.2 13.3C11.7 13.7 12.4 13.7 12.8 13.3L21.7 5.30005C21.5 5.10005 21.3 5 21 5Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon--><?php echo $Correo_perfil; ?></a>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::User-->

                    </div>
                    <!--end::Title-->
                    <!--begin::Stats-->
                    <div class="d-flex flex-wrap flex-stack">

                        <!--begin::Progress-->
                        <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                            <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                                <span class="fw-semibold fs-6 text-gray-400">Perfil Completo</span>
                                <span class="fw-bold fs-6">100%</span>
                            </div>
                            <div class="h-5px mx-3 w-100 bg-light mb-3">
                                <div class="bg-success rounded h-5px" role="progressbar" style="width: 100%;"
                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <!--end::Progress-->
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Info-->
            </div>
            <!--end::Details-->
            <!--begin::Navs-->
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
                <!--begin::Nav item-->
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="#"
                        onclick="mostrarContenido('Informacion')">Informacion</a>
                </li>
                <!--end::Nav item-->
                <li class="nav-item mt-2">
                    <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="#"
                        onclick="mostrarContenido('Tablausuario')">Tabla de usuario</a>
                </li>

            </ul>
            <!--begin::Navs-->

        </div>
    </div>
    <!--end::Navbar-->




    <div id="Informacion" class="sector">
        <!--begin::details View-->
        <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
            <!--begin::Card header-->
            <div class="card-header cursor-pointer">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bold m-0">Detalles de Perfil</h3>
                </div>
                <!--end::Card title-->
                <!--begin::Action-->
                <div class="d-flex justify-content-end">
                <?php if ($agregar || $administrador): ?>              
                    <button type="button" class="btn btn-primary align-self-center me-2" data-bs-toggle="modal"
                        data-bs-target="#kt_modal_add_customer">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                    transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Crear Perfil
                    </button>
                    <?php endif; ?>
                </div>
                <!--end::Action-->
            </div>
            <!--begin::Modal - Administrador - adicionar-->
            <div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-750px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Form-->
                        <!--begin::Modal header-->
                        <div class="modal-header" id="kt_modal_add_customer_header">
                            <!--begin::Modal title-->
                            <h2 class="fw-bold">Nuevo Perfil</h2>
                            <!--end::Modal title-->
                            <!--begin::Close-->
                            <div id="kt_modal_perfil_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                        <div class="modal-body py-10 px-lg-17">
                            <!--begin::Scroll-->
                            <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                                data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                                data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">


                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-4">IMAGENES</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-15">
                                        <div class="row g-6">
                                            <!-- Columna 1 -->
                                            <div class="col-lg-6">
                                                <!--begin::Image input-->
                                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                                    style="background-image: url('recursos/metronic/assets/media/svg/avatars/blank.svg')">
                                                    <!--begin::Preview existing avatar-->
                                                    <div class="image-input-wrapper w-150px h-150px"
                                                        id="image-wrapper-1"
                                                        style="background-image: url(recursos/metronic/assets/media/svg/avatars/blank.svg)">
                                                    </div>
                                                    <!--end::Preview existing avatar-->
                                                    <!--begin::Label-->
                                                    <label
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                        title="Cambiar avatar">
                                                        <i class="bi bi-pencil-fill fs-7"></i>
                                                        <!--begin::Inputs-->
                                                        <input type="file" id="avatarUsuario"
                                                            accept=".png, .jpg, .jpeg" />
                                                        <input type="hidden" name="avatar_remove" />
                                                        <!--end::Inputs-->
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Cancel-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                        title="Cancelar avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Cancel-->
                                                    <!--begin::Remove-->
                                                    <span
                                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                        title="Eliminar avatar">
                                                        <i class="bi bi-x fs-2"></i>
                                                    </span>
                                                    <!--end::Remove-->
                                                </div>
                                                <!--end::Image input-->
                                                <!--begin::Hint-->
                                                <div class="form-text">Solo puede subir archivos de formato: png,
                                                    jpg, jpeg.</div>
                                                <div class="form-text">Fotos de la movilidad. Preferentemente con la
                                                    visualizando la placa</div>
                                                <!--end::Hint-->
                                            </div>

                                        </div>
                                    </div>
                                    <!--end::Col-->
                                    <span id="avatarError" style="color: red;"></span>
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                        <span class="required">Usuario Padre:</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Seleccionar genero "></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <select id="usuariopadre" aria-label="Select a Country"
                                            data-placeholder="Seleccionar Genero..."
                                            class="form-select form-select-solid form-select-lg fw-semibold">
                                            <option value="0">Seleccionar Padre...</option>
                                            <?php foreach ($datospadres as $value): ?>
                                                <option value="<?php echo $value['id'] ?>">
                                                    <?php echo $value['nombretutor'] ?>
                                                    <?php echo $value['apellidotutor'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                    <span id="usuariopadreError" style="color: red;"></span>
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                        <span class="required">Usuario Administrador</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Seleccionar genero "></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <select id="usuarioadministrador" aria-label="Select a Country"
                                            data-placeholder="Seleccionar Genero..."
                                            class="form-select form-select-solid form-select-lg fw-semibold">
                                            <option value="0">Seleccionar Administrador...</option>
                                            <?php foreach ($datosadministrador as $value): ?>
                                                <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?>
                                                    <?php echo $value['apellido'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                    <span id="usuarioadministradorError" style="color: red;"></span>
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                        <span class="required">Usuario Conductor</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Seleccionar genero "></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <select id="usuarioconductor" aria-label="Select a Country"
                                            data-placeholder="Seleccionar Genero..."
                                            class="form-select form-select-solid form-select-lg fw-semibold">
                                            <option value="0">Seleccionar Conductor...</option>
                                            <?php foreach ($datosconductor as $value): ?>
                                                <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?>
                                                    <?php echo $value['apellido'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                    <span id="usuarioconductorError" style="color: red;"></span>
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                        <span class="required">Seleccione Rol</span>
                                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                            title="Seleccionar genero "></i>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <select id="rol" aria-label="Select a Country"
                                            data-placeholder="Seleccionar Genero..."
                                            class="form-select form-select-solid form-select-lg fw-semibold">
                                            <option value="">Seleccionar Rol...</option>
                                            <?php foreach ($datosrol as $value): ?>
                                                <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                    <span id="rolError" style="color: red;"></span>
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold mb-2">Correo Electrónico</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="Ingrese el correo electrónico en uso" id="correoElectronico" />
                                    <!--end::Input-->
                                    <span id="correoElectronicoError" style="color: red;"></span>
                                </div>

                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold mb-2">Contraseña</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-solid"
                                            placeholder="Ingrese la contraseña" id="contrasena" />
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword"><i
                                                class="fas fa-eye"></i></button>
                                    </div>
                                    <!--end::Input-->
                                    <span id="contrasenaError" style="color: red;"></span>
                                    <!--begin::Password strength meter-->
                                    <div id="passwordStrength" class="mt-2">
                                        <div class="progress">
                                            <div id="passwordStrengthBar" class="progress-bar" role="progressbar"
                                                style="width: 0%;" aria-valuenow="0" aria-valuemin="0"
                                                aria-valuemax="100">
                                            </div>
                                        </div>
                                        <small class="text-muted">Fuerza de la contraseña: <span
                                                id="passwordStrengthText">Débil</span></small>
                                    </div>
                                    <!--end::Password strength meter-->
                                </div>
                                <div class="fv-row mb-7">
                                    <!--begin::Label-->
                                    <label class="required fs-6 fw-semibold mb-2">Reiterar Contraseña</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="password" class="form-control form-control-solid"
                                        placeholder="Reingrese la contraseña" id="repetirContrasena" />
                                    <!--end::Input-->
                                    <span id="repetirContrasenaError" style="color: red;"></span>
                                </div>

                            </div>
                            <!--end::Scroll-->
                        </div>

                        <!--end::Modal body-->
                        <!--begin::Modal footer-->
                        <div class="modal-footer flex-center">
                            <!--begin::Button-->
                            <button type="button" id="kt_modal_perfil_calcelar"
                                class="btn btn-light me-3">Cancelar</button>
                            <!--end::Button-->
                            <!--begin::Button-->
                            <button type="button" class="btn btn-primary" id="submitPerfil">
                                <span class="indicator-label">Enviar</span>
                                </span>
                            </button> <!--end::Button-->
                        </div>
                        <!--end::Modal footer-->

                    </div>
                </div>
            </div>
            <!--end::Modal - Administrador - adicionar-->
            <!--begin::Card header-->
            <!--begin::Card body-->
            <div class="card-body p-9">
                <!--begin::Notice-->
                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                    <!--begin::Icon-->
                    <!--begin::Svg Icon | path: icons/duotune/general/gen044.svg-->
                    <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="currentColor" />
                            <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)"
                                fill="currentColor" />
                            <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)"
                                fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <!--end::Icon-->
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-stack flex-grow-1">
                        <!--begin::Content-->
                        <div class="fw-semibold">
                            <h4 class="text-gray-900 fw-bold">PERFIL!</h4>
                            <div class="fs-6 text-gray-700">En este sector puede apreciar el perfil de usuario y los
                                datos.
                            </div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Notice-->
                <br>
                <!--begin::Row-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Nombre</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <span class="fw-bold fs-6 text-gray-800"><?php echo $nombre; ?></span>

                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Apellido</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <span class="fw-bold fs-6 text-gray-800"><?php echo $apellido; ?></span>

                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Correo Electronico</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <span class="fw-semibold text-gray-800 fs-6"><?php echo $Correo_perfil; ?></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Cedula de Identidad</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 fv-row">
                        <span class="fw-semibold text-gray-800 fs-6"><?php echo $ci; ?></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Telefono
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                            title="Numero de telefono del perfil"></i></label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8 d-flex align-items-center">
                        <span class="fw-bold fs-6 text-gray-800 me-2"><?php echo $telefono; ?></span>
                        <span class="badge badge-success">Verificado</span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Direccion Hogar</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <a href="#"
                            class="fw-semibold fs-6 text-gray-800 text-hover-primary"><?php echo $direccion ?></a>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Rol de sistema
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                            title="Rol del sistema al que pertenece el usuario"></i></label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <span class="fw-bold fs-6 text-gray-800"><?php echo $rolnombre ?></span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-7">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Comuncacion</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <span class="fw-bold fs-6 text-gray-800">Email, Telefono</span>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-10">
                    <!--begin::Label-->
                    <label class="col-lg-4 fw-semibold text-muted">Permitir Cambios</label>
                    <!--begin::Label-->
                    <!--begin::Label-->
                    <div class="col-lg-8">
                        <span class="fw-semibold fs-6 text-gray-800">Si</span>
                    </div>
                    <!--begin::Label-->
                </div>
                <!--end::Input group-->

            </div>
            <!--end::Card body-->
        </div>
        <!--end::details View-->
    </div>

    <div id="Tablausuario" class="sector">
        <!--begin::Modal - Administrador - adicionar-->
        <div class="modal fade" id="kt_modal_editar_perfil" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-750px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Form-->
                    <!--begin::Modal header-->
                    <div class="modal-header" id="kt_modal_add_customer_header">
                        <!--begin::Modal title-->
                        <h2 class="fw-bold">Editar Perfil</h2>
                        <!--end::Modal title-->
                        <!--begin::Close-->
                        <div id="kt_modal_perfil_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                    <div class="modal-body py-10 px-lg-17">
                        <!--begin::Scroll-->
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                            data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">

                            <input type="hidden" id="id">
                            <div class="fv-row mb-7">

                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-4">IMAGENES</label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-15">
                                    <div class="row g-6">
                                        <!-- Columna 1 -->
                                        <div class="col-lg-6">
                                            <!--begin::Image input-->
                                            <div class="image-input image-input-outline" data-kt-image-input="true"
                                                style="background-image: url('recursos/metronic/assets/media/svg/avatars/blank.svg')">
                                                <!--begin::Preview existing avatar-->
                                                <div class="image-input-wrapper w-150px h-150px" id="image-wrapper-2"
                                                    style="background-image: url(recursos/metronic/assets/media/svg/avatars/blank.svg)">
                                                </div>
                                                <!--end::Preview existing avatar-->
                                                <!--begin::Label-->
                                                <label
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                    title="Cambiar avatar">
                                                    <i class="bi bi-pencil-fill fs-7"></i>
                                                    <!--begin::Inputs-->
                                                    <input type="file" name="avatarAutomovil" id="avatarAutomovilEdit"
                                                        accept=".png, .jpg, .jpeg" />
                                                    <input type="hidden" name="avatar_remove" />
                                                    <!--end::Inputs-->
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Cancel-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                    title="Cancelar avatar">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Cancel-->
                                                <!--begin::Remove-->
                                                <span
                                                    class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                    title="Eliminar avatar">
                                                    <i class="bi bi-x fs-2"></i>
                                                </span>
                                                <!--end::Remove-->
                                            </div>
                                            <!--end::Image input-->
                                            <!--begin::Hint-->
                                            <div class="form-text">Solo puede subir archivos de formato: png,
                                                jpg, jpeg.</div>
                                            <div class="form-text">Foto de perfil de usuario</div>
                                            <!--end::Hint-->
                                        </div>

                                    </div>
                                </div>
                                <!--end::Col-->
                                <span id="avatarErrorEdit" style="color: red;"></span>
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                    <span class="required">Usuario Padre:</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                        title="Seleccionar genero "></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select id="usuariopadreEdit" aria-label="Select a Country"
                                        data-placeholder="Seleccionar Genero..."
                                        class="form-select form-select-solid form-select-lg fw-semibold">
                                        <option value="0">Seleccionar Padre...</option>
                                        <?php foreach ($datospadres as $value): ?>
                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['nombretutor'] ?>
                                                <?php echo $value['apellidotutor'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!--end::Col-->
                                <span id="usuariopadreErrorEdit" style="color: red;"></span>
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                    <span class="required">Usuario Administrador</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                        title="Seleccionar genero "></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select id="usuarioadministradorEdit" aria-label="Select a Country"
                                        data-placeholder="Seleccionar Genero..."
                                        class="form-select form-select-solid form-select-lg fw-semibold">
                                        <option value="0">Seleccionar Administrador...</option>
                                        <?php foreach ($datosadministrador as $value): ?>
                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?>
                                                <?php echo $value['apellido'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!--end::Col-->
                                <span id="usuarioadministradorErrorEdit" style="color: red;"></span>
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                    <span class="required">Usuario Conductor</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                        title="Seleccionar genero "></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select id="usuarioconductorEdit" aria-label="Select a Country"
                                        data-placeholder="Seleccionar Genero..."
                                        class="form-select form-select-solid form-select-lg fw-semibold">
                                        <option value="0">Seleccionar Conductor...</option>
                                        <?php foreach ($datosconductor as $value): ?>
                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?>
                                                <?php echo $value['apellido'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!--end::Col-->
                                <span id="usuarioconductorErrorEdit" style="color: red;"></span>
                            </div>
                            <div class="row mb-6">
                                <!--begin::Label-->
                                <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                    <span class="required">Seleccione Rol</span>
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                        title="Seleccionar genero "></i>
                                </label>
                                <!--end::Label-->
                                <!--begin::Col-->
                                <div class="col-lg-8 fv-row">
                                    <select id="rolEdit" aria-label="Select a Country"
                                        data-placeholder="Seleccionar Genero..."
                                        class="form-select form-select-solid form-select-lg fw-semibold">
                                        <option value="">Seleccionar Rol...</option>
                                        <?php foreach ($datosrol as $value): ?>
                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!--end::Col-->
                                <span id="rolErrorEdit" style="color: red;"></span>
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">Correo Electrónico</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" class="form-control form-control-solid"
                                    placeholder="Ingrese el correo electrónico en uso" id="correoElectronicoEdit" />
                                <!--end::Input-->
                                <span id="correoElectronicoErrorEdit" style="color: red;"></span>
                            </div>

                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">Contraseña</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <div class="input-group">
                                    <input type="password" class="form-control form-control-solid"
                                        placeholder="Ingrese la contraseña" id="contrasenaEdit" />
                                    <button class="btn btn-outline-secondary" type="button" id="togglePasswordEdit"><i
                                            class="fas fa-eye"></i></button>
                                </div>
                                <!--end::Input-->
                                <span id="contrasenaErrorEdit" style="color: red;"></span>
                                <!--begin::Password strength meter-->
                                <div id="passwordStrengthEdit" class="mt-2">
                                    <div class="progress">
                                        <div id="passwordStrengthBarEdit" class="progress-bar" role="progressbar"
                                            style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                    <small class="text-muted">Fuerza de la contraseña: <span
                                            id="passwordStrengthTextEdit">Débil</span></small>
                                </div>
                                <!--end::Password strength meter-->
                            </div>
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fs-6 fw-semibold mb-2">Reiterar Contraseña</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="passwordEdit" class="form-control form-control-solid"
                                    placeholder="Reingrese la contraseña" id="repetirContrasenaEdit" />
                                <!--end::Input-->
                                <span id="repetirContrasenaErrorEdit" style="color: red;"></span>
                            </div>

                        </div>
                        <!--end::Scroll-->
                    </div>

                    <!--end::Modal body-->
                    <!--begin::Modal footer-->
                    <div class="modal-footer flex-center">
                        <!--begin::Button-->
                        <button type="button" id="kt_modal_perfil_calcelar" class="btn btn-light me-3">Cancelar</button>
                        <!--end::Button-->
                        <!--begin::Button-->
                        <button type="button" class="btn btn-primary" id="submitPerfilEdit">
                            <span class="indicator-label">Enviar</span>
                            </span>
                        </button> <!--end::Button-->
                    </div>
                    <!--end::Modal footer-->

                </div>
            </div>
        </div>
        <!--end::Modal - Administrador - adicionar-->
        <!--begin::Toolbar-->
        <div class="d-flex flex-wrap flex-stack mb-3">
            <!--begin::Heading-->
            <h3 class="fw-bold my-0"> <span class="fs-6 text-gray-400 fw-semibold ms-1">Listado de
                    Estudiantes</span></h3>
            <!--end::Heading-->
        </div>
        <!--end::Toolbar-->
        <div class="card mb-2">
            <div class="card-body pt-7 pb-0 py-0">
                <!--begin::Details-->
                <!--begin::Card body-->
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
                            <div class="fs-6 text-gray-700">En este sector podras apreciar la lista e informacion de
                                los estudiantes registrados en el sistema</div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--begin::Table-->
                <!--begin::Card title-->
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
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
                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_rol">
                    <thead>
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th class="min-w-175px">Datos de usuario</th>
                            <th class="min-w-175px">Informacion</th>
                            <th class="min-w-175px">Inf. Institucional</th>
                            <th class="min-w-100px">Fecha creacion</th>
                            <th class="text-end min-w-70px">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 fw-semibold">
                        <!-- Aquí van los datos de tu tabla -->
                    </tbody>
                </table>
                <!--end::Table-->
                <!--end::Card body-->
            </div>
        </div>
    </div>

</div>
<!--end::Container-->