<?php if ( !defined('BASEPATH')) exit();
class Cfpdf extends FPDF
{
    function __construct($orientation='P', $unit='mm', $size='A4')
    {
        parent::__construct($orientation, $unit, $size);
        require_once APPPATH.'../vendor/setasign/fpdf/fpdf.php';
    }

    function Header()
    {
        //insert image
        $this->Image(base_url().'assets/image/logo.jpg',14,9,14);
        // setting properti font
        $this->SetFont('Arial','B',10);
        // menulis header
        $this->Cell(20,12,'',0,0,'C');
        $this->Cell(20,4,'UNIVERSITAS MERDEKA MALANG',0,2,'L');
        // membuat jarak terhadap cell sebelumnya
        //$this->Cell(132);
        $this->Cell(20,4,'Fakultas Teknologi Informasi',0,2,'L');
        $this->SetFont('Arial','',8);
        $this->Cell(20,4,'Jl. Terusan Raya Dieng 62-64 Malang. Telp. 0341-566462',0,1,'L');
        // membuat garis dari koordinat (11 mm, 18 mm) sampai koordinat (198
        // mm,18 mm)
        $this->Line(13,24,105,24);
        // membuat space kosong antara header dengan teks konten
        $this->Ln(8);
    }

    function Footer()
    {
        //Position at 1.5 cm from bottom
        $this->SetY(-15);
        //Arial italic 8
        $this->SetFont('Arial','I',8);
        //Page number
        $this->Cell(0,10,'Halaman ke- '.$this->PageNo().' dari {nb}',0,0,'R');
    }
}

?>