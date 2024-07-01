<?php
namespace App\Models;

use CodeIgniter\Model;

class GestionDatosReportesModel extends Model
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

    public function obtenerDatosRuta()
    {
        $sql = "select c.nombre ,c.apellido,ru.nombre_estudiante,ru.apellido_estudiante, ST_X(ru.ubicacion) AS longitud, ST_Y(ru.ubicacion) AS latitud from rutaestudiante ru
join perfilsistema pr on ru.perfil_id=pr.id 
join conductor c on c.id=pr.usuarioconductor_id
where ru.perfil_id=25 and  DATE(ru.created_at) BETWEEN '2024-05-18' AND '2024-06-19';";
        $query = $this->db->query($sql);
        return $query->getResultArray();

    }

    public function repoPuntoParaMovilidades($id, $inicio, $final)
    {
        $sql = "select a.imagenautomovil,a.imagenconductor,a.marca, a.modelo,a.color,a.placa,c.nombre as nombreconductor,c.apellido as apellidoconductor,c.telefono as telefonoconductor,c.direccion as direccionconductor,r.estadoruta, r.nombre_estudiante,r.apellido_estudiante,ST_X(r.ubicacion) AS longitud, ST_Y(r.ubicacion) AS latitud 
                  ,DATE(r.created_at)  from rutaestudiante r 
                    join perfilsistema pe on r.perfil_id = pe.id
                    join conductor c on pe.usuarioconductor_id=c.id 
                    join automovil a on a.conductorid=c.id 
                    where a.id=$id and  DATE(r.created_at) BETWEEN '$inicio' AND '$final'
                ";
        $query = $this->db->query($sql);
        return $query->getResultArray();

    }
    public function repoEstudiantesRegistrador($inicio, $final)
    {
        if (!empty($inicio) && !empty($final)) {
            $where = "DATE(e.created_at) BETWEEN '$inicio' and '$final' and";
        } else {
            $where = " ";
        }
        $sql = "
            select e.nombre,e.apellido,e.ci,e.edad,e.codigo,p.nombretutor,p.apellidotutor,p.telefonotutor,p.parentesco,DATE(e.created_at) from estudiantes e
            join padre p on e.tutor_id=p.id where $where e.estado=1;
            ";
        $query = $this->db->query($sql);
        return $query->getResultArray();

    }
    public function repoAutomovilRegistrador($inicio, $final)
    {
        if (!empty($inicio) && !empty($final)) {
            $where = "DATE(a.created_at) BETWEEN '$inicio' and '$final' and";
        } else {
            $where = " ";
        }
        $sql = "
           select a.marca, a.modelo ,a.nropasajeros,a.soat,a.color,a.placa,a.tipovehiculo,
			c.nombre as nombreconductor ,c.apellido as apellidoconductor ,c.ci,c.telefono,c.direccion ,DATE(a.created_at)from automovil a
			join conductor c on a.conductorid=c.id where  $where a.estado=1;
            ";
        $query = $this->db->query($sql);
        return $query->getResultArray();

    }
    public function repoGuiaTelefonica()
    {
        $sql = "select*,DATE(created_at) from guiatelefonica where estado=1;
            ";
        $query = $this->db->query($sql);
        return $query->getResultArray();

    }

    public function repoEstudiantesAuto($id)
    {
        $sql = "select ae.id,a.imagenautomovil,a.imagenconductor, e.nombre as nom_estudiante, e.apellido as ape_estudiante , e.curso,pa.nombretutor as nom_padre, pa.apellidotutor as ape_padre , pa.telefonotutor as tel_padre, pa.parentesco ,c.nombre as nom_conductor,c.apellido as ape_conductor,c.telefono as tel_conductor,a.marca ,a.modelo,a.color,a.placa
        ,DATE(ae.created_at)from automovilestudiante ae 
        join automovil a on ae.automovil_id=a.id
        join conductor c on a.conductorid=c.id
        join perfilsistema ps on c.id=usuarioconductor_id
        join estudiantes e on ae.estudiante_id=e.id 
        join padre pa on e.tutor_id=pa.id
        where a.id=$id and ae.estado=1";

        $query = $this->query($sql);
        return $query->getResultArray();
    }









}