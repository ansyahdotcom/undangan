<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\TransaksiModel;
use App\Models\TemplateModel;
use App\Models\RsvpModel;
use App\Models\dt_rsvpModel;

class Transaksi extends BaseController
{
    protected $LoginModel;
    protected $TransaksiModel;
    protected $TemplateModel;
    protected $RsvpModel;
    protected $dt_rsvpModel;
    public function __construct()
    {
        $this->LoginModel = new LoginModel;
        $this->TransaksiModel = new TransaksiModel;
        $this->TemplateModel = new TemplateModel;
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
                'title' => 'Data Transaksi',
                'transaksi' => $this->TransaksiModel->getTransaksi()->getResultArray(),
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
                'title' => 'Tambah Transaksi Baru',
                'username' => $user['username'],
                'template' => $this->TemplateModel->findAll()
            ];
            echo view('transaksi/v_addTransaksi', $data);
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
            $row = $this->TransaksiModel->countAll();
            // Logic for auto id
            if ($row == 0) {
                $id = 'TRN-000001';
            } else {
                $row = $this->TransaksiModel->orderBy('id_tr', 'DESC')->first();
                $id = 'TRN-' . sprintf('%06d', substr($row['id_tr'], 5) + 1);
            }

            // cek custom link
            $link = $this->request->getVar('custom_link');
            if ($link == '') {
                $permalink = $this->request->getVar('pgl_pria') . '-' . $this->request->getVar('pgl_wanita') . '-wedding';
            } else {
                $permalink = str_replace(" ", "-", $link);
            }

            // get form data
            $data = [
                'id_tr' => $id,
                'nama_pria' => $this->request->getVar('nm_pria'),
                'nama_wanita' => $this->request->getVar('nm_wanita'),
                'nama_pgl_pria' => $this->request->getVar('pgl_pria'),
                'nama_pgl_wanita' => $this->request->getVar('pgl_wanita'),
                'nama_ayah_pria' => $this->request->getVar('ayh_pria'),
                'nama_ibu_pria' => $this->request->getVar('ibu_pria'),
                'nama_ayah_wanita' => $this->request->getVar('ayh_wanita'),
                'nama_ibu_wanita' => $this->request->getVar('ibu_wanita'),
                'maps_akad' => $this->request->getVar('mp_akad'),
                'tgl_akad' => date('Y-m-d H:i:s', strtotime($this->request->getVar('tgl_akad'))),
                'alamat_akad' => $this->request->getVar('almt_akad'),
                'maps_resepsi' => $this->request->getVar('mp_resepsi'),
                'tgl_resepsi' => date('Y-m-d H:i:s', strtotime($this->request->getVar('tgl_resepsi'))),
                'alamat_resepsi' => $this->request->getVar('almt_resepsi'),
                'permalink' => $permalink,
                'nomor_hp' => $this->request->getVar('no_hp'),
                'tm_id' => $this->request->getVar('undangan')
            ];

            // query builder insert 
            $this->TransaksiModel->insert($data);
            session()->setFlashdata('message', 'save');
            return redirect()->to('/transaksi/add');
        }
    }

    public function edit($id)
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $data = [
                'title' => 'Edit Transaksi',
                'username' => $user['username'],
                'trn' => $this->TransaksiModel->where(['id_tr' => $id])->first(),
                'template' => $this->TemplateModel->findAll()
            ];
            echo view('transaksi/v_editTransaksi', $data);
        }
    }

    public function update()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $id = $this->request->getVar('id');

            // cek custom link
            $link = $this->request->getVar('custom_link');
            if ($link == '') {
                $permalink = $this->request->getVar('custom_link_old');
            } else {
                $permalink = str_replace(" ", "-", $link);
            }

            // get data from form
            $data = [
                'id_tr' => $id,
                'nama_pria' => $this->request->getVar('nm_pria'),
                'nama_wanita' => $this->request->getVar('nm_wanita'),
                'nama_pgl_pria' => $this->request->getVar('pgl_pria'),
                'nama_pgl_wanita' => $this->request->getVar('pgl_wanita'),
                'nama_ayah_pria' => $this->request->getVar('ayh_pria'),
                'nama_ibu_pria' => $this->request->getVar('ibu_pria'),
                'nama_ayah_wanita' => $this->request->getVar('ayh_wanita'),
                'nama_ibu_wanita' => $this->request->getVar('ibu_wanita'),
                'maps_akad' => $this->request->getVar('mp_akad'),
                'tgl_akad' => date('Y-m-d H:i:s', strtotime($this->request->getVar('tgl_akad'))),
                'alamat_akad' => $this->request->getVar('almt_akad'),
                'maps_resepsi' => $this->request->getVar('mp_resepsi1'),
                'tgl_resepsi' => date('Y-m-d H:i:s', strtotime($this->request->getVar('tgl_resepsi'))),
                'alamat_resepsi' => $this->request->getVar('almt_resepsi'),
                'permalink' => $permalink,
                'nomor_hp' => $this->request->getVar('no_hp'),
                'tm_id' => $this->request->getVar('undangan')
            ];

            // update data in database
            $this->TransaksiModel->save($data);
            session()->setFlashdata('message', 'edit');
            return redirect()->to('/transaksi/edit/' . $id);
        }
    }

    public function delete()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $id = $this->request->getVar('id');

            // delete data in database
            $this->TransaksiModel->delete($id);
            session()->setFlashdata('message', 'delete');
            return redirect()->to('/transaksi');
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
                return redirect()->to('/transaksi');
            } else {
                // find foto name by id
                foreach ($id as $i) {
                    // delete data in database
                    $this->TransaksiModel->delete($i);
                }

                session()->setFlashdata('message', 'delete');
                return redirect()->to('/transaksi');
            }
        }
    }

    public function rsvp_form($id)
    {
        $data = [
            'title' => 'RSVP',
            'trn' => $this->TransaksiModel->getById($id),
        ];

        $theme = $data['trn']['nama_tm'];

        if ($theme == 'Blue Flowers') {
            echo view('template_undangan/blueflowers/rsvp_form', $data);
        } else {
            echo "blank";
        }
    }

    public function rsvp()
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
            'no_wa' => $this->request->getVar('no_wa'),
            'kehadiran' => $this->request->getVar('hadir'),
        ];

        $dt_rsvp = [
            'rsvp_id' => $id_rsvp,
            'tr_id' => $id_tr,
        ];

        $this->RsvpModel->insert($rsvp);
        $this->dt_rsvpModel->insert($dt_rsvp);
        session()->setFlashdata('message', 'save');
        return redirect()->to('/transaksi/rsvp_form/' . $id_tr);
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

}
