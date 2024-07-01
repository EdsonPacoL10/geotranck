<?php

namespace App\Controllers;

use App\Models\GestionDatosGraficasModel;

class GafricasDashbordController extends BaseController
{
    public function getData()
    {
        // Aquí puedes realizar tu consulta a la base de datos para obtener los datos
        $padreModel = new GestionDatosGraficasModel();
        $datos=$padreModel->numeroUsuarios();
        
        $data = [
            ["name" => "Estudiantes", "y" => $datos['estudiantes']],
            ["name" => "Padres", "y" => $datos['padre']],
            ["name" => "Conductores", "y" => $datos['conductor']],
            ["name" => "Administrador", "y" => $datos['administrador']]
           
        ];

        return $this->response->setJSON($data);
    }
    public function getDataGrafica1()
    {
        // Aquí puedes realizar tu consulta a la base de datos para obtener los datos
        $padreModel = new GestionDatosGraficasModel();
        $datos=$padreModel->numeroUsuariosDispositivo();
       
        $data = [
            ["name" => "Dispositivos GPS: ", "y" => $datos['dispositivos_gps'], "z" => $datos['dispositivos_gps']],
            ["name" => "Dispositivos RFID: ", "y" => $datos['dispositivos_rfid'], "z" => $datos['dispositivos_gps']],
            ["name" => "Automoviles: ", "y" => $datos['automovil'], "z" => $datos['dispositivos_gps']],
        ];
        
        return $this->response->setJSON($data);
    }

    public function obtenerDatosParaGrafico()
    {
        $datos = [
            ['name' => 'La Paz', 'lat' => -16.5000, 'lon' => -68.1500, 'y' => 100],
            ['name' => 'Cochabamba', 'lat' => -17.3895, 'lon' => -66.1568, 'y' => 80],
            ['name' => 'Santa Cruz', 'lat' => -17.8667, 'lon' => -63.0000, 'y' => 120]
        ];

        // Devolver los datos en formato JSON
        return $this->response->setJSON($datos);
    
       }
    


}