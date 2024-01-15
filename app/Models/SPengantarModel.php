<?php

namespace App\Models;

use CodeIgniter\Model;

class SPengantarModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_s_pengantar';
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

    public function getSurat($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $slug])->first();
    }

    public function saveAdmin($data_group) {
        $data_group['nik'] = $this->db->insertID();
        return $this->db->table('tb_s_pengantar')->insert( $data_group);
    }
    public function saveNew($data_user) {
        return $this->db->table('tb_warga')->insert($data_user);
    }

    public function getData()
    {
        $query =  $this->db->table('tb_s_pengantar')
        ->join('tb_warga', 'tb_s_pengantar.nik = tb_warga.nik')
        ->get();  
       return $query;
    }
    public function getDataView($id=null)
    {
        $query =  $this->db->table('tb_s_pengantar')
        ->where('id',$id)
        ->join('tb_warga', 'tb_s_pengantar.nik = tb_warga.nik')
        ->get();  
        return $query;
    }
    public function getDataById($id=null)
    {
        $query =  $this->db->table('tb_s_pengantar')
        ->where('nik',$id)
        ->join('tb_warga', 'tb_s_pengantar.nik = tb_warga.nik')
        ->get();  
        return $query;
    }

}
