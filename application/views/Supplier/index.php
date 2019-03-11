<div class="content-wrapper">
    <section class="content-header">
      <h1><?=$title?></h1>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a class="btn btn-primary" href="<?php echo base_url('supplier/tambah'); ?>">Add Supplier</a>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover" id="tabel">
                <thead>
                  <tr>
                    <th>Nama Supplier</th>
                    <th>Alamat Supplier</th>
                    <th>Telp Supplier</th>
                    <th>No Rekening Supplier</th>
                    <th>Nama Bank</th>
                    <th>Fax Supplier</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($suppliers as $sup): ?>
                  <tr>
                    <td><?php echo $sup['nama_supplier']; ?></td>
                    <td><?php echo $sup['alamat_supplier']; ?></td>
                    <td><?php echo $sup['telp_supplier']; ?></td>
                    <td><?php echo $sup['no_rekening_supplier']; ?></td>
                    <td><?php echo $sup['nama_bank']; ?></td>
                    <td><?php echo $sup['fax_supplier']; ?></td>
                    <td><?php echo $sup['keterangan']; ?></td>
                    <td>
                      <a href="<?php echo base_url('supplier/hapus/'.$sup['id_supplier']); ?>">Delete</a>
                      <a href="<?php echo base_url('supplier/ubah/'.$sup['id_supplier']); ?>">Edit</a>
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