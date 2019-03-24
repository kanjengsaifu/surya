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
                    <th>Alamat Pelanggan</th>
                    <th>Telepon Pelanggan</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($customers as $cus): ?>
                  <tr>
                    <td><?php echo $cus['nama_customer']; ?></td>
                    <td><?php echo $cus['alamat_customer']; ?></td>
                    <td><?php echo $cus['telp_customer']; ?></td>
                    <td><?php echo $cus['keterangan']; ?></td>
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