<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">            
            <?php echo form_open('pelanggan/ubah/'.$customer['id_customer']); ?>
              <div class="box-body">
                <div class="form-group <?php if (form_error('nama_customer')){ echo 'has-error'; } ?>">
                  <label>Nama Customer</label>
                  <input class="form-control" type="text" name="nama_customer" id="nama_customer"
                    value="<?php
                      if (isset($_POST['nama_customer']))
                      {
                        echo $_POST['nama_customer'];
                      } else {
                        echo $customer['nama_customer'];
                      }
                    ?>">
                  <?php echo form_error('nama_customer');?>
                </div>
                <div class="form-group <?php if (form_error('alamat_customer')){ echo 'has-error'; } ?>">
                  <label>Alamat Customer</label>
                  <input class="form-control" type="text" name="alamat_customer" id="alamat_customer"
                    value="<?php
                      if (isset($_POST['alamat_customer']))
                      {
                        echo $_POST['alamat_customer'];
                      } else {
                        echo $customer['alamat_customer'];
                      }
                    ?>">
                  <?php echo form_error('alamat_customer');?>
                </div>
                <div class="form-group <?php if (form_error('telp_customer')){ echo 'has-error'; } ?>">
                  <label>Telp Customer</label>
                  <input class="form-control" type="number" name="telp_customer" id="telp_customer"
                    value="<?php
                      if (isset($_POST['telp_customer']))
                      {
                        echo $_POST['telp_customer'];
                      } else {
                        echo $customer['telp_customer'];
                      }
                    ?>">
                  <?php echo form_error('telp_customer');?>
                </div>
                <div class="form-group <?php if (form_error('keterangan')){ echo 'has-error'; } ?>">
                  <label>Keterangan</label>
                  <input class="form-control" type="text" name="keterangan" id="keterangan"
                    value="<?php
                      if (isset($_POST['keterangan']))
                      {
                        echo $_POST['keterangan'];
                      } else {
                        echo $customer['keterangan'];
                      }
                    ?>">
                  <?php echo form_error('keterangan');?>
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