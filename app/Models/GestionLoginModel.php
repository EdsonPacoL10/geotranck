<?php

namespace App\Models;

use CodeIgniter\Model;

class GestionLoginModel extends Model
{
    protected $table = 'perfilsistema';
    protected $primaryKey = 'id';
    protected $allowedFields = ['fotousuario', 'usuariopadre_id', 'usuarioadministrador_id', 'usuarioconductor_id', 'rol_id', 'correoelectronico', 'passworduser', 'estado', 'created_at', 'updated_at'];
    //filter
    public function obtener_datos_padre01($id)
    {
        $sql = "select * from padre where id=$id and estado=1;
        ";
        $query = $this->query($sql);
        return $query->getRowArray();
    }
    public function obtener_datos_administrador01($id)
    {
        $sql = "SELECT id ,nombre , apellido ,correo,ci,telefono,direccion, cargo FROM administrador WHERE id=$id and estado=1

        ";
        $query = $this->query($sql);
        return $query->getRowArray();
    }
    public function obtener_datos_conductor01($id)
    {
        $sql = "SELECT id,nombre , apellido ,correoelectronico,direccion,ci,telefono,cargo 
        FROM conductor where  id=$id and estado=1;
        ";
        $query = $this->query($sql);
        return $query->getRowArray();
    }
    public function datos_totales_Usuario($id)
    {
        $sql = "SELECT per.id ,per.fotousuario,per.usuariopadre_id,per.usuarioadministrador_id,per.usuarioconductor_id
        ,ro.nombre as rol ,pri.agregar,pri.modificar,pri.eliminar,pri.administrador
                FROM perfilsistema per
                LEFT JOIN rol ro ON ro.id = per.rol_id
                LEFT JOIN privilegio pri ON ro.grupo_privilegio = pri.id
                where per.id=$id and  per.estado=1
        ";
        $query = $this->query($sql);
        return $query->getRowArray();
    }



    public function obtenerUsuarioPorCorreo($correo)
    {
        return $this->where('correoelectronico', $correo)
        ->where('estado', 1)
        ->first();
    }

}
