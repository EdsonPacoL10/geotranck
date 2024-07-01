<?php

namespace App\Controllers;

use App\Models\GestionDispositivoModel;
use App\Models\GestionEstudiantesAutos;
use App\Models\GestionUsuarioModel;

/************************************************
 * Controlador de vista gestion de transporte
 *************************************************/

class GestionDispositivosController extends BaseController
{
    /************************************************
     * Controlador de vista de gestion de dispositivos
     *************************************************/
    public function GPSView()
    {
        $session = session();
        $Model = new GestionEstudiantesAutos();
        $NroMensajes = $Model->NroAlerta();
        $data = [
            "titulo" => "Gestion de Dispositivo GPS",
            "titulo1" => "Dispositivo",
            "id_perfil" => $session->get('id_perfil'),
            "foto_perfil" => $session->get('foto_perfil'),
            "Correo_perfil" => $session->get('Correo_perfil'),
            "nombre" => $session->get('nombre'),
            "apellido" => $session->get('apellido'),
            "ci" => $session->get('ci'),
            "telefono" => $session->get('telefono'),
            "direccion" => $session->get('direccion'),
            "rolnombre" => $session->get('rolnombre'),

        ];
        $data1 = [
            "activeG" => "activeG",
            "activeR" => "",
            "NroMensajes" => $NroMensajes,
        ];
        $MovilidadModel = new GestionDispositivoModel();
        $datos = $MovilidadModel->obtener_datos_movilidad();
        $movilidad = [
            "datos" => $datos,
            "eliminar" => $session->get('eliminar'),
            "editar" => $session->get('editar'),
            "agregar" => $session->get('agregar'),
            "administrador" => $session->get('administrador')
        ];


        return view('2_Administrador/1_begin_page_view.php') .
            view('2_Administrador/2_head_page_view.php') .
            view('2_Administrador/3_theme_page_view.php') .
            view('6_Dispositivos/3_aside_page_view.php', $data1) .
            view('2_Administrador/5_header_page_view.php', $data) .
            view('6_Dispositivos/1_GpsPageView.php', $movilidad) .
            view('2_Administrador/7_footer_page_view.php') .
            view('2_Administrador/8_drawers_page_view.php') .
            view('2_Administrador/9_models_page_view.php') .
            view('2_Administrador/10_script_page_view.php') .
            view('2_Administrador/11_end_page_view.php');
    }
    //agregar GPS
    public function agregarGPS()
    {

        $request = service('request');
        $marca = $request->getPost('marca');
        $modelo = $request->getPost('modelo');
        $mobilidad = $request->getPost('mobilidad');
        $descripcion = $request->getPost('descripcion');
        $detalles = $request->getPost('detalles');

        $data = [
            'marca' => $marca,
            'modelo' => $modelo,
            'movilidad_id' => $mobilidad,
            'descripcion' => $descripcion,
            'detalles' => $detalles,
            'estado' => 1,
            'created_at' => date('Y-m-d H:i:s'), // Fecha y hora actual
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $dispositivoModel = new GestionDispositivoModel();
        $dispositivoModel->insertar_dispositivoGPS($data);

        return $this->response->setJSON(['success' => true, 'message' => 'Datos guardados correctamente']);
    }
    //datos para tabla dispositivo GPS
    public function DatosDispositivoGPSView()
    {
        $automovilModel = new GestionDispositivoModel();
        $datos = $automovilModel->obtener_datosGPS();
        $columnas = [
            'id' => true,
            'marca' => true,
            'modelo' => true,
            'placa' => true,
            'descripcion' => true,
            'detalles' => true,
            'estado' => true,
            'created_at' => true,
        ];
        $this->datatables(json_encode($datos, true), $columnas);
    }
    //eliminar Dispositivo
    public function eliminarDispositivoGPS()
    {
        $request = service('request');
        $id = $request->getPost('id');
        $modelo = $request->getPost('modelo');
        $automovilModel = new GestionDispositivoModel();
        $automovilModel->eliminar_dispositivoGPS($id);
        $response = array('success' => true, 'message' => 'Eliminado con exito el vehiculo de modelo: ' . $modelo);
        return $this->response->setJSON($response);
    }
    //extraer datos del dispositivo
    public function ExtracionGPSView()
    {
        $GPSModel = new GestionDispositivoModel();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $datos = $GPSModel->extracion_Datos_DispositivoGPS($id);
            echo json_encode($datos);
        } else {
            http_response_code(405); // Método no permitido
            echo json_encode(array("error" => "Método no permitido"));
        }
    }
    //actualizar telefono
    public function actualizarGPS()
    {
        $request = service('request');
        $id = $request->getPost('id');
        $marca = $request->getPost('marca');
        $modelo = $request->getPost('modelo');
        $mobilidad = $request->getPost('mobilidad');
        $descripcion = $request->getPost('descripcion');
        $detalles = $request->getPost('detalles');

        $data = [
            'marca' => $marca,
            'modelo' => $modelo,
            'movilidad_id' => $mobilidad,
            'descripcion' => $descripcion,
            'detalles' => $detalles,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $dispositivoModel = new GestionDispositivoModel();
        $dispositivoModel->actualizar_GPS($id, $data);

        return $this->response->setJSON(['success' => true, 'message' => 'Datos guardados correctamente']);
    }
    /************************************************
     * Controlador de vista de gestion de RFID
     *************************************************/
    public function RfidView()
    {
        $Model = new GestionEstudiantesAutos();
        $NroMensajes = $Model->NroAlerta();
        $session = session();
        $data = [
            "titulo" => "Gestion de Dispositivo RFID",
            "titulo1" => "Dispositivo",
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
            "activeG" => "",
            "activeR" => "activeR",
            "NroMensajes" => $NroMensajes,
        ];
        $MovilidadModel = new GestionDispositivoModel();
        $datos = $MovilidadModel->obtener_datos_movilidad();
        $movilidad = [
            "datos" => $datos,
            "eliminar" => $session->get('eliminar'),
            "editar" => $session->get('editar'),
            "agregar" => $session->get('agregar'),
            "administrador" => $session->get('administrador')
        ];


        return view('2_Administrador/1_begin_page_view.php') .
            view('2_Administrador/2_head_page_view.php') .
            view('2_Administrador/3_theme_page_view.php') .
            view('6_Dispositivos/3_aside_page_view.php', $data1) .
            view('2_Administrador/5_header_page_view.php', $data) .
            view('6_Dispositivos/2_RfidPageView.php', $movilidad) .
            view('2_Administrador/7_footer_page_view.php') .
            view('2_Administrador/8_drawers_page_view.php') .
            view('2_Administrador/9_models_page_view.php') .
            view('2_Administrador/10_script_page_view.php') .
            view('2_Administrador/11_end_page_view.php');
    }
    //agregar RFID
    public function agregarRFID()
    {

        $request = service('request');
        $marca = $request->getPost('marca');
        $modelo = $request->getPost('modelo');
        $mobilidad = $request->getPost('mobilidad');
        $descripcion = $request->getPost('descripcion');
        $detalles = $request->getPost('detalles');

        $data = [
            'marca' => $marca,
            'modelo' => $modelo,
            'movilidad_id' => $mobilidad,
            'descripcion' => $descripcion,
            'detalle' => $detalles,
            'estado' => 1,
            'created_at' => date('Y-m-d H:i:s'), // Fecha y hora actual
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $dispositivoModel = new GestionDispositivoModel();
        $dispositivoModel->agregar_dispositivoRFID($data);

        return $this->response->setJSON(['success' => true, 'message' => 'Datos guardados correctamente']);
    }
    //datos para tabla dispositivo RFID
    public function DatosDispositivoRFIDView()
    {
        $dispositivoModel = new GestionDispositivoModel();
        $datos = $dispositivoModel->datos_dispositivoRFID();
        $columnas = [
            'id' => true,
            'marca' => true,
            'modelo' => true,
            'placa' => true,
            'descripcion' => true,
            'detalle' => true,
            'estado' => true,
            'created_at' => true,
        ];
        $this->datatables(json_encode($datos, true), $columnas);
    }
    //eliminar Dispositivo
    public function eliminarDispositivoRFID()
    {
        $request = service('request');
        $id = $request->getPost('id');
        $modelo = $request->getPost('modelo');
        $automovilModel = new GestionDispositivoModel();
        $automovilModel->eliminar_dispositivoRFID($id);
        $response = array('success' => true, 'message' => 'Eliminado con exito el vehiculo de modelo: ' . $modelo);
        return $this->response->setJSON($response);
    }
    //extraer datos del dispositivo
    public function ExtracionRFIDView()
    {
        $GPSModel = new GestionDispositivoModel();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $datos = $GPSModel->extracion_Datos_RFID($id);
            echo json_encode($datos);
        } else {
            http_response_code(405); // Método no permitido
            echo json_encode(array("error" => "Método no permitido"));
        }
    }
    //actualizar telefono
    public function actualizarRFID()
    {
        $request = service('request');
        $id = $request->getPost('id');
        $marca = $request->getPost('marca');
        $modelo = $request->getPost('modelo');
        $mobilidad = $request->getPost('mobilidad');
        $descripcion = $request->getPost('descripcion');
        $detalles = $request->getPost('detalles');

        $data = [
            'marca' => $marca,
            'modelo' => $modelo,
            'movilidad_id' => $mobilidad,
            'descripcion' => $descripcion,
            'detalle' => $detalles,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $dispositivoModel = new GestionDispositivoModel();
        $dispositivoModel->actualiza_RFID($id, $data);

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


