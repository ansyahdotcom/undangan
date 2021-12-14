<?php

namespace App\Models;

use CodeIgniter\Model;

class TemplateModel extends Model
{
    protected $table = 'template';
    protected $primaryKey = 'id_tr';
    protected $useTimestamps = true;
    protected $createdField = 'created_tr';
    protected $updatedField = 'updated_tr';
    protected $allowedFields = ['id_tm', 'nama_tm', 'harga_tm'];
}
