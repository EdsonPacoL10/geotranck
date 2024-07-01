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
                <?php if ($agregar || $administrador): ?>
                     <!--begin::Add user-->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
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
                        <!--end::Svg Icon-->Agregar Automovil</button>
                    <!--end::Add user-->
                    <?php endif; ?>
                </div>
                <!--end::Toolbar-->

                <!--begin::Modal - automovil - adicionar-->
                <div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-800px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Form-->
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_customer_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Nuevo Automovil</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div id="kt_modal_rol_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                            <div class="modal-body py-2 px-lg-17">
                                <!--begin::Scroll-->
                                <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                                    data-kt-scroll-activate="{default: false, lg: true}"
                                    data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                                    data-kt-scroll-wrappers="#kt_modal_add_customer_scroll"
                                    data-kt-scroll-offset="300px">

                                    <!--begin::Input group-->
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
                                                    <div class="image-input image-input-outline"
                                                        data-kt-image-input="true"
                                                        style="background-image: url('recursos/metronic/assets/media/svg/avatars/blank.svg')">
                                                        <!--begin::Preview existing avatar-->
                                                        <div class="image-input-wrapper w-150px h-150px"
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
                                                            <input type="file" name="avatarAutomovil"
                                                                id="avatarAutomovil" accept=".png, .jpg, .jpeg" />
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
                                                <!-- Columna 2 -->
                                                <div class="col-lg-6">
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-outline"
                                                        data-kt-image-input="true"
                                                        style="background-image: url('recursos/metronic/assets/media/svg/avatars/blank.svg')">
                                                        <!--begin::Preview existing avatar-->
                                                        <div class="image-input-wrapper w-150px h-150px"
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
                                                            <!--begin::Inputs-->
                                                            <input type="file" name="avatarConductor"
                                                                id="avatarConductor" accept=".png, .jpg, .jpeg" />
                                                            <input type="hidden" name="avatar_remove" />
                                                            <!--end::Inputs-->
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
                                                    <div class="form-text">Foto del conductor del automovil seleccionado
                                                    </div>
                                                    <!--end::Hint-->

                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                        <span id="avatarError" style="color: red;"></span>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Datos Automovil</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <!--begin::Col-->
                                        <div class="col-lg-15">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-4 fv-row">
                                                    <input type="text" id="marca" data-validacion="^[a-zA-Z0-9\s]*$"
                                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 validar"
                                                        placeholder="Marca" value="" />
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-4 fv-row">
                                                    <input type="text" id="modelo" data-validacion="^[a-zA-Z0-9\s]*$"
                                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 validar"
                                                        placeholder="Modelo" value="" />
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-4 fv-row">
                                                    <div class="input-group">
                                                        <input type="number" min="0" max="200" id="nroPasajero"
                                                            class="form-control form-control-lg form-control-solid"
                                                            placeholder="Nro." value="1" />
                                                        <span class="input-group-text">Pasajeros</span>
                                                    </div>
                                                </div>

                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->
                                        <!--end::Input-->
                                        <span id="datosAutomovilError" style="color: red;"></span>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                            <span class="required">Conductor</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Seleccionar Conductor previamente creado "></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <select id="conductoAutomovil" aria-label="Select a Country"
                                                data-placeholder="Seleccionar Conductor..."
                                                class="form-select form-select-solid form-select-lg fw-semibold">
                                                <option value="">Seleccionar Conductor...</option>
                                                <?php foreach ($datos as $value): ?>
                                                    <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre']; ?>
                                                        <?php echo $value['apellido'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                        <span id="conductorError" style="color: red;"></span>

                                    </div>
                                    <!--end::Input group-->
                                    <div class="row">
                                        <div class="col-lg-2 mb-0">
                                            <div class="fv-row">
                                                <label class="required fs-6 fw-semibold">Nro. Chasis</label>
                                                <input type="text" id="nroChasis"
                                                    data-validacion="^[a-zA-Z0-9\s]*$"
                                                    class="form-control form-control-lg form-control-solid mb-lg-0 validar"
                                                    placeholder="Nro." value="" />

                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-0">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="fv-row">
                                                        <label class="fs-6 fw-semibold ">¿Tiene
                                                            Soat?</label>
                                                        <label
                                                            class="form-check form-switch form-check-custom form-check-solid">
                                                            <input id="soatCheckbox" class="form-check-input"
                                                                type="checkbox" value="1" checked="checked">
                                                            <span
                                                                class="form-check-label-li-soat fw-semibold text-muted">Si</span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-0">
                                                    <div class="fv-row">
                                                        <label class="required fs-6 fw-semibold mb-6">Año del
                                                            Soat</label>
                                                        <input type="text" id="añoSoat"
                                                            data-validacion="^[a-zA-Z0-9\s]*$"
                                                            class="form-control form-control-lg form-control-solid mb-lg-0 validar"
                                                            placeholder="Año" value="" />
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-2 mb-0">
                                            <div class="fv-row">
                                                <label class="required fs-6 fw-semibold mb-0">¿Inspeccion
                                                    vehicular?</label>
                                                <label
                                                    class="form-check form-switch form-check-custom form-check-solid">
                                                    <input id="inspeccionCheckbox" class="form-check-input"
                                                        type="checkbox" value="1" checked="checked">
                                                    <span class="form-check-label-li fw-semibold text-muted">Si</span>
                                                </label>

                                            </div>
                                        </div>
                                        <div class="col-lg-2 mb-0">
                                            <div class="fv-row">
                                                <label class="required fs-6 fw-semibold mb-6">Color</label>
                                                <input type="text" id="color" data-validacion="^[a-zA-Z0-9\s]*$"
                                                    class="form-control form-control-lg form-control-solid mb-lg-0 validar"
                                                    placeholder="Color" value="" />

                                            </div>
                                        </div>
                                        <div class="col-lg-2 mb-0">
                                            <div class="fv-row">
                                                <label class="required fs-6 fw-semibold mb-6">Placa</label>
                                                <input type="text" id="placa" data-validacion="^[a-zA-Z0-9\s]*$"
                                                    class="form-control form-control-lg form-control-solid mb-lg-0 validar"
                                                    placeholder="Placa" value="" />
                                            </div>
                                        </div>
                                        <span id="datosCompletosError" style="color: red;"></span>

                                    </div>

                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Dueño del Automovil</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" data-validacion="^[a-zA-Z0-9\s]*$"
                                            class="form-control form-control-solid validar"
                                            placeholder="Ingrese en nombre completo del dueño del automovil"
                                            id="dueñoAutomovil" />
                                        <!--end::Input-->
                                        <span id="dueñoAutomovilError" style="color: red;"></span>
                                    </div>

                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Número de Telefono</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" data-validacion="^[0-9]+$"
                                            class="form-control form-control-solid validar"
                                            placeholder="Ingrese número de telefono del dueño del automovil."
                                            id="telefono" />
                                        <!--end::Input-->
                                        <span id="telefonoError" style="color: red;"></span>
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Tipo de vehiculo</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" data-validacion="^[a-zA-Z0-9\s]*$"
                                            class="form-control form-control-solid validar"
                                            placeholder="Ingrese el tipo de vehiculo" id="tipo" />
                                        <!--end::Input-->
                                        <span id="tipoError" style="color: red;"></span>
                                    </div>
                                </div>
                                <!--end::Scroll-->
                            </div>

                            <!--end::Modal body-->
                            <!--begin::Modal footer-->
                            <div class="modal-footer flex-center">
                                <!--begin::Button-->
                                <button type="reset" id="kt_modal_rol_calcelar"
                                    class="btn btn-light me-3">Cancelar</button>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="button" class="btn btn-primary" id="submitBtnAutomovil">
                                    <span class="indicator-label">Enviar</span>
                                    </span>
                                </button> <!--end::Button-->
                            </div>
                            <!--end::Modal footer-->

                        </div>
                    </div>
                </div>
                <!--end::Modal - automovil - adicionar-->
                <!-------------------------------------------------------------------------------------------------------------
                  begin::Modal - editar automovil
                --------------------------------------------------------------------------------------------------------------->
                <div class="modal fade" id="kt_modal_edit_automovil" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-800px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Form-->
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_customer_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Editar Automovil</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div id="kt_modal_Automovil_Edit_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                            <div class="modal-body py-2 px-lg-17">
                                <!--begin::Scroll-->
                                <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true"
                                    data-kt-scroll-activate="{default: false, lg: true}"
                                    data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                                    data-kt-scroll-wrappers="#kt_modal_add_customer_scroll"
                                    data-kt-scroll-offset="300px">
                                    <input type="hidden" id="id" value="">
                                    <!--begin::Input group-->
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
                                                    <div class="image-input image-input-outline"
                                                        data-kt-image-input="true"
                                                        style="background-image: url('recursos/metronic/assets/media/svg/avatars/blank.svg')">
                                                        <!--begin::Preview existing avatar-->
                                                        <div class="image-input-wrapper w-150px h-150px"  id="image-wrapper-1"
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
                                                            <input type="file" name="avatarAutomovil"
                                                                id="avatarAutomovilEdit" accept=".png, .jpg, .jpeg" />
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
                                                <!-- Columna 2 -->
                                                <div class="col-lg-6">
                                                    <!--begin::Image input-->
                                                    <div class="image-input image-input-outline"
                                                        data-kt-image-input="true"
                                                        style="background-image: url('recursos/metronic/assets/media/svg/avatars/blank.svg')">
                                                        <!--begin::Preview existing avatar-->
                                                        <div class="image-input-wrapper w-150px h-150px"  id="image-wrapper-2"
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
                                                            <!--begin::Inputs-->
                                                            <input type="file" name="avatarConductor"
                                                                id="avatarConductorEdit" accept=".png, .jpg, .jpeg" />
                                                            <input type="hidden" name="avatar_remove" />
                                                            <!--end::Inputs-->
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
                                                    <div class="form-text">Foto del conductor del automovil seleccionado
                                                    </div>
                                                    <!--end::Hint-->

                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Col-->
                                        <span id="avatarErrorEdit" style="color: red;"></span>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Datos Automovil</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <!--begin::Col-->
                                        <div class="col-lg-15">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-4 fv-row">
                                                    <input type="text" id="marcaEdit" data-validacion="^[a-zA-Z0-9\s]*$"
                                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 validar"
                                                        placeholder="Marca" value="" />
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-4 fv-row">
                                                    <input type="text" id="modeloEdit" data-validacion="^[a-zA-Z0-9\s]*$"
                                                        class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 validar"
                                                        placeholder="Modelo" value="" />
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-lg-4 fv-row">
                                                    <div class="input-group">
                                                        <input type="number" min="0" max="200" id="nroPasajeroEdit"
                                                            class="form-control form-control-lg form-control-solid"
                                                            placeholder="Nro." value="1" />
                                                        <span class="input-group-text">Pasajeros</span>
                                                    </div>
                                                </div>

                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->
                                        <!--end::Input-->
                                        <span id="datosAutomovilErrorEdit" style="color: red;"></span>
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                            <span class="required">Conductor</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Seleccionar Conductor previamente creado "></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <select id="conductoAutomovilEdit" aria-label="Select a Country"
                                                data-placeholder="Seleccionar Conductor..."
                                                class="form-select form-select-solid form-select-lg fw-semibold">
                                                <option value="">Seleccionar Conductor...</option>
                                                <?php foreach ($datos as $value): ?>
                                                    <option value="<?php echo $value['id'] ?>"><?php echo $value['nombre']; ?>
                                                        <?php echo $value['apellido'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                        <span id="conductorErrorEdit" style="color: red;"></span>

                                    </div>
                                    <!--end::Input group-->
                                    <div class="row">
                                        <div class="col-lg-2 mb-0">
                                            <div class="fv-row">
                                                <label class="required fs-6 fw-semibold">Nro. Chasis</label>
                                                <input type="text" id="nroChasisEdit"
                                                    data-validacion="^[a-zA-Z0-9\s]*$"
                                                    class="form-control form-control-lg form-control-solid mb-lg-0 validar"
                                                    placeholder="Nro." value="" />

                                            </div>
                                        </div>
                                        <div class="col-lg-4 mb-0">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="fv-row">
                                                        <label class="fs-6 fw-semibold ">¿Tiene
                                                            Soat?</label>
                                                        <label
                                                            class="form-check form-switch form-check-custom form-check-solid">
                                                            <input id="soatCheckboxEdit" class="form-check-input"
                                                                type="checkbox" value="1" checked="checked">
                                                           
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-0">
                                                    <div class="fv-row">
                                                        <label class="required fs-6 fw-semibold mb-6">Año del
                                                            Soat</label>
                                                        <input type="text" id="añoSoatEdit"
                                                            data-validacion="^[a-zA-Z0-9\s]*$"
                                                            class="form-control form-control-lg form-control-solid mb-lg-0 validar"
                                                            placeholder="Año" value="" />
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-2 mb-0">
                                            <div class="fv-row">
                                                <label class="required fs-6 fw-semibold mb-0">¿Inspeccion
                                                    vehicular?</label>
                                                <label
                                                    class="form-check form-switch form-check-custom form-check-solid">
                                                    <input id="inspeccionCheckboxEdit" class="form-check-input"
                                                        type="checkbox" value="1" checked="checked">
                                                   
                                                </label>

                                            </div>
                                        </div>
                                        <div class="col-lg-2 mb-0">
                                            <div class="fv-row">
                                                <label class="required fs-6 fw-semibold mb-6">Color</label>
                                                <input type="text" id="colorEdit" data-validacion="^[a-zA-Z0-9\s]*$"
                                                    class="form-control form-control-lg form-control-solid mb-lg-0 validar"
                                                    placeholder="Color" value="" />

                                            </div>
                                        </div>
                                        <div class="col-lg-2 mb-0">
                                            <div class="fv-row">
                                                <label class="required fs-6 fw-semibold mb-6">Placa</label>
                                                <input type="text" id="placaEdit" data-validacion="^[a-zA-Z0-9\s]*$"
                                                    class="form-control form-control-lg form-control-solid mb-lg-0 validar"
                                                    placeholder="Placa" value="" />
                                            </div>
                                        </div>
                                        <span id="datosCompletosErrorEdit" style="color: red;"></span>

                                    </div>

                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Dueño del Automovil</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" data-validacion="^[a-zA-Z0-9\s]*$"
                                            class="form-control form-control-solid validar"
                                            placeholder="Ingrese en nombre completo del dueño del automovil"
                                            id="dueñoAutomovilEdit" />
                                        <!--end::Input-->
                                        <span id="dueñoAutomovilErrorEdit" style="color: red;"></span>
                                    </div>

                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Número de Telefono</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" data-validacion="^[0-9]+$"
                                            class="form-control form-control-solid validar"
                                            placeholder="Ingrese número de telefono del dueño del automovil."
                                            id="telefonoEdit" />
                                        <!--end::Input-->
                                        <span id="telefonoErrorEdit" style="color: red;"></span>
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Tipo de vehiculo</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" data-validacion="^[a-zA-Z0-9\s]*$"
                                            class="form-control form-control-solid validar"
                                            placeholder="Ingrese el tipo de vehiculo" id="tipoEdit" />
                                        <!--end::Input-->
                                        <span id="tipoErrorEdit" style="color: red;"></span>
                                    </div>
                                </div>
                                <!--end::Scroll-->
                            </div>

                            <!--end::Modal body-->
                            <!--begin::Modal footer-->
                            <div class="modal-footer flex-center">
                                <!--begin::Button-->
                                <button type="reset" id="kt_modal_Edit_close"
                                    class="btn btn-light me-3">Cancelar</button>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="button" class="btn btn-primary" id="submitBtnEditAutomovil">
                                    <span class="indicator-label">Enviar</span>
                                    </span>
                                </button> <!--end::Button-->
                            </div>
                            <!--end::Modal footer-->

                        </div>
                    </div>
                </div>

                <!--end::Modal - editar automovil-->
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
                        <div class="fs-6 text-gray-700">Sector donde se realiza el ingreso e informacion de los
                            automoviles que se utiliza para el transporte escolar.</div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_rol">
                <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-140px">Conductor</th>
                        <th class="min-w-140px">Automovil</th>
                        <th class="min-w-140px">Caracteristicas <br>del vehiculo</th>
                        <th class="min-w-100px">Información <br>del vehiculo</th>
                        <th class="min-w-100px">Dueño <br>del vehiculo</th>
                        <th class="min-w-70pxpx">Fecha <br> de creacion </th>
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