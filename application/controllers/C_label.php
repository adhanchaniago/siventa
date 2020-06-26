<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_label extends CI_Controller {

	public function index()
	{
        /*
        * IF role = admin THEN redirect(admin/index)
        * ELSEIF role = user THEN redirect(user/index)
        * ELSEIF role = dekan THEN redirect(dekan/index)
        * ELSE redirect(base_url("login"))
        */
    }
	
    public function getAll()
	{
		$data = $this->m_label->readAll()->result();
		$this->jsonformatter(false,'Berhasil!',$data);
	}

	public function getBy($kd)
	{
		$data = $this->m_penempatan->readBy($kd)->result();
		$this->jsonformatter(false,"Berhasil!",$data);
	}

	public function jsonformatter($error,$msg,$data)
	{
		$json['error'] = $error;
        $json['message'] = $msg;
		$json['labels'] = $data;
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($json));
	}

	public function generateLabel()
	{
		$filter = $this->input->post('filter');
		$kd = $this->input->post('kd');
		switch ($filter) {
			case 'kd':
			$data = $this->m_label->readByKd($kd)->result();
				break;
			case 'tipe':
			$data = $this->m_label->readByTipe($kd)->result();
				break;
			case 'lokasi':
			$data = $this->m_label->readByLokasi($kd)->result();
				break;
			default:
			$data = $this->m_label->readAll()->result();
				break;
		}

		$pdf = new FPDF('L','mm','A4');
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial','',12);

		$no = 1;
		$x = 10;
		$y = 10;
		foreach ($data as $key) {
			if ($no == 7 ) {
				$x = 140;
				$y = 10;
			} elseif ($no == 13) {
				$pdf->AddPage();
				$x = 10;
				$y = 10;
				$no = 1;
			}
			$pdf->setXY($x,$y);
			$pdf->Cell(25, 25, $pdf->Image(base_url('assets/image/logo-fti.jpg'), $pdf->GetX()+2.5, $pdf->GetY()+2.5, 20), 1, 0, 'C');
			$y = $pdf->getY();
			$pdf->Cell(30, 5, 'Kode', 'T,L,B', 2, 'L');
			$pdf->setXY($pdf->getX(),$pdf->getY());
			$pdf->Cell(30, 5, 'Lokasi', 'T,L,B', 2, 'L');
			$pdf->Cell(30, 5, 'Pengadaan', 'T,L,B', 2, 'L');
			$pdf->Cell(30, 5, 'Jenis Barang', 'T,L,B', 2, 'L');
			$pdf->Cell(30, 5, 'Merk/Model', 'T,L,B', 0, 'L');
			$pdf->setXY($pdf->getX(),$y);
			for ($i=0; $i < 5; $i++) { 
				$pdf->Cell(3, 5, ':', 'T,B', 2, 'C');
			}
			$pdf->setXY($pdf->getX()+3,$y);
			$pdf->Cell(30, 5,$key->kd_inventaris, 'T,R,B', 2, 'C');
			$pdf->Cell(30, 5,$key->nm_lokasi, 'T,R,B', 2, 'C');
			$pdf->Cell(30, 5,$key->tahun_pengadaan, 'T,R,B', 2, 'C');
			$pdf->Cell(30, 5,$key->nm_kategori, 'T,R,B', 2, 'C');
			$pdf->Cell(30, 5,$key->merk."/".$key->model, 'T,R,B', 2, 'C');
			$pdf->setXY($pdf->getX()+30,$y);
			$pdf->Cell(25, 25, $pdf->Image(base_url('assets/image/qrimage/').$key->kd_inventaris.".png", $pdf->GetX()+1, $pdf->GetY()+1, 23), 1, 0, 'C');
			
			$y = $y + 30;
			$no++;
		}

		$pdf->Output();
	}


}
