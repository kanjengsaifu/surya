<div class="content-wrapper">
  <section class="content-header">
    <h1><?=$title?></h1>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h4>Unduh laporan bulanan</h4>
            <select class="form-control" name="bulan" id="bulan" onchange="changeBulan(this)" style="width: 100%;">
              <option>-- Pilih Bulan --</option>
              <option value="januari">Januari</option>
              <option value="februari">Februari</option>
              <option value="maret">Maret</option>
              <option value="april">April</option>
              <option value="mei">Mei</option>
              <option value="juni">Juni</option>
              <option value="juli">Juli</option>
              <option value="agustus">Agustus</option>
              <option value="september">September</option>
              <option value="oktober">Oktober</option>
              <option value="november">November</option>
              <option value="desember">Desember</option>
            </select>
            <br>
            <a class="btn btn-primary" href="#" id="pindah" style="float: right;">Unduh</a>
          </div>
        </div>
        <div class="box">
          <div class="box-header">
            <?php if($this->session->userdata('status') == 0): ?>
            <a class="btn btn-primary" href="<?php echo base_url('pengeluaran/tambah'); ?>">Add Expense</a>
            <?php endif; ?>
            <div style="float: right;">
              <?php echo form_open('pengeluaran/laporanHarian'); ?>
                <input type="date" name="tanggal" id="tanggal">
                <button class="btn btn-primary" type="submit">Cetak Laporan Harian</button>
              <?php echo form_close(); ?>
            </div>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-hover" id="tabel">
              <thead>
                <tr>
                  <th>Tanggal Pengeluaran</th>
                  <th>Jenis Pengeluaran</th>
                  <th>Nama Pengeluaran</th>
                  <th>Total Pengeluaran</th>
                  <?php if($this->session->userdata('status') == 0): ?>
                  <th>Aksi</th>
                  <?php endif; ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach($expenses as $emp): ?>
                <tr>
                  <td><?php echo $emp['tanggal']; ?></td>
                  <td><?php echo $emp['jenis_pengeluaran']; ?></td>
                  <td><?php echo $emp['nama_pengeluaran']; ?></td>
                  <td><?php echo $emp['total']; ?></td>
                  <?php if($this->session->userdata('status') == 0): ?>
                  <td>
                    <a class="text-danger" href="<?php echo base_url('pengeluaran/hapus/'.$emp['id_pengeluaran']); ?>">Delete</a>
                    <a href="<?php echo base_url('pengeluaran/ubah/'.$emp['id_pengeluaran']); ?>">Edit</a>
                  </td>
                  <?php endif; ?>
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
  var base_link = '<?php echo base_url('pengeluaran/laporanbulanan/') ?>'
  tanggal.valueAsDate = new Date()

  function changeBulan(select){
    bulan = select.value
    pindah.href = base_link.concat(bulan)
  }
</script>
