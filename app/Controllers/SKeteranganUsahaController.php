<?php

namespace App\Controllers;

use App\Database\Migrations\SKeterangan;
use App\Models\SKeteranganUsahaModel;
use App\Models\WargaModel;
use CodeIgniter\RESTful\ResourceController;
// use TCPDF;
use App\Libraries\MY_TCPDF as TCPDF;

class SKeteranganUsahaController extends ResourceController
{
    protected $s_keterangan;
    protected $warga;
 
    function __construct()
    {
        $this->s_keterangan = new SKeteranganUsahaModel();
        $this->warga = new WargaModel();
        helper(['form','url','session']);
        setlocale(LC_ALL, 'id-ID', 'id_ID');
    }
    public function index()
    {
        $autoload['helper'] = array('text');
        $data = ([
            'surat_keterangan'   => $this->s_keterangan->getData()->getResultArray(),
        ]);
        return view('dashboard/s_keterangan/v_s_keterangan',$data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id=null)
    {
        $data = ([
            'surat_'   => $this->s_keterangan->getDataById($id)->getFirstRow()
        ]);
        // dd($data);
        return view('dashboard/s_keterangan/_keterangan', $data);

    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [];
        return view('dashboard/s_keterangan/v_s_keterangan_add', $data);
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
        $surat_keterangan = $this->s_keterangan;
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
                $imageFile->move(WRITEPATH . '../public/assets/surat/surat_keterangan_usaha/',$gambarName);
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
                $surat_keterangan->saveNew($data_diri);
                $result2 = $warga->find($nik);
                
                $data_keterangan = [
                    'nik'   => $result2['nik'],
                    'jenis_surat' => 'Surat Keterangan Usaha',
                    'keperluan' => $this->request->getVar('keperluan'),
                    'pengambilan' => $this->request->getVar('pengambilan'),
                    'status' => 'proses',
                    
                ];
                
                $surat_keterangan->save($data_keterangan);
                return redirect()->to('surat/s_keterangan')->with('success', 'Data <b>Surat Keterangan </b> telah ditambahkan');
                
            }
            elseif (!empty($result)) {
                $data_diri = [
                    'nik'       => $result['nik'],
                ];
                // $warga->save($data_diri);
                $data_keterangan = [
                    'nik'   => $nik,
                    'jenis_surat' => 'Surat Keterangan Usaha',
                    'keperluan' => $this->request->getVar('keperluan'),
                    'pengambilan' => $this->request->getVar('pengambilan'),
                    'status' => 'proses',
    
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
                $surat_keterangan->save($data_keterangan);
                return redirect()->to('surat/s_keterangan')->with('success', 'Data <b>Surat Keterangan </b> telah ditambahkan');
            }
            
            // $warga->save($data_diri);
            
           

            
            return redirect()->to('surat/s_keterangan')->with('success', 'Data <b>Surat Keterangan </b>  tidak tersimpan');

        }else{
            $data['validation'] = $this->validator;
            echo view('dashboard/s_keterangan/v_s_keterangan', $data);
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        // ambil artikel yang akan diedit
        $surat_keterangan = $this->s_keterangan;
        // $data['produks'] = $produk->where('id_produk', $id)->first();
        $data_warga = $this->warga;
        $result = $surat_keterangan->find($id);
        $nik = $result['nik'];
        // $wrg = $data_warga->find($nik);
        // dd($wrg);
        $data = ([
            's_keterangan'   => $result,
            'warga'         => $data_warga->find($nik),
        ]);
        // tampilkan form edit
        echo view('dashboard/s_keterangan/v_s_keterangan_edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $surat_keterangan = $this->s_keterangan;
        $warga = $this->warga;

        $nik = $this->request->getVar('nik');
        $data_warga = $warga->find($nik);
        $id_warga = $data_warga['nik'];
        $data_keterangan = [
            'nik'   => $data_warga['nik'],
            'jenis_surat' => 'Surat Keterangan Usaha',
            'keperluan' => $this->request->getVar('keperluan'),
            'pengambilan' => $this->request->getVar('pengambilan'),
            'status' => 'proses',
            'identitas' => $data_warga['identitas']
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
        ];
        
        $surat_keterangan->update($id, $data_keterangan);
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
        $pdf->SetTitle('PDF Cetak Surat Keterangan Usaha');
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
            'surat_'   => $this->s_keterangan->getDataView($id)->getFirstRow(),
        ]);
        $dateNow = date("Ymd_his");
        $filename = $data['surat_']->nik.'_'.$data['surat_']->jenis_surat."_" . $dateNow;
        // echo $filename;
        // dd($data);
        // return view('dashboard/s_pengantar/_pengantar', $data);
        $html = view('dashboard/s_keterangan/cetak_surat', $data);

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
        $this->s_keterangan->delete($id);
        $session = session();
        $session->setFlashdata('success', 'Data <b>Surat Keterangan Usaha</b> telah dihapus');
        return redirect()->to('dashboard/laporan');
    }
}
