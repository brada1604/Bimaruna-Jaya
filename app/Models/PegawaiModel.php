<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbl_pegawai';
    protected $primaryKey       = 'id_pegawai';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_user','nomor_induk','nama_pegawai'];

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


    public function getPegawai($id = false)
    {
        if ($id === false) {
            // return $this->findAll();

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_pegawai");
            return $query->getResult(); // return berupa array objek

        } else {
            // return $this->getWhere(['id' => $id]);

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_pegawai where id_pegawai = '$id' ");
            return $query->getResult(); // return berupa array objek
        }
    }

    public function getPegawaiByNama($nama)
    {
        if ($nama === false) {
            // return $this->findAll();

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_pegawai");
            return $query->getResult(); // return berupa array objek

        } else {
            // return $this->getWhere(['id' => $id]);

            // Manual atau Query Builder
            $query = $this->db->query("SELECT * FROM tbl_pegawai where nama LIKE '%$nama%' ");
            return $query->getResult(); // return berupa array objek
        }
    }

    public function getPegawaiByNomorInduk($nomor_induk)
    {
        $query = $this->db->query("SELECT * FROM tbl_pegawai where nomor_induk = '$nomor_induk' ");
        return $query->getResult(); // return berupa array objek
    }

    public function getPegawaiByIdUser($id = false)
    {
        $query = $this->db->query("SELECT * FROM tbl_pegawai where id_user = '$id' ");
        return $query->getResult(); // return berupa array objek
    }
    
}
