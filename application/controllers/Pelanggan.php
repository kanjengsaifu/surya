<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

  var $data;
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('PelangganModel');
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
    $data['customers'] = $this->PelangganModel->get();
    $data['title'] = 'Customers';
    $data['active'] = 'daftarPelanggan';
    $this->load->view('Components/header', $data);
    $this->load->view('Pelanggan/index', $data);        
    $this->load->view('Components/footer');
  }
  
  // Add a new item
  public function tambah()
  {
    global $data;
    $data['title'] = 'Add Customer';
    $data['active'] = 'tambahPelanggan';
    $this->form_validation->set_rules('nama_customer', 'Nama Customer', 'required');
    $this->form_validation->set_rules('alamat_customer', 'Alamat Customer', 'required');
    $this->form_validation->set_rules('telp_customer', 'Telepon Customer', 'required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
    
    
    if ($this->form_validation->run() == TRUE) {
      if ($this->PelangganModel->tambah()) {
        $this->session->set_flashdata('success', 'Berhasil menambahkan pelanggan baru');
        redirect('pelanggan','refresh');
      } else {
        $this->session->set_flashdata('failed', 'Gagal menambahkan pelanggan baru');
      }
    } else {
      $this->load->view('Components/header', $data);
      $this->load->view('Pelanggan/tambah', $data);        
      $this->load->view('Components/footer');
    }
    
  }
  
  //Delete one item
  public function hapus($id)
  {
    if ($this->PelangganModel->hapus($id)) {
      $this->session->set_flashdata('success', 'Berhasil menghapus pelanggan');
      redirect('pelanggan','refresh');
    } else {
      $this->session->set_flashdata('failed', 'Gagal menghapus pelanggan');
      redirect('pelanggan','refresh');
    }
  }
  
  //Update one item
  public function ubah($id)
  {
    global $data;
    $data['title'] = 'Add Customer';
    $data['active'] = 'daftarPelanggan';
    $data['customer'] = $this->PelangganModel->get($id);
    $this->form_validation->set_rules('nama_customer', 'Nama Customer', 'required');
    $this->form_validation->set_rules('alamat_customer', 'Alamat Customer', 'required');
    $this->form_validation->set_rules('telp_customer', 'Telepon Customer', 'required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
    
    
    if ($this->form_validation->run() == TRUE) {
      if ($this->PelangganModel->ubah($id)) {
        $this->session->set_flashdata('success', 'Berhasil mengubah pelanggan');
        redirect('pelanggan','refresh');
      } else {
        $this->session->set_flashdata('failed', 'Gagal mengubah pelanggan');
      }
    } else {
      $this->load->view('Components/header', $data);
      $this->load->view('Pelanggan/ubah', $data);        
      $this->load->view('Components/footer');
    }
  }
  
}

/* End of file User.php */

