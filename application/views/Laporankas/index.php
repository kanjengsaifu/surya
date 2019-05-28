<div class="content-wrapper">
  <section class="content-header">
    <h1><?=$title?></h1>
  </section>

  <section class="content">
    <div class="row">
      <div class="cols-xs-12">
        <div class="box">
          <div class="box-body">
            <div class="form-group">
              <label>Total Kas Masuk</label>
              <input type="text" readonly class="form-control" id="kas_masuk" value="<?php echo $kas_masuk; ?>">
            </div>
            <div class="form-group">
              <label>Total Kas Keluar</label>
              <input type="text" readonly class="form-control" id="kas_keluar" value="<?php echo $kas_keluar; ?>">
            </div>
            <div class="form-group">
              <label>Total Kas Perusahaan</label>
              <input type="text" readonly class="form-control" id="total" value="<?php echo $kas_masuk -  $kas_keluar; ?>">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>