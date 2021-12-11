<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    protected $LoginModel;
    protected $TransaksiModel;
    public function __construct()
    {
        $this->LoginModel = new LoginModel;
        $this->TransaksiModel = new TransaksiModel;
    }
    public function index()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $data = [
                'transaksi' => $this->TransaksiModel->findAll(),
                'username' => $user['username']
            ];
            echo view('v_transaksi', $data);
        }
    }
}
