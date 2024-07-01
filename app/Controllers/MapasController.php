<?php

namespace App\Controllers;

use App\Models\GestionEstudiantesAutos;

class MapasController extends BaseController
{
       public function UbicacionActual()
       {
              $session = session();
              $Model = new GestionEstudiantesAutos();
              $NroMensajes = $Model->NroAlerta();
              //   return view('index.php');
              $data = [
                     "titulo" => "Ubicacion actual",
                     "titulo1" => "Ubicacion Actual",
                     "foto_perfil" => $session->get('foto_perfil'),
                     "Correo_perfil" => $session->get('Correo_perfil'),
                     "nombre" => $session->get('nombre'),
                     "apellido" => $session->get('apellido'),
                     "rolnombre" => $session->get('rolnombre'),
              ];
              $datos = [
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
                  $pagina='4_aside_page_viewConduc.php';
              }
              

            

              return view('2_Administrador/1_begin_page_view.php') .
                     view('2_Administrador/2_head_page_view.php') .
                     view('2_Administrador/3_theme_page_view.php') .
                     view('11_MenuLateral/2_Mapas/'.$pagina,$datos1) .
                     view('2_Administrador/5_header_page_view.php', $data) .
                     view('11_MenuLateral/2_Mapas/1_UbicacionActualPageView.php',$datos) .
                     view('2_Administrador/7_footer_page_view.php') .
                     view('2_Administrador/8_drawers_page_view.php') .
                     view('2_Administrador/9_models_page_view.php') .
                     view('2_Administrador/10_script_page_view.php') .
                     view('2_Administrador/11_end_page_view.php');
       }
       
}
