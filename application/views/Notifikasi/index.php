<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <!-- <a class="btn btn-primary" href="<?php echo base_url('Barang/tambah_merek'); ?>">Add Brand</a> -->
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover" id="tabel">
                <thead>
                  <tr>
                    <th>Notifikasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($notif as $brd): ?>
                  <tr>
                    <td>Stok <?php echo $brd['nama_barang']; ?> hampir/sudah habis</td>
                    <td><?php
                      if ($brd['terbaca'] == 0){
                        echo '<span class="label label-warning">Belum Terbaca</span>';
                      } else {
                        echo '<span class="label label-success">Terbaca</span>';
                      }?></td>
                    <td>
                      <a href="<?php echo base_url('notifikasi/hapus/'.$brd['id_notifikasi']); ?>">Delete</a>
                      <a href="<?php echo base_url('notifikasi/read/'.$brd['id_notifikasi']); ?>">Terbaca</a>
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