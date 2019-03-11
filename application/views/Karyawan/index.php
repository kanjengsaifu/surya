<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a class="btn btn-primary" href="<?php echo base_url('karyawan/tambah'); ?>">Add Employee</a>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover" id="tabel">
                <thead>
                  <tr>
                    <th>Nama Karyawan</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat Karyawan</th>
                    <th>Gaji Pokok</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($employees as $emp): ?>
                  <tr>
                    <td><?php echo $emp['nama_karyawan']; ?></td>
                    <td><?php echo $emp['tempat_lahir']; ?></td>
                    <td><?php echo $emp['tanggal_lahir']; ?></td>
                    <td><?php echo $emp['alamat_karyawan']; ?></td>
                    <td><?php echo $emp['gaji_pokok']; ?></td>
                    <td>
                      <a href="<?php echo base_url('karyawan/hapus/'.$emp['id_karyawan']); ?>">Delete</a>
                      <a href="<?php echo base_url('karyawan/ubah/'.$emp['id_karyawan']); ?>">Edit</a>
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
  