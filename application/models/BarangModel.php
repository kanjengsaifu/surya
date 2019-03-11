<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BarangModel extends CI_Model {
  
  // *********************************************************************
  public function getBarang($id = FALSE)
  {
    if ($id) {
      $results = $this->db->get_where('barang', array('id_barang' => $id));
      return $results->row_array();
    } else {
      $this->db->select('*');
      $this->db->from('barang');
      $this->db->join('kategori', 'barang.id_kategori = kategori.id_kategori', 'left');
      $this->db->join('merek', 'barang.id_merek = merek.id_merek', 'left');
      $this->db->join('satuan', 'barang.id_satuan = satuan.id_satuan', 'left');
      $results = $this->db->get();
      return $results->result_array();
    }
  }
  
  public function tambahBarang()
  {
    $data = array(
      'id_barang' => NULL,
      'nama_barang' => $this->input->post('nama_barang'),
      'stok' => $this->input->post('stok'),
      'harga_beli' => $this->input->post('harga_beli'),
      'harga_jual' => $this->input->post('harga_jual'),
      'keterangan' => $this->input->post('keterangan'),
      'id_kategori' => $this->input->post('id_kategori'),
      'id_merek' => $this->input->post('id_merek'),
      'id_satuan' => $this->input->post('id_satuan')
    );
    
    if ($this->db->insert('barang', $data)) {
      return true;
    } else {
      return false;
    }
  }
  
  public function hapusBarang($id)
  {
    $this->db->where('id_barang', $id);
    if ($this->db->delete('barang')) {
      return true;
    } else {
      return false;
    }
  }

  public function batal($id_barang, $jumlah)
  {
    $barang = $this->getBarang($id_barang);
    $data = array(
      'stok' => $barang['stok'] + $jumlah
    );

    $this->db->where('id_barang', $id_barang);
    if ($this->db->update('barang', $data)) {
      return true;
    } else {
      return false;
    }
  }

  public function batalBeli($id_barang, $jumlah)
  {
    $barang = $this->getBarang($id_barang);
    $data = array(
      'stok' => $barang['stok'] - $jumlah
    );

    $this->db->where('id_barang', $id_barang);
    if ($this->db->update('barang', $data)) {
      return true;
    } else {
      return false;
    }
  }
  
  public function ubahBarang($id, $penjualan = FALSE, $pembelian = FALSE)
  {
    if ($penjualan) {
      $dt = $this->getBarang($this->input->post('id_barang'));
      $stok = $dt['stok'] - $this->input->post('jumlah');
      $data = array(
        'id_barang' => $id,
        'stok' => $stok
      );

      $this->db->where('id_barang', $id);
      if ($this->db->update('barang', $data)) {
        return $stok;
      } else {
        return false;
      }
    } else if ($pembelian) {
      $dt = $this->getBarang($this->input->post('id_barang'));
      $stok = $dt['stok'] + $this->input->post('jumlah');
      $data = array(
        'id_barang' => $id,
        'stok' => $stok
      );

      $this->db->where('id_barang', $id);
      if ($this->db->update('barang', $data)) {
        return true;
      } else {
        return false;
      }
    } else {
      $data = array(
        'id_barang' => $id,
        'nama_barang' => $this->input->post('nama_barang'),
        'stok' => $this->input->post('stok'),
        'harga_beli' => $this->input->post('harga_beli'),
        'harga_jual' => $this->input->post('harga_jual'),
        'keterangan' => $this->input->post('keterangan'),
        'id_kategori' => $this->input->post('id_kategori'),
        'id_merek' => $this->input->post('id_merek'),
        'id_satuan' => $this->input->post('id_satuan')
      );
      
      $this->db->where('id_barang', $id);
      if ($this->db->update('barang', $data)) {
        return true;
      } else {
        return false;
      }
    }
  }
  
  // *********************************************************************
  public function getKategori($id = FALSE)
  {
    if ($id) {
      $results = $this->db->get_where('kategori', array('id_kategori' => $id));
      return $results->row_array();
    } else {
      $results = $this->db->get('kategori');
      return $results->result_array();
    }
  }
  
  public function tambahKategori()
  {
    $data = array(
      'id_kategori' => NULL,
      'nama_kategori' => $this->input->post('nama_kategori')
    );
    
    if ($this->db->insert('kategori', $data)) {
      return true;
    } else {
      return false;
    }
  }
  
  public function hapusKategori($id)
  {
    $this->db->where('id_kategori', $id);
    if ($this->db->delete('kategori')) {
      return true;
    } else {
      return false;
    }
  }
  
  public function ubahKategori($id)
  {
    $data = array(
      'id_kategori' => $id,
      'nama_kategori' => $this->input->post('nama_kategori')
    );
    
    $this->db->where('id_kategori', $id);
    if ($this->db->update('kategori', $data)) {
      return true;
    } else {
      return false;
    }
  }
  
  // *********************************************************************
  public function getMerek($id = FALSE)
  {
    if ($id) {
      $results = $this->db->get_where('merek', array('id_merek' => $id));
      return $results->row_array();
    } else {
      $results = $this->db->get('merek');
      return $results->result_array();
    }
  }
  
  public function tambahMerek()
  {
    $data = array(
      'id_merek' => NULL,
      'nama_merek' => $this->input->post('nama_merek')
    );
    
    if ($this->db->insert('merek', $data)) {
      return true;
    } else {
      return false;
    }
  }
  
  public function hapusMerek($id)
  {
    $this->db->where('id_merek', $id);
    if ($this->db->delete('merek')) {
      return true;
    } else {
      return false;
    }
  }
  
  public function ubahMerek($id)
  {
    $data = array(
      'id_merek' => $id,
      'nama_merek' => $this->input->post('nama_merek')
    );
    
    $this->db->where('id_merek', $id);
    if ($this->db->update('merek', $data)) {
      return true;
    } else {
      return false;
    }
  }
  
  // *********************************************************************
  public function getSatuan($id = FALSE)
  {
    if ($id) {
      $results = $this->db->get_where('satuan', array('id_satuan' => $id));
      return $results->row_array();
    } else {
      $results = $this->db->get('satuan');
      return $results->result_array();
    }
  }
  
  public function tambahSatuan()
  {
    $data = array(
      'id_satuan' => NULL,
      'nama_satuan' => $this->input->post('nama_satuan')
    );
    
    if ($this->db->insert('satuan', $data)) {
      return true;
    } else {
      return false;
    }
  }
  
  public function hapusSatuan($id)
  {
    $this->db->where('id_satuan', $id);
    if ($this->db->delete('satuan')) {
      return true;
    } else {
      return false;
    }
  }
  
  public function ubahSatuan($id)
  {
    $data = array(
      'id_satuan' => $id,
      'nama_satuan' => $this->input->post('nama_satuan')
    );
    
    $this->db->where('id_satuan', $id);
    if ($this->db->update('satuan', $data)) {
      return true;
    } else {
      return false;
    }
  }
  
}

/* End of file BarangModel.php */
