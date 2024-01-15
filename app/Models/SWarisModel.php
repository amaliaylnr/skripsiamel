<?php

namespace App\Models;

use CodeIgniter\Model;

class SWarisModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_s_waris';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nik',
        'ns_waris',
        'jenis_surat',
        'keperluan',
        'pengambilan',
        'status',
        'nama_ahli_waris',
        'kelamin_waris',
        'tgl_lahir_ahli_waris',
        'umur',
        'nik_ahli_waris',
        'hubungan_keluarga',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function saveAdmin($data_group) {
        $data_group['nik'] = $this->db->insertID();
        return $this->db->table('tb_s_waris')->insert( $data_group);
    }
    public function saveNew($data_user) {
        return $this->db->table('tb_warga')->insert($data_user);
    }

    public function getData()
    {
        $query =  $this->db->table('tb_s_waris')
        ->join('tb_warga', 'tb_s_waris.nik = tb_warga.nik')
        ->groupBy('ns_waris')
        ->get();  
       return $query;
    }
    public function getDataCount()
    {
        $query =  $this->db->table('tb_s_waris');
        $result = $query->groupBy('ns_waris');
        $query = $result->get()->getResult();
        $query = count($query);

        return $query;
    }

    public function getDataById($id=null)
    {
        $query =  $this->db->table('tb_s_waris')
        ->where('ns_waris',$id)
        ->join('tb_warga', 'tb_s_waris.nik = tb_warga.nik')
        ->get();  
       return $query;
    }

    public function getDataView($id=null)
    {
        $query =  $this->db->table('tb_s_waris')
        ->where('ns_waris',$id)
        ->join('tb_warga', 'tb_s_waris.nik = tb_warga.nik')
        ->get();  
        return $query;
    }

    public function getDataByNoSurat($nomor=null)
    {
        $query =  $this->db->table('tb_s_waris')
        ->where('ns_waris',$nomor)
        ->get();  
       return $query;
    }

}
