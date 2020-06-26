<?php
/**
 * Model CRUD User Management
 */
class M_items extends CI_Model{
  //READ METHOD
  //read all column
  function read($table)
  {
    switch ($table) {
      case 'inventaris':
        $this->db->select('inventaris.*,kategori.nm_kategori');
        $this->db->from('inventaris');
        $this->db->join('kategori','kategori.kd_kategori = inventaris.kd_kategori','inner');
        return $this->db->order_by('kd_inventaris', 'ASC')->get();
        break;
      case 'kategori':
        return $this->db->get($table);
        break;
      default:
        break;
    }
  }

  // read berdasarkan kriteria
  function readBy($table,$kd)
  {
    return $this->db->get_where($table, array('kd_'.$table => $kd));
  }

  //read by kriteria u/ dashboard
  public function readItem($col,$kriteria)
  {
    $this->db->like($col, $kriteria, 'after');
    return $this->db->get('inventaris')->num_rows();
  }

  //group kategori untuk chart dashboard
  public function readKtg()
  {
    $this->db->select('inventaris.kd_kategori, kategori.nm_kategori, COUNT(*) as total');
    $this->db->join('kategori','kategori.kd_kategori = inventaris.kd_kategori','inner');
    $this->db->from('inventaris');
    $this->db->group_by('inventaris.kd_kategori'); 
    return $this->db->get();
  }

  function readKd($tipe)
  {
    $this->db->like('kd_inventaris',$tipe,'after')->from('inventaris')
          ->order_by('kd_inventaris', 'DESC')
          ->limit(1);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
        return $query->row()->kd_inventaris;
    } else {
      return $tipe."0";
    }
  }

  //DELETE METHOD
  //delete items & kategori
  function delete($table,$kd)
  {
    $where = array('kd_'.$table => $kd);
    $this->db->where($where);
    $this->db->delete($table);
  }

  //CREATE METHOD
  //create items & kategori
  function create($table,$data)
  {
    $this->db->insert($table,$data);
  }

  //UPDATE METHOD
  //update item & kategori
  function update($table,$where,$data)
  {
    $this->db->where($where);
    $this->db->update($table,$data);
  }

}

?>
