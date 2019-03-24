<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a class="btn btn-primary" href="<?php echo base_url('Barang/tambah_merek'); ?>">Add Brand</a>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover" id="tabel">
                <thead>
                  <tr>
                    <th>Nama Merek</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($brands as $brd): ?>
                  <tr>
                    <td><?php echo $brd['nama_merek']; ?></td>
                    <td>
                      <a class="text-danger" href="<?php echo base_url('barang/hapus_merek/'.$brd['id_merek']); ?>">Delete</a>
                      <a href="<?php echo base_url('barang/ubah_merek/'.$brd['id_merek']); ?>">Edit</a>
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