<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Cetak Laporan Pasien</h3>
			</div>
			<!-- /.box-header -->

			<form class="form-horizontal" method="post" action="cetak_pdf.php">
				<div class="box-body">
					<div class="form-group">
						<label for="inputEmail3" class="col-xs-2 control-label">Dari Tanggal</label>
						<div class="col-sm-10">
							<input type="text" id="tgl_awal" required value="" name="tgl_awal" class="form-control" id="inputEmail3" placeholder="Pilih Tanggal Awal">
						</div>
					</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-xs-2 control-label">Sampai Tanggal</label>
						<div class="col-sm-10">
							<input type="text" id="tgl_akhir" required value="" name="tgl_akhir" class="form-control" id="inputEmail3" placeholder="Pilih Tanggal Akhir">
						</div>
					</div>

				</div>
				<!-- /.box-body -->

				<div class="box-footer">
					<button type="submit" class="btn btn-primary" name="print">
						<i class='glyphicon glyphicon-print'></i> Print
					</button>
				</div>
				<!-- /.box-footer -->
			</form>


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