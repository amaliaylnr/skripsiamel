<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\ProdukModel;
use App\Models\SDomisiliModel;
use App\Models\SKeteranganTMModel;
use App\Models\SKematianModel;
use App\Models\SKeteranganUsahaModel;
use App\Models\SPengantarModel;
use App\Models\SPermohonanModel;
use App\Models\SWarisModel;
use App\Models\WargaModel;
use DateTime;

class HomepageController extends BaseController
{

    protected $s_pengantar;
    protected $s_keterangan_domisili;
    protected $s_keterangan_usaha;
    protected $s_keterangan_tm;
    protected $s_keterangan_kematian;
    protected $s_waris;
    protected $warga;
    protected $berita;
    protected $produk;
 
    function __construct()
    {
        $this->s_pengantar = new SPengantarModel();
        $this->s_keterangan_domisili = new SDomisiliModel();
        $this->s_keterangan_usaha = new SKeteranganUsahaModel();
        $this->s_keterangan_tm = new SKeteranganTMModel();
        $this->s_keterangan_kematian = new SKematianModel();
        $this->s_waris = new SWarisModel();
        $this->warga = new WargaModel();
        $this->berita = new BeritaModel();
        $this->produk = new ProdukModel();
        helper(['form','url','text']);
        
    }
    public function index()
    {
        $data = [
            'berita_1' => $this->berita->getFirstBerita(),
            'berita_2' => $this->berita->getSecondBerita(),
            'berita_3' => $this->berita->getThirdsBerita(),
            'berita' => $this->berita->findAll(),
        ];
        // dd($data);
        return view('publik/index', $data);
    }

    public function berita()
    {
        $data = [
            'berita_baru' => $this->berita->getFirstBerita(),
            'berita' => $this->berita->findAll(),
        ];
        return view('publik/berita', $data);
    }

    public function berita_view($slug = null)
    {
        $data = ([
            'berita'   => $this->berita->getBerita($slug),
            'berita_list' => $this->berita->findAll(),
        ]);
        // dd($data);
        return view('publik/berita_view', $data);
    }

    public function produk()
    {
        $data = [
            'produk' => $this->produk->getProduk(),
        ];
        return view('publik/produk', $data);
    }

    public function pengajuan()
    {
        return view('publik/pengajuan');
    }

    public function form_pengantar()
    {
        $data = [];
        return view('publik/tambah/form_pengantar', $data);
    }
    public function form_pengantar_proses()
    {
        $rules = [
            'nik'           => 'required|min_length[16]',
        ];
        $surat_pengantar = $this->s_pengantar;
        $warga = $this->warga;
        $imageFile = $this->request->getFile('identitas');
        $dateNow = date('Y-m-d');
        $selesai = date('Y-m-d', strtotime("+3 months", strtotime($dateNow)));
        if($this->validate($rules)){  
            $nama = $this->request->getVar('nama');
            $nik = $this->request->getVar('nik');
            $no_kk = $this->request->getVar('no_kk');
            $keterangan = $this->request->getVar('keterangan');
            $out = explode(" ",$nama);
            $slugs = implode("_",$out);
            
            $result = $warga->find($nik);
            if (empty($result)) {
                $gambarName = ($nik.'.'.$imageFile->getClientExtension());
                $imageFile->move(WRITEPATH . '../public/assets/surat/surat_pengantar/',$gambarName);
                $data_diri = [
                    'nik'       => $nik,
                    'no_kk' => $no_kk,
                    'nama'     => $nama,
                    'slug'     => $nik.'_'.$slugs,
                    'tempat_lahir'    => $this->request->getVar('tempat_lahir'),
                    'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                    'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                    'agama' => $this->request->getVar('agama'),
                    'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
                    'status_perkawinan' => $this->request->getVar('status_perkawinan'),
                    'pekerjaan' => $this->request->getVar('pekerjaan'),
                    'alamat' => $this->request->getVar('alamat'),
                    'email' => $this->request->getVar('email'),
                    'telepon' => $this->request->getVar('telepon'),
                    'identitas' => $gambarName,
                ];
                $surat_pengantar->saveNew($data_diri);
                $result2 = $warga->find($nik);
                
                $data_permohonan = [
                    'nik'   => $result2['nik'],
                    'jenis_surat' => 'Surat Pengantar',
                    'keperluan' => $this->request->getVar('keperluan'),
                    'pengambilan' => $this->request->getVar('pengambilan'),
                    'identitas' => $gambarName,
                    'status' => 'proses',
                    'mulai' => $dateNow,
                    'selesai'   => $selesai,
                    'keterangan'    => $keterangan
                    
                ];
                
                $surat_pengantar->save($data_permohonan);
                return redirect()->to('pengajuan')->with('success', 'Data telah ditambahkan');
                
            }
            elseif (!empty($result)) {
                $niks = $result['nik'];
                $gambarName = ($niks.'.'.$imageFile->getClientExtension());
                $data_diri = [
                    'nik'       => $niks,
                ];
                // $warga->save($data_diri);
                $data_permohonan = [
                    'nik'   => $nik,
                    'jenis_surat' => 'Surat Pengantar',
                    'keperluan' => $this->request->getVar('keperluan'),
                    'pengambilan' => $this->request->getVar('pengambilan'),
                    'identitas' => $gambarName,
                    'status' => 'proses',
                    'mulai' => $dateNow,
                    'selesai'   => $selesai,
                    'keterangan'    => $keterangan
    
                ];
                if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                    $old_img = $result['identitas'];
                    if (file_exists("../public/assets/surat/surat_pengantar/".$old_img)) {
                        // unlink('../public/assets/surat/surat_pengantar/'.$old_img);
                    }
                    $gambarName = ($nik.'.'.$imageFile->getClientExtension());
                    $imageFile->move('../public/assets/surat/surat_pengantar/',$gambarName);
                    $data_diri['identitas'] = $gambarName;
        
                }
                $surat_pengantar->save($data_permohonan);
                return redirect()->to('pengajuan')->with('success', 'Data telah ditambahkan');
            }
            
            // $warga->save($data_diri);
            
           

            
            return redirect()->to('pengajuan/surat_pengantar')->with('success', 'Data tidak tersimpan');

        }else{
            $data['validation'] = $this->validator;
            echo view('publik/pengajuan', $data);
        }
    }

    public function form_domisili()
    {
        $data = [];
        return view('publik/tambah/form_domisili', $data);
    }
    public function form_domisili_proses()
    {
        $rules = [
            'nik'           => 'required|min_length[16]',
        ];
        $surat_keterangan_domisili = $this->s_keterangan_domisili;
        $warga = $this->warga;
        $imageFile = $this->request->getFile('identitas');
        $dateNow = date('Y-m-d');
        $selesai = date('Y-m-d', strtotime("+3 months", strtotime($dateNow)));
        $no_kk = $this->request->getVar('no_kk');
        $keterangan = $this->request->getVar('keterangan');
        if($this->validate($rules)){  
            $nama = $this->request->getVar('nama');
            $nik = $this->request->getVar('nik');
            $out = explode(" ",$nama);
            $slugs = implode("_",$out);
            
            $result = $warga->find($nik);
            if (empty($result)) {
                $gambarName = ($nik.'.'.$imageFile->getClientExtension());
                $imageFile->move(WRITEPATH . '../public/assets/surat/surat_keterangan_domisili/',$gambarName);
                $data_diri = [
                    'nik'       => $nik,
                    'no_kk'     => $no_kk,
                    'nama'     => $nama,
                    'slug'     => $nik.'_'.$slugs,
                    'tempat_lahir'    => $this->request->getVar('tempat_lahir'),
                    'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                    'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                    'agama' => $this->request->getVar('agama'),
                    'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
                    'status_perkawinan' => $this->request->getVar('status_perkawinan'),
                    'pekerjaan' => $this->request->getVar('pekerjaan'),
                    'alamat' => $this->request->getVar('alamat'),
                    'email' => $this->request->getVar('email'),
                    'telepon' => $this->request->getVar('telepon'),
                    'identitas' => $gambarName,
                ];
                $surat_keterangan_domisili->saveNew($data_diri);
                $result2 = $warga->find($nik);
                
                $data_permohonan = [
                    'nik'   => $result2['nik'],
                    'jenis_surat' => 'Surat Keterangan Domisili',
                    'keperluan' => $this->request->getVar('keperluan'),
                    'pengambilan' => $this->request->getVar('pengambilan'),
                    'identitas' => $gambarName,
                    'status' => 'proses',
                    'mulai' => $dateNow,
                    'selesai'   => $selesai,
                    'keterangan'    => $keterangan
                    
                ];
                
                $surat_keterangan_domisili->save($data_permohonan);
                return redirect()->to('pengajuan')->with('success', 'Data telah ditambahkan');
                
            }
            elseif (!empty($result)) {
                $niks = $result['nik'];
                $gambarName = ($niks.'.'.$imageFile->getClientExtension());
                $data_diri = [
                    'nik'       => $niks,
                ];
                // $warga->save($data_diri);
                $data_permohonan = [
                    'nik'   => $nik,
                    'jenis_surat' => 'Surat Keterangan Domisili',
                    'keperluan' => $this->request->getVar('keperluan'),
                    'pengambilan' => $this->request->getVar('pengambilan'),
                    'identitas' => $gambarName,
                    'status' => 'proses',
                    'mulai' => $dateNow,
                    'selesai'   => $selesai,
                    'keterangan'    => $keterangan
    
                ];
                if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                    $old_img = $result['identitas'];
                    if (file_exists("../public/assets/surat/surat_domisili/".$old_img)) {
                        unlink('../public/assets/surat/surat_domisili/'.$old_img);
                    }
                    $gambarName = ($nik.'.'.$imageFile->getClientExtension());
                    $imageFile->move('../public/assets/surat/surat_domisili/',$gambarName);
                    $data_diri['identitas'] = $gambarName;
        
                }
                $surat_keterangan_domisili->save($data_permohonan);
                return redirect()->to('pengajuan')->with('success', 'Data telah ditambahkan');
            }
            
            // $warga->save($data_diri);
            
           

            
            return redirect()->to('pengajuan/surat_domisili')->with('success', 'Data tidak tersimpan');

        }else{
            $data['validation'] = $this->validator;
            echo view('publik/pengajuan', $data);
        }
    }

    // surat keterangan
    public function form_keterangan_usaha()
    {
        $data = [];
        return view('publik/tambah/form_keterangan_usaha', $data);
    }
    public function form_keterangan_usaha_proses()
    {
        $rules = [
            'nik'           => 'required|min_length[16]',
        ];
        $surat_keterangan_usaha = $this->s_keterangan_usaha;
        $warga = $this->warga;
        $imageFile = $this->request->getFile('identitas');
        $dateNow = date('Y-m-d');
        $selesai = date('Y-m-d', strtotime("+3 months", strtotime($dateNow)));
        $no_kk = $this->request->getVar('no_kk');
        $keterangan = $this->request->getVar('keterangan');
        if($this->validate($rules)){  
            $nama = $this->request->getVar('nama');
            $nik = $this->request->getVar('nik');
            $out = explode(" ",$nama);
            $slugs = implode("_",$out);
            
            $result = $warga->find($nik);
            if (empty($result)) {
                $gambarName = ($nik.'.'.$imageFile->getClientExtension());
                $imageFile->move(WRITEPATH . '../public/assets/surat/surat_keterangan_usaha/',$gambarName);
                $data_diri = [
                    'nik'       => $nik,
                    'no_kk' => $no_kk,
                    'nama'     => $nama,
                    'slug'     => $nik.'_'.$slugs,
                    'tempat_lahir'    => $this->request->getVar('tempat_lahir'),
                    'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                    'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                    'agama' => $this->request->getVar('agama'),
                    'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
                    'status_perkawinan' => $this->request->getVar('status_perkawinan'),
                    'pekerjaan' => $this->request->getVar('pekerjaan'),
                    'alamat' => $this->request->getVar('alamat'),
                    'email' => $this->request->getVar('email'),
                    'telepon' => $this->request->getVar('telepon'),
                    'identitas' => $gambarName,
                ];
                $surat_keterangan_usaha->saveNew($data_diri);
                $result2 = $warga->find($nik);
                
                $data_keterangan = [
                    'nik'   => $result2['nik'],
                    'jenis_surat' => 'Surat Keterangan Usaha',
                    'keperluan' => $this->request->getVar('keperluan'),
                    'pengambilan' => $this->request->getVar('pengambilan'),
                    'status' => 'proses',
                    'mulai' => $dateNow,
                    'selesai'   => $selesai,
                    'keterangan'    => $keterangan
                    
                ];
                
                $surat_keterangan_usaha->save($data_keterangan);
                return redirect()->to('pengajuan')->with('success', 'Pembuatan Surat Keterangan Usaha Sudah Terkirim');
                
            }
            elseif (!empty($result)) {
                $niks = $result['nik'];
                $gambarName = ($niks.'.'.$imageFile->getClientExtension());
                $data_diri = [
                    'nik'       => $niks,
                ];
                // $warga->save($data_diri);
                $data_keterangan = [
                    'nik'   => $nik,
                    'jenis_surat' => 'Surat Keterangan Usaha',
                    'keperluan' => $this->request->getVar('keperluan'),
                    'pengambilan' => $this->request->getVar('pengambilan'),
                    'status' => 'proses',
                    'mulai' => $dateNow,
                    'selesai'   => $selesai,
                    'keterangan'    => $keterangan
    
                ];
                if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                    $old_img = $result['identitas'];
                    if (file_exists("../public/assets/surat/surat_keterangan_usaha/".$old_img)) {
                        unlink('../public/assets/surat/surat_keterangan_usaha/'.$old_img);
                    }
                    $gambarName = ($nik.'.'.$imageFile->getClientExtension());
                    $imageFile->move('../public/assets/surat/surat_keterangan_usaha/',$gambarName);
                    $data_diri['identitas'] = $gambarName;
        
                }
                $surat_keterangan_usaha->save($data_keterangan);
                return redirect()->to('pengajuan')->with('success', 'Pembuatan Surat Keterangan Sudah Terkirim');
            }
            
            return redirect()->to('pengajuan/surat_keterangan)usaha')->with('success', 'Data tidak tersimpan');

        }else{
            $data['validation'] = $this->validator;
            echo view('publik/tambah/form_keterangan', $data);
        }
    }

    // surat kelahiran
    public function form_tidak_mampu()
    {
        $data = [];
        return view('publik/tambah/form_tidak_mampu', $data);
    }
    public function form_tidak_mampu_proses()
    {
        helper(['form']);
        $rules = [
            'nik'           => 'required|min_length[16]',
        ];
        $surat_keterangan_tm = $this->s_keterangan_tm;
        $warga = $this->warga;
        $imageFile = $this->request->getFile('identitas');
        $dateNow = date('Y-m-d');
        $selesai = date('Y-m-d', strtotime("+3 months", strtotime($dateNow)));
        $no_kk = $this->request->getVar('no_kk');
        $keterangan = $this->request->getVar('keterangan');
        if($this->validate($rules)){  
            $nama = $this->request->getVar('nama');
            $nik = $this->request->getVar('nik');
            $out = explode(" ",$nama);
            $slugs = implode("_",$out);
            
            $result = $warga->find($nik);
            if (empty($result)) {
                $gambarName = ($nik.'.'.$imageFile->getClientExtension());
                $imageFile->move(WRITEPATH . '../public/assets/surat/surat_ket_tidak_mampu/',$gambarName);
                $data_diri = [
                    'nik'       => $nik,
                    'no_kk' => $no_kk,
                    'nama'     => $nama,
                    'slug'     => $nik.'_'.$slugs,
                    'tempat_lahir'    => $this->request->getVar('tempat_lahir'),
                    'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                    'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                    'agama' => $this->request->getVar('agama'),
                    'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
                    'status_perkawinan' => $this->request->getVar('status_perkawinan'),
                    'pekerjaan' => $this->request->getVar('pekerjaan'),
                    'alamat' => $this->request->getVar('alamat'),
                    'email' => $this->request->getVar('email'),
                    'telepon' => $this->request->getVar('telepon'),
                    'identitas' => $gambarName,
                ];
                $surat_keterangan_tm->saveNew($data_diri);
                $result2 = $warga->find($nik);
                
                $data_kelahiran = [
                    'nik'   => $result2['nik'],
                    'jenis_surat' => 'Surat Keterangan Tidak Mampu',
                    'keperluan' => 'Surat Keterangan Tidak Mampu',
                    'pengambilan' => $this->request->getVar('pengambilan'),
                    'status' => 'proses',
                    'identitas' => $gambarName,
                    'nama_ayah' => $this->request->getVar('nama_ayah'),
                    'nama_ibu' => $this->request->getVar('nama_ibu'),
                    'keterangan'    => $keterangan
                    
                ];
                
                $surat_keterangan_tm->save($data_kelahiran);
                return redirect()->to('pengajuan')->with('success', 'Data telah ditambahkan');
                
            }
            elseif (!empty($result)) {
                $gambarName = ($nik.'.'.$imageFile->getClientExtension());
                $data_diri = [
                    'nik'       => $result['nik'],
                ];
                // $warga->save($data_diri);
                $data_kelahiran = [
                    'nik'   => $nik,
                    'jenis_surat' => 'Surat Keterangan Tidak Mampu',
                    'keperluan' => 'Surat Keterangan Tidak Mampu',
                    'pengambilan' => $this->request->getVar('pengambilan'),
                    'status' => 'proses',
                    'identitas' => $gambarName,
                    'nama_ayah' => $this->request->getVar('nama_ayah'),
                    'nama_ibu' => $this->request->getVar('nama_ibu'),
                    'keterangan'    => $keterangan
    
                ];
                if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                    $old_img = $result['identitas'];
                    if (file_exists("../public/assets/surat/surat_ket_tidak_mampu/".$old_img)) {
                        unlink('../public/assets/surat/surat_ket_tidak_mampu/'.$old_img);
                    }
                    $gambarName = ($nik.'.'.$imageFile->getClientExtension());
                    $imageFile->move('../public/assets/surat/surat_ket_tidak_mampu/',$gambarName);
                    $data_diri['identitas'] = $gambarName;
        
                }
                $surat_keterangan_tm->save($data_kelahiran);
                return redirect()->to('pengajuan')->with('success', 'Data pengajuan <b>Surat Keterangan Tidak Mampu </b>berhasil dikirim');
            }
            
            
            return redirect()->to('/pengajuan/surat_ket_tidak_mampu')->with('success', 'Data tidak tersimpan');

        }else{
            $data['validation'] = $this->validator;
            return view('publik/tambah/form_kelahiran', $data);
        }
    }

    // surat kematian
    public function form_kematian()
    {
        $data = [];
        return view('publik/tambah/form_kematian', $data);
    }
    public function form_kematian_proses()
    {

        helper(['form']);
        $rules = [
            'nik'           => 'required|min_length[16]',
        ];
        $surat_keterangan_kematian = $this->s_keterangan_kematian;
        $warga = $this->warga;
        $imageFile = $this->request->getFile('identitas');

        $no_kk = $this->request->getVar('no_kk');
        $keterangan = $this->request->getVar('keterangan');
        $tglKelahiran = $this->request->getVar('tgl_kelahiran');
        $tglMeninggal = $this->request->getVar('tgl_meninggal');
        $namaMeninggal = $this->request->getVar('nama');
        $dob = new DateTime($tglKelahiran);
        $today   = new DateTime('today');
        $year = $dob->diff($today)->y;
        $month = $dob->diff($today)->m;
        $day = $dob->diff($today)->d;
        $umur = $year;
        if($this->validate($rules)){  
            $nama = $this->request->getVar('nama');
            $nik = $this->request->getVar('nik');
            $out = explode(" ",$nama);
            $slugs = implode("_",$out);
            
            $data_warga = $warga->find($nik);
            // cek apakah nik sudah ada atau belom di data warga
            // jika nik kosong maka jalankan program dibawah
            if (empty($data_warga)) {
                $gambarName = ($nik.'.'.$imageFile->getClientExtension());
                
                $data_diri = [
                    'nik'       => $nik,
                    'no_kk' => $no_kk,
                    'nama'     => $nama,
                    'slug'     => $nik.'_'.$slugs,
                    'tempat_lahir'    => $this->request->getVar('tempat_lahir'),
                    'tgl_lahir' => $this->request->getVar('tgl_kelahiran'),
                    'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                    'agama' => $this->request->getVar('agama'),
                    'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
                    'status_perkawinan' => $this->request->getVar('status_perkawinan'),
                    'pekerjaan' => $this->request->getVar('pekerjaan'),
                    'alamat' => $this->request->getVar('alamat'),
                    'email' => $this->request->getVar('email'),
                    'telepon' => $this->request->getVar('telepon'),
                    'identitas' => $gambarName,
                ];
                $surat_keterangan_kematian->saveNew($data_diri);
                
                $data_kematian = [
                    'nik'   => $nik,
                    'jenis_surat' => 'Surat Keterangan Kematian',
                    'keperluan' => 'Surat Keterangan Kematian',
                    'pengambilan' => $this->request->getVar('pengambilan'),
                    'status' => 'proses',
                    'identitas' => $gambarName,
                    'nama_meninggal' => $namaMeninggal,
                    'tgl_kelahiran' => $tglKelahiran,
                    'tgl_meninggal' => $tglMeninggal,
                    'umur'          => $umur,
                    'keterangan'    => $keterangan
                    
                ];
                if (file_exists("../public/assets/surat/surat_kematian/".$gambarName)  ) {
                    unlink('../public/assets/surat/surat_kematian/'.$gambarName);
                }
                $gambarName = ($nik.'.'.$imageFile->getClientExtension());
                $imageFile->move('../public/assets/surat/surat_kematian/',$gambarName);
                // $imageFile->move(WRITEPATH . '../public/assets/surat/surat_kematian/',$gambarName);
                $surat_keterangan_kematian->save($data_kematian);
                return redirect()->to('pengajuan')->with('success', 'Data pengajuan <b>Surat Kematian </b> telah dikirim');
                
            }

            // cek apakah nik sudah ada atau belom di data warga, jika NIK sudah ada di data warga
            // maka jalankan program dibawah 
            elseif (!empty($data_warga)) {
                $gambarName = ($nik.'.'.$imageFile->getClientExtension());
                $data_diri = [
                    'nik'       => $data_warga['nik'],
                ];
                // $warga->save($data_diri);
                $data_kematian = [
                    'nik'   => $nik,
                    'jenis_surat' => 'Surat Keterangan Kematian',
                    'keperluan' => 'Surat Keterangan Kematian',
                    'pengambilan' => $this->request->getVar('pengambilan'),
                    'status' => 'proses',
                    'identitas' => $gambarName,
                    'nama_meninggal' => $namaMeninggal,
                    'tgl_kelahiran' => $tglKelahiran,
                    'tgl_meninggal' => $tglMeninggal,
                    'umur'          => $umur,
                    'keterangan'    => $keterangan
    
                ];

                // cek apakah format file gabar valid atau sesuai
                if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                    $old_img = $data_warga['identitas'];
                    if (file_exists("../public/assets/surat/surat_kematian/".$gambarName) ) {
                        unlink('../public/assets/surat/surat_kematian/'.$gambarName);
                    }
                    $gambarName = ($nik.'.'.$imageFile->getClientExtension());
                    $imageFile->move('../public/assets/surat/surat_kematian/',$gambarName);
                    $data_kematian['identitas'] = $gambarName;
        
                }
                $surat_keterangan_kematian->save($data_kematian);
                return redirect()->to('pengajuan')->with('success', 'Data pengajuan <b>Surat Kematian </b> telah dikirim');
            }
            
            
            return redirect()->to('/pengajuan/surat_kematian')->with('success', 'Data tidak tersimpan');

        }else{
            $data['validation'] = $this->validator;
            return view('publik/tambah/form_kematian', $data);
        }
    }


    // surat waris
    public function form_waris()
    {
        $data = [];
        return view('publik/tambah/form_waris', $data);
    }

    
    function getName($n) {
        $characters = '0000111122223456789';
        $randomString = '';
     
        for ($i = 0; $i < $n; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
     
        return $randomString;
    }
    public function form_waris_proses()
    {
        $surat_waris = $this->s_waris;
        $tb_warga = $this->warga;

        $nama = $this->request->getVar('nama');
        $nik = $this->request->getPost('nik');
        $no_kk = $this->request->getPost('no_kk');
        // $tempat_lahir= $this->request->getVar('tempat_lahir');
        // $tgl_lahir = $this->request->getVar('tgl_lahir');
        // $jenis_kelamin = $this->request->getVar('jenis_kelamin');
        // $agama = $this->request->getVar('agama');
        // $kewarganegaraan = $this->request->getVar('kewarganegaraan');
        // $status_perkawinan = $this->request->getVar('status_perkawinan');
        // $pekerjaan = $this->request->getVar('pekerjaan');
        // $alamat = $this->request->getVar('alamat');
        // $email = $this->request->getVar('email');
        // $telepon = $this->request->getVar('telepon');

        $nama_ahli_waris = $this->request->getVar('nama_ahli_waris');
        $kelamin_waris = $this->request->getVar('kelamin_waris');
        $tgl_lahir_ahli_waris = $this->request->getVar('tgl_lahir_ahli_waris');
        $nik_ahli_waris = $this->request->getVar('nik_ahli_waris');
        $hubungan_keluarga = $this->request->getVar('hubungan_keluarga');

        $time_now = date('Ymd.hms');
        $slug = [("SAW.".$time_now.".".$this->getName(5))];
        $jenis_surat = ['Surat Ahli Waris'];
        $keperluan = ['Surat Keterangan Ahli Waris'];
        $pengambilan = $this->request->getVar('pengambilan');
        $status = ['proses'];

        $imageFile = $this->request->getFile('identitas');
        $data_diri = array();
        $data = array();
        if ($nama) {
            $result = $tb_warga->find($nik[0]);
            if (empty($result)) {
                $gambarName = ($nik[0].'.'.$imageFile->getClientExtension());
                $imageFile->move(WRITEPATH . '../public/assets/surat/surat_waris/',$gambarName);
                $data_diri = [
                    'nik'       => $nik[0],
                    'no_kk'       => $no_kk[0],
                    'nama'     => $nama[0],
                    'slug'     => $slug[0],
                    'tempat_lahir'    => $this->request->getVar('tempat_lahir'),
                    'tgl_lahir' => $this->request->getVar('tgl_lahir'),
                    'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                    'agama' => $this->request->getVar('agama'),
                    'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
                    'status_perkawinan' => $this->request->getVar('status_perkawinan'),
                    'pekerjaan' => $this->request->getVar('pekerjaan'),
                    'alamat' => $this->request->getVar('alamat'),
                    'email' => $this->request->getVar('email'),
                    'telepon' => $this->request->getVar('telepon'),
                    'identitas' => $gambarName,
                ];
                $surat_waris->saveNew($data_diri);

                for ($i=0; $i < count($nama_ahli_waris); $i++) { 

                    $dob = new DateTime($tgl_lahir_ahli_waris[$i]);
                    $today   = new DateTime('today');
                    $year = $dob->diff($today)->y;
                    $month = $dob->diff($today)->m;
                    $day = $dob->diff($today)->d;
                    $umur = $year;
                    
                    $data = array(
                        array(
                        'nik' => $nik[0],
                        'ns_waris' => $slug[0],
                        'nama_ahli_waris' => $nama_ahli_waris[$i],
                        'kelamin_waris' => "L",
                        'tgl_lahir_ahli_waris' => $tgl_lahir_ahli_waris[$i],
                        'nik_ahli_waris' => $nik_ahli_waris[$i],
                        'hubungan_keluarga' => $hubungan_keluarga[$i],
                        'jenis_surat' => $jenis_surat[0],
                        'keperluan' => $keperluan[0],
                        'pengambilan' => $pengambilan[0],
                        'status' => $status[0],
                        'umur'  => $umur,
                        )
                    );
                    $surat_waris->insertBatch($data);
                    return redirect()->to('pengajuan')->with('success', 'Data pengajuan <b>Surat Ahli Waris </b>sudah dikirim');
                }

            }
            elseif (!empty($result)) {
                $gambarName = ($nik[0].'.'.$imageFile->getClientExtension());
                for ($i=0; $i < count($nama_ahli_waris); $i++) { 
                    $dob = new DateTime($tgl_lahir_ahli_waris[$i]);
                    $today   = new DateTime('today');
                    $year = $dob->diff($today)->y;
                    $month = $dob->diff($today)->m;
                    $day = $dob->diff($today)->d;
                    $umur = $year;
                    $data = array(
                        array(
                        'nik' => $nik[0],
                        'ns_waris' => $slug[0],
                        'nama_ahli_waris' => $nama_ahli_waris[$i],
                        'kelamin_waris' => "L",
                        'tgl_lahir_ahli_waris' => $tgl_lahir_ahli_waris[$i],
                        'nik_ahli_waris' => $nik_ahli_waris[$i],
                        'hubungan_keluarga' => $hubungan_keluarga[$i],
                        'jenis_surat' => $jenis_surat[0],
                        'keperluan' => $keperluan[0],
                        'pengambilan' => $pengambilan[0],
                        'status' => $status[0],
                        'umur'  => $umur,
                        )
                    );
                    $surat_waris->insertBatch($data);
                }
                if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                    $old_img = $result['identitas'];
                    if (file_exists("../public/assets/surat/surat_waris/".$old_img)) {
                        unlink('../public/assets/surat/surat_waris/'.$old_img);
                    }
                    $gambarName = ($nik[0].'.'.$imageFile->getClientExtension());
                    $imageFile->move('../public/assets/surat/surat_waris/',$gambarName);
                    $data_diri['identitas'] = $gambarName;
                }
                return redirect()->to('pengajuan')->with('success', 'Data pengajuan <b>Surat Ahli Waris </b>sudah dikirim');
            }
            return redirect()->to('/pengajuan/surat_waris')->with('success', 'Data tidak tersimpan');
            
            
        }

        else{
            $data['validation'] = $this->validator;
            return view('publik/tambah/form_waris', $data);
        }
    }

    public function about()
    {
        $data = "TENTANG WEBSITE DESA";
        return view('publik/about');
    }
}
