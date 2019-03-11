<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PelangganModel extends CI_Model {
  
  public function get($id = FALSE)
  {
    if ($id) {
      $results = $this->db->get_where('customer', array('id_customer' => $id));
      return $results->row_array();
    } else {
      $results = $this->db->get('customer');
      return $results->result_array();
    }
  }
  
  public function tambah()
  {
    $data = array(
      'id_customer' => NULL,
      'nama_customer' => $this->input->post('nama_customer'),
      'alamat_customer' => $this->input->post('alamat_customer'),
      'telp_customer' => $this->input->post('telp_customer'),
      'keterangan' => $this->input->post('keterangan')
    );
    
    if ($this->db->insert('customer', $data)) {
      return true;
    } else {
      return false;
    }
  }
  
  public function hapus($id)
  {
    $this->db->where('id_customer', $id);
    if ($this->db->delete('customer')) {
      return true;
    } else {
      return false;
    }
  }
  
  public function ubah($id)
  {
    $data = array(
      'id_customer' => $id,
      'nama_customer' => $this->input->post('nama_customer'),
      'alamat_customer' => $this->input->post('alamat_customer'),
      'telp_customer' => $this->input->post('telp_customer'),
      'keterangan' => $this->input->post('keterangan')
    );
    
    $this->db->where('id_customer', $id);
    if ($this->db->update('customer', $data)) {
      return true;
    } else {
      return false;
    }
  }
  
}

/* End of file PelangganModel.php */

