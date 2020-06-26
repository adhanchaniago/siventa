<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_users extends CI_Controller {

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
	* #### FUNGSI CREATE = localhost/siventa/c_users/add/
	* #### FUNGSI READ by Username = localhost/siventa/c_users/getUserBy/
	* #### FUNGSI READ = localhost/siventa/c_users/getUser/
	* #### FUNGSI UPDATE = localhost/siventa/c_users/edit/
	* #### FUNGSI DEL = localhost/siventa/c_users/del/
	*/
	/*
	* CRUD USER
	*/
	//READ ALL USER
	public function getUser() //return dlm bentuk json
	{
		$data = $this->m_user->read()->result();
		$this->jsonformatter(false,"Berhasil!",$data);
	}

	public function getUserBy() //return dlm bentuk json
	{
		$username = $this->input->post('username');
		$data = $this->m_user->readBy($username)->result();
		$this->jsonformatter(false,"Berhasil!",$data);
	}
	
	//create user
	public function add()
	{
		$usr = $this->input->post('usr');
		$pwd = $this->input->post('pwd');
		$level = $this->input->post('level');
		$status = $this->input->post('status');
		$data = array('username' => $usr,
						'password' => $pwd,
						'level' => $level,
						'status_aktif' => $status);
		$this->m_user->create($data);
		$this->getUser();
	}
	//del user
	public function del()
	{
		$username = $this->input->post('username');
		$this->m_user->delete($username);
		$this->getUser();
	}
	//update user
	public function edit()
	{
		$username = $this->input->post('edit-usr');
		$pwd = $this->input->post('edit-pwd');
		$level = $this->input->post('edit-level');
		$status = $this->input->post('edit-status');
		$where = array('username' => $username);
		$data = array('password' => $pwd,
						'level' => $level,
						'status_aktif' => $status);
		$this->m_user->update($where,$data);
		$this->getUser();
	}

	public function jsonformatter($error,$msg,$data)
	{
		$json['error'] = $error;
        $json['message'] = $msg;
		$json['users'] = $data;
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($json));
	}

	///////////////////////////////
	///// Metode Input URL ////////
	///////////////////////////////
	/*
	* Dibawah ini metode alternatif dari fungsi diatas
	* Contoh :
	* #### FUNGSI CREATE = localhost/siventa/c_users/user/add
	* #### FUNGSI READ BY username = localhost/siventa/c_users/{username}
	* #### FUNGSI READ = localhost/siventa/c_users/user
	* #### FUNGSI UPDATE = localhost/siventa/c_users/user/edit/{username}
	* #### FUNGSI DEL = localhost/siventa/c_users/user/del/{username}
	*/

	public function user($method=null,$id=null)
	{
		if (!empty($method)) {
			if ($method == 'add' || $method == 'del' || $method == 'edit') {

				$username = $this->input->post('username');
				$pass = $this->input->post('pass');
				$level = $this->input->post('level');
				$status = $this->input->post('status');

				switch ($method) {
					case 'add':
						$data = array('username' => $username,
										'password' => $pass,
										'level' => $level,
										'status_aktif' => $status);
						$this->m_user->create($data);
						$this->getUser();
						break;
					case 'del':
						$this->m_user->delete($id);
						$this->getUser();
						break;
					case 'edit':
						$where = array('username' => $id);
						$data = array('password' => $pass,
										'level' => $level,
										'status_aktif' => $status);
						$this->m_user->update($where,$data);
						$this->getUser();
						break;
					default:
						# code...
						break;
				}
			} else {
				//get user by username
				$data = $this->m_user->readBy($method);
				if ($data->num_rows() > 0) {
					$this->jsonformatter(false,"Berhasil!",$data->result());
				} else {
					$this->jsonformatter(false,"Data tidak ada!",null);
				}
				
			}
		} elseif (empty($method)) {
			//get all user
			$this->getUser();
		} else {
			// error request
			$this->jsonformatter(true,"Gagal!",null,404);
		}
		
	}

}
