<?php

namespace App\Libraries;

use TCPDF;

class MY_TCPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = ROOTPATH.'public/img/logo_desa.jpg';
        /**
         * width : 50
         */
        $this->SetY(5);
        $this->Image($image_file, '', '', 25);
        // Set font
        $this->SetFont('helvetica', 'B', 14);
        $this->SetY(8);
        $this->SetX(65);
        $this->Cell(0, 2, 'PEMERINTAH KABUPATEN KLATEN', 0, 1, '', 0, '', 0);
        $this->SetX(75);
        $this->Cell(0, 2, 'KECAMATAN JOGONALAN', 0, 1, '', 0, '', 0);
        // Title
        $this->SetFont('helvetica', 'B', 16);
        $this->SetX(84);
        $this->Cell(0, 2, 'DESA PLAWIKAN', 0, 1, '', 0, '', 0);
        $this->SetX(66);
        $this->SetFont('helvetica', '', 11);
        $this->Cell(0, 2, 'Ngaglik, Plawikan, Jogonalan, Kode Pos : 57452', 0, 1, '', 0, '', 0);
        $this->SetX(48);
        $this->Cell(0, 2, 'Website : www.desaplawikan.com   Email : desaplawikan@gmail.com', 0, 1, '', 0, '', 0);
        
        // QRCODE,H : QR-CODE Best error correction
        // $this->write2DBarcode('https://sobatcdoing.com', 'QRCODE,H', 0, 3, 20, 20, ['position' => 'R'], 'N');

        // $style = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        // $this->Line(15, 25, 195, 25, $style);

    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        // $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}