<div class="content-wrapper">
  <section class="content-header">
    <h1><?=$title?></h1>
  </section>

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

    <div class="row no-print">
        <div class="col-xs-12">
          <a target="_blank" href="<?php echo base_url('penjualan/cetakinvoice/'.$invoice['id_invoice']); ?>" class="btn btn-default"><i class="fa fa-print"></i> Invoice</a>
          <a target="_blank" href="<?php echo base_url('penjualan/suratjalan/'.$invoice['id_invoice']); ?>" class="btn btn-default"><i class="fa fa-print"></i> Surat Jalan</a>
          <a class="btn btn-primary pull-right" href="<?php echo base_url('penjualan'); ?>">Kembali</a>
          <span class="pull-right">&nbsp;</span>
          <?php if($this->session->userdata('status') == 0): ?>
          <a class="btn btn-danger pull-right" href="<?php echo base_url('penjualan/hapus/'.$invoice['id_invoice']); ?>">Hapus</a>
          <?php endif; ?>
        </div>
      </div>
  </section>
</div>