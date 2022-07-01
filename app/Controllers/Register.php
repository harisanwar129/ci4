<?php

namespace App\Controllers;

use App\Models\UsersModel;

class Register extends BaseController
{
    public function index()
    {
        return view('vw_register');
    }

    public function process()
    {
        print_r($_POST['email']);
        print_r($_POST['password']);
        print_r($_POST['name']);
        print_r($_POST['nik']);
        print_r($_POST['pangkat']);
        print_r($_POST['tanggal_pk']);
        print_r($_POST['jabatan']);
        print_r($_POST['tanggal_jb']);
        print_r($_POST['upload']);
        if (!$this->validate([
            'email' => [
                'rules' => 'required|is_unique[users.emmail]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                
                    'is_unique' => 'emmail sudah digunakan sebelumnya'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[4]|max_length[50]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 50 Karakter',
                ]
            ],
            'password_conf' => [
                'rules' => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi Password tidak sesuai dengan password',
                ]
            ],
            'name' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'nik' => [
                'rules' => 'required|min_length[4]|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'min_length' => '{field} Minimal 4 Karakter',
                    'max_length' => '{field} Maksimal 100 Karakter',
                ]
            ],
            'pangkat' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => '{field} Harus diisi',
         
                ]
            ],
            'tanggal_pk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
                   
                ]
            ],
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
               
                ]
            ],
            'tanggal_jb' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
     
                ]
            ],
            'upload' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi',
     
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $users = new UsersModel();
        $users->insert([
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            'name' => $this->request->getVar('name'),
            'nik' => $this->request->getVar('nik'),
            'pangkat' => $this->request->getVar('pangkat'),
            'tanggal_pk' => $this->request->getVar('tanggal_pk'),
            'jabatan' => $this->request->getVar('jabatan'),
            'tanggal_jb' => $this->request->getVar('tanggal_jb'),
            'upload' => $this->request->getVar('upload'),

            
        ]);
        return redirect()->to('/login');
    }
}