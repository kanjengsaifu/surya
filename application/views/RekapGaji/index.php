<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h4>Ganti bulan</h4>
              <select class="form-control" name="bulan" id="bulan" onchange="changeBulan(this)" style="width: 100%;">
                <option>-- Pilih Bulan --</option>
                <option value="januari" <?php if($bulan == 'januari'){echo 'selected="selected"';} ?>>Januari</option>
                <option value="februari" <?php if($bulan == 'februari'){echo 'selected="selected"';} ?>>Februari</option>
                <option value="maret" <?php if($bulan == 'maret'){echo 'selected="selected"';} ?>>Maret</option>
                <option value="april" <?php if($bulan == 'april'){echo 'selected="selected"';} ?>>April</option>
                <option value="mei" <?php if($bulan == 'mei'){echo 'selected="selected"';} ?>>Mei</option>
                <option value="juni" <?php if($bulan == 'juni'){echo 'selected="selected"';} ?>>Juni</option>
                <option value="juli" <?php if($bulan == 'juli'){echo 'selected="selected"';} ?>>Juli</option>
                <option value="agustus" <?php if($bulan == 'agustus'){echo 'selected="selected"';} ?>>Agustus</option>
                <option value="september" <?php if($bulan == 'september'){echo 'selected="selected"';} ?>>September</option>
                <option value="oktober" <?php if($bulan == 'oktober'){echo 'selected="selected"';} ?>>Oktober</option>
                <option value="november" <?php if($bulan == 'november'){echo 'selected="selected"';} ?>>November</option>
                <option value="desember" <?php if($bulan == 'desember'){echo 'selected="selected"';} ?>>Desember</option>
              </select>
              <a class="btn btn-primary" href="#" id="pindah" style="display: none;">Ganti</a>
            </div>
          </div>
          <div class="box">
            <div class="box-header">
              <h3>Daftar Karyawan</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Nama Karyawan</th>
                    <th>Gaji Pokok</th>
                    <?php if($this->session->userdata('status') == 0): ?>
                    <th>Aksi</th>
                    <?php endif; ?>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($employees as $emp): ?>
                  <tr>
                    <td><?php echo $emp['nama_karyawan']; ?></td>
                    <td><?php echo $emp['gaji_pokok']; ?></td>
                    <?php if($this->session->userdata('status') == 0): ?>
                    <td>
                      <a class="btn btn-primary" href="<?php echo base_url('rekapgaji/hadir/'.$emp['id_karyawan']); ?>">Hadir</a>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kasbonModalAtas<?php echo $emp['id_karyawan']; ?>">Kasbon</button>
                      <!-- Trigger modal -->
                      <div class="modal fade" id="kasbonModalAtas<?php echo $emp['id_karyawan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle<?php echo $emp['id_karyawan']; ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle<?php echo $emp['id_karyawan']; ?>">Tambah Data Kasbon</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <?php echo form_open('rekapgaji/kasbon/'.$emp['id_karyawan']); ?>
                                <div class="form-group">
                                <label>Jumlah kasbon</label>
                                <input class="form-control" type="number" name="kasbon" placeholder="Jumlah kasbon">
                              </div>
                              <button style="display: none;" type="submit" id="<?php echo $emp['id_karyawan']; ?>button">Submit</button>
                              <?php echo form_close(); ?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary" onclick="document.getElementById('<?php echo $emp['id_karyawan']; ?>button').click();">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <?php endif; ?>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="box">
            <div class="box-header">
              <?php if (isset($bulan)): ?>
              <a class="btn btn-primary" href="<?php echo base_url('rekapgaji/laporan/'.$bulan); ?>">Cetak Laporan</a>
              <?php else: ?>
              <a class="btn btn-primary" href="<?php echo base_url('rekapgaji/laporan'); ?>">Cetak Laporan</a>
              <?php endif; ?>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover" id="tabel">
                <thead>
                  <tr>
                    <th>Nama Karyawan</th>
                    <th>Jumlah Presensi</th>
                    <th>Kasbon</th>
                    <?php if($this->session->userdata('status') == 0): ?>
                    <th>Aksi</th>
                    <?php endif; ?>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($salaries as $emp): ?>
                  <tr>
                    <td><?php echo $emp['nama_karyawan']; ?></td>
                    <td><?php echo $emp['presensi']; ?></td>
                    <td><?php echo $emp['kasbon']; ?></td>
                    <?php if($this->session->userdata('status') == 0): ?>
                    <td>
                      <a class="btn btn-primary"  href="<?php echo base_url('rekapgaji/hadir/'.$emp['id_karyawan']); ?>">Hadir</a>
                      <a class="btn btn-warning"  href="<?php echo base_url('rekapgaji/ubah/'.$emp['id_rekap']); ?>">Ubah</a>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#kasbonModalBawah<?php echo $emp['id_karyawan']; ?>">Kasbon</button>
                      <!-- Trigger modal -->
                      <div class="modal fade" id="kasbonModalBawah<?php echo $emp['id_karyawan']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle<?php echo $emp['id_karyawan']; ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle<?php echo $emp['id_karyawan']; ?>">Tambah Data Kasbon</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <?php echo form_open('rekapgaji/kasbon/'.$emp['id_karyawan']); ?>
                                <div class="form-group">
                                <label>Jumlah kasbon</label>
                                <input class="form-control" type="number" name="kasbon" placeholder="Jumlah kasbon">
                              </div>
                              <button style="display: none;" type="submit" id="<?php echo $emp['id_karyawan']; ?>button">Submit</button>
                              <?php echo form_close(); ?>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-primary" onclick="document.getElementById('<?php echo $emp['id_karyawan']; ?>button').click();">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <?php endif; ?>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script>
  var bulan
  var linkPindah = document.getElementById('pindah')
  var base_link = '<?php echo base_url('rekapgaji/index/') ?>'

  function changeBulan(select){
    bulan = select.value
    pindah.href = base_link.concat(bulan)
    pindah.click()
  }
  </script>
  