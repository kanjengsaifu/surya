<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model{

  var $username;
  var $password;

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function login()
  {
    $this->username = $this->input->post('username');
    $this->password = md5($this->input->post('password'));

    $this->db->where('username', $this->username);
    $this->db->where('password', $this->password);
    $results = $this->db->get('pengguna');

    if ($results->num_rows() == 1) {
      return $results->row(0);
    }
    return FALSE;
  }

  public function get($username)
  {
    $results = $this->db->get_where('pengguna', array('username' => $username));
    return $results->row_array();
  }

  public function changepwd($username)
  {
    $data = array(
      'password' => md5($this->input->post('new_password'))
    );

    $this->db->where('username', $username);
    if ($this->db->update('pengguna', $data)) {
      return true;
    } else {
      return false;
    }
    
  }

}
