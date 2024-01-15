<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SDomisiliModel;
use App\Models\SKeteranganTMModel;
use App\Models\SKematianModel;
use App\Models\SKeteranganUsahaModel;
use App\Models\SPengantarModel;
use App\Models\SWarisModel;
use App\Models\WargaModel;

class DashboardController extends BaseController
{
    protected $s_pengantar;
    protected $s_keterangan_usaha;
    protected $s_domisili;
    protected $s_kelahiran;
    protected $s_kematian;
    protected $s_waris;
    protected $warga;
 
    function __construct()
    {
        $this->s_pengantar = new SPengantarModel();
        $this->s_keterangan_usaha = new SKeteranganUsahaModel(); 
        $this->s_domisili = new SDomisiliModel();
        $this->s_kelahiran = new SKeteranganTMModel();
        $this->s_kematian = new SKematianModel();
        $this->s_waris = new SWarisModel();
        $this->warga = new WargaModel();
        helper(['form','url','session','text']);
        setlocale(LC_ALL, 'id-ID', 'id_ID');
    }
    public function index()
    {
        if(session()->get('role') != 'admin'){
            return redirect()->to('superadmin');
        }
        $data = ([
            'jumlah_s_keterangan_usaha'   => $this->s_keterangan_usaha->countAllResults(),
            'jumlah_s_domisili'   => $this->s_domisili->countAllResults(),
            'jumlah_s_pengantar'   => $this->s_pengantar->countAllResults(),
            'jumlah_s_tidak_mampu'   => $this->s_kelahiran->countAllResults(),
            'jumlah_s_kematian'   => $this->s_kematian->countAllResults(),
            'jumlah_s_waris'   => $this->s_waris->getDataCount(),
            'jumlah_warga'   => $this->warga->countAllResults(),
        ]);
        // dd($data);
        return view('dashboard/index', $data);
    }
}
