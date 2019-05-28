<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pemasukan extends CI_Controller {

  var $data;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('NotifikasiModel');
    $this->load->model('InvoiceModel');
    $this->load->model('PenjualanModel');
    global $data;
    $data['notif'] = $this->NotifikasiModel->get();
    $data['unread'] = $this->NotifikasiModel->unread();
    //Load Dependencies
  }

  public function index()
  {
    global $data;
    $data['active'] = 'daftarPemasukan';
    // $data['sales'] = $this->PenjualanModel->get();
    // $data['invoices'] = $this->InvoiceModel->pemasukan();
    $data['invoices'] = $this->InvoiceModel->get();
    $data['sales'] = $this->PenjualanModel->pemasukan();
    // die(json_encode($data['invoices']));
    // die(json_encode($data['sales']));
    $data['title'] = 'Kas Masuk';
    $this->load->view('Components/header', $data);
    $this->load->view('Pemasukan/index', $data);
    $this->load->view('Components/footer');
  }

}

/* End of file Pemasukan.php */
