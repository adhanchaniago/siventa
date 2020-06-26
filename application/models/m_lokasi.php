<?php
/**
 * Model CRUD Location Management
 */
class M_lokasi extends CI_Model{
  //READ METHOD
  //read lokasi
  public function read($table) //BARU
  {
    switch ($table) {
      case 'lokasi':
        // return $this->db->query('SELECT lokasi.kd_lokasi,lokasi.nm_lokasi,lantai.nm_lantai,gedung.nm_gedung,lokasi.status_aktif 
        // FROM lokasi INNER JOIN lantai ON lantai.kd_lantai = lokasi.kd_lantai 
        // INNER JOIN gedung ON gedung.kd_gedung = lokasi.kd_gedung')->order_by('kd_lokasi', 'ASC')->get();

        $this->db->select('lokasi.kd_lokasi,lokasi.nm_lokasi,lokasi.kd_lantai,lantai.nm_lantai,lokasi.kd_gedung,gedung.nm_gedung,lokasi.status_aktif');
        $this->db->from('lokasi');
        $this->db->join('lantai', 'lantai.kd_lantai = lokasi.kd_lantai', 'inner');
        $this->db->join('gedung', 'gedung.kd_gedung = lokasi.kd_gedung', 'inner');
        return $this->db->order_by('kd_lokasi', 'ASC')->get();
        break;
      case 'lantai':
        return $this->db->from('lantai')->order_by('kd_lantai', 'ASC')->get();
        break;
      case 'gedung':
        return $this->db->from('gedung')->order_by('kd_gedung', 'ASC')->get();
        break;
      default:
        # code...
        break;
    }
  }

  public function readBy($table,$kd) //BARU
  {
    return $this->db->get_where($table, array('kd_'.$table => $kd));
  }
  //read berdasarkan status
  public function readByStatus($table,$status) //BARU
  {
    return $this->db->get_where($table, array('status_aktif' => $status));
  }

  //DEL METHOD
  //del lokasi
  public function delete($table,$kd) //BARU
  {
    $where = array('kd_'.$table => $kd);
    $this->db->where($where);
    $this->db->delete($table);
  }

  //CREATE METHOD
  //create lokasi
  public function create($table,$data) //BARU
  {
    $this->db->insert($table,$data);
  }

  //UPDATE METHOD
  //update lokasi
  public function update($table,$where,$data) //BARU
  {
    $this->db->where($where);
    $this->db->update($table,$data);
  }


}

?>
