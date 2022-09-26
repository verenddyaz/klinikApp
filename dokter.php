<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Data Dokter</h3>
        <a href="index.php?page=adddokter" class="btn btn-danger pull-right"> Add Data Dokter</a>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Dokter</th>
              <th>Jenis Dokter</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $qu = mysqli_query($con, "select * from dokter order by iddokter asc");
            while ($has = mysqli_fetch_row($qu)) {
              echo "
								<tr>
                  <td>" . $no . "</td>  
									<td>$has[1]</td>
									<td>$has[2]</td>
									<td style='text-align:center'>
						<a href='index.php?page=editdokter&id=$has[0]'><span data-placement='top' data-toggle='tooltip' title='Edit'><button class='btn btn-primary btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' ><span class='glyphicon glyphicon-pencil'></span></button><span></a>
            <a href='hapusdokter.php?id=$has[0]' onClick=\"return confirm('Anda yakin menghapus data ini ?')\" class='btn btn-danger btn-xs'><span class='glyphicon glyphicon-trash'></span></a>
						
									</td>
								</tr>
								";
              $no++;
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

</div>
<!-- /.row -->