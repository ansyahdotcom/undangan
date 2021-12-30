<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\DttransModel;
use App\Models\Dt_rsvpModel;
use App\Models\RsvpModel;

class Tamu extends BaseController
{
    protected $LoginModel;
    protected $DttransModel;
    protected $Dt_rsvpModel;
    protected $RsvpModel;
    public function __construct()
    {
        $this->LoginModel = new LoginModel;
        $this->DttransModel = new DttransModel;
        $this->Dt_rsvpModel = new Dt_rsvpModel;
        $this->RsvpModel = new RsvpModel;
    }

    public function index($id)
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $data = [
                'title' => 'Daftar Tamu',
                'username' => $user['username'],
                'trn' => $this->Dt_rsvpModel->getRSVP($id),
                'validation' => \Config\Services::validation()
            ];
            echo view('transaksi/v_tamu', $data);
        }
    }

    // public function addTamu()
    // {
    //     $id_tr = $this->request->getVar('id_tr');
    //     if (!$this->validate([
    //         'nama_tamu' => [
    //             'rules' => 'required|min_length[2]',
    //             'errors' => [
    //                 'required' => 'Nama tamu harus diisi',
    //                 'min_length[2]' => 'Nama harus jelas'
    //             ]
    //         ],
    //         'no_wa' => [
    //             'rules' => 'required|numeric|min_length[10]|max_length[12]',
    //             'errors' => [
    //                 'required' => 'Nomor WA tamu harus diisi',
    //                 'numeric' => 'Isikan hanya angka',
    //                 'min_length[10]' => 'Harap mengisi nomor dengan benar',
    //                 'max_length[12]' => 'Harap mengisi nomor dengan benar'
    //             ]
    //         ]
    //     ])) {
    //         $validation = \Config\Services::validation();
    //         return redirect()->to('/tamu/' . $id_tr)->withInput()->with('validation', $validation);
    //     }
    //     $this->DttransModel->save([
    //         'id_tr' => $id_tr,
    //         'nama_tamu' => $this->request->getVar('nama_tamu'),
    //         'no_wa' => '62' . $this->request->getVar('no_wa')
    //     ]);
    //     return redirect()->to('/tamu/' . $id_tr);
    // }

    public function delete()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $id = $this->request->getVar('id');
            $this->RsvpModel->delete($id);
            session()->setFlashdata('message', 'delete');
            return redirect()->back();
        }
    }

    // public function delTamu($id_tmu)
    // {
    //     $id_tr = $this->request->getVar('id_tr');
    //     $this->DttransModel->delete($id_tmu);
    //     session()->setFlashdata('message', 'delete');
    //     return redirect()->to('/tamu/' . $id_tr);
    // }
}
