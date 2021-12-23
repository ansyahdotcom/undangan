<?php

namespace App\Controllers;

use App\Models\LoginModel;
use App\Models\TemplateModel;
use FFI\CData;

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
                    'rules' => 'trim|required|regex_match[/^[A-Za-z_]*$/]',
                    'errors' => [
                        'required' => 'Field Nama Template harus diisi.',
                        'regex_match'   => 'Terdapat karakter spesial yang tidak diperbolehkan'
                    ]
                ],
                'harga_tm' => [
                    'rules' => 'trim|required|numeric',
                    'errors' => [
                        'required' => 'Field Harga Template harus diisi.',
                        'numeric' => 'Hanya dapat diisi dengan angka'
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
                // get file foto
                $thumbnail = $this->request->getFile('thumbnail');
                // cek foto name upload to folder img'
                if ($thumbnail == "") {
                    $file = 'thumbnail-undangan.jpg';
                } else {
                    $file = $thumbnail->getRandomName();
                    // upload file foto
                    $thumbnail->move('assets/dist/img/thumbnail/', $file);
                }

                // cek file foto insert to database
                if ($thumbnail->getError() == 4) {
                    $thumb = 'thumbnail-undangan.jpg';
                } else {
                    $thumb = $file;
                }

                $insert = [
                    'nama_tm' => $nama_tm,
                    'harga_tm' => $harga_tm,
                    'file_tm' => $this->slugify($nama_tm),
                    'thumbnail' => $thumb
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

    private static function slugify($text, string $divider = '-')
    {
        // Strip html tags
        $text = strip_tags($text);
        // Replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);
        // Transliterate
        setlocale(LC_ALL, 'en_US.utf8');
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        // Remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
        // Trim
        $text = trim($text, '-');
        // Remove duplicate -
        $text = preg_replace('~-+~', '-', $text);
        // Lowercase
        $text = strtolower($text);
        // Check if it is empty
        if (empty($text)) {
            return 'n-a';
        }
        // Return result
        return $text;
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
        // get file foto
        $thumbnail = $this->request->getFile('thumbnail');
        $thumbnail_old = $this->request->getVar('thumbnail_old');

        if (!$this->validate([
            'nama_tm' => [
                'rules' => 'trim|required|regex_match[/^[A-Za-z_]*$/]',
                'errors' => [
                    'required' => 'Field Nama Template harus diisi.',
                    'regex_match'   => 'Terdapat karakter spesial yang tidak diperbolehkan'
                ]
            ],
            'harga_tm' => [
                'rules' => 'trim|required|numeric',
                'errors' => [
                    'required' => 'Field Harga Template harus diisi.',
                    'numeric' => 'Hanya dapat diisi dengan angka'
                ]
            ]
        ])) {
            session()->setFlashdata('message', 'notsave');
            return redirect()->to('/templat/edit/'. $id)->withInput();
        }

        if ($thumbnail->getError() != 4) {
            $pria = $thumbnail->getRandomName();
            // upload file foto
            $thumbnail->move('assets/dist/img/thumbnail/', $pria);

            // cek if old foto default.png don't delete it
            if ($thumbnail_old != "thumbnail-undangan.jpg") {
                unlink('assets/dist/img/thumbnail/' . $thumbnail_old);
            }

            // update foto in database
            $data_thumbnail = [
                'id_tm' => $id,
                'foto_pria' => $pria
            ];
            $this->TemplateModel->save($data_thumbnail);
        }
        $this->TemplateModel->save([
            'id_tm' => $id,
            'nama_tm' => $nama,
            'harga_tm' => $harga
        ]);

        session()->setFlashdata('message', 'edit');
        return redirect()->to('/templat');
    }

    public function detail($id)
    {
        $user = $this->LoginModel->where(['username' => session()->get('username')])->first();
        if ($user == null) {
            return redirect()->to('/login');
        } else {
            $data = [
                'title' => 'Detail Template',
                'username' => $user['username'],
                'template' => $this->TemplateModel->editTemplate($id),
                'validation' => \Config\Services::validation()
            ];
            echo view('undangan/v_detailTemplate', $data);
        }
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
