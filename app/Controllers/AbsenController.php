<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AbsenModel;
use App\Models\PegawaiModel;

class AbsenController extends BaseController
{
    public function __construct()
    {
        // Load Session
        $this->session = session();

        // Load the database library
        $this->db = \Config\Database::connect();

        // Load a model
        $this->model_absen = new AbsenModel();
        $this->model_pegawai = new PegawaiModel();
    }

    public function index()
    {
        $data['session'] = $this->session;
        $data['title'] = 'Data Absen';

        if (session()->role != '3') {
            if (session()->id == '1') {
                $data['getAbsen'] = $this->model_absen->getAbsen();
            }
            else{
                $data['getAbsen'] = $this->model_absen->getAbsen($this->session->id);
            }
        }
        else{
            $data_pegawai = $this->model_pegawai->getPegawaiByIdUser($this->session->id);
            $data['getAbsen'] = $this->model_absen->getAbsenByIdNomorInduk($data_pegawai[0]->nomor_induk);
        }

        echo view('layout/v_header', $data);
        echo view('layout/v_sidebar');
        echo view('layout/v_navbar');
        echo view('absen/index', $data);
        echo view('layout/v_footer');
    }

    public function absen_pegawai($nomor_induk){
        $data['session'] = $this->session;

        $nomor_induk = $nomor_induk;

        date_default_timezone_set('Asia/Jakarta');
        $waktu_sekarang = date('Y-m-d  H:i:s');

        // CEK DATA PEGAWAI
        $data_pegawai = $this->model_pegawai->getPegawaiByNomorInduk($nomor_induk);

        if($data_pegawai){
            // CEK DATA ABSEN
            $data_absen = $this->model_absen->getAbsenByIdNomorIndukByWaktuIn($nomor_induk);

            if ($data_absen) {
                $data_absen_pegawai = [
                    'out' => $waktu_sekarang,
                ];            
                
                $this->model_absen->update($data_absen[0]->id_absen, $data_absen_pegawai);
            }
            else {
                $data_absen_pegawai = [
                    'id_petugas' => session()->id,
                    'id_pegawai' => $data_pegawai[0]->id_pegawai,
                    'in' => $waktu_sekarang,
                    'status_kehadiran' => 'HADIR',
                ];            
                
                $this->model_absen->save($data_absen_pegawai); 
            }   
            session()->setFlashdata("success", "Terimakasih telah melakukan scan barcode. A.N. <b>".$data_pegawai[0]->nama_pegawai."</b> dengan Nomor Induk <b>".$data_pegawai[0]->nomor_induk."</b>. Sampai Jumpa Kembali!");
        }
        else {
            session()->setFlashdata("error", "Erorr! Data tidak ditemukan. Sampai Jumpa Kembali!");
        }            
        
        return redirect()->to('/scanner_master');
    }

    public function absen_pegawai_manual(){
        $data['session'] = $this->session;

        $nomor_induk = $this->request->getVar('nomor_induk');

        date_default_timezone_set('Asia/Jakarta');
        $waktu_sekarang = date('Y-m-d  H:i:s');

        // CEK DATA PEGAWAI
        $data_pegawai = $this->model_pegawai->getPegawaiByNomorInduk($nomor_induk);

        if($data_pegawai){
            // CEK DATA ABSEN
            $data_absen = $this->model_absen->getAbsenByIdNomorIndukByWaktuIn($nomor_induk);

            if ($data_absen) {
                $data_absen_pegawai = [
                    'out' => $waktu_sekarang,
                ];            
                
                $this->model_absen->update($data_absen[0]->id_absen, $data_absen_pegawai);
            }
            else {
                $data_absen_pegawai = [
                    'id_petugas' => session()->id,
                    'id_pegawai' => $data_pegawai[0]->id_pegawai,
                    'in' => $waktu_sekarang,
                    'status_kehadiran' => 'HADIR',
                ];            
                
                $this->model_absen->save($data_absen_pegawai); 
            }   
            session()->setFlashdata("success", "Terimakasih telah melakukan absensi kehadiran. A.N. <b>".$data_pegawai[0]->nama_pegawai."</b> dengan Nomor Induk <b>".$data_pegawai[0]->nomor_induk."</b>. Sampai Jumpa Kembali!");
        }
        else {
            session()->setFlashdata("error", "Erorr! Data tidak ditemukan. Sampai Jumpa Kembali!");
        }            
        
        return redirect()->to('/scanner_master');
    }
}
