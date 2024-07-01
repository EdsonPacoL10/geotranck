<?php

namespace App\Controllers;

use App\Models\GestionEstudiantesAutos;
use App\Models\GestionTransporteModel;
use App\Models\GestionUsuarioModel;

/************************************************
 * Controlador de vista gestion de transporte
 *************************************************/

class GestionTransporteController extends BaseController
{
    /************************************************
     * Controlador de vista de Conductores
     *************************************************/
    public function ConductoresView()
    {
        $Model = new GestionEstudiantesAutos();
        $NroMensajes = $Model->NroAlerta();
        $session = session();
        $data = [
            "titulo" => "Gestion de Conductores",
            "titulo1" => "Conductor",
            "id_perfil" => $session->get('id_perfil'),
            "foto_perfil" => $session->get('foto_perfil'),
            "Correo_perfil" => $session->get('Correo_perfil'),
            "nombre" => $session->get('nombre'),
            "apellido" => $session->get('apellido'),
            "ci" => $session->get('ci'),
            "rolnombre" => $session->get('rolnombre'),
            "telefono" => $session->get('telefono'),
            "direccion" => $session->get('direccion'),

        ];
        $data1 = [
            "activeC" => "activeC",
            "activeA" => "",
            "eliminar" => $session->get('eliminar'),
            "editar" => $session->get('editar'),
            "agregar" => $session->get('agregar'),
            "administrador" => $session->get('administrador'),
            "NroMensajes" => $NroMensajes,
        ];

        return view('2_Administrador/1_begin_page_view.php') .
            view('2_Administrador/2_head_page_view.php') .
            view('2_Administrador/3_theme_page_view.php') .
            view('5_Transporte/1_transporte/3_aside_page_view.php', $data1) .
            view('2_Administrador/5_header_page_view.php', $data) .
            view('5_Transporte/1_transporte/1_ConductorPageView.php', $data1) .
            view('2_Administrador/7_footer_page_view.php') .
            view('2_Administrador/8_drawers_page_view.php') .
            view('2_Administrador/9_models_page_view.php') .
            view('2_Administrador/10_script_page_view.php') .
            view('2_Administrador/11_end_page_view.php');
    }
    //ver datos Conductor
    public function datosConductorView()
    {
        $ConductorModel = new GestionTransporteModel();
        $datos = $ConductorModel->obtener_datos();
        $columnas = [
            'id' => true,
            'nombre' => true,
            'apellido' => true,
            'ci' => true,
            'numlicencia' => true,
            'fechalicencia' => true,
            'licencia' => true,
            'catlic' => true,
            'correoelectronico' => true,
            'telefono' => true,
            'direccion' => true,
            'cargo' => true,
            'genero' => true,
            'fechainiciocontrato' => true,
            'fechafincontrato' => true,
            'created_at' => true,
            'Actions' => true,
        ];
        $this->datatables(json_encode($datos, true), $columnas);
    }
    public function ExtracionConductorView()
    {
        $conductorModel = new GestionTransporteModel();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $datos = $conductorModel->extracion_Datos_Conductor($id);
            echo json_encode($datos);
        } else {
            http_response_code(405); // Método no permitido
            echo json_encode(array("error" => "Método no permitido"));
        }
    }
    //Agregar conductor
    public function AgregarConductor()
    {
        // Recibe los datos del formulario
        $request = service('request');
        $nombreConductor = $request->getPost('nombreConductor');
        $apellidoConductor = $request->getPost('apellidoConductor');
        $cedulaIdentidad = $request->getPost('cedulaIdentidad');
        $numeroLicencia = $request->getPost('numeroLicencia');
        $fechalicenciaFormat = $request->getPost('fechalicenciaFormat');
        $licenciaCheckbox = $request->getPost('licenciaCheckbox');
        $valorRadioCatLic = $request->getPost('valorRadioCatLic');
        $correoElectronicoConductor = $request->getPost('correoElectronicoConductor');
        $NroConductor = $request->getPost('NroConductor');
        $direccionConductor = $request->getPost('direccionConductor');
        $CargoConductor = $request->getPost('CargoConductor');
        $generoConductor = $request->getPost('generoConductor');
        $fechainicoFormat = $request->getPost('fechainicoFormat');
        $fechafinFormat = $request->getPost('fechafinFormat');

        $data = [
            'nombre' => $nombreConductor,
            'apellido' => $apellidoConductor,
            'ci' => $cedulaIdentidad,
            'numlicencia' => $numeroLicencia,
            'fechalicencia' => $fechalicenciaFormat,
            'licencia' => $licenciaCheckbox,
            'catlic' => $valorRadioCatLic,
            'correoelectronico' => $correoElectronicoConductor,
            'telefono' => $NroConductor,
            'direccion' => $direccionConductor,
            'cargo' => $CargoConductor,
            'genero' => $generoConductor,
            'fechainiciocontrato' => $fechainicoFormat,
            'fechafincontrato' => $fechafinFormat,
            'estado' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $ConductorModel = new GestionTransporteModel();
        $ConductorModel->insertar_Conducto($data);
        $response = array('success' => true, 'message' => 'Inicio de sesión exitoso.');
        // $response = array('success' => false, 'message' => 'Correo electrónico o contraseña incorrectos.');
        // Devolver la respuesta en formato JSON
        return $this->response->setJSON($response);

    }
    //editar conductor
    public function editarConductor()
    {
        // Recibe los datos del formulario
        $request = service('request');
        $id = $request->getPost('id');
        $nombreConductor = $request->getPost('nombreConductor');
        $apellidoConductor = $request->getPost('apellidoConductor');
        $cedulaIdentidad = $request->getPost('cedulaIdentidad');
        $numeroLicencia = $request->getPost('numeroLicencia');
        $fechalicenciaFormat = $request->getPost('fechalicenciaFormat');
        $licenciaCheckbox = $request->getPost('licenciaCheckbox');
        $valorRadioCatLic = $request->getPost('valorRadioCatLic');
        $correoElectronicoConductor = $request->getPost('correoElectronicoConductor');
        $NroConductor = $request->getPost('NroConductor');
        $direccionConductor = $request->getPost('direccionConductor');
        $CargoConductor = $request->getPost('CargoConductor');
        $generoConductor = $request->getPost('generoConductor');
        $fechainicoFormat = $request->getPost('fechainicoFormat');
        $fechafinFormat = $request->getPost('fechafinFormat');

        $data = [
            'nombre' => $nombreConductor,
            'apellido' => $apellidoConductor,
            'ci' => $cedulaIdentidad,
            'numlicencia' => $numeroLicencia,
            'fechalicencia' => $fechalicenciaFormat,
            'licencia' => $licenciaCheckbox,
            'catlic' => $valorRadioCatLic,
            'correoelectronico' => $correoElectronicoConductor,
            'telefono' => $NroConductor,
            'direccion' => $direccionConductor,
            'cargo' => $CargoConductor,
            'genero' => $generoConductor,
            'fechainiciocontrato' => $fechainicoFormat,
            'fechafincontrato' => $fechafinFormat,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $ConductorModel = new GestionTransporteModel();
        $ConductorModel->actualizar_conductor($id, $data);
        $response = array('success' => true, 'message' => 'Inicio de sesión exitoso.');
        // $response = array('success' => false, 'message' => 'Correo electrónico o contraseña incorrectos.');
        // Devolver la respuesta en formato JSON
        return $this->response->setJSON($response);

    }
    //eliminar conductor
    public function eliminarConductor()
    {
        $request = service('request');
        $id = $request->getPost('id');
        $nombre = $request->getPost('nombre');
        $adminstracionModel = new GestionTransporteModel();
        $adminstracionModel->eliminar_conductor($id);
        $response = array('success' => true, 'message' => 'Eliminado con exito el grupo ' . $nombre);
        return $this->response->setJSON($response);
    }

    /************************************************
     * Controlador de vista de Automovil
     *************************************************/
    public function AutomovilView()
    {
        $Model = new GestionEstudiantesAutos();
        $NroMensajes = $Model->NroAlerta();
        $session = session();
        $data = [
            "titulo" => "Gestion de Automiviles",
            "titulo1" => "Automovil",
            "id_perfil" => $session->get('id_perfil'),
            "foto_perfil" => $session->get('foto_perfil'),
            "Correo_perfil" => $session->get('Correo_perfil'),
            "nombre" => $session->get('nombre'),
            "apellido" => $session->get('apellido'),
            "ci" => $session->get('ci'),
            "telefono" => $session->get('telefono'),
            "direccion" => $session->get('direccion'),
            "rolnombre" => $session->get('rolnombre'),
            "eliminar" => $session->get('eliminar'),
            "editar" => $session->get('editar'),
            "agregar" => $session->get('agregar'),
            "administrador" => $session->get('administrador')
        ];
        $data1 = [
            "activeC" => "",
            "activeA" => "activeA",
            "NroMensajes" => $NroMensajes,
        ];
        $ConductorModel = new GestionTransporteModel();
        $datosConductor = $ConductorModel->obtener_datos_conductor();
        $conductor = [
            "datos" => $datosConductor,
            "eliminar" => $session->get('eliminar'),
            "editar" => $session->get('editar'),
            "agregar" => $session->get('agregar'),
            "administrador" => $session->get('administrador'),
            
        ];
        return view('2_Administrador/1_begin_page_view.php') .
            view('2_Administrador/2_head_page_view.php') .
            view('2_Administrador/3_theme_page_view.php') .
            view('5_Transporte/1_transporte/3_aside_page_view.php', $data1) .
            view('2_Administrador/5_header_page_view.php', $data) .
            view('5_Transporte/1_transporte/2_AutomovilPageView.php', $conductor) .
            view('2_Administrador/7_footer_page_view.php') .
            view('2_Administrador/8_drawers_page_view.php') .
            view('2_Administrador/9_models_page_view.php') .
            view('2_Administrador/10_script_page_view.php') .
            view('2_Administrador/11_end_page_view.php');
    }
    //agregar automovil
    public function agregarAutomivil()
    {
        $request = service('request');
        // Validar la imagen
        if ($request->getFile('avatarAutomovil')->isValid() || $request->getFile('avatarConductor')->isValid()) {
            $avatar = $request->getFile('avatarAutomovil');
            $avatar->move(ROOTPATH . 'public/uploads/Automoviles/'); // Ruta donde deseas guardar la imagen
            $rutaAvatar = $avatar->getName();
            $avatar1 = $request->getFile('avatarConductor');
            $avatar1->move(ROOTPATH . 'public/uploads/Conductores/'); // Ruta donde deseas guardar la imagen
            $rutaAvatar1 = $avatar1->getName();
            $marca = $request->getPost('marca');
            $modelo = $request->getPost('modelo');
            $nroPasajero = $request->getPost('nroPasajero');
            $conductoAutomovil = $request->getPost('conductoAutomovil');
            $nroChasis = $request->getPost('nroChasis');
            $soatCheckbox = $request->getPost('soatCheckbox');
            $añoSoat = $request->getPost('añoSoat');
            $inspeccionCheckbox = $request->getPost('inspeccionCheckbox');
            $color = $request->getPost('color');
            $placa = $request->getPost('placa');
            $dueñoAutomovil = $request->getPost('dueñoAutomovil');
            $telefono = $request->getPost('telefono');
            $tipo = $request->getPost('tipo');

            $data = [
                'conductorid' => $conductoAutomovil,
                'imagenautomovil' => $rutaAvatar,
                'imagenconductor' => $rutaAvatar1,
                'marca' => $marca,
                'modelo' => $modelo,
                'nropasajeros' => $nroPasajero,
                'nrochasis' => $nroChasis,
                'soat' => $soatCheckbox,
                'a_soat' => $añoSoat,
                'inspeccion' => $inspeccionCheckbox,
                'color' => $color,
                'placa' => $placa,
                'duenomovil' => $dueñoAutomovil,
                'nrotelefono' => $telefono,
                'tipovehiculo' => $tipo,
                'estado' => 1,
                'created_at' => date('Y-m-d H:i:s'), // Fecha y hora actual
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $automovilModel = new GestionTransporteModel();
            $automovilModel->insertar_automovil($data);

        } else {
            // Manejar error de imagen no válida
            return $this->response->setStatusCode(400)->setJSON(['success' => false, 'message' => 'Error al subir la imagen y guardado de datos']);
        }

        return $this->response->setJSON(['success' => true, 'message' => 'Datos guardados correctamente']);
    }
    //datos para tabla automovil
    public function DatosAutomovilView()
    {
        $automovilModel = new GestionTransporteModel();
        $datos = $automovilModel->datos_automoviles();
        $columnas = [
            'id' => true,
            'nombreconductor' => true,
            'apellidoconductor' => true,
            'imagenautomovil' => true,
            'imagenconductor' => true,
            'marca' => true,
            'placa' => true,
            'modelo' => true,
            'color' => true,
            'tipovehiculo' => true,
            'nropasajeros' => true,
            'nrochasis' => true,
            'soat' => true,
            'a_soat' => true,
            'inspeccion' => true,
            'duenomovil' => true,
            'nrotelefono' => true,
            'created_at' => true,
        ];
        $this->datatables(json_encode($datos, true), $columnas);
    }
    //eliminar automovil
    public function eliminarAutomovil()
    {
        $request = service('request');
        $id = $request->getPost('id');
        $modelo = $request->getPost('modelo');
        $automovilModel = new GestionTransporteModel();
        $automovilModel->eliminar_automovil($id);
        $response = array('success' => true, 'message' => 'Eliminado con exito el vehiculo de modelo: ' . $modelo);
        return $this->response->setJSON($response);
    }
    //extraer datos del vehiculo
    public function ExtracionAutomovilView()
    {
        $conductorModel = new GestionTransporteModel();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $datos = $conductorModel->extracion_Datos_Vehiculo($id);
            echo json_encode($datos);
        } else {
            http_response_code(405); // Método no permitido
            echo json_encode(array("error" => "Método no permitido"));
        }
    }
    //agregar automovil
    public function actualizarAutomivil()
    {
        $request = service('request');

        // Validar la imagen
        if ($request->getFile('avatarAutomovil')->isValid() || $request->getFile('avatarConductor')->isValid()) {
            $id = $request->getPost('id');
            $avatar = $request->getFile('avatarAutomovil');
            $avatar->move(ROOTPATH . 'public/uploads/Automoviles/'); // Ruta donde deseas guardar la imagen
            $rutaAvatar = $avatar->getName();
            $avatar1 = $request->getFile('avatarConductor');
            $avatar1->move(ROOTPATH . 'public/uploads/Conductores/'); // Ruta donde deseas guardar la imagen
            $rutaAvatar1 = $avatar1->getName();
            $marca = $request->getPost('marca');
            $modelo = $request->getPost('modelo');
            $nroPasajero = $request->getPost('nroPasajero');
            $conductoAutomovil = $request->getPost('conductoAutomovil');
            $nroChasis = $request->getPost('nroChasis');
            $soatCheckbox = $request->getPost('soatCheckbox');
            $añoSoat = $request->getPost('añoSoat');
            $inspeccionCheckbox = $request->getPost('inspeccionCheckbox');
            $color = $request->getPost('color');
            $placa = $request->getPost('placa');
            $dueñoAutomovil = $request->getPost('dueñoAutomovil');
            $telefono = $request->getPost('telefono');
            $tipo = $request->getPost('tipo');

            $data = [
                'conductorid' => $conductoAutomovil,
                'imagenautomovil' => $rutaAvatar,
                'imagenconductor' => $rutaAvatar1,
                'marca' => $marca,
                'modelo' => $modelo,
                'nropasajeros' => $nroPasajero,
                'nrochasis' => $nroChasis,
                'soat' => $soatCheckbox,
                'a_soat' => $añoSoat,
                'inspeccion' => $inspeccionCheckbox,
                'color' => $color,
                'placa' => $placa,
                'duenomovil' => $dueñoAutomovil,
                'nrotelefono' => $telefono,
                'tipovehiculo' => $tipo,
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $automovilModel = new GestionTransporteModel();
            $automovilModel->actualiza_vehiculo($id, $data);

        } else {
            // Manejar error de imagen no válida
            return $this->response->setStatusCode(400)->setJSON(['success' => false, 'message' => 'Error al subir la imagen y guardado de datos']);
        }

        return $this->response->setJSON(['success' => true, 'message' => 'Datos guardados correctamente']);
    }

    /************************************************
     * Controlador de sector telefonico 
     *************************************************/
    public function TelefoniaView()
    {
        $Model = new GestionEstudiantesAutos();
        $NroMensajes = $Model->NroAlerta();
        $session = session();
        $data = [
            "titulo" => "Gestion de Telefonos y Direcciones",
            "titulo1" => "Telefonos",
             "id_perfil" => $session->get('id_perfil'),
            "foto_perfil" => $session->get('foto_perfil'),
            "Correo_perfil" => $session->get('Correo_perfil'),
            "nombre" => $session->get('nombre'),
            "apellido" => $session->get('apellido'),
            "rolnombre" => $session->get('rolnombre'),
        ];
        $data1 = [
            "activeT" => "activeT",
            "eliminar" => $session->get('eliminar'),
            "editar" => $session->get('editar'),
            "agregar" => $session->get('agregar'),
            "administrador" => $session->get('administrador'),
        ];
        $usuario=$session->get('rolnombre');
        if ($usuario=='Administrador') {
            $data1 = [
                "activeT" => "activeT",
                "eliminar" => $session->get('eliminar'),
                "editar" => $session->get('editar'),
                "agregar" => $session->get('agregar'),
                "administrador" => $session->get('administrador'),
                "NroMensajes" => $NroMensajes,
            ];
       $pagina='3_aside_page_view.php';
        }elseif ($usuario=='PadreFamilia') {
            $pagina='3_aside_page_viewPadre.php';
        }elseif ($usuario=='Conductor') {
            $pagina='3_aside_page_viewCon.php';
        }
        return view('2_Administrador/1_begin_page_view.php') .
            view('2_Administrador/2_head_page_view.php') .
            view('2_Administrador/3_theme_page_view.php') .
            view('5_Transporte/2_InformacionContactos/'.$pagina, $data1) .
            view('2_Administrador/5_header_page_view.php', $data) .
            view('5_Transporte/2_InformacionContactos/1_TelefonoPageView.php',$data1) .
            view('2_Administrador/7_footer_page_view.php') .
            view('2_Administrador/8_drawers_page_view.php') .
            view('2_Administrador/9_models_page_view.php') .
            view('2_Administrador/10_script_page_view.php') .
            view('2_Administrador/11_end_page_view.php');
    }
    //agregar telefono
    public function agregarTelefono()
    {
        $request = service('request');
        // Validar la imagen
        $nombre = $request->getPost('nombre');
        $cargo = $request->getPost('cargo');
        $correoElectronico = $request->getPost('correoElectronico');
        $numeroTelefonico = $request->getPost('numeroTelefonico');
        $direccionDomicilio = $request->getPost('direccionDomicilio');

        $data = [
            'nombre' => $nombre,
            'cargo' => $cargo,
            'correoelectronico' => $correoElectronico,
            'telefono' => $numeroTelefonico,
            'direccion' => $direccionDomicilio,
            'estado' => 1,
            'created_at' => date('Y-m-d H:i:s'), // Fecha y hora actual
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $automovilModel = new GestionTransporteModel();
        $automovilModel->insertar_telefono($data);

        return $this->response->setJSON(['success' => true, 'message' => 'Datos guardados correctamente']);
    }
    //datos para tabla telefono
    public function DatosTelefonoView()
    {
        $automovilModel = new GestionTransporteModel();
        $datos = $automovilModel->datos_telefonos();
        $columnas = [

            'id' => true,
            'nombre' => true,
            'cargo' => true,
            'correoelectronico' => true,
            'telefono' => true,
            'direccion' => true,
            'estado' => true,
            'created_at' => true,
        ];
        $this->datatables(json_encode($datos, true), $columnas);
    }
    //eliminar telefono
    public function eliminarTelefono()
    {
        $request = service('request');
        $id = $request->getPost('id');
        $nombre = $request->getPost('nombre');
        $automovilModel = new GestionTransporteModel();
        $automovilModel->eliminar_telefono($id);
        $response = array('success' => true, 'message' => 'Eliminado con exito el vehiculo de modelo: ' . $nombre);
        return $this->response->setJSON($response);
    }
    //extraer datos del telefono
    public function ExtracionTelefonoView()
    {
        $conductorModel = new GestionTransporteModel();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $datos = $conductorModel->extracion_Datos_Telefono($id);
            echo json_encode($datos);
        } else {
            http_response_code(405); // Método no permitido
            echo json_encode(array("error" => "Método no permitido"));
        }
    }
    //actualizar telefono
    public function actualizarTelefono()
    {
        $request = service('request');
        $id = $request->getPost('id');
        $nombre = $request->getPost('nombre');
        $cargo = $request->getPost('cargo');
        $correoElectronico = $request->getPost('correoElectronico');
        $numeroTelefonico = $request->getPost('numeroTelefonico');
        $direccionDomicilio = $request->getPost('direccionDomicilio');

        $data = [
            'nombre' => $nombre,
            'cargo' => $cargo,
            'correoelectronico' => $correoElectronico,
            'telefono' => $numeroTelefonico,
            'direccion' => $direccionDomicilio,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $automovilModel = new GestionTransporteModel();
        $automovilModel->actualiza_telefono($id, $data);

        return $this->response->setJSON(['success' => true, 'message' => 'Datos guardados correctamente']);
    }



    //datatables tools
    public function datatables($datos, $columnas)
    {
        //echo base_url();
        require_once (FCPATH . 'recursos/libreria/datatables/server.php');

        $columnsDefault = $columnas;

        if (isset($_REQUEST['columnsDef']) && is_array($_REQUEST['columnsDef'])) {
            $columnsDefault = [];
            foreach ($_REQUEST['columnsDef'] as $field) {
                $columnsDefault[$field] = true;
            }
        }

        // get all raw data
        $alldata = json_decode($datos, true);
        //var_dump ($alldata);
        $data = [];
        // internal use; filter selected columns only from raw data
        foreach ($alldata as $d) {
            $data[] = filterArray($d, $columnsDefault);
            //echo $d;
        }

        //var_dump($data);

        // count data
        $totalRecords = $totalDisplay = count($data);

        // filter by general search keyword
        if (isset($_REQUEST['search'])) {
            $data = filterKeyword($data, $_REQUEST['search']);
            $totalDisplay = count($data);
        }



        if (isset($_REQUEST['columns']) && is_array($_REQUEST['columns'])) {
            foreach ($_REQUEST['columns'] as $column) {
                if (isset($column['search'])) {
                    $data = filterKeyword($data, $column['search'], $column['data']);
                    $totalDisplay = count($data);
                }
            }
        }
        // sort
        if (isset($_REQUEST['order'][0]['column']) && $_REQUEST['order'][0]['dir']) {
            $column = $_REQUEST['order'][0]['column'];
            $dir = $_REQUEST['order'][0]['dir'];
            usort($data, function ($a, $b) use ($column, $dir) {
                $a = array_slice($a, $column, 1);
                $b = array_slice($b, $column, 1);
                $a = array_pop($a);
                $b = array_pop($b);

                if ($dir === 'asc') {
                    return $a > $b ? true : false;
                }

                return $a < $b ? true : false;
            });
        }
        // pagination length
        if (isset($_REQUEST['length'])) {
            $data = array_splice($data, $_REQUEST['start'], $_REQUEST['length']);
        }
        // return array values only without the keys
        if (isset($_REQUEST['array_values']) && $_REQUEST['array_values']) {
            $tmp = $data;
            $data = [];
            foreach ($tmp as $d) {
                $data[] = array_values($d);
            }
        }
        $result = [
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalDisplay,
            'data' => $data,
        ];

        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
        echo json_encode($result, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
    //   public function crear_carpeta_almacenes($id)
    //   {
    //       $path = "recursos/qr/" . $id;

    //       if (!file_exists($path)) {
    //           mkdir($path, 0777, true);
    //       }
    //       return $path;
    //   }

    //   public function diferencia_dias($fecha)
    //   {
    //       $fechaActual = date('Y-m-d');
    //       $datetime1 = date_create($fecha);
    //       $datetime2 = date_create($fechaActual);
    //       $contador = date_diff($datetime1, $datetime2);
    //       $differenceFormat = '%a';
    //       $contador->format($differenceFormat);
    //       return $contador->format($differenceFormat) . " Dias Retraso";
    //   }
}
/* End of file Parametro_controller.php */
/* Location: ./application/controllers/Parametro_controller.php */


