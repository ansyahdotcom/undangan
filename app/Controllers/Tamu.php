<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\Dt_rsvpModel;
use App\Models\RsvpModel;

class Tamu extends BaseController
{
    protected $LoginModel;
    protected $Dt_rsvpModel;
    protected $RsvpModel;
    public function __construct()
    {
        $this->LoginModel = new LoginModel;
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
            echo view('customer/v_tamu', $data);
        }
    }

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
}
