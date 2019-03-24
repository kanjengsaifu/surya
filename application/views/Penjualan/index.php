<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a class="btn btn-primary" href="<?php echo base_url('penjualan/jual'); ?>">Add Sale</a>
              <div style="float: right;">
                <?php echo form_open('penjualan/laporanHarian'); ?>
                  <input type="date" name="tanggal" id="tanggal">
                  <button class="btn btn-primary" type="submit">Cetak Laporan Harian</button>
                <?php echo form_close(); ?>
              </div>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover" id="tabel">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Invoice</th>
                    <th>Pelanggan</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach($invoices as $sel): ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <?php $no++; ?>
                    <td><strong>#<?php echo $sel['id_invoice']; ?></strong></td>
                    <td><?php echo $sel['nama_customer']; ?></td>
                    <td><?php echo $sel['tanggal']; ?></td>
                    <td>
                      <a href="<?php echo base_url('penjualan/detail/'.$sel['id_invoice']); ?>">Detail</a><br>
                      <a class="text-danger" href="<?php echo base_url('penjualan/hapus/'.$sel['id_invoice']); ?>">Hapus</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script>
  var tanggal = document.getElementById('tanggal')
  tanggal.valueAsDate = new Date()
</script>
  