<?php
/**
 * 
 */
class M_laporan extends CI_Model{
  
  function readAll()
  {
    $this->db->select('inv.*,ktg.nm_kategori,lok.nm_lokasi,lan.nm_lantai');
    $this->db->from('inventaris inv');
    $this->db->join('kategori ktg','ktg.kd_kategori = inv.kd_kategori','inner');
    $this->db->join('lokasi lok','lok.kd_lokasi = inv.kd_lokasi','inner');
    $this->db->join('lantai lan','lan.kd_lantai = lok.kd_lantai','inner');
    return $this->db->order_by('inv.kd_inventaris', 'ASC')->get();
  }

  // read berdasarkan id
  function readItem($tipe)
  { 
    $this->db->select('inv.*,ktg.nm_kategori,lok.nm_lokasi,lan.nm_lantai');
    $this->db->from('inventaris inv');
    $this->db->join('kategori ktg','ktg.kd_kategori = inv.kd_kategori','inner');
    $this->db->join('lokasi lok','lok.kd_lokasi = inv.kd_lokasi','inner');
    $this->db->join('lantai lan','lan.kd_lantai = lok.kd_lantai','inner');
    return $this->db->like('inv.kd_kategori',$tipe)->order_by('inv.kd_inventaris', 'ASC')->get();
  }

  function readLokasi($lokasi)
  {
    $this->db->select('inv.*,ktg.nm_kategori,lok.nm_lokasi,lan.nm_lantai');
    $this->db->from('inventaris inv');
    $this->db->join('kategori ktg','ktg.kd_kategori = inv.kd_kategori','inner');
    $this->db->join('lokasi lok','lok.kd_lokasi = inv.kd_lokasi','inner');
    $this->db->join('lantai lan','lan.kd_lantai = lok.kd_lantai','inner');
    return $this->db->where('inv.kd_lokasi',$lokasi)->order_by('inv.kd_inventaris', 'ASC')->get();
  }

  public function readTA() //fetch Tahun anggaran di table penempatan
  {
    return $this->db->distinct()->select('TA')->get('penempatan');
  }

  //READ PENEMPATAN
  public function readPenempatanAll()
  {
    $date = "DATE_FORMAT(pen.tanggal, '%d/%m/%Y') AS tanggal";
    $this->db->select('pen.TA,'.$date.',dp.kd_inventaris,ktg.nm_kategori,inv.merk,inv.model,lok.nm_lokasi,lan.nm_lantai');
    $this->db->from('penempatan pen');
    $this->db->join('detil_penempatan dp','dp.kd_penempatan = pen.kd_penempatan','inner');
    $this->db->join('inventaris inv','inv.kd_inventaris = dp.kd_inventaris','inner');
    $this->db->join('kategori ktg','ktg.kd_kategori = inv.kd_kategori','inner');
    $this->db->join('lokasi lok','lok.kd_lokasi = inv.kd_lokasi','inner');
    $this->db->join('lantai lan','lan.kd_lantai = lok.kd_lantai','inner');
    return $this->db->order_by('pen.TA', 'ASC')->get();
  }
  
  public function readPenempatanTa($ta) //fetch data penempatan berdasarkan TA sadja
  {
    $date = "DATE_FORMAT(pen.tanggal, '%d/%m/%Y') AS tanggal";
    $this->db->select('pen.TA,'.$date.',dp.kd_inventaris,ktg.nm_kategori,inv.merk,inv.model,lok.nm_lokasi,lan.nm_lantai');
    $this->db->from('penempatan pen');
    $this->db->join('detil_penempatan dp','dp.kd_penempatan = pen.kd_penempatan','inner');
    $this->db->join('inventaris inv','inv.kd_inventaris = dp.kd_inventaris','inner');
    $this->db->join('kategori ktg','ktg.kd_kategori = inv.kd_kategori','inner');
    $this->db->join('lokasi lok','lok.kd_lokasi = inv.kd_lokasi','inner');
    $this->db->join('lantai lan','lan.kd_lantai = lok.kd_lantai','inner');
    $this->db->where('pen.TA',$ta);
    return $this->db->order_by('pen.TA', 'ASC')->get();
  }

  public function readPenempatanTipe($ta,$tipe) //fetch data penempatan berdasarkan TA dan Tipe
  {
    $date = "DATE_FORMAT(pen.tanggal, '%d/%m/%Y') AS tanggal";
    $this->db->select('pen.TA,'.$date.',dp.kd_inventaris,ktg.nm_kategori,inv.merk,inv.model,lok.nm_lokasi,lan.nm_lantai');
    $this->db->from('penempatan pen');
    $this->db->join('detil_penempatan dp','dp.kd_penempatan = pen.kd_penempatan','inner');
    $this->db->join('inventaris inv','inv.kd_inventaris = dp.kd_inventaris','inner');
    $this->db->join('kategori ktg','ktg.kd_kategori = inv.kd_kategori','inner');
    $this->db->join('lokasi lok','lok.kd_lokasi = inv.kd_lokasi','inner');
    $this->db->join('lantai lan','lan.kd_lantai = lok.kd_lantai','inner');
    $this->db->where('pen.TA',$ta);
    $this->db->like('dp.kd_inventaris',$tipe,'after');
    return $this->db->order_by('pen.TA', 'ASC')->get();
  }

  public function readPenempatanLok($ta,$lokasi) //fetch data penempatan berdasarkan TA dan Lokasi
  {
    $date = "DATE_FORMAT(pen.tanggal, '%d/%m/%Y') AS tanggal";
    $this->db->select('pen.TA,'.$date.',dp.kd_inventaris,ktg.nm_kategori,inv.merk,inv.model,lok.nm_lokasi,lan.nm_lantai');
    $this->db->from('penempatan pen');
    $this->db->join('detil_penempatan dp','dp.kd_penempatan = pen.kd_penempatan','inner');
    $this->db->join('inventaris inv','inv.kd_inventaris = dp.kd_inventaris','inner');
    $this->db->join('kategori ktg','ktg.kd_kategori = inv.kd_kategori','inner');
    $this->db->join('lokasi lok','lok.kd_lokasi = inv.kd_lokasi','inner');
    $this->db->join('lantai lan','lan.kd_lantai = lok.kd_lantai','inner');
    $this->db->where('pen.TA',$ta);
    $this->db->where('inv.kd_lokasi',$lokasi);
    return $this->db->order_by('pen.TA', 'ASC')->get();
  }

  //READ MUTASI
  public function readMutasiAll()
  {
    $date = "DATE_FORMAT(mut.tanggal, '%d/%m/%Y') AS tanggal";
    $this->db->select('mut.kd_mutasi,mut.TA,'. $date .',inv.kd_inventaris,inv.merk,inv.model,lok.nm_lokasi lokasi_asal,lek.nm_lokasi lokasi_tujuan');
    $this->db->from('mutasi mut');
    $this->db->join('lokasi lok', 'lok.kd_lokasi = mut.kd_lokasi_lama', 'inner');
    $this->db->join('lokasi lek', 'lek.kd_lokasi = mut.kd_lokasi_baru', 'inner');
    $this->db->join('inventaris inv', 'inv.kd_inventaris = mut.kd_inventaris', 'inner');
    return $this->db->order_by('mut.kd_mutasi', 'ASC')->get();
  }

  public function readMutasiTa($ta)
  {
    $date = "DATE_FORMAT(mut.tanggal, '%d/%m/%Y') AS tanggal";
    $this->db->select('mut.kd_mutasi,mut.TA,'. $date .',inv.kd_inventaris,inv.merk,inv.model,lok.nm_lokasi lokasi_asal,lek.nm_lokasi lokasi_tujuan');
    $this->db->from('mutasi mut');
    $this->db->join('lokasi lok', 'lok.kd_lokasi = mut.kd_lokasi_lama', 'inner');
    $this->db->join('lokasi lek', 'lek.kd_lokasi = mut.kd_lokasi_baru', 'inner');
    $this->db->join('inventaris inv', 'inv.kd_inventaris = mut.kd_inventaris', 'inner');
    $this->db->where('mut.TA',$ta);
    return $this->db->order_by('mut.kd_mutasi', 'ASC')->get();
  }

  public function readMutasiTipe($ta,$tipe)
  {
    $date = "DATE_FORMAT(mut.tanggal, '%d/%m/%Y') AS tanggal";
    $this->db->select('mut.kd_mutasi,mut.TA,'. $date .',inv.kd_inventaris,inv.merk,inv.model,lok.nm_lokasi lokasi_asal,lek.nm_lokasi lokasi_tujuan');
    $this->db->from('mutasi mut');
    $this->db->join('lokasi lok', 'lok.kd_lokasi = mut.kd_lokasi_lama', 'inner');
    $this->db->join('lokasi lek', 'lek.kd_lokasi = mut.kd_lokasi_baru', 'inner');
    $this->db->join('inventaris inv', 'inv.kd_inventaris = mut.kd_inventaris', 'inner');
    $this->db->where('mut.TA',$ta);
    $this->db->like('mut.kd_inventaris',$tipe,'after');
    return $this->db->order_by('mut.kd_mutasi', 'ASC')->get();
  }

  public function readMutasiLok($ta,$lokasi)
  {
    $date = "DATE_FORMAT(mut.tanggal, '%d/%m/%Y') AS tanggal";
    $this->db->select('mut.kd_mutasi,mut.TA,'. $date .',inv.kd_inventaris,inv.merk,inv.model,lok.nm_lokasi lokasi_asal,lek.nm_lokasi lokasi_tujuan');
    $this->db->from('mutasi mut');
    $this->db->join('lokasi lok', 'lok.kd_lokasi = mut.kd_lokasi_lama', 'inner');
    $this->db->join('lokasi lek', 'lek.kd_lokasi = mut.kd_lokasi_baru', 'inner');
    $this->db->join('inventaris inv', 'inv.kd_inventaris = mut.kd_inventaris', 'inner');
    $this->db->where('mut.TA',$ta);
    $this->db->where('mut.kd_lokasi_lama',$lokasi);
    return $this->db->order_by('mut.kd_mutasi', 'ASC')->get();
  }

    //INVENTARIS
  public function readInvAll()
  {
    $this->db->select('inv.*,lok.nm_lokasi,ktg.nm_kategori');
    $this->db->from('inventaris inv');
    $this->db->join('kategori ktg','ktg.kd_kategori = inv.kd_kategori','inner');
    $this->db->join('lokasi lok','lok.kd_lokasi = inv.kd_lokasi','left');
    return $this->db->order_by('inv.kd_inventaris', 'ASC')->get();
  }

  public function readInvBy($filter,$val)
  {
    
    $this->db->select('inv.*,lok.nm_lokasi,ktg.nm_kategori');
    $this->db->from('inventaris inv');
    $this->db->join('kategori ktg','ktg.kd_kategori = inv.kd_kategori','inner');
    $this->db->join('lokasi lok','lok.kd_lokasi = inv.kd_lokasi','left');
    switch ($filter) {
        case 'kd':
            $this->db->where('inv.kd_inventaris',$val);
            break;
        case 'tipe':
            $this->db->where('inv.kd_kategori', $val);
            break;
        case 'lokasi':
            $this->db->where('inv.kd_lokasi',$val);
            break;
        default:
            # code...
            break;
    }
    return $this->db->order_by('inv.kd_inventaris', 'ASC')->get();
  }

}

?>
