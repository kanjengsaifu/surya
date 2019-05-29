<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PembelianModel extends CI_Model {

  public function get($id = FALSE, $id_invoice = FALSE)
  {
    if ($id) {
      $this->db->select('*');
      $this->db->from('pembelian');
      $this->db->join('barang', 'pembelian.id_barang = barang.id_barang', 'left');
      $this->db->where('id_pembelian', $id);
      $results = $this->db->get();
      return $results->row_array();
    } else if ($id_invoice) {
      $this->db->select('pembelian.*, barang.id_barang, barang.stok, barang.harga_jual, barang.nama_barang');
      $this->db->from('pembelian');
      $this->db->join('barang', 'pembelian.id_barang = barang.id_barang', 'left');
      $this->db->where('id_invoice', $id_invoice);
      $results = $this->db->get();
      return $results->result_array();
    } else {
      $this->db->select('pembelian.*, barang.harga_jual, barang.nama_barang, supplier.nama_supplier');
      $this->db->from('pembelian');
      $this->db->join('barang', 'pembelian.id_barang = barang.id_barang', 'left');
      $this->db->join('supplier', 'pembelian.id_supplier = supplier.id_supplier', 'left');
      $results = $this->db->get();
      return $results->result_array();
    }
  }

  public function tambah($id_invoice)
  {
    $data = array(
      'id_pembelian' => NULL,
      'id_barang' => $this->input->post('id_barang'),
      'jumlah' => $this->input->post('jumlah'),
      'keterangan' => $this->input->post('keterangan'),
      'id_invoice' => $id_invoice
    );

    if ($this->db->insert('pembelian', $data)) {
      return $this->db->select('id_pembelian')->order_by('id_pembelian',"desc")->limit(1)->get('pembelian')->row();
    } else {
      return false;
    }
  }

  public function invoice($id_invoice)
  {
    $results =  $this->db->get_where('pembelian', array('id_invoice' => $id_invoice));
    return $results->result_array();
  }

  public function hapus($id)
  {
    $this->db->where('id_pembelian', $id);
    if ($this->db->delete('pembelian')) {
      return true;
    } else {
      return false;
    }
  }

  public function ubah($id)
  {
    $data = array(
      'id_pembelian' => $id,
      'id_barang' => $this->input->post('id_barang'),
      'id_supplier' => $this->input->post('id_supplier'),
      'tanggal_pembelian' => $this->input->post('tanggal_pembelian'),
      'jumlah' => $this->input->post('jumlah')
    );

    $this->db->where('id_pembelian', $id);
    if ($this->db->update('pembelian', $data)) {
      return true;
    } else {
      return false;
    }
  }

  public function pengeluaran()
  {
    $this->db->select('invoice_pembelian.*, supplier.nama_supplier, pembelian.*, barang.nama_barang, barang.harga_jual');
    $this->db->from('invoice_pembelian');
    $this->db->join('pembelian', 'invoice_pembelian.id_invoice = pembelian.id_invoice', 'left');
    $this->db->join('supplier', 'invoice_pembelian.id_supplier = supplier.id_supplier', 'left');
    $this->db->join('barang', 'pembelian.id_barang = barang.id_barang', 'left');
    
    $results = $this->db->get();
    return $results->result_array();
  }

}

/* End of file PembelianModel.php */
