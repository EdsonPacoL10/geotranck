<?php

namespace App\Models;

use CodeIgniter\Model;

class log_model extends Model
{
    public function listarNombres() {
        $Nombres = $this->db->query("SELECT * FROM acceso");
        return $Nombres->getResult();
    }

}
