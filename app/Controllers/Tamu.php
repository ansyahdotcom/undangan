<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\DttransModel;

class Tamu extends BaseController
{
    protected $LoginModel;
    protected $DttransModel;
    public function __construct()
    {
        $this->LoginModel = new LoginModel;
        $this->DttransModel = new DttransModel;
    }

    public function index($id_tr)
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $data = [
                'title' => 'Tamu',
                'username' => $user['username'],
                'id_tr' => $id_tr,
                'tamu' => $this->DttransModel->where(['id_tr' => $id_tr])->orderBy('id_tmu', 'DESC')->findAll(),
                'validation' => \Config\Services::validation()
            ];
            echo view('v_tamu', $data);
        }
    }

    public function addTamu()
    {
        $id_tr = $this->request->getVar('id_tr');
        if (!$this->validate([
            'nama_tamu' => [
                'rules' => 'required|min_length[2]',
                'errors' => [
                    'required' => 'Nama tamu harus diisi',
                    'min_length[2]' => 'Nama harus jelas'
                ]
            ],
            'no_wa' => [
                'rules' => 'required|numeric|min_length[10]|max_length[12]',
                'errors' => [
                    'required' => 'Nomor WA tamu harus diisi',
                    'numeric' => 'Isikan hanya angka',
                    'min_length[10]' => 'Harap mengisi nomor dengan benar',
                    'max_length[12]' => 'Harap mengisi nomor dengan benar'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/tamu/' . $id_tr)->withInput()->with('validation', $validation);
        }
        $this->DttransModel->save([
            'id_tr' => $id_tr,
            'nama_tamu' => $this->request->getVar('nama_tamu'),
            'no_wa' => '62' . $this->request->getVar('no_wa')
        ]);
        return redirect()->to('/tamu/' . $id_tr);
    }

    public function editTamu()
    {
        $id_tr = $this->request->getVar('id_tr');
        if (!$this->validate([
            'nama_tamu' => [
                'rules' => 'required|min_length[2]',
                'errors' => [
                    'required' => 'Nama tamu harus diisi',
                    'min_length[2]' => 'Nama harus jelas'
                ]
            ],
            'no_wa' => [
                'rules' => 'required|numeric|min_length[10]|max_length[12]',
                'errors' => [
                    'required' => 'Nomor WA tamu harus diisi',
                    'numeric' => 'Isikan hanya angka',
                    'min_length[10]' => 'Harap mengisi nomor dengan benar',
                    'max_length[13]' => 'Harap mengisi nomor dengan benar'
                ]
            ]
        ])) {
            session()->setFlashdata('message', 'notedit');
            return redirect()->to('/tamu/' . $id_tr);
        }
        $this->DttransModel->save([
            'id_tmu' => $this->request->getVar('id_tmu'),
            'id_tr' => $id_tr,
            'nama_tamu' => $this->request->getVar('nama_tamu'),
            'no_wa' => '62' . $this->request->getVar('no_wa')
        ]);
        session()->setFlashdata('message', 'edit');
        return redirect()->to('/tamu/' . $id_tr);
    }

    public function delTamu($id_tmu)
    {
        $id_tr = $this->request->getVar('id_tr');
        $this->DttransModel->delete($id_tmu);
        session()->setFlashdata('message', 'delete');
        return redirect()->to('/tamu/' . $id_tr);
    }
}
