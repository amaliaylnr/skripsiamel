<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;

class AboutController extends BaseController
{
    function __construct()
    {
        $this->berita = new BeritaModel();
        helper(['form','url']);
    }
    public function index()
    {
        $autoload['helper'] = array('text');
        $data = "TENTANG WEBSITE DESA";
        return view('dashboard/berita/v_berita',$data);
    }
}
