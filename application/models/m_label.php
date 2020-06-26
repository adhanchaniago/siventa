<?php
/**
 * Model CRUD User Management
 */
class M_label extends CI_Model{
  //read semua data penempatan

  
  
  public function readAll()
  {
    $this->db->select('inv.*,lok.nm_lokasi,ktg.nm_kategori');
    $this->db->from('inventaris inv');
    $this->db->join('kategori ktg','ktg.kd_kategori = inv.kd_kategori','inner');
    $this->db->join('lokasi lok','lok.kd_lokasi = inv.kd_lokasi','left');
    return $this->db->order_by('inv.kd_inventaris', 'ASC')->get();
  }

  public function readByKd($kd)
  {
    $this->db->select('inv.*,lok.nm_lokasi,ktg.nm_kategori');
    $this->db->from('inventaris inv');
    $this->db->join('kategori ktg','ktg.kd_kategori = inv.kd_kategori','inner');
    $this->db->join('lokasi lok','lok.kd_lokasi = inv.kd_lokasi','left');
    $this->db->where('inv.kd_inventaris',$kd);
    return $this->db->order_by('inv.kd_inventaris', 'ASC')->get();
  }

  public function readByTipe($kd)
  {
    $this->db->select('inv.*,lok.nm_lokasi,ktg.nm_kategori');
    $this->db->from('inventaris inv');
    $this->db->join('kategori ktg','ktg.kd_kategori = inv.kd_kategori','inner');
    $this->db->join('lokasi lok','lok.kd_lokasi = inv.kd_lokasi','left');
    $this->db->where('inv.kd_kategori',$kd);
    return $this->db->order_by('inv.kd_inventaris', 'ASC')->get();
  }

  public function readByLokasi($kd)
  {
    $this->db->select('inv.*,lok.nm_lokasi,ktg.nm_kategori');
    $this->db->from('inventaris inv');
    $this->db->join('kategori ktg','ktg.kd_kategori = inv.kd_kategori','inner');
    $this->db->join('lokasi lok','lok.kd_lokasi = inv.kd_lokasi','left');
    $this->db->where('inv.kd_lokasi',$kd);
    return $this->db->order_by('inv.kd_inventaris', 'ASC')->get();
  }

}

?>
