<?php

namespace App\Models;

use CodeIgniter\Model;

class GestionSeguimientoGPS extends Model
{

    //filter
    public function insertarDatosGps($data)
    {
        $sql = "
        INSERT INTO seguimientotiemporeal (id_usuario, ubicacionTipoReal,estado, created_at, updated_at)
        VALUES ( ?, ST_GeomFromText('POINT(' || ? || ' ' || ? || ')', 4326), ?, ?, ?)
    ";
        $query = $this->db->query($sql, [
            $data['id_usuario'],
            $data['longitude'],
            $data['latitude'],
            $data['estado'],
            $data['created_at'],
            $data['updated_at'],
        ]);
        // Verificar si la inserción fue exitosa
        if ($this->db->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }

    }
    public function extraerRutaGps()
    {
        $id = session()->id_perfil;
        $sql = "SELECT ST_X(ubicacionTipoReal) AS longitud, ST_Y(ubicacionTipoReal) AS latitud
                FROM seguimientotiemporeal
                WHERE id_usuario=$id and estado = 1";

        $query = $this->db->query($sql);

        if ($query) {

            $resultados = $query->getResultArray();

            return $resultados;
        } else {

            return [];
        }
    }
    public function Eliminar()
    {
        $id = session()->id_perfil;
        $sql = "DELETE FROM seguimientotiemporeal where id_usuario=$id;";
        $query = $this->db->query($sql);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function GuardarDatosRuta($data)
    {
        $sql = "
        INSERT INTO rutasAutomovil (id_usuario, ubicacionTipoReal,estado, created_at, updated_at) values
        ( $data[id_usuario] , ST_GeomFromText('$data[LINESTRING]', 4326),  $data[estado], '$data[created_at]' , '$data[updated_at]');
        ";
        $this->db->query($sql, [
            $data['id_usuario'],
            $data['LINESTRING'],
            $data['estado'],
            $data['created_at'],
            $data['updated_at'],
        ]);
        // Verificar si la inserción fue exitosa
    }
    public function obtenerUltimoMarcador($id)
    {
        $query = $this->db->table('seguimientotiemporeal sr')
            ->select('sr.id, co.nombre, co.apellido, co.telefono, sr.id_usuario, ST_X(sr.ubicacionTipoReal) AS longitud, ST_Y(sr.ubicacionTipoReal) AS latitud , sr.created_at')
            ->join('perfilsistema pe', 'pe.id = sr.id_usuario')
            ->join('conductor co', 'pe.usuarioconductor_id = co.id')
            ->where('pe.usuarioconductor_id', $id)
            ->where('pe.estado', 1)
            ->orderBy('sr.id', 'DESC')
            ->limit(1)
            ->get();
        $resultado = $query->getRowArray(); // Obtener el primer y único resultado como un array asociativo
        return $resultado;
    }

    public function RutaEstudiante($data)
    {
        $sql = "
        INSERT INTO rutaEstudiante (
            perfil_id, EstadoRuta, nombre_estudiante, apellido_estudiante, ubicacion, estado, created_at, updated_at
        ) VALUES (
            ?, ?, ?, ?, ST_GeomFromText(?, 4326), ?, ?, ?
        );
    ";
    
    $this->db->query($sql, [
        $data['id_usuario'],
        $data['EstadoRuta'],
        $data['nombre_estudiante'],
        $data['apellido_estudiante'],
        $data['LINESTRING'],
        $data['estado'],
        $data['created_at'],
        $data['updated_at']
    ]);

    if ($this->db->affectedRows() > 0) {
        return true;
    } else {
        return false;
    }
        // Verificar si la inserción fue exitosa
    }

}
