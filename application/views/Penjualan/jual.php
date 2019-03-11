<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <?php echo form_open('penjualan/jual'); ?>
              <div class="box-body">
                <div class="form-group <?php if (form_error('id_customer')){ echo 'has-error'; } ?>">
                  <label>Customer</label>
                  <select name="id_customer" id="id_customer" class="form-control" style="width: 100%;">
                    <option></option>
                    <?php foreach($customers as $ctm): ?>
                    <option value="<?php echo $ctm['id_customer'] ?>"
                      <?php
                      if (isset($_POST['id_customer']))
                      {
                        if ($_POST['id_customer'] == $ctm['id_customer']) {
                          echo 'selected="selected"';
                        }
                      }
                    ?>><?php echo $ctm['nama_customer'] ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('id_customer');?>
                </div>
                <div class="form-group <?php if (form_error('tanggal')){ echo 'has-error'; } ?>">
                  <label>Tanggal</label>
                  <input type="date" name="tanggal" id="tanggal" class="form-control"
                    value="<?php
                    if (isset($_POST['tanggal']))
                    {
                      echo $_POST['tanggal'];
                    }
                  ?>">
                  <?php echo form_error('tanggal');?>
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

  <script>
    var tanggal = document.getElementById('tanggal')
    tanggal.valueAsDate = new Date()
  </script>