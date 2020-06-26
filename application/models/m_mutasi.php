<?php
/**
 * Model CRUD User Management
 */
class M_mutasi extends CI_Model{
  //read semua data penempatan
  function read()
  {
    $this->db->select('mut.kd_mutasi,mut.TA,mut.kd_lokasi_lama,mut.kd_lokasi_baru,ktg.nm_kategori,inv.kd_inventaris,inv.persentase,lok.nm_lokasi lokasi_asal,lek.nm_lokasi lokasi_tujuan,mut.tanggal');
    $this->db->from('mutasi mut');
    $this->db->join('lokasi lok', 'lok.kd_lokasi = mut.kd_lokasi_lama', 'inner');
    $this->db->join('lokasi lek', 'lek.kd_lokasi = mut.kd_lokasi_baru', 'inner');
    $this->db->join('inventaris inv', 'inv.kd_inventaris = mut.kd_inventaris', 'inner');
    $this->db->join('kategori ktg', 'ktg.kd_kategori = inv.kd_kategori', 'inner');
    return $this->db->order_by('mut.kd_mutasi', 'ASC')->get();
  }
  //read item yang sudah ditempatkan
  function readItem()
  { 
    $this->db->select('inv.*,ktg.nm_kategori,lok.nm_lokasi');
    $this->db->from('inventaris inv');
    $this->db->join('kategori ktg','ktg.kd_kategori = inv.kd_kategori','inner');
    $this->db->join('lokasi lok','lok.kd_lokasi = inv.kd_lokasi','inner');
    $this->db->order_by('inv.kd_inventaris', 'ASC');
    return $this->db->where('inv.penempatan', 'sudah')->get();
  }

  //get kd_penempatan yg paling besar/akhir 
  function lastId()
  {
    $this->db->select_max('kd_penempatan');
    return $this->db->get('penempatan')->row()->kd_penempatan;
  } 

  //read jumlah mutasi pada TA tertentu
  public function readTA()
  {
		$tahun = date("Y");
    $this->db->like('TA', $tahun);
    return $this->db->get('mutasi')->num_rows();
  }

  //cek apakah kd_penempatan yg dimaksud ada atau tidak
  function exist($kd)
  {
    return $this->db->get_where('penempatan', array('kd_penempatan' => $kd ))->num_rows();
  }

  //hapus record penempatan berdasarkan kd_penempatan
  function delete($kd)
  {
    $where = array('kd_penempatan' => $kd);
    $this->db->where($where);
    $this->db->delete('penempatan');
  }

  //hapus item pada detil_item sesuai dg kode inventaris
  function deleteItem($kd)
  {
    $this->db->delete('detil_penempatan', array('kd_inventaris' => $kd ));
  }

  function create($table,$data)
  {
    $this->db->insert($table,$data);
  }

  function update($where,$data)
  {
    $this->db->where($where);
    $this->db->update('penempatan',$data);
  }

}

?>
