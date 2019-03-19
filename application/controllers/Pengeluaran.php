<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('PengeluaranModel');
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
    $data['active'] = 'daftarPengeluaran';
    $data['title'] = 'Expense';
    $data['expenses'] = $this->PengeluaranModel->get();
    $this->load->view('Components/header', $data);
    $this->load->view('Pengeluaran/index', $data);
    $this->load->view('Components/footer');
  }

  // Add a new item
  public function tambah()
  {
    global $data;
    $data['active'] = 'tambahPengeluaran';
    $data['title'] = 'Add Expense';
    $this->form_validation->set_rules('nama_pengeluaran', 'Nama Pengeluaran', 'required');
    $this->form_validation->set_rules('jenis_pengeluaran', 'Jenis Pengeluaran', 'required');
    $this->form_validation->set_rules('total', 'Total Pengeluaran', 'required');
    $this->form_validation->set_rules('tanggal', 'Tanggal Pengeluaran', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == TRUE) {
      if ($this->PengeluaranModel->tambah()) {
        $this->session->set_flashdata('success', 'Berhasil menambahkan data pengeluaran baru');
        redirect('pengeluaran','refresh');
      } else {
        $this->session->set_flashdata('failed', 'Gagal menambahkan data pengeluaran baru');
      }
    } else {
      $this->load->view('Components/header', $data);
      $this->load->view('Pengeluaran/tambah', $data);
      $this->load->view('Components/footer');
    }
  }

  //Delete one item
  public function hapus($id)
  {
    if ($this->PengeluaranModel->hapus($id)) {
      $this->session->set_flashdata('success', 'Berhasil menghapus data pengeluaran');
      redirect('pengeluaran','refresh');
    } else {
      $this->session->set_flashdata('failed', 'Gagal menghapus data pengeluaran');
      redirect('pengeluaran','refresh');
    }
  }

  //Update one item
  public function ubah($id)
  {
    global $data;
    $data['active'] = 'daftarPengeluaran';
    $data['title'] = 'Change Expense';
    $data['expense'] = $this->PengeluaranModel->get($id);
    $this->form_validation->set_rules('nama_pengeluaran', 'Nama Pengeluaran', 'required');
    $this->form_validation->set_rules('jenis_pengeluaran', 'Jenis Pengeluaran', 'required');
    $this->form_validation->set_rules('total', 'Total Pengeluaran', 'required');
    $this->form_validation->set_rules('tanggal', 'Tanggal Pengeluaran', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == TRUE) {
      if ($this->PengeluaranModel->ubah($id)) {
        $this->session->set_flashdata('success', 'Berhasil mengubah data pengeluaran baru');
        redirect('pengeluaran','refresh');
      } else {
        $this->session->set_flashdata('failed', 'Gagal mengubah data pengeluaran baru');
      }
    } else {
      $this->load->view('Components/header', $data);
      $this->load->view('Pengeluaran/ubah', $data);
      $this->load->view('Components/footer');
    }
  }

  public function laporanHarian()
  {
    $data['expenses'] = $this->PengeluaranModel->laporanHarian($this->input->post('tanggal'));
    $data['tanggal'] = $this->input->post('tanggal');
    $this->load->view('Pengeluaran/laporanHarian', $data);
  }

}
/* End Pengeluaran file Controllername.php */
