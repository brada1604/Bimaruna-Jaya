<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use App\Models\UserModel;
use App\Controllers\BaseController;

class PegawaiController extends BaseController
{
    public function index()
    {
        $model = new PegawaiModel;
        $data['session'] = session();
        $data['title'] = 'Data Pegawai';
        $data['getPegawai'] = $model->getPegawai();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('pegawai/index', $data);
        echo view('layout/v_footer');
    }

    public function add(){
        $data['title'] = 'Data Pegawai - Add';
        $data['session'] = session();

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('pegawai/add');
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
            $model_user = new UserModel();
            $model_pegawai = new PegawaiModel();

            $data_user = [
                'role' => '3',
                'name' => $this->request->getVar('name'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            ];

            $model_user->save($data_user);

            $data_pegawai = [
                'id_user' => $model_user->insertID(),
                'nomor_induk' => $this->request->getVar('name'),
                'nama_pegawai' => $this->request->getVar('name')
            ];            
            
            $model_pegawai->save($data_pegawai);             

            echo '<script>
                    alert("Selamat! Berhasil Mendaftar");
                    window.location="' . base_url('/pegawai_master') . '"
                </script>';
     
        } else {
            $data['validation'] = $this->validator;
            $data['title'] = 'Data Pegawai';

            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('pegawai/add', $data);
            echo view('layout/v_footer');
        }
    }

    public function edit($id_pegawai){
        $model = new PegawaiModel;
        $data['session'] = session();
        $data['title'] = 'Data Pegawai - Edit';
        $data['getPegawai'] = $model->getPegawai($id_pegawai);

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('pegawai/edit', $data);
        echo view('layout/v_footer');
    }

    public function update(){
        $data['session'] = session();
        $rules = [
            'nama_pegawai' => 'required'
        ];
     
        if($this->validate($rules)){
            $model_pegawai = new PegawaiModel();
            $id_pegawai = $this->request->getVar('id_pegawai');

            $data_pegawai = [
                'nama_pegawai' => $this->request->getVar('nama_pegawai')
            ];

            $model_pegawai->update($id_pegawai, $data_pegawai);

            $model_user = new UserModel();
            $id_user = $this->request->getVar('id_user');

            $data_user = [
                'name' => $this->request->getVar('nama_pegawai')
            ];

            $model_user->update($id_user, $data_user);
     
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
        $model = new UserModel;
        $model->delete($id);
        echo '<script>
                alert("Selamat! Berhasil Menghapus Data Pegawai beserta akunnya");
                window.location="' . base_url('pegawai_master') . '"
            </script>';
    }
}
