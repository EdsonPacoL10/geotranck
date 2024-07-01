<?php
namespace App\Models;

use CodeIgniter\Model;

class GestionTransporteModel extends Model
{
    protected $table = 'conductor';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nombre',
        'apellido',
        'ci',
        'numlicencia',
        'fechalicencia',
        'licencia',
        'catlic',
        'correoelectronico',
        'telefono',
        'direccion',
        'cargo',
        'genero',
        'fechainiciocontrato',
        'fechafincontrato',
        'estado',
        'created_at',
        'updated_at'
    ];

    //ingreso de datos del conductor
    public function obtener_datos()
    {
        return $this->where('estado', 1)->findAll();
    }
    public function insertar_Conducto($data)
    {
        $this->insert($data);
        return $this->insertID();
    }
    public function actualizar_conductor($id, $data)
    {
        $this->update($id, $data);
        return $this->affectedRows();
    }
    public function extracion_Datos_Conductor($id)
    {
        return $this->where('id', $id)->findAll();
    }
    public function eliminar_conductor($id)
    {
        $builder = $this->db->table('conductor');
        $builder->where('id', $id);
        $builder->update(['estado' => 0]);

        return $this->affectedRows();
    }
    /*****************************************************************************************************
     * MODELO PARA EL AUTOMOVIL
     *****************************************************************************************************/
    public function obtener_datos_conductor()
    {
        return $this->select('id,nombre,apellido')->where('estado', 1)->findAll();
    }
    //agreagr automovil
    public function insertar_automovil($data)
    {
        $builder = $this->db->table('automovil');

        $builder->insert($data);
        return $this->db->insertID();
    }
    public function datos_automoviles()
    {
        $sql = "SELECT au.id, co.nombre as nombreConductor, co.apellido as apellidoConductor, au.imagenautomovil,au.imagenconductor,
        au.marca , au.modelo, au.nropasajeros, au.nrochasis ,au.soat,au.a_soat,au.inspeccion ,au.color ,au.placa ,au.duenomovil,au.nrotelefono,au.tipovehiculo,au.created_at FROM automovil au
            JOIN conductor co ON co.id = au.conductorid
            WHERE au.estado = 1 ";

        $query = $this->query($sql);
        return $query->getResultArray();
    }
    public function eliminar_automovil($id)
    {
        $builder = $this->db->table('automovil');
        $builder->where('id', $id);
        $builder->update(['estado' => 0]);

        return $this->affectedRows();
    }
    public function extracion_Datos_Vehiculo($id)
    {
        $sql = "SELECT * FROM automovil
            WHERE id= $id; ";

        $query = $this->query($sql);
        return $query->getResultArray();

    }

    public function actualiza_vehiculo($id, $data)
    {
        $builder = $this->db->table('automovil');


        $builder->set('conductorid', $data['conductorid'])
            ->set('imagenautomovil', $data['imagenautomovil'])
            ->set('imagenconductor', $data['imagenconductor'])
            ->set('marca', $data['marca'])
            ->set('modelo', $data['modelo'])
            ->set('nropasajeros', $data['nropasajeros'])
            ->set('nrochasis', $data['nrochasis'])
            ->set('soat', $data['soat'])
            ->set('a_soat', $data['a_soat'])
            ->set('inspeccion', $data['inspeccion'])
            ->set('color', $data['color'])
            ->set('placa', $data['placa'])
            ->set('duenomovil', $data['duenomovil'])
            ->set('nrotelefono', $data['nrotelefono'])
            ->set('tipovehiculo', $data['tipovehiculo'])
            ->set('updated_at', $data['updated_at'])
            ->where('id', $id)
            ->update();
    }
    /*****************************************************************************************************
     * MODELO PARA EL GUIA TELEFONIA
     *****************************************************************************************************/
    //agreagr guia telefonica
    public function insertar_telefono($data)
    {
        $builder = $this->db->table('guiatelefonica');

        $builder->insert($data);
        return $this->db->insertID();
    }
    public function datos_telefonos()
    {
        $sql = "SELECT id, nombre, cargo, correoelectronico, telefono, direccion, estado, created_at
        FROM guiatelefonica where estado=1;
        ";

        $query = $this->query($sql);
        return $query->getResultArray();
    }
    public function eliminar_telefono($id)
    {
        $builder = $this->db->table('guiatelefonica');
        $builder->where('id', $id);
        $builder->update(['estado' => 0]);

        return $this->affectedRows();
    }
    public function extracion_Datos_Telefono($id)
    {
        $sql = "SELECT * FROM guiatelefonica
            WHERE id= $id; ";

        $query = $this->query($sql);
        return $query->getResultArray();

    }
    public function actualiza_telefono($id, $data)
    {
        $builder = $this->db->table('guiatelefonica');
        $builder->set('nombre', $data['nombre'])
            ->set('cargo', $data['cargo'])
            ->set('correoelectronico', $data['correoelectronico'])
            ->set('telefono', $data['telefono'])
            ->set('direccion', $data['direccion'])
            ->set('updated_at', $data['updated_at'])
            ->where('id', $id)
            ->update();
            return $this->affectedRows();
    }

} 