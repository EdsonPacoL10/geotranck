<?php
namespace App\Models;

use CodeIgniter\Model;

class GestionUsuarioPadreModel extends Model
{
    protected $table = 'padre';
    protected $primaryKey = 'id';
    protected $allowedFields=['nombretutor', 'apellidotutor', 'ci_tutor', 'telefonotutor', 'parentesco', 'correoelectronico', 'direccion', 'numeroemergencia', 'indicacionextra', 'estado', 'created_at', 'updated_at','codigopadre'];
    public function obtener_datos()
    {
        return $this->where('estado', 1)->findAll();
    }
    public function obtener_datos_edit($id)
    {
        return $this->where('id', $id)->findAll();
    }
    public function insertar_padres($data)
    {
        $this->insert($data);
        return $this->insertID();
    }

  
    public function actualizar_padre($id, $data)
    {
        $this->update($id, $data);
        return $this->affectedRows();
    }
    public function eliminar_padre($id)
    {
        $data = ['estado' => 0];
        $this->update($id, $data);
        //$this->delete($id);   eliminacion definitiva en la base de datos
        return $this->affectedRows();
    }
}

