<?php

namespace App\Controllers;

class Landingpage extends BaseController
{
    public function index()
    {
        echo view('v_landingpage');
    }

    public function destiny()
    {
        echo view('template_undangan/destiny/index');
    }
}
