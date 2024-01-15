<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'berita';
    protected $primaryKey       = 'id_berita';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul',
        'slug',
        'kategori',
        'isi',
        'gambar',
        'penulis',
        'tanggal',
        'publish'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


    public function getBerita($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function getFirstBerita()
    {
        $query =  $this->db->table('berita')->get()->getFirstRow();
        return $query;
    }
    public function getSecondBerita()
    {
        $query =  $this->db->table('berita')->get();
        $result = $query->getRow(2);
        return $result;
    }
    public function getThirdsBerita()
    {
        $query =  $this->db->table('berita')->get();
        $result = $query->getRow(1);
        return $result;
    }
}
