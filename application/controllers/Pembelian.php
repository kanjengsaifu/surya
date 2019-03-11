<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

  var $data;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('PembelianModel');
    $this->load->model('SupplierModel');
    $this->load->model('BarangModel');
    $this->load->model('NotifikasiModel');
    $this->load->model('InvoicePembelian');
    global $data;
    $data['notif'] = $this->NotifikasiModel->get();
    $data['unread'] = $this->NotifikasiModel->unread();
    //Load Dependencies

  }

  // List all your items
  public function index()
  {
    global $data;
    // $data['purchase'] = $this->PembelianModel->get();
    $data['invoices'] = $this->InvoicePembelian->get();
    $data['title'] = 'Purchase';
    $data['active'] = 'daftarPembelian';
    $this->load->view('Components/header', $data);
    $this->load->view('Pembelian/index', $data);
    $this->load->view('Components/footer');
  }

  public function beli()
  {
    global $data;
    $data['title'] = 'Purchase';
    $data['active'] = 'tambahPembelian';
    $this->form_validation->set_rules('id_supplier', 'Supplier', 'required');
    $this->form_validation->set_rules('tanggal', 'Tanggal Pembelian', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == TRUE) {
      if ($id_invoice = $this->InvoicePembelian->tambah()->id_invoice) {
        redirect('pembelian/tambah/'.$id_invoice);
      }
    } else {
      $data['suppliers'] = $this->SupplierModel->get();
      $this->load->view('Components/header', $data);
      $this->load->view('Pembelian/beli', $data);
      $this->load->view('Components/footer');
    }
    
  }

  // Add a new item
  public function tambah($id_invoice)
  {
    global $data;
    $data['title'] = 'Purchase';
    $data['active'] = 'tambahPembelian';
    $data['id_invoice'] = $id_invoice;
    $data['purchases'] = $this->PembelianModel->get(FALSE, $id_invoice);
    $this->form_validation->set_rules('id_barang', 'Barang', 'required');
    $this->form_validation->set_rules('jumlah', 'Jumlah Barang', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
    
    if ($this->form_validation->run() == TRUE) {
      if ($this->PembelianModel->tambah($id_invoice)) {
        $this->BarangModel->ubahBarang($this->input->post('id_barang'), false, true);
        // $this->session->set_flashdata('success', 'Berhasil menambahkan catatan pembelian baru');
        // redirect('pembelian','refresh');
        redirect('pembelian/tambah/'.$id_invoice);
      } else {
        $this->session->set_flashdata('failed', 'Gagal menambahkan catatan pembelian baru');
      }
    } else {
      $data['suppliers'] = $this->SupplierModel->get();
      $data['items'] = $this->BarangModel->getBarang();
      $this->load->view('Components/header', $data);
      $this->load->view('Pembelian/tambah', $data);
      $this->load->view('Components/footer');
    }
  }

  public function detail($id_invoice)
  {
    global $data;
    $data['purchases'] = $this->PembelianModel->get(FALSE, $id_invoice);
    $data['invoice'] = $this->InvoicePembelian->get($id_invoice);
    $data['title'] = 'Detail Pembelian';
    $data['active'] = 'daftarPembelian';
    $this->load->view('Components/header', $data);
    $this->load->view('Pembelian/detail', $data);
    $this->load->view('Components/footer');
  }

  public function batal($id_invoice, $id_pembelian)
  {
    $purchase = $this->PembelianModel->get($id_pembelian);
    if ($this->PembelianModel->hapus($id_pembelian)) {
      // TODO: batal harusnya ngurangin stok bukan ngurangin
      $this->BarangModel->batalBeli($purchase['id_barang'], $purchase['jumlah']);
      redirect('pembelian/tambah/'.$id_invoice);
    }
  }

  //Delete one item
  public function hapus($id_invoice)
  {
    if ($this->InvoicePembelian->hapus($id_invoice)) {
      $this->session->set_flashdata('success', 'Berhasil menghapus catatan pembelian');
      redirect('pembelian','refresh');
    } else {
      $this->session->set_flashdata('failed', 'Gagal menghapus catatan pembelian');
      redirect('pembelian','refresh');
    }
  }

  //Update one item
  // DEPRECATED
  public function ubah($id)
  {
    global $data;
    $data['title'] = 'Edit Purchase';
    $data['purchase'] = $this->PembelianModel->get($id);

    $this->form_validation->set_rules('id_barang', 'Barang', 'required');
    $this->form_validation->set_rules('id_supplier', 'Supplier', 'required');
    $this->form_validation->set_rules('tanggal_pembelian', 'Tanggal Pembelian', 'required');
    $this->form_validation->set_rules('jumlah', 'Jumlah Barang', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == TRUE) {
      if ($this->PembelianModel->ubah($id)) {
        // TODO: handle perubahan stok
        $this->session->set_flashdata('success', 'Berhasil mengubah catatan pembelian');
        redirect('pembelian','refresh');
      } else {
        $this->session->set_flashdata('failed', 'Gagal mengubah catatan pembelian');
      }
    } else {
      $data['suppliers'] = $this->SupplierModel->get();
      $data['items'] = $this->BarangModel->getBarang();
      $this->load->view('Components/header', $data);
      $this->load->view('Pembelian/ubah', $data);
      $this->load->view('Components/footer');
    }
  }

}

/* End of file Pembelian.php */

