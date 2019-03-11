<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a class="btn btn-primary" href="<?php echo base_url('Barang/tambah_satuan'); ?>">Add Unit</a>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover" id="tabel">
                <thead>
                  <tr>
                    <th>Nama Satuan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($units as $uni): ?>
                  <tr>
                    <td><?php echo $uni['nama_satuan']; ?></td>
                    <td>
                      <a href="<?php echo base_url('barang/hapus_satuan/'.$uni['id_satuan']); ?>">Delete</a>
                      <a href="<?php echo base_url('barang/ubah_satuan/'.$uni['id_satuan']); ?>">Edit</a>
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