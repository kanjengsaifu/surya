<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RekapGaji extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('RekapGajiModel');
    $this->load->model('NotifikasiModel');
    $this->load->model('KaryawanModel');
    global $data;
    $data['notif'] = $this->NotifikasiModel->get();
    $data['unread'] = $this->NotifikasiModel->unread();
    //Load Dependencies 
  }

  public function index($bulan = FALSE)
  {
    global $data;
    if ($bulan) {
      $data['bulan'] = $bulan;
      // $data['currentMonth'] = false;
      $data['title'] = 'Monthly Salaries Bulan '.$bulan;
      $data['active'] = 'daftarGaji';
      $data['salaries'] = $this->RekapGajiModel->get($bulan);
    } else {
      $data['bulan'] = $this->month(date('m'));
      // $data['currentMonth'] = true;
      $data['title'] = 'Monthly Salaries';
      $data['active'] = 'daftarGaji';
      $data['salaries'] = $this->RekapGajiModel->get($this->month(date('m')));
    }
    $data['employees'] = $this->KaryawanModel->get();
    $this->load->view('Components/header', $data);
    $this->load->view('RekapGaji/index', $data);
    $this->load->view('Components/footer');
  }

  public function hadir($id_karyawan)
  {
    if ($this->session->userdata('status') == 1) {
      $this->session->set_flashdata('failed', 'Anda tidak memiliki akses ke halaman tersebut');
      redirect('rekapgaji');
    }
    if ($this->RekapGajiModel->hadir($id_karyawan)) {
      $this->session->set_flashdata('success', 'Berhasil menambah kehadiran karyawan');
      redirect('rekapgaji','refresh');
    } else {
      $this->session->set_flashdata('failed', 'Gagal menambah kehadiran karyawan');
    }
  }

  public function kasbon($id_karyawan)
  {
    if ($this->session->userdata('status') == 1) {
      $this->session->set_flashdata('failed', 'Anda tidak memiliki akses ke halaman tersebut');
      redirect('rekapgaji');
    }
    if ($this->RekapGajiModel->kasbon($id_karyawan)) {
      $this->session->set_flashdata('success', 'Berhasil menambah data kasbon karyawan');
      redirect('rekapgaji','refresh');
    } else {
      $this->session->set_flashdata('failed', 'Gagal menambah data kasbon karyawan');
    }
  }

  public function ubah($id_rekap)
  {
    if ($this->session->userdata('status') == 1) {
      $this->session->set_flashdata('failed', 'Anda tidak memiliki akses ke halaman tersebut');
      redirect('rekapgaji');
    }
    global $data;
    $data['title'] = 'Edit Salary';
    $data['active'] = 'daftarGaji';
    $data['salary'] = $this->RekapGajiModel->get(FALSE, $id_rekap);
    $this->form_validation->set_rules('presensi', 'Presensi', 'required');
    $this->form_validation->set_rules('kasbon', 'Kasbon', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == TRUE) {
      if ($this->RekapGajiModel->ubah($id_rekap)) {
        $this->session->set_flashdata('success', 'Berhasil mengubah data');
        redirect('rekapgaji','refresh');
      } else {
        $this->session->set_flashdata('failed', 'Gagal mengubah data');
      }
    } else {
      $this->load->view('Components/header', $data);
      $this->load->view('RekapGaji/ubah', $data);
      $this->load->view('Components/footer');
    }     
  }

  public function laporan($bulan)
  {
    $data['salaries'] = $this->RekapGajiModel->get($bulan, false);
    $data['bulan'] = ucfirst($bulan);
    // die(json_encode($data['salaries']));
    $this->load->view('RekapGaji/laporanBulanan', $data);
  }

  private function month($angka) {
    switch($angka) {
      case 1:
        return 'januari';
      case 2:
        return 'februari';
      case 3:
        return 'maret';
      case 4:
        return 'april';
      case 5:
        return 'mei';
      case 6:
        return 'juni';
      case 7:
        return 'juli';
      case 8:
        return 'agustus';
      case 9:
        return 'september';
      case 10:
        return 'oktober';
      case 11:
        return 'november';
      case 12:
        return 'desember';
      default:
        die('error');
    }
  }

}

/* End of file RekapGaji.php */
