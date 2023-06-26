<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AbsenModel;

class AbsenController extends BaseController
{
    public function index()
    {
        $model = new AbsenModel;
        $data['session'] = session();
        $data['title'] = 'Data Absen';

        if (session()->id == '1') {
            $data['getAbsen'] = $model->getAbsen();
        }
        else{
            $data['getAbsen'] = $model->getAbsen(session()->id);
        }


        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('absen/index', $data);
        echo view('layout/v_footer');
    }



}
