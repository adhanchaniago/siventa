<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_mutasi extends CI_Controller {

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
		$data = $this->m_mutasi->read()->result();
		$this->jsonformatter(false,'Berhasil!',$data);
	}

	public function getItem() //untuk table di dalam modal
	{
		$data = $this->m_mutasi->readItem();
		$this->jsonformatter(false,"Berhasil!",$data->result());
	}

	//create record tabel penempatan
	public function add()
	{
		$tgl = $this->input->post('tgl-mutasi');
		$lokasi_lama = $this->input->post('lokasi-asal');
		$lokasi_baru = $this->input->post('lokasi-tujuan');
		$ta = $this->input->post('ta');
		$ket = $this->input->post('keterangan');
		$inventaris = $this->input->post('kode-inventaris');

		$data1 = array( 'tanggal' => $tgl,
						'kd_lokasi_lama' => $lokasi_lama,
						'kd_lokasi_baru' => $lokasi_baru,
						'kd_inventaris' => $inventaris,
						'TA' => $ta,
						'keterangan' => $ket);
		
		$where = array('kd_inventaris' => $inventaris);
        $data2 = array('kd_lokasi' => "$lokasi_baru" );
        
        $this->m_mutasi->create('mutasi',$data1);
        $this->m_items->update('inventaris',$where,$data2);

		$this->getAll();
	}

	//del record penempatan berdasarkan kd_penempatan
	public function del()
	{
		$kd = $this->input->post('kd');
		$this->m_penempatan->delete($kd);
		$this->getPen();
	}

	public function jsonformatter($error,$msg,$data)
	{
		$json['error'] = $error;
        $json['message'] = $msg;
		$json['mutasi'] = $data;
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($json));
	}


}
