<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Admin_model;

class Admin_controllers extends Controller
{
       protected $madmin;
       public function __construct()
       {
              $this->madmin = new Admin_model();
       }

       public function index()
       {
              $data = array(
                     'dataAdmin' => $this->
              );
       }
}
