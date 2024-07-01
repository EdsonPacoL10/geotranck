<?php

namespace App\Controllers;

use App\Models\GestionEstudianteModel;
use App\Models\GestionEstudiantesAutos;
use App\Models\GestionUsuarioModel;
use App\Models\GestionUsuarioPadreModel;

/************************************************
 * Controlador de vista gestion de usuarios
 *************************************************/

class GestionUsuarioController extends BaseController
{
    /************************************************
     * Controlador de vista rol y privilegio
     *************************************************/
    //vista privilegios
    public function PrivilegioView()
    {
        $Model = new GestionEstudiantesAutos();
        $NroMensajes = $Model->NroAlerta();
       
        $session = session();
        $data = [
            "titulo" => "Gestion de privilegios",
            "titulo1" => "Privilegios",
            "foto_perfil" => $session->get('foto_perfil'),
            "Correo_perfil" => $session->get('Correo_perfil'),
            "nombre" => $session->get('nombre'),
            "apellido" => $session->get('apellido'),
            "rolnombre" => $session->get('rolnombre'),
        ];
        $data1 = [
            "activeP" => "activeP",
            "activeR" => "",
            "activePer" => "",
            "eliminar" => $session->get('eliminar'),
            "editar" => $session->get('editar'),
            "agregar" => $session->get('agregar'),
            "administrador" => $session->get('administrador'),
            "NroMensajes" => $NroMensajes,
        ];
        

        return view('2_Administrador/1_begin_page_view.php') .
            view('2_Administrador/2_head_page_view.php') .
            view('2_Administrador/3_theme_page_view.php') .
            view('4_Usuario/1_RolPrivilegios/4_aside_page_view.php', $data1) .
            view('2_Administrador/5_header_page_view.php', $data) .
            view('4_Usuario/1_RolPrivilegios/1_PrivilegioPageView.php', $data1) .
            view('2_Administrador/7_footer_page_view.php') .
            view('2_Administrador/8_drawers_page_view.php') .
            view('2_Administrador/9_models_page_view.php') .
            view('2_Administrador/10_script_page_view.php') .
            view('2_Administrador/11_end_page_view.php');
    }
    //vista de privilegios
    public function DatosPrivilegioView1()
    {
        // Simulación de una base de datos con usuarios
        $privilegioModel = new GestionUsuarioModel();
        $datos = $privilegioModel->obtener_datos();

        $columnas = [
            'id' => true,
            'nombre' => true,
            'descripcion' => true,
            'administrador' => true,
            'agregar' => true,
            'modificar' => true,
            'eliminar' => true,
            'created_at' => true,

        ];
        $this->datatables(json_encode($datos, true), $columnas);
    }
    public function AgregarDatosPrivilegioView()
    {
        // Recibe los datos del formulario
        $request = service('request');
        $nombreGrupo = $request->getPost('nombreGrupo');
        $descripcionGrupo = $request->getPost('descripcionGrupo');
        $administrador = $request->getPost('administrador');
        $privilegioAgregar = $request->getPost('privilegioAgregar');
        $privilegioModificar = $request->getPost('privilegioModificar');
        $privilegioEliminar = $request->getPost('privilegioEliminar');
        //creacion del data
        $data = [
            'nombre' => $nombreGrupo,
            'descripcion' => $descripcionGrupo,
            'administrador' => $administrador,
            'agregar' => $privilegioAgregar,
            'modificar' => $privilegioModificar,
            'eliminar' => $privilegioEliminar,
            'estado' => 1,
            'created_at' => date('Y-m-d H:i:s'), // Fecha y hora actual
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $privilegioModel = new GestionUsuarioModel();
        $privilegioModel->insertar_privilegio($data);

        $response = array('success' => true, 'message' => 'Inicio de sesión exitoso.');
        // $response = array('success' => false, 'message' => 'Correo electrónico o contraseña incorrectos.');
        // Devolver la respuesta en formato JSON
        return $this->response->setJSON($response);
    }
    //elimanar privilegios
    public function elimanar_privilegio()
    {
        $request = service('request');
        $id = $request->getPost('id');
        $nombre = $request->getPost('nombre');
        $privilegioModel = new GestionUsuarioModel();
        $privilegioModel->eliminar_privilegio($id);
        $response = array('success' => true, 'message' => 'Eliminado con exito el grupo ' . $nombre);
        return $this->response->setJSON($response);

    }
    public function editar_privilegio()
    {
        $request = service('request');
        $id = $request->getPost('id');
        $editNombre = $request->getPost('editNombre');
        $editDescripcion = $request->getPost('editDescripcion');
        $administradorEdit = $request->getPost('administradorEdit');
        $privilegioAgregarEdit = $request->getPost('privilegioAgregarEdit');
        $privilegioModificarEdit = $request->getPost('privilegioModificarEdit');
        $privilegioEliminarEdit = $request->getPost('privilegioEliminarEdit');
        //creacion del data
        $data = [
            'nombre' => $editNombre,
            'descripcion' => $editDescripcion,
            'administrador' => $administradorEdit,
            'agregar' => $privilegioAgregarEdit,
            'modificar' => $privilegioModificarEdit,
            'eliminar' => $privilegioEliminarEdit,
            'estado' => 1,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $privilegioModel = new GestionUsuarioModel();
        $privilegioModel->actualizar_privilegios($id, $data);
        $response = array('success' => true, 'message' => 'Grupo de nombre: ' . $editNombre . ' modificado exitosamente');
        return $this->response->setJSON($response);
    }
    /********************************************************************************************************************
     *  VISTA DE ROLES
     ********************************************************************************************************************/
    public function RolesView()
    {
        $session = session();
        $Model = new GestionEstudiantesAutos();
        $NroMensajes = $Model->NroAlerta();
       
        $data = [
            "titulo" => "Gestion de roles",
            "titulo1" => "Roles",
            "foto_perfil" => $session->get('foto_perfil'),
            "Correo_perfil" => $session->get('Correo_perfil'),
            "nombre" => $session->get('nombre'),
            "apellido" => $session->get('apellido'),
            "rolnombre" => $session->get('rolnombre'),
        ];
        $data1 = [
            "activeP" => "",
            "activeR" => "activeR",
            "activePer" => "",
            "NroMensajes" => $NroMensajes,
        ];
        $privilegioModel = new GestionUsuarioModel();
        $datos = $privilegioModel->obtener_datos();
        $privilegio = [
            "datos" => $datos,
            "eliminar" => $session->get('eliminar'),
            "editar" => $session->get('editar'),
            "agregar" => $session->get('agregar'),
            "administrador" => $session->get('administrador')
        ];
        return view('2_Administrador/1_begin_page_view.php') .
            view('2_Administrador/2_head_page_view.php') .
            view('2_Administrador/3_theme_page_view.php') .
            view('4_Usuario/1_RolPrivilegios/4_aside_page_view.php', $data1) .
            view('2_Administrador/5_header_page_view.php', $data) .
            view('4_Usuario/1_RolPrivilegios/2_RolePageView.php', $privilegio) .
            view('2_Administrador/7_footer_page_view.php') .
            view('2_Administrador/8_drawers_page_view.php') .
            view('2_Administrador/9_models_page_view.php') .
            view('2_Administrador/10_script_page_view.php') .
            view('2_Administrador/11_end_page_view.php');
    }
    //vista de datos
    public function DatosRolesView()
    {
        $rolModel = new GestionUsuarioModel();
        $datos = $rolModel->obtener_datos_rol();
        $columnas = [
            'id' => true,
            'nombre' => true,
            'descripcion' => true,
            'grupo_privilegio' => true,
            'created_at' => true,
        ];
        $this->datatables(json_encode($datos, true), $columnas);
    }
    //agregar rol
    public function agregar_rol()
    {
        // Recibe los datos del formulario
        $request = service('request');
        $nombreRol = $request->getPost('nombreRol');
        $descripcionRol = $request->getPost('descripcionRol');
        $grupoPrivilegio = $request->getPost('grupoPrivilegio');
        //creacion del data
        $data = [
            'nombre' => $nombreRol,
            'descripcion' => $descripcionRol,
            'grupo_privilegio' => $grupoPrivilegio,
            'estado' => 1,
            'created_at' => date('Y-m-d H:i:s'), // Fecha y hora actual
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $rolModel = new GestionUsuarioModel();
        $rolModel->insertar_rol($data);

        $response = array('success' => true, 'message' => 'Inicio de sesión exitoso.');
        // $response = array('success' => false, 'message' => 'Correo electrónico o contraseña incorrectos.');
        // Devolver la respuesta en formato JSON
        return $this->response->setJSON($response);

    }
    //modificar rol
    public function editar_rol()
    {
        $request = service('request');
        $id = $request->getPost('id');
        $editNombreRol = $request->getPost('editNombreRol');
        $editDescripcionRol = $request->getPost('editDescripcionRol');
        $editGrupoPrivilegio = $request->getPost('editGrupoPrivilegio');
        //creacion del data
        $data = [
            'nombre' => $editNombreRol,
            'descripcion' => $editDescripcionRol,
            'grupo_privilegio' => $editGrupoPrivilegio,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $privilegioModel = new GestionUsuarioModel();
        $privilegioModel->actualizar_rol($id, $data);
        $response = array('success' => true, 'message' => 'Rol de nombre: ' . $editNombreRol . ' modificado exitosamente');
        return $this->response->setJSON($response);
    }
    //eliminacion de rol
    public function eliminar_rol()
    {
        $request = service('request');
        $id = $request->getPost('id');
        $nombre = $request->getPost('nombre');
        $rolModel = new GestionUsuarioModel();
        $rolModel->eliminar_rol($id);
        $response = array('success' => true, 'message' => 'Eliminado con exito el grupo ' . $nombre);
        return $this->response->setJSON($response);
    }

    /**********************************************************************************************
     * Controlador de vista de usuarios ESTUDIANTES, PADRES Y CONDUCTORES
     **********************************************************************************************/
    public function EstudianteView()
    {
        $Model = new GestionEstudiantesAutos();
        $NroMensajes = $Model->NroAlerta();
        $session = session();
        $data = [
            "titulo" => "Gestion de estudiantes",
            "titulo1" => "Estudiante",
            "foto_perfil" => $session->get('foto_perfil'),
            "Correo_perfil" => $session->get('Correo_perfil'),
            "nombre" => $session->get('nombre'),
            "apellido" => $session->get('apellido'),
            "rolnombre" => $session->get('rolnombre'),
        ];
        $data1 = [
            "activeE" => "activeE",
            "activeP" => "",
            "activeA" => "",
            "NroMensajes" => $NroMensajes,
        ];
        $tutorModel = new GestionEstudianteModel();
        $datostutor = $tutorModel->obtener_datos_tutor();
        $automovilModel = new GestionEstudianteModel();
        $datosautomovil = $automovilModel->obtener_datos_automovil_dispositivo();
        $nroestudiante = $automovilModel->numeroEstudiantes();
        $nroautomovil = $automovilModel->numeroautomovil();
        
        $datos = [
            "tutor" => $datostutor,
            "automovil" => $datosautomovil,
            "nroestudiante" => $nroestudiante,
            "nroautomovil" => $nroautomovil,
            "eliminar" => $session->get('eliminar'),
            "editar" => $session->get('editar'),
            "agregar" => $session->get('agregar'),
            "administrador" => $session->get('administrador'),
        ];
        return view('2_Administrador/1_begin_page_view.php') .
            view('2_Administrador/2_head_page_view.php') .
            view('2_Administrador/3_theme_page_view.php') .
            view('4_Usuario/2_Usuario/4_aside_page_view.php', $data1) .
            view('2_Administrador/5_header_page_view.php', $data) .
            view('4_Usuario/2_Usuario/1_Estudiante.php', $datos) .
            view('2_Administrador/7_footer_page_view.php') .
            view('2_Administrador/8_drawers_page_view.php') .
            view('2_Administrador/9_models_page_view.php') .
            view('2_Administrador/10_script_page_view.php') .
            view('2_Administrador/11_end_page_view.php');
    }
    public function agregar_Estudiante()
    {
        $request = service('request');
        // Validar la imagen
        if ($request->getFile('avatarestudiante')->isValid()) {
            $avatar = $request->getFile('avatarestudiante');
            $avatar->move(ROOTPATH . 'public/uploads/Estudiante/');
            $rutaAvatar = $avatar->getName();

            $dataEstudiante = [
                'imagenestudiante' => $rutaAvatar,
                'nombre' => $request->getPost('nombre'),
                'apellido' => $request->getPost('apellido'),
                'ci' => $request->getPost('ci'),
                'telefono' => $request->getPost('telefono'),
                'edad' => $request->getPost('edad'),
                'genero' => $request->getPost('genero'),
                'curso' => $request->getPost('curso'),
                'fechainscripcion' => $request->getPost('fechainscripcion'),
                'fechanacimiento' => $request->getPost('fechanacimiento'),
                'tutor_id' => $request->getPost('tutor'),
                'automovil_id' => $request->getPost('automovil'),
                'rfid_id' => $request->getPost('rfid'),
                'codigo' => $request->getPost('codigo'),
                'estado' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'codigoestudiante' => substr(str_shuffle(bin2hex(random_bytes(3))), 0, 6)
            ];

            $automovilModel = new GestionEstudianteModel();
            $idEstudiante = $automovilModel->insertar_estudiante($dataEstudiante);

            $dataUbicacion = [
                'estudiante_id' => $idEstudiante,
                'tipo' => $request->getPost('tipo'),
                'descripcion' => $request->getPost('descripcion'),
                'avenida' => $request->getPost('avenida'),
                'puerta' => $request->getPost('puerta'),
                'latitud' => $request->getPost('latitud'),
                'longitud' => $request->getPost('longitud'),
                'estado' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $automovilModel->insertar_ubicacion($dataUbicacion);

        } else {
            // Manejar error de imagen no válida
            return $this->response->setStatusCode(400)->setJSON(['success' => false, 'message' => 'Error al subir la imagen y guardado de datos']);
        }

        return $this->response->setJSON(['success' => true, 'message' => 'Datos guardados correctamente']);
    }
    //vista de datos
    public function DatosEstudienteView()
    {
        $estudianteModel = new GestionEstudianteModel();
        $datos = $estudianteModel->obtener_datosEstudiante();

        $columnas = [
            'id' => true,
            'imagenestudiante' => true,
            'nombre' => true,
            'apellido' => true,
            'ci' => true,
            'telefono' => true,
            'edad' => true,
            'genero' => true,
            'curso' => true,
            'fechainscripcion' => true,
            'fechanacimiento' => true,
            'nombretutor' => true,
            'apellidotutor' => true,
            'placa' => true,
            'apellidoconductor' => true,
            'nombreconductor' => true,
            'telefonoconductor' => true,
            'created_at' => true,
            'codigoestudiante' => true,
        ];
        $this->datatables(json_encode($datos, true), $columnas);
    }
    public function eliminar_estudiante()
    {
        $request = service('request');
        $id = $request->getPost('id');
        $nombre = $request->getPost('nombre');
        $padreModel = new GestionEstudianteModel();
        $padreModel->eliminar_estudiante($id);
        $response = array('success' => true, 'message' => 'Eliminado con exito el grupo ' . $nombre);
        return $this->response->setJSON($response);
    }


    /**********************************************************************************************
     * vista padre
     **********************************************************************************************/
    public function PadreView()
    {
        $Model = new GestionEstudiantesAutos();
        $NroMensajes = $Model->NroAlerta();
        $session = session();
        $data = [
            "titulo" => "Gestion de Padres",
            "titulo1" => "Padre",
            "foto_perfil" => $session->get('foto_perfil'),
            "Correo_perfil" => $session->get('Correo_perfil'),
            "nombre" => $session->get('nombre'),
            "apellido" => $session->get('apellido'),
            "rolnombre" => $session->get('rolnombre'),
        ];
        $data1 = [
            "activeE" => "",
            "activeP" => "activeP",
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
            view('4_Usuario/2_Usuario/4_aside_page_view.php', $data1) .
            view('2_Administrador/5_header_page_view.php', $data) .
            view('4_Usuario/2_Usuario/2_Padre.php', $data1) .
            view('2_Administrador/7_footer_page_view.php') .
            view('2_Administrador/8_drawers_page_view.php') .
            view('2_Administrador/9_models_page_view.php') .
            view('2_Administrador/10_script_page_view.php') .
            view('2_Administrador/11_end_page_view.php');
    }
    //vista de datos
    public function DatosPadresView()
    {

        $padreModel = new GestionUsuarioPadreModel();
        $datos = $padreModel->obtener_datos();


        $columnas = [
            'id' => true,
            'nombretutor' => true,
            'apellidotutor' => true,
            'ci_tutor' => true,
            'telefonotutor' => true,
            'parentesco' => true,
            'correoelectronico' => true,
            'direccion' => true,
            'indicacionextra' => true,
            'created_at' => true,
            'codigopadre' => true,

        ];
        $this->datatables(json_encode($datos, true), $columnas);
    }
    //agregar rol
    public function agregar_Padres()
    {
        // Recibe los datos del formulario
        $request = service('request');

        $NombreTutor = $request->getPost('NombreTutor');
        $ApellidoTutor = $request->getPost('ApellidoTutor');
        $CedulaTutor = $request->getPost('CedulaTutor');
        $TelefonoTutor = $request->getPost('TelefonoTutor');
        $ParentescoTutor = $request->getPost('ParentescoTutor');
        $CorreoDatoAdicional = $request->getPost('CorreoDatoAdicional');
        $Direccion = $request->getPost('Direccion');
        $NumeroEmergencia = $request->getPost('NumeroEmergencia');
        $Extra = $request->getPost('Extra');
        $data = [
            'nombretutor' => $NombreTutor,
            'apellidotutor' => $ApellidoTutor,
            'ci_tutor' => $CedulaTutor,
            'telefonotutor' => $TelefonoTutor,
            'parentesco' => $ParentescoTutor,
            'correoelectronico' => $CorreoDatoAdicional,
            'direccion' => $Direccion,
            'numeroemergencia' => $NumeroEmergencia,
            'indicacionextra' => $Extra,
            'estado' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'codigopadre' => substr(str_shuffle(bin2hex(random_bytes(3))), 0, 6)
        ];

        $padreModel = new GestionUsuarioPadreModel();
        $padreModel->insertar_padres($data);

        $response = array('success' => true, 'message' => 'Inicio de sesión exitoso.');
        // $response = array('success' => false, 'message' => 'Correo electrónico o contraseña incorrectos.');
        // Devolver la respuesta en formato JSON
        return $this->response->setJSON($response);

    }
    //extraccion de datos
    public function ExtracionPadresView()
    {
        $padreModel = new GestionUsuarioPadreModel();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $datos = $padreModel->obtener_datos_edit($id);
            // Devolver la respuesta como JSON
            // header("Content-Type: application/json");
            echo json_encode($datos);
        } else {
            http_response_code(405); // Método no permitido
            echo json_encode(array("error" => "Método no permitido"));
        }
    }
    public function eliminar_padre()
    {
        $request = service('request');
        $id = $request->getPost('id');
        $nombre = $request->getPost('nombre');
        $padreModel = new GestionUsuarioPadreModel();
        $padreModel->eliminar_padre($id);
        $response = array('success' => true, 'message' => 'Eliminado con exito el grupo ' . $nombre);
        return $this->response->setJSON($response);
    }
    public function editar_Padres()
    {
        // Recibe los datos del formulario
        $request = service('request');
        $id = $request->getPost('id');
        $NombreTutor = $request->getPost('NombreTutor');
        $ApellidoTutor = $request->getPost('ApellidoTutor');
        $CedulaTutor = $request->getPost('CedulaTutor');
        $TelefonoTutor = $request->getPost('TelefonoTutor');
        $ParentescoTutor = $request->getPost('ParentescoTutor');
        $CorreoDatoAdicional = $request->getPost('CorreoDatoAdicional');
        $Direccion = $request->getPost('Direccion');
        $NumeroEmergencia = $request->getPost('NumeroEmergencia');
        $Extra = $request->getPost('Extra');
        $data = [
            'nombretutor' => $NombreTutor,
            'apellidotutor' => $ApellidoTutor,
            'ci_tutor' => $CedulaTutor,
            'telefonotutor' => $TelefonoTutor,
            'parentesco' => $ParentescoTutor,
            'correoelectronico' => $CorreoDatoAdicional,
            'direccion' => $Direccion,
            'numeroemergencia' => $NumeroEmergencia,
            'indicacionextra' => $Extra,
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $padreModel = new GestionUsuarioPadreModel();
        $padreModel->actualizar_padre($id, $data);

        $response = array('success' => true, 'message' => 'Inicio de sesión exitoso.');
        // $response = array('success' => false, 'message' => 'Correo electrónico o contraseña incorrectos.');
        // Devolver la respuesta en formato JSON
        return $this->response->setJSON($response);

    }
    /**********************************************************************************************
     * vista administrador
     **********************************************************************************************/
    public function AdministradorView()
    {
        $Model = new GestionEstudiantesAutos();
        $NroMensajes = $Model->NroAlerta();
       
        $session = session();
        $data = [
            "titulo" => "Gestion de Administradores",
            "titulo1" => "Administrador",
            "foto_perfil" => $session->get('foto_perfil'),
            "Correo_perfil" => $session->get('Correo_perfil'),
            "nombre" => $session->get('nombre'),
            "apellido" => $session->get('apellido'),
            "rolnombre" => $session->get('rolnombre'),
        ];
        $data1 = [
            "activeE" => "",
            "activeP" => "",
            "activeA" => "activeA",
            "NroMensajes" => $NroMensajes,
        ];

        $rolModel = new GestionUsuarioModel();
        $datos = $rolModel->obtener_datos_rol();
        $rol = [
            "datos" => $datos,
            "eliminar" => $session->get('eliminar'),
            "editar" => $session->get('editar'),
            "agregar" => $session->get('agregar'),
            "administrador" => $session->get('administrador'),
        ];


        return view('2_Administrador/1_begin_page_view.php') .
            view('2_Administrador/2_head_page_view.php') .
            view('2_Administrador/3_theme_page_view.php') .
            view('4_Usuario/2_Usuario/4_aside_page_view.php', $data1) .
            view('2_Administrador/5_header_page_view.php', $data) .
            view('4_Usuario/2_Usuario/3_Administracion.php', $rol) .
            view('2_Administrador/7_footer_page_view.php') .
            view('2_Administrador/8_drawers_page_view.php') .
            view('2_Administrador/9_models_page_view.php') .
            view('2_Administrador/10_script_page_view.php') .
            view('2_Administrador/11_end_page_view.php');
    }
    //ver datos administrador
    public function datosAdministradorView()
    {

        $administradorModel = new GestionUsuarioModel();
        $datos = $administradorModel->Datos_administrador();
        $columnas = [
            'id' => true,
            'nombre' => true,
            'apellido' => true,
            'correo' => true,
            'telefono' => true,
            'direccion' => true,
            'cargo' => true,
            'nombrerol' => true,
            'created_at' => true,
            'Actions' => true,
        ];
        $this->datatables(json_encode($datos, true), $columnas);
    }
    //agregar administrador
    public function agregarAdministrador()
    {
        // Recibe los datos del formulario
        $request = service('request');
        $nombreAdministrador = $request->getPost('nombreAdministrador');
        $apellidoAdministrador = $request->getPost('apellidoAdministrador');
        $correoElectronico = $request->getPost('correoElectronico');
        $cedulaIdentidad = $request->getPost('cedulaIdentidad');
        $telefonoAdministrador = $request->getPost('telefonoAdministrador');
        $direccionAdministrador = $request->getPost('direccionAdministrador');
        $cargoAdministrador = $request->getPost('cargoAdministrador');
        $generoAdministrador = $request->getPost('generoAdministrador');
        $fechaNacimientoFormatted = $request->getPost('fechaNacimientoFormatted');
        $fechaInicioFormatted = $request->getPost('fechaInicioFormatted');
        $rolAdministrador = $request->getPost('rolAdministrador');
        $data = [
            'nombre' => $nombreAdministrador,
            'apellido' => $apellidoAdministrador,
            'correo' => $correoElectronico,
            'ci' => $cedulaIdentidad,
            'telefono' => $telefonoAdministrador,
            'direccion' => $direccionAdministrador,
            'cargo' => $cargoAdministrador,
            'genero' => $generoAdministrador,
            'fechanacimiento' => $fechaNacimientoFormatted,
            'fechainicio' => $fechaInicioFormatted,
            'rol' => $rolAdministrador,
            'estado' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $administradorModel = new GestionUsuarioModel();
        $administradorModel->insertar_administrador($data);
        $response = array('success' => true, 'message' => 'Inicio de sesión exitoso.');
        // $response = array('success' => false, 'message' => 'Correo electrónico o contraseña incorrectos.');
        // Devolver la respuesta en formato JSON
        return $this->response->setJSON($response);
    }
    //eliminar administrador
    public function eliminar_administrador()
    {
        $request = service('request');
        $id = $request->getPost('id');
        $nombre = $request->getPost('nombre');
        $adminstracionModel = new GestionUsuarioModel();
        $adminstracionModel->eliminar_administrador($id);
        $response = array('success' => true, 'message' => 'Eliminado con exito el grupo ' . $nombre);
        return $this->response->setJSON($response);
    }
    //extraccion de datos
    public function ExtracionAdministradorView()
    {
        $administradorModel = new GestionUsuarioModel();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $datos = $administradorModel->extracion_Datos_administrador($id);

            echo json_encode($datos);
        } else {
            http_response_code(405); // Método no permitido
            echo json_encode(array("error" => "Método no permitido"));
        }
    }
    //editar datos
    public function editarAdministrador()
    {
        // Recibe los datos del formulario
        $request = service('request');
        $id = $request->getPost('id');
        $nombreAdministrador = $request->getPost('nombreAdministrador');
        $apellidoAdministrador = $request->getPost('apellidoAdministrador');
        $correoElectronico = $request->getPost('correoElectronico');
        $cedulaIdentidad = $request->getPost('cedulaIdentidad');
        $telefonoAdministrador = $request->getPost('telefonoAdministrador');
        $direccionAdministrador = $request->getPost('direccionAdministrador');
        $cargoAdministrador = $request->getPost('cargoAdministrador');
        $generoAdministrador = $request->getPost('generoAdministrador');
        $fechaNacimientoFormatted = $request->getPost('fechaNacimientoFormatted');
        $fechaInicioFormatted = $request->getPost('fechaInicioFormatted');
        $rolAdministrador = $request->getPost('rolAdministrador');

        $data = [
            'nombre' => $nombreAdministrador,
            'apellido' => $apellidoAdministrador,
            'correo' => $correoElectronico,
            'ci' => $cedulaIdentidad,
            'telefono' => $telefonoAdministrador,
            'direccion' => $direccionAdministrador,
            'cargo' => $cargoAdministrador,
            'genero' => $generoAdministrador,
            'fechanacimiento' => $fechaNacimientoFormatted,
            'fechainicio' => $fechaInicioFormatted,
            'rol' => $rolAdministrador,
            //        'updated_at' => date('Y-m-d H:i:s')
        ];

        $administradorModel = new GestionUsuarioModel();
        $administradorModel->editar_administrador($data, $id);

        $response = array('success' => true, 'message' => 'Administrador editado exitosamente.');
        return $this->response->setJSON($response);

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


