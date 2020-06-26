<?php
/**
 * Model CRUD User Management
 */
class M_user extends CI_Model{
  //read all user
  function read()
  {
      return $this->db->get('user');
  }

  // read berdasarkan id
  function readBy($username)
  {
    return $this->db->get_where('user', array('username' => $username));
  }

  function delete($username)
  {
    $where = array('username' => $username);
    $this->db->where($where);
    $this->db->delete('user');
  }

  function create($data)
  {
    $this->db->insert('user',$data);
  }

  function update($where,$data)
  {
    $this->db->where($where);
    $this->db->update('user',$data);
  }

}

?>
