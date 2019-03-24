<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

  var $data;
  
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('status') == 1) {
      $this->session->set_flashdata('failed', 'Anda tidak memiliki akses ke halaman tersebut');
      redirect('penjualan');
    }
    $this->load->model('BarangModel');
    $this->load->model('NotifikasiModel');
    global $data;
    $data['notif'] = $this->NotifikasiModel->get();
    $data['unread'] = $this->NotifikasiModel->unread();
    //Load Dependencies
    
  }
  
  // List all your items
  public function index()
  {
    
  }
  
  public function list_barang()
  {
    global $data;
    $data['items'] = $this->BarangModel->getBarang();
    $data['title'] = 'Items';
    $data['active'] = 'daftarBarang';
    $this->load->view('Components/header', $data);
    $this->load->view('Barang/index', $data);        
    $this->load->view('Components/footer');
  }
  
  // Add a new item
  public function tambah_barang()
  {
    global $data;
    $data['title'] = 'Add Item';
    $data['active'] = 'tambahBarang';
    $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
    $this->form_validation->set_rules('stok', 'Stok', 'required');
    $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required');
    $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    $this->form_validation->set_rules('id_kategori', 'Kategori Barang', 'required');
    $this->form_validation->set_rules('id_merek', 'Merek Barang', 'required');
    $this->form_validation->set_rules('id_satuan', 'Satuan Barang', 'required');
    $this->form_validation->set_rules('gudang', 'Nama Gudang', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
    
    if ($this->form_validation->run() == TRUE) {
      if ($this->BarangModel->tambahBarang()) {
        $this->session->set_flashdata('success', 'Berhasil menambahkan barang baru');
        redirect('barang/list_barang','refresh');
      } else {
        $this->session->set_flashdata('failed', 'Gagal menambahkan barang baru');
      }
    } else {
      $data['categories'] = $this->BarangModel->getKategori();
      $data['brands'] = $this->BarangModel->getMerek();
      $data['units'] = $this->BarangModel->getSatuan();
      $this->load->view('Components/header', $data);
      $this->load->view('Barang/tambah', $data);
      $this->load->view('Components/footer');
    }
  }
  
  //Delete one item
  public function hapus_barang($id)
  {
    if ($this->BarangModel->hapusBarang($id)) {
      $this->session->set_flashdata('success', 'Berhasil menghapus barang');
      redirect('barang/list_barang','refresh');
    } else {
      $this->session->set_flashdata('failed', 'Gagal menghapus barang');
      redirect('barang/list_barang','refresh');
    }
  }
  
  //Update one item
  public function ubah_barang($id)
  {
    global $data;
    $data['title'] = 'Edit Item';
    $data['active'] = 'daftarBarang';
    $data['item'] = $this->BarangModel->getBarang($id);
    $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
    $this->form_validation->set_rules('stok', 'Stok', 'required');
    $this->form_validation->set_rules('harga_beli', 'Harga Beli', 'required');
    $this->form_validation->set_rules('harga_jual', 'Harga Jual', 'required');
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
    $this->form_validation->set_rules('id_kategori', 'Kategori Barang', 'required');
    $this->form_validation->set_rules('id_merek', 'Merek Barang', 'required');
    $this->form_validation->set_rules('id_satuan', 'Satuan Barang', 'required');
    $this->form_validation->set_rules('gudang', 'Nama Gudang', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
    
    if ($this->form_validation->run() == TRUE) {
      if ($this->BarangModel->ubahBarang($id)) {
        $this->session->set_flashdata('success', 'Berhasil mengubah data barang');
        redirect('barang/list_barang','refresh');
      } else {
        $this->session->set_flashdata('failed', 'Gagal mengubah data barang');
      }
    } else {
      $data['categories'] = $this->BarangModel->getKategori();
      $data['brands'] = $this->BarangModel->getMerek();
      $data['units'] = $this->BarangModel->getSatuan();
      $this->load->view('Components/header', $data);
      $this->load->view('Barang/ubah', $data);
      $this->load->view('Components/footer');
    }
  }
  
  // *********************************************************************
  public function list_kategori()
  {
    global $data;
    $data['categories'] = $this->BarangModel->getKategori();
    $data['title'] = 'Categories';
    $data['active'] = 'daftarKategori';
    $this->load->view('Components/header', $data);
    $this->load->view('Kategori/index', $data);        
    $this->load->view('Components/footer');
    
  }
  
  public function tambah_kategori()
  {
    global $data;
    $data['title'] = 'Add Category';
    $data['active'] = 'tambahKategori';
    $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
    
    if ($this->form_validation->run() == TRUE) {
      if ($this->BarangModel->tambahKategori()) {
        $this->session->set_flashdata('success', 'Berhasil menambahkan kategori baru');
        redirect('barang/list_kategori','refresh');
      } else {
        $this->session->set_flashdata('failed', 'Gagal menambahkan kategori baru');
      }
    } else {
      $this->load->view('Components/header', $data);
      $this->load->view('Kategori/tambah', $data);
      $this->load->view('Components/footer');
    }
  }
  
  public function hapus_kategori($id)
  {
    if ($this->BarangModel->hapusKategori($id)) {
      $this->session->set_flashdata('success', 'Berhasil menghapus kategori');
      redirect('barang/list_kategori','refresh');
    } else {
      $this->session->set_flashdata('failed', 'Gagal menghapus kategori');
      redirect('barang/list_kategori','refresh');
    }
  }
  
  public function ubah_kategori($id)
  {
    global $data;
    $data['title'] = 'Edit Category';
    $data['active'] = 'daftarKategori';
    $data['category'] = $this->BarangModel->getKategori($id);
    $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
    
    if ($this->form_validation->run() == TRUE) {
      if ($this->BarangModel->ubahKategori($id)) {
        $this->session->set_flashdata('success', 'Berhasil mengubah kategori');
        redirect('barang/list_kategori','refresh');
      } else {
        $this->session->set_flashdata('failed', 'Gagal mengubah kategori');
      }
    } else {
      $this->load->view('Components/header', $data);
      $this->load->view('Kategori/ubah', $data);
      $this->load->view('Components/footer');
    }
  }
  
  // *********************************************************************
  public function list_merek()
  {
    global $data;
    $data['brands'] = $this->BarangModel->getMerek();
    $data['title'] = 'Brands';
    $data['active'] = 'daftarMerek';
    $this->load->view('Components/header', $data);
    $this->load->view('Merek/index', $data);        
    $this->load->view('Components/footer');
    
  }
  
  public function tambah_merek()
  {
    global $data;
    $data['title'] = 'Add Brand';
    $data['active'] = 'tambahMerek';
    $this->form_validation->set_rules('nama_merek', 'Nama Merek', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
    
    if ($this->form_validation->run() == TRUE) {
      if ($this->BarangModel->tambahMerek()) {
        $this->session->set_flashdata('success', 'Berhasil menambah merek baru');
        redirect('barang/list_merek','refresh');
      } else {
        $this->session->set_flashdata('failed', 'Gagal menambah merek baru');
      }
    } else {
      $this->load->view('Components/header', $data);
      $this->load->view('Merek/tambah', $data);
      $this->load->view('Components/footer');
    }
  }
  
  public function hapus_merek($id)
  {
    if ($this->BarangModel->hapusMerek($id)) {
      $this->session->set_flashdata('success', 'Berhasil menghapus merek');
      redirect('barang/list_merek','refresh');
    } else {
      $this->session->set_flashdata('failed', 'Gagal menghapus merek');
      redirect('barang/list_merek','refresh');
    }
  }
  
  public function ubah_merek($id)
  {
    global $data;
    $data['title'] = 'Edit Brand';
    $data['active'] = 'daftarMerek';
    $data['brand'] = $this->BarangModel->getMerek($id);
    $this->form_validation->set_rules('nama_merek', 'Nama Merek', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
    
    if ($this->form_validation->run() == TRUE) {
      if ($this->BarangModel->ubahMerek($id)) {
        $this->session->set_flashdata('success', 'Berhasil mengubah merek');
        redirect('barang/list_Merek','refresh');
      } else {
        $this->session->set_flashdata('failed', 'Gagal mengubah merek');
      }
    } else {
      $this->load->view('Components/header', $data);
      $this->load->view('Merek/ubah', $data);
      $this->load->view('Components/footer');
    }
  }
  
  // *********************************************************************
  public function list_satuan()
  {
    global $data;
    $data['units'] = $this->BarangModel->getSatuan();
    $data['title'] = 'Units';
    $data['active'] = 'daftarSatuan';
    $this->load->view('Components/header', $data);
    $this->load->view('Satuan/index', $data);        
    $this->load->view('Components/footer');
    
  }
  
  public function tambah_satuan()
  {
    global $data;
    $data['title'] = 'Add Unit';
    $data['active'] = 'tambahSatuan';
    $this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
    
    if ($this->form_validation->run() == TRUE) {
      if ($this->BarangModel->tambahSatuan()) {
        $this->session->set_flashdata('success', 'Berhasil menambahkan satuan baru');
        redirect('barang/list_satuan','refresh');
      } else {
        $this->session->set_flashdata('failed', 'Gagal menambahkan satuan baru');
      }
    } else {
      $this->load->view('Components/header', $data);
      $this->load->view('Satuan/tambah', $data);
      $this->load->view('Components/footer');
    }
  }
  
  public function hapus_satuan($id)
  {
    if ($this->BarangModel->hapusSatuan($id)) {
      $this->session->set_flashdata('success', 'Berhasil menghapus satuan');
      redirect('barang/list_satuan','refresh');
    } else {
      $this->session->set_flashdata('failed', 'Gagal menghapus satuan');
      redirect('barang/list_satuan','refresh');
    }
  }
  
  public function ubah_satuan($id)
  {
    global $data;
    $data['title'] = 'Edit Unit';
    $data['active'] = 'daftarSatuan';
    $data['unit'] = $this->BarangModel->getSatuan($id);
    $this->form_validation->set_rules('nama_satuan', 'Nama Satuan', 'required');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
    
    if ($this->form_validation->run() == TRUE) {
      if ($this->BarangModel->ubahSatuan($id)) {
        $this->session->set_flashdata('success', 'Berhasil mengubah satuan');
        redirect('barang/list_satuan','refresh');
      } else {
        $this->session->set_flashdata('failed', 'Gagal mengubah satuan');
      }
    } else {
      $this->load->view('Components/header', $data);
      $this->load->view('Satuan/ubah', $data);
      $this->load->view('Components/footer');
    }
  }
  
}

/* End of file Barang.php */

