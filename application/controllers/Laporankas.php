<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporankas extends CI_Controller {

  var $data;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('PengeluaranModel');
    $this->load->model('PenjualanModel');
    $this->load->model('PembelianModel');
    $this->load->model('NotifikasiModel');
    global $data;
    $data['notif'] = $this->NotifikasiModel->get();
    $data['unread'] = $this->NotifikasiModel->unread();
  }

  public function index()
  {
    global $data;
    // $data['customers'] = $this->PelangganModel->get();
    $data['expenses'] = $this->PengeluaranModel->get();
    $data['pembelian'] = $this->PembelianModel->pengeluaran();
    $data['sales'] = $this->PenjualanModel->pemasukan();
    $data['title'] = 'Laporan Kas';
    $data['active'] = 'laporanKas';

    $kas_keluar = 0;
    foreach($data['expenses'] as $dt) {
      $kas_keluar = $kas_keluar + (int)$dt['total'];
    }

    $lama = $kas_keluar;

    foreach($data['pembelian'] as $dt) {
      $kas_keluar = $kas_keluar + ($dt['jumlah'] * $dt['harga_jual']);
    }

    $kas_masuk = 0;
    foreach($data['sales'] as $sl) {
      $kas_masuk = $kas_masuk + ($sl['jumlah'] * $sl['harga_beli']);
    }

    $data['kas_masuk'] = $kas_masuk;
    $data['kas_keluar'] = $kas_keluar;

    $this->load->view('Components/header', $data, FALSE);
    $this->load->view('Laporankas/index');
    $this->load->view('Components/footer', $data, FALSE);
  }


}

/* Laporankas of file Controllername.php */