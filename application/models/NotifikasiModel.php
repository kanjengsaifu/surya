<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class NotifikasiModel extends CI_Model {

  public function get($id = FALSE)
  {
    if ($id) {
      $result = $this->db->get_where('notifikasi',array('id_notifikasi' => $id));
      return $result->row_array();
    } else {
      $this->db->select('notifikasi.*, barang.nama_barang');
      $this->db->from('notifikasi');
      $this->db->join('barang', 'notifikasi.id_barang = barang.id_barang', 'left');
      $result = $this->db->get();
      return $result->result_array();
    }
  }

  public function unread()
  {
    $this->db->select('notifikasi.*, barang.nama_barang');
    $this->db->from('notifikasi');
    $this->db->join('barang', 'notifikasi.id_barang = barang.id_barang', 'left');
    $this->db->where('notifikasi.terbaca', 0);
    $result = $this->db->get();
    return $result->result_array();
  }

  public function read($id)
  {
    $dt = $this->get($id);
    $data = array(
      'terbaca' => 1
    );
    $this->db->where('id_notifikasi', $id);
    if ($this->db->update('notifikasi', $data)) {
      return true;
    } else {
      return false;
    }
  }

  public function delete($id)
  {
    $this->db->where('id_notifikasi', $id);
    if ($this->db->delete('notifikasi')) {
      return true;
    } else {
      return false;
    }
  }

  public function new($id_barang)
  {
    $data = array(
      'id_notifikasi' => NULL,
      'id_barang' => $id_barang,
      'terbaca' => 0
    );

    if ($this->db->insert('notifikasi', $data)) {
      return true;
    } else {
      return false;
    }
    
  }

}

/* End of file NotifikasiModel.php */
