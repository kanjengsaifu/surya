<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('NotifikasiModel');
        global $data;
        $data['notif'] = $this->NotifikasiModel->get();
        $data['unread'] = $this->NotifikasiModel->unread();
        $data['active'] = 'none';
        //Load Dependencies

    }

    public function index()
    {
      if ($this->session->userdata('logged_in') == TRUE) {
        redirect('dashboard');
      }

      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

      if ($this->form_validation->run() == TRUE) {
        $data['pengguna'] = $this->AuthModel->login();

        if (!$data['pengguna']) {
          $this->session->set_flashdata('failed', 'Akun tidak ada di database');
          redirect('auth');
        }

        $userdata = array(
          'username' => $data['pengguna']->username,
          'status' => $data['pengguna']->status,
          'logged_in' => TRUE
        );

        $this->session->set_userdata($userdata);
        $this->session->set_flashdata('success', 'Berhasil melakukan login');
        redirect('penjualan');
      } else {
        $data['title'] = 'Login';
        $this->load->view('Auth/login', $data);
      }
    }

    public function logout()
    {
      $this->session->sess_destroy();
      redirect('auth');
    }

    public function changepwd()
    {
      // TODO: change user password
      global $data;
      $data['title'] = 'Change Password';
      $this->form_validation->set_rules('old_password', 'Old Password', 'required|callback_checkPassword');
      $this->form_validation->set_rules('new_password', 'New Password', 'required');
      $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');
      $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

      if ($this->form_validation->run() == TRUE) {
        if ($this->AuthModel->changepwd($this->session->userdata('username'))) {
          $this->session->set_flashdata('success', 'Berhasil mengubah kata sandi');
          redirect('auth/changepwd','refresh');
        } else {
          $this->session->set_flashdata('failed', 'Gagal mengubah kata sandi');
        }
      } else {
        $this->load->view('Components/header', $data);
        $this->load->view('Auth/changepwd', $data);
        $this->load->view('Components/footer');
      } 
    }

    public function checkPassword($password) {
      $old_password = $this->AuthModel->get($this->session->userdata('username'))['password'];
      // die(json_encode(array('old' => $old_password, 'new' => md5($password))));
      if (md5($password) != $old_password) {
        $this->form_validation->set_message('checkPassword','Old password is false');
        return FALSE;
      }
      return TRUE;
    }

}

/* End of file Auth.php */
