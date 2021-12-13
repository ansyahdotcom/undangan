<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Admin_model;

class Admin_controllers extends BaseController
{
       protected $madmin;
       protected $table = "admin";


       public function __construct()
       {
              $this->madmin = new Admin_model();
       }

       public function index()
       {
              $getdata = $this->madmin->getdata();

              $data = array(
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
                            echo "<script>alert('Data Berhasil Disimpan!'); 
                            window.location='" . base_url('Admin_controllers') . "';</script>";
                     } else {
                            echo "<script>alert('Data Gagal Disimpan!'); 
                            window.location='" . base_url('/Admin_controllers') . "';</script>";
                     }
              } catch (\Exception $e) {

                     echo "<script>alert('ID Admin Sudah Ada!'); 
                            window.location='" . base_url('/Admin_controllers') . "';</script>";
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
                            echo "<script>alert('Data Berhasil Diedit!'); 
                            window.location='" . base_url('Admin_controllers') . "';</script>";
                     } else {
                            echo "<script>alert('Data Gagal Diedit!'); 
                            window.location='" . base_url('/Admin_controllers') . "';</script>";
                     }
              } catch (\Exception $e) {
                     echo "<script>alert('ID Admin Sudah Ada!'); 
                            window.location='" . base_url('/Admin_controllers') . "';</script>";
              }
       }

       function hapus()
       {
              $idAdmin = $this->request->getVar('id_adm');

              $where = ['id_adm' => $idAdmin];

              try {

                     $hapus = $this->madmin->hapusData($this->table, $where);

                     if ($hapus) {
                            echo "<script>alert('Data Berhasil Dihapus!'); 
                            window.location='" . base_url('Admin_controllers') . "';</script>";
                     } else {
                            echo "<script>alert('Data Gagal Dihapus!'); 
                            window.location='" . base_url('/Admin_controllers') . "';</script>";
                     }
              } catch (\Exception $e) {
                     echo "<script>alert('ID Admin Sudah Ada!'); 
                            window.location='" . base_url('/Admin_controllers') . "';</script>";
              }
       }
}
