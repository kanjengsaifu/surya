<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <?php if($this->session->userdata('status') == 0): ?>
              <a class="btn btn-primary" href="<?php echo base_url('karyawan/tambah'); ?>">Add Employee</a>
              <?php endif; ?>
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
                    <?php if($this->session->userdata('status') == 0): ?>
                    <th>Aksi</th>
                    <?php endif; ?>
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
                    <?php if($this->session->userdata('status') == 0): ?>
                    <td>
                      <a class="text-danger" href="<?php echo base_url('karyawan/hapus/'.$emp['id_karyawan']); ?>">Delete</a>
                      <a href="<?php echo base_url('karyawan/ubah/'.$emp['id_karyawan']); ?>">Edit</a>
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
  