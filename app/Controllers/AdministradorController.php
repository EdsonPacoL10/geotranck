<?php

namespace App\Controllers;

use App\Models\GestionDatosEstudianteModel;
use App\Models\GestionEstudiantesAutos;

class AdministradorController extends BaseController
{
    public function index()
    {
        //   return view('index.php');
        $session = session();
        $Model = new GestionDatosEstudianteModel();
        $datosEstudiante = $Model->datosEstudianteAdministrador();
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
            "administrador" => $session->get('administrador')
        ];

        $usuario = $session->get('rolnombre');
        $id_perfil = $session->get('id_perfil');
        //datos del estudiante que el padre podra ver 
        $datosEstudiantePadre = $Model->datosEstudianteParaPadre($id_perfil);
       $dataEstudiante=[
        "datosEstudiantePadre" => $datosEstudiantePadre
        
       ];

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
            view('2_Administrador/6_content_page_view.php',$dataEstudiante ) .
            view('2_Administrador/8_drawers_page_view.php') .
            view('2_Administrador/9_models_page_view.php') .
            view('2_Administrador/10_script_page_view.php') .
            view('2_Administrador/11_end_page_view.php');
    }
    public function dashboardsDispositivo()
    {
        $session = session();
        $Model = new GestionDatosEstudianteModel();
        $datosEstudiante = $Model->datosEstudianteAdministrador();
        $NroEstudiante = $Model->NroEstudiantes();
        $NroPerfil = $Model->NroPerfiles();
        $Model = new GestionEstudiantesAutos();
        $NroMensajes = $Model->NroAlerta();
        $model = new GestionEstudiantesAutos();
        $datosAutomovil = $model->datos_automoviles();
       

        $data1 = [
             "nroEstu" => $NroEstudiante,
            "nroPerfil" => $NroPerfil,
            "automovil" => $datosAutomovil,
        ];
    
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
        return view('2_Administrador/1_begin_page_view.php') .
            view('2_Administrador/2_head_page_view.php') .
            view('2_Administrador/3_theme_page_view.php') .
            view('2_Administrador/4_aside_page_view.php', $data) .
            view('2_Administrador/5_header_page_view.php', $data) .
            view('3_Dashboards/1_DispositivosPageView.php',$data1) .
            view('2_Administrador/7_footer_page_view.php') .
            view('2_Administrador/8_drawers_page_view.php') .
            view('2_Administrador/9_models_page_view.php') .
            view('2_Administrador/10_script_page_view.php') .
            view('2_Administrador/11_end_page_view.php');
    }
///envio de mensajes al administrador 
public function EstudiantesConductor()
{
    $session = session();
    $id_perfil = $session->get('id_perfil');
    $Model = new GestionDatosEstudianteModel();
    $NroPerfil = $Model->NroEstudiantesAuto($id_perfil);
    $Model = new GestionEstudiantesAutos();
  
    $data1 = [
         "nroEstu" => $NroPerfil,
      
    ];
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
   
    return view('2_Administrador/1_begin_page_view.php') .
        view('2_Administrador/2_head_page_view.php') .
        view('2_Administrador/3_theme_page_view.php') .
        view('2_Administrador/4_aside_page_viewCon.php', $data) .
        view('2_Administrador/5_header_page_view.php', $data) .
        view('3_Dashboards/1_EstudiantesConductorPageView.php',$data1) .
        view('2_Administrador/7_footer_page_view.php') .
        view('2_Administrador/8_drawers_page_view.php') .
        view('2_Administrador/9_models_page_view.php') .
        view('2_Administrador/10_script_page_view.php') .
        view('2_Administrador/11_end_page_view.php');
}




}
