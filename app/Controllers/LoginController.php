<?php

namespace App\Controllers;

use App\Models\GestionLoginModel;
use App\Models\log_model;

class LoginController extends BaseController
{
    //vista inicial
    public function index()
    {
        $session=session();
        $session->destroy();
        return view('1_Login/1_Login.php');
    }

    public function acceso()
    {
        $request = service('request');
        $email = $request->getPost('email');
        $password = $request->getPost('password');
        $usuarioModel = new GestionLoginModel();
        $usuario = $usuarioModel->obtenerUsuarioPorCorreo($email);
        if ($usuario && password_verify($password, $usuario['passworduser'])) {
            // Iniciar sesión
            $session = session();
            $session->set(['isLoggedIn' => true]);

            //datos usuario totales
            $datosusuario = $usuarioModel->datos_totales_Usuario($usuario['id']);
        
             if ($usuario['usuariopadre_id']!=0) {
                $usuariopadre = $usuarioModel->obtener_datos_padre01($datosusuario['usuariopadre_id']);
                $session->set('id_perfil', $datosusuario['id']);
                $session->set('foto_perfil', $datosusuario['fotousuario']);
                $session->set('Correo_perfil', $usuariopadre['correoelectronico']);
                $session->set('nombre', $usuariopadre['nombretutor']);
                $session->set('apellido', $usuariopadre['apellidotutor']);
                $session->set('ci', $usuariopadre['ci_tutor']);
                $session->set('telefono', $usuariopadre['telefonotutor']);
                $session->set('direccion', $usuariopadre['direccion']);
                $session->set('rolnombre', $datosusuario['rol']);
                $session->set('eliminar', $datosusuario['eliminar']);
                $session->set('modificar', $datosusuario['modificar']);
                $session->set('agregar', $datosusuario['agregar']);
                $session->set('administrador', $datosusuario['administrador']);
            };
            if ($usuario['usuarioadministrador_id']!=0) {
                $usuarioadministrador = $usuarioModel->obtener_datos_administrador01($usuario['usuarioadministrador_id']);
                $session->set('id_perfil', $datosusuario['id']);
                $session->set('foto_perfil', $datosusuario['fotousuario']);
                $session->set('Correo_perfil', $usuarioadministrador['correo']);
                $session->set('nombre', $usuarioadministrador['nombre']);
                $session->set('apellido', $usuarioadministrador['apellido']);
                $session->set('ci', $usuarioadministrador['ci']);
                $session->set('telefono', $usuarioadministrador['telefono']);
                $session->set('direccion', $usuarioadministrador['direccion']);
                $session->set('rolnombre', $datosusuario['rol']);
                $session->set('eliminar', $datosusuario['eliminar']);
                $session->set('modificar', $datosusuario['modificar']);
                $session->set('agregar', $datosusuario['agregar']);
                $session->set('administrador', $datosusuario['administrador']);
            };
            if ($usuario['usuarioconductor_id']!=0) {
                $usuarioconductor = $usuarioModel->obtener_datos_conductor01($usuario['usuarioconductor_id']);
                $session->set('id_perfil', $datosusuario['id']);
                $session->set('foto_perfil', $datosusuario['fotousuario']);
                $session->set('Correo_perfil', $usuarioconductor['correoelectronico']);
                $session->set('nombre', $usuarioconductor['nombre']);
                $session->set('apellido', $usuarioconductor['apellido']);
                $session->set('ci', $usuarioconductor['ci']);
                $session->set('telefono', $usuarioconductor['telefono']);
                $session->set('direccion', $usuarioconductor['direccion']);
                $session->set('rolnombre', $datosusuario['rol']);
                $session->set('eliminar', $datosusuario['eliminar']);
                $session->set('modificar', $datosusuario['modificar']);
                $session->set('agregar', $datosusuario['agregar']);
                $session->set('administrador', $datosusuario['administrador']);
            };
            $response = array('success' => true, 'message' => 'Inicio de sesión exitoso.');
        } else {
            // Error de inicio de sesión
            $response = array('success' => false, 'message' => 'Correo electrónico o contraseña incorrectos.');
        }

        // Devolver la respuesta en formato JSON
        return $this->response->setJSON($response);

    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
    //vista de recuperacion de contraseña
    public function restablecerContraseña()
    {
        return view('1_Login/2_ResetLogin.php');

    }
    //vista de invitacion 
    public function invitacion()
    {
        return view('1_Login/3_Invitacion.php');

    }
}
