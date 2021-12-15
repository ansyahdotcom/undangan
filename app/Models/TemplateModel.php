<?php

namespace App\Models;

use CodeIgniter\Model;

class TemplateModel extends Model
{
    protected $table = 'template';
    protected $primaryKey = 'id_tm';
    protected $useTimestamps = true;
    protected $createdField = 'created_tm';
    protected $updatedField = 'updated_tm';
    protected $allowedFields = ['id_tm', 'nama_tm', 'harga_tm'];

    public function editTemplate($id)
    {
        return $this->getWhere(['id_tm' => $id])
        ->getRowArray();
    }
}
