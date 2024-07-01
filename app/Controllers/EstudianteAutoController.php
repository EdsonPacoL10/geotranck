<?php

namespace App\Controllers;

use App\Models\GestionDatosEstudianteModel;
use App\Models\GestionEstudiantesAutos;

class EstudianteAutoController extends BaseController
{
    public function EstudianteAutoView()
    {
        $session = session();
        $Model = new GestionDatosEstudianteModel();
        $datosEstudiante = $Model->datosEstudianteAdministrador();
        $model = new GestionEstudiantesAutos();
        $datosAutomovil = $model->datos_automoviles();
        $Model = new GestionEstudiantesAutos();
        $NroMensajes = $Model->NroAlerta();

        $data = [
            "titulo" => "Asignacion de Automovil",
            "titulo1" => "Automovilies",
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
            "automovil" => $datosAutomovil,
            "NroMensajes" => $NroMensajes,
        ];
        return view('2_Administrador/1_begin_page_view.php') .
            view('2_Administrador/2_head_page_view.php') .
            view('2_Administrador/3_theme_page_view.php') .
            view('11_MenuLateral/8_AsignacionAuto/4_aside_page_view.php', $data) .
            view('2_Administrador/5_header_page_view.php', $data) .
            view('11_MenuLateral/8_AsignacionAuto/1_EstudianteAutoPageView.php') .
            view('2_Administrador/7_footer_page_view.php') .
            view('2_Administrador/8_drawers_page_view.php') .
            view('2_Administrador/9_models_page_view.php') .
            view('2_Administrador/10_script_page_view.php') .
            view('2_Administrador/11_end_page_view.php');
    }
    public function GuardarItmes()
    {
        $doneItems = $this->request->getPost('doneItems');
        $automivil = $this->request->getPost('automovil');

        $model = new GestionEstudiantesAutos(); // Cambia esto por el nombre de tu modelo

        foreach ($doneItems as $itemId) {
            // Aquí puedes guardar cada item en la base de datos
            $data = [
                'usuarioagregador_id' => session()->id_perfil,
                'automovil_id' => $automivil,
                'estudiante_id' => $itemId,
                'estado' => 1,
                'created_at' => date('Y-m-d H:i:s'), // Fecha y hora actual
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $model->save($data);
        }

        return $this->response->setJSON(['status' => 'success']);
    }

}
