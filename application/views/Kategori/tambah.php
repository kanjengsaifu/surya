<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">            
            <?php echo form_open('Barang/tambah_kategori'); ?>
              <div class="box-body">
                <div class="form-group <?php if (form_error('nama_kategori')){ echo 'has-error'; } ?>">
                  <label>Nama Kategori</label>
                  <input class="form-control" type="text" name="nama_kategori" id="nama_kategori"
                    value="<?php
                    if (isset($_POST['nama_kategori']))
                    {
                      echo $_POST['nama_kategori'];
                    }
                  ?>">
                  <?php echo form_error('nama_kategori');?>
                </div>
              </div>
              <div class="box-footer">
                <button class="btn btn-primary" type="submit">Submit</button>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </section>
  </div>