<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">            
            <?php echo form_open('Barang/tambah_barang'); ?>
            <div class="box-body">
              <div class="form-group <?php if (form_error('nama_barang')){ echo 'has-error'; } ?>">
                <label>Nama Barang</label>
                <input class="form-control" type="text" name="nama_barang" id="nama_barang"
                  value="<?php
                  if (isset($_POST['nama_barang']))
                  {
                    echo $_POST['nama_barang'];
                  }
                ?>">
                <?php echo form_error('nama_barang'); ?>
              </div>
              <div class="form-group <?php if (form_error('stok')){ echo 'has-error'; } ?>">
                <label>Stok Barang</label>
                <input class="form-control" type="number" name="stok" id="stok"
                  value="<?php
                  if (isset($_POST['stok']))
                  {
                    echo $_POST['stok'];
                  }
                ?>">
                <?php echo form_error('stok'); ?>
              </div>
              <div class="form-group <?php if (form_error('harga_beli')){ echo 'has-error'; } ?>">
                <label>Harga Beli</label>
                <input class="form-control" type="number" name="harga_beli" id="harga_beli"
                  value="<?php
                  if (isset($_POST['harga_beli']))
                  {
                    echo $_POST['harga_beli'];
                  }
                ?>">
                <?php echo form_error('harga_beli'); ?>
              </div>
              <div class="form-group <?php if (form_error('harga_jual')){ echo 'has-error'; } ?>">
                <label>Harga Jual</label>
                <input class="form-control" type="number" name="harga_jual" id="harga_jual"
                  value="<?php
                  if (isset($_POST['harga_jual']))
                  {
                    echo $_POST['harga_jual'];
                  }
                ?>">
                <?php echo form_error('harga_jual'); ?>
              </div>
              <div class="form-group <?php if (form_error('keterangan')){ echo 'has-error'; } ?>">
                <label>Keterangan</label>
                <input class="form-control" type="text" name="keterangan" id="keterangan"
                  value="<?php
                  if (isset($_POST['keterangan']))
                  {
                    echo $_POST['keterangan'];
                  }
                ?>">
                <?php echo form_error('keterangan'); ?>
              </div>
              <div class="form-group <?php if (form_error('id_kategori')){ echo 'has-error'; } ?>">
                <label>Kategori Barang</label>
                  <select name="id_kategori" id="id_kategori" class="form-control">
                    <option></option>
                    <?php foreach($categories as $cat): ?>
                    <option value="<?php echo $cat['id_kategori'] ?>"
                      <?php
                      if (isset($_POST['id_kategori']))
                      {
                        if ($_POST['id_kategori'] == $cat['id_kategori']) {
                          echo 'selected="selected"';
                        }
                      }
                    ?>><?php echo $cat['nama_kategori'] ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('id_kategori'); ?>
              </div>
              <div class="form-group <?php if (form_error('id_merek')){ echo 'has-error'; } ?>">
                <label>Merek</label>
                <select name="id_merek" id="id_merek" class="form-control">
                  <option></option>
                  <?php foreach($brands as $brd): ?>
                  <option value="<?php echo $brd['id_merek'] ?>"
                    <?php
                    if (isset($_POST['id_merek']))
                    {
                      if ($_POST['id_merek'] == $brd['id_merek']) {
                        echo 'selected="selected"';
                      }
                    }
                  ?>><?php echo $brd['nama_merek'] ?></option>
                  <?php endforeach; ?>
                </select>
                <?php echo form_error('id_merek'); ?>
              </div>
              <div class="form-group <?php if (form_error('id_satuan')){ echo 'has-error'; } ?>">
                <label>Satuan Barang</label>
                <select name="id_satuan" id="id_satuan" class="form-control">
                  <option></option>
                  <?php foreach($units as $uni): ?>
                  <option value="<?php echo $uni['id_satuan'] ?>"
                    <?php
                    if (isset($_POST['id_satuan']))
                    {
                      if ($_POST['id_satuan'] == $uni['id_satuan']) {
                        echo 'selected="selected"';
                      }
                    }
                  ?>><?php echo $uni['nama_satuan'] ?></option>
                  <?php endforeach; ?>
                </select>
                <?php echo form_error('id_satuan'); ?>
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </section>
  </div>