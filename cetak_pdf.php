<?php
//ob_start();
?>
<html>

<head>
	<title>Cetak PDF</title>

	<style>
		table {
			border-collapse: collapse;
			table-layout: fixed;
		}
	</style>
</head>

<body onload="window.print()">

	<?php
	$ly = $_POST['ly'];
	?>
	<table width="100%">
		<tr>
			<td width="20%" align="center"><img src="img/logo-PDGI.png" width="80px"></td>
			<td width="60%">
				<h5 style="text-align: center;">
					KLINIK UMUM INNOVA <br />
					<b>KOTA BANDUNG</b> <br />
					LAPORAN DATA PASIEN <br />
					Periode Tanggal :
					<?php
					extract($_POST);
					echo date('d-m-Y', strtotime($tgl_awal)) . " Sampai " . date('d-m-Y', strtotime($tgl_akhir)); ?>
				</h5>
			</td>
			<td width="20%"></td>
		</tr>
	</table>

	<hr />
	<br />
	<table border="1" width="100%">
		<tr bgcolor="silver" align="center">
			<td width="15">No.</td>
			<td width="60">No. RM</td>
			<td width="120">Nama </td>
			<td width="60">Status </td>
			<td width="80">Tgl Daftar</td>
			<td width="170">Dokter</td>
			<td width="160">Total</td>
		</tr>
		<?php
		include "config.php";
		$no = 1;
		//$ly = $_POST['ly'];

		/*if ($ly=="BPJS&UMUM") {
$sql=mysqli_query($con,"select daftar.iddaftar,daftar.no_rm,daftar.tgl_daftar,
							pasien.nama,pasien.layanan,pasien.no_bpjs,pasien.alamat from daftar,pasien 
							where daftar.no_rm=pasien.no_rm 
							AND daftar.tgl_daftar between '$tgl_awal' and '$tgl_akhir' order by daftar.iddaftar asc");
} else {*/
		$sql = mysqli_query($con, "select daftar.iddaftar,daftar.no_rm,daftar.tgl_daftar,
							pasien.nama,pasien.layanan,pasien.alamat,dokter.nama_dokter,daftar.total from daftar,pasien,dokter 
							where daftar.no_rm=pasien.no_rm AND daftar.dokterid = dokter.iddokter
							AND daftar.tgl_daftar between '$tgl_awal' and '$tgl_akhir' order by daftar.iddaftar asc");
		//}

		$row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

		if ($row > 0) { // Jika jumlah data lebih dari 0 (Berarti jika data ada)
			while ($data = mysqli_fetch_array($sql)) { // Ambil semua data dari hasil eksekusi $sql
				$total = $data['total'];
				$grand = $grand + $total;
				echo "<tr>";
				echo "<td>" . $no . "</td>";
				echo "<td>" . $data['no_rm'] . "</td>";
				echo "<td>" . $data['nama'] . "</td>";
				echo "<td>" . $data['layanan'] . "</td>";
				//echo "<td>".$data['no_bpjs']."</td>";
				echo "<td>" . date('d-m-Y', strtotime($data['tgl_daftar'])) . "</td>";
				echo "<td>" . $data['nama_dokter'] . "</td>";
				echo "<td align='right'>Rp. " . number_format($data['total'], 0, ",", ".") . "</td>";
				echo "</tr>";
				$no++;
			}
			echo "<tr bgcolor='yellow'>
			<td colspan='6' align='right'>Total Keseluruhan</td>
			<td align='right'>Rp. " . number_format($grand, 0, ",", ".") . "</td>
			</tr>";
		} else { // Jika data tidak ada
			echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
		}
		?>
	</table><br>
	<table width="100%">
		<tr>
			<td width="80%">
				Petugas Administrasi
				<br><br><br>
				(.......................)
			</td>
			<td>
				Jambi, <?php echo date('d M Y'); ?>
				<br>Kepala Klinik
				<br><br><br>
				(.......................)
			</td>
		</tr>
	</table>
</body>

</html>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script>
	$('#tgl_agenda').datepicker({
		format: 'dd-mm-yyyy'
	})
</script>
<script>
	$('#tgl_agenda2').datepicker({
		format: 'dd-mm-yyyy'
	})
</script>
<?php
/*$now = date('YmdHis');
$html = ob_get_contents();
ob_end_clean();

require_once('html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P', 'A4', 'en');
$pdf->setDefaultFont('Arial');
$pdf->WriteHTML($html);
$pdf->Output('data_pasien' . $now . '.pdf', 'D');
*/ ?>