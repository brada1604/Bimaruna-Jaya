<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use App\Models\JabatanModel;
use App\Models\DivisiModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class PegawaiController extends BaseController
{
    public function __construct()
    {
        // Load Session
        $this->session = session();

        // Load the database library
        $this->db = \Config\Database::connect();

        // Load a model
        $this->model_pegawai = new PegawaiModel();
        $this->model_user = new UserModel();
        $this->model_jabatan = new JabatanModel();
        $this->model_divisi = new DivisiModel();
    }

    public function index()
    {
        $data['session'] = $this->session;
        $data['title'] = 'Data Pegawai';
        $data['getPegawai'] = $this->model_pegawai->getPegawai();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('pegawai/index', $data);
        echo view('layout/v_footer');
    }

    public function add(){
        $data['title'] = 'Data Pegawai - Add';
        $data['session'] = $this->session;
        $data['getPegawai'] = $this->model_pegawai->findAll();
        $data['getJabatan'] = $this->model_jabatan->findAll();
        $data['getDivisi'] = $this->model_divisi->findAll();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('pegawai/add', $data);
        echo view('layout/v_footer');
    }

    public function save(){
        $data['session'] = session();
        $rules = [
            'name' => 'required',
            'nomor_induk' => 'required|is_unique[tbl_user.email]',
            'email' => 'required|is_unique[tbl_user.email]',
            'password' => 'required',
            'confirm_password' => 'required|matches[password]'
        ];
     
        if($this->validate($rules)){
            $data_user = [
                'role' => '3',
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            ];

            $this->model_user->save($data_user);

            $data_pegawai = [
                'id_user' => $this->model_user->insertID(),
                'id_jabatan' => $this->request->getVar('id_jabatan'),
                'id_divisi' => $this->request->getVar('id_divisi'),
                'nomor_induk' => $this->request->getVar('nomor_induk'),
                'nama_pegawai' => $this->request->getVar('name'),
                'pendidikan' => $this->request->getVar('pendidikan'),
                'lead' => $this->request->getVar('lead'),
                'gender' => $this->request->getVar('gender'),
                'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                'tgl_masuk' => $this->request->getVar('tgl_masuk'),
            ];            
            
            $this->model_pegawai->save($data_pegawai);             

            echo '<script>
                    alert("Selamat! Berhasil Mendaftar");
                    window.location="' . base_url('/pegawai_master') . '"
                </script>';
     
        } else {
            $data['title'] = 'Data Pegawai';
            $data['validation'] = $this->validator;
            $data['session'] = $this->session;
            $data['getPegawai'] = $this->model_pegawai->findAll();
            $data['getJabatan'] = $this->model_jabatan->findAll();
            $data['getDivisi'] = $this->model_divisi->findAll();

            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('pegawai/add', $data);
            echo view('layout/v_footer');
        }
    }

    public function edit($id_pegawai){
        $data['session'] = $this->session;
        $data['title'] = 'Data Pegawai - Edit';
        $data['getPegawai'] = $this->model_pegawai->getPegawai($id_pegawai);

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('pegawai/edit', $data);
        echo view('layout/v_footer');
    }

    public function update(){
        $data['session'] = $this->session;
        $rules = [
            'nama_pegawai' => 'required'
        ];
     
        if($this->validate($rules)){
            $id_pegawai = $this->request->getVar('id_pegawai');

            $data_pegawai = [
                'nama_pegawai' => $this->request->getVar('nama_pegawai')
            ];

            $this->model_pegawai->update($id_pegawai, $data_pegawai);

            $this->model_user = new UserModel();
            $id_user = $this->request->getVar('id_user');

            $data_user = [
                'name' => $this->request->getVar('nama_pegawai')
            ];

            $this->model_user->update($id_user, $data_user);
     
            echo '<script>
                alert("Selamat! Berhasil Mengubah Data Pegawai");
                window.location="' . base_url('pegawai_master') . '"
            </script>';
        }
        else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Pegawai';

            echo view('layout/v_header', $data);
            echo view('layout/v_navbar');
            echo view('pegawai/add', $data);
            echo view('layout/v_footer');
        }

    }

    public function delete($id){
        $this->model_user->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data Pegawai beserta akunnya");
                window.location="' . base_url('pegawai_master') . '"
            </script>';
    }
}
