<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AbsenModel;
use App\Models\PegawaiModel;

class AbsenController extends BaseController
{
    public function index()
    {
        $model = new AbsenModel;
        $data['session'] = session();
        $data['title'] = 'Data Absen';

        if (session()->role != '3') {
            if (session()->id == '1') {
                $data['getAbsen'] = $model->getAbsen();
            }
            else{
                $data['getAbsen'] = $model->getAbsen(session()->id);
            }
        }
        else{
            $model_pegawai = new PegawaiModel();
            $data_pegawai = $model_pegawai->getPegawaiByIdUser(session()->id);
            $data['getAbsen'] = $model->getAbsenByIdNomorInduk($data_pegawai[0]->nomor_induk);
        }

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('absen/index', $data);
        echo view('layout/v_footer');
    }

    public function absen_pegawai($nomor_induk){
        $data['session'] = session();

        $model_pegawai = new PegawaiModel();
        $data_pegawai = $model_pegawai->getPegawaiByNomorInduk($nomor_induk);

        $model_absen = new AbsenModel();

        if($data_pegawai){
            $data_absen = [
                'id_petugas' => session()->id,
                'id_pegawai' => $data_pegawai[0]->id_pegawai
            ];            
            
            $model_absen->save($data_absen); 
            
            session()->setFlashdata("success", "Terimakasih telah melakukan scan barcode. A.N. <b>".$data_pegawai[0]->nama_pegawai."</b> dengan Nomor Induk <b>".$data_pegawai[0]->nomor_induk."</b>. Sampai Jumpa Kembali!");
        }

        else {
            session()->setFlashdata("error", "Erorr! Data tidak ditemukan. Sampai Jumpa Kembali!");
        }            
        
        return redirect()->to('/scanner_master');
    }

    public function absen_pegawai_manual(){
        $data['session'] = session();

        $model_pegawai = new PegawaiModel();
        $data_pegawai = $model_pegawai->getPegawaiByNomorInduk($this->request->getVar('nomor_induk'));

        $model_absen = new AbsenModel();

        if($data_pegawai){
            $data_absen = [
                'id_petugas' => session()->id,
                'id_pegawai' => $data_pegawai[0]->id_pegawai
            ];            
            
            $model_absen->save($data_absen); 
            
            session()->setFlashdata("success", "Terimakasih telah melakukan absensi kehadiran. A.N. <b>".$data_pegawai[0]->nama_pegawai."</b> dengan Nomor Induk <b>".$data_pegawai[0]->nomor_induk."</b>. Sampai Jumpa Kembali!");
        }

        else {
            session()->setFlashdata("error", "Erorr! Data tidak ditemukan. Sampai Jumpa Kembali!");
        }            
        
        return redirect()->to('/scanner_master');
    }
}
