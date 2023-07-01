<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $data['title'] = 'PT Bimaruna Jaya';
        echo view('welcome_message',);
    }
}
