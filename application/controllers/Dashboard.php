<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

  var $data;

  public function __construct()
  {
    parent::__construct();
    $this->load->model('NotifikasiModel');
    global $data;
    $data['notif'] = $this->NotifikasiModel->get();
    $data['unread'] = $this->NotifikasiModel->unread();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    global $data;
    $data['title'] = 'Dashboard';
    $this->load->view('Components/header', $data);
    $this->load->view('Dashboard/dashboard');
    $this->load->view('Components/footer');
    // $this->load->view('Laporan/hello');
  }

}
