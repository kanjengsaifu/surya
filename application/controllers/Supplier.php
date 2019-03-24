<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

  var $data;
  
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('status') == 1) {
      $this->session->set_flashdata('failed', 'Anda tidak memiliki akses ke halaman tersebut');
      redirect('penjualan');
    }
    $this->load->model('SupplierModel');
    $this->load->model('NotifikasiModel');
    global $data;
    $data['notif'] = $this->NotifikasiModel->get();
    $data['unread'] = $this->NotifikasiModel->unread();
    //Load Dependencies
    
  }
  
  // List all your items
  public function index()
  {
    global $data;
    $data['suppliers'] = $this->SupplierModel->get();
    $data['title'] = 'Suppliers';
    $data['active'] = 'daftarSupplier';
    $this->load->view('Components/header', $data);
    $this->load->view('Supplier/index', $data);
    $this->load->view('Components/footer');
  }
  
  // Add a new item
  public function tambah()
  {
    global $data;
    $data['title'] = 'Add Supplier';
    $data['active'] = 'tambahSupplier';
    $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required');
    $this->form_validation->set_rules('alamat_supplier', 'Alamat Supplier', 'required');
    $this->form_validation->set_rules('telp_supplier', 'Telp Supplier', 'required');
    $this->form_validation->set_rules('no_rekening_supplier', 'No Rekening Supplier', 'required');
    $this->form_validation->set_rules('nama_bank', 'Nama bank', 'required');
    $this->form_validation->set_rules('fax_supplier', 'Fax Supplier', 'required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
    
    if ($this->form_validation->run() == TRUE) {
      if ($this->SupplierModel->tambah()) {
        $this->session->set_flashdata('success', 'Berhasil menambahkan supplier baru');
        redirect('supplier','refresh');
      } else {
        $this->session->set_flashdata('failed', 'Gagal menambahkan supplier baru');
      }
    } else {
      $this->load->view('Components/header', $data);
      $this->load->view('Supplier/tambah', $data);
      $this->load->view('Components/footer');
    }
  }

  //Delete one item
  public function hapus($id)
  {
    if ($this->SupplierModel->hapus($id)) {
      $this->session->set_flashdata('success', 'Berhasil menghapus supplier');
      redirect('supplier','refresh');
    } else {
      $this->session->set_flashdata('failed', 'Gagal menghapus supplier');
      redirect('supplier','refresh');
    }
  }
  
  //Update one item
  public function ubah($id)
  {
    global $data;
    $data['title'] = 'Edit Supplier';
    $data['active'] = 'daftarSupplier';
    $data['supplier'] = $this->SupplierModel->get($id);
    $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required');
    $this->form_validation->set_rules('alamat_supplier', 'Alamat Supplier', 'required');
    $this->form_validation->set_rules('telp_supplier', 'Telp Supplier', 'required');
    $this->form_validation->set_rules('no_rekening_supplier', 'No Rekening Supplier', 'required');
    $this->form_validation->set_rules('nama_bank', 'Nama bank', 'required');
    $this->form_validation->set_rules('fax_supplier', 'Fax Supplier', 'required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == TRUE) {
      if ($this->SupplierModel->ubah($id)) {
        $this->session->set_flashdata('success', 'Berhasil mengubah supplier');
        redirect('supplier','refresh');
      } else {
        $this->session->set_flashdata('failed', 'Gagal mengubah supplier');
      }
    } else {
      $this->load->view('Components/header', $data);
      $this->load->view('Supplier/ubah', $data);
      $this->load->view('Components/footer');
    }
  }
  
}

/* End of file Suplier.php */

