<?php 

namespace App\Controllers;

class Landingpage extends BaseController
{
    public function index()
    {
        echo view('v_landingpage');
    }
}
