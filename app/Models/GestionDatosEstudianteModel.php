<?php
namespace App\Models;

use CodeIgniter\Model;

class GestionDatosEstudianteModel extends Model
{
    //extraccion de datos de estudiante para administrador
    public function datosEstudianteAdministrador()
    {
        $sql = "SELECT es.id, es.imagenestudiante, es.nombre, es.apellido, p.nombretutor, p.apellidotutor, p.telefonotutor 
         FROM estudiantes es
         JOIN padre p ON es.tutor_id = p.id
         WHERE es.estado = 1";
         $query = $this->db->query($sql);
        return $query->getResultArray();
    }
    public function NroEstudiantes()
    {
        $sql = "select count(*) as numeroes from estudiantes where estado=1";
         $query = $this->db->query($sql);
        return $query->getResultArray();
    }
    public function NroPerfiles()
    {
        $sql = "select count(*) as numeroper from perfilsistema where estado=1";
         $query = $this->db->query($sql);
        return $query->getResultArray();
    }
    public function NroEstudiantesAuto($id)
    {
        $sql = "select count(*) as numeroes from automovilestudiante ae 
        join automovil a on ae.automovil_id=a.id
        join conductor c on a.conductorid=c.id
        join perfilsistema ps on c.id=usuarioconductor_id
        join estudiantes e on ae.estudiante_id=e.id 
		join hogar_estudiante h on h.estudiante_id=e.id 
        join padre pa on e.tutor_id=pa.id
        where ps.id=$id and ae.estado=1
		";
         $query = $this->db->query($sql);
        return $query->getResultArray();
    }


    //Datos estudiante que el padre podra ver 
    public function datosEstudianteParaPadre($id)
    {
        $sql = "select c.id ,es.imagenestudiante as img ,es.nombre as nomestudiante , es.apellido as apeestudiant,es.ci as cedulaestudiante ,
		pa.nombretutor as nompadre , pa.apellidotutor as apellidopadre, pa.telefonotutor as telefonopadre,
		a.imagenautomovil as imgauto ,a.marca ,a.modelo ,a.color,a.placa,
		c.nombre as nomconductor, c.apellido as apellidoconductor ,c.telefono,
		he.tipo,he.descripcion,he.avenida,ST_X(he.ubicacion) AS longitud,
        ST_Y(he.ubicacion) AS latitud
		 from estudiantes es
		join padre pa on es.tutor_id=pa.id 
		join automovilestudiante au on es.id= au.estudiante_id
		join automovil a on au.automovil_id= a.id 
		join conductor c on a.conductorid =c.id 
		join perfilsistema per on per.usuariopadre_id=pa.id
		join hogar_estudiante he on he.estudiante_id=es.id  where  per.id=$id and  per.estado =1
        ";
         $query = $this->db->query($sql);
        return $query->getResultArray();
    }
    public function datosUbicacionRealConductor($id)
    {
        $sql = "select c.id from estudiantes es
		join padre pa on es.tutor_id=pa.id 
		join automovilestudiante au on es.id= au.estudiante_id
		join automovil a on au.automovil_id= a.id 
		join conductor c on a.conductorid =c.id 
		join perfilsistema per on per.usuariopadre_id=pa.id
		join hogar_estudiante he on he.estudiante_id=es.id  where  per.id=$id and  per.estado =1
        ";
         $query = $this->db->query($sql);
        return $query->getResultArray();
    }



}