<?php
//include "kodeautourut.php";
if (isset($_POST['bayar'])) {
  //$tgl = explode("-", $tgl_daftar);
  //$tglx = date('Y-m-d');
  $idx = $_POST['id'];
  $totalx = $_POST['totalx'];
  $jumx = $_POST['jumlahbayar'];
  $kembali = $jumx - $totalx;
  mysqli_query($con, "UPDATE daftar SET total = '$totalx', bayar = '$jumx', kembalian = '$kembali' WHERE iddaftar = '$id' ");

  echo "<div class='alert alert-success' role='alert'>Pembayaran Berhasil, Silahkan Cetak Struk Anda</div>";
}


if (isset($_GET['id'])) {
  $data = mysqli_fetch_row(mysqli_query($con, "select daftar.iddaftar,daftar.no_rm,daftar.tgl_daftar,
                          pasien.nama,pasien.layanan,pasien.alamat,daftar.total,daftar.bayar,daftar.kembalian from daftar,pasien 
                          where daftar.no_rm=pasien.no_rm AND daftar.iddaftar='" . $_GET['id'] . "'"));
  //$tgl = explode("-", $data[2]);
}

?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Form Pembayaran</h3>
      </div>
      <form class="form-horizontal" method="post">
        <div class="box-body">
          <input type="hidden" name="id" value="<?php echo $data[0]; ?>" />
          <div class="form-group">
            <label for="dua" class="col-sm-2 control-label">Tanggal Berobat</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="dua" name="tgldaftar" value="<?php echo date('d-m-Y', strtotime($data[2])); ?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="dua" class="col-sm-2 control-label">No. Rekam Medik</label>
            <div class="col-sm-10">
              <input type="text" required value="<?php echo isset($data[1]) ? $data[1] : ''; ?>" name="norm" class="form-control" id="dua" placeholder="Nomor Rekam Medik" disabled>
              <input type="hidden" required value="<?php echo isset($data[1]) ? $data[1] : ''; ?>" name="no_rm" class="form-control" id="dua" placeholder="Nomor Rekam Medik">
            </div>
          </div>
          <div class="form-group">
            <label for="dua" class="col-sm-2 control-label">Nama Pasien</label>
            <div class="col-sm-10">
              <input type="text" required value="<?php echo isset($data[3]) ? $data[3] : ''; ?>" name="nama" class="form-control" id="dua" placeholder="nama pasien" disabled>
            </div>
          </div>
          <div class="form-group">
            <label for="dua" class="col-sm-2 control-label">Status</label>
            <div class="col-sm-10">

              <input type="text" required value="<?php echo isset($data[4]) ? $data[4] : ''; ?>" name="ly" class="form-control" id="dua" placeholder="nama pasien" disabled>
            </div>
          </div>
        </div>
        <!-- /.box-body -->

    </div>
  </div>
  <!--/.col (right) -->
</div> <!-- /.row -->
<?php
if (isset($_POST['tambah'])) {
  //$tgl = explode("-", $tgl_daftar);
  mysqli_query($con, "insert into transaksi values('','$daftarid','$layananid')");

  echo "<div class='alert alert-success' role='alert'>Layanan Berhasil Ditambah</div>";
}
?>
<div class="row">
  <div class="col-md-12">
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Layanan Berobat</h3>
      </div>

      <div class="box-body">
        <table class="table table-bordered">
          <tr>
            <th style="width: 10px">No</th>
            <th>Layanan</th>
            <th>Harga</th>
          </tr>
          <?php
          $no = 1;
          $dtrans = mysqli_query($con, "select transaksi.*,layanan.nama_layanan,layanan.harga from transaksi,layanan where transaksi.layananid = layanan.idlayanan AND transaksi.daftarid = " . $data[0] . " order by transaksi.idtrans asc");
          while ($d = mysqli_fetch_row($dtrans)) {
            $harga = $d[4];
            $total = $total + $harga;
          ?>
            <tr>
              <td><?= $no; ?></td>
              <td><?= $d[3]; ?></td>
              <td align="right"><?= $d[4]; ?></td>
            </tr>
          <?php
            $no++;
          } ?>
        </table><br>
      </div>
    </div>
    <div class="form-group">
      <label for="dua" class="col-sm-2 control-label">Total Bayar</label>
      <div class="col-sm-10 pull-right">
        <input type="text" required value="<?php echo $total; ?>" name="totalx" class="form-control">
      </div>
    </div>
    <div class="form-group">
      <label for="dua" class="col-sm-2 control-label">Jumlah Bayar</label>
      <div class="col-sm-10 pull-right">
        <input type="text" required name="jumlahbayar" class="form-control" value="<?php echo isset($data[7]) ? $data[7] : ''; ?>">
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
        <br>
        <?php if ($data[7] == 0) { ?>
          <input type="submit" class="btn btn-info pull-right" value="Bayar" name="bayar">
        <?php } else { ?>
          <a href="cetakstruk.php?id=<?php echo $data[0]; ?>" class="btn btn-warning pull-right" target="_blank">Cetak</a>
        <?php } ?>
      </div>
    </div>
    </form>