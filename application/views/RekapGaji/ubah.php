<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">            
            <?php echo form_open('rekapgaji/ubah/'.$salary['id_rekap']); ?>
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Karyawan</label>
                  <input class="form-control" type="text" value="<?php echo $salary['nama_karyawan']; ?>" disabled>
                </div>
                <div class="form-group <?php if (form_error('presensi')){ echo 'has-error'; } ?>">
                  <label>Presensi</label>
                  <input class="form-control" type="number" name="presensi" id="presensi"
                    value="<?php
                      if (isset($_POST['presensi']))
                      {
                        echo $_POST['presensi'];
                      } else {
                        echo $salary['presensi'];
                      }
                    ?>">
                  <?php echo form_error('presensi');?>
                </div>
                <div class="box-footer">
                  <button class="btn btn-primary" type="submit">Submit</button>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </section>
  </div>