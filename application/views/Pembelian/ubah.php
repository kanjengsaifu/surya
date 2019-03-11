<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <?php echo form_open('pembelian/ubah/'.$purchase['id_pembelian']); ?>
              <div class="box-body">
                <div class="form-group <?php if (form_error('id_supplier')){ echo 'has-error'; } ?>">
                  <label>Supplier</label>
                  <select name="id_supplier" id="id_supplier" class="form-control" style="width: 100%;">
                    <option></option>
                    <?php foreach($suppliers as $ctm): ?>
                    <option value="<?php echo $ctm['id_supplier'] ?>"
                      <?php
                        if (isset($_POST['id_supplier'])) {
                          if ($ctm['id_supplier'] == $_POST['id_supplier']) {
                            echo 'selected="selected"';
                          }
                        } else if ($ctm['id_supplier'] == $purchase['id_supplier']) {
                          echo 'selected="selected"';
                        }
                      ?>><?php echo $ctm['nama_supplier'] ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?php echo form_error('id_supplier');?>
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
                        } else if ($itm['id_barang'] == $purchase['id_barang']) {
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
                        } else if ($itm['id_barang'] == $purchase['id_barang']) {
                          echo 'selected="selected"';
                        }
                      ?>><?php echo $itm['harga_jual'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <!-- <select name="stok" id="stok" onChange="ubahStok();" hidden>
                  <?php foreach($items as $itm): ?>
                  <option value="<?php echo $itm['id_barang'] ?>" <?php if ($itm['id_barang'] == $purchase['id_barang']) { echo 'selected="selected"'; } ?>><?php echo $itm['stok'] ?></option>
                  <?php endforeach; ?>
                </select> -->
                <div class="form-group <?php if (form_error('jumlah')){ echo 'has-error'; } ?>">
                  <label>Jumlah Dibeli</label>
                  <input type="number" name="jumlah" id="jumlah" min="0" onkeyup="jumlahUbah();" onchange="jumlahUbah();" class="form-control"
                    value="<?php
                      if (isset($_POST['jumlah']))
                      {
                        echo $_POST['jumlah'];
                      } else {
                        echo $purchase['jumlah'];
                      }
                    ?>">
                    <?php echo form_error('jumlah');?>
                </div>
                <div class="form-group">
                  <label>Total Harga</label>
                  <input type="number" id="total" disabled="disabled" class="form-control">
                </div>
                <div class="form-group <?php if (form_error('tanggal_pembelian')){ echo 'has-error'; } ?>">
                  <label>Tanggal Pembelian</label>
                  <input type="date" name="tanggal_pembelian" id="tanggal_pembelian" class="form-control"
                    value="<?php
                      if (isset($_POST['tanggal_pembelian']))
                      {
                        echo $_POST['tanggal_pembelian'];
                      } else {
                        echo $purchase['tanggal_pembelian'];
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
    // TODO: logika buat ubah pembelian masih salah, masalah di stoknya
    var total = document.getElementById('total')
    var jumlah = document.getElementById('jumlah')
    var harga = document.getElementById('harga_barang')
    var stok = document.getElementById('stok')
    var barang = document.getElementById('id_barang')
    // var tanggal = document.getElementById('tanggal_pembelian')

    total.value = parseInt(harga.options[harga.selectedIndex].text) * parseInt(jumlah.value)
    // jumlah.max = parseInt(stok.options[stok.selectedIndex].text)
    // tanggal.valueAsDate = new Date()

    function ubahBarang() {
      harga.value = barang.value
      stok.value = barang.value
      // jumlah.max = stok.options[stok.selectedIndex].text
      jumlah.value = ''
      total.value = ''
    }

    function jumlahUbah() {
      total.value = parseInt(harga.options[harga.selectedIndex].text) * parseInt(jumlah.value)
      // if (jumlah.value > stok.options[stok.selectedIndex].text) {
      //   jumlah.value = ''
      // } else {
      // }
    }
  </script>