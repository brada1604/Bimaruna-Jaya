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
            $data['getTotalAbsenHariIni'] = $this->model_absen->getTotalAbsenByIdNomorIndukByWaktuIn($data_pegawai[0]->nomor_induk)[0]->total_data;
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
                $getTotalAbsenHariIni = $this->model_absen->getTotalAbsenByIdNomorIndukNotHadir($nomor_induk)[0]->total_data;
                if ($getTotalAbsenHariIni == 0 ) {
                    $data_absen_pegawai = [
                        'id_petugas' => session()->id,
                        'id_pegawai' => $data_pegawai[0]->id_pegawai,
                        'in' => $waktu_sekarang,
                        'status_kehadiran' => 'HADIR',
                    ];            
                    
                    $this->model_absen->save($data_absen_pegawai); 
                }
                else{
                    $data_absen_new = $this->model_absen->getAbsenByIdNomorIndukByCreatedAt($nomor_induk);
                    $data_absen_pegawai = [
                        'id_petugas' => session()->id,
                        'id_pegawai' => $data_pegawai[0]->id_pegawai,
                        'in' => $waktu_sekarang,
                        'status_kehadiran' => 'HADIR',
                        'file' => '',
                        'konfirmasi_petugas' => ''
                    ]; 
                    
                    $this->model_absen->update($data_absen_new[0]->id_absen, $data_absen_pegawai);
                }
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
                $getTotalAbsenHariIni = $this->model_absen->getTotalAbsenByIdNomorIndukNotHadir($nomor_induk)[0]->total_data;
                if ($getTotalAbsenHariIni == 0 ) {
                    $data_absen_pegawai = [
                        'id_petugas' => session()->id,
                        'id_pegawai' => $data_pegawai[0]->id_pegawai,
                        'in' => $waktu_sekarang,
                        'status_kehadiran' => 'HADIR',
                    ];            
                    
                    $this->model_absen->save($data_absen_pegawai); 
                }
                else{
                    $data_absen_new = $this->model_absen->getAbsenByIdNomorIndukByCreatedAt($nomor_induk);
                    $data_absen_pegawai = [
                        'id_petugas' => session()->id,
                        'id_pegawai' => $data_pegawai[0]->id_pegawai,
                        'in' => $waktu_sekarang,
                        'status_kehadiran' => 'HADIR',
                        'file' => '',
                        'konfirmasi_petugas' => ''
                    ]; 
                    
                    $this->model_absen->update($data_absen_new[0]->id_absen, $data_absen_pegawai);
                }
            }   
            session()->setFlashdata("success", "Terimakasih telah melakukan absensi kehadiran. A.N. <b>".$data_pegawai[0]->nama_pegawai."</b> dengan Nomor Induk <b>".$data_pegawai[0]->nomor_induk."</b>. Sampai Jumpa Kembali!");
        }
        else {
            session()->setFlashdata("error", "Erorr! Data tidak ditemukan. Sampai Jumpa Kembali!");
        }            
        
        return redirect()->to('/scanner_master');
    }

    public function upload_surat_absen(){
        // CEK DATA PEGAWAI
        $data_pegawai = $this->model_pegawai->getIdentitasPegawai(session()->id);
        $id_pegawai = $data_pegawai[0]->id_pegawai;
        $nomor_induk = $data_pegawai[0]->nomor_induk;

        date_default_timezone_set('Asia/Jakarta');
        $path_surat = "assets/surat_absen/".$nomor_induk."_".date('YmdHis');


        $fileSurat_name = "";
        if(isset($_FILES) && @$_FILES['file_surat']['error'] != '4') {
            if($fileSurat = $this->request->getFile('file_surat')) {
                if (! $fileSurat->isValid()) {
                    throw new \RuntimeException($fileSurat->getErrorString().'('.$fileSurat->getError().')');
                } else {            
 
                    $fileSurat->move($path_surat);
                    $fileSurat_name = $fileSurat->getName();
                }
            }
        }
        $data_absen_pegawai = [
            'id_petugas' => 1,
            'id_pegawai' => $id_pegawai,
            'status_kehadiran' => $this->request->getVar('status_kehadiran'),
            'file' => '/'.$path_surat.'/'.$fileSurat_name,
            'konfirmasi_petugas' => 0
        ]; 
         
        $this->model_absen->save($data_absen_pegawai);

        // return redirect()->to('/absen_master_pegawai');
        echo '<script> alert("Selamat! Berhasil mengajukan absen dan upload surat absen"); window.location="' . base_url('/absen_master_pegawai') . '" </script>';
    }

    public function update_konfirmasi_petugas($id_absen, $konfirmasi_petugas){
        $data_absen_pegawai = [
            'konfirmasi_petugas' => $konfirmasi_petugas,
        ];            
        
        $this->model_absen->update($id_absen, $data_absen_pegawai);
        echo '<script> alert("Selamat! Berhasil Mengubah konfirmasi petugas"); window.location="' . base_url('/absen_master_pegawai') . '" </script>';
    }

    public function update_status_kehadiran($id_absen, $status_kehadiran){
        $data_absen_pegawai = [
            'status_kehadiran' => $status_kehadiran,
            'konfirmasi_petugas' => 0,
        ];            
        
        $this->model_absen->update($id_absen, $data_absen_pegawai);
        echo '<script> alert("Selamat! Berhasil Mengubah status kehadiran"); window.location="' . base_url('/absen_master_pegawai') . '" </script>';
    }
}
