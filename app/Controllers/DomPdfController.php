<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Dompdf\Dompdf as DompdfDompdf;
use vendor\Dompdf\Dompdf;
class DomPdfController extends BaseController
{
    public function index()
    {
        return view('dashboard/pdf_view');
    }

    public function generate()
    {
        $filename = date('y-m-d-H-i-s'). '-qadr-labs-report';

        // instantiate and use the dompdf class
        $dompdf = new DompdfDompdf();

        // load HTML content
        $dompdf->loadHtml(view('dashboard/pdf_view'));

        // (optional) setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // render html as PDF
        $dompdf->render();

        // output the generated pdf
        $dompdf->stream($filename);
    }
}
