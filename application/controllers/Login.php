<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('m_login');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function aksi_login()
	{
		//terima data dari form login
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//trus data nya dimasukin ke array kak
		$where = array(
						'username' => $username,
						'password' => $password,
		);
		//habis itu di cek, ada atau ngga record nya
		$cek = $this->m_login->cek_login('user',$username,$password)->num_rows();
		if ($cek > 0){
			//kalo ada diambil datanya,tapi cuma ID nya.
			$data = $this->m_login->cek_login('user',$username,$password)->row();
			// echo $data->username;
			// set session
			$data_session = array('nama' => $data->username, 'level'=> $data->level, 'status' => 'login');
			$this->session->set_userdata($data_session);
			$this->jsonformatter(false,"berhasil",$data);
			// redirect(base_url('admin'));
		} else {
			$data = null;
			$this->jsonformatter(false,"gagal",$data);
			// $msg['pesan'] = "Username atau Password Salah";
			// $this->load->view('login',$msg);
		}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

	public function jsonformatter($error,$msg,$data)
	{
		$json['error'] = $error;
        $json['message'] = $msg;
		$json['login'] = $data;
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($json));
	}
}
