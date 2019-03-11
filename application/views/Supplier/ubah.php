<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">            
            <?php echo form_open('supplier/ubah/'.$supplier['id_supplier']); ?>
              <div class="box-body">
                <div class="form-group <?php if (form_error('nama_supplier')){ echo 'has-error'; } ?>">
                  <label>Nama Supplier</label>
                  <input class="form-control" type="text" name="nama_supplier" id="nama_supplier"
                    value="<?php
                      if (isset($_POST['nama_supplier']))
                      {
                        echo $_POST['nama_supplier'];
                      } else {
                        echo $supplier['nama_supplier'];
                      }
                    ?>">
                  <?php echo form_error('nama_supplier');?>
                </div>
                <div class="form-group <?php if (form_error('alamat_supplier')){ echo 'has-error'; } ?>">
                  <label>Alamat Supplier</label>
                  <input class="form-control" type="text" name="alamat_supplier" id="alamat_supplier"
                    value="<?php
                      if (isset($_POST['alamat_supplier']))
                      {
                        echo $_POST['alamat_supplier'];
                      } else {
                        echo $supplier['alamat_supplier'];
                      }
                    ?>">
                  <?php echo form_error('alamat_supplier');?>
                </div>
                <div class="form-group <?php if (form_error('telp_supplier')){ echo 'has-error'; } ?>">
                  <label>Telp Supplier</label>
                  <input class="form-control" type="number" name="telp_supplier" id="telp_supplier"
                    value="<?php
                      if (isset($_POST['telp_supplier']))
                      {
                        echo $_POST['telp_supplier'];
                      } else {
                        echo $supplier['telp_supplier'];
                      }
                    ?>">
                  <?php echo form_error('telp_supplier');?>
                </div>
                <div class="form-group <?php if (form_error('no_rekening_supplier')){ echo 'has-error'; } ?>">
                  <label>No Rekening Supplier</label>
                  <input class="form-control" type="number" name="no_rekening_supplier" id="no_rekening_supplier"
                    value="<?php
                      if (isset($_POST['no_rekening_supplier']))
                      {
                        echo $_POST['no_rekening_supplier'];
                      } else {
                        echo $supplier['no_rekening_supplier'];
                      }
                    ?>">
                  <?php echo form_error('no_rekening_supplier');?>
                </div>
                <div class="form-group <?php if (form_error('nama_bank')){ echo 'has-error'; } ?>">
                  <label>Nama Bank</label>
                  <input class="form-control" type="text" name="nama_bank" id="nama_bank"
                    value="<?php
                      if (isset($_POST['nama_bank']))
                      {
                        echo $_POST['nama_bank'];
                      } else {
                        echo $supplier['nama_bank'];
                      }
                    ?>">
                  <?php echo form_error('nama_bank');?>
                </div>
                <div class="form-group <?php if (form_error('fax_supplier')){ echo 'has-error'; } ?>">
                  <label>Fax Supplier</label>
                  <input class="form-control" type="text" name="fax_supplier" id="fax_supplier"
                    value="<?php
                      if (isset($_POST['fax_supplier']))
                      {
                        echo $_POST['fax_supplier'];
                      } else {
                        echo $supplier['fax_supplier'];
                      }
                    ?>">
                  <?php echo form_error('fax_supplier');?>
                </div>
                <div class="form-group <?php if (form_error('keterangan')){ echo 'has-error'; } ?>">
                  <label>Keterangan</label>
                  <input class="form-control" type="text" name="keterangan" id="keterangan"
                    value="<?php
                      if (isset($_POST['keterangan']))
                      {
                        echo $_POST['keterangan'];
                      } else {
                        echo $supplier['keterangan'];
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