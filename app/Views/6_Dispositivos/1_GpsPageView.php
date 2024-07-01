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
                        <!--end::Svg Icon-->Agregar Dispositivo</button>
                    <!--end::Add user-->
                    <?php endif; ?>
                </div>
                <!--end::Toolbar-->

                <!--begin::Modal - Dispositivo - adicionar-->
                <div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-600px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Form-->
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_customer_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Nuevo Dispositivo GPS</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div id="kt_modal_GPS_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Marca </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text"   data-validacion="^[a-zA-Z0-9\s\-]*$" class="form-control form-control-solid validar"
                                            placeholder="Ingrese la marca del dispositivo..."
                                            id="marca" />
                                        <!--end::Input-->
                                        <span id="marcaError" style="color: red;"></span>
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Modelo o tipo </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text"  data-validacion="^[a-zA-Z0-9\s\-]*$" class="form-control form-control-solid validar"
                                            placeholder="Ingrese el modelo o tipo del dispositivo..."
                                           id="modelo" />
                                        <!--end::Input-->
                                        <span id="modeloError" style="color: red;"></span>
                                    </div>
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                          <!--begin::Label-->
                                          <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                            <span class="required">Movilidad</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Seleccione la placa de la movilidad en que se esta instalando el dispositivo."></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <select id="movilidad" aria-label="Select a Country"
                                                data-placeholder="Seleccionar Número de Placa..."
                                                class="form-select form-select-solid form-select-lg fw-semibold">
                                                <option value="">Seleccionar Conductor...</option>
                                                <?php foreach ($datos as $value): ?>
                                                    <option value="<?php echo $value['id'] ?>">Nro.: <?php echo $value['placa'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                        <span id="movilidadError" style="color: red;"></span>
                                    </div>
                                    <!--end::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Descripcion</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" data-validacion="^[a-zA-Z0-9\s\-]*$" class="form-control form-control-solid validar"
                                            placeholder="Ingrese la descripcion corta del dispositivo."
                                           id="descripcion" />
                                        <!--end::Input-->
                                        <span id="descripcionError" style="color: red;"></span>
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Detalles e informacion</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea class="form-control form-control-solid validar" data-validacion="^[a-zA-Z0-9\s\-]*$"
                                            placeholder="Ingrese informacion importartante sobre el dispositivo..."
                                            id="detalles"></textarea>
                                        <!--end::Input-->
                                        <span id="detallesError" style="color: red;"></span>
                                    </div>

                                </div>
                                <!--end::Scroll-->
                            </div>

                            <!--end::Modal body-->
                            <!--begin::Modal footer-->
                            <div class="modal-footer flex-center">
                                <!--begin::Button-->
                                <button type="reset" id="kt_modal_GPS_cancelar"
                                    class="btn btn-light me-3">Cancelar</button>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="button" class="btn btn-primary" id="submitBtnGPS">
                                    <span class="indicator-label">Enviar</span>
                                    </span>
                                </button> <!--end::Button-->
                            </div>
                            <!--end::Modal footer-->

                        </div>
                    </div>
                </div>
                <!--end::Modal - Dispositivo - adicionar-->
                <!-------------------------------------------------------------------------------------------------------------
                  begin::Modal - editar Dispositivo
                --------------------------------------------------------------------------------------------------------------->
                <!--begin::Modal - editar Dispositivo-->
                <div class="modal fade" id="kt_modal_GPS_Edit" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-600px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Form-->
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_customer_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Editar Dispositivo GPS</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div id="kt_modal_GPS_Edit_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Marca </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text"   data-validacion="^[a-zA-Z0-9\s\-]*$" class="form-control form-control-solid validar"
                                            placeholder="Ingrese la marca del dispositivo..."
                                            id="marcaEdit" />
                                        <!--end::Input-->
                                        <span id="marcaErrorEdit" style="color: red;"></span>
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Modelo o tipo </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text"  data-validacion="^[a-zA-Z0-9\s\-]*$" class="form-control form-control-solid validar"
                                            placeholder="Ingrese el modelo o tipo del dispositivo..."
                                           id="modeloEdit" />
                                        <!--end::Input-->
                                        <span id="modeloErrorEdit" style="color: red;"></span>
                                    </div>
                                    <!--begin::Input group-->
                                    <div class="row mb-6">
                                          <!--begin::Label-->
                                          <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                            <span class="required">Movilidad</span>
                                            <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                title="Seleccione la placa de la movilidad en que se esta instalando el dispositivo."></i>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <select id="movilidadEdit" aria-label="Select a Country"
                                                data-placeholder="Seleccionar Número de Placa..."
                                                class="form-select form-select-solid form-select-lg fw-semibold">
                                                <option value="">Seleccionar Conductor...</option>
                                                <?php foreach ($datos as $value): ?>
                                                    <option value="<?php echo $value['id'] ?>">Nro.: <?php echo $value['placa'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <!--end::Col-->
                                        <span id="movilidadErrorEdit" style="color: red;"></span>
                                    </div>
                                    <!--end::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Descripcion</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" data-validacion="^[a-zA-Z0-9\s\-]*$" class="form-control form-control-solid validar"
                                            placeholder="Ingrese la descripcion corta del dispositivo."
                                           id="descripcionEdit" />
                                        <!--end::Input-->
                                        <span id="descripcionErrorEdit" style="color: red;"></span>
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Detalles e informacion</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea class="form-control form-control-solid validar" data-validacion="^[a-zA-Z0-9\s\-]*$"
                                            placeholder="Ingrese informacion importartante sobre el dispositivo..."
                                            id="detallesEdit"></textarea>
                                        <!--end::Input-->
                                        <span id="detallesErrorEdit" style="color: red;"></span>
                                    </div>

                                </div>
                                <!--end::Scroll-->
                            </div>

                            <!--end::Modal body-->
                            <!--begin::Modal footer-->
                            <div class="modal-footer flex-center">
                                <!--begin::Button-->
                                <button type="reset" id="kt_modal_GPS_cancelar_Edit"
                                    class="btn btn-light me-3">Cancelar</button>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="button" class="btn btn-primary" id="submitBtnGPSEdit">
                                    <span class="indicator-label">Enviar</span>
                                    </span>
                                </button> <!--end::Button-->
                            </div>
                            <!--end::Modal footer-->

                        </div>
                    </div>
                </div>
              
                <!--end::Modal - editar Dispositivo-->
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
                        <div class="fs-6 text-gray-700">Sector se realiza el registro e informacion del dispositivo GPS
                            que se instala en el automivil para realizar el rastreo.</div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_rol">
                <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-175px">Dispositivo</th>
                        <th class="min-w-100px">Movilidad</th>
                        <th class="min-w-100px">Descripcion</th>
                        <th class="min-w-100px">Detalles e informacion</th>
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