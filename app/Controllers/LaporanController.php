<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SDomisiliModel;
use App\Models\SKeteranganTMModel;
use App\Models\SKematianModel;
use App\Models\SKeteranganUsahaModel;
use App\Models\SPengantarModel;
use App\Models\SPermohonanModel;
use App\Models\SWarisModel;
use App\Models\WargaModel;

class LaporanController extends BaseController
{
    protected $warga;
    protected $s_pengantar;
    protected $s_domisili;
    protected $s_keterangan;
    protected $s_tidak_mampu;
    protected $s_kematian;
    protected $s_waris;
 
    function __construct()
    {
        $this->warga = new WargaModel();
        $this->s_pengantar = new SPengantarModel();
        $this->s_domisili = new SDomisiliModel();
        $this->s_keterangan = new SKeteranganUsahaModel();
        $this->s_tidak_mampu = new SKeteranganTMModel();
        $this->s_kematian = new SKematianModel();
        $this->s_waris = new SWarisModel();
        helper(['form','url','session','text']);
        setlocale(LC_ALL, 'id-ID', 'id_ID');
    }
    public function index($id_waris = null)
    {
        $data =array();
        $data = ([
            's_tidak_mampu'   => $this->s_tidak_mampu->findAll(),
            's_pengantar'     => $this->s_pengantar->findAll(),
            's_domisili'  => $this->s_domisili->findAll(),
            's_keterangan'  => $this->s_keterangan->findAll(),
            's_kematian'    => $this->s_kematian->findAll(),
            's_waris'       => $this->s_waris->getData()->getResultArray(),
            'data_waris'   => $this->s_waris->findAll(),
        ]);
        // dd($data);
        return view('dashboard/laporan/v_laporan',$data);
    }
}
