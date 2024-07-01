<?php
namespace App\Models;

use CodeIgniter\Model;

class GestionDispositivoModel extends Model
{
    protected $table = 'dispositivo_gps';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'marca',
        'modelo',
        'movilidad_id',
        'descripcion',
        'detalles',
        'estado',
        'created_at',
        'updated_at'
    ];
    public function obtener_datos_movilidad()
    {
        $sql = "SELECT id,placa
        FROM automovil where estado=1;
        ";
        $query = $this->query($sql);
        return $query->getResultArray();
    }
    //obtener los datos para la tabla
    public function obtener_datosGPS()
    {
        $sql = "SELECT dis.id, dis.marca, dis.modelo, au.placa, dis.descripcion, dis.detalles, dis.created_at
        FROM dispositivo_gps dis
        JOIN automovil au ON dis.movilidad_id = au.id
        WHERE dis.estado = 1";

        $query = $this->db->query($sql);
        return $query->getResult();

    }
    //insertar dispositivo
    public function insertar_dispositivoGPS($data)
    {
        $this->insert($data);
        return $this->insertID();
    }

    public function actualizar_GPS($id, $data)
    {
        $this->update($id, $data);
        return $this->affectedRows();
    }
    public function extracion_Datos_DispositivoGPS($id)
    {
        return $this->where('id', $id)->findAll();
    }
    public function eliminar_dispositivoGPS($id)
    {
      
        $builder = $this->db->table('dispositivo_gps');
        $builder->where('id', $id);
        $builder->update(['estado' => 0]);

        return $this->affectedRows();
    }
    /***************************************************************************************************
     * modelo para el disposditivo RFID
     ***************************************************************************************************/
    //agregar dispositivo
    public function agregar_dispositivoRFID($data)
    {
        $builder = $this->db->table('dispositivo_rfid');

        $builder->insert($data);
        return $this->db->insertID();
    }
    //datos para la tabla
    public function datos_dispositivoRFID()
    {
        $sql = "SELECT dis.id, dis.marca, dis.modelo, au.placa, dis.descripcion, dis.detalle, dis.created_at
        FROM dispositivo_rfid dis
        JOIN automovil au ON dis.movilidad_id = au.id
        WHERE dis.estado = 1";

        $query = $this->db->query($sql);
        return $query->getResult();
    }
//eliminar dispositivo
    public function eliminar_dispositivoRFID($id)
    {
        $builder = $this->db->table('dispositivo_rfid');
        $builder->where('id', $id);
        $builder->update(['estado' => 0]);

        return $this->affectedRows();
    }
//extraer dato de dispositivo RFID
    public function extracion_Datos_RFID($id)
    {
        $sql = "SELECT * FROM dispositivo_rfid
            WHERE id= $id; ";

        $query = $this->query($sql);
        return $query->getResultArray();

    }
    public function actualiza_RFID($id, $data)
    {
       
        $builder = $this->db->table('dispositivo_rfid');
        $builder->set('marca', $data['marca'])
            ->set('modelo', $data['modelo'])
            ->set('movilidad_id', $data['movilidad_id'])
            ->set('descripcion', $data['descripcion'])
            ->set('detalle', $data['detalle'])
            ->set('updated_at', $data['updated_at'])
            ->where('id', $id)
            ->update();
            return $this->affectedRows();
    }



}