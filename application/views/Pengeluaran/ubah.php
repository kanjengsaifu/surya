<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">            
            <?php echo form_open('pengeluaran/ubah/'.$expense['id_pengeluaran']); ?>
              <div class="box-body">
                <div class="form-group <?php if (form_error('nama_pengeluaran')){ echo 'has-error'; } ?>">
                  <label>Nama Pengeluaran</label>
                  <input class="form-control" type="text" name="nama_pengeluaran" id="nama_pengeluaran"
                    value="<?php
                    if (isset($_POST['nama_pengeluaran']))
                    {
                      echo $_POST['nama_pengeluaran'];
                    } else {
                      echo $expense['nama_pengeluaran'];
                    }
                  ?>">
                  <?php echo form_error('nama_pengeluaran'); ?>
                </div>
                <div class="form-group <?php if (form_error('jenis_pengeluaran')){ echo 'has-error'; } ?>">
                  <label>Jenis Pengeluaran</label>
                  <select name="jenis_pengeluaran" id="jenis_pengeluaran" class="form-control" style="width: 100%;">
                    <option></option>
                    <option value="tak_terkendali"
                      <?php
                      if (isset($_POST['jenis_pengeluaran']))
                      {
                        if ($_POST['jenis_pengeluaran'] == 'tak_terkendali') {
                          echo 'selected="selected"';
                        }
                      } elseif ($expense['jenis_pengeluaran'] == 'tak_terkendali') {
                        echo 'selected="selected"';
                      }
                    ?>>Pengeluaran Tak Terkendali</option>
                    <option value="overhead"
                      <?php
                      if (isset($_POST['jenis_pengeluaran']))
                      {
                        if ($_POST['jenis_pengeluaran'] == 'overhead') {
                          echo 'selected="selected"';
                        }
                      } elseif ($expense['jenis_pengeluaran'] == 'overhead') {
                        echo 'selected="selected"';
                      }
                    ?>>Pengeluaran Overhead</option>
                  </select>
                  <?php echo form_error('jenis_pengeluaran');?>
                </div>
                <div class="form-group <?php if (form_error('total')){ echo 'has-error'; } ?>">
                  <label>Total Pengeluaran</label>
                  <input class="form-control" type="number" name="total" id="total"
                    value="<?php
                    if (isset($_POST['total']))
                    {
                      echo $_POST['total'];
                    } else {
                      echo $expense['total'];
                    }
                  ?>">
                  <?php echo form_error('total');?>
                </div>
                <div class="form-group <?php if (form_error('tanggal')){ echo 'has-error'; } ?>">
                  <label>Tanggal Pengeluaran</label>
                  <input class="form-control" type="date" name="tanggal" id="tanggal"
                    value="<?php
                    if (isset($_POST['tanggal']))
                    {
                      echo $_POST['tanggal'];
                    } else {
                      echo $expense['tanggal'];
                    }
                  ?>">
                  <?php echo form_error('tanggal');?>
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