<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasubbag extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		// jika level != admin > redirect login

		if ($this->session->userdata('status') == 'login') {
			if ($this->session->userdata('level') != 'Kasubbag') {
				redirect(base_url('login/logout'));
			}
		} else {
			redirect(base_url("login"));
		}
	}
	
	//function untuk remap index function dibawah agar bisa diberi parameter.
	function _remap($param) {
        $this->index($param);
    }
    
	public function index($page)
	{	
		switch ($page) {
			case 'lokasi':
				$data['lokasi'] = $this->m_lokasi->read('lokasi')->result();
				$data['lantai'] = $this->m_lokasi->read('lantai')->result();
				$data['gedung'] = $this->m_lokasi->read('gedung')->result();
				$data['lan_aktif'] = $this->m_lokasi->readByStatus('lantai','aktif')->result();
				$data['ged_aktif'] = $this->m_lokasi->readByStatus('gedung','aktif')->result();
				$this->template->load('template/kasubbag','contents/'.$page,$data);
				break;
			case 'inventaris':
				$data['barang'] = $this->m_items->read('inventaris')->result();
				$data['ktg_brg'] = $this->m_items->read('kategori')->result();
				//$data['last'] = $this->m_items->readKd($tipe);
				$this->template->load('template/kasubbag','contents/'.$page,$data);
				break;
			case 'label':
				$data['lokasi'] = $this->m_lokasi->read('lokasi')->result();
				$data['ktg_brg'] = $this->m_items->read('kategori')->result();
				$data['lokasi'] = $this->m_lokasi->read('lokasi')->result();
				$this->template->load('template/kasubbag','contents/'.$page,$data);
				break;
			case 'laporan':
				$data['lokasi'] = $this->m_lokasi->read('lokasi')->result();
				$data['TA'] = $this->m_laporan->readTA()->result();
				$data['ktg_brg'] = $this->m_items->read('kategori')->result();
				$data['lokasi'] = $this->m_lokasi->read('lokasi')->result();
				$this->template->load('template/kasubbag','contents/'.$page,$data);
				break;	
			default:
				$tahun = date("Y");
				$data['TA'] = $this->m_mutasi->readTA();
				$data['pengadaan'] = $this->m_items->readItem('tahun_pengadaan',$tahun);
				$data['penempatan'] = $this->m_items->readItem('penempatan','belum');
				$data['ktg'] = $this->m_items->readKtg()->result();
				$this->template->load('template/kasubbag','contents/index',$data);
				break;
		}
    }	
	
}
