<?php
include "config.php";

if (isset($_GET['id'])) {
  $data = mysqli_fetch_row(mysqli_query($con, "select daftar.iddaftar,daftar.no_rm,daftar.tgl_daftar,
                          pasien.nama,pasien.layanan,pasien.alamat,daftar.total,daftar.bayar,daftar.kembalian from daftar,pasien 
                          where daftar.no_rm=pasien.no_rm AND daftar.iddaftar='" . $_GET['id'] . "'"));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kwitansi Pasien</title>
</head>

<body onload="window.print()">
  <center>
    <table width="700px" border="2px solid">
      <tr align="center">
        <td><img src="img/logo-PDGI.png" width="120px"></td>
        <td>
          <h2>Bukti Pembayaran</h2>
          <h2>Klinik Umum</h2>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <br>
          <table width="90%" align="center">
            <tr>
              <td width="27%">No. Kartu</td>
              <td>: <?php echo isset($data[1]) ? $data[1] : ''; ?></td>
            </tr>
            <tr>
              <td>Nama Pasien</td>
              <td>: <?php echo isset($data[3]) ? $data[3] : ''; ?></td>
            </tr>
            <tr>
              <td>Tanggal Berobat</td>
              <td>: <?php echo date('d-m-Y', strtotime($data[2])); ?></td>
            </tr>
            <tr>
              <td>Status</td>
              <td>: <?php echo isset($data[4]) ? $data[4] : ''; ?></td>
            </tr>
          </table>
          <br>
        </td>
      </tr>
      <tr align="center">
        <td colspan="2"><br>
          <table border="1px solid" width="500px">
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
                <td align="right"><?php echo "Rp " . number_format("$d[4]", 0, ",", "."); ?></td>
              </tr>
            <?php
              $no++;
            } ?>
            <tr>
              <td colspan="2" align="right" bgcolor="yellow"><strong>Total </strong></td>
              <td align="right"><strong><?php echo "Rp " . number_format("$data[6]", 0, ",", "."); ?></strong></td>
            </tr>
            <tr>
              <td colspan="2" align="right" bgcolor="yellow"><strong>Jumlah Bayar </strong></td>
              <td align="right"><strong><?php echo "Rp " . number_format("$data[7]", 0, ",", "."); ?></strong></td>
            </tr>
            <tr>
              <td colspan="2" align="right" bgcolor="yellow"><strong>Kembalian </strong></td>
              <td align="right"><strong><?php echo "Rp " . number_format("$data[8]", 0, ",", "."); ?></strong></td>
            </tr>
          </table>
          <br>
        </td>
      </tr>
      <tr align="center">
        <td colspan="2">
          <h4>Kwitansi ini adalah alat bukti pembayaran yang sah Klinik Umum</h4>
        </td>
      </tr>
    </table>
  </center>
</body>

</html>