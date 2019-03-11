<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">            
            <?php echo form_open('Barang/ubah_satuan/'.$unit['id_satuan']); ?>
              <div class="box-body">
                <div class="form-group <?php if (form_error('nama_satuan')){ echo 'has-error'; } ?>">
                  <label>Nama Satuan</label>
                  <input class="form-control" type="text" name="nama_satuan" id="nama_satuan"
                    value="<?php
                      if (isset($_POST['nama_satuan']))
                      {
                        echo $_POST['nama_satuan'];
                      } else {
                        echo $unit['nama_satuan'];
                      }
                    ?>">
                  <?php echo form_error('nama_satuan');?>
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