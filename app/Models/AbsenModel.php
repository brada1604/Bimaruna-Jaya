<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsenModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_absen';
    protected $primaryKey       = 'id_absen';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_petugas','id_pegawai','in','out','status_kehadiran','file','konfirmasi_petugas',];



    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getAbsen($id_petugas = false)
    {
        if ($id_petugas === false) {
            $query = $this->db->query("SELECT * FROM v_absen_master");
            return $query->getResult(); // return berupa array objek

        } else {
            $query = $this->db->query("SELECT * FROM v_absen_master where id_petugas = '$id_petugas' ");
            return $query->getResult();
        }
    }

    public function getAbsenByIdNomorInduk($nomor_induk)
    {
        $query = $this->db->query("SELECT * FROM v_absen_master where nomor_induk = '$nomor_induk' ");
        return $query->getResult();
    }

    public function getAbsenByIdNomorIndukByWaktuIn($nomor_induk)
    {
        $query = $this->db->query("SELECT * from v_absen_master WHERE nomor_induk = '$nomor_induk' AND waktu_in = CURRENT_DATE()");
        return $query->getResult();
    }

    public function getAbsenByIdNomorIndukByCreatedAt($nomor_induk)
    {
        $query = $this->db->query("SELECT * from v_absen_master WHERE nomor_induk = '$nomor_induk' AND date(created_at) = CURRENT_DATE()");
        return $query->getResult();
    }

    public function getTotalAbsenByIdNomorIndukByWaktuIn($nomor_induk)
    {
        $query = $this->db->query("SELECT COUNT(*) as total_data from v_absen_master WHERE nomor_induk = '$nomor_induk' AND (waktu_in = CURRENT_DATE() OR date(created_at) = CURRENT_DATE())");
        return $query->getResult();
    }

    public function getTotalAbsenByIdNomorIndukNotHadir($nomor_induk)
    {
        $query = $this->db->query("SELECT count(*) as total_data from v_absen_master WHERE nomor_induk = '$nomor_induk' AND date(created_at) = CURRENT_DATE() AND status_kehadiran != 'HADIR'");
        return $query->getResult();
    }

    public function getTotalHadirAllPegawaiPerhari(){
        $query = $this->db->query("SELECT * FROM v_total_hadir_semua_pegawai_perhari ");
        return $query->getResult();
    }

    public function getTotalSakitBelumKonfirmasiAllPegawaiPerhari(){
        $query = $this->db->query("SELECT * FROM v_total_sakit_belum_konfirmasi_semua_pegawai ");
        return $query->getResult();
    }

    public function getTotalSakitSudahKonfirmasiAllPegawaiPerhari(){
        $query = $this->db->query("SELECT * FROM v_total_sakit_sudah_konfirmasi_semua_pegawai ");
        return $query->getResult();
    }

    public function getTotalIzinBelumKonfirmasiAllPegawaiPerhari(){
        $query = $this->db->query("SELECT * FROM v_total_izin_belum_konfirmasi_semua_pegawai ");
        return $query->getResult();
    }

    public function getTotalIzinSudahKonfirmasiAllPegawaiPerhari(){
        $query = $this->db->query("SELECT * FROM v_total_izin_sudah_konfirmasi_semua_pegawai ");
        return $query->getResult();
    }

    public function getTotalAlphaAllPegawaiPerhari(){
        $query = $this->db->query("SELECT * FROM v_total_alpha_semua_pegawai_perhari ");
        return $query->getResult();
    }

    public function getTotalKehadiranPegawaiPertahunByNomorInduk($nomor_induk){
        $query = $this->db->query("SELECT * FROM v_total_kehadiran_pegawai_by_nomor_induk_pertahun where nomor_induk = '$nomor_induk' ");
        return $query->getResult();
    }

}
