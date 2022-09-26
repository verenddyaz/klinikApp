<?php
//include "kodeauto.php";
if (isset($_POST['save'])) {
	date_default_timezone_set("Asia/Bangkok");
	$now = date('YmdHis');
	//$kd_rm = kdauto("pasien", "P" . $now);
	//$no_rm = $_POST['no_rm'];
	/*if ($no_rm == '') {
		$x_rm = $kd_rm;
	} else {
		$x_rm = $no_rm;
	}*/


	$tgl = explode("-", $tgl_lhr);
	$q1 = mysqli_query($con, "insert into pasien values('','$no_rm','$no_kk','$nik','$nama','$tgl[2]-$tgl[1]-$tgl[0]',
					   '$jk','$alamat','$ly','$no_hp','$ket','$tdt','$pj','$dm','$hm','$ht','$pl','$ato','$atm')");
	if (q1) {
		echo "<div class='alert alert-success' role='alert'>Data Pasien No. RM $x_rm Berhasil Tersimpan</div>";
	} else {
		echo "<div class='alert alert-danger' role='alert'>Data Pasien No. RM $x_rm Gagal Tersimpan</div>";
	}

	/*echo "
	<script>
	location.assign('index.php?page=daftar&ps=true1');
	</script>
	";*/
} elseif (isset($_POST['update'])) {
	$tgl = explode("-", $tgl_lhr);
	mysqli_query($con, "update pasien set no_kk='$no_kk',nik='$nik',nama='$nama',tgl_lhr='$tgl[2]-$tgl[1]-$tgl[0]',jk='$jk',
						alamat='$alamat',layanan='$ly',no_hp='$no_hp',ket='$ket', tdt='$tdt', pj='$pj', 
						dm='$dm', hm='$hm', ht='$ht', pl='$pl', ato='$ato', atm='$atm' where id_pasien='$id'");
	echo "<div class='alert alert-success' role='alert'>Data Pasien No. RM $x_rm Berhasil Terupdate</div>";
	/*echo "
	<script>
	location.assign('index.php?page=daftar&ps=true2');
	</script>
	";*/
}

/*pesan berhasil update
if(isset($_GET['ps'])=='true2')
	{
	echo "<div class='alert alert-success' role='alert'>Data Berhasil Terupdate</div>";
	}
elseif(isset($_GET['ps'])=='true1')
	{
	echo "<div class='alert alert-success' role='alert'>Data Berhasil Tersimpan</div>";
	}*/

if (isset($_GET['id'])) {
	$data = mysqli_fetch_row(mysqli_query($con, "select * from pasien where id_pasien='" . $_GET['id'] . "'"));
	$tgl = explode("-", $data[5]);
}
date_default_timezone_set("Asia/Bangkok");
$now = date('YmdHis');

$query = mysqli_query($con, "SELECT max(no_rm) as koderm FROM pasien");
$datax = mysqli_fetch_array($query);
$koderm = $datax['koderm'];
$urutan = (int) substr($koderm, 6, 6);
$urutan++;
$huruf = "P";
$kodeauto = $huruf . sprintf("%06s", $urutan);
//echo $kodeBarang;

?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Form Pendaftaran</h3>
			</div>
			<form class="form-horizontal" method="post">
				<div class="box-body">
					<input type="hidden" name="id" value="<?php echo $data[0]; ?>" />
					<div class="form-group">
						<label for="dua" class="col-sm-2 control-label">No. Rekam Medik</label>
						<div class="col-sm-10">
							<input type="hidden" value="<?php echo isset($data[1]) ? $data[1] : $kodeauto; ?>" name="no_rm" class="form-control" id="dua">
							<input type="text" value="<?php echo isset($data[1]) ? $data[1] : $kodeauto; ?>" name="no_rmx" class="form-control" id="dua" disabled>
						</div>
					</div>
					<div class="form-group">
						<label for="dua" class="col-sm-2 control-label">NO.KK | NIK</label>
						<div class="col-sm-5">
							<input type="text" required value="<?php echo isset($data[2]) ? $data[2] : ''; ?>" name="no_kk" class="form-control" id="dua" placeholder="Nomor Kartu Keluarga">
						</div>
						<div class="col-sm-5">
							<input type="text" required value="<?php echo isset($data[3]) ? $data[3] : ''; ?>" name="nik" class="form-control" id="dua" placeholder="NIK KTP">
						</div>
					</div>
					<div class="form-group">
						<label for="dua" class="col-sm-2 control-label">Nama Pasien</label>
						<div class="col-sm-10">
							<input type="text" required value="<?php echo isset($data[4]) ? $data[4] : ''; ?>" name="nama" class="form-control" id="dua" placeholder="Nama Lengkap Pasien">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Tanggal Lahir</label>
						<div class="col-sm-10">
							<input type="text" id="tgl_agenda" required value="<?php echo isset($_GET['id']) ? "$tgl[2]-$tgl[1]-$tgl[0]" : ""; ?>" name="tgl_lhr" class="form-control" id="inputEmail3" placeholder="Pilih Tanggal Lahir">
						</div>
					</div>
					<div class="form-group">
						<label for="dua1" class="col-sm-2 control-label">Jenis Kelamin</label>
						<div class="col-sm-10">
							<?php
							if ($data[6] == '') {
							?>
								<label class="radio-inline"><input type="radio" value="Laki-Laki" name="jk">Laki-Laki</label>
								<label class="radio-inline"><input type="radio" value="Perempuan" name="jk">Perempuan</label>

							<?php
							} else {
								if ($data[6] == 'Laki-Laki') {
									echo '<label class="radio-inline"><input type="radio" value="Laki-Laki" name="jk" checked > Laki-Laki </label>';
									echo '<label class="radio-inline"><input type="radio" value="Perempuan" name="jk" > Perempuan </label>';
								} else {
									echo '<label class="radio-inline"><input type="radio" value="Laki-Laki" name="jk" > Laki-Laki </label>';
									echo '<label class="radio-inline"><input type="radio" value="Perempuan" name="jk" checked> Perempuan </label>';
								}
							}
							?>
						</div>
					</div>
					<div class="form-group">
						<label for="tiga" class="col-sm-2 control-label">Alamat</label>
						<div class="col-sm-10">
							<textarea name="alamat" rows="2" cols="10" class="form-control"><?php echo isset($data[7]) ? $data[7] : ''; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="dua1" class="col-sm-2 control-label">Layanan</label>
						<div class="col-sm-10">
							<?php
							if ($data[8] == '') {
							?>
								<label class="radio-inline"><input type="radio" value="UMUM" name="ly">UMUM</label>

							<?php
							} else {
								echo '<label class="radio-inline"><input type="radio" value="UMUM" name="ly" checked> UMUM </label>';
							}
							?>
						</div>
					</div>
					<div class="form-group">
						<label for="dua" class="col-sm-2 control-label">No. HP</label>
						<div class="col-sm-10">
							<input type="text" required value="<?php echo isset($data[9]) ? $data[9] : ''; ?>" name="no_hp" class="form-control" id="dua" placeholder="nomor hp">
						</div>
					</div>
					<div class="form-group">
						<label for="dua" class="col-sm-2 control-label">Keterangan</label>
						<div class="col-sm-10">
							<input type="text" required value="<?php echo isset($data[10]) ? $data[10] : ''; ?>" name="ket" class="form-control" id="dua" placeholder="keterangan">
						</div>
					</div>
					<div class="form-group">
						<label for="riwayat" class="col-sm-2 control-label">Riwayat Kesehatan</label>
						<div class="col-sm-10">
							:
						</div>
					</div>
					<div class="form-group">
						<label for="tdt" class="col-sm-2 control-label">Tekanan Darah Tinggi</label>
						<div class="col-sm-10">
							<?php
							if ($data[11] == '') {
							?>
								<label class="radio-inline"><input type="radio" value="Ada" name="tdt">Ada</label>
								<label class="radio-inline"><input type="radio" value="Tidak Ada" name="tdt">Tidak Ada</label>

							<?php
							} else {
								if ($data[11] == 'Ada') {
									echo '<label class="radio-inline"><input type="radio" value="Ada" name="tdt" checked > Ada </label>';
									echo '<label class="radio-inline"><input type="radio" value="Tidak Ada" name="tdt" > Tidak Ada </label>';
								} else {
									echo '<label class="radio-inline"><input type="radio" value="Ada" name="tdt" > Ada </label>';
									echo '<label class="radio-inline"><input type="radio" value="Tidak Ada" name="tdt" checked> Tidak Ada </label>';
								}
							}
							?>
						</div>
					</div>
					<div class="form-group">
						<label for="pj" class="col-sm-2 control-label">Penyakit Jantung</label>
						<div class="col-sm-10">
							<?php
							if ($data[12] == '') {
							?>
								<label class="radio-inline"><input type="radio" value="Ada" name="pj">Ada</label>
								<label class="radio-inline"><input type="radio" value="Tidak Ada" name="pj">Tidak Ada</label>

							<?php
							} else {
								if ($data[12] == 'Ada') {
									echo '<label class="radio-inline"><input type="radio" value="Ada" name="pj" checked > Ada </label>';
									echo '<label class="radio-inline"><input type="radio" value="Tidak Ada" name="pj" > Tidak Ada </label>';
								} else {
									echo '<label class="radio-inline"><input type="radio" value="Ada" name="pj" > Ada </label>';
									echo '<label class="radio-inline"><input type="radio" value="Tidak Ada" name="pj" checked> Tidak Ada </label>';
								}
							}
							?>
						</div>
					</div>
					<div class="form-group">
						<label for="dm" class="col-sm-2 control-label">Diabetes Mellitus</label>
						<div class="col-sm-10">
							<?php
							if ($data[13] == '') {
							?>
								<label class="radio-inline"><input type="radio" value="Ada" name="dm">Ada</label>
								<label class="radio-inline"><input type="radio" value="Tidak Ada" name="dm">Tidak Ada</label>

							<?php
							} else {
								if ($data[13] == 'Ada') {
									echo '<label class="radio-inline"><input type="radio" value="Ada" name="dm" checked > Ada </label>';
									echo '<label class="radio-inline"><input type="radio" value="Tidak Ada" name="dm" > Tidak Ada </label>';
								} else {
									echo '<label class="radio-inline"><input type="radio" value="Ada" name="dm" > Ada </label>';
									echo '<label class="radio-inline"><input type="radio" value="Tidak Ada" name="dm" checked> Tidak Ada </label>';
								}
							}
							?>
						</div>
					</div>
					<div class="form-group">
						<label for="hm" class="col-sm-2 control-label">Hemophilia</label>
						<div class="col-sm-10">
							<?php
							if ($data[14] == '') {
							?>
								<label class="radio-inline"><input type="radio" value="Ada" name="hm">Ada</label>
								<label class="radio-inline"><input type="radio" value="Tidak Ada" name="hm">Tidak Ada</label>

							<?php
							} else {
								if ($data[14] == 'Ada') {
									echo '<label class="radio-inline"><input type="radio" value="Ada" name="hm" checked > Ada </label>';
									echo '<label class="radio-inline"><input type="radio" value="Tidak Ada" name="hm" > Tidak Ada </label>';
								} else {
									echo '<label class="radio-inline"><input type="radio" value="Ada" name="hm" > Ada </label>';
									echo '<label class="radio-inline"><input type="radio" value="Tidak Ada" name="hm" checked> Tidak Ada </label>';
								}
							}
							?>
						</div>
					</div>
					<div class="form-group">
						<label for="ht" class="col-sm-2 control-label">Hepatitis</label>
						<div class="col-sm-10">
							<?php
							if ($data[15] == '') {
							?>
								<label class="radio-inline"><input type="radio" value="Ada" name="ht">Ada</label>
								<label class="radio-inline"><input type="radio" value="Tidak Ada" name="ht">Tidak Ada</label>

							<?php
							} else {
								if ($data[15] == 'Ada') {
									echo '<label class="radio-inline"><input type="radio" value="Ada" name="ht" checked > Ada </label>';
									echo '<label class="radio-inline"><input type="radio" value="Tidak Ada" name="ht" > Tidak Ada </label>';
								} else {
									echo '<label class="radio-inline"><input type="radio" value="Ada" name="ht" > Ada </label>';
									echo '<label class="radio-inline"><input type="radio" value="Tidak Ada" name="ht" checked> Tidak Ada </label>';
								}
							}
							?>
						</div>
					</div>
					<div class="form-group">
						<label for="pl" class="col-sm-2 control-label">Penyakit Lain</label>
						<div class="col-sm-10">
							<?php
							if ($data[16] == '') {
							?>
								<label class="radio-inline"><input type="radio" value="Ada" name="pl">Ada</label>
								<label class="radio-inline"><input type="radio" value="Tidak Ada" name="pl">Tidak Ada</label>

							<?php
							} else {
								if ($data[16] == 'Ada') {
									echo '<label class="radio-inline"><input type="radio" value="Ada" name="pl" checked > Ada </label>';
									echo '<label class="radio-inline"><input type="radio" value="Tidak Ada" name="pl" > Tidak Ada </label>';
								} else {
									echo '<label class="radio-inline"><input type="radio" value="Ada" name="pl" > Ada </label>';
									echo '<label class="radio-inline"><input type="radio" value="Tidak Ada" name="pl" checked> Tidak Ada </label>';
								}
							}
							?>
						</div>
					</div>
					<div class="form-group">
						<label for="ato" class="col-sm-2 control-label">Alergi Terhadap Obat</label>
						<div class="col-sm-10">
							<?php
							if ($data[17] == '') {
							?>
								<label class="radio-inline"><input type="radio" value="Ada" name="ato">Ada</label>
								<label class="radio-inline"><input type="radio" value="Tidak Ada" name="ato">Tidak Ada</label>

							<?php
							} else {
								if ($data[17] == 'Ada') {
									echo '<label class="radio-inline"><input type="radio" value="Ada" name="ato" checked > Ada </label>';
									echo '<label class="radio-inline"><input type="radio" value="Tidak Ada" name="ato" > Tidak Ada </label>';
								} else {
									echo '<label class="radio-inline"><input type="radio" value="Ada" name="ato" > Ada </label>';
									echo '<label class="radio-inline"><input type="radio" value="Tidak Ada" name="ato" checked> Tidak Ada </label>';
								}
							}
							?>
						</div>
					</div>
					<div class="form-group">
						<label for="atm" class="col-sm-2 control-label">Alergi Terhadap Makanan</label>
						<div class="col-sm-10">
							<?php
							if ($data[18] == '') {
							?>
								<label class="radio-inline"><input type="radio" value="Ada" name="atm">Ada</label>
								<label class="radio-inline"><input type="radio" value="Tidak Ada" name="atm">Tidak Ada</label>

							<?php
							} else {
								if ($data[18] == 'Ada') {
									echo '<label class="radio-inline"><input type="radio" value="Ada" name="atm" checked > Ada </label>';
									echo '<label class="radio-inline"><input type="radio" value="Tidak Ada" name="atm" > Tidak Ada </label>';
								} else {
									echo '<label class="radio-inline"><input type="radio" value="Ada" name="atm" > Ada </label>';
									echo '<label class="radio-inline"><input type="radio" value="Tidak Ada" name="atm" checked> Tidak Ada </label>';
								}
							}
							?>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-primary pull-left" name="<?php echo isset($_GET['id']) ? 'update' : 'save'; ?>">
						<i class='glyphicon glyphicon-save'></i> <?php echo isset($_GET['id']) ? 'Update' : 'Simpan'; ?>
					</button>
				</div>
				<!-- /.box-footer -->
			</form>
		</div>
	</div>
	<!--/.col (right) -->
</div> <!-- /.row -->