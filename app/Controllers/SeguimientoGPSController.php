<?php

namespace App\Controllers;

use App\Models\GestionDatosEstudianteModel;
use App\Models\GestionSeguimientoGPS;

class SeguimientoGPSController extends BaseController
{
    public function iniciar_viaje()
    {
        // Obtener datos de la solicitud POST
        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');

        // Asegurarse de que la latitud y longitud se han recibido correctamente
        if ($latitude === null || $longitude === null) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Latitud y longitud son requeridos.',
            ]);
        }

        // Preparar los datos para la inserción en la base de datos
        $data = [
            'id_usuario' => session()->id_perfil, // Ejemplo de valor
            'EstadoRuta' => 'Ubicacion de Inicio de Ruta', // Ejemplo de valor
            'nombre_estudiante' => session()->nombre,
            'apellido_estudiante' => session()->apellido,
            'LINESTRING' => "POINT($longitude $latitude)", // Formatear correctamente el POINT
            'estado' => 1, // Ejemplo de valor
            'created_at' => date('Y-m-d H:i:s'), // Timestamp actual
            'updated_at' => date('Y-m-d H:i:s') // Timestamp actual
        ];

        // Instanciar el modelo
        $automovilModel = new GestionSeguimientoGPS();

        // Insertar datos en la base de datos
        if ($automovilModel->RutaEstudiante($data)) {
            // Devolver una respuesta JSON
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Viaje iniciado correctamente.',
                'data' => $data
            ]);
        } else {
            // Manejar error en la inserción de datos
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No se pudo iniciar el viaje.',
            ]);
        }
    }
    public function finalizar_viaje()
    {
        // Obtener datos de la solicitud POST
        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');

        // Asegurarse de que la latitud y longitud se han recibido correctamente
        if ($latitude === null || $longitude === null) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Latitud y longitud son requeridos.',
            ]);
        }

        // Preparar los datos para la inserción en la base de datos
        $data = [
            'id_usuario' => session()->id_perfil, // Ejemplo de valor
            'EstadoRuta' => 'Ubicacion de Finalizacion de Ruta', // Ejemplo de valor
            'nombre_estudiante' => session()->nombre,
            'apellido_estudiante' => session()->apellido,
            'LINESTRING' => "POINT($longitude $latitude)", // Formatear correctamente el POINT
            'estado' => 1, // Ejemplo de valor
            'created_at' => date('Y-m-d H:i:s'), // Timestamp actual
            'updated_at' => date('Y-m-d H:i:s') // Timestamp actual
        ];

        // Instanciar el modelo
        $automovilModel = new GestionSeguimientoGPS();

        // Insertar datos en la base de datos
        if ($automovilModel->RutaEstudiante($data)) {
            // Devolver una respuesta JSON
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Viaje iniciado correctamente.',
                'data' => $data
            ]);
        } else {
            // Manejar error en la inserción de datos
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No se pudo iniciar el viaje.',
            ]);
        }
    }



    public function ubicacionEstudiante()
    {

        $nom_estudiante = $this->request->getPost('nom_estudiante');
        $ape_estudiante = $this->request->getPost('ape_estudiante');
        $latitude = $this->request->getPost('latitud');
        $longitude = $this->request->getPost('longitud');

        // Asegurarse de que la latitud y longitud se han recibido correctamente
        if ($latitude === null || $longitude === null) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Latitud y longitud son requeridos.',
            ]);
        }

        // Preparar los datos para la inserción en la base de datos
        $data = [
            'id_usuario' => session()->id_perfil, // Ejemplo de valor
            'EstadoRuta' => 'Punto de para del estudiante', // Ejemplo de valor
            'nombre_estudiante' =>$nom_estudiante ,
            'apellido_estudiante' => $ape_estudiante,
            'LINESTRING' => "POINT($longitude $latitude)", // Formatear correctamente el POINT
            'estado' => 1, // Ejemplo de valor
            'created_at' => date('Y-m-d H:i:s'), // Timestamp actual
            'updated_at' => date('Y-m-d H:i:s') // Timestamp actual
        ];

        // Instanciar el modelo
        $automovilModel = new GestionSeguimientoGPS();

        // Insertar datos en la base de datos
        if ($automovilModel->RutaEstudiante($data)) {
            // Devolver una respuesta JSON
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Viaje iniciado correctamente.',
                'data' => $data
            ]);
        } else {
            // Manejar error en la inserción de datos
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No se pudo iniciar el viaje.',
            ]);
        }
    }




    public function guardarLocalizacion()
    {
        $latitude = $this->request->getPost('latitude');
        $longitude = $this->request->getPost('longitude');

        $data = [
            'id_usuario' => session()->id_perfil,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'estado' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $automovilModel = new GestionSeguimientoGPS();
        $automovilModel->insertarDatosGps($data);

        return $this->response->setJSON(['status' => 'success']);
    }
    public function guardarRuta()
    {
        // $accuracy = $this->request->getPost('accuracy');
        $rutaGps = new GestionSeguimientoGPS();
        $ruta = $rutaGps->extraerRutaGps();
        // Verificar si el array ruta está vacío
        if (empty($ruta)) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'La ruta no tiene datos.'])->setStatusCode(400);
        }
        $wkt = 'LINESTRING(';
        foreach ($ruta as $punto) {
            $wkt .= "{$punto['longitud']} {$punto['latitud']}, ";
        }
        $wkt = rtrim($wkt, ', ') . ')';
        // echo '<pre>'; print_r($wkt); echo '</pre>';
        $data = [
            'id_usuario' => session()->id_perfil,
            'LINESTRING' => $wkt,
            'estado' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        $automovilModel = new GestionSeguimientoGPS();
        try {
            $automovilModel->GuardarDatosRuta($data);
            $automovilModel->Eliminar();
        } catch (\Exception $e) {
            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()])->setStatusCode(500);
        }
        return $this->response->setJSON(['status' => 'success']);
        // return $this->response->setJSON(['message' => '¡Datos recibidos en el servidor!']);
    }




    public function ubicacionActual()
    {
        $session = session();
        // $accuracy = $this->request->getPost('accuracy');
        $rutaGps = new GestionSeguimientoGPS();
        $Conductor = new GestionDatosEstudianteModel();
        $id_perfil = $session->get('id_perfil');
        //datos del estudiante que el padre podra ver 
        $idConductor = $Conductor->datosUbicacionRealConductor($id_perfil);
        $ultimoMarcador = $rutaGps->obtenerUltimoMarcador($idConductor[0]['id']);
        return $this->response->setJSON($ultimoMarcador);

        // return $this->response->setJSON(['message' => '¡Datos recibidos en el servidor!']);
    }
}
