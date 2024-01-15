<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\WargaModel;
use DateTime;

class PendudukController extends BaseController
{
    protected $warga;
 
    function __construct()
    {
        $this->warga = new WargaModel();
        helper(['form','url','session']);
        setlocale(LC_ALL, 'id-ID', 'id_ID');
    }
    public function index()
    {
        $data = ([
            'penduduk'   => $this->warga->findAll()
        ]);
        return view('dashboard/penduduk/v_warga',$data);
    }

    public function create(){
        return view('dashboard/penduduk/v_warga_add');
    }
    public function store(){
        helper(['form']);
        $rules = [
            'nik'           => 'required|min_length[16]',
        ];
        $warga = $this->warga;
        $tgl_lahir = $this->request->getVar('tgl_lahir');
        $dob = new DateTime($tgl_lahir);
        $today   = new DateTime('today');
        $year = $dob->diff($today)->y;
        $month = $dob->diff($today)->m;
        $day = $dob->diff($today)->d;
        $umur = $year;

        $imageFile = $this->request->getFile('identitas');
        if($this->validate($rules)){  
            $nama = $this->request->getVar('nama');
            $nik = $this->request->getVar('nik');
            $no_kk = $this->request->getVar('no_kk');
            $ayah = $this->request->getVar('ayah');
            $ibu = $this->request->getVar('ibu');
            $pendidikan = $this->request->getVar('pendidikan');
            $shdk = $this->request->getVar('shdk');
            $rt = $this->request->getVar('rt');
            $rw = $this->request->getVar('rw');
            $dusun = $this->request->getVar('dusun');
            $telepon = $this->request->getVar('telepon');
            $no_urut_kk = $this->request->getVar('no_urut_kk');
            $out = explode(" ",$nama);
            $slugs = implode("_",$out);
            
            $gambarName = ($nik.'.'.$imageFile->getClientExtension());
            $result = $warga->find($nik);
            if (empty($result)) {
                $data_diri = [
                    'nik'       => $nik,
                    'no_kk'      => $no_kk,
                    'no_urut_kk'      => $no_urut_kk,
                    'ayah'      => $ayah,
                    'ibu'      => $ibu,
                    'pendidikan'      => $pendidikan,
                    'shdk'      => $shdk,
                    'rt'      => $rt,
                    'rw'      => $rw,
                    'dusun'      => $dusun,
                    'telepon'      => $telepon,
                    'nama'     => $nama,
                    'slug'     => $nik.'_'.$slugs,
                    'tempat_lahir'    => $this->request->getVar('tempat_lahir'),
                    'tgl_lahir' => $tgl_lahir,
                    'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                    'agama' => $this->request->getVar('agama'),
                    'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
                    'status_perkawinan' => $this->request->getVar('status_perkawinan'),
                    'pekerjaan' => $this->request->getVar('pekerjaan'),
                    'alamat' => $this->request->getVar('alamat'),
                    'email' => $this->request->getVar('email'),
                    'telepon' => $this->request->getVar('telepon'),
                    'umur'  => $umur,
                    'identitas' => $gambarName,
                ];
                if (file_exists("../public/assets/surat/data_warga/".$gambarName)  ) {
                    unlink('../public/assets/surat/data_warga/'.$gambarName);
                }
                $gambarName = ($nik.'.'.$imageFile->getClientExtension());
                $imageFile->move('../public/assets/surat/data_warga/',$gambarName);
                
                $warga->saveNew($data_diri);
                return redirect()->to('dashboard/penduduk')->with('success', 'Data <b>Penduduk </b> telah ditambahkan');
                // dd($data_diri);
                
            }
            
            return redirect()->to('data/tambah_penduduk')->with('success', 'Data <b>Penduduk </b>  tidak tersimpan');

        }else{
            $data['validation'] = $this->validator;
            echo view('dashboard/penduduk/v_warga_add', $data);
        }
    }

    public function edit($nik = null)
    {
        // $data['produks'] = $produk->where('id_produk', $id)->first();
        $data_warga = $this->warga;
        // $wrg = $data_warga->find($nik);
        // dd($wrg);
        $data = ([
            'warga'         => $data_warga->find($nik),
        ]);
        // tampilkan form edit
        echo view('dashboard/penduduk/v_warga_edit', $data);
    }
    public function update($nik = null)
    {
        $warga = $this->warga;

        // $nik = $this->request->getVar('nik');
        $data_warga = $warga->find($nik);
        $id_warga = $data_warga['nik'];

        $nama = $this->request->getVar('nama');
        $no_kk = $this->request->getVar('no_kk');
        $ayah = $this->request->getVar('ayah');
        $ibu = $this->request->getVar('ibu');
        $pendidikan = $this->request->getVar('pendidikan');
        $shdk = $this->request->getVar('shdk');
        $rt = $this->request->getVar('rt');
        $rw = $this->request->getVar('rw');
        $dusun = $this->request->getVar('dusun');
        $telepon = $this->request->getVar('telepon');
        $no_urut_kk = $this->request->getVar('no_urut_kk');

        $tgl_lahir = $this->request->getVar('tgl_lahir');
        $dob = new DateTime($tgl_lahir);
        $today   = new DateTime('today');
        $year = $dob->diff($today)->y;
        $month = $dob->diff($today)->m;
        $day = $dob->diff($today)->d;
        $umur = $year;

        $data_diri = [
            'nama' => $nama,
            'no_kk'         => $no_kk,
            'ayah'          => $ayah,
            'ibu'           => $ibu,
            'pendidikan'        => $pendidikan,
            'shdk'              => $shdk,
            'rt'                => $rt,
            'rw'                => $rw,
            'dusun'             => $dusun,
            'no_urut_kk'        => $no_urut_kk,
            'telepon'           => $telepon,
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'agama' => $this->request->getVar('agama'),
            'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
            'status_perkawinan' => $this->request->getVar('status_perkawinan'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
            'umur'              => $umur,
        ];
        
        $warga->update($id_warga, $data_diri);
        
        return redirect()->to('dashboard/penduduk')->with('success', 'Data telah diupdate');
    }

    public function delete($nik=null)
    {
        $this->warga->delete($nik);
        $session = session();
        $session->setFlashdata('success', 'Data <b>Penduduk </b> telah dihapus');
        return redirect()->to('dashboard/penduduk');
    }
}
