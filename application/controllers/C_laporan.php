<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
        #code...
    }
    public function getAll()
	{
		$data = $this->m_label->read()->result();
		$this->jsonformatter(false,'Berhasil!',$data);
	}

	public function getBy($tipe)
	{
		$data = $this->m_laporan->readLokasi($tipe)->result();
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

    public function getSemua($ta,$tipe)
    {
        $data = $this->m_laporan->readPenempatan($ta,$tipe)->result();
		$this->jsonformatter(false,'Berhasil!',$data);
    }
    
    //PDF
    

    // LAPORAN PENEMPATAN
    public function penempatanAll() //laporan penempatan lengkap
    {
        $teks = "Laporan Penempatan";
        $tanggal = date('d/m/Y');
        //$data['laporan']=$this->m_laporan->readALL()->result();
        $pdf = new Cfpdf('P','mm','A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('times','',14);
        $pdf->Cell(0, 5, $teks, 0, 1, 'C');
        $pdf->SetFont('times','I',12);
        $pdf->Cell(0, 5,"(".$tanggal.")", 0,1,'C');
        $pdf->Ln(8);
        //table Header
        $pdf->SetFont('times','B',12);
        $pdf->Cell(10,7,'No.','1',0,'C'); 
        $pdf->Cell(15,7,'T.A.','1',0,'C'); 
        $pdf->Cell(30,7,'Tanggal','1',0,'C'); 
        $pdf->Cell(25,7,'Kode','1',0,'C'); 
        $pdf->Cell(30,7,'Merk','1',0,'C'); 
        $pdf->Cell(30,7,'Model','1',0,'C'); 
        $pdf->Cell(0,7,'Lokasi','1',1,'C'); 
        //fetch data
        $data = $this->m_laporan->readPenempatanAll()->result();
        $no = 1;

        //table body
        $pdf->SetFont('times','',12);
        foreach ($data as $key) {

            $pdf->Cell(10,6,$no,1,0,'C'); 
            $pdf->Cell(15,6,$key->kd_inventaris,1,0,'C'); 
            $pdf->Cell(30,6,$key->tanggal,1,0,'C'); 
            $pdf->Cell(25,6,$key->kd_inventaris,1,0,'C'); 
            $pdf->Cell(30,6,$key->merk,1,0,'C'); 
            $pdf->Cell(30,6,$key->model,1,0,'C'); 
            $pdf->Cell(0,6,$key->nm_lantai." / ".$key->nm_lokasi,1,1,'C'); 

            $no++ ;
        }

        $pdf->Output('I',date('dmY')."_Lap.PenempatanLgkp.pdf");

    }

    public function penempatanTa() //laporan penempatan berdasarkan Tahun Anggaran
    {
        //fetch data
        $ta = $this->input->post('ta');
        $data = $this->m_laporan->readPenempatanTa($ta)->result();

        $teks = "Laporan Penempatan";
        $tanggal = date('d/m/Y');
        $pdf = new Cfpdf('P','mm','A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('times','',14);
        $pdf->Cell(0, 5, $teks, 0, 1, 'C');
        $pdf->SetFont('times','',12);
        $pdf->Cell(0, 5,"(".$tanggal.")", 0, 1, 'C');
        $pdf->Ln(4);
        $pdf->SetFont('times','',12);
        // $pdf->Cell(18, 5,'Tanggal : ', 0,0,'L');
        // $pdf->Cell(0, 5,$tanggal, 0,1,'L');
        $pdf->Cell(34, 5,"Tahun Anggaran : ", 0,0,'L');
        $pdf->Cell(0, 5,$ta, 0,1,'L');
        $pdf->Ln(4);
        //table Header
        $pdf->SetFont('times','B',12);
        $pdf->Cell(10,7,'No.','1',0,'C'); 
        $pdf->Cell(15,7,'T.A.','1',0,'C'); 
        $pdf->Cell(30,7,'Tanggal','1',0,'C'); 
        $pdf->Cell(25,7,'Kode','1',0,'C'); 
        $pdf->Cell(30,7,'Merk','1',0,'C'); 
        $pdf->Cell(30,7,'Model','1',0,'C'); 
        $pdf->Cell(0,7,'Lokasi','1',1,'C'); 

        $no = 1;
        //table body
        $pdf->SetFont('times','',12);
        foreach ($data as $key) {

            $pdf->Cell(10,6,$no,'1',0,'C'); 
            $pdf->Cell(15,6,$key->TA,'1',0,'C'); 
            $pdf->Cell(30,6,$key->tanggal,'1',0,'C'); 
            $pdf->Cell(25,6,$key->kd_inventaris,'1',0,'C'); 
            $pdf->Cell(30,6,$key->merk,'1',0,'C'); 
            $pdf->Cell(30,6,$key->model,'1',0,'C'); 
            $pdf->Cell(0,6,$key->nm_lantai." / ".$key->nm_lokasi,'1',1,'C'); 

            $no++ ;
        }

        $pdf->Output('I',date('dmY')."_Lap.PenempatanTA.pdf");
    }

    public function penempatanTaTipe() //laporan penempatan berdasarkan TA dan Tipe inv 
    {   
        //fetch data
        $tipe = $this->input->post('tipe');
        $ta = $this->input->post('ta');
        $data = $this->m_laporan->readPenempatanTipe($ta,$tipe)->result();

        $teks = "Laporan Penempatan";
        $tanggal = date('d/m/Y');
        $pdf = new Cfpdf('P','mm','A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('times','',14);
        $pdf->Cell(0, 5, $teks, 0, 1, 'C');
        $pdf->SetFont('times','',12);
        $pdf->Cell(0, 5,"(".$tanggal.")", 0, 1, 'C');
        $pdf->Ln(4);
        $pdf->SetFont('times','',12);
        // $pdf->Cell(18, 5,'Tanggal : ', 0,0,'L');
        // $pdf->Cell(0, 5,$tanggal, 0,1,'L');
        $pdf->Cell(11, 5,"Tipe : ", 0,0,'L');
        $pdf->Cell(0, 5,$tipe, 0,1,'L');
        $pdf->Ln(4);
        //table Header
        $pdf->SetFont('times','B',12);
        $pdf->Cell(10,7,'No.','1',0,'C'); 
        $pdf->Cell(15,7,'T.A.','1',0,'C'); 
        $pdf->Cell(30,7,'Tanggal','1',0,'C'); 
        $pdf->Cell(25,7,'Kode','1',0,'C'); 
        $pdf->Cell(30,7,'Merk','1',0,'C'); 
        $pdf->Cell(30,7,'Model','1',0,'C'); 
        $pdf->Cell(0,7,'Lokasi','1',1,'C'); 

        $no = 1;
        //table body
        $pdf->SetFont('times','',12);
        foreach ($data as $key) {

            $pdf->Cell(10,6,$no,'1',0,'C'); 
            $pdf->Cell(15,6,$key->TA,'1',0,'C'); 
            $pdf->Cell(30,6,$key->tanggal,'1',0,'C'); 
            $pdf->Cell(25,6,$key->kd_inventaris,'1',0,'C'); 
            $pdf->Cell(30,6,$key->merk,'1',0,'C'); 
            $pdf->Cell(30,6,$key->model,'1',0,'C'); 
            $pdf->Cell(0,6,$key->nm_lantai." / ".$key->nm_lokasi,'1',1,'C'); 

            $no++ ;
        }

        $pdf->Output('I',date('dmY')."_Lap.PenempatanTipe.pdf");

    }

    public function penempatanTaLok() //laporan penempatan berdasarkan TA dan Lokasi
    {   
        //fetch data
        $lok = $this->input->post('lok');
        $lokasi = $this->input->post('lokasi');
        $ta = $this->input->post('ta');
        $data = $this->m_laporan->readPenempatanLok($ta,$lokasi)->result();

        $teks = "Laporan Penempatan";
        $tanggal = date('d/m/Y');
        $pdf = new Cfpdf('P','mm','A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('times','',14);
        $pdf->Cell(0, 5, $teks, 0, 1, 'C');
        $pdf->SetFont('times','',12);
        $pdf->Cell(0, 5,"(".$tanggal.")", 0, 1, 'C');
        $pdf->Ln(4);
        $pdf->SetFont('times','',12);
        // $pdf->Cell(18, 5,'Tanggal : ', 0,0,'L');
        // $pdf->Cell(0, 5,$tanggal, 0,1,'L');
        $pdf->Cell(15, 5,"Lokasi : ", 0,0,'L');
        $pdf->Cell(0, 5,$lok, 0,1,'L');
        $pdf->Ln(4);
        //table Header
        $pdf->SetFont('times','B',12);
        $pdf->Cell(10,7,'No.','1',0,'C'); 
        $pdf->Cell(15,7,'T.A.','1',0,'C'); 
        $pdf->Cell(30,7,'Tanggal','1',0,'C'); 
        $pdf->Cell(25,7,'Kode','1',0,'C'); 
        $pdf->Cell(30,7,'Merk','1',0,'C'); 
        $pdf->Cell(30,7,'Model','1',0,'C'); 
        $pdf->Cell(0,7,'Lokasi','1',1,'C'); 

        $no = 1;
        //table body
        $pdf->SetFont('times','',12);
        foreach ($data as $key) {

            $pdf->Cell(10,6,$no,'1',0,'C'); 
            $pdf->Cell(15,6,$key->TA,'1',0,'C'); 
            $pdf->Cell(30,6,$key->tanggal,'1',0,'C'); 
            $pdf->Cell(25,6,$key->kd_inventaris,'1',0,'C'); 
            $pdf->Cell(30,6,$key->merk,'1',0,'C'); 
            $pdf->Cell(30,6,$key->model,'1',0,'C'); 
            $pdf->Cell(0,6,$key->nm_lantai." / ".$key->nm_lokasi,'1',1,'C'); 

            $no++ ;
        }

        $pdf->Output('I',date('dmY')."_Lap.PenempatanLokasi.pdf");

    }

    //MUTASI
    public function mutasiAll()
    {
        $teks = "Laporan Mutasi";
        $tanggal = date('d/m/Y');

        $pdf = new Cfpdf('P','mm','A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('times','',14);
        $pdf->Cell(0, 5, $teks, 0, 1, 'C');
        $pdf->SetFont('times','I',12);
        $pdf->Cell(0, 5,"(".$tanggal.")", 0,1,'C');
        $pdf->Ln(8);
        //table Header
        $pdf->SetFont('times','B',12);
        $pdf->Cell(10,7,'No.','1',0,'C'); 
        $pdf->Cell(15,7,'T.A.','1',0,'C'); 
        $pdf->Cell(30,7,'Tanggal','1',0,'C'); 
        $pdf->Cell(25,7,'Kode','1',0,'C'); 
        $pdf->Cell(30,7,'Merk','1',0,'C'); 
        $pdf->Cell(40,7,'Lokasi Lama','1',0,'C'); 
        $pdf->Cell(0,7,'Lokasi Baru','1',1,'C'); 
        //fetch data
        $data = $this->m_laporan->readMutasiAll()->result();
        $no = 1;

        //table body
        $pdf->SetFont('times','',12);
        foreach ($data as $key) {

            $pdf->Cell(10,6,$no,1,0,'C'); 
            $pdf->Cell(15,6,$key->TA,1,0,'C'); 
            $pdf->Cell(30,6,$key->tanggal,1,0,'C'); 
            $pdf->Cell(25,6,$key->kd_inventaris,1,0,'C'); 
            $pdf->Cell(30,6,$key->merk,1,0,'C'); 
            $pdf->Cell(40,6,$key->lokasi_asal,1,0,'C'); 
            $pdf->Cell(0,6,$key->lokasi_tujuan,1,1,'C'); 

            $no++ ;
        }

        $pdf->Output('I',date('dmY')."_Lap.MutasiLgkp.pdf");
    }

    public function mutasiTa()
    {
        $ta = $this->input->post('ta');

        $teks = "Laporan Mutasi";
        $tanggal = date('d/m/Y');
        $pdf = new Cfpdf('P','mm','A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('times','',14);
        $pdf->Cell(0, 5, $teks, 0, 1, 'C');
        $pdf->SetFont('times','',12);
        $pdf->Cell(0, 5,"(".$tanggal.")", 0, 1, 'C');
        $pdf->Ln(4);
        $pdf->SetFont('times','',12);
        $pdf->Cell(34, 5,"Tahun Anggaran : ", 0,0,'L');
        $pdf->Cell(0, 5,$ta, 0,1,'L');
        $pdf->Ln(4);
        //table Header
        $pdf->SetFont('times','B',12);
        $pdf->Cell(10,7,'No.','1',0,'C'); 
        $pdf->Cell(15,7,'T.A.','1',0,'C'); 
        $pdf->Cell(30,7,'Tanggal','1',0,'C'); 
        $pdf->Cell(25,7,'Kode','1',0,'C'); 
        $pdf->Cell(30,7,'Merk','1',0,'C'); 
        $pdf->Cell(40,7,'Lokasi Lama','1',0,'C'); 
        $pdf->Cell(0,7,'Lokasi Baru','1',1,'C'); 
        //fetch data
        $data = $this->m_laporan->readMutasiTa($ta)->result();
        $no = 1;

        //table body
        $pdf->SetFont('times','',12);
        foreach ($data as $key) {

            $pdf->Cell(10,6,$no,1,0,'C'); 
            $pdf->Cell(15,6,$key->TA,1,0,'C'); 
            $pdf->Cell(30,6,$key->tanggal,1,0,'C'); 
            $pdf->Cell(25,6,$key->kd_inventaris,1,0,'C'); 
            $pdf->Cell(30,6,$key->merk,1,0,'C'); 
            $pdf->Cell(40,6,$key->lokasi_asal,1,0,'C'); 
            $pdf->Cell(0,6,$key->lokasi_tujuan,1,1,'C'); 

            $no++ ;
        }

        $pdf->Output('I',date('dmY')."_Lap.MutasiTA.pdf");
    }

    public function mutasiTaTipe()
    {
        //fetch data
        $tipe = $this->input->post('tipe');
        $ta = $this->input->post('ta');

        $teks = "Laporan Mutasi";
        $tanggal = date('d/m/Y');
        $pdf = new Cfpdf('P','mm','A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('times','',14);
        $pdf->Cell(0, 5, $teks, 0, 1, 'C');
        $pdf->SetFont('times','',12);
        $pdf->Cell(0, 5,"(".$tanggal.")", 0, 1, 'C');
        $pdf->Ln(4);
        $pdf->SetFont('times','',12);
        $pdf->Cell(11, 5,"Tipe : ", 0,0,'L');
        $pdf->Cell(0, 5,$tipe, 0,1,'L');
        $pdf->Ln(4);
        //table Header
        $pdf->SetFont('times','B',12);
        $pdf->Cell(10,7,'No.','1',0,'C'); 
        $pdf->Cell(15,7,'T.A.','1',0,'C'); 
        $pdf->Cell(30,7,'Tanggal','1',0,'C'); 
        $pdf->Cell(25,7,'Kode','1',0,'C'); 
        $pdf->Cell(30,7,'Merk','1',0,'C'); 
        $pdf->Cell(40,7,'Lokasi Lama','1',0,'C'); 
        $pdf->Cell(0,7,'Lokasi Baru','1',1,'C'); 
        //fetch data
        $data = $this->m_laporan->readMutasiTipe($ta,$tipe)->result();
        $no = 1;

        //table body
        $pdf->SetFont('times','',12);
        foreach ($data as $key) {

            $pdf->Cell(10,6,$no,1,0,'C'); 
            $pdf->Cell(15,6,$key->TA,1,0,'C'); 
            $pdf->Cell(30,6,$key->tanggal,1,0,'C'); 
            $pdf->Cell(25,6,$key->kd_inventaris,1,0,'C'); 
            $pdf->Cell(30,6,$key->merk,1,0,'C'); 
            $pdf->Cell(40,6,$key->lokasi_asal,1,0,'C'); 
            $pdf->Cell(0,6,$key->lokasi_tujuan,1,1,'C'); 

            $no++ ;
        }

        $pdf->Output('I',date('dmY')."_Lap.MutasiTipe.pdf");
    }

    public function mutasiTaLok()
    {
        $lok = $this->input->post('mut');
        $lokasi = $this->input->post('lokasi');
        $ta = $this->input->post('ta');

        $teks = "Laporan Penempatan";
        $tanggal = date('d/m/Y');
        $pdf = new Cfpdf('P','mm','A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('times','',14);
        $pdf->Cell(0, 5, $teks, 0, 1, 'C');
        $pdf->SetFont('times','',12);
        $pdf->Cell(0, 5,"(".$tanggal.")", 0, 1, 'C');
        $pdf->Ln(4);
        $pdf->SetFont('times','',12);
        $pdf->Cell(15, 5,"Lokasi : ", 0,0,'L');
        $pdf->Cell(0, 5,$lok, 0,1,'L');
        $pdf->Ln(4);
        //table Header
        $pdf->SetFont('times','B',12);
        $pdf->Cell(10,7,'No.','1',0,'C'); 
        $pdf->Cell(15,7,'T.A.','1',0,'C'); 
        $pdf->Cell(30,7,'Tanggal','1',0,'C'); 
        $pdf->Cell(25,7,'Kode','1',0,'C'); 
        $pdf->Cell(30,7,'Merk','1',0,'C'); 
        $pdf->Cell(40,7,'Lokasi Lama','1',0,'C'); 
        $pdf->Cell(0,7,'Lokasi Baru','1',1,'C'); 
        //fetch data
        $data = $this->m_laporan->readMutasiLok($ta,$lokasi)->result();
        $no = 1;

        //table body
        $pdf->SetFont('times','',12);
        foreach ($data as $key) {

            $pdf->Cell(10,6,$no,1,0,'C'); 
            $pdf->Cell(15,6,$key->TA,1,0,'C'); 
            $pdf->Cell(30,6,$key->tanggal,1,0,'C'); 
            $pdf->Cell(25,6,$key->kd_inventaris,1,0,'C'); 
            $pdf->Cell(30,6,$key->merk,1,0,'C'); 
            $pdf->Cell(40,6,$key->lokasi_asal,1,0,'C'); 
            $pdf->Cell(0,6,$key->lokasi_tujuan,1,1,'C'); 

            $no++ ;
        }

        $pdf->Output('I',date('dmY')."_Lap.MutasiLokasi.pdf");
    }

    //INVENTARIS
    public function laporanInv()
    {
       $filter = $this->input->post('filter');
       $val = $this->input->post('val');
        
       switch ($filter) {
           case 'kd':
               $this->inventarisDetil($val);
               break;
           case 'tipe':
               $this->inventarisBy($filter,$val);
               break;
            case 'lokasi':
               $this->inventarisBy($filter,$val);
               break;
           default:
               # code...
               break;
       }
    }

    public function inventarisAll()
    {
        $teks = "Laporan Inventaris";
        $tanggal = date('d/m/Y');

        $pdf = new Cfpdf('P','mm','A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('times','',14);
        $pdf->Cell(0, 5, $teks, 0, 1, 'C');
        $pdf->SetFont('times','I',12);
        $pdf->Cell(0, 5,"(".$tanggal.")", 0,1,'C');
        $pdf->Ln(8);
        //table Header
        $pdf->SetFont('times','B',12);
        $pdf->Cell(10,7,'No.','1',0,'C'); 
        $pdf->Cell(25,7,'Pengadaan','1',0,'C'); 
        $pdf->Cell(20,7,'Kode','1',0,'C'); 
        $pdf->Cell(30,7,'Jenis','1',0,'C'); 
        $pdf->Cell(25,7,'Merk','1',0,'C'); 
        $pdf->Cell(25,7,'Model','1',0,'C'); 
        $pdf->Cell(25,7,'Lokasi','1',0,'C'); 
        $pdf->Cell(0,7,'Kondisi','1',1,'C'); 
        //fetch data
        $data = $this->m_laporan->readInvAll()->result();
        $no = 1;

        //table body
        $pdf->SetFont('times','',12);
        foreach ($data as $key) {

            $pdf->Cell(10,6,$no,1,0,'C'); 
            $pdf->Cell(25,6,$key->tahun_pengadaan,1,0,'C'); 
            $pdf->Cell(20,6,$key->kd_inventaris,1,0,'C'); 
            $pdf->Cell(30,6,$key->nm_kategori,1,0,'C'); 
            $pdf->Cell(25,6,$key->merk,1,0,'C'); 
            $pdf->Cell(25,6,$key->model,1,0,'C'); 
            $pdf->Cell(25,6,$key->nm_lokasi,1,0,'C'); 
            $pdf->Cell(0,6,$key->persentase,1,1,'C'); 

            $no++ ;
        }

        $pdf->Output('I',date('dmY')."_Lap.InvLgkp.pdf");
    }

    public function inventarisBy($filter,$val)
    {
        $teks = "Laporan Inventaris";
        $tanggal = date('d/m/Y');

        $pdf = new Cfpdf('P','mm','A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('times','',14);
        $pdf->Cell(0, 5, $teks, 0, 1, 'C');
        $pdf->SetFont('times','I',12);
        $pdf->Cell(0, 5,"(".$tanggal.")", 0,1,'C');
        $pdf->Ln(8);
        //table Header
        $pdf->SetFont('times','B',12);
        $pdf->Cell(10,7,'No.','1',0,'C'); 
        $pdf->Cell(25,7,'Pengadaan','1',0,'C'); 
        $pdf->Cell(20,7,'Kode','1',0,'C'); 
        $pdf->Cell(30,7,'Jenis','1',0,'C'); 
        $pdf->Cell(25,7,'Merk','1',0,'C'); 
        $pdf->Cell(25,7,'Model','1',0,'C'); 
        $pdf->Cell(25,7,'Lokasi','1',0,'C'); 
        $pdf->Cell(0,7,'Kondisi','1',1,'C'); 
        //fetch data
        $data = $this->m_laporan->readInvBy($filter,$val)->result();
        $no = 1;

        //table body
        $pdf->SetFont('times','',12);
        foreach ($data as $key) {

            $pdf->Cell(10,6,$no,1,0,'C'); 
            $pdf->Cell(25,6,$key->tahun_pengadaan,1,0,'C'); 
            $pdf->Cell(20,6,$key->kd_inventaris,1,0,'C'); 
            $pdf->Cell(30,6,$key->nm_kategori,1,0,'C'); 
            $pdf->Cell(25,6,$key->merk,1,0,'C'); 
            $pdf->Cell(25,6,$key->model,1,0,'C'); 
            $pdf->Cell(25,6,$key->nm_lokasi,1,0,'C'); 
            $pdf->Cell(0,6,$key->persentase,1,1,'C'); 

            $no++ ;
        }

        $pdf->Output('I',date('dmY')."_Lap.Inv.pdf");

    }

    public function inventarisDetil($kode)
    {
        $teks = "Laporan Inventaris";
        $tanggal = date('d/m/Y');

        $pdf = new Cfpdf('P','mm','A4');
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('times','',14);
        $pdf->Cell(0, 5, $teks, 0, 1, 'C');
        $pdf->SetFont('times','I',12);
        $pdf->Cell(0, 5,"(".$tanggal.")", 0,1,'C');
        $pdf->Ln(8);

        $data = $this->m_laporan->readInvBy('kd',$kode)->result();

        foreach ($data as $key) {
            $pdf->SetFont('times','',14);
            $pdf->Cell(40,9,'Kode Inventaris',0,0,'L'); 
            $pdf->Cell(5,9,':',0,0,'L'); 
            $pdf->Cell(0,9,$key->kd_inventaris,0,1,'L');
            $pdf->Cell(40,9,'Tahun Pengadaan',0,0,'L'); 
            $pdf->Cell(5,9,':',0,0,'L'); 
            $pdf->Cell(0,9,$key->tahun_pengadaan,0,1,'L');
            $pdf->Cell(40,9,'Jenis Barang',0,0,'L'); 
            $pdf->Cell(5,9,':',0,0,'L'); 
            $pdf->Cell(0,9,$key->nm_kategori,0,1,'L');
            $pdf->Cell(40,9,'Merk',0,0,'L'); 
            $pdf->Cell(5,9,':',0,0,'L'); 
            $pdf->Cell(0,9,$key->merk,0,1,'L');
            $pdf->Cell(40,9,'Model',0,0,'L'); 
            $pdf->Cell(5,9,':',0,0,'L'); 
            $pdf->Cell(0,9,$key->model,0,1,'L');
            $pdf->Cell(40,9,'Warna',0,0,'L'); 
            $pdf->Cell(5,9,':',0,0,'L'); 
            $pdf->Cell(0,9,$key->warna,0,1,'L');
            $pdf->Cell(40,9,'Serial',0,0,'L'); 
            $pdf->Cell(5,9,':',0,0,'L'); 
            $pdf->Cell(0,9,$key->serial,0,1,'L');
            $pdf->Cell(40,9,'Kondisi',0,0,'L'); 
            $pdf->Cell(5,9,':',0,0,'L'); 
            $pdf->Cell(0,9,$key->persentase,0,1,'L');
            $pdf->Image(base_url('assets/image/').$key->gambar,115,50,-200);

            // $image1 = base_url('assets/image/').$key->gambar;
            // $pdf->Cell( 33, 33, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33), 1, 0, 'L', false );
        }        

        $pdf->Output('I',date('dmY')."_Lap.InvDetil.pdf");
    }

    public function coba()
    {
        $data = $this->m_laporan->readInvBy('kd','CPU3')->result();
        $this->jsonformatter(false,'Berhasil!',$data);
    }
}
