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
                'title' => 'Data Transaksi',
                'transaksi' => $this->TransaksiModel->findAll(),
                'username' => $user['username']
            ];
            echo view('transaksi/v_transaksi', $data);
        }
    }

    public function add()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $data = [
                'title' => 'Tambah Transaksi Baru'
            ];
            echo view('transaksi/v_add', $data);
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
            $row = $this->TransaksiModel->countAll();
            // Logic for auto id
            if ($row == 0) {
                $id = 'TRN-000001';
            } else {
                $row = $this->TransaksiModel->orderBy('id_tr', 'DESC')->first();
                $id = 'TRN-' . sprintf('%06d', substr($row['id_tr'], 5) + 1);
            }
            
            dd($id);
        }
    }
}
