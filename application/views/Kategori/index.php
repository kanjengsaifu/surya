<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <a class="btn btn-primary" href="<?php echo base_url('Barang/tambah_kategori'); ?>">Add Category</a>
          </div>
          <div class="box-body">
            <table class="table table-bordered table-hover" id="tabel">
              <thead>
                <tr>
                  <th>Nama Kategori</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($categories as $cat): ?>
                <tr>
                  <td><?php echo $cat['nama_kategori']; ?></td>
                  <td>
                    <a href="<?php echo base_url('barang/hapus_kategori/'.$cat['id_kategori']); ?>">Delete</a>
                    <a href="<?php echo base_url('barang/ubah_kategori/'.$cat['id_kategori']); ?>">Edit</a>
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