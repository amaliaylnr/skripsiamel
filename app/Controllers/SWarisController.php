<?php

namespace App\Controllers;

use App\Models\SWarisModel;
use App\Models\WargaModel;
use CodeIgniter\RESTful\ResourceController;
// use TCPDF;
use App\Libraries\MY_TCPDF AS TCPDF;

class SWarisController extends ResourceController
{
    protected $s_waris;
    protected $warga;
 
    function __construct()
    {
        $this->s_waris = new SWarisModel();
        $this->warga = new WargaModel();
        helper(['form','url','session','text']);
        setlocale(LC_ALL, 'id-ID', 'id_ID');
    }
    public function index()
    {
        $data = ([
            'surat_waris'   => $this->s_waris->getData()->getResultArray(),
        ]);
        return view('dashboard/s_waris/v_s_waris',$data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id=null)
    {
        $data = ([
            'surat_'   => $this->s_waris->getDataById($id)->getResult()
        ]);
        // dd($data);
        return view('dashboard/s_waris/_waris', $data);

    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        $data = [];
        return view('dashboard/s_waris/v_s_waris_add', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        
        $surat_waris = $this->s_waris;
        $warga = $this->warga;
        $nik = $this->request->getVar('nik');
        dd($nik);

        // $result = $warga->find($nik);
        // if (empty($result)) {
        //     $result2 = $warga->find($nik);
        //     $data_kelahiran = [
        //         'nik'   => $result2['nik'],
        //         'jenis_surat' => 'Surat Ahli Waris',
        //         'keperluan' => 'Surat Keterangan Ahli Waris',
        //         'pengambilan' => $this->request->getVar('pengambilan'),
        //         'status' => 'proses',

        //         'nama_ahli_waris' => $this->request->getVar('nama_ahli_waris'),
        //         'jk_ahli_waris' => $this->request->getVar('jk_ahli_waris'),
        //         'tgl_lahir_ahli_waris' => $this->request->getVar('tgl_lahir_ahli_waris'),
        //         'nik_ahli_waris' => $this->request->getVar('nik_ahli_waris'),
        //         'hubungan_keluarga' => $this->request->getVar('hubungan_keluarga'),
                
        //     ];
            
        //     $surat_waris->save($data_kelahiran);
        //     return redirect()->to('surat/s_waris')->with('success', 'Data telah ditambahkan');
            
        // }
        // elseif (!empty($result)) {
        //     $data_kelahiran = [
        //         'nik'   => $nik,
        //         'jenis_surat' => 'Surat Ahli Waris',
        //         'keperluan' => 'Surat Keterangan Ahli Waris',
        //         'pengambilan' => $this->request->getVar('pengambilan'),
        //         'status' => 'proses',

        //         'nama_ahli_waris' => $this->request->getVar('nama_ahli_waris'),
        //         'jk_ahli_waris' => $this->request->getVar('jk_ahli_waris'),
        //         'tgl_lahir_ahli_waris' => $this->request->getVar('tgl_lahir_ahli_waris'),
        //         'nik_ahli_waris' => $this->request->getVar('nik_ahli_waris'),
        //         'hubungan_keluarga' => $this->request->getVar('hubungan_keluarga'),

        //     ];
        //     $surat_waris->save($data_kelahiran);
        //     return redirect()->to('surat/s_waris')->with('success', 'Data telah ditambahkan');
        // }
        
        
        // return redirect()->to('surat/s_waris')->with('success', 'Data tidak tersimpan');
            
        
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        // ambil artikel yang akan diedit
        $surat_waris = $this->s_waris;
        // $data['produks'] = $produk->where('id_produk', $id)->first();
        $data_warga = $this->warga;
        $result = $surat_waris->find($id);
        $nik = $result['nik'];
        // $wrg = $data_warga->find($nik);
        // dd($wrg);
        $data = ([
            's_waris'   => $result,
            'warga'         => $data_warga->find($nik),
        ]);
        // tampilkan form edit
        // dd($data);
        return view('dashboard/s_waris/v_s_waris_edit', $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $surat_waris = $this->s_waris;
        $warga = $this->warga;

        $nik = $this->request->getVar('nik');
        $nik = $this->request->getVar('nik');
        $data_warga = $warga->find($nik);
        $id_warga = $data_warga['nik'];
        $data_waris = [
            'jenis_surat' => 'Surat Ahli Waris',
            'keperluan' => 'Surat Keterangan Ahli Waris',
            'pengambilan' => $this->request->getVar('pengambilan'),
            'status' => 'update',
            'nama_ahli_waris' => $this->request->getVar('nama_ahli_waris'),
            'jk_ahli_waris' => $this->request->getVar('jk_ahli_waris'),
            'tgl_lahir_ahli_waris' => $this->request->getVar('tgl_lahir_ahli_waris'),
            'nik_ahli_waris' => $this->request->getVar('nik_ahli_waris'),
            'hubungan_keluarga' => $this->request->getVar('hubungan_keluarga'),
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
        
        $surat_waris->update($id, $data_waris);
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
        $pdf->SetTitle('PDF Cetak Surat Pengantar');
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
            'surat_'   => $this->s_waris->getDataView($id)->getFirstRow(),
            'surat_waris'   => $this->s_waris->getDataById($id)->getResult()
        ]);
        // dd($data); die();
        $dateNow = date("Ymd_his");
        $filename = $data['surat_']->nik.'_'.$data['surat_']->jenis_surat."_" . $dateNow;
        // echo $filename;
        // dd($data);
        // return view('dashboard/s_pengantar/_pengantar', $data);
        $html = view('dashboard/s_waris/cetak_surat', $data);

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        // ---------------------------------------------------------
        $this->response->setContentType('application/pdf');
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output($filename . '.pdf', 'I');

    }

    public function delete($ns = null)
    {
        $ids = $this->s_waris->getDataByNoSurat($ns)->getResultObject();
        $idx = $ids;
        for ($i=0; $i < count($idx); $i++) { 
            // echo $idx[$i]->id;
            $this->s_waris->delete($idx[$i]->id);
            # code...
        }
        $session = session();
        $session->setFlashdata('success', 'Data <b>Surat Ahli Waris ['.$ns.'] </b> telah dihapus');
        return redirect()->to('dashboard/laporan');
    }
}
