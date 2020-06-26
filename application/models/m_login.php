<?php

class M_login extends CI_Model{

  function cek_login($table,$user,$pass)
  {
    // return $this->db->get_where($table,$where);
    $this->db->select('username,level,status_aktif');
    $this->db->where('username',$user);
    $this->db->where('password',$pass);
    return $this->db->get($table);
  }

//   function update_log($table,$data)
//   {
//     $this->db->insert($table,$data);
//   }

}

?>