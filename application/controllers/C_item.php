<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_item extends CI_Controller {

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
	* #### FUNGSI CREATE = localhost/siventa/c_item/add
	* #### FUNGSI READ by kode = localhost/siventa/c_item/getby
	* #### FUNGSI READ = localhost/siventa/c_item/getall
	* #### FUNGSI UPDATE = localhost/siventa/c_item/edit
	* #### FUNGSI DEL = localhost/siventa/c_item/del
	*/

    //READ METHOD
    public function getAll()
    {
        $table = $this->input->post('table');

        if (!empty($table)) {
            if ($table == 'inventaris' || $table == 'kategori') {
                $data = $this->m_items->read($table);
                if ($data->num_rows() > 0) {
                    $this->jsonformatter(false,'Berhasil!',$data->result());
                } else {
                    $this->jsonformatter(false,'Tidak ada Data!',null);
                }
            } else {
                $this->jsonformatter(true,'Gagal!',null,404);
            }
        } else {
            $this->jsonformatter(true,'Gagal!',null,404);
        }
        
    }

    public function getBy()
    {
        $kd = $this->input->post('kode');
        $table = $this->input->post('table');
        
        $data = $this->m_items->readBy($table,$kd);
		if ($data->num_rows() > 0) {
			$this->jsonformatter(false,'Berhasil!',$data->result());
		} else {
			$this->jsonformatter(false,'Data tidak ada!',null);
		}
    }

    public function lastkey()
    {
        $tipe = $this->input->post('tipe');
        $key = $this->m_items->readKd($tipe);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(array(
                    'key' => $key
        )));
    }

    //CREATE METHOD
    //create item & kategori
    public function add()
    {
        $table = $this->input->post('table');;
        if (!empty($table)) {
            if ($table == 'inventaris' || $table == 'kategori') {

                $kd_inventaris = $this->input->post('kd_inventaris');
                $kd_kategori = $this->input->post('kd_kategori');
                $tahun  = $this->input->post('ta');
                $merk = $this->input->post('merk');
                $model = $this->input->post('model');
                $warna = $this->input->post('warna');
                $serial = $this->input->post('serial');
                $persen = $this->input->post('persentase');
                $deskripsi = $this->input->post('deskripsi');
                $nm_kategori = $this->input->post('nm_kategori');

                switch ($table) {
                    case 'inventaris':
                        $data = array('kd_inventaris' => $kd_inventaris,
                            'kd_kategori' => $kd_kategori,
                            'merk' => $merk,
                            'model' => $model,
                            'warna' => $warna,
                            'serial' => $serial,
                            'persentase' => $persen,
                            'deskripsi' => $deskripsi);
                        $this->m_items->create($table,$data);
                        $this->createQR($kd_inventaris);
                        $this->getAll();
                        break;
                    case 'kategori':
                        $data = array('kd_kategori' => $kd_kategori,
                                        'nm_kategori' => $nm_kategori );
                        $this->m_items->create($table,$data);
                        $this->getAll();
                        break;
                    default:
                        # code...
                        break;
                }           
            } else {
                $this->jsonformatter(true,'Gagal!',null,404);
            }
        } else {
            $this->jsonformatter(true,'Gagal!',null,404);
        }
    }

    //DELETE METHOD
	//del item & kategori
	public function del()
	{   
        $table = $this->input->post('table');
		$kd = $this->input->post('kd');

		$this->m_items->delete($table,$kd);
		$this->getAll($table);	
    }
    
    //UPDATE METHOD
	//update item & kategori
	public function edit()
	{
        $table = $this->input->post('table');

		if (!empty($table)) {
			if ($table == 'inventaris' || $table == 'kategori' ) {
                //catch input 
                
				$kd_inventaris = $this->input->post('kd_inventaris');
                $kd_kategori = $this->input->post('kd_kategori');
                $merk = $this->input->post('merk');
                $model = $this->input->post('model');
                $warna = $this->input->post('warna');
                $serial = $this->input->post('serial');
                $persen = $this->input->post('persentase');
                $deskripsi = $this->input->post('deskripsi');
                $nm_kategori = $this->input->post('nm_kategori');

				switch ($table) {
					case 'inventaris':
						$where = array('kd_inventaris' => $kd_inventaris);
                        $data = array('merk' => $merk,
                                        'model' => $model,
                                        'warna' => $warna,
                                        'serial' => $serial,
                                        'persentase' => $persen,
                                        'deskripsi' => $deskripsi);
                        $this->m_items->update($table,$where,$data);
                        $this->getAll();
						break;
					case 'kategori':
                        $where = array('kd_kategori' => $kd_kategori);
                        $data = array('nm_kategori' => $nm_kategori);
                        $this->m_items->update($table,$where,$data);
						$this->getAll();
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
		$json['items'] = $data;
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($code)
            ->set_output(json_encode($json));
    }

    //QR Code Generator
    public function createQR($val)
    {
        $params['data'] = $val;
        $params['level'] = 'M';
        $params['size'] = 5;
        $params['savename'] = FCPATH.'assets/image/qrimage/'.$val.'.png';
        $this->ciqrcode->generate($params);
        //echo "<a href=\"".base_url('assets/image/').$val.".png\">clik_me</a>";
    }

    // public function bikinqr() //bikin QR Masal
    // {
    //     $data = $this->m_items->read('inventaris')->result();
    //     foreach ($data as $item) {
    //         $this->createQR($item->kd_inventaris);
    //     }
    //     echo "sudah";
    // }
    
	///////////////////////////////
	////// Metode input URL ///////
	///////////////////////////////
	/*
	* Dibawah ini metode alternatif dari fungsi diatas
	* Contoh :
	* #### FUNGSI CREATE = localhost/siventa/c_item/{tabel}/add
	* #### FUNGSI READ BY ID = localhost/siventa/c_item/{tabel}/{id}
	* #### FUNGSI READ = localhost/siventa/c_item/{tabel}
	* #### FUNGSI UPDATE = localhost/siventa/c_item/{tabel}/edit/{id}
	* #### FUNGSI DEL = localhost/siventa/c_item/{tabel}/del/{id}
	*/

    public function inventaris($method,$kd)
    {
        # code...
    }

    public function kategori($method,$kd)
    {
        # code...
    }

    public function group()
    {
        $data = $this->m_items->readKtg()->result();
        $this->jsonformatter(false,'berhasil',$data);
    }
}
