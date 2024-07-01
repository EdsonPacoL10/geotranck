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
                        <!--end::Svg Icon-->Agregar Informacion</button>
                    <!--end::Add user-->
                    <?php endif; ?>
                </div>
                <!--end::Toolbar-->

                <!--begin::Modal - rol - adicionar-->
                <div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-600px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Form-->
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_customer_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Nuevo Dato Telefonico</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div id="kt_modal_Guia_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                                        <label class="required fs-6 fw-semibold mb-2">Nombre Completo</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid validar" data-validacion="^[a-zA-Z0-9\s]*$"
                                            placeholder="Ingrese el nombre completo..." 
                                            id="nombre" />
                                        <!--end::Input-->
                                        <span id="nombreError" style="color: red;"></span>
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Cargo</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid validar" data-validacion="^[a-zA-Z0-9\s]*$"
                                            placeholder="Ingrese el cargo al que pertenece el registro."
                                            id="cargo" />
                                        <!--end::Input-->
                                        <span id="cargoError" style="color: red;"></span>
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Correo Electronico</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Ingrese el correo electronico..."
                                            id="correoElectronico" />
                                        <!--end::Input-->
                                        <span id="correoElectronicoError" style="color: red;"></span>
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Número Telefonico</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid validar" data-validacion="^[0-9]+$"
                                            placeholder="Ingrese el número telefonico..." 
                                            id="numeroTelefonico" />
                                        <!--end::Input-->
                                        <span id="numeroTelefonicoError" style="color: red;"></span>
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Dirección de Domicilio</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea class="form-control form-control-solid" 
                                            placeholder="Ingrese la dirección de domicilio..." 
                                            id="direccionDomicilio"></textarea>
                                        <!--end::Input-->
                                        <span id="direccionDomicilioError" style="color: red;"></span>
                                    </div>
                                </div>
                                <!--end::Scroll-->
                            </div>

                            <!--end::Modal body-->
                            <!--begin::Modal footer-->
                            <div class="modal-footer flex-center">
                                <!--begin::Button-->
                                <button type="reset" id="kt_modal_Guia_cancelar"
                                    class="btn btn-light me-3">Cancelar</button>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="button" class="btn btn-primary" id="submitBtnContacto">
                                    <span class="indicator-label">Enviar</span>
                                    </span>
                                </button> <!--end::Button-->
                            </div>
                            <!--end::Modal footer-->

                        </div>
                    </div>
                </div>
                <!--end::Modal - rol - adicionar-->
                <!-------------------------------------------------------------------------------------------------------------
                  begin::Modal - editar telefono
                --------------------------------------------------------------------------------------------------------------->
                <!--begin::Modal - editar telefono-->
                <div class="modal fade" id="kt_modal_telefono_edit" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-600px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Form-->
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_customer_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Editar Telefono</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div id="kt_modal_Guia_close_Edit" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                                    <input type="hidden" id="id" value="" >
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Nombre Completo</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid validar" data-validacion="^[a-zA-Z0-9\s]*$"
                                            placeholder="Ingrese el nombre completo..." 
                                            id="nombreEdit" />
                                        <!--end::Input-->
                                        <span id="nombreErrorEdit" style="color: red;"></span>
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Cargo</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid validar" data-validacion="^[a-zA-Z0-9\s]*$"
                                            placeholder="Ingrese el cargo al que pertenece el registro."
                                            id="cargoEdit" />
                                        <!--end::Input-->
                                        <span id="cargoErrorEdit" style="color: red;"></span>
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Correo Electronico</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid"
                                            placeholder="Ingrese el correo electronico..."
                                            id="correoElectronicoEdit" />
                                        <!--end::Input-->
                                        <span id="correoElectronicoErrorEdit" style="color: red;"></span>
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Número Telefonico</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" class="form-control form-control-solid validar" data-validacion="^[0-9]+$"
                                            placeholder="Ingrese el número telefonico..." 
                                            id="numeroTelefonicoEdit" />
                                        <!--end::Input-->
                                        <span id="numeroTelefonicoErrorEdit" style="color: red;"></span>
                                    </div>
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="required fs-6 fw-semibold mb-2">Dirección de Domicilio</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea class="form-control form-control-solid" 
                                            placeholder="Ingrese la dirección de domicilio..." 
                                            id="direccionDomicilioEdit"></textarea>
                                        <!--end::Input-->
                                        <span id="direccionDomicilioErrorEdit" style="color: red;"></span>
                                    </div>
                                </div>
                                <!--end::Scroll-->
                            </div>

                            <!--end::Modal body-->
                            <!--begin::Modal footer-->
                            <div class="modal-footer flex-center">
                                <!--begin::Button-->
                                <button type="reset" id="kt_modal_Guia_Edit_cancelar"
                                    class="btn btn-light me-3">Cancelar</button>
                                <!--end::Button-->
                                <!--begin::Button-->
                                <button type="button" class="btn btn-primary" id="submitBtnTelefonoEdit">
                                    <span class="indicator-label">Enviar</span>
                                    </span>
                                </button> <!--end::Button-->
                            </div>
                            <!--end::Modal footer-->

                        </div>
                    </div>
                </div>
                <!--end::Modal - editar telefono-->
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
                        <div class="fs-6 text-gray-700">Sector se realiza el registro e informacion de la guia
                            telefonica e informacion rapida para la comunicacion eficaz entre el servicio de transporte
                            ,instucion y padres de familia.</div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_rol">
                <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-175px">Nombre de Usuario</th>
                        <th class="min-w-100px">Contactos</th>
                        <th class="min-w-100px">Direccion</th>
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