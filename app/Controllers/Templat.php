<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\TemplateModel;

class Templat extends BaseController
{
    protected $LoginModel;
    protected $TemplateModel;
    public function __construct()
    {
        $this->LoginModel = new LoginModel;
        $this->TemplateModel = new TemplateModel;
    }

    public function index()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $data = [
                'title' => 'Data Template',
                'template' => $this->TemplateModel->findAll(),
                'username' => $user['username']
            ];
            echo view('undangan/v_template', $data);
        }
    }

    public function add()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $data = [
                'title' => 'Tambah Template Baru',
                'username' => $user['username'],
                'validation' => \Config\Services::validation()
            ];
            echo view('undangan/v_addTemplate', $data);
        }
    }

    public function save()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            /**
             * ===========================================================
             * Validasi Form
             * ===========================================================
             */
            // konfigurasi validasi (membuat rules)
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'nama_tm' => [
                    'rules' => 'trim|required',
                    'errors' => [
                        'required' => 'Field Nama Template harus diisi.'
                    ]
                ],
                'harga_tm' => [
                    'rules' => 'trim|required',
                    'errors' => [
                        'required' => 'Field Harga Template harus diisi.'
                    ]
                ]
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();

            /**
             * ===========================================================
             * Query builder save data 
             * ===========================================================
             */
            // Jika data lolos validasi
            if ($isDataValid) {
                // menyimpan data yang diinputkan
                $nama_tm = $this->request->getVar('nama_tm');
                $harga_tm = $this->request->getVar('harga_tm');
                $insert = [
                    'nama_tm' => $nama_tm,
                    'harga_tm' => $harga_tm
                ];
                $this->TemplateModel->insert($insert);
                /**
                 * ===========================================================
                 * Mengirim flashdata
                 * ===========================================================
                 */
                session()->setFlashdata('message', 'save');
                /**
                 * ===========================================================
                 * Kembali ke view data template
                 * ===========================================================
                 */
                return redirect()->to('/templat');
            } else {
                //Jika data tidak lolos validasi
                /**
                 * ===========================================================
                 * Mengirim flashdata
                 * ===========================================================
                 */
                session()->setFlashdata('message', 'notsave');
                return redirect()->to("/templat/add")->withInput()->with('validation', $validation);
            }
        }
    }

    public function edit($id)
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $data = [
                'title' => 'Edit Template',
                'template' => $this->TemplateModel->editTemplate($id),
                'username' => $user['username'],
                'validation' => \Config\Services::validation()
            ];
            echo view('undangan/v_editTemplate', $data);
        }
    }

    public function update($id)
    {
        $nama = $this->request->getVar('nama_tm');
        $harga = $this->request->getVar('harga_tm');

        if (!$this->validate([
            'nama_tm' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'field Nama harus diisi.'
                ]
            ],
            'harga_tm' => [
                'rules' => 'trim|required',
                'errors' => [
                    'required' => 'Field Harga Template harus diisi.'
                ]
            ]
        ])) {
            session()->setFlashdata('message', 'notsave');
            return redirect()->to('/templat/edit/'. $id)->withInput();
        }

        $this->TemplateModel->save([
            'id_tm' => $id,
            'nama_tm' => $nama,
            'harga_tm' => $harga
        ]);

        session()->setFlashdata('message', 'edit');
        return redirect()->to('/templat');
    }

    public function delete()
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $id = $this->request->getVar('id');
            $this->TemplateModel->delete($id);
            session()->setFlashdata('message', 'delete');
            return redirect()->to('/templat');
        }
    }
}
