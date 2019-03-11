<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class KaryawanModel extends CI_Model {

  public function get($id = FALSE)
  {
    if ($id) {
      $results = $this->db->get_where('karyawan', array('id_karyawan' => $id));
      return $results->row_array();
    } else {
      $results = $this->db->get('karyawan');
      return $results->result_array();
    }
  }

  public function tambah()
  {
    $data = array(
      'id_karyawan' => NULL,
      'nama_karyawan' => $this->input->post('nama_karyawan'),
      'tempat_lahir' => $this->input->post('tempat_lahir'),
      'tanggal_lahir' => $this->input->post('tanggal_lahir'),
      'alamat_karyawan' => $this->input->post('alamat_karyawan'),
      'gaji_pokok' => $this->input->post('gaji_pokok')
    );

    if ($this->db->insert('karyawan', $data)) {
      return true;
    } else {
      return false;
    }
  }

  public function hapus($id)
  {
    $this->db->where('id_karyawan', $id);
    if ($this->db->delete('karyawan')) {
      return true;
    } else {
      return false;
    }
  }

  public function ubah($id)
  {
    $data = array(
      'id_karyawan' => $id,
      'nama_karyawan' => $this->input->post('nama_karyawan'),
      'tempat_lahir' => $this->input->post('tempat_lahir'),
      'tanggal_lahir' => $this->input->post('tanggal_lahir'),
      'alamat_karyawan' => $this->input->post('alamat_karyawan'),
      'gaji_pokok' => $this->input->post('gaji_pokok')
    );

    $this->db->where('id_karyawan', $id);
    if ($this->db->update('karyawan', $data)) {
      return true;
    } else {
      return false;
    }
  }

}

/* End of file KaryawanModel.php */
