<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <?php if($this->session->userdata('status') == 0): ?>
              <a class="btn btn-primary" href="<?php echo base_url('pembelian/beli'); ?>">Add Purchase</a>
              <?php endif; ?>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover" id="tabel">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Invoice</th>
                    <th>Supplier</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  <?php foreach($invoices as $sel): ?>
                  <tr>
                    <td><?php echo $no; ?></td>
                    <?php $no++; ?>
                    <td><strong>#<?php echo $sel['id_invoice']; ?></strong></td>
                    <td><?php echo $sel['nama_supplier']; ?></td>
                    <td><?php echo $sel['tanggal']; ?></td>
                    <td>
                      <a href="<?php echo base_url('pembelian/detail/'.$sel['id_invoice']); ?>">Detail</a><br>
                      <?php if($this->session->userdata('status') == 0): ?>
                      <a class="text-danger" href="<?php echo base_url('pembelian/hapus/'.$sel['id_invoice']); ?>">Hapus</a>
                      <?php endif; ?>
                    </td>
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
  