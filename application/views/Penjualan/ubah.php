<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <?php echo form_open('penjualan/ubah/'.$sale['id_penjualan']); ?>
              <div class="box-body">
                <div class="form-group <?php if (form_error('id_customer')){ echo 'has-error'; } ?>">
                  <label>Customer</label>
                  <select name="id_customer" id="id_customer" class="form-control" style="width: 100%;">
                    <option></option>
                    <?php foreach($customers as $ctm): ?>
                    <option value="<?php echo $ctm['id_customer'] ?>"
                      <?php
                        if (isset($_POST['id_customer'])) {
                          if ($ctm['id_customer'] == $_POST['id_customer']) {
                            echo 'selected="selected"';
                          }
                        } else if ($ctm['id_customer'] == $sale['id_customer']) {
                          echo 'selected="selected"';
                        }
                      ?>><?php echo $ctm['nama_customer'] ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('id_customer');?>
                </div>
                <div class="form-group <?php if (form_error('id_barang')){ echo 'has-error'; } ?>">
                  <label>Barang</label>
                  <select name="id_barang" id="id_barang" onChange="ubahBarang();" class="form-control" style="width: 100%;">
                    <option></option>
                    <?php foreach($items as $itm): ?>
                    <option value="<?php echo $itm['id_barang'] ?>"
                      <?php
                        if (isset($_POST['id_barang'])) {
                          if ($itm['id_barang'] == $_POST['id_barang']) {
                            echo 'selected="selected"';
                          }
                        } else if ($itm['id_barang'] == $sale['id_barang']) {
                          echo 'selected="selected"';
                        }
                      ?>><?php echo $itm['nama_barang'] ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('id_barang');?>
                </div>
                <div class="form-group">
                  <label>Harga Barang</label>
                  <select id="harga_barang" disabled="disabled" class="form-control" style="width: 100%;">
                    <option>Harga Barang</option>
                    <?php foreach($items as $itm): ?>
                    <option value="<?php echo $itm['id_barang'] ?>"
                      <?php
                        if (isset($_POST['id_barang'])) {
                          if ($itm['id_barang'] == $_POST['id_barang']) {
                            echo 'selected="selected"';
                          }
                        } else if ($itm['id_barang'] == $sale['id_barang']) {
                          echo 'selected="selected"';
                        }
                      ?>><?php echo $itm['harga_beli'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <select name="stok" id="stok" onChange="ubahStok();" hidden>
                  <?php foreach($items as $itm): ?>
                  <option value="<?php echo $itm['id_barang'] ?>"
                    <?php
                      if (isset($_POST['id_barang'])) {
                        if ($itm['id_barang'] == $_POST['id_barang']) {
                          echo 'selected="selected"';
                        }
                      } else if ($itm['id_barang'] == $sale['id_barang']) {
                        echo 'selected="selected"';
                      }
                    ?>><?php echo $itm['stok'] ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="form-group <?php if (form_error('jumlah')){ echo 'has-error'; } ?>">
                  <label>Jumlah Dibeli</label>
                  <input type="number" name="jumlah" id="jumlah" min="0" onkeyup="jumlahUbah();" onchange="jumlahUbah();" max="0" class="form-control"
                    value="<?php
                      if (isset($_POST['jumlah']))
                      {
                        echo $_POST['jumlah'];
                      } else {
                        echo $sale['jumlah'];
                      }
                    ?>">
                  <?php echo form_error('jumlah');?>
                </div>
                <div class="form-group">
                  <label>Total Harga</label>
                  <input type="number" id="total" disabled="disabled" class="form-control">
                </div>
                <div class="form-group <?php if (form_error('keterangan')){ echo 'has-error'; } ?>">
                  <label>Keterangan</label>
                  <input type="text" name="keterangan" id="keterangan" class="form-control"
                    value="<?php
                      if (isset($_POST['keterangan']))
                      {
                        echo $_POST['keterangan'];
                      } else {
                        echo $sale['keterangan'];
                      }
                    ?>">
                  <?php echo form_error('keterangan');?>
                </div>
                <div class="form-group <?php if (form_error('tanggal_penjualan')){ echo 'has-error'; } ?>">
                  <label>Tanggal Pembelian</label>
                  <input type="date" name="tanggal_penjualan" id="tanggal_penjualan" class="form-control"
                    value="<?php
                      if (isset($_POST['tanggal_penjualan']))
                      {
                        echo $_POST['tanggal_penjualan'];
                      } else {
                        echo $sale['tanggal_penjualan'];
                      }
                    ?>">
                  <?php echo form_error('tanggal_pembelian');?>
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
    // TODO: logika buat ubah penjualan masih salah, masalah di stoknya
    var total = document.getElementById('total')
    var jumlah = document.getElementById('jumlah')
    var harga = document.getElementById('harga_barang')
    var stok = document.getElementById('stok')
    var barang = document.getElementById('id_barang')

    total.value = harga.options[harga.selectedIndex].text * jumlah.value
    jumlah.max = stok.options[stok.selectedIndex].text
    if (barang.value == '') {
      jumlah.value = ''
    }

    function ubahBarang() {
      harga.value = barang.value
      stok.value = barang.value
      jumlah.max = parseInt(stok.options[stok.selectedIndex].text)
      jumlah.value = ''
      total.value = ''
    }

    function jumlahUbah() {
      var jml = parseInt(jumlah.value)
      var stk = parseInt(stok.options[stok.selectedIndex].text)
      var hrg = parseInt(harga.options[harga.selectedIndex].text)
      if (jml > stk) {
        jumlah.value = ''
        total.value = ''
      } else {
        total.value = hrg * jml
      }
    }
  </script>