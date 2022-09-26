<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Data Pasien</h3>
				<a href="index.php?page=daftar" class="btn btn-danger pull-right"><span class='glyphicon glyphicon-user'></span> Pasien Baru</a>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No.RM</th>
							<th>NIK</th>
							<th>Nama </th>
							<th>Tgl Lahir</th>
							<th>Layanan</th>
							<th>Alamat</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$qu = mysqli_query($con, "select * from pasien order by id_pasien asc");
						while ($has = mysqli_fetch_row($qu)) {
							echo "
								<tr>
									<td>$has[1]</td>
									<td>$has[3]</td>
									<td><a href='index.php?page=history&id=$has[0]'>$has[4]</a></td>
									<td>$has[5]</td>
									<td>$has[8]</td>
									<td>$has[7]</td>
									<td style='text-align:center'>
						<a href='index.php?page=pendaftaran&id=$has[0]'><span data-placement='top' data-toggle='tooltip' title='Pendaftaran'><button class='btn btn-success btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' > <span class='glyphicon glyphicon-user'></span> Daftar </button><span></a>
						<a href='kartu.php?id=$has[0]' target='_blank'><span data-placement='top' data-toggle='tooltip' title='Pendaftaran'><button class='btn btn-warning btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' > <span class='glyphicon glyphicon-credit-card'></span> Kartu </button><span></a>
						<a href='index.php?page=daftar&id=$has[0]'><span data-placement='top' data-toggle='tooltip' title='Edit'><button class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' ><span class='glyphicon glyphicon-pencil'></span></button><span></a>
						<a href='hapuspasien.php?id=$has[0]' onClick=\"return confirm('Anda yakin menghapus data Pasien ini ?')\" class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash'></span></a>
						
									</td>
								</tr>
								";
						}
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