<?php
namespace App\Models;

use CodeIgniter\Model;

class GestionModeloDatosGeoModel extends Model
{

    public function UbicacionHogarEstudiante()
    {
        $query = $this->db->table('estudiantes e')
        ->select('e.imagenestudiante, e.nombre,e.apellido,e.curso, ST_X(h.ubicacion) AS longitud,
        ST_Y(h.ubicacion) AS latitud ,h.tipo,h.descripcion,h.avenida,h.puerta')
        ->join('hogar_estudiante h', 'e.id = h.estudiante_id')
        ->where('e.estado', 1)
        ->get();
    
    return $query->getResultArray();
    }
    public function ListaEstudianteAutoConductor($id)
    {
        $query = $this->db->table('automovilestudiante ae')
        ->select('
            ae.id, 
            e.imagenestudiante, 
            e.nombre as nombre, 
            e.apellido as apellido, 
            e.curso,
            pa.nombretutor as nom_padre, 
            pa.apellidotutor as ape_padre, 
            pa.telefonotutor as tel_padre, 
            pa.parentesco,
            c.nombre as nom_conductor, 
            c.apellido as ape_conductor, 
            c.telefono as tel_conductor, 
            a.marca, 
            a.modelo, 
            a.color, 
            a.placa, 
            ST_X(h.ubicacion) AS longitud, 
            ST_Y(h.ubicacion) AS latitud, 
            h.tipo, 
            h.descripcion, 
            h.avenida, 
            h.puerta
        ')
        ->join('automovil a', 'ae.automovil_id = a.id')
        ->join('conductor c', 'a.conductorid = c.id')
        ->join('perfilsistema ps', 'c.id = usuarioconductor_id')
        ->join('estudiantes e', 'ae.estudiante_id = e.id')
        ->join('hogar_estudiante h', 'h.estudiante_id = e.id')
        ->join('padre pa', 'e.tutor_id = pa.id')
        ->where('ps.id', $id)
        ->where('ae.estado', 1)
        ->get();

        return $query->getResultArray();
    }

}