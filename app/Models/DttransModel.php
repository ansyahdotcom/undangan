<?php

namespace App\Models;

use CodeIgniter\Model;

class DttransModel extends Model
{
    protected $table = 'dt_transaksi';
    protected $primaryKey = 'id_tmu';
    protected $useTimestamps = true;
    protected $createdField = 'created_dtr';
    protected $updatedField = 'updated_dtr';
    protected $allowedFields = ['id_tr', 'nama_tamu', 'no_wa'];

    function dataTamu()
    {
        $data = $this->db->query("SELECT * FROM dt_transaksi");
        return $data;
    }
}
