<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller {

  var $data;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('KaryawanModel');
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
    $data['employees'] = $this->KaryawanModel->get();
    $data['title'] = 'Employees';
    $data['active'] = 'daftarKaryawan';
    $this->load->view('Components/header', $data);
    $this->load->view('Karyawan/index', $data);
    $this->load->view('Components/footer');
  }

  // Add a new item
  public function tambah()
  {
    if ($this->session->userdata('status') == 1) {
      $this->session->set_flashdata('failed', 'Anda tidak memiliki akses ke halaman tersebut');
      redirect('karyawan');
    }
    global $data;
    $data['title'] = 'Add Employee';
    $data['active'] = 'tambahKaryawan';
    // $this->form_validation->set_rules('id_karyawan', 'Id Karyawan', 'required');
    $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required');
    $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
    $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
    $this->form_validation->set_rules('alamat_karyawan', 'Alamat Karyawan', 'required');
    $this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
    
    if ($this->form_validation->run() == TRUE) {
      if ($this->KaryawanModel->tambah()) {
        $this->session->set_flashdata('success', 'Berhasil menambahkan karyawan baru');
        redirect('karyawan','refresh');
      } else {
        $this->session->set_flashdata('failed', 'Gagal menambahkan karyawan baru');
      }
    } else {
      $this->load->view('Components/header', $data);
      $this->load->view('Karyawan/tambah', $data);
      $this->load->view('Components/footer');
    }
  }

  //Delete one item
  public function hapus($id)
  {
    if ($this->session->userdata('status') == 1) {
      $this->session->set_flashdata('failed', 'Anda tidak memiliki akses ke halaman tersebut');
      redirect('karyawan');
    }
    if ($this->KaryawanModel->hapus($id)) {
      $this->session->set_flashdata('success', 'Berhasil menghapus karyawan');
      redirect('karyawan','refresh');
    } else {
      $this->session->set_flashdata('failed', 'Gagal menghapus karyawan');
      redirect('karyawan','refresh');
    }
  }

  //Update one item
  public function ubah($id)
  {
    if ($this->session->userdata('status') == 1) {
      $this->session->set_flashdata('failed', 'Anda tidak memiliki akses ke halaman tersebut');
      redirect('karyawan');
    }
    global $data;
    $data['title'] = 'Edit Employee';
    $data['active'] = 'daftarKaryawan';
    $data['employee'] = $this->KaryawanModel->get($id);
    // $this->form_validation->set_rules('id_karyawan', 'Id Karyawan', 'required');
    $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required');
    $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
    $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
    $this->form_validation->set_rules('alamat_karyawan', 'Alamat Karyawan', 'required');
    $this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == TRUE) {
      if ($this->KaryawanModel->ubah($id)) {
        $this->session->set_flashdata('success', 'Berhasil mengubah karyawan');
        redirect('karyawan','refresh');
      } else {
        $this->session->set_flashdata('success', 'Berhasil mengubah karyawan');
      }
    } else {
      $this->load->view('Components/header', $data);
      $this->load->view('Karyawan/ubah', $data);
      $this->load->view('Components/footer');
    }
  }

}

/* End of file Karyawan.php */

