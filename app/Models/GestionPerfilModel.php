<?php
namespace App\Models;

use CodeIgniter\Model;

class GestionPerfilModel extends Model
{
    protected $table = 'perfilsistema';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'fotousuario',
        'usuariopadre_id',
        'usuarioadministrador_id',
        'usuarioconductor_id',
        'rol_id',
        'correoelectronico',
        'passworduser',
        'estado',
        'created_at',
        'updated_at'
    ];

    public function obtener_datos_padre()
    {
        $sql = "SELECT * FROM padre WHERE estado=1
        ";
        $query = $this->query($sql);
        return $query->getResultArray();
    }
    //filter
    public function obtener_datos_padre01($id)
    {
        $sql = "select * from padre where id=$id and estado=1;
        ";
        $query = $this->query($sql);
        return $query->getResultArray();
    }
    public function obtener_datos_administrador()
    {
        $sql = "SELECT id,nombre , apellido ,correo,telefono, cargo FROM administrador WHERE estado=1

        ";
        $query = $this->query($sql);
        return $query->getResultArray();
    }
    public function obtener_datos_administrador01($id)
    {
        $sql = "SELECT id ,nombre , apellido ,correo,telefono, cargo FROM administrador WHERE id=$id and estado=1

        ";
        $query = $this->query($sql);
        return $query->getResultArray();
    }
    public function obtener_datos_conductor()
    {
        $sql = "SELECT id,nombre , apellido ,correoelectronico,telefono,cargo 
        FROM conductor where estado=1;
        ";
        $query = $this->query($sql);
        return $query->getResultArray();
    }
    public function obtener_datos_conductor01($id)
    {
        $sql = "SELECT id,nombre , apellido ,correoelectronico,telefono,cargo 
        FROM conductor where  id=$id and estado=1;
        ";
        $query = $this->query($sql);
        return $query->getResultArray();
    }
    public function obtener_datos_rol()
    {
        $sql = "SELECT id, nombre FROM rol WHERE estado=1
        ";
        $query = $this->query($sql);
        return $query->getResultArray();

    }
    public function obtener_datos_perfil()
    {
        $sql = "
        SELECT pu.id,pu.fotousuario,pu.usuariopadre_id,pu.usuarioadministrador_id,pu.usuarioconductor_id,r.nombre as rolnom ,r.descripcion as roldes ,pu.created_at
FROM perfilsistema pu
JOIN rol r ON pu.rol_id = r.id where pu.estado=1;

        ";
        $query = $this->query($sql);
        return $query->getResultArray();

    }

    public function insertar_Perfil($data)
    {
        $this->insert($data);
        return $this->insertID();
    }

    public function extraer_datos_perfil($id)
    {
        $sql = "SELECT id, fotousuario,usuariopadre_id, usuarioadministrador_id, usuarioconductor_id , rol_id 
        FROM perfilsistema where  id=$id and estado=1;
        ";
        $query = $this->query($sql);
        return $query->getResultArray();
    }
    public function actualizar_perfil($id, $data)
    {
        $this->update($id, $data);
        return $this->affectedRows();
    }
     public function eliminar_perfil($id)
    {
        $data = ['estado' => 0];
        $this->update($id, $data);
        //$this->delete($id);   eliminacion definitiva en la base de datos
        return $this->affectedRows();
    }


    //obtener los datos para la tabla
    // public function rol()
    // {
    //     $sql = "SELECT dis.id, dis.marca, dis.modelo, au.placa, dis.descripcion, dis.detalles, dis.created_at
    //     FROM dispositivo_gps dis
    //     JOIN automovil au ON dis.movilidad_id = au.id
    //     WHERE dis.estado = 1";

    //     $query = $this->db->query($sql);
    //     return $query->getResult();

    // }
    // //insertar dispositivo
    // public function insertar_dispositivoGPS($data)
    // {
    //     $this->insert($data);
    //     return $this->insertID();
    // }

    // public function actualizar_GPS($id, $data)
    // {
    //     $this->update($id, $data);
    //     return $this->affectedRows();
    // }
    // public function extracion_Datos_DispositivoGPS($id)
    // {
    //     return $this->where('id', $id)->findAll();
    // }
    // public function eliminar_dispositivoGPS($id)
    // {
    //     $data = ['estado' => 0];
    //     $this->update($id, $data);
    //     //$this->delete($id);   eliminacion definitiva en la base de datos
    //     return $this->affectedRows();
    // }
 

}