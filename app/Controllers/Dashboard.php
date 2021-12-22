<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Dashboard extends BaseController
{
    protected $LoginModel;
    public function __construct()
    {
        $this->LoginModel = new LoginModel;
    }
    public function index()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $data = [
                'admin' => $this->LoginModel->findAll(),
                'username' => $user['username'],
                'title' => "Dashboard"
            ];
            echo view('v_dashboard', $data);
        }
    }

    public function lihat($nama)
    {
        // $lihat = $this->LoginModel->where(['nama_adm' => $nama])->first();
        $data = [
            'lihat' => $this->LoginModel->where(['nama_adm' => $nama])->findAll()
        ];
        echo view('template_undangan/document', $data);
    }

    public function kirim()
    {
    }
}
