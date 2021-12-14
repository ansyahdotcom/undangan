<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Admin_model;
use App\Models\LoginModel;

class Admin_controllers extends BaseController
{
       protected $madmin;
       protected $table = "admin";


       public function __construct()
       {
              $this->madmin = new Admin_model();
              $this->LoginModel = new LoginModel;
       }

       public function index()
       {
              $getdata = $this->madmin->getdata();
              $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
              $data = array(
                     'title' => 'Manajemen Admin',
                     'username' => $user['username'],
                     'dataAdmin' => $getdata,

              );

              return view('v_admin', $data);
       }

       function simpan()
       {
              $idAdmin = $this->request->getPost("id_adm");
              $namaAdmin = $this->request->getPost("namaAdmin");
              $username = $this->request->getPost("username");

              $data = [
                     'id_adm' => $idAdmin,
                     'nama_adm' => $namaAdmin,
                     'username' => $username
              ];

              try {
                     $simpan = $this->madmin->simpanData($this->table, $data);

                     if ($simpan) {
                            session()->setFlashdata('message', 'save');
                            return redirect()->to('Admin_controllers');
                     } else {
                            session()->setFlashdata('message', 'notsave');
                            return redirect()->to('/Admin_controllers');
                     }
              } catch (\Exception $e) {

                     session()->setFlashdata('message', 'isExist');
                     return redirect()->to('/Admin_controllers');
              }
       }

       function edit()
       {
              $idAdmin = $this->request->getPost("id_adm");
              $namaAdmin = $this->request->getPost("namaAdmin");
              $username = $this->request->getPost("username");

              $data = [
                     'id_adm' => $idAdmin,
                     'nama_adm' => $namaAdmin,
                     'username' => $username
              ];

              $where = ['id_adm' => $idAdmin];

              try {

                     $edit = $this->madmin->editData($this->table, $data, $where);

                     if ($edit) {
                            session()->setFlashdata('message', 'edit');
                            return redirect()->to('Admin_controllers');

                            // echo "<script>alert('Data Berhasil Diedit!'); 
                            // window.location='" . base_url('Admin_controllers') . "';</script>";
                     } else {
                            session()->setFlashdata('message', 'notedit');
                            return redirect()->to('/Admin_controllers');
                            // echo "<script>alert('Data Gagal Diedit!'); 
                            // window.location='" . base_url('/Admin_controllers') . "';</script>";
                     }
              } catch (\Exception $e) {
                     session()->setFlashdata('message', 'isExist');
                     return redirect()->to('/Admin_controllers');
                     // echo "<script>alert('ID Admin Sudah Ada!'); 
                     //        window.location='" . base_url('/Admin_controllers') . "';</script>";
              }
       }

       function hapus()
       {
              $idAdmin = $this->request->getVar('id_adm');
              // getVar = Mengambil semua data yg ada di form (method get & post)

              $where = ['id_adm' => $idAdmin];

              try {

                     $hapus = $this->madmin->hapusData($this->table, $where);

                     if ($hapus) {
                            session()->setFlashdata('message', 'delete');
                            return redirect()->to('Admin_controllers');
                     } else {
                            session()->setFlashdata('message', 'notdelete');
                            return redirect()->to('/Admin_controllers');
                     }
              } catch (\Exception $e) {
                     session()->setFlashdata('message', 'isExist');
                     return redirect()->to('/Admin_controllers');
              }
       }
}
