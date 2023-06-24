<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ScannerController extends BaseController
{
    public function index()
    {
        $data['session'] = session();

        $data['title'] = 'Scanner';

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('scanner/index', $data);
        echo view('layout/v_footer');
    }
}
