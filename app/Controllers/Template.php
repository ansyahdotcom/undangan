<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\TemplateModel;

class Template extends BaseController
{
    protected $LoginModel;
    protected $TemplateModel;
    public function __construct()
    {
        $this->LoginModel = new LoginModel;
        $this->TemplateModel = new TemplateModel;
    }

    public function index()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $data = [
                'title' => 'Data Template',
                'template' => $this->TemplateModel->findAll(),
                'username' => $user['username']
            ];
            echo view('undangan/v_template', $data);
        }
    }

    public function add()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $data = [
                'title' => 'Tambah Template Baru'
            ];
            echo view('undangan/v_addTemplate', $data);
        }
    }

    public function save()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            /** 
             * MAKE AUTO ID VARCHAR
             * 
             * */
            // Count all data
            $row = $this->TemplateModel->countAll();
            // Logic for auto id
            if ($row == 0) {
                $id = 'TM-000001';
            } else {
                $row = $this->TemplateModel->orderBy('id_tm', 'DESC')->first();
                $id = 'TM-' . sprintf('%06d', substr($row['id_tm'], 5) + 1);
            }

            dd($id);
        }
    }
}
