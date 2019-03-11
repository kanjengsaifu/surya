<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3>List Barang</h3>
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Harga Jual</th>
                    <th>Total Harga</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach($purchases as $sel): ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <?php $no++; ?>
                    <td><?php echo $sel['nama_barang']; ?></td>
                    <td><?php echo $sel['jumlah']; ?></td>
                    <td><?php echo $sel['harga_jual']; ?></td>
                    <td><?php echo $sel['jumlah'] * $sel['harga_jual']; ?></td>
                    <td><?php echo $sel['keterangan']; ?></td>
                    <td>
                      <a class="text-danger" href="<?php echo base_url('pembelian/batal/'.$id_invoice.'/'.$sel['id_pembelian']); ?>">Batal</a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <?php echo form_open('pembelian/tambah/'.$id_invoice); ?>
              <div class="box-body">
                <div class="form-group <?php if (form_error('id_barang')){ echo 'has-error'; } ?>">
                  <label>Barang</label>
                  <select name="id_barang" id="id_barang" onChange="ubahBarang();" class="form-control" style="width: 100%;">
                    <option></option>
                    <?php foreach($items as $itm): ?>
                    <option value="<?php echo $itm['id_barang'] ?>"
                      <?php
                      if (isset($_POST['id_barang']))
                      {
                        if ($_POST['id_barang'] == $itm['id_barang']) {
                          echo 'selected="selected"';
                        }
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
                      if (isset($_POST['id_barang']))
                      {
                        if ($_POST['id_barang'] == $itm['id_barang']) {
                          echo 'selected="selected"';
                        }
                      }
                    ?>><?php echo $itm['harga_jual'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group <?php if (form_error('jumlah')){ echo 'has-error'; } ?>">
                  <label>Jumlah Dibeli</label>
                  <input type="number" name="jumlah" id="jumlah" min="0" onkeyup="jumlahUbah();" onchange="jumlahUbah();" class="form-control"
                    value="<?php
                    if (isset($_POST['jumlah']))
                    {
                      echo $_POST['jumlah'];
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
                    }
                  ?>">
                  <?php echo form_error('keterangan');?>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Tambah Barang</button>
                <a class="btn btn-success" href="<?php echo base_url('pembelian/detail/'.$id_invoice); ?>">Selesai</a>
              </div>
            <?php echo form_close(); ?>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script>
    var total = document.getElementById('total')
    var jumlah = document.getElementById('jumlah')
    var harga = document.getElementById('harga_barang')
    var barang = document.getElementById('id_barang')

    total.value = parseInt(harga.options[harga.selectedIndex].text) * parseInt(jumlah.value)

    function ubahBarang() {
      harga.value = barang.value
      jumlah.value = ''
      total.value = ''
    }

    function jumlahUbah() {
      total.value = parseInt(harga.options[harga.selectedIndex].text) * parseInt(jumlah.value)
    }
  </script>