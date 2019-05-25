<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a class="btn btn-primary" href="<?php echo base_url('pelanggan/tambah'); ?>">Add Customer</a>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover" id="tabel">
                <thead>
                  <tr>
                    <th>Nama Pelanggan</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>No Telepon</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>Kode Pos</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($customers as $cus): ?>
                  <tr>
                    <td><?php echo $cus['nama_customer']; ?></td>
                    <td><?php echo $cus['jenis_kelamin']; ?></td>
                    <td><?php echo $cus['tanggal_lahir']; ?></td>
                    <td><?php echo $cus['telp_customer']; ?></td>
                    <td><?php echo $cus['email']; ?></td>
                    <td><?php echo $cus['alamat_customer']; ?></td>
                    <td><?php echo $cus['kota']; ?></td>
                    <td><?php echo $cus['kode_pos']; ?></td>
                    <td><?php echo $cus['catatan']; ?></td>
                    <td>
                      <a class="text-danger" href="<?php echo base_url('pelanggan/hapus/'.$cus['id_customer']); ?>">Delete</a>
                      <a href="<?php echo base_url('pelanggan/ubah/'.$cus['id_customer']); ?>">Edit</a>
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