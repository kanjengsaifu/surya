<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

  var $data;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('PenjualanModel');
    $this->load->model('PelangganModel');
    $this->load->model('BarangModel');
    $this->load->model('NotifikasiModel');
    $this->load->model('InvoiceModel');
    global $data;
    $data['notif'] = $this->NotifikasiModel->get();
    $data['unread'] = $this->NotifikasiModel->unread();
    //Load Dependencies

  }

  // List all your items
  public function index()
  {
    global $data;
    $data['active'] = 'daftarPenjualan';
    // $data['sales'] = $this->PenjualanModel->get();
    $data['invoices'] = $this->InvoiceModel->get();
    $data['title'] = 'Sales';
    $this->load->view('Components/header', $data);
    $this->load->view('Penjualan/index', $data);
    $this->load->view('Components/footer');
  }

  public function jual()
  {
    global $data;
    $data['title'] = 'Sale';
    $data['active'] = 'tambahPenjualan';
    $this->form_validation->set_rules('id_customer', 'Customer', 'required');
    $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == TRUE) {
      if ($id_invoice = $this->InvoiceModel->tambah()->id_invoice) {
        redirect('penjualan/tambah/'.$id_invoice);
        // $this->tambah($id_invoice);
      }
    } else {
      $data['customers'] = $this->PelangganModel->get();
      $this->load->view('Components/header', $data);
      $this->load->view('Penjualan/jual', $data);
      $this->load->view('Components/footer');
    }
    
  }

  // Add a new item
  public function tambah($id_invoice)
  {
    global $data;
    $data['title'] = 'Sale';
    $data['id_invoice'] = $id_invoice;
    $data['active'] = 'tambahPenjualan';
    $data['sales'] = $this->PenjualanModel->get(FALSE, $id_invoice);
    $this->form_validation->set_rules('id_barang', 'Barang', 'required');
    $this->form_validation->set_rules('jumlah', 'Jumlah Barang', 'required');
    $this->form_validation->set_rules('keterangan', 'Keterangan Barang', 'required');
    $this->form_validation->set_rules('stok', 'Stok Barang');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
    
    if ($this->form_validation->run() == TRUE) {
      if ($id = $this->PenjualanModel->tambah($id_invoice)) {
        $stok = $this->BarangModel->ubahBarang($this->input->post('id_barang'), true);
        if ($stok < 5) {
          $this->NotifikasiModel->new($this->input->post('id_barang'));
        }
        redirect('penjualan/tambah/'.$id_invoice);
      } else {
        $this->session->set_flashdata('failed', 'Gagal menambahkan catatan penjualan baru');
      }
    } else {
      $data['customers'] = $this->PelangganModel->get();
      $data['items'] = $this->BarangModel->getBarang();
      $this->load->view('Components/header', $data);
      $this->load->view('Penjualan/tambah', $data);
      $this->load->view('Components/footer');
    }
  }

  public function detail($id_invoice)
  {
    global $data;
    $data['sales'] = $this->PenjualanModel->get(FALSE, $id_invoice);
    $data['invoice'] = $this->InvoiceModel->get($id_invoice);
    $data['title'] = 'Detail Penjualan';
    $data['active'] = 'daftarPenjualan';
    $this->load->view('Components/header', $data);
    $this->load->view('Penjualan/detail', $data);
    $this->load->view('Components/footer');
  }

  public function batal($id_invoice, $id_penjualan)
  {
    $sale = $this->PenjualanModel->get($id_penjualan);
    if ($this->PenjualanModel->hapus($id_penjualan)) {
      $this->BarangModel->batal($sale['id_barang'], $sale['jumlah']);
      redirect('penjualan/tambah/'.$id_invoice);
    }
  }

  //Delete one item
  public function hapus($id_invoice)
  {
    if ($this->InvoiceModel->hapus($id_invoice)) {
      $this->session->set_flashdata('success', 'Berhasil menghapus invoice');
      redirect('penjualan','refresh');
    } else {
      $this->session->set_flashdata('failed', 'Gagal menghapus invoice');
      redirect('penjualan','refresh');
    }
  }

  // Update one item
  // DEPRECATED
  public function ubah($id)
  {
    global $data;
    $data['title'] = 'Edit Sale';
    $data['sale'] = $this->PenjualanModel->get($id);
    $this->form_validation->set_rules('id_customer', 'Pembeli', 'required');
    $this->form_validation->set_rules('id_barang', 'Barang', 'required');
    $this->form_validation->set_rules('jumlah', 'Jumlah Barang', 'required');
    $this->form_validation->set_rules('keterangan', 'Keterangan Barang', 'required');
    $this->form_validation->set_rules('tanggal_penjualan', 'Tanggal Penjualan', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == TRUE) {
      if ($this->PenjualanModel->ubah($id)) {
        // TODO: handle perubahan stok
        $this->session->set_flashdata('success', 'Berhasil mengubah catatan penjualan');
        redirect('penjualan','refresh');
      } else {
        $this->session->set_flashdata('failed', 'Gagal mengubah catatan penjualan');
      }
    } else {
      $data['customers'] = $this->PelangganModel->get();
      $data['items'] = $this->BarangModel->getBarang();
      $this->load->view('Components/header', $data);
      $this->load->view('Penjualan/ubah', $data);
      $this->load->view('Components/footer');
    }
  }

  public function laporanHarian()
  {
    $data['salaries'] = $this->PenjualanModel->laporanHarian($this->input->post('tanggal'));
    $data['tanggal'] = $this->input->post('tanggal');
    $this->load->view('Penjualan/laporanHarian', $data);
  }

  public function cetakInvoice($id_invoice)
  {
    global $data;
    $data['sales'] = $this->PenjualanModel->get(FALSE, $id_invoice);
    $data['invoice'] = $this->InvoiceModel->get($id_invoice);
    $this->load->view('Penjualan/invoice', $data);
  }

  public function suratJalan($id_invoice)
  {
    global $data;
    $data['sales'] = $this->PenjualanModel->get(FALSE, $id_invoice);
    $data['invoice'] = $this->InvoiceModel->get($id_invoice);
    $this->load->view('Penjualan/suratJalan', $data);
  }

}

/* End of file Penjualan.php */

