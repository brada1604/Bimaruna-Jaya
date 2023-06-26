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
    protected $allowedFields    = ["id_petugas", "id_pegawai"];

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
            $query = $this->db->query("SELECT * FROM v_absen");
            return $query->getResult(); // return berupa array objek

        } else {
            $query = $this->db->query("SELECT * FROM v_absen where id_petugas = '$id_petugas' ");
            return $query->getResult();
        }
    }

}
