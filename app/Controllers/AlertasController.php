<?php

namespace App\Controllers;

use App\Models\GestionDatosEstudianteModel;
use App\Models\GestionEstudiantesAutos;

class AlertasController extends BaseController
{
    public function AlertasDeConductor()
{
    $nom_estudiante = $this->request->getPost('nom_estudiante');
    $ape_estudiante = $this->request->getPost('ape_estudiante');
    $cur_estudiante = $this->request->getPost('cur_estudiante');
    $nom_padre = $this->request->getPost('nom_padre');
    $ape_padre = $this->request->getPost('ape_padre');
    $tel_padre = $this->request->getPost('tel_padre');
    $nom_conductor = $this->request->getPost('nom_conductor');
    $ape_conductor = $this->request->getPost('ape_conductor');
    $tel_conductor = $this->request->getPost('tel_conductor');
    $mar_automovil = $this->request->getPost('mar_automovil');
    $mod_automovil = $this->request->getPost('mod_automovil');
    $color_automovil = $this->request->getPost('color_automovil');
    $placa_automovil = $this->request->getPost('placa_automovil');
    $data = [
        'nom_estudiante' => $nom_estudiante,
        'ape_estudiante' => $ape_estudiante,
        'cur_estudiante' => $cur_estudiante,
        'nom_padre' => $nom_padre,
        'ape_padre' => $ape_padre,
        'tel_padre' => $tel_padre,
        'nom_conductor' => $nom_conductor,
        'ape_conductor' => $ape_conductor,
        'tel_conductor' => $tel_conductor,
        'mar_automovil' => $mar_automovil,
        'mod_automovil' => $mod_automovil,
        'color_automovil' => $color_automovil,
        'placa_automovil' => $placa_automovil,
        'estado' => 1,
        'created_at' => date('Y-m-d H:i:s'), // Fecha y hora actual
        'updated_at' => date('Y-m-d H:i:s')
    ];
    $alertaModel = new GestionEstudiantesAutos();
    $alertaModel->insertarAlertaConductor($data);    
    return $this->response->setJSON(['message' => 'Nombre estudiante: ' . $nom_estudiante]);
}

public function EliminarEstudianteLista()
{
    $id = $this->request->getPost('id');
    $automovilModel = new GestionEstudiantesAutos();
    $automovilModel->actualiza_lista($id);

    return $this->response->setJSON(['message' => 'Dato eliminado correctamente']);
}
    public function MensajeAlertarView()
    {
        //   return view('index.php');
        $session = session();
        $Model = new GestionDatosEstudianteModel();
        $datosEstudiante = $Model->datosEstudianteAdministrador();
        $data = [
            "titulo" => "Buzon de Alertas",
            "titulo1" => "Alertas",
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

        $usuario = $session->get('rolnombre');
        $id_perfil = $session->get('id_perfil');
        
        if ($usuario == 'Administrador') {
            $Model = new GestionEstudiantesAutos();
            $NroMensajes = $Model->NroAlerta();
            $data = [
                "titulo" => "Dashbords Principal",
                "titulo1" => "Dashbord",
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
                "administrador" => $session->get('administrador'),
                "datosEstudiante" => $datosEstudiante,
                "NroMensajes" => $NroMensajes,
       
            ];

            $pagina = '4_aside_page_view.php';
        } elseif ($usuario == 'PadreFamilia') {

            
            $pagina = '4_aside_page_viewPadre.php';
        } elseif ($usuario == 'Conductor') {
            $Model = new GestionEstudiantesAutos();
            $datosEstudianteAuto = $Model->ListaEstudianteAuto($id_perfil);
            $data = [
                "titulo" => "Dashbords Principal",
                "titulo1" => "Dashbord",
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
                "administrador" => $session->get('administrador'),
                "datosEstudiante" => $datosEstudianteAuto,
            ];
            
            $pagina = '4_aside_page_viewCon.php';
        }
        return view('2_Administrador/1_begin_page_view.php') .
            view('2_Administrador/2_head_page_view.php') .
            view('2_Administrador/3_theme_page_view.php') .
            view('2_Administrador/' . $pagina, $data) .
            view('2_Administrador/5_header_page_view.php', $data) .
            view('11_MenuLateral/8_AsignacionAuto/2_MensajeAlertaPageView.php') .
            view('2_Administrador/8_drawers_page_view.php') .
            view('2_Administrador/9_models_page_view.php') .
            view('2_Administrador/10_script_page_view.php') .
            view('2_Administrador/11_end_page_view.php');
    }
     //ver datos administrador
     public function listaAlertasView()
     {
         $MoldelMensaje = new GestionEstudiantesAutos();
         $datos = $MoldelMensaje->ListaAlerta();
         $columnas = [
             'id' => true,
             'nom_estudiante' => true,
             'ape_estudiante' => true,
             'cur_estudiante' => true,
             'nom_padre' => true,
             'ape_padre' => true,
             'tel_padre' => true,
             'nom_conductor' => true,
             'ape_conductor' => true,
             'tel_conductor' => true,
             'mar_automovil' => true,
             'mod_automovil' => true,
             'color_automovil' => true,
             'placa_automovil' => true,
             'created_at' => true,
             'Actions' => true,
         ];
         $this->datatables(json_encode($datos, true), $columnas);
     }

     public function eliminar_alerta()
     {
         $request = service('request');
         $id = $request->getPost('id');
         $nombre = $request->getPost('nombre');
         $padreModel = new GestionEstudiantesAutos();
         $padreModel->eliminar_alerta($id);
         $response = array('success' => true, 'message' => 'Eliminado con exito el grupo ' . $nombre);
         return $this->response->setJSON($response);
     }


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


