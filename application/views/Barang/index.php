<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a class="btn btn-primary" href="<?php echo base_url('Barang/tambah_barang'); ?>">Add Item</a>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover" id="tabel">
                <thead>
                  <tr>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Kategori</th>
                    <th>Merek</th>
                    <th>Satuan</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($items as $itm): ?>
                  <tr>
                    <td><?php echo $itm['nama_barang']; ?></td>
                    <td><?php echo $itm['stok']; ?></td>
                    <td><?php echo $itm['harga_beli']; ?></td>
                    <td><?php echo $itm['harga_jual']; ?></td>
                    <td><?php echo $itm['nama_kategori']; ?></td>
                    <td><?php echo $itm['nama_merek']; ?></td>
                    <td><?php echo $itm['nama_satuan']; ?></td>
                    <td><?php echo $itm['keterangan']; ?></td>
                    <td>
                      <a href="<?php echo base_url('barang/hapus_barang/'.$itm['id_barang']); ?>">Delete</a>
                      <a href="<?php echo base_url('barang/ubah_barang/'.$itm['id_barang']); ?>">Edit</a>
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