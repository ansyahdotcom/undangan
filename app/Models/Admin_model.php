<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin_model extends Model
{
       protected $table = 'admin';
       protected $primaryKey = 'id_adm';
       protected $useTimestamps = true;
       protected $createdField = 'created_adm';
       protected $updatedField = 'updated_adm';
       protected $allowedFields = ['nama_adm', 'username'];

       public function getdata()
       {
              $query = $this->db->query("SELECT * FROM admin");
              return $query->getResult();
       }

       function simpanData($table, $data)
       {
              $this->db->table($table)->insert($data);

              return true;
       }


       function editData($table, $data, $where)
       {
              $this->db->table($table)->update($data, $where);

              return true;
       }

       function hapusData($table, $where)
       {
              $this->db->table($table)->delete($where);

              return true;
       }
}
