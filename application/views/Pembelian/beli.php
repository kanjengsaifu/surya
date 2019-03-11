<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <?php echo form_open('pembelian/beli'); ?>
              <div class="box-body">
                <div class="form-group <?php if (form_error('id_supplier')){ echo 'has-error'; } ?>">
                  <label>Supplier</label>
                  <select name="id_supplier" id="id_supplier" class="form-control" style="width: 100%;">
                    <option></option>
                    <?php foreach($suppliers as $ctm): ?>
                    <option value="<?php echo $ctm['id_supplier'] ?>"
                      <?php
                      if (isset($_POST['id_supplier']))
                      {
                        if ($_POST['id_supplier'] == $ctm['id_supplier']) {
                          echo 'selected="selected"';
                        }
                      }
                    ?>><?php echo $ctm['nama_supplier'] ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('id_supplier');?>
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