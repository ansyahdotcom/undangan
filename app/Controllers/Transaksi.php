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
                $permalink = $link;
            }

            // get file foto
            $file_pria = $this->request->getFile('fto_pria');
            $file_wanita = $this->request->getFile('fto_wanita');

            // cek foto name upload to folder img'
            if ($file_pria == "") {
                $fto_pria = 'default-p.png';
            } else {
                $fto_pria = $file_pria->getRandomName();
                // upload file foto
                $file_pria->move('assets/dist/img/transaksi/', $fto_pria);
            }

            if ($file_wanita == "") {
                $fto_wanita = 'default-w.png';
            } else {
                $fto_wanita = $file_wanita->getRandomName();
                // upload file foto
                $file_wanita->move('assets/dist/img/transaksi', $fto_wanita);
            }

            // cek file foto insert to database
            if ($file_pria->getError() == 4) {
                $pria = 'default-p.png';
            } else {
                $pria = $fto_pria;
            }

            if ($file_wanita->getError() == 4) {
                $wanita = 'default-w.png';
            } else {
                $wanita = $fto_wanita;
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
                'foto_pria' => $pria,
                'foto_wanita' => $wanita,
                'permalink' => $permalink,
                'nomor_hp' => $this->request->getVar('no_hp'),
            ];

            // query builder insert 
            $this->TransaksiModel->insert($data);
            session()->setFlashdata('message', 'save');
            return redirect()->to('/transaksi/add');
        }
    }

    public function delete()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $id = $this->request->getVar('id');

            //find foto name by id
            $foto_pria = $this->TransaksiModel->where(['id_tr' => $id])->first();
            $foto_wanita = $this->TransaksiModel->where(['id_tr' => $id])->first();
            
            // delete foto in folder "assets/dist/img"
            unlink('assets/dist/img/transaksi/' . $foto_pria['foto_pria']);
            unlink('assets/dist/img/transaksi/' . $foto_wanita['foto_wanita']);

            // delete data in database
            $this->TransaksiModel->delete($id);
            session()->setFlashdata('message', 'delete');
            return redirect()->to('/transaksi');
        }
    }

    public function deleteAll()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $this->TransaksiModel->truncate();
            session()->setFlashdata('message', 'delete');
            return redirect()->to('/transaksi');
        }
    }
}
