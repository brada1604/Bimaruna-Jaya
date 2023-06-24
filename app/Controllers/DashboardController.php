<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PegawaiModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $data['session'] = session();

        $model_pegawai = new PegawaiModel;

        if (session()->get('role') == 1) { // Role : Administrator
            $data['title'] = 'Dashboard Administrator';
            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('dashboard/dashboard_administrator', $data);
            echo view('layout/v_footer');
        }
        elseif (session()->get('role') == 2) { // Role : Operator
            $data['title'] = 'Dashboard Operator';
            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('dashboard/dashboard_operator', $data);
            echo view('layout/v_footer');
        }
        elseif (session()->get('role') == 3) { // Role : Pegawai
            $data['title'] = 'Dashboard Pegawai';
            $data['getPegawaiByIdUser'] = $model_pegawai->getPegawaiByIdUser(session()->get('id'));
            $data['code'] = $data['getPegawaiByIdUser'][0]->nomor_induk;
            echo view('layout/v_header', $data);
            echo view('layout/v_sidebar');
            echo view('layout/v_navbar');
            echo view('dashboard/dashboard_pegawai', $data);
            echo view('layout/v_footer');
        }
        else{
            return redirect()->to('/login'); 
        }

        
    }
}
