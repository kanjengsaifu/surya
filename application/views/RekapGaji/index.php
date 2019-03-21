<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <?php if (!isset($bulan)): ?>
          <div class="box">
            <div class="box-header">
              <!-- <a class="btn btn-primary" href="<?php echo base_url('karyawan/tambah'); ?>">Add Employee</a> -->
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Nama Karyawan</th>
                    <th>Gaji Pokok</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($employees as $emp): ?>
                  <tr>
                    <td><?php echo $emp['nama_karyawan']; ?></td>
                    <td><?php echo $emp['gaji_pokok']; ?></td>
                    <td>
                      <a href="<?php echo base_url('rekapgaji/hadir/'.$emp['id_karyawan']); ?>">Hadir</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <?php endif; ?>
          <div class="box">
            <div class="box-header">
              <?php if (isset($bulan)): ?>
              <a class="btn btn-primary" href="<?php echo base_url('rekapgaji/laporan/'.$bulan); ?>">Cetak Laporan</a>
              <?php else: ?>
              <a class="btn btn-primary" href="<?php echo base_url('rekapgaji/laporan'); ?>">Cetak Laporan</a>
              <?php endif; ?>
              <?php //TODO: bikin form buat ganti bulan ?>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover" id="tabel">
                <thead>
                  <tr>
                    <th>Nama Karyawan</th>
                    <th>Jumlah Presensi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($salaries as $emp): ?>
                  <tr>
                    <td><?php echo $emp['nama_karyawan']; ?></td>
                    <td><?php echo $emp['presensi']; ?></td>
                    <td>
                      <a href="<?php echo base_url('rekapgaji/hadir/'.$emp['id_karyawan']); ?>">Hadir</a>
                      <a href="<?php echo base_url('rekapgaji/ubah/'.$emp['id_rekap']); ?>">Ubah</a>
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
  