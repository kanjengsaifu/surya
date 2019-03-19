<div class="content-wrapper">
  <section class="content-header">
    <h1><?=$title?></h1>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <a class="btn btn-primary" href="<?php echo base_url('pengeluaran/tambah'); ?>">Add Expense</a>
            <?php echo form_open('pengeluaran/laporanHarian'); ?>
              <input type="date" name="tanggal" id="tanggal">
              <button class="btn btn-primary" type="submit">Cetak Laporan Harian</a>
            <?php echo form_close(); ?>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-hover" id="tabel">
              <thead>
                <tr>
                  <th>Tanggal Pengeluaran</th>
                  <th>Jenis Pengeluaran</th>
                  <th>Nama Pengeluaran</th>
                  <th>Total Pengeluaran</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($expenses as $emp): ?>
                <tr>
                  <td><?php echo $emp['tanggal']; ?></td>
                  <td><?php echo $emp['jenis_pengeluaran']; ?></td>
                  <td><?php echo $emp['nama_pengeluaran']; ?></td>
                  <td><?php echo $emp['total']; ?></td>
                  <td>
                    <a href="<?php echo base_url('pengeluaran/hapus/'.$emp['id_pengeluaran']); ?>">Delete</a>
                    <a href="<?php echo base_url('pengeluaran/ubah/'.$emp['id_pengeluaran']); ?>">Edit</a>
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
