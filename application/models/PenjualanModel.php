<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PenjualanModel extends CI_Model {

  public function get($id = FALSE, $id_invoice = FALSE)
  {
    if ($id) {
      // $results = $this->db->get_where('penjualan', array('id_penjualan' => $id));
      // return $results->row_array();
      $this->db->select('*');
      $this->db->from('penjualan');
      $this->db->join('barang', 'penjualan.id_barang = barang.id_barang', 'left');
      $this->db->where('id_penjualan', $id);
      $results = $this->db->get();
      return $results->row_array();
    } else if ($id_invoice) {
      $this->db->select('penjualan.*, barang.id_barang, barang.stok, barang.harga_beli, barang.nama_barang');
      $this->db->from('penjualan');
      $this->db->join('barang', 'penjualan.id_barang = barang.id_barang', 'left');
      $this->db->where('id_invoice', $id_invoice);
      $results = $this->db->get();
      return $results->result_array();
    } else {
      $this->db->select('penjualan.*, barang.harga_beli, barang.nama_barang, customer.nama_customer');
      $this->db->from('penjualan');
      $this->db->join('barang', 'penjualan.id_barang = barang.id_barang', 'left');
      $this->db->join('customer', 'penjualan.id_customer = customer.id_customer', 'left');
      $results = $this->db->get();
      return $results->result_array();
    }
  }

  public function tambah($id_invoice)
  {
    $data = array(
      'id_penjualan' => NULL,
      'keterangan' => $this->input->post('keterangan'),
      'jumlah' => $this->input->post('jumlah'),
      'id_barang' => $this->input->post('id_barang'),
      'id_invoice' => $id_invoice
    );

    if ($this->db->insert('penjualan', $data)) {
      return $this->db->select('id_penjualan')->order_by('id_penjualan',"desc")->limit(1)->get('penjualan')->row();
    } else {
      return false;
    }
  }

  public function invoice($id_invoice)
  {
    $results =  $this->db->get_where('penjualan', array('id_invoice' => $id_invoice));
    return $results->result_array();
  }

  public function hapus($id)
  {
    $this->db->where('id_penjualan', $id);
    if ($this->db->delete('penjualan')) {
      return true;
    } else {
      return false;
    }
  }

  public function ubah($id)
  {
    $data = array(
      'id_penjualan' => $id,
      'keterangan' => $this->input->post('keterangan'),
      'jumlah' => $this->input->post('jumlah'),
      'id_barang' => $this->input->post('id_barang'),
      'id_customer' => $this->input->post('id_customer'),
      'tanggal_penjualan' => $this->input->post('tanggal_penjualan')
    );

    $this->db->where('id_penjualan', $id);
    if ($this->db->update('penjualan', $data)) {
      return true;
    } else {
      return false;
    }
  }

}

/* End of file PenjualanModel.php */
