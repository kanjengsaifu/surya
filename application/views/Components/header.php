<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/fonts/font-awesome.min.css');?>">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="<?php echo base_url('assets/icons/ionicons.min.css');?>"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.4.8/collection/icon/icon.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css');?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/skin-blue.min.css');?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- #MainWrapper -->
<div class="wrapper">
  <!-- #Header -->
  <header class="main-header">
    <!-- Logo -->
    <?php //TODO: dibenerin hrefnya ?>
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>RY</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Surya</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <!-- nav atas -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <?php if(count($unread) > 0): ?>
                <span class="label label-warning"><?php echo count($unread); ?></span>
              <?php endif; ?>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo count($unread); ?> unread notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php foreach($unread as $nt): ?>
                  <li>
                    <a>Stok <?php echo $nt['nama_barang']; ?> hampir/sudah habis</a>
                  </li>
                  <?php endforeach; ?>
                </ul>
              </li>
              <li class="footer"><a href="<?php echo base_url('notifikasi'); ?>">View all</a></li>
            </ul>
          </li>
            
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo $this->session->userdata('username'); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('auth/changepwd'); ?>" class="btn btn-default btn-flat">Change Password</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('auth/logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- #SIDENAV -->
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('username'); ?></p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVIGATION</li>
        <li class="treeview <?php if($active == 'daftarPenjualan' || $active == 'tambahPenjualan'){echo 'active';} ?>">
          <a href="#">
            <i class="fa fa-dashboard"></i>
            <span>Penjualan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php //TODO: handle class activenya ?>
            <li class="<?php if($active == 'daftarPenjualan'){echo 'active';} ?>"><a href="<?php echo base_url('penjualan'); ?>"><i class="fa fa-circle-o"></i> Daftar</a></li>
            <li class="<?php if($active == 'tambahPenjualan'){echo 'active';} ?>"><a href="<?php echo base_url('penjualan/jual'); ?>"><i class="fa fa-circle-o"></i> Tambah</a></li>
          </ul>
        </li>
        <li class="treeview <?php if($active == 'daftarPembelian' || $active == 'tambahPembelian'){echo 'active';} ?>">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Pembelian</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($active == 'daftarPembelian'){echo 'active';} ?>"><a href="<?php echo base_url('pembelian'); ?>"><i class="fa fa-circle-o"></i> Daftar</a></li>
            <li class="<?php if($active == 'tambahPembelian'){echo 'active';} ?>"><a href="<?php echo base_url('pembelian/beli'); ?>"><i class="fa fa-circle-o"></i> Tambah</a></li>
          </ul>
        </li>
        <li class="treeview <?php if($active == 'daftarBarang' || $active == 'tambahBarang' || $active == 'daftarKategori' || $active == 'tambahKategori' || $active == 'daftarMerek' || $active == 'tambahMerek' || $active == 'daftarSatuan' || $active == 'tambahSatuan' ){echo 'active';} ?>">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Barang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($active == 'daftarBarang'){echo 'active';} ?>"><a href="<?php echo base_url('barang/list_barang'); ?>"><i class="fa fa-circle-o"></i> Daftar Barang</a></li>
            <li class="<?php if($active == 'tambahBarang'){echo 'active';} ?>"><a href="<?php echo base_url('barang/tambah_barang'); ?>"><i class="fa fa-circle-o"></i> Tambah Barang</a></li>
            <li class="treeview <?php if($active == 'daftarKategori' || $active == 'tambahKategori'){echo 'active';} ?>">
              <a href="#"><i class="fa fa-circle-o"></i> Kategori
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($active == 'daftarKategori'){echo 'active';} ?>"><a href="<?php echo base_url('barang/list_kategori'); ?>"><i class="fa fa-circle-o"></i> Daftar Kategori</a></li>
                <li class="<?php if($active == 'tambahKategori'){echo 'active';} ?>"><a href="<?php echo base_url('barang/tambah_kategori'); ?>"><i class="fa fa-circle-o"></i> Tambah Kategori</a></li>
              </ul>
            </li>
            <li class="treeview <?php if($active == 'daftarMerek' || $active == 'tambahMerek'){echo 'active';} ?>">
              <a href="#"><i class="fa fa-circle-o"></i> Merek
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if($active == 'daftarMerek'){echo 'active';} ?>"><a href="<?php echo base_url('barang/list_merek'); ?>"><i class="fa fa-circle-o"></i> Daftar Merek</a></li>
                <li class="<?php if($active == 'tambahMerek'){echo 'active';} ?>"><a href="<?php echo base_url('barang/tambah_merek'); ?>"><i class="fa fa-circle-o"></i> Tambah Merek</a></li>
              </ul>
            </li>
            <li class="treeview <?php if($active == 'daftarSatuan' || $active == 'tambahSatuan'){echo 'active';} ?>">
              <a href="#"><i class="fa fa-circle-o"></i> Satuan
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class=<?php if($active == 'daftarSatuan'){echo 'active';} ?>><a href="<?php echo base_url('barang/list_satuan'); ?>"><i class="fa fa-circle-o"></i> Daftar Satuan</a></li>
                <li class="<?php if($active == 'tambahSatuan'){echo 'active';} ?>"><a href="<?php echo base_url('barang/tambah_satuan'); ?>"><i class="fa fa-circle-o"></i> Tambah Satuan</a></li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="treeview <?php if($active == 'daftarPelanggan' || $active == 'tambahPelanggan'){echo 'active';} ?>">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Pelanggan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($active == 'daftarPelanggan'){echo 'active';} ?>"><a href="<?php echo base_url('pelanggan'); ?>"><i class="fa fa-circle-o"></i> Daftar Pelanggan</a></li>
            <li class="<?php if($active == 'tambahPelanggan'){echo 'active';} ?>"><a href="<?php echo base_url('pelanggan/tambah'); ?>"><i class="fa fa-circle-o"></i> Tambah Pelanggan</a></li>
          </ul>
        </li>
        <li class="treeview <?php if($active == 'daftarKaryawan' || $active == 'tambahKaryawan'){echo 'active';} ?>">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Karyawan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($active == 'daftarKaryawan'){echo 'active';} ?>"><a href="<?php echo base_url('karyawan'); ?>"><i class="fa fa-circle-o"></i> Daftar Karyawan</a></li>
            <li class="<?php if($active == 'tambahKaryawan'){echo 'active';} ?>"><a href="<?php echo base_url('karyawan/tambah'); ?>"><i class="fa fa-circle-o"></i> Tambah Karyawan</a></li>
          </ul>
        </li>
        <li class="treeview <?php if($active == 'daftarSupplier' || $active == 'tambahSupplier'){echo 'active';} ?>">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Supplier</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if($active == 'daftarSupplier'){echo 'active';} ?>"><a href="<?php echo base_url('supplier'); ?>"><i class="fa fa-circle-o"></i> Daftar Supplier</a></li>
            <li class="<?php if($active == 'tambahSupplier'){echo 'active';} ?>"><a href="<?php echo base_url('supplier/tambah'); ?>"><i class="fa fa-circle-o"></i> Tambah Supplier</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <?php //flash message ?>
  <?php //success ?>
  <?php if($this->session->flashdata('success')) : ?>
    <?php echo
      '<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="modalSuccessLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style="background-color:#d4edda">
            <div class="modal-body">
              <p class="text-success text-center" style = "margin-top:16px">'.$this->session->flashdata("success").'</p>
            </div>
          </div>
        </div>
      </div>'
    ?>
  <?php endif; ?>

  <?php //failed ?>
  <?php if($this->session->flashdata('failed')) : ?>
    <?php echo
      '<div class="modal fade" id="failed" tabindex="-1" role="dialog" aria-labelledby="modalFailedLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content" style="background-color:#f8d7da">
            <div class="modal-body">
              <p class="text-danger text-center" style = "margin-top:16px">'.$this->session->flashdata("failed").'</p>
            </div>
          </div>
        </div>
      </div>'
    ?>
  <?php endif; ?>