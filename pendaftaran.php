<?php
//include "kodeautourut.php";
if (isset($_POST['daftar'])) {
	$tgl = explode("-", $tgl_daftar);
	$tglx = date('Y-m-d');
	mysqli_query($con, "insert into daftar values('','$no_rm','$tglx','$dokterid','','','')");

	echo "<div class='alert alert-success' role='alert'>Data Berhasil Terdaftar</div>";
}


if (isset($_GET['id'])) {
	$data = mysqli_fetch_row(mysqli_query($con, "select * from pasien where id_pasien='" . $_GET['id'] . "'"));
	$tgl = explode("-", $data[3]);
}
//$kodeurut=kdurut("daftar","0");
?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Pendaftaran Pasien</h3>
			</div>
			<form class="form-horizontal" method="post">
				<div class="box-body">
					<input type="hidden" name="id" value="<?php echo $data[0]; ?>" />
					<div class="form-group">
						<label for="dua" class="col-sm-2 control-label">Tanggal Berobat</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="dua" name="tgldaftar" value="<?php echo isset($_GET['id']) ? date('d-m-Y') : date('d-m-Y'); ?>" disabled>
							<input type="hidden" class="form-control" id="dua" name="tgl_daftar" value="<?php echo isset($_GET['id']) ? date('Y-m-d') : date('Y-m-d'); ?>">
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
							<input type="text" required value="<?php echo isset($data[4]) ? $data[4] : ''; ?>" name="nama" class="form-control" id="dua" placeholder="nama pasien" disabled>
						</div>
					</div>
					<div class="form-group">
						<label for="dua" class="col-sm-2 control-label">Status</label>
						<div class="col-sm-10">
							<input type="text" required value="<?php echo isset($data[8]) ? $data[8] : ''; ?>" name="ly" class="form-control" id="dua" placeholder="nama pasien" disabled>
						</div>
					</div>
					<div class="form-group">
						<label for="dua" class="col-sm-2 control-label">Nomor BPJS</label>
						<div class="col-sm-10">
							<input type="text" required value="<?php echo isset($data[9]) ? $data[9] : ''; ?>" name="nobpjs" class="form-control" id="dua" placeholder="nomor bpjs" disabled>
							<input type="hidden" required value="<?php echo isset($data[9]) ? $data[9] : ''; ?>" name="no_bpjs" class="form-control" id="dua" placeholder="nomor bpjs">
						</div>
					</div>
					<div class="form-group">
						<label for="dua" class="col-sm-2 control-label">Dokter</label>
						<div class="col-sm-10">
							<select class="form-control" name="dokterid">
								<?php
								$tglx = date('Y-m-d');
								$y = mysqli_fetch_row(mysqli_query($con, "select * from daftar where no_rm='" . $data[1] . "' AND tgl_daftar='" . $tglx . "' "));
								$dokt = mysqli_query($con, "select * from dokter");
								while ($has = mysqli_fetch_row($dokt)) {
								?>
									<option value="<?php echo $has[0]; ?>" <?php if ($has[0] == $y[3]) {
																														echo 'selected';
																													}; ?>><?= $has[1]; ?> - <?= $has[2]; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<?php
					if (isset($y[0])) {
						echo '';
					} else {
					?>
						<input type="submit" class="btn btn-warning pull-right" value="Daftar" name="daftar">
					<?php } ?>
			</form>
		</div>
		<!-- /.box-body -->
		<div class="box-footer">
			<form class="form-horizontal" method="post">
				<?php
				$tglx = date('Y-m-d');
				$x = mysqli_fetch_row(mysqli_query($con, "select * from daftar where no_rm='" . $data[1] . "' AND tgl_daftar='" . $tglx . "' "));
				?>
				<input type="hidden" name="daftarid" value="<?php echo isset($x[0]) ? $x[0] : $tglx; ?>">
				<div class="form-group">
					<label for="dua" class="col-sm-2 control-label">Layanan</label>
					<div class="col-sm-10">
						<select class="form-control" name="layananid">
							<?php
							$lay = mysqli_query($con, "select * from layanan order by idlayanan asc");
							while ($has = mysqli_fetch_row($lay)) {
							?>
								<option value="<?= $has[0]; ?>"><?= $has[1]; ?> - <?= $has[2]; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<input type="submit" class="btn btn-info pull-right" value="Tambah Layanan" name="tambah">
		</div>
		<!-- /.box-footer -->
		</form>
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
					$dtrans = mysqli_query($con, "select transaksi.*,layanan.nama_layanan,layanan.harga from transaksi,layanan where transaksi.layananid = layanan.idlayanan AND transaksi.daftarid = " . $x[0] . " order by transaksi.idtrans asc");
					while ($d = mysqli_fetch_row($dtrans)) {
					?>
						<tr>
							<td><?= $no; ?></td>
							<td><?= $d[3]; ?></td>
							<td align="right"><?= $d[4]; ?></td>
						</tr>
					<?php
						$no++;
					} ?>
				</table>
			</div>
		</div>