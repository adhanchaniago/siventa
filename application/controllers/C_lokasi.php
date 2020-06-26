<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_lokasi extends CI_Controller {

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
	* #### FUNGSI CREATE = localhost/siventa/c_lokasi/add
	* #### FUNGSI READ = localhost/siventa/c_lokasi/getall
	* #### FUNGSI UPDATE = localhost/siventa/c_lokasi/edit
	* #### FUNGSI DEL = localhost/siventa/c_lokasi/del
	*/
	//READ
	public function getAll() //BARU	
	{
		//catch the input
		$table = $this->input->post('table');

		if (!empty($table)) {
			if ($table == 'lokasi' || $table == 'lantai' || $table == 'gedung' ) {
				$data = $this->m_lokasi->read($table);
				if ($data->num_rows() > 0) {
					$this->jsonformatter(false,"Berhasil",$data->result());
				} else {
					$this->jsonformatter(false,"Tidak ada Data",null,404);
				}
			} else {
				$this->jsonformatter(true,"Gagal!",null,404);
			}
		} else {
			$this->jsonformatter(true,"Gagal!",null,404);
		}
	}
	public function getBy() //BARU
	{
		$kd = $this->input->post('kode');
		$tabel = $this->input->post('tabel');
		$data = $this->m_lokasi->readBy($tabel,$kd);
		if ($data->num_rows() > 0) {
			$this->jsonformatter(false,'Berhasil!',$data->result());
		} else {
			$this->jsonformatter(false,'Data tidak ada!',null);
		}
	}
	
	//CREATE
	//create lokasi
	public function add() //BARU
	{
		//catch the input
		$table = $this->input->post('table');

		if (!empty($table)) {
			if ($table == 'lokasi' || $table == 'lantai' || $table == 'gedung' ) {
				//catch input 
				$nm = $this->input->post('nm');
				$lantai = $this->input->post('lantai');
				$gedung = $this->input->post('gedung');
				$status = $this->input->post('status');

				switch ($table) {
					case 'lokasi':
						$data = array('nm_lokasi' => $nm,
								'kd_lantai' => $lantai,
								'kd_gedung' => $gedung,
								'status_aktif' => $status);
						$this->m_lokasi->create($table,$data);
						$this->getAll($table);
						break;
					case 'lantai':
						$data = array('nm_lantai' => $nm,
								'status_aktif' => $status);
						$this->m_lokasi->create($table,$data);
						$this->getAll($table);
						break;
					case 'gedung':
						$data = array('nm_gedung' => $nm,
								'status_aktif' => $status);
						$this->m_lokasi->create($table,$data);
						$this->getAll($table);
						break;
					default:
						# code...
						break;
				}
			} else {
				$this->jsonformatter(true,"Gagal!",null,404);
			}
			
		} else {
			$this->jsonformatter(true,"Gagal!",null,404);
		}
		
	}

	//DELETE METHOD
	//del lokasi
	public function del() //BARU
	{
		$table = $this->input->post('table');
		$kd = $this->input->post('kd');

		$this->m_lokasi->delete($table,$kd);
		$this->getAll($table);		
	}

	//UPDATE METHOD
	//update lokasi
	public function edit() //BARU
	{
		$table = $this->input->post('table');
		$kd = $this->input->post('kd');

		if (!empty($table)) {
			if ($table == 'lokasi' || $table == 'lantai' || $table == 'gedung' ) {
				//catch input 
				$kd = $this->input->post('kd');
				$nm = $this->input->post('nm');
				$kd_lan = $this->input->post('lantai');
				$kd_ged = $this->input->post('gedung');
				$status = $this->input->post('status');

				switch ($table) {
					case 'lokasi':
						$where = array('kd_lokasi' => $kd);
						$data = array('nm_lokasi' => $nm,
										'kd_lantai' => $kd_lan,
										'kd_gedung' => $kd_ged,
										'status_aktif' => $status);
						$this->m_lokasi->update($table,$where,$data);
						$this->getAll($table);
						break;
					case 'lantai':
						$where = array('kd_lantai' => $kd);
						$data = array('nm_lantai' => $nm,
										'status_aktif' => $status);
						$this->m_lokasi->update($table,$where,$data);
						$this->getAll($table);
						break;
					case 'gedung':
						$where = array('kd_gedung' => $kd);
						$data = array('nm_gedung' => $nm,
										'status_aktif' => $status);
						$this->m_lokasi->update($table,$where,$data);
						$this->getAll($table);
						break;
					default:
						# code...
						break;
				}
			} else {
				$this->jsonformatter(true,"Gagal!",null,404);
			}
			
		} else {
			$this->jsonformatter(true,"Gagal!",null,404);
		}
	}
	
	//JSON Formatter
	public function jsonformatter($error,$msg,$data,$code=200)
	{
		$json['error'] = $error;
        $json['message'] = $msg;
		$json['datas'] = $data;
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($code)
            ->set_output(json_encode($json));
	}

	///////////////////////////////
	////// Metode input URL ///////
	///////////////////////////////
	/*
	* Dibawah ini metode alternatif dari fungsi diatas
	* Contoh :
	* #### FUNGSI CREATE = localhost/siventa/c_lokasi/{tabel}/add
	* #### FUNGSI READ BY ID = localhost/siventa/c_lokasi/{tabel}/{id}
	* #### FUNGSI READ = localhost/siventa/c_lokasi/{tabel}
	* #### FUNGSI UPDATE = localhost/siventa/c_lokasi/{tabel}/edit/{id}
	* #### FUNGSI DEL = localhost/siventa/c_lokasi/{tabel}/del/{id}
	*/
	public function lokasi($method=null,$kd=null)
	{
		if (!empty($method)) {
			if ($method == 'del' || $method == 'edit' || $method == 'add') {

				$nm = $this->input->post('nm');
				$status = $this->input->post('status');
				$kd_lantai = $this->input->post('kd_lantai');
				$kd_gedung = $this->input->post('kd_gedung');

				switch ($method) {
					case 'del':
						$this->m_lokasi->delete('lokasi',$kd);
						$this->getAll('lokasi');	
						break;
					case 'edit':
						$where = array('kd_lokasi' => $kd);
						$data = array('nm_lokasi' => $nm,
										'kd_lantai' => $kd_lantai,
										'kd_gedung' => $kd_gedung,
										'status_aktif' => $status);
						$this->m_lokasi->update('lokasi',$where,$data);
						$this->getAll('lokasi');	
						break;
					case 'add':
						$data = array('nm_lantai' => $nm,
										'kd_lantai' => $kd_lantai,
										'kd_gedung' => $kd_gedung,
										'status_aktif' => $status);
						$this->m_lokasi->create('lokasi',$data);
						$this->getAll('lokasi');	
						break;
					default:
						# code...
						break;
				}
			} elseif (is_numeric($method)) {
				$kd = $method;
				$table = 'lokasi';
				$data = $this->m_lokasi->readBy($table,$kd);
				if ($data->num_rows() > 0) {
					$this->jsonformatter(false,'Berhasil!',$data->result());
				} else {
					$this->jsonformatter(false,'Data tidak ada!',null);
				}
			}else {
				$this->jsonformatter(true,"Gagal!",null,404);
			}
		} else {
			$this->getAll('lokasi');
		}
		
	}
	public function lantai($method=null,$kd=null)
	{
		if (!empty($method)) {
			if ($method == 'del' || $method == 'edit' || $method == 'add') {

				$nm = $this->input->post('nm');
				$status = $this->input->post('status');

				switch ($method) {
					case 'del':
						$this->m_lokasi->delete('lantai',$kd);
						$this->getAll('lantai');	
						break;
					case 'edit':
						$where = array('kd_lantai' => $kd);
						$data = array('nm_lantai' => $nm,
										'status_aktif' => $status);
						$this->m_lokasi->update('lantai',$where,$data);
						$this->getAll('lantai');	
						break;
					case 'add':
						$data = array('nm_lantai' => $nm,
								'status_aktif' => $status);
						$this->m_lokasi->create('lantai',$data);
						$this->getAll('lantai');	
						break;
					default:
						# code...
						break;
				}
			} elseif (is_numeric($method)) {
				$kd = $method;
				$table = 'lantai';
				$data = $this->m_lokasi->readBy($table,$kd);
				if ($data->num_rows() > 0) {
					$this->jsonformatter(false,'Berhasil!',$data->result());
				} else {
					$this->jsonformatter(false,'Data tidak ada!',null);
				}
			}else {
				$this->jsonformatter(true,"Gagal!",null,404);
			}
		} else {
			$this->getAll('lantai');
		}
		
	}
	public function gedung($method=null,$kd=null)
	{
		if (!empty($method)) {
			if ($method == 'del' || $method == 'edit' || $method == 'add') {

				$nm = $this->input->post('nm');
				$status = $this->input->post('status');

				switch ($method) {
					case 'del':
						$this->m_lokasi->delete('gedung',$kd);
						$this->getAll('gedung');	
						break;
					case 'edit':
						$where = array('kd_gedung' => $kd);
						$data = array('nm_gedung' => $nm,
										'status_aktif' => $status);
						$this->m_lokasi->update('gedung',$where,$data);
						$this->getAll('gedung');	
						break;
					case 'add':
						$data = array('nm_gedung' => $nm,
								'status_aktif' => $status);
						$this->m_lokasi->create('gedung',$data);
						$this->getAll('gedung');	
						break;
					default:
						# code...
						break;
				}
			} elseif (is_numeric($method)) {
				$kd = $method;
				$table = 'gedung';
				$data = $this->m_lokasi->readBy($table,$kd);
				if ($data->num_rows() > 0) {
					$this->jsonformatter(false,'Berhasil!',$data->result());
				} else {
					$this->jsonformatter(false,'Data tidak ada!',null);
				}
			}else {
				$this->jsonformatter(true,"Gagal!",null,404);
			}
		} else {
			$this->getAll('gedung');
		}
		
	}
}
