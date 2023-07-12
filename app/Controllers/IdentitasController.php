<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use App\Models\JabatanModel;
use App\Models\DivisiModel;
use App\Controllers\BaseController;

class IdentitasController extends BaseController
{
    public function __construct()
    {
        // Load Session
        $this->session = session();

        // Load the database library
        $this->db = \Config\Database::connect();

        // Load a model
        $this->model_pegawai = new PegawaiModel();
        $this->model_jabatan = new JabatanModel();
        $this->model_divisi = new DivisiModel();
    }

    public function index()
    {
        $data['session'] = $this->session;
        $data['title'] = 'Data Identitas Pegawai';
        $data['getIdentitasPegawai'] = $this->model_pegawai->getIdentitasPegawai($this->session->id);

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('identitas/index', $data);
        echo view('layout/v_footer');
    }
}
