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

  public function laporanBulanan($bulan)
  {
    $data['bulan'] = $bulan;
    $from = $this->getFirstDay($bulan);
    $till = $this->getLastDay($bulan);
    $data['expenses'] = $this->PengeluaranModel->laporanBulanan($from, $till);
    $this->load->view('Pengeluaran/laporanBulanan', $data);
  }

  public function getFirstDay($bulan)
  {
    $month = $this->bulan($bulan);
    $year = date('Y');
    $tanggal = '01-' . $month . '-' . $year;
    return date('Y-m-d', strtotime($tanggal));
  }

  public function getLastDay($bulan)
  {
    $month = $this->bulan($bulan);
    $year = date('Y');
    $tanggal = '01-' . $month . '-' . $year;
    return date('Y-m-t', strtotime($tanggal));
  }

  public function bulan($bulan)
  {
    switch($bulan) {
      case 'januari':
        return '01';
      case 'februari':
        return '02';
      case 'maret':
        return '03';
      case 'april':
        return '04';
      case 'mei':
        return '05';
      case 'juni':
        return '06';
      case 'juli':
        return '07';
      case 'agustus':
        return '08';
      case 'september':
        return '09';
      case 'oktober':
        return '10';
      case 'november':
        return '11';
      case 'desember':
        return '12';
      default:
        return false;
    }
  }

}
/* End Pengeluaran file Controllername.php */
