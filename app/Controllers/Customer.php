<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\CustomerModel;
use App\Models\RsvpModel;
use App\Models\dt_rsvpModel;

class Customer extends BaseController
{
    protected $LoginModel;
    protected $CustomerModel;
    protected $RsvpModel;
    protected $dt_rsvpModel;
    public function __construct()
    {
        $this->LoginModel = new LoginModel;
        $this->CustomerModel = new CustomerModel;
        $this->RsvpModel = new RsvpModel;
        $this->dt_rsvpModel = new dt_rsvpModel;
    }

    public function index()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $data = [
                'title' => 'Data Customer',
                'customer' => $this->CustomerModel->findAll(),
                'username' => $user['username']
            ];
            echo view('customer/v_customer', $data);
        }
    }

    public function addcust()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $data = [
                'title' => 'Tambah Customer Baru',
                'username' => $user['username']
            ];
            echo view('customer/v_addcustomer', $data);
        }
    }

    public function save()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            /** 
             * =====================
             * MAKE AUTO ID VARCHAR
             * =====================
             * */
            // Count all data
            $row = $this->CustomerModel->countAll();
            // Logic for auto id
            if ($row == 0) {
                $id = 'CST-000001';
            } else {
                $row = $this->CustomerModel->orderBy('id_tr', 'DESC')->first();
                $id = 'CST-' . sprintf('%06d', substr($row['id_tr'], 5) + 1);
            }

            // get form data
            $data = [
                'id_tr' => $id,
                'nama_pria' => $this->request->getVar('nm_pria'),
                'nama_wanita' => $this->request->getVar('nm_wanita'),
                'nomor_hp' => $this->request->getVar('no_hp')
            ];

            // query builder insert 
            $this->CustomerModel->insert($data);
            session()->setFlashdata('message', 'save');
            return redirect()->to('/customer');
        }
    }

    public function editcust($id)
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $data = [
                'title' => 'Edit Customer',
                'username' => $user['username'],
                'cst' => $this->CustomerModel->where(['id_tr' => $id])->first()
            ];
            echo view('customer/v_editcustomer', $data);
        }
    }

    public function update()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $id = $this->request->getVar('id');

            // get data from form
            $data = [
                'id_tr' => $id,
                'nama_pria' => $this->request->getVar('nm_pria'),
                'nama_wanita' => $this->request->getVar('nm_wanita'),
                'nomor_hp' => $this->request->getVar('no_hp')
            ];

            // update data in database
            $this->CustomerModel->save($data);
            session()->setFlashdata('message', 'edit');
            return redirect()->to('/customer/edit/' . $id);
        }
    }

    public function delete()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $id = $this->request->getVar('id');
            $rsvp_data = $this->dt_rsvpModel->getRSVP($id);

            // delete data in database
            foreach ($rsvp_data as $dt) {
                $this->RsvpModel->delete($dt['id_rsvp']);
            }
            $this->dt_rsvpModel->where("tr_id", $id)->delete();
            $this->CustomerModel->delete($id);
            session()->setFlashdata('message', 'delete');
            return redirect()->to('/customer');
        }
    }

    public function bulk_delete()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $id = $this->request->getVar('check');

            if ($id == "") {
                session()->setFlashdata('message', 'empty');
                return redirect()->to('/customer');
            } else {
                // find foto name by id
                foreach ($id as $i) {
                    // delete data in database
                    $this->CustomerModel->delete($i);
                }

                session()->setFlashdata('message', 'delete');
                return redirect()->to('/customer');
            }
        }
    }

    public function tema1($id)
    {
        $data = [
            'title' => 'RSVP',
            'trn' => $this->CustomerModel->getById($id),
        ];

        echo view('rsvpform/formtema1', $data);
    }

    public function savetema1()
    {
        $row = $this->RsvpModel->countAll();
        if ($row == 0) {
            $id_rsvp = 'RSV-000001';
        } else {
            $row = $this->RsvpModel->orderBy('id_rsvp', 'DESC')->first();
            $id_rsvp = 'RSV-' . sprintf('%06d', substr($row['id_rsvp'], 5) + 1);
        }

        $id_tr = $this->request->getVar('id');

        $rsvp = [
            'id_rsvp' => $id_rsvp,
            'nama_tamu' => $this->request->getVar('nama'),
            'jumlah' => $this->request->getVar('jml_tamu'),
            'no_wa' => $this->request->getVar('no_hp'),
            'kehadiran' => $this->request->getVar('kehadiran'),
        ];

        if ($rsvp['nama_tamu'] == "" || $rsvp['jumlah'] == "" || $rsvp['no_wa'] == "" || $rsvp['kehadiran'] == "") {
            return redirect()->to('/customer/tema1/' . $id_tr);
        }

        $dt_rsvp = [
            'rsvp_id' => $id_rsvp,
            'tr_id' => $id_tr,
        ];

        $this->RsvpModel->insert($rsvp);
        $this->dt_rsvpModel->insert($dt_rsvp);
        session()->setFlashdata('message', '<div class="alert alert-success">RSVP berhasil dikirim!</div>');
        return redirect()->to('/customer/tema1/' . $id_tr);
    }

    public function tema2($id)
    {
        $data = [
            'trn' => $this->CustomerModel->getById($id),
        ];

        echo view('rsvpform/formtema2', $data);
    }

    public function savetema2()
    {
        $row = $this->RsvpModel->countAll();
        if ($row == 0) {
            $id_rsvp = 'RSV-000001';
        } else {
            $row = $this->RsvpModel->orderBy('id_rsvp', 'DESC')->first();
            $id_rsvp = 'RSV-' . sprintf('%06d', substr($row['id_rsvp'], 5) + 1);
        }

        $id_tr = $this->request->getVar('id');

        $rsvp = [
            'id_rsvp' => $id_rsvp,
            'nama_tamu' => $this->request->getVar('nama'),
            'jumlah' => $this->request->getVar('jml_tamu'),
            'no_wa' => $this->request->getVar('no_hp'),
            'kehadiran' => $this->request->getVar('kehadiran'),
        ];

        if ($rsvp['nama_tamu'] == "" || $rsvp['jumlah'] == "" || $rsvp['no_wa'] == "" || $rsvp['kehadiran'] == "") {
            return redirect()->to('/customer/tema2/' . $id_tr);
        }

        $dt_rsvp = [
            'rsvp_id' => $id_rsvp,
            'tr_id' => $id_tr,
        ];

        $this->RsvpModel->insert($rsvp);
        $this->dt_rsvpModel->insert($dt_rsvp);
        session()->setFlashdata('message', '<div class="alert alert-success">RSVP berhasil dikirim!</div>');
        return redirect()->to('/customer/tema2/' . $id_tr);
    }

    public function tema3($id)
    {
        $data = [
            'trn' => $this->CustomerModel->getById($id),
        ];

        echo view('rsvpform/formtema3', $data);
    }

    public function savetema3()
    {
        $row = $this->RsvpModel->countAll();
        if ($row == 0) {
            $id_rsvp = 'RSV-000001';
        } else {
            $row = $this->RsvpModel->orderBy('id_rsvp', 'DESC')->first();
            $id_rsvp = 'RSV-' . sprintf('%06d', substr($row['id_rsvp'], 5) + 1);
        }

        $id_tr = $this->request->getVar('id');

        $rsvp = [
            'id_rsvp' => $id_rsvp,
            'nama_tamu' => $this->request->getVar('nama'),
            'jumlah' => $this->request->getVar('jml_tamu'),
            'no_wa' => $this->request->getVar('no_hp'),
            'kehadiran' => $this->request->getVar('kehadiran'),
        ];

        if ($rsvp['nama_tamu'] == "" || $rsvp['jumlah'] == "" || $rsvp['no_wa'] == "" || $rsvp['kehadiran'] == "") {
            return redirect()->to('/customer/tema3/' . $id_tr);
        }

        $dt_rsvp = [
            'rsvp_id' => $id_rsvp,
            'tr_id' => $id_tr,
        ];

        $this->RsvpModel->insert($rsvp);
        $this->dt_rsvpModel->insert($dt_rsvp);
        session()->setFlashdata('message', '<div class="alert alert-success">RSVP berhasil dikirim!</div>');
        return redirect()->to('/customer/tema3/' . $id_tr);
    }

    public function tema4($id)
    {
        $data = [
            'trn' => $this->CustomerModel->getById($id),
        ];

        echo view('rsvpform/formtema4', $data);
    }

    public function savetema4()
    {
        $row = $this->RsvpModel->countAll();
        if ($row == 0) {
            $id_rsvp = 'RSV-000001';
        } else {
            $row = $this->RsvpModel->orderBy('id_rsvp', 'DESC')->first();
            $id_rsvp = 'RSV-' . sprintf('%06d', substr($row['id_rsvp'], 5) + 1);
        }

        $id_tr = $this->request->getVar('id');

        $rsvp = [
            'id_rsvp' => $id_rsvp,
            'nama_tamu' => $this->request->getVar('nama'),
            'jumlah' => $this->request->getVar('jml_tamu'),
            'no_wa' => $this->request->getVar('no_hp'),
            'kehadiran' => $this->request->getVar('kehadiran'),
        ];

        if ($rsvp['nama_tamu'] == "" || $rsvp['jumlah'] == "" || $rsvp['no_wa'] == "" || $rsvp['kehadiran'] == "") {
            return redirect()->to('/customer/tema4/' . $id_tr);
        }

        $dt_rsvp = [
            'rsvp_id' => $id_rsvp,
            'tr_id' => $id_tr,
        ];

        $this->RsvpModel->insert($rsvp);
        $this->dt_rsvpModel->insert($dt_rsvp);
        session()->setFlashdata('message', '<div class="alert alert-success">RSVP berhasil dikirim!</div>');
        return redirect()->to('/customer/tema4/' . $id_tr);
    }

    public function tema5($id)
    {
        $data = [
            'trn' => $this->CustomerModel->getById($id),
        ];

        echo view('rsvpform/formtema5', $data);
    }

    public function savetema5()
    {
        $row = $this->RsvpModel->countAll();
        if ($row == 0) {
            $id_rsvp = 'RSV-000001';
        } else {
            $row = $this->RsvpModel->orderBy('id_rsvp', 'DESC')->first();
            $id_rsvp = 'RSV-' . sprintf('%06d', substr($row['id_rsvp'], 5) + 1);
        }

        $id_tr = $this->request->getVar('id');

        $rsvp = [
            'id_rsvp' => $id_rsvp,
            'nama_tamu' => $this->request->getVar('nama'),
            'jumlah' => $this->request->getVar('jml_tamu'),
            'no_wa' => $this->request->getVar('no_hp'),
            'kehadiran' => $this->request->getVar('kehadiran'),
        ];

        if ($rsvp['nama_tamu'] == "" || $rsvp['jumlah'] == "" || $rsvp['no_wa'] == "" || $rsvp['kehadiran'] == "") {
            return redirect()->to('/customer/tema5/' . $id_tr);
        }

        $dt_rsvp = [
            'rsvp_id' => $id_rsvp,
            'tr_id' => $id_tr,
        ];

        $this->RsvpModel->insert($rsvp);
        $this->dt_rsvpModel->insert($dt_rsvp);
        session()->setFlashdata('message', '<div class="alert alert-success">RSVP berhasil dikirim!</div>');
        return redirect()->to('/customer/tema5/' . $id_tr);
    }

}
