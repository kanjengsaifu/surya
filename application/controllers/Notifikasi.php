<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

  var $data;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('NotifikasiModel');
    global $data;
    $data['notif'] = $this->NotifikasiModel->get();
    $data['unread'] = $this->NotifikasiModel->unread();
    $data['active'] = 'notifikasi';
  }

  public function index()
  {
    global $data;
    $data['title'] = 'Notifikasi';
    $this->load->view('Components/header', $data);
    $this->load->view('Notifikasi/index', $data);
    $this->load->view('Components/footer');
  }

  public function read($id)
  {
    if ($this->NotifikasiModel->read($id)) {
      $this->session->set_flashdata('success', 'Berhasil menandai notifikasi terbaca');
      redirect('notifikasi');
    } else {
      $this->session->set_flashdata('failed', 'Gagal menandai notifikasi terbaca');
      redirect('notifikasi');
    }
  }

  public function hapus($id)
  {
    if ($this->NotifikasiModel->delete($id)) {
      $this->session->set_flashdata('success', 'Berhasil menghapus notifikasi');
      redirect('notifikasi');
    } else {
      $this->session->set_flashdata('failed', 'Gagal menghapus notifikasi');
      redirect('notifikasi');
    }
  }

}

/* End of file Notifikasi */