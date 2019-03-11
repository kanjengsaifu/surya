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
      <div class="col-sm-12 invoice-col">
        Supplier:<strong class="pull-right">Invoice #<?php echo $invoice['id_invoice']; ?></strong>
        <address>
          <strong><?php echo $invoice['nama_supplier']; ?></strong><br>
          <?php echo $invoice['alamat_supplier']; ?><br>
          <?php echo $invoice['telp_supplier']; ?><br>
          <?php echo $invoice['nama_bank']; ?><br>
        </address>
      </div>
      <div class="col-xs-3 invoice-col"></div>
    </div>

    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Barang</th>
              <th>Jumlah</th>
              <th>Harga Jual</th>
              <th>Total Harga</th>
              <th>Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php $total = 0?>
            <?php foreach($purchases as $sel): ?>
            <tr>
              <td><?php echo $no; ?></td>
              <?php $no++; ?>
              <td><?php echo $sel['nama_barang']; ?></td>
              <td><?php echo $sel['jumlah']; ?></td>
              <td><?php echo $sel['harga_jual']; ?></td>
              <td><?php echo $sel['jumlah'] * $sel['harga_jual']; ?></td>
              <?php $total = $total + $sel['jumlah'] * $sel['harga_jual']; ?>
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
          <button onClick="window.print();" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
          <a class="btn btn-primary pull-right" href="<?php echo base_url('pembelian'); ?>">Kembali</a>
        </div>
      </div>
  </section>
</div>