<?php
namespace App\Models;

use CodeIgniter\Model;

class GestionEstudianteModel extends Model
{
    protected $table = 'estudiantes';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'imagenestudiante',
        'nombre',
        'apellido',
        'ci',
        'telefono',
        'edad',
        'genero',
        'curso',
        'fechainscripcion',
        'fechanacimiento',
        'tutor_id',
        'automovil_id',
        'rfid_id',
        'codigo',
        'estado',
        'created_at',
        'updated_at',
        'codigoestudiante'
    ];

    /***************************************************************************************
     *datos para estudiante 
     */

     public function numeroEstudiantes()
     {
        $builder = $this->db->table($this->table);
        $builder->select('COUNT(*) AS nroestudiantes');
        $builder->where('estado', 1);
        
        $query = $builder->get();
        return $query->getRowArray(); 
     }
     public function numeroautomovil()
     {
        $table = 'automovil'; // Declarar la tabla directamente en la función
        $builder = $this->db->table($table);
        $builder->select('COUNT(*) AS nroautomoviles');
        $builder->where('estado', 1);
        
        $query = $builder->get();
        return $query->getRowArray();
     }
   
    public function obtener_datos_tutor()
    {
        $sql = "SELECT id, nombretutor, apellidotutor 
        FROM padre 
        WHERE (trim(nombretutor) != '' OR trim(apellidotutor) != '') AND estado = 1 ;
        ";
        $query = $this->query($sql);
        return $query->getResultArray();
    }
    
    public function obtener_datos_automovil_dispositivo()
    {
        $sql = "
        SELECT a.id, a.placa, gps.modelo as gps, rfid.modelo as rfid
        FROM automovil a
        JOIN dispositivo_gps gps ON a.id = gps.movilidad_id
        JOIN dispositivo_rfid rfid ON a.id = rfid.movilidad_id
        WHERE a.estado = 1;
        ";
        $query = $this->query($sql);
        return $query->getResultArray();
    }

    //insertar dispositivo
    public function insertar_estudiante($data)
    {
        $this->insert($data);
        return $this->insertID();
    }
    //insertar ubicacion
    public function insertar_ubicacion($data)
    {
        $sql = "
            INSERT INTO hogar_estudiante (estudiante_id, tipo, descripcion, avenida, puerta, ubicacion, estado, created_at, updated_at)
            VALUES (?, ?, ?, ?, ?, ST_GeomFromText('POINT(' || ? || ' ' || ? || ')', 4326), ?, ?, ?)
        ";

        $query = $this->db->query($sql, [
            $data['estudiante_id'],
            $data['tipo'],
            $data['descripcion'],
            $data['avenida'],
            $data['puerta'],
            $data['longitud'],
            $data['latitud'],
            $data['estado'],
            $data['created_at'],
            $data['updated_at']
        ]);
        // Verificar si la inserción fue exitosa
        if ($this->db->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    //datos para la tabla
    public function obtener_datosEstudiante()
    {
        $sql = "    
        SELECT e.id,e.imagenestudiante,e.nombre,e.apellido,e.ci,e.telefono,e.edad,e.genero,e.curso,e.fechainscripcion,e.fechanacimiento
        ,p.nombretutor,p.apellidotutor,c.nombre as nombreconductor,c.apellido as apellidoconductor,c.telefono as telefonoconductor ,a.placa,e.created_at,e.codigoestudiante
        FROM estudiantes e
        LEFT JOIN padre p ON e.tutor_id = p.id
        LEFT JOIN automovil a ON e.automovil_id = a.id
        LEFT JOIN conductor c ON a.conductorid = c.id
        
        WHERE e.estado = 1;                              
        ";

        $query = $this->db->query($sql);
        return $query->getResult();

    }
    public function eliminar_estudiante($id)
    {
        $builder = $this->db->table('estudiantes');
        $builder->where('id', $id);
        $builder->update(['estado' => 0]);

        return $this->affectedRows();
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