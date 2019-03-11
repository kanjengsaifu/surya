<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">            
            <?php echo form_open('karyawan/ubah/'.$employee['id_karyawan']); ?>
              <div class="box-body">
                <div class="form-group <?php if (form_error('nama_karyawan')){ echo 'has-error'; } ?>">
                  <label>Nama Karyawan</label>
                  <input class="form-control" type="text" name="nama_karyawan" id="nama_karyawan"
                    value="<?php
                      if (isset($_POST['nama_karyawan']))
                      {
                        echo $_POST['nama_karyawan'];
                      } else {
                        echo $employee['nama_karyawan'];
                      }
                    ?>">
                  <?php echo form_error('nama_karyawan');?>
                </div>
                <div class="form-group <?php if (form_error('tempat_lahir')){ echo 'has-error'; } ?>">
                  <label>Tempat Lahir</label>
                  <input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir"
                    value="<?php
                      if (isset($_POST['tempat_lahir']))
                      {
                        echo $_POST['tempat_lahir'];
                      } else {
                        echo $employee['tempat_lahir'];
                      }
                    ?>">
                  <?php echo form_error('tempat_lahir');?>
                </div>
                <div class="form-group <?php if (form_error('tanggal_lahir')){ echo 'has-error'; } ?>">
                  <label>Tanggal Lahir</label>
                  <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir"
                    value="<?php
                      if (isset($_POST['tanggal_lahir']))
                      {
                        echo $_POST['tanggal_lahir'];
                      } else {
                        echo $employee['tanggal_lahir'];
                      }
                    ?>">
                  <?php echo form_error('tanggal_lahir');?>
                </div>
                <div class="form-group <?php if (form_error('alamat_karyawan')){ echo 'has-error'; } ?>">
                  <label>Alamat Karyawan</label>
                  <input class="form-control" type="text" name="alamat_karyawan" id="alamat_karyawan"
                    value="<?php
                      if (isset($_POST['alamat_karyawan']))
                      {
                        echo $_POST['alamat_karyawan'];
                      } else {
                        echo $employee['alamat_karyawan'];
                      }
                    ?>">
                  <?php echo form_error('alamat_karyawan');?>
                </div>
                <div class="form-group <?php if (form_error('gaji_pokok')){ echo 'has-error'; } ?>">
                  <label>Gaji Pokok</label>
                  <input class="form-control" type="number" name="gaji_pokok" id="gaji_pokok"
                    value="<?php
                      if (isset($_POST['gaji_pokok']))
                      {
                        echo $_POST['gaji_pokok'];
                      } else {
                        echo $employee['gaji_pokok'];
                      }
                    ?>">
                  <?php echo form_error('gaji_pokok');?>
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