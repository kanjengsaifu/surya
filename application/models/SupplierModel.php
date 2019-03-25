<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class SupplierModel extends CI_Model {

  public function get($id = FALSE)
  {
    if ($id) {
      $results = $this->db->get_where('supplier', array('id_supplier' => $id));
      return $results->row_array();
    } else {
      $results = $this->db->get('supplier');
      return $results->result_array();
    }
  }

  public function tambah()
  {
    $data = array(
      'id_supplier' => NULL,
      'nama_supplier' => $this->input->post('nama_supplier'),
      'alamat_supplier' => $this->input->post('alamat_supplier'),
      'telp_supplier' => $this->input->post('telp_supplier'),
      'no_rekening_supplier' => $this->input->post('no_rekening_supplier'),
      'nama_bank' => $this->input->post('nama_bank'),
      'keterangan' => $this->input->post('keterangan')
    );

    if ($this->db->insert('supplier', $data)) {
      return true;
    } else {
      return false;
    }
  }

  public function hapus($id)
  {
    $this->db->where('id_supplier', $id);
    if ($this->db->delete('supplier')) {
      return true;
    } else {
      return false;
    }
  }

  public function ubah($id)
  {
    $data = array(
      'id_supplier' => $id,
      'nama_supplier' => $this->input->post('nama_supplier'),
      'alamat_supplier' => $this->input->post('alamat_supplier'),
      'telp_supplier' => $this->input->post('telp_supplier'),
      'no_rekening_supplier' => $this->input->post('no_rekening_supplier'),
      'nama_bank' => $this->input->post('nama_bank'),
      'keterangan' => $this->input->post('keterangan')
    );

    $this->db->where('id_supplier', $id);
    if ($this->db->update('supplier', $data)) {
      return true;
    } else {
      return false;
    }
  }

}

/* End of file SupplierModel.php */
