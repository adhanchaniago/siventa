<?php
/**
 * Model CRUD User Management
 */
class M_penempatan extends CI_Model{
  //read semua data penempatan
  function read()
  {
    $this->db->select('pen.kd_penempatan,pen.TA,dp.kd_inventaris,ktg.nm_kategori,inv.persentase,lok.nm_lokasi,pen.tanggal');
    $this->db->from('penempatan pen');
    $this->db->join('lokasi lok', 'lok.kd_lokasi = pen.kd_lokasi', 'inner');
    $this->db->join('detil_penempatan dp', 'dp.kd_penempatan = pen.kd_penempatan', 'inner');
    $this->db->join('inventaris inv', 'inv.kd_inventaris = dp.kd_inventaris', 'inner');
    $this->db->join('kategori ktg', 'ktg.kd_kategori = inv.kd_kategori', 'inner');
    return $this->db->order_by('kd_penempatan', 'ASC')->get();
  }
  //read item yang belum ditempatkan
  function readItem()
  { 
    $this->db->select('inv.*,ktg.nm_kategori');
    $this->db->from('inventaris inv');
    $this->db->join('kategori ktg','ktg.kd_kategori = inv.kd_kategori','inner');
    $this->db->order_by('inv.kd_inventaris', 'ASC');
    return $this->db->where('inv.penempatan', 'belum')->get();
  }

	//get item yang hanya sesuai dg kd_penempatan  
  function readSelItem($kd)
  {
    $this->db->select('dp.*,inv.kd_inventaris,ktg.nm_kategori,inv.merk');
    $this->db->from('detil_penempatan dp');
    $this->db->join('inventaris inv','dp.kd_inventaris = inv.kd_inventaris','inner');
    $this->db->join('kategori ktg','inv.kd_kategori = ktg.kd_kategori','inner');
    $this->db->order_by('dp.kd_inventaris', 'ASC');
    return $this->db->where('dp.kd_penempatan',$kd)->get();
  }

  //get kd_penempatan yg paling besar/akhir 
  function lastId()
  {
    $this->db->select_max('kd_penempatan');
    return $this->db->get('penempatan')->row()->kd_penempatan;
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
