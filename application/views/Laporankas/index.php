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

<script>
document.getElementById('kas_masuk').value = formatRupiah(<?=$kas_masuk?>, 'Rp. ')
document.getElementById('kas_keluar').value = formatRupiah(<?=$kas_keluar?>, 'Rp. ')
document.getElementById('total').value = formatRupiah(<?php echo $kas_masuk - $kas_keluar; ?>, 'Rp. ')

function formatRupiah(angka, prefix){
  var number_string = angka.toString()
  var minus = false
  if (number_string[0] == '-') {
    minus = true
    number_string = number_string.slice(1,number_string.length)
  }
  var split   		= number_string.split(','),
  sisa     		= split[0].length % 3,
  rupiah     		= split[0].substr(0, sisa),
  ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if(ribuan){
    separator = sisa ? '.' : '';
    rupiah += separator + ribuan.join('.');
  }

  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
  if (minus == true) {
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + '-' + rupiah : '');
  } else {
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }
}
</script>