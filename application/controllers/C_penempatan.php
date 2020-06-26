<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_penempatan extends CI_Controller {

	public function index()
	{
        /*
        * IF role = admin THEN redirect(admin/index)
        * ELSEIF role = user THEN redirect(user/index)
        * ELSEIF role = dekan THEN redirect(dekan/index)
        * ELSE redirect(base_url("login"))
        */
    }
	
	/*
	* METODE INPUT POST (MENGGUNAKAN FORM!)
	* Contoh :
	* #### FUNGSI CREATE = localhost/siventa/c_penempatan/add/
	* #### FUNGSI READ by Username = localhost/siventa/c_penempatan/getUserBy/
	* #### FUNGSI READ = localhost/siventa/c_penempatan/getUser/
	* #### FUNGSI UPDATE = localhost/siventa/c_penempatan/edit/
	* #### FUNGSI DEL = localhost/siventa/c_penempatan/del/
	*/
	/*
	* CRUD USER
	*/
	//READ ALL USER
	public function getAll()
	{
		$data = $this->m_penempatan->read()->result();
		$this->jsonformatter(false,'Berhasil!',$data);
	}

	public function getPen() //return dlm bentuk json
	{
		$data = $this->m_penempatan->read()->result();
		$this->jsonformatter(false,"Berhasil!",$data);
	}

	public function getPenBy($tgl) //get by tanggal
	{
		//$tgl = $this->input->post('tgl');
		$data = $this->m_penempatan->readBy($tgl)->result();
		$this->jsonformatter(false,"Berhasil!",$data);
	}

	public function getSelItem($kd)
	{
		$data = $this->m_penempatan->readSelItem($kd)->result();
		$this->jsonformatter(false,"Berhasil!",$data);
	}

	public function getItem() //untuk table di dalam modal
	{
		$data = $this->m_penempatan->readItem();
		$this->jsonformatter(false,"Berhasil!",$data->result());
		
	}

	//create record tabel penempatan
	public function add()
	{
		$kd = $this->input->post('kd_penempatan');
		$tgl = $this->input->post('tgl_penempatan');
		$lokasi = $this->input->post('lokasi');
		$ta = $this->input->post('ta');
		$ket = $this->input->post('keterangan');
		$inventaris = $this->input->post('kode_inventaris');

		//cek num rows ada atau tidak
		$num = $this->m_penempatan->exist($kd);
		
		$data1 = array( 'tanggal' => $tgl,
						'kd_lokasi' => $lokasi,
						'TA' => $ta,
						'keterangan' => $ket);
		
		$data3 = array('kd_penempatan' => $kd,
						'kd_inventaris' => $inventaris);

		$penempatan = "sudah";
		$where = array('kd_inventaris' => $inventaris);
		$data2 = array('penempatan' => "$penempatan",
						'kd_lokasi' => "$lokasi" );

		if ($num == 0) { //cek apakan kd_penempatan sdh ada di tbl penempatan
			//input ke table penempatan
			$this->m_penempatan->create('penempatan',$data1);
			//input ke tbl detil_penempatan
			$this->m_items->create('detil_penempatan',$data3);
			//update ke tbl inventaris
			$this->m_items->update('inventaris',$where,$data2);
		} else {
			//input ke tbl detil_penempatan
			$this->m_items->create('detil_penempatan',$data3);
			//update ke tbl inventaris
			$this->m_items->update('inventaris',$where,$data2);
		}
		
		$this->getSelItem($kd);
	}

	//del record penempatan berdasarkan kd_penempatan
	public function del()
	{
		$kd = $this->input->post('kd');
		$this->m_penempatan->delete($kd);
		$this->getPen();
	}

	//del selected item
	public function delItem()
	{
		//hapus item yg ada di tabel detil_penempatan
		$kd_pen = $this->input->post("kd_pen");
		$kd_inv = $this->input->post("kd_inv"); //kode inventaris
		$this->m_penempatan->deleteItem($kd_inv);

		//update barang inventaris "penempatan=belum"
		$penempatan = "belum";
		$where = array('kd_inventaris' => $kd_inv);
		$data = array('penempatan' => "$penempatan" );
		$this->m_items->update('inventaris',$where,$data);

		$this->getSelItem($kd_pen);
	}

	//update user
	public function edit()
	{
		$kd = $this->input->post('kd-penempatan');
		$tgl = $this->input->post('tgl-penempatan');
		$lokasi = $this->input->post('lokasi');
		$ta = $this->input->post('ta');
		$ket = $this->input->post('keterangan');
		$inventaris = $this->input->post('kode-inventaris');
		$where = array('kd_penempatan' => $kd);
		$data = array('tanggal' => $tgl,
						'kd_lokasi' => $lokasi,
						'TA' => $ta,
						'keterangan' => $ket,
						'kd_inventaris' => $inventaris);
		$this->m_penempatan->update($where,$data);
		$this->getPen();
	}

	public function jsonformatter($error,$msg,$data)
	{
		$json['error'] = $error;
        $json['message'] = $msg;
		$json['penempatan'] = $data;
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($json));
	}


}
