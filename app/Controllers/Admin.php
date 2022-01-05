<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Admin_model;
use App\Models\LoginModel;

class Admin extends BaseController
{
       protected $madmin;
       protected $table = "admin";


       public function __construct()
       {
              $this->madmin = new Admin_model;
              $this->LoginModel = new LoginModel;
       }

       public function index()
       {
              $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
              if ($user == null) {
                     return redirect()->to('/login');
              } else {
                     $data = array(
                            'title' => 'Data Admin',
                            'username' => $user['username'],
                            'dataAdmin' => $this->madmin->findAll(),
                     );
                     echo view('admin/v_admin', $data);
              }
       }

       public function add()
       {
              $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
              if ($user == null) {
                     return redirect()->to('/login');
              } else {
                     $data = array(
                            'title' => 'Tambah Admin Baru',
                            'username' => $user['username'],
                     );
                     return view('admin/v_addAdmin', $data);
              }
       }

       public function save()
       {
              $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
              if ($user == null) {
                     return redirect()->to('/login');
              } else {
                     $namaAdmin = $this->request->getVar("namaAdmin");
                     $username = $this->request->getVar("username");
                     $password = password_hash($this->request->getVar("password"), PASSWORD_DEFAULT);

                     $data = [
                            'nama_adm' => $namaAdmin,
                            'username' => $username,
                            'password' => $password
                     ];

                     $this->madmin->save($data);
                     session()->setFlashdata('message', 'save');
                     return redirect()->to('admin/add');
              }
       }

       public function edit($id)
       {
              $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
              if ($user == null) {
                     return redirect()->to('/login');
              } else {
                     $data = array(
                            'title' => 'Edit Admin',
                            'username' => $user['username'],
                            'adm' => $this->madmin->where(['id_adm' => $id])->first(),
                     );

                     return view('admin/v_editAdmin', $data);
              }
       }

       function update()
       {
              $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
              if ($user == null) {
                     return redirect()->to('/login');
              } else {
                     $id = $this->request->getVar("id_adm");
                     $namaAdmin = $this->request->getVar("namaAdmin");
                     $username = $this->request->getVar("username");
                     $password = password_hash($this->request->getVar("password1"), PASSWORD_DEFAULT);

                     if ($password == null) {
                            $data = [
                                   'id_adm' => $id,
                                   'nama_adm' => $namaAdmin,
                                   'username' => $username
                            ];
                     } else {
                            $data = [
                                   'id_adm' => $id,
                                   'nama_adm' => $namaAdmin,
                                   'username' => $username,
                                   'password' => $password
                            ];
                     }

                     $this->madmin->save($data);
                     session()->setFlashdata('message', 'edit');
                     return redirect()->to('/admin/edit/' . $id);
              }
       }

       function delete()
       {
              $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
              if ($user == null) {
                     return redirect()->to('/login');
              } else {
                     $id = $this->request->getVar('id_adm');
                     // getVar = Mengambil semua data yg ada di form (method get & post)

                     $this->madmin->delete($id);
                     session()->setFlashdata('message', 'delete');
                     return redirect()->to('admin');
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
                            return redirect()->to('/admin');
                     } else {
                            // find foto name by id
                            foreach ($id as $i) {
                                   // delete data in database
                                   $this->madmin->delete($i);
                            }

                            session()->setFlashdata('message', 'delete');
                            return redirect()->to('/admin');
                     }
              }
       }
}
