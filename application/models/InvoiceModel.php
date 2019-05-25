<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InvoiceModel extends CI_Model {

  public function tambah()
  {
    $data = array(
      'id_invoice' => NULL,
      'id_customer' => $this->input->post('id_customer'),
      'tanggal' => $this->input->post('tanggal')
    );

    if ($this->db->insert('invoice_penjualan', $data)) {
      return $this->db->select('id_invoice')->order_by('id_invoice',"desc")->limit(1)->get('invoice_penjualan')->row();
    } else {
      return false;
    }
  }

  public function get($id = FALSE)
  {
    if ($id) {
      $this->db->select('*');
      $this->db->from('invoice_penjualan');
      $this->db->join('customer', 'invoice_penjualan.id_customer = customer.id_customer', 'left');
      $this->db->where('id_invoice', $id);
      $results = $this->db->get();
      return $results->row_array();
    } else {
      $this->db->select('*');
      $this->db->from('invoice_penjualan');
      $this->db->join('customer', 'invoice_penjualan.id_customer = customer.id_customer', 'left');
      $results = $this->db->get();
      return $results->result_array();
    }
  }

  public function hapus($id)
  {
    $this->db->where('id_invoice', $id);
    if ($this->db->delete('invoice_penjualan')) {
      return true;
    } else {
      return false;
    }
  }

  public function pemasukan()
  {
    $this->db->select('invoice_penjualan.*, customer.nama_customer, penjualan.*, barang.nama_barang, barang.harga_beli');
    $this->db->from('invoice_penjualan');
    $this->db->join('penjualan', 'invoice_penjualan.id_invoice = penjualan.id_invoice', 'left');
    $this->db->join('customer', 'invoice_penjualan.id_customer = customer.id_customer', 'left');
    $this->db->join('barang', 'penjualan.id_barang = barang.id_barang', 'left');
    
    $results = $this->db->get();
    return $results->result_array();
  }

}

/* End of file InvoiceModel.php */
