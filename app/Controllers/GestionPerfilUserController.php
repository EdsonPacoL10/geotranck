<?php

namespace App\Controllers;

use App\Models\GestionEstudiantesAutos;
use App\Models\GestionPerfilModel;

/************************************************
 * Controlador de vista gestion de pagos
 *************************************************/

class GestionPerfilUserController extends BaseController
{
    public function PerfilView()
    {
        $session = session();
        $Model = new GestionEstudiantesAutos();
              $NroMensajes = $Model->NroAlerta();
        $session = session();
        $data = [
            "titulo" => "Gestion de usuario",
            "titulo1" => "Perfil",
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
        //datos padre
        $padreModel = new GestionPerfilModel();
        $datos = $padreModel->obtener_datos_padre();
        //datos administrador
        $datosAdministrador = $padreModel->obtener_datos_administrador();
        $datosConductor = $padreModel->obtener_datos_conductor();
        $datosrol = $padreModel->obtener_datos_rol();
        $datos = [
            "datospadres" => $datos,
            "datosadministrador" => $datosAdministrador,
            "datosconductor" => $datosConductor,
            "datosrol" => $datosrol,
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
        $usuario=$session->get('rolnombre');
        if ($usuario=='Administrador') {
            $datos1 = [
                "NroMensajes" => $NroMensajes,
         ]; 
       $pagina='4_aside_page_view.php';
        }elseif ($usuario=='PadreFamilia') {
            $datos1 = [
                "NroMensajes" => $NroMensajes,
         ];
            $pagina='4_aside_page_viewPadre.php';
        }elseif ($usuario=='Conductor') {
            $datos1 = [
                "NroMensajes" => $NroMensajes,
         ];
            $pagina='4_aside_page_viewCon.php';
        }
        return view('2_Administrador/1_begin_page_view.php') .
            view('2_Administrador/2_head_page_view.php') .
            view('2_Administrador/3_theme_page_view.php') .
            view('2_Administrador/'.$pagina,$datos1) .
            view('2_Administrador/5_header_page_view.php', $data) .
            view('12_PerfilUsuario/1_PerfilUsuarioPageView.php', $datos) .
            view('2_Administrador/7_footer_page_view.php') .
            view('2_Administrador/8_drawers_page_view.php') .
            view('2_Administrador/9_models_page_view.php') .
            view('2_Administrador/10_script_page_view.php') .
            view('2_Administrador/11_end_page_view.php');
    }

    public function agregarPerfil()
    {
        $request = service('request');
        // Validar la imagen
        if ($request->getFile('fileUsuario')->isValid()) {
            $avatar = $request->getFile('fileUsuario');
            $avatar->move(ROOTPATH . 'public/uploads/Usuarios/'); // Ruta donde deseas guardar la imagen
            $rutaAvatar = $avatar->getName();
            $usuariopadre = $request->getPost('usuariopadre');
            $usuarioadministrador = $request->getPost('usuarioadministrador');
            $usuarioconductor = $request->getPost('usuarioconductor');
            $rol = $request->getPost('rol');
            $correoElectronico = $request->getPost('correoElectronico');
            $contrasena = $request->getPost('contrasena');
            $data = [
                'fotousuario' => $rutaAvatar,
                'usuariopadre_id' => $usuariopadre,
                'usuarioadministrador_id' => $usuarioadministrador,
                'usuarioconductor_id' => $usuarioconductor,
                'rol_id' => $rol,
                'correoelectronico' => $correoElectronico,
                'passworduser' => password_hash($contrasena, PASSWORD_DEFAULT),
                'estado' => 1,
                'created_at' => date('Y-m-d H:i:s'), // Fecha y hora actual
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $automovilModel = new GestionPerfilModel();
            $automovilModel->insertar_Perfil($data);

        } else {
            // Manejar error de imagen no válida
            return $this->response->setStatusCode(400)->setJSON(['success' => false, 'message' => 'Error al subir la imagen y guardado de datos']);
        }

        return $this->response->setJSON(['success' => true, 'message' => 'Datos guardados correctamente']);
    }
    public function datosPerfilView()
    {

        $datoFinal = [];
        $Model = new GestionPerfilModel();
        $datosperfil = $Model->obtener_datos_perfil();
        foreach ($datosperfil as $datos) {
            if ($datos['usuariopadre_id'] != 0) {
                $datospadre = $Model->obtener_datos_padre01($datos['usuariopadre_id']);
                //armado de datos
                //armado de datos
                foreach ($datospadre as $datospadre1) {
                    $nombresAdministraador = [
                        'idusuariotutor' => $datospadre1['id'],
                        'id' => $datos['id'],
                        'foto' => $datos['fotousuario'],
                        'nombre' => $datospadre1['nombretutor'],
                        'apellido' => $datospadre1['apellidotutor'],
                        'telefono' => $datospadre1['telefonotutor'],
                        'parentesco' => $datospadre1['parentesco'],
                        'correo' => $datospadre1['correoelectronico'],
                        'rolnombre' => $datos['rolnom'],
                        'roldes' => $datos['roldes'],
                        'created_at' => $datos['created_at'],
                    ];
                    $datoFinal[] = $nombresAdministraador;
                }
                ;
            }
            ;
            if ($datos['usuarioadministrador_id'] != 0) {
                $datosadministrador = $Model->obtener_datos_administrador01($datos['usuarioadministrador_id']);
                //armado de datos
                foreach ($datosadministrador as $datosadm) {
                    $nombresAdministraador = [
                        'idusuarioadministrador' => $datosadm['id'],
                        'id' => $datos['id'],
                        'foto' => $datos['fotousuario'],
                        'nombre' => $datosadm['nombre'],
                        'apellido' => $datosadm['apellido'],
                        'correo' => $datosadm['correo'],
                        'telefono' => $datosadm['telefono'],
                        'cargo' => $datosadm['cargo'],
                        'rolnombre' => $datos['rolnom'],
                        'roldes' => $datos['roldes'],
                        'created_at' => $datos['created_at'],
                    ];
                    $datoFinal[] = $nombresAdministraador;
                }
                ;
            }
            ;
            if ($datos['usuarioconductor_id'] != 0) {
                $datosconductor = $Model->obtener_datos_conductor01($datos['usuarioconductor_id']);
                //armado de datos
                foreach ($datosconductor as $datosadm) {
                    $nombresAdministraador = [
                        'idusuarioconductor' => $datosadm['id'],
                        'id' => $datos['id'],
                        'foto' => $datos['fotousuario'],
                        'nombre' => $datosadm['nombre'],
                        'apellido' => $datosadm['apellido'],
                        'correo' => $datosadm['correoelectronico'],
                        'telefono' => $datosadm['telefono'],
                        'cargo' => $datosadm['cargo'],
                        'rolnombre' => $datos['rolnom'],
                        'roldes' => $datos['roldes'],
                        'created_at' => $datos['created_at'],
                    ];
                    $datoFinal[] = $nombresAdministraador;
                }
                ;
            }
            ;
        }
        ;

        // echo '<pre>'; print_r($datoFinal); echo '</pre>';
        $columnas = [
            'id' => true,
            'foto' => true,
            'nombre' => true,
            'apellido' => true,
            'correo' => true,
            'telefono' => true,
            'cargo' => true,
            'rolnombre' => true,
            'roldes' => true,
            'created_at' => true,
            'Actions' => true,
        ];

        $this->datatables(json_encode($datoFinal, true), $columnas);
    }
    //extraer datos del perfil
    public function ExtracionPerfilView()
    {
        $perfilModel = new GestionPerfilModel();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $datos = $perfilModel->extraer_datos_perfil($id);
            echo json_encode($datos);
        } else {
            http_response_code(405); // Método no permitido
            echo json_encode(array("error" => "Método no permitido"));
        }
    }
    public function actualizarPerfil()
    {
        $request = service('request');
        $id = $request->getPost('id');
        // Validar la imagen
        if ($request->getFile('fileUsuario')->isValid()) {
            $avatar = $request->getFile('fileUsuario');
            $avatar->move(ROOTPATH . 'public/uploads/Usuarios/'); // Ruta donde deseas guardar la imagen
            $rutaAvatar = $avatar->getName();
            $usuariopadre = $request->getPost('usuariopadre');
            $usuarioadministrador = $request->getPost('usuarioadministrador');
            $usuarioconductor = $request->getPost('usuarioconductor');
            $rol = $request->getPost('rol');
            $correoElectronico = $request->getPost('correoElectronico');
            $contrasena = $request->getPost('contrasena');
            $data = [
                'fotousuario' => $rutaAvatar,
                'usuariopadre_id' => $usuariopadre,
                'usuarioadministrador_id' => $usuarioadministrador,
                'usuarioconductor_id' => $usuarioconductor,
                'rol_id' => $rol,
                'correoelectronico' => $correoElectronico,
                'passworduser' => password_hash($contrasena, PASSWORD_DEFAULT),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $automovilModel = new GestionPerfilModel();
            $automovilModel->actualizar_perfil($id, $data);

        } else {
            // Manejar error de imagen no válida
            return $this->response->setStatusCode(400)->setJSON(['success' => false, 'message' => 'Error al subir la imagen y guardado de datos']);
        }

        return $this->response->setJSON(['success' => true, 'message' => 'Datos guardados correctamente']);
    }
    //eliminar perfil
    public function eliminarPerfil()
    {
        $request = service('request');
        $id = $request->getPost('id');
        $modelo = $request->getPost('nombre');
        $automovilModel = new GestionPerfilModel();
        $automovilModel->eliminar_perfil($id);
        $response = array('success' => true, 'message' => 'Eliminado con exito el perfil de: ' . $modelo);
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
