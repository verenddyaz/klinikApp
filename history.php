<?php
if(isset($_GET['id']))
{
	$data=mysqli_fetch_row(mysqli_query($con,"select * from pasien where id_pasien='".$_GET['id']."'"));
$tgl=explode("-",$data[5]);
}

?>
<div class="row">
	<div class="col-md-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">Riwayat Medis Pasien</h3>
			</div>
			<form class="form-horizontal" method="post">			   
				<div class="box-body">
					<div class="form-group">
						<label for="dua" class="col-sm-2 control-label">No. Rekam Medik</label>
						<div class="col-sm-10">
							<input type="text" required value="<?php echo isset($data[1])?$data[1]:''; ?>" name="norm" class="form-control" id="dua" placeholder="Nomor Rekam Medik" disabled>					
						</div>
					</div>
					<div class="form-group">
						<label for="dua" class="col-sm-2 control-label">NIK e-KTP</label>
						<div class="col-sm-10">
							<input type="text" required value="<?php echo isset($data[3])?$data[3]:''; ?>" name="nik" class="form-control" id="dua" placeholder="nama pasien" disabled>
						</div>
					</div>
					<div class="form-group">
						<label for="dua" class="col-sm-2 control-label">Nama Pasien</label>
						<div class="col-sm-10">
							<input type="text" required value="<?php echo isset($data[4])?$data[4]:''; ?>" name="nama" class="form-control" id="dua" placeholder="nama pasien" disabled>
						</div>
					</div>					
					<div class="form-group">
						<label for="dua" class="col-sm-2 control-label">Tanggal Lahir</label>
						<div class="col-sm-10">
							<input type="text" required value="<?php echo isset($_GET['id'])?"$tgl[2]-$tgl[1]-$tgl[0]":""; ?>" name="nama" class="form-control" id="dua" placeholder="nama pasien" disabled>
						</div>
					</div>
					<div class="form-group">
						<label for="dua" class="col-sm-2 control-label">Layanan</label>
						<div class="col-sm-10">
							<input type="text" required value="<?php echo isset($data[8])?$data[8]:''; ?>" name="ly" class="form-control" id="dua" placeholder="nama pasien" disabled>
						</div>
					</div>
					<div class="form-group">
						<label for="dua" class="col-sm-2 control-label">Nomor BPJS</label>
						<div class="col-sm-10">
							<input type="text" required value="<?php echo isset($data[9])?$data[9]:''; ?>" name="nobpjs" class="form-control" id="dua" placeholder="nomor bpjs" disabled>
							<input type="hidden" required value="<?php echo isset($data[9])?$data[9]:''; ?>" name="no_bpjs" class="form-control" id="dua" placeholder="nomor bpjs" >
						</div>
					</div>					
					<div class="form-group">
						<label for="tiga" class="col-sm-2 control-label">Alamat</label>
						<div class="col-sm-10">
							<textarea name="alamat" rows="2" cols="10" class="form-control" disabled><?php echo isset($data[7])?$data[5]:''; ?></textarea>						
						</div>
					</div>					
					<div class="form-group">
						<label for="dua" class="col-sm-2 control-label">No. HP</label>
						<div class="col-sm-10">
							<input type="text" required value="<?php echo isset($data[7])?$data[7]:''; ?>" name="no_hp" class="form-control" id="dua" placeholder="nomor hp" disabled>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
				
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>History Tanggal Berobat</th>							
						</tr>
					</thead>
					<tbody>
					<?php
					$norm=$data[1];
					$dataq=mysqli_query($con,"select * from daftar where no_rm='$norm'");				
							while($has=mysqli_fetch_row($dataq))
							{
								echo "
								<tr>
									<td>".date('d F Y', strtotime($has[2]))."</td>									
								</tr>
								";
							}
					   ?>
					</tbody>
				</table>
				</div>
				<!-- /.box-footer -->
			</form>
		</div>
	</div>
	<!--/.col (right) -->
</div>   <!-- /.row -->
