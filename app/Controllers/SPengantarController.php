<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SPengantarModel;
use App\Models\WargaModel;
use Dompdf\Dompdf;
// use TCPDF;
use App\Libraries\MY_TCPDF AS TCPDF;

class SPengantarController extends BaseController
{
    protected $s_pengantar;
    protected $warga;
 
    function __construct()
    {
        $this->s_pengantar = new SPengantarModel();
        $this->warga = new WargaModel();
        helper(['form','url','session']);
        setlocale(LC_ALL, 'id-ID', 'id_ID');
    }
    public function index()
    {
        $autoload['helper'] = array('text');
        $data = ([
            'surat_pengantar'   => $this->s_pengantar->getData()->getResultArray(),
        ]);
        return view('dashboard/s_pengantar/v_s_pengantar',$data);
    }

    public function show($id=null)
    {
        $data = ([
            'surat_pengantar'   => $this->s_pengantar->getDataView($id)->getFirstRow(),
        ]);
        // dd($data);
        return view('dashboard/s_pengantar/_pengantar', $data);

    }


    public function new()
    {
        $data = [];
        return view('dashboard/s_pengantar/v_s_pengantar_add', $data);
    }
    public function create()
    {
        helper(['form']);
        $rules = [
            'nama'          => 'required',
            'nik'           => 'required|min_length[16]',
            'keperluan'         => 'required',
            'pengambilan'         => 'required',
        ];
        $imageFile = $this->request->getFile('identitas');
        if($this->validate($rules)){  
            $nama = $this->request->getVar('nama');
            $nik = $this->request->getVar('nik');
            $out = explode(" ",$nama);
            $slugs = implode("_",$out);
            $gambarName = ($slugs.'.'.$imageFile->getClientExtension());
            $imageFile->move(WRITEPATH . '../public/assets/surat/surat_pengantar/',$gambarName);

            $surat_pengantar = $this->s_pengantar;
            $data = [
                'nama'     => $nama,
                'nik'       => $nik,
                'slug'     => $nik.'_'.$slugs,
                'tempat_lahir'    => $this->request->getVar('tempat_lahir'),
                'tgl_lahir' => $this->request->getVar('tanggal_lahir'),
                'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
                'agama' => $this->request->getVar('agama'),
                'alamat' => $this->request->getVar('alamat'),
                'keperluan' => $this->request->getVar('keperluan'),
                'pengambilan' => $this->request->getVar('pengambilan'),
                'email' => $this->request->getVar('email'),
                'status' => 'proses',
                'jenis_surat' => 'Surat Pengantar',
                'identitas' => $gambarName,
            ];
            // dd($data);
            $surat_pengantar->save($data);
            return redirect()->to('surat/s_pengantar')->with('success', 'Data telah ditambahkan');

        }else{
            $data['validation'] = $this->validator;
            echo view('dashboard/s_pengantar/v_s_pengantar', $data);
        }
    }

    public function edit($id = null)
    {
        // ambil artikel yang akan diedit
        $surat_pengantar = $this->s_pengantar;
        // $data['produks'] = $produk->where('id_produk', $id)->first();
        $data_warga = $this->warga;
        $result = $surat_pengantar->find($id);
        $nik = $result['nik'];
        // $wrg = $data_warga->find($nik);
        // dd($wrg);
        $data = ([
            's_pengantar'   => $result,
            'warga'         => $data_warga->find($nik),
        ]);
        // tampilkan form edit
        echo view('dashboard/s_pengantar/v_s_pengantar_edit', $data);
    }

    public function update($id = null)
    {
        $surat_pengantar = $this->s_pengantar;
        $warga = $this->warga;

        $nik = $this->request->getVar('nik');
        $data_warga = $warga->find($nik);
        $data_pengantar = [
            'nik'   => $data_warga['nik'],
            'jenis_surat' => 'Surat Pengantar',
            'keperluan' => $this->request->getVar('keperluan'),
            'pengambilan' => $this->request->getVar('pengambilan'),
            'status' => 'proses',
            'identitas' => $data_warga['identitas']
        ];
        
        $surat_pengantar->update($id, $data_pengantar);
        return redirect()->to('dashboard/laporan')->with('success', 'Data telah diupdate');

    }

    public function cetak($id = null)
    {
        $M_surat = $this->s_pengantar;
        $data = ([
            'surat_pengantar'   => $M_surat->getSurat($id)
        ]);
        $pdf = new Dompdf();
        $pdf->set_option('isRemoteEnabled', TRUE);
        $pdf->loadHtml(view('dashboard/s_pengantar/cetak_surat', $data));
        $pdf->setPaper('A4', 'potrait');
        $pdf->render();
        $pdf->stream($id);
        echo view('dashboard/s_pengantar/cetak_surat', $data);
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
            'surat_'   => $this->s_pengantar->getDataView($id)->getFirstRow(),
        ]);
        $dateNow = date("Ymd_his");
        $filename = $data['surat_']->nik.'_'.$data['surat_']->jenis_surat."_" . $dateNow;
        // echo $filename;
        // dd($data);
        // return view('dashboard/s_pengantar/_pengantar', $data);
        $html = view('dashboard/s_pengantar/cetak_surat', $data);

        // Print text using writeHTMLCell()
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        // ---------------------------------------------------------
        $this->response->setContentType('application/pdf');
        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output($filename . '.pdf', 'I');

    }
    public function delete($id=null)
    {
        $query = $this->s_pengantar->find($id);
        //dd($query);
        $this->s_pengantar->delete($id);
        // $img_url = (WRITEPATH . '../public/assets/surat/surat_pengantar/'.$query['identitas']);
        // print_r($img_url);
        // unlink($img_url);
        $session = session();
        $session->setFlashdata('success', 'Data telah dihapus');
        return redirect()->to('dashboard/laporan');
        // return redirect('/surat/s_pengantar')->with('success', 'Data Deleted Successfully');
    }

}
