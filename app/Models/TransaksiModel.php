<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_tr';
    protected $useTimestamps = true;
    protected $createdField = 'created_tr';
    protected $updatedField = 'updated_tr';
    protected $allowedFields = ['nama_pria', 'nama_wanita', 'foto_pria'];
}
