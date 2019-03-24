<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Surat Jalan</title>
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
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
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
<body onload="window.print()">
<div class="content-wrapper">
  <section class="invoice">
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
        <!-- Invoice <?php echo $invoice['id_invoice']; ?> -->
        Surya App
        <small class="pull-right">Tanggal: <?php echo $invoice['tanggal']; ?></small>
        </h2>
      </div>
    </div>

    <div class="row invoice-info">
      <div class="col-sm-12">
        <h3 class="text-center">SURAT JALAN</h3>
        Pelanggan<strong class="pull-right">Invoice #<?php echo $invoice['id_invoice']; ?></strong>
        <address>
          Nama&emsp;&emsp;&emsp;&nbsp;&nbsp;: <strong><?php echo $invoice['nama_customer']; ?></strong><br>
          Alamat&emsp;&emsp;&emsp;: <?php echo $invoice['alamat_customer']; ?><br>
          No Telepon &emsp;: <?php echo $invoice['telp_customer']; ?><br>
        </address>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Jumlah</th>
              <th>Harga Beli</th>
              <th>Total Harga</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php $total = 0?>
            <?php foreach($sales as $sel): ?>
            <tr>
              <td><?php echo $no; ?></td>
              <?php $no++; ?>
              <td><?php echo $sel['nama_barang']; ?></td>
              <td><?php echo $sel['jumlah']; ?></td>
              <td><?php echo $sel['harga_beli']; ?></td>
              <td><?php echo $sel['jumlah'] * $sel['harga_beli']; ?></td>
              <?php $total = $total + $sel['jumlah'] * $sel['harga_beli']; ?>
              <td><?php echo $sel['keterangan']; ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-8">

      </div>
      <div class="col-xs-4">
      <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Total Dibayarkan:</th>
                <td><?php echo $total; ?></td>
              </tr>
            </table>
          </div>
      </div>
    </div>
  </section>
</div>
</body>
<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/js/jquery-ui.min.js');?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/js/adminlte.min.js');?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?php // echo base_url('assets/js/dashboard.min.js');?>"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- <script src="<?php echo base_url('assets/js/dataTables.bootstrap.min.js'); ?>"></script> -->
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/select2.full.min.js'); ?>"></script>
