<!--begin::Container-->
<div class="container-xxl" id="kt_content_container">
    <!--begin::Card-->
    <div class="card">

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
                        <div class="fs-6 text-gray-700">Sector se realiza se realiza la asignacion de los estudiantes a
                            los automoviles correspondiente para su control.</div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Input group-->
            <div class="row mb-6 align-items-center">
                <!--begin::Label-->
                <label class="col-lg-4 col-form-label fw-semibold fs-6 d-flex align-items-center">
                    <span class="required">Automovil</span>
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
                                    <?php echo $value['nrotelefono']; ?> Marca: <?php echo $value['marca']; ?> Placa:
                                    <?php echo $value['placa']; ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">Sin Datos</option>
                        <?php endif; ?>
                    </select>
                </div>
                <!--end::Col-->
                <div class="col-lg-2 d-flex justify-content-end" >
                    <a id="enviar4" class="btn btn-sm btn-light btn-active-primary"  data-bs-toggle="tooltip" title="Imprimir" >
                        <i class="fas fa-print"></i>
                        </a>
                </div>
            </div>
            <span id="automovilErrorEdit" style="color: red;"></span>



            <!--end::Input group-->
            <div class="drag-container"></div>
            <div class="board">
                <div class="board-column todo">
                    <div class="board-column-container">
                        <div class="board-column-header">Estudiantes</div>
                        <div class="board-column-content-wrapper">
                            <div class="board-column-content">
                                <?php if (!empty($datosEstudiante)): ?>
                                    <?php foreach ($datosEstudiante as $estudiante): ?>
                                        <div class="board-item" id="<?php echo $estudiante['id']; ?>">
                                            <div class="board-item-content symbol symbol-45px me-5">
                                                <img src="uploads/Estudiante/<?php echo $estudiante['imagenestudiante']; ?>"
                                                    alt="">
                                                <span><?php echo $estudiante['nombre']; ?></span>
                                                <span><?php echo $estudiante['apellido']; ?></span><br>
                                                <span> Padre: <?php echo $estudiante['nombretutor']; ?></span>
                                                <span><?php echo $estudiante['apellidotutor']; ?></span><br>
                                                <span> Telefono: <?php echo $estudiante['telefonotutor']; ?></span>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p>No hay datos de estudiantes para mostrar.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="board-column working">
                    <div class="board-column-container">
                        <div class="board-column-header">Excluir</div>
                        <div class="board-column-content-wrapper">
                            <div class="board-column-content">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="board-column done">
                    <div class="board-column-container">
                        <div class="board-column-header">
                            <button class="btn btn-primary " id="saveDoneItems">Enviar</button>
                        </div>
                        <div class="board-column-content-wrapper">
                            <div class="board-column-content">

                            </div>
                        </div>
                    </div>
                </div>
            </div>

           
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</div>
<!--end::Container-->