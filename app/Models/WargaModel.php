<?php

namespace App\Models;

use CodeIgniter\Model;

class WargaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tb_warga';
    protected $primaryKey       = 'nik';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nik',
        'no_kk',
        'nama',
        'slug',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'agama',
        'kewarganegaraan',
        'status_perkawinan',
        'pekerjaan',
        'alamat',
        'email',
        'telepon',
        'identitas',
        'ayah',
        'ibu',
        'pendidikan',
        'rt',
        'rw',
        'dusun',
        'no_urut_kk',
        'umur',
        'shdk'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function saveNew($data_user) {
        return $this->db->table('tb_warga')->insert($data_user);
    }
    public function getAllData()
    {
        $query =  $this->db->table('tb_s_waris')
        ->join('tb_warga', 'tb_s_waris.nik = tb_warga.nik')
        ->get();  
       return $query;
    }

}
