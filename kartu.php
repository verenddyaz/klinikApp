<?php
include "config.php";

if (isset($_GET['id'])) {
  $data = mysqli_fetch_row(mysqli_query($con, "select * from pasien where id_pasien='" . $_GET['id'] . "'"));
  //$tgl = explode("-", $data[3]);
}
//$kodeurut=kdurut("daftar","0");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kartu Berobat</title>
</head>

<body onload="window.print()">
  <center>
    <table width="500px" border="2px solid">
      <tr align="center">
        <td><img src="img/logo.png" width="120px"></td>
        <td>
          <h2>Kartu Berobat Klinik</h2>
          <h2>Dr. Yudi</h2>
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
              <td>: <?php echo isset($data[4]) ? $data[4] : ''; ?></td>
            </tr>
            <tr>
              <td>Tanggal Lahir</td>
              <td>: <?php echo date("d-m-Y", strtotime($data[5])); ?></td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td>
              <td>: <?php echo isset($data[6]) ? $data[6] : ''; ?></td>
            </tr>
            <tr>
              <td>Status</td>
              <td>: <?php echo isset($data[8]) ? $data[8] : ''; ?></td>
            </tr>
            <tr>
              <td>Nomor HP</td>
              <td>: <?php echo isset($data[10]) ? $data[10] : ''; ?></td>
            </tr>
          </table>
          <br>
        </td>
      </tr>
      <tr align="center">
        <td colspan="2">
          <h3>Kartu Berobat dibawa ke Klinik saat akan berobat</h3>
        </td>
      </tr>
    </table>
  </center>
</body>

</html>