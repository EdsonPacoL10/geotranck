<?php
namespace App\Models;

use CodeIgniter\Model;

class GestionEstudiantesAutos extends Model
{
    protected $table = 'automovilestudiante';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'usuarioagregador_id',
        'automovil_id',
        'estudiante_id',
        'estado',
        'created_at',
        'updated_at'
       ];

    /***************************************************************************************
     *datos para de automovil y auto 
     ***************************************************************************************/
    public function insertar_estudiante($data)
    {
        $this->insert($data);
        return $this->insertID();
    }
    public function datos_automoviles()
    {
        $sql = "   SELECT au.id,co.id as conductorid, co.nombre as nombreConductor, co.apellido as apellidoConductor, au.imagenautomovil,au.imagenconductor,
        au.marca , au.modelo, au.nropasajeros, au.nrochasis ,au.soat,au.a_soat,au.inspeccion ,au.color ,au.placa ,au.duenomovil,au.nrotelefono,au.tipovehiculo,au.created_at FROM automovil au
            JOIN conductor co ON co.id = au.conductorid
            WHERE au.estado = 1 ";

        $query = $this->query($sql);
        return $query->getResultArray();
    }


    public function ListaEstudianteAuto($id)
    {
        $sql = "select ae.id, e.imagenestudiante, e.nombre as nom_estudiante, e.apellido as ape_estudiante , e.curso,pa.nombretutor as nom_padre, pa.apellidotutor as ape_padre , pa.telefonotutor as tel_padre, pa.parentesco ,c.nombre as nom_conductor,c.apellido as ape_conductor,c.telefono as tel_conductor,a.marca ,a.modelo,a.color,a.placa
        from automovilestudiante ae 
        join automovil a on ae.automovil_id=a.id
        join conductor c on a.conductorid=c.id
        join perfilsistema ps on c.id=usuarioconductor_id
        join estudiantes e on ae.estudiante_id=e.id 
        join padre pa on e.tutor_id=pa.id
        where ps.id=$id and ae.estado=1";

        $query = $this->query($sql);
        return $query->getResultArray();
    }
    public function insertarAlertaConductor($data)
    {
        $sql = "INSERT INTO alerta_conductor (nom_estudiante, ape_estudiante, cur_estudiante, nom_padre, ape_padre, tel_padre,nom_conductor,ape_conductor,tel_conductor,mar_automovil,mod_automovil,color_automovil,placa_automovil,estado,created_at,updated_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $this->db->query($sql, [
            $data['nom_estudiante'],
            $data['ape_estudiante'],
            $data['cur_estudiante'],
            $data['nom_padre'],
            $data['ape_padre'],
            $data['tel_padre'],
            $data['nom_conductor'],
            $data['ape_conductor'],
            $data['tel_conductor'],
            $data['mar_automovil'],
            $data['mod_automovil'],
            $data['color_automovil'],
            $data['placa_automovil'],
            $data['estado'],
            $data['created_at'],
            $data['updated_at'],

        ]);


        return $this->db->insertID();
    }
    public function actualiza_lista($id)
    {
        $builder = $this->db->table('automovilestudiante');
        $builder->set('estado', 0)
            ->where('id', $id)
            ->update();
            return $this->affectedRows();
    }
    public function ListaAlerta()
    {
        $sql = "SELECT *FROM alerta_conductor WHERE estado=1";

        $query = $this->query($sql);
        return $query->getResultArray();
    }
    public function NroAlerta()
    {
      
            $builder = $this->db->table('alerta_conductor');
              
            return $builder->where('estado', 1)->countAllResults();
        
    }
    public function eliminar_alerta($id)
    {
        $table = 'alerta_conductor';
        $sql = "UPDATE $table SET estado = 0 WHERE id = $id";
        $query = $this->query($sql);
        // Devuelve el número de filas afectadas por la consulta
        return $this->affectedRows();
    }
    
 }