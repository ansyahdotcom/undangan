<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\TransaksiModel;
use App\Models\RsvpModel;

class Dashboard extends BaseController
{
    protected $LoginModel;
    protected $TransaksiModel;
    protected $RsvpModel;
    public function __construct()
    {
        $this->LoginModel = new LoginModel;
        $this->TransaksiModel = new TransaksiModel;
        $this->RsvpModel = new RsvpModel;
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
                'title' => 'Dashboard',
                'jml_psn' => $this->TransaksiModel->countAll(),
                'jml_tamu' => $this->RsvpModel->countAll()
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
    
}
