<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">            
            <?php echo form_open('pelanggan/tambah'); ?>
              <div class="box-body">
                <div class="form-group <?php if (form_error('nama_customer')){ echo 'has-error'; } ?>">
                  <label>Nama Customer</label>
                  <input class="form-control" type="text" name="nama_customer" id="nama_customer"
                    value="<?php
                    if (isset($_POST['nama_customer']))
                    {
                      echo $_POST['nama_customer'];
                    }
                  ?>">
                  <?php echo form_error('nama_customer');?>
                </div>
                <div class="form-group <?php if (form_error('jenis_kelamin')){ echo 'has-error'; } ?>">
                <label>Jenis Kelamin</label>
                  <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option></option>
                    <option value="Laki-laki"
                      <?php
                      if (isset($_POST['jenis_kelamin']))
                      {
                        if ($_POST['jenis_kelamin'] == 'Laki-laki') {
                          echo 'selected="selected"';
                        }
                      }
                    ?>>Laki-laki</option>
                    <option value="Perempuan"
                      <?php
                      if (isset($_POST['jenis_kelamin']))
                      {
                        if ($_POST['jenis_kelamin'] == 'Perempuan') {
                          echo 'selected="selected"';
                        }
                      }
                    ?>>Perempuan</option>
                  </select>
                  <?php echo form_error('jenis_kelamin'); ?>
                </div>
                <div class="form-group <?php if (form_error('tanggal_lahir')){ echo 'has-error'; } ?>">
                  <label>Tanggal Lahir</label>
                  <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                    value="<?php
                    if (isset($_POST['tanggal_lahir']))
                    {
                      echo $_POST['tanggal_lahir'];
                    }
                  ?>">
                  <?php echo form_error('tanggal_lahir');?>
                </div>
                <div class="form-group <?php if (form_error('telp_customer')){ echo 'has-error'; } ?>">
                  <label>No Telepon</label>
                  <input class="form-control" type="number" name="telp_customer" id="telp_customer"
                    value="<?php
                    if (isset($_POST['telp_customer']))
                    {
                      echo $_POST['telp_customer'];
                    }
                  ?>">
                  <?php echo form_error('telp_customer');?>
                </div>
                <div class="form-group <?php if (form_error('email')){ echo 'has-error'; } ?>">
                  <label>Email</label>
                  <input class="form-control" type="email" name="email" id="email"
                    value="<?php
                    if (isset($_POST['email']))
                    {
                      echo $_POST['email'];
                    }
                  ?>">
                  <?php echo form_error('email');?>
                </div>
                <div class="form-group <?php if (form_error('alamat_customer')){ echo 'has-error'; } ?>">
                  <label>Alamat</label>
                  <input class="form-control" type="text" name="alamat_customer" id="alamat_customer"
                    value="<?php
                    if (isset($_POST['alamat_customer']))
                    {
                      echo $_POST['alamat_customer'];
                    }
                  ?>">
                  <?php echo form_error('alamat_customer');?>
                </div>
                <div class="form-group <?php if (form_error('kota')){ echo 'has-error'; } ?>">
                  <label>Kota</label>
                  <input class="form-control" type="text" name="kota" id="kota"
                    value="<?php
                    if (isset($_POST['kota']))
                    {
                      echo $_POST['kota'];
                    }
                  ?>">
                  <?php echo form_error('kota');?>
                </div>
                <div class="form-group <?php if (form_error('kode_pos')){ echo 'has-error'; } ?>">
                  <label>Kode Pos</label>
                  <input class="form-control" type="number" name="kode_pos" id="kode_pos"
                    value="<?php
                    if (isset($_POST['kode_pos']))
                    {
                      echo $_POST['kode_pos'];
                    }
                  ?>">
                  <?php echo form_error('kode_pos');?>
                </div>
                <div class="form-group <?php if (form_error('catatan')){ echo 'has-error'; } ?>">
                  <label>Catatan</label>
                  <input class="form-control" type="text" name="catatan" id="catatan"
                    value="<?php
                    if (isset($_POST['catatan']))
                    {
                      echo $_POST['catatan'];
                    }
                  ?>">
                  <?php echo form_error('catatan');?>
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

  <script>
    var myInput = document.getElementById('telp_customer')
    myInput.oninput = function () {
    if (this.value.length > 13) {
        this.value = this.value.slice(0,13); 
      }
    }
  </script>