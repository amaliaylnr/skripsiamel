<?php

namespace App\Models;

use CodeIgniter\Model;

class SDomisiliModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_s_domisili';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nik',
        'jenis_surat',
        'keperluan',
        'pengambilan',
        'status',
        'mulai',
        'selesai',
        'keterangan'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function saveAdmin($data_group) {
        $data_group['nik'] = $this->db->insertID();
        return $this->db->table('tb_s_domisili')->insert( $data_group);
    }
    public function saveNew($data_user) {
        return $this->db->table('tb_warga')->insert($data_user);
    }

    public function getData()
    {
        $query =  $this->db->table('tb_s_domisili')
        ->join('tb_warga', 'tb_s_domisili.nik = tb_warga.nik')
        ->get();  
       return $query;
    }

    public function getDataView($id=null)
    {
        $query =  $this->db->table('tb_s_domisili')
        ->where('id',$id)
        ->join('tb_warga', 'tb_s_domisili.nik = tb_warga.nik')
        ->get();  
        return $query;
    }

    public function getDataById($id=null)
    {
        $query =  $this->db->table('tb_s_domisili')
        ->where('id',$id)
        ->join('tb_warga', 'tb_s_domisili.nik = tb_warga.nik')
        ->get();  
       return $query;
    }

}
