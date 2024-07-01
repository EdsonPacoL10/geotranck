<?php
namespace App\Models;

use CodeIgniter\Model;

class GestionDatosGraficasModel extends Model
{
   
    public function numeroUsuarios()
{
    $builder = $this->db->table('estudiantes');
    $builder->where('estado', 1);
    $estudiantes = $builder->countAllResults();

    

    $builder = $this->db->table('padre');
    $builder->where('estado', 1);

    $padre = $builder->countAllResults();

    $builder = $this->db->table('conductor');
    $builder->where('estado', 1);

    $conductor = $builder->countAllResults();

    $builder = $this->db->table('administrador');
    $builder->where('estado', 1);

    $administrador = $builder->countAllResults();


    return [
        'estudiantes' => $estudiantes,
        'padre' => $padre,
        'conductor' => $conductor,
        'administrador' => $administrador

    ];
}

public function numeroUsuariosDispositivo()
{
    $builder = $this->db->table('dispositivo_gps');
    $builder->where('estado', 1);
    $dispositivos_gps = $builder->countAllResults();

    $builder = $this->db->table('dispositivo_rfid');
    $builder->where('estado', 1);
    $dispositivos_rfid = $builder->countAllResults();

    $builder = $this->db->table('automovil');
    $builder->where('estado', 1);
    $automovil = $builder->countAllResults();

    return [
        'dispositivos_gps' => $dispositivos_gps,
        'dispositivos_rfid' => $dispositivos_rfid,
        'automovil' => $automovil
    ];
}

}