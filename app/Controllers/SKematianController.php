<?php

namespace App\Controllers;

use App\Models\SKematianModel;
use App\Models\WargaModel;
use CodeIgniter\RESTful\ResourceController;
// use TCPDF;
use App\Libraries\MY_TCPDF as TCPDF;
use DateTime;

class SKematianController extends ResourceController
{
    protected $s_kematian;
    protected $warga;
 
    function __construct()
    {
        $this->s_kematian = new SKematianModel();
        $this->warga = new WargaModel();
        helper(['form','url','session','text']);
        setlocale(LC_ALL, 'id-ID', 'id_ID');
    }
    public function index()
    {
        $data = ([
            'surat_kematian'   => $this->s_kematian->getData()->getResultArray(),
        ]);
        return view('dashboard/s_kematian/v_s_kematian',$data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id=null)
    {
        $data = ([
            'surat_'   => $this->s_kematian->getDataById($id)->getFirstRow()
        ]);
        // dd($data);
        return view('dashboard/s_kematian/_kematian', $data);

    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [];
        return view('dashboard/s_kematian/v_s_kematian_add', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        helper(['form']);
        $rules = [
            'nik'           => 'required|min_length[16]',
        ];
        $surat_kematian = $this->s_kematian;
        $warga = $this->warga;
        $imageFile = $this->request->getFile('identitas');
        if($this->validate($rules)){  
            $nama = $this->request->getVar('nama');
            $nik = $this->request->getVar('nik');
            $out = explode(" ",$nama);
            $slugs = implode("_",$out);
            
            $result = $warga->find($nik);
            if (empty($result)) {
                $gambarName = ($nik.'.'.$imageFile->getClientExtension());
                $imageFile->move(WRITEPATH . '../public/assets/surat/surat_kematian/',$gambarName);
                $data_diri = [
                    'nik'       => $nik,
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
                $surat_kematian->saveNew($data_diri);
                
                $data_kematian = [
                    'nik'   => $nik,
                    'jenis_surat' => 'Surat kematian',
                    'pengambilan' => $this->request->getVar('pengambilan'),
                    'status' => 'proses',
                    'identitas' => $gambarName,
                    'hari_meninggal' => $this->request->getVar('hari_meninggal'),
                    'tanggal_meninggal' => $this->request->getVar('tanggal_meninggal'),
                    'jam_meninggal' => $this->request->getVar('jam_meninggal'),
                    
                ];
                
                $surat_kematian->save($data_kematian);
                return redirect()->to('surat/s_kematian')->with('success', 'Data telah ditambahkan');
                
            }
            elseif (!empty($result)) {
                $gambarName = ($nik.'.'.$imageFile->getClientExtension());
                $data_diri = [
                    'nik'       => $result['nik'],
                ];
                // $warga->save($data_diri);
                $data_kematian = [
                    'nik'   => $nik,
                    'jenis_surat' => 'Surat kematian',
                    'pengambilan' => $this->request->getVar('pengambilan'),
                    'status' => 'proses',
                    'identitas' => $gambarName,
                    'hari_meninggal' => $this->request->getVar('hari_meninggal'),
                    'tanggal_meninggal' => $this->request->getVar('tanggal_meninggal'),
                    'jam_meninggal' => $this->request->getVar('jam_meninggal'),
    
                ];
                if ($imageFile->isValid() && !$imageFile->hasMoved()) {
                    $old_img = $result['identitas'];
                    if (file_exists("../public/assets/surat/surat_kematian/".$old_img)) {
                        unlink('../public/assets/surat/surat_kematian/'.$old_img);
                    }
                    $gambarName = ($nik.'.'.$imageFile->getClientExtension());
                    $imageFile->move('../public/assets/surat/surat_kematian/',$gambarName);
                    $data_diri['identitas'] = $gambarName;
        
                }
                $surat_kematian->save($data_kematian);
                return redirect()->to('surat/s_kematian')->with('success', 'Data telah ditambahkan');
            }
            
            
            return redirect()->to('surat/s_kematian')->with('success', 'Data tidak tersimpan');

        }else{
            $data['validation'] = $this->validator;
            return view('dashboard/s_kematian/v_s_kematian', $data);
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        // ambil konten yang akan diedit
        $surat_kematian = $this->s_kematian;
        // $data['produks'] = $produk->where('id_produk', $id)->first();
        $data_warga = $this->warga;
        $result = $surat_kematian->find($id);
        $nik = $result['nik'];
        // $wrg = $data_warga->find($nik);
        // dd($wrg);
        $data = ([
            's_kematian'   => $result,
            'warga'         => $data_warga->find($nik),
        ]);
        // tampilkan form edit
        echo view('dashboard/s_kematian/v_s_kematian_edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $surat_kematian = $this->s_kematian;
        $warga = $this->warga;

        $nik = $this->request->getVar('nik');
        $data_warga = $warga->find($nik);
        $id_warga = $data_warga['nik'];

        $keterangan = $this->request->getVar('keterangan');
        $tglKelahiran = $this->request->getVar('tgl_kelahiran');
        $tglMeninggal = $this->request->getVar('tgl_meninggal');
        $namaMeninggal = $this->request->getVar('nama');
        $dob = new DateTime($tglKelahiran);
        $today   = new DateTime($tglMeninggal);
        $year = $dob->diff($today)->y;
        $month = $dob->diff($today)->m;
        $day = $dob->diff($today)->d;
        $umur = $year;

        $data_kematian = [
            'nik'   => $nik,
            'jenis_surat' => 'Surat Keterangan Kematian',
            'keperluan' => 'Surat Keterangan Kematian',
            'pengambilan' => $this->request->getVar('pengambilan'),
            'status' => 'proses',
            'nama_meninggal' => $namaMeninggal,
            'tgl_kelahiran' => $tglKelahiran,
            'tgl_meninggal' => $tglMeninggal,
            'usia_meninggal'  => $umur,
            'keterangan'    => $keterangan 
        ];

        $data_diri = [
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'agama' => $this->request->getVar('agama'),
            'kewarganegaraan' => $this->request->getVar('kewarganegaraan'),
            'status_perkawinan' => $this->request->getVar('status_perkawinan'),
            'pekerjaan' => $this->request->getVar('pekerjaan'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
            'umur'          => $umur,
        ];
        
        // dd($data_kematian);
        $surat_kematian->update($id, $data_kematian);
        $warga->update($id_warga, $data_diri);
        
        return redirect()->to('dashboard/laporan')->with('success', 'Data telah diupdate');
    }

    public function cetak_surat($id=null)
    {

        // // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        
        // // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('emdehateam.com');
        $pdf->SetTitle('PDF Cetak Surat Kematian');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, emdehateam.com');

        // // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
        $pdf->setFooterData(array(0,64,0), array(0,64,128));

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // // Set font
        // // dejavusans is a UTF-8 Unicode font, if you only need to
        // // print standard ASCII chars, you can use core fonts like
        // // helvetica or times to reduce file size.
        $pdf->SetFont('dejavusans', '', 14, '', true);

        // // Add a page
        // // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

        $data = ([
            'surat_'   => $this->s_kematian->getDataView($id)->getFirstRow(),
        ]);
        $dateNow = date("Ymd_his");
        $filename = $data['surat_']->nik.'_'.$data['surat_']->jenis_surat."_" . $dateNow;
        // echo $filename;
        // dd($data);
        // return view('dashboard/s_pengantar/_pengantar', $data);
        $html = view('dashboard/s_kematian/cetak_surat', $data);

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        // ---------------------------------------------------------
        $this->response->setContentType('application/pdf');
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output($filename . '.pdf', 'I');

    }

    public function delete($id = null)
    {
        $this->s_kematian->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data <b>Surat Kematian</b> telah dihapus');
        return redirect()->to('dashboard/laporan');
    }
}
