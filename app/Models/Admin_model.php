<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin_model extends Model
{
       public function getdata()
       {
              $query = $this->db->query("SELECT * FROM admin");
              return $query->getResult();
       }
}
