<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PengeluaranModel extends CI_Model {

  public function get($id = FALSE)
  {
    if ($id) {
      $results = $this->db->get_where('pengeluaran', array('id_pengeluaran' => $id));
      return $results->row_array();
    } else {
      $results = $this->db->get('pengeluaran');
      return $results->result_array();
    }
  }

  public function tambah()
  {
    $data = array(
      'id_pengeluaran' => NULL,
      'nama_pengeluaran' => $this->input->post('nama_pengeluaran'),
      'jenis_pengeluaran' => $this->input->post('jenis_pengeluaran'),
      'total' => $this->input->post('total'),
      'tanggal' => $this->input->post('tanggal')
    );

    if ($this->db->insert('pengeluaran', $data)) {
      return true;
    } else {
      return false;
    }
  }

  public function hapus($id)
  {
    $this->db->where('id_pengeluaran', $id);
    if ($this->db->delete('pengeluaran')) {
      return true;
    } else {
      return false;
    }
  }

  public function ubah($id)
  {
    $data = array(
      'id_pengeluaran' => $id,
      'nama_pengeluaran' => $this->input->post('nama_pengeluaran'),
      'jenis_pengeluaran' => $this->input->post('jenis_pengeluaran'),
      'total' => $this->input->post('total'),
      'tanggal' => $this->input->post('tanggal')
    );

    $this->db->where('id_pengeluaran', $id);
    if ($this->db->update('pengeluaran', $data)) {
      return true;
    } else {
      return false;
    }
  }

  public function laporanHarian($tanggal)
  {
    $results = $this->db->get_where('pengeluaran', array('tanggal' => $tanggal));
    return $results->result_array();
  }

}

/* End of file PengeluaranModel.php */
