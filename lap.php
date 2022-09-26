<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Cetak Laporan Pasien</h3>
			</div>
			<!-- /.box-header -->

			<form class="form-horizontal" method="post" action="">
				<div class="box-body">
					<div class="form-group">
						<label for="inputEmail3" class="col-xs-2 control-label">Dari Tanggal</label>
						<div class="col-sm-10">
							<input type="text" id="tgl_agenda" required value="<?php echo isset($_GET['id']) ? "$tgl[2]-$tgl[1]-$tgl[0]" : ""; ?>" name="tgl_awal" class="form-control" id="inputEmail3" placeholder="Pilih Tanggal Awal">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-xs-2 control-label">Sampai Tanggal</label>
						<div class="col-sm-10">
							<input type="text" id="tgl_agenda2" required value="<?php echo isset($_GET['id']) ? "$tgl[2]-$tgl[1]-$tgl[0]" : ""; ?>" name="tgl_akhir" class="form-control" id="inputEmail3" placeholder="Pilih Tanggal Akhir">
						</div>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-warning" name="lihat">
						<i class='glyphicon glyphicon-blackboard'></i> Preview
					</button>
				</div>
				<!-- /.box-footer -->
			</form>
			<br />
			<?php
			$lihat = $_POST['lihat'];
			$tglawal = explode("-", $tgl_awal);
			$tglakhir = explode("-", $tgl_akhir);
			//$ly = $_POST['ly'];

			//if ($ly == "SEMUA") {
			$qu = mysqli_query($con, "select daftar.iddaftar,daftar.no_rm,daftar.tgl_daftar,
							pasien.nama,pasien.layanan,pasien.alamat,dokter.nama_dokter,daftar.total from daftar,pasien,dokter
							where daftar.no_rm=pasien.no_rm AND daftar.dokterid = dokter.iddokter
							AND daftar.tgl_daftar between '$tglawal[2]-$tglawal[1]-$tglawal[0]' and '$tglakhir[2]-$tglakhir[1]-$tglakhir[0]' order by daftar.iddaftar asc");
			/*} else {
				$qu = mysqli_query($con, "select daftar.iddaftar,daftar.no_rm,daftar.tgl_daftar,
							pasien.nama,pasien.layanan,pasien.no_bpjs,pasien.alamat from daftar,pasien 
							where daftar.no_rm=pasien.no_rm 
							AND pasien.layanan='$ly' AND daftar.tgl_daftar between '$tglawal[2]-$tglawal[1]-$tglawal[0]' and '$tglakhir[2]-$tglakhir[1]-$tglakhir[0]' order by daftar.iddaftar asc");
			}*/
			if (isset($lihat)) {
			?>
				<div class="box">
					<div class="box-body">
						<div class="box-header with-border">
							<h3 class="box-title">
								<?php
								echo " Laporan Dari Tanggal : $tglawal[0]-$tglawal[1]-$tglawal[2] Sampai $tglakhir[0]-$tglakhir[1]-$tglakhir[2]";
								?>
							</h3>
						</div>

						<table id="example2" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>No. Rekam Medik</th>
									<th>Nama </th>
									<th>Status </th>
									<th>Alamat</th>
									<th>Tanggal Daftar</th>
									<th>Dokter</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<?php

								while ($has = mysqli_fetch_row($qu)) {
									$tgl = explode("-", $has[2]);
									$total = $has[7];
									$grandtotal = $grandtotal + $total;
									echo "
								<tr>
									<td>$has[1]</td>
									<td>$has[3]</td>
									<td>$has[4]</td>
									<td>$has[5]</td>
									<td>$tgl[2]-$tgl[1]-$tgl[0]</td>
									<td>$has[6]</td>
									<td align='right'>Rp " . number_format($has[7], 0, ',', '.') . "</td>
								</tr>
								";
								}
								?>
							</tbody>
						</table>
						<center>
							<h3>Total Keseluruhan : <?php echo "Rp " . number_format("$grandtotal", 0, ",", "."); ?></h3>
						</center>
					</div>
				<?php } ?>

				<!-- /.box-body -->
				</div>
				<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
	<!-- /.col -->
	<script>
		function datadel(value, jenis) {
			document.getElementById('mylink').href = "hapus.php?del=" + value + "&data=" + jenis;
		}
	</script>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Data akan terhapus !</h4>
				</div>
				<div class="modal-body">
					Anda yakin ingin menghapus data ini ?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
					<a id="mylink" href=""><button type="button" class="btn btn-primary">Delete Data</button></a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.row -->