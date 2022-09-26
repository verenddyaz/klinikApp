<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">All Data Pasien </h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Tanggal Daftar</th>
							<th>No. Rekam Medik</th>
							<th>Nama </th>
							<th>Layanan </th>
							<th>Alamat</th>
							<th>Dokter</th>

						</tr>
					</thead>
					<tbody>
						<?php
						$qu = mysqli_query($con, "select daftar.iddaftar,daftar.no_rm,daftar.tgl_daftar,
							pasien.nama,pasien.layanan,pasien.alamat,dokter.nama_dokter,daftar.bayar,daftar.total from daftar,pasien,dokter 
							where daftar.dokterid = dokter.iddokter AND daftar.no_rm=pasien.no_rm order by daftar.tgl_daftar desc");
						while ($has = mysqli_fetch_row($qu)) {
							$tgl = explode("-", $has[2]);
						?>

							<tr>
								<td><?= $has[2]; ?></td>
								<td><?= $has[1]; ?></td>
								<td><?= $has[3]; ?></td>
								<td><?= $has[4]; ?></td>
								<td><?= $has[5]; ?></td>
								<td><?= $has[6]; ?></td>

							</tr>

						<?php }
						?>
					</tbody>
				</table>
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