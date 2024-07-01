<?php

namespace App\Controllers;

use App\Models\GestionModeloDatosGeoModel;

class DatosGeograficosController extends BaseController
{

    public function obtenerDatosHogarEstudiante()
    {
        // Aquí puedes obtener los datos de tu modelo, base de datos, o cualquier otra fuente de datos
        $arrayDatos = [];
        $padreModel = new GestionModeloDatosGeoModel();
        $datos = $padreModel->UbicacionHogarEstudiante();
        foreach ($datos as $dato) {
            $arrayDatos[] = [
                'foto' => $dato['imagenestudiante'],
                'nombre' => $dato['nombre'].' '.$dato['apellido'],
                'curso' => $dato['curso'],
                'lat' => $dato['latitud'],
                'lng' => $dato['longitud'],
                'tipo' => $dato['tipo'],
                'descripcion' => $dato['descripcion'],
                'avenida' => $dato['avenida'],
                'puerta' => $dato['puerta'],
            ];
        }

        return $this->response->setJSON($datos);
    }
    //datos para los marker
    public function obtenerDatosHogar()
    {
        $arrayDatos = [];
        $padreModel = new GestionModeloDatosGeoModel();
        $datos = $padreModel->UbicacionHogarEstudiante();
      
        foreach ($datos as $dato) {
            $arrayDatos[] = [
                'foto' => $dato['imagenestudiante'],
                'nombre' => $dato['nombre'].' '.$dato['apellido'],
                'curso' => $dato['curso'],
                'lat' => $dato['latitud'],
                'lng' => $dato['longitud'],
                'tipo' => $dato['tipo'],
                'descripcion' => $dato['descripcion'],
                'avenida' => $dato['avenida'],
                'puerta' => $dato['puerta'],
            ];
        }
        return $this->response->setJSON($arrayDatos);
    }
    public function obtenerDatosHogarEstudiantesConductor()
    {
        $session= session();
        $arrayDatos = [];
        $padreModel = new GestionModeloDatosGeoModel();
        $id_perfil = $session->get('id_perfil');
        $datos = $padreModel->ListaEstudianteAutoConductor($id_perfil);
      
        foreach ($datos as $dato) {
            $arrayDatos[] = [
                'foto' => $dato['imagenestudiante'],
                'nombre' => $dato['nombre'].' '.$dato['apellido'],
                'curso' => $dato['curso'],
                'lat' => $dato['latitud'],
                'lng' => $dato['longitud'],
                'tipo' => $dato['tipo'],
                'descripcion' => $dato['descripcion'],
                'avenida' => $dato['avenida'],
                'puerta' => $dato['puerta'],
                'padre' => $dato['nom_padre'].' '.$dato['ape_padre'],
                'telefono' => $dato['tel_padre'],
                 'parentesco' => $dato['parentesco']
            ];
        }
        return $this->response->setJSON($arrayDatos);
    }

}
