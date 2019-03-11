<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class InvoicePembelian extends CI_Model {

  public function tambah()
  {
    $data = array(
      'id_invoice' => NULL,
      'id_supplier' => $this->input->post('id_supplier'),
      'tanggal' => $this->input->post('tanggal')
    );

    if ($this->db->insert('invoice_pembelian', $data)) {
      return $this->db->select('id_invoice')->order_by('id_invoice',"desc")->limit(1)->get('invoice_pembelian')->row();
    } else {
      return false;
    }
  }

  public function get($id = FALSE)
  {
    if ($id) {
      $this->db->select('*');
      $this->db->from('invoice_pembelian');
      $this->db->join('supplier', 'invoice_pembelian.id_supplier = supplier.id_supplier', 'left');
      $this->db->where('id_invoice', $id);
      $results = $this->db->get();
      return $results->row_array();
    } else {
      $this->db->select('*');
      $this->db->from('invoice_pembelian');
      $this->db->join('supplier', 'invoice_pembelian.id_supplier = supplier.id_supplier', 'left');
      $results = $this->db->get();
      return $results->result_array();
    }
  }

  public function hapus($id)
  {
    $this->db->where('id_invoice', $id);
    if ($this->db->delete('invoice_pembelian')) {
      return true;
    } else {
      return false;
    }
  }

}

/* End of file InvoiceModel.php */
