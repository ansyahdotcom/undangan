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

    public function add()
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

    public function edit($id)
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $data = [
                'title' => 'Edit Customer',
                'username' => $user['username'],
                'trn' => $this->CustomerModel->where(['id_tr' => $id])->first()
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

    public function rsvp_form($id)
    {
        $data = [
            'title' => 'RSVP',
            'trn' => $this->CustomerModel->getById($id),
        ];

        echo view('template_undangan/blueflowers/rsvp_form', $data);
    }

    public function send_rsvp()
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
            return redirect()->to('/customer/rsvp_form/' . $id_tr);
        }

        $dt_rsvp = [
            'rsvp_id' => $id_rsvp,
            'tr_id' => $id_tr,
        ];

        $this->RsvpModel->insert($rsvp);
        $this->dt_rsvpModel->insert($dt_rsvp);
        session()->setFlashdata('message', '<div class="alert alert-success">RSVP berhasil dikirim!</div>');
        return redirect()->to('/customer/rsvp_form/' . $id_tr);
    }

    public function destiny($id)
    {
        $data = [
            'nama_tamu' => $this->request->getVar('nama_tamu')
        ];

        if (isset($data['nama_tamu'])) {
            $row = $this->RsvpModel->countAll();
            if ($row == 0) {
                $id_rsvp = 'RSV-000001';
            } else {
                $row = $this->RsvpModel->orderBy('id_rsvp', 'DESC')->first();
                $id_rsvp = 'RSV-' . sprintf('%06d', substr($row['id_rsvp'], 5) + 1);
            }

            $rsvp = [
                'id_rsvp' => $id_rsvp,
                'nama_tamu' => $this->request->getVar('nama_tamu'),
                'jumlah' => $this->request->getVar('jumlah'),
                'no_wa' => $this->request->getVar('no_wa'),
                'kehadiran' => $this->request->getVar('kehadiran'),
            ];

            $dt_rsvp = [
                'rsvp_id' => $id_rsvp,
                'tr_id' => $id,
            ];

            $this->RsvpModel->insert($rsvp);
            $this->dt_rsvpModel->insert($dt_rsvp);
            session()->setFlashdata('message', 'save');
            echo view('rsvpform/formdestiny');
        } else {
            echo view('rsvpform/formdestiny');
        }
    }

    public function bestdayblue($id)
    {
        $data = [
            'nama_tamu' => $this->request->getVar('nama_tamu')
        ];

        if (isset($data['nama_tamu'])) {
            $row = $this->RsvpModel->countAll();
            if ($row == 0) {
                $id_rsvp = 'RSV-000001';
            } else {
                $row = $this->RsvpModel->orderBy('id_rsvp', 'DESC')->first();
                $id_rsvp = 'RSV-' . sprintf('%06d', substr($row['id_rsvp'], 5) + 1);
            }

            $rsvp = [
                'id_rsvp' => $id_rsvp,
                'nama_tamu' => $this->request->getVar('nama_tamu'),
                'jumlah' => $this->request->getVar('jumlah'),
                'no_wa' => $this->request->getVar('no_wa'),
                'kehadiran' => $this->request->getVar('kehadiran'),
            ];

            $dt_rsvp = [
                'rsvp_id' => $id_rsvp,
                'tr_id' => $id,
            ];

            $this->RsvpModel->insert($rsvp);
            $this->dt_rsvpModel->insert($dt_rsvp);
            session()->setFlashdata('message', 'save');
            echo view('rsvpform/formbestdayblue');
        } else {
            echo view('rsvpform/formbestdayblue');
        }
    }

    public function foxwedding($id)
    {
        $data = [
            'nama_tamu' => $this->request->getVar('nama_tamu')
        ];

        if (isset($data['nama_tamu'])) {
            $row = $this->RsvpModel->countAll();
            if ($row == 0) {
                $id_rsvp = 'RSV-000001';
            } else {
                $row = $this->RsvpModel->orderBy('id_rsvp', 'DESC')->first();
                $id_rsvp = 'RSV-' . sprintf('%06d', substr($row['id_rsvp'], 5) + 1);
            }

            $rsvp = [
                'id_rsvp' => $id_rsvp,
                'nama_tamu' => $this->request->getVar('nama_tamu'),
                'jumlah' => $this->request->getVar('jumlah'),
                'no_wa' => $this->request->getVar('no_wa'),
                'kehadiran' => $this->request->getVar('kehadiran'),
            ];

            $dt_rsvp = [
                'rsvp_id' => $id_rsvp,
                'tr_id' => $id,
            ];

            $this->RsvpModel->insert($rsvp);
            $this->dt_rsvpModel->insert($dt_rsvp);
            session()->setFlashdata('message', 'save');
            echo view('rsvpform/formfoxwedding');
        } else {
            echo view('rsvpform/formfoxwedding');
        }
    }
}
