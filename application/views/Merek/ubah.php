<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">            
            <?php echo form_open('Barang/ubah_merek/'.$brand['id_merek']); ?>
              <div class="box-body">
                <div class="form-group <?php if (form_error('nama_merek')){ echo 'has-error'; } ?>">
                  <label>Nama Merek</label>
                  <input class="form-control" type="text" name="nama_merek" id="nama_merek"
                    value="<?php
                      if (isset($_POST['nama_merek']))
                      {
                        echo $_POST['nama_merek'];
                      } else {
                        echo $brand['nama_merek'];
                      }
                    ?>">
                  <?php echo form_error('nama_merek');?>
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