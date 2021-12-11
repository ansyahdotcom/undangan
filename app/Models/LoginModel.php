<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_adm';
    protected $useTimestamps = true;
    protected $createdField = 'created_adm';
    protected $updatedField = 'updated_adm';
    protected $allowedFields = ['nama_adm', 'username', 'password'];
}
