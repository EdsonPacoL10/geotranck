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
                        data-bs-target="#kt_modal_offer_a_deal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                    transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Nuevo Registro</button>
                    <!--end::Add user-->
                 <?php endif; ?>
                </div>
                <!--end::Toolbar-->

                <div class="modal fade" id="kt_modal_offer_a_deal" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-750px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Form-->
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_customer_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Nuevo Registro</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div id="kt_modal_padre_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                                    data-kt-scroll-activate="{default: false, lg: true}"
                                    data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                                    data-kt-scroll-wrappers="#kt_modal_add_customer_scroll"
                                    data-kt-scroll-offset="300px">
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <!--begin::Card title-->
                                        <div class="card-title mb-0">
                                            <h3 class="fw-bold m-0">Datos del padre, madre o tutor del estudiante
                                            </h3>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--begin::Heading-->
                                    <div class="mb-1">
                                        <!--begin::Description-->
                                        <div class="text-muted fw-semibold fs-5">Informacion de la persona a
                                            cargo y responsable del estudiante.
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->

                                    <!--end::Input group-->
                                    <div class="row mb-4">
                                        <!--begin::Label-->
                                        <label class="col-lg-3 col-form-label fw-semibold fs-6">Nombre</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <input type="text" id="NombreTutor" data-validacion="^[a-zA-Z\s]*$"
                                                class="form-control form-control-lg form-control-solid validar"
                                                placeholder="Nombre del tutor de familia" value="" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-4">
                                        <!--begin::Label-->
                                        <label
                                            class="col-lg-3 col-form-label required fw-semibold fs-6">Apellido</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <input type="text" id="ApellidoTutor" data-validacion="^[a-zA-Z\s]*$"
                                                class="form-control form-control-lg form-control-solid validar"
                                                placeholder="Apellido del tutor de familia" value="" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-4">
                                        <!--begin::Label-->
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Cedula
                                            Identidad</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <input type="text" id="CedulaTutor" data-validacion="^[a-zA-Z0-9 ]+$"
                                                class="form-control form-control-lg form-control-solid validar"
                                                placeholder="Nro de identificacion" value="" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-4">
                                        <!--begin::Label-->
                                        <label
                                            class="col-lg-3 col-form-label required fw-semibold fs-6">Telefono</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <input type="text" id="TelefonoTutor" data-validacion="^[0-9]+$"
                                                class="form-control form-control-lg form-control-solid validar"
                                                placeholder="Número de telefonico" value="" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-4">
                                        <!--begin::Label-->
                                        <label
                                            class="col-lg-3 col-form-label required fw-semibold fs-6">Parentesco</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <input type="text" id="ParentescoTutor" data-validacion="^[a-zA-Z\s]*$"
                                                class="form-control form-control-lg form-control-solid validar"
                                                placeholder="Escriba el parentesco que se tiene con el estudiante"
                                                value="" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->

                                    <div class="mb-6">
                                        <!--begin::Title-->
                                        <h2 class="mb-3">Datos Complementarios</h2>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="text-muted fw-semibold fs-5">Estos datos son
                                            complementarios que el padre proporciona.
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="row mb-4">
                                        <!--begin::Label-->
                                        <!--begin::Card title-->
                                        <div class="card-title mb-4">
                                            <h3 class="fw-bold m-0">Datos adicioneles</h3>
                                        </div>
                                        <!--end::Card title-->
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Correo
                                            Electronico</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <input type="text" id="CorreoDatoAdicional"
                                                class="form-control form-control-lg form-control-solid "
                                                placeholder="Ingrese un correo electronico" value="" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-4">
                                        <!--begin::Label-->
                                        <label
                                            class="col-lg-3 col-form-label required fw-semibold fs-6">Direccion</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <input type="text" id="Direccion"
                                                class="form-control form-control-lg form-control-solid "
                                                placeholder="Ingrese la direccion del domicio o trabajo donde se le puede encontrar"
                                                value="" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-4">
                                        <!--begin::Label-->
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Número
                                            de emergencia</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <input type="text" id="NumeroEmergencia"
                                                class="form-control form-control-lg form-control-solid "
                                                placeholder="Ingrese numero de emergencia" value="" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-4">
                                        <!--begin::Label-->
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Nota o
                                            indicacion extra</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <textarea id="Extra"
                                                class="form-control form-control-lg form-control-solid "
                                                placeholder="Escribe aquí la nota o indicación extra"
                                                rows="2"></textarea>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->



                                </div>
                                <!--end::Scroll-->
                            </div>

                            <!--end::Modal body-->
                            <!--begin::Modal footer-->
                            <div class="modal-footer flex-center">
                                <!--begin::Button-->
                                <button type="button" class="btn btn-primary" id="submitBtnPadre">
                                    <span class="indicator-label">Guardar</span>
                                    </span>
                                </button> <!--end::Button-->
                            </div>
                            <!--end::Modal footer-->

                        </div>
                    </div>
                </div>


                <!-------------------------------------------------------------------------------------------------------------
                  begin::Modal - editar padre
                --------------------------------------------------------------------------------------------------------------->
                <!--begin::Modal - modal padre-->
                <div class="modal fade" id="kt_modal_edit_padre" tabindex="-1" aria-hidden="true">
                    <!--begin::Modal dialog-->
                    <div class="modal-dialog modal-dialog-centered mw-750px">
                        <!--begin::Modal content-->
                        <div class="modal-content">
                            <!--begin::Form-->
                            <!--begin::Modal header-->
                            <div class="modal-header" id="kt_modal_add_customer_header">
                                <!--begin::Modal title-->
                                <h2 class="fw-bold">Editar Registro</h2>
                                <!--end::Modal title-->
                                <!--begin::Close-->
                                <div id="kt_modal_padre_closeEdit" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                                    data-kt-scroll-activate="{default: false, lg: true}"
                                    data-kt-scroll-max-height="auto"
                                    data-kt-scroll-dependencies="#kt_modal_add_customer_header"
                                    data-kt-scroll-wrappers="#kt_modal_add_customer_scroll"
                                    data-kt-scroll-offset="300px">
                                    <div class="row mb-6">
                                        <!--begin::Label-->
                                        <!--begin::Card title-->
                                        <div class="card-title mb-0">
                                            <h3 class="fw-bold m-0">Datos del padre, madre o tutor del estudiante
                                            </h3>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--begin::Heading-->
                                    <div class="mb-1">
                                        <!--begin::Description-->
                                        <div class="text-muted fw-semibold fs-5">Informacion de la persona a
                                            cargo y responsable del estudiante.
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
<input type="hidden" id="id">
                                    <!--end::Input group-->
                                    <div class="row mb-4">
                                        <!--begin::Label-->
                                        <label class="col-lg-3 col-form-label fw-semibold fs-6">Nombre</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <input type="text" id="NombreTutorEdit" data-validacion="^[a-zA-Z\s]*$"
                                                class="form-control form-control-lg form-control-solid validar"
                                                placeholder="Nombre del tutor de familia"  />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-4">
                                        <!--begin::Label-->
                                        <label
                                            class="col-lg-3 col-form-label required fw-semibold fs-6">Apellido</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <input type="text" id="ApellidoTutorEdit" data-validacion="^[a-zA-Z\s]*$"
                                                class="form-control form-control-lg form-control-solid validar"
                                                placeholder="Apellido del tutor de familia" value="" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-4">
                                        <!--begin::Label-->
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Cedula
                                            Identidad</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <input type="text" id="CedulaTutorEdit" data-validacion="^[a-zA-Z0-9 ]+$"
                                                class="form-control form-control-lg form-control-solid validar"
                                                placeholder="Nro de identificacion" value="" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-4">
                                        <!--begin::Label-->
                                        <label
                                            class="col-lg-3 col-form-label required fw-semibold fs-6">Telefono</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <input type="text" id="TelefonoTutorEdit" data-validacion="^[0-9]+$"
                                                class="form-control form-control-lg form-control-solid validar"
                                                placeholder="Número de telefonico" value="" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-4">
                                        <!--begin::Label-->
                                        <label
                                            class="col-lg-3 col-form-label required fw-semibold fs-6">Parentesco</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <input type="text" id="ParentescoTutorEdit" data-validacion="^[a-zA-Z\s]*$"
                                                class="form-control form-control-lg form-control-solid validar"
                                                placeholder="Escriba el parentesco que se tiene con el estudiante"
                                                value="" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->

                                    <div class="mb-6">
                                        <!--begin::Title-->
                                        <h2 class="mb-3">Datos Complementarios</h2>
                                        <!--end::Title-->
                                        <!--begin::Description-->
                                        <div class="text-muted fw-semibold fs-5">Estos datos son
                                            complementarios que el padre proporciona.
                                        </div>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Heading-->
                                    <!--begin::Input group-->
                                    <div class="row mb-4">
                                        <!--begin::Label-->
                                        <!--begin::Card title-->
                                        <div class="card-title mb-4">
                                            <h3 class="fw-bold m-0">Datos adicioneles</h3>
                                        </div>
                                        <!--end::Card title-->
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Correo
                                            Electronico</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <input type="text" id="CorreoDatoAdicionalEdit"
                                                class="form-control form-control-lg form-control-solid "
                                                placeholder="Ingrese un correo electronico" value="" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-4">
                                        <!--begin::Label-->
                                        <label
                                            class="col-lg-3 col-form-label required fw-semibold fs-6">Direccion</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <input type="text" id="DireccionEdit"
                                                class="form-control form-control-lg form-control-solid "
                                                placeholder="Ingrese la direccion del domicio o trabajo donde se le puede encontrar"
                                                value="" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-4">
                                        <!--begin::Label-->
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Número
                                            de emergencia</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <input type="text" id="NumeroEmergenciaEdit"
                                                class="form-control form-control-lg form-control-solid "
                                                placeholder="Ingrese numero de emergencia" value="" />
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Input group-->
                                    <div class="row mb-4">
                                        <!--begin::Label-->
                                        <label class="col-lg-3 col-form-label required fw-semibold fs-6">Nota o
                                            indicacion extra</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-9 fv-row">
                                            <textarea id="ExtraEdit"
                                                class="form-control form-control-lg form-control-solid "
                                                placeholder="Escribe aquí la nota o indicación extra"
                                                rows="2"></textarea>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->



                                </div>
                                <!--end::Scroll-->
                            </div>

                            <!--end::Modal body-->
                            <!--begin::Modal footer-->
                            <div class="modal-footer flex-center">
                                <!--begin::Button-->
                                <button type="button" class="btn btn-primary" id="submitBtnPadreEdit">
                                    <span class="indicator-label">Guardar</span>
                                    </span>
                                </button> <!--end::Button-->
                            </div>
                            <!--end::Modal footer-->

                        </div>
                    </div>
                </div>

                <!--end::Modal - modal padre-->
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
                        <div class="fs-6 text-gray-700">Sector registro de datos e informacion de los padres de familia
                            de los estudiantes.</div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_datatable_rol">
                <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th class="min-w-100px text-center">Nombre<br>Completo</th>
                        <th class="min-w-50px text-center">Carnet</th>
                        <th class="min-w-50px text-center">Contactos</th>
                        <th class="min-w-50px text-center">Parentesco</th>
                        <th class="min-w-50px text-center">Direccion</th>
                        <th class="min-w-50px text-center">Indicacion</th>
                        <th class="min-w-70px text-center">Fecha<br>Creacion</th>
                        <th class="text-end min-w-70px text-center">Acciones</th>
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