<?php
namespace App\Models;

use CodeIgniter\Model;

class GestionUsuarioModel extends Model
{
    protected $table = 'privilegio';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'descripcion', 'administrador', 'agregar', 'modificar', 'eliminar', 'estado', 'created_at', 'updated_at'];


    public function obtener_datos()
    {
        return $this->where('estado', 1)->findAll();
    }
    public function insertar_privilegio($data)
    {
        $this->insert($data);
        return $this->insertID();
    }
    public function actualizar_privilegios($id, $data)
    {
        $this->update($id, $data);
        return $this->affectedRows();
    }
    public function eliminar_privilegio($id)
    {
        $data = ['estado' => 0];
        $this->update($id, $data);
        //$this->delete($id);   eliminacion definitiva en la base de datos
        return $this->affectedRows();
    }
    /************************************************************************************************************************
     * consultas para roles
     *************************************************************************************************************************/
    public function obtener_datos_rol()
    {

        $table = 'rol';
        $table2 = 'privilegio';
        $sql = "SELECT r.id, r.nombre,r.descripcion,p.nombre as grupo_privilegio ,r.estado,r.created_at FROM $table r
                    JOIN $table2 p ON r.grupo_privilegio = p.id
                    WHERE r.estado = 1";
        $query = $this->query($sql);
        return $query->getResultArray();

    }
    public function insertar_rol($data)
    {
        $sql = "INSERT INTO rol (nombre, descripcion, grupo_privilegio, estado, created_at, updated_at) 
            VALUES (?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, [
            $data['nombre'],
            $data['descripcion'],
            $data['grupo_privilegio'],
            $data['estado'],
            $data['created_at'],
            $data['updated_at']
        ]);
        return $this->db->insertID();
    }
    //modificar
    public function actualizar_rol($id, $data)
    {
        $table = 'rol';
        $sql = "UPDATE $table SET nombre = ?, descripcion = ?, grupo_privilegio = ?, updated_at = ? WHERE id = ?";
        $this->db->query($sql, [
            $data['nombre'],
            $data['descripcion'],
            $data['grupo_privilegio'],
            $data['updated_at'],
            $id // ID del rol que quieres actualizar
        ]);
        // Devuelve el número de filas afectadas por la consulta
        return $this->affectedRows();
    }


    public function eliminar_rol($id)
    {
        $table = 'rol';
        $sql = "UPDATE $table SET estado = 0 WHERE id = $id";
        $query = $this->query($sql);
        // Devuelve el número de filas afectadas por la consulta
        return $this->affectedRows();
    }
    /************************************************************************************************************************
     * consultas para administrador
     *************************************************************************************************************************/
    //ver datos administrador
    public function Datos_administrador()
    {
        $table = 'administrador';
        $table2 = 'rol';
        $sql = "SELECT a.id, a.nombre,a.apellido,a.correo,a.telefono,a.direccion,a.cargo,r.nombre as nombrerol,a.created_at FROM $table a
                            JOIN $table2 r ON a.rol = r.id
                            WHERE a.estado = 1";
        $query = $this->query($sql);
        return $query->getResultArray();
    }
    //insertar administrador
    public function insertar_administrador($data)
    {
        $sql = "INSERT INTO administrador(
            nombre, apellido, correo, ci, telefono, direccion, cargo, genero, fechanacimiento, fechainicio, rol, estado, created_at, updated_at)
            VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
        $this->db->query($sql, [
            $data['nombre'],
            $data['apellido'],
            $data['correo'],
            $data['ci'],
            $data['telefono'],
            $data['direccion'],
            $data['cargo'],
            $data['genero'],
            $data['fechanacimiento'],
            $data['fechainicio'],
            $data['rol'],
            $data['estado'],
            $data['created_at'],
            $data['updated_at']
        ]);
        return $this->db->insertID();
    }
    public function eliminar_administrador($id)
    {
        $table = 'administrador';
        $sql = "UPDATE $table SET estado = 0 WHERE id = $id";
        $query = $this->query($sql);
        // Devuelve el número de filas afectadas por la consulta
        return $this->affectedRows();
    }
    //extraccion de datos del administrador
    public function extracion_Datos_administrador($id)
    {
        $table = 'administrador';
        $table2 = 'rol';
        $sql = "SELECT a.*, r.nombre as nombrerol FROM $table a
                        JOIN $table2 r ON a.rol = r.id
                        WHERE a.estado = 1 and  a.id=$id;";

        $query = $this->query($sql);
        return $query->getResultArray();
    }
    //editar datos de administrador
    public function editar_administrador($data, $id)
    {
        $builder = $this->db->table('administrador');

        $builder->set('nombre', $data['nombre'])
            ->set('apellido', $data['apellido'])
            ->set('correo', $data['correo'])
            ->set('ci', $data['ci'])
            ->set('telefono', $data['telefono'])
            ->set('direccion', $data['direccion'])
            ->set('cargo', $data['cargo'])
            ->set('genero', $data['genero'])
            ->set('fechanacimiento', $data['fechanacimiento'])
            ->set('fechainicio', $data['fechainicio'])
            ->set('rol', $data['rol'])
            ->set('updated_at', date('Y-m-d H:i:s'))
            ->where('id', $id)
            ->update();
    }


}
