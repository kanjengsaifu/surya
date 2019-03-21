<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RekapGajiModel extends CI_Model {

  public function get($bulan = FALSE, $id_rekap = FALSE)
  {
    if ($id_rekap) {
      $tahun = date('Y');
      $this->db->select('*');
      $this->db->from('rekap_gaji');
      $this->db->join('karyawan', 'rekap_gaji.id_karyawan = karyawan.id_karyawan', 'left');
      $this->db->where(array('id_rekap' => $id_rekap));
      $results = $this->db->get();
      return $results->row_array();
    } else {
      $tahun = date('Y');
      $this->db->select('*');
      $this->db->from('rekap_gaji');
      $this->db->join('karyawan', 'rekap_gaji.id_karyawan = karyawan.id_karyawan', 'left');
      $this->db->where(array('bulan' => $bulan, 'tahun' => $tahun));
      $results = $this->db->get();
      return $results->result_array();
    }
  }

  public function hadir($id_karyawan)
  {
    $tahun = date('Y');
    $bulan = $this->month(date('m'));
    $data = $this->db->get_where('rekap_gaji', array(
      'id_karyawan' => $id_karyawan,
      'bulan' => $bulan,
      'tahun' => $tahun
    ));
    // die(json_encode($data->num_rows()));
    // Kalau datanya belum ada buat bulan ini
    if ($data->num_rows() == 0) {
      $data = array(
        'id_rekap' => NULL,
        'id_karyawan' => $id_karyawan,
        'bulan' => $bulan,
        'tahun' => $tahun,
        'presensi' => 1
      );
      
      if ($this->db->insert('rekap_gaji', $data)) {
        return TRUE;
      } else {
        return FALSE;
      }
    } else {
      // Kalau datanya udah ada, jadi nambahin
      $old = $data->row_array();
      $data = array(
        'id_rekap' => $old['id_rekap'],
        'presensi' => $old['presensi'] + 1
      );
  
      $this->db->where('id_rekap', $old['id_rekap']);
      if ($this->db->update('rekap_gaji', $data)) {
        return true;
      } else {
        return false;
      }
    }
  }

  public function ubah($id)
  {
    $data = array(
      'id_rekap' => $id,
      'presensi' => $this->input->post('presensi')
    );

    $this->db->where('id_rekap', $id);
    if ($this->db->update('rekap_gaji', $data)) {
      return true;
    } else {
      return false;
    }
  }

  private function month($angka) {
    switch($angka) {
      case 1:
        return 'januari';
      case 2:
        return 'februari';
      case 3:
        return 'maret';
      case 4:
        return 'april';
      case 5:
        return 'mei';
      case 6:
        return 'juni';
      case 7:
        return 'juli';
      case 8:
        return 'agustus';
      case 9:
        return 'september';
      case 10:
        return 'oktober';
      case 11:
        return 'november';
      case 12:
        return 'desember';
      default:
        die('error');
    }
  }

}

/* End of file RekapGajiModel.php */
