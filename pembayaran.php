<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Pembayaran Berobat Hari Ini</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example2" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No. Rekam Medik</th>
              <th>Nama </th>
              <th>Status</th>
              <th>Alamat</th>
              <th>Tanggal Daftar</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $qu = mysqli_query($con, "select daftar.iddaftar,daftar.no_rm,daftar.tgl_daftar,
							pasien.nama,pasien.layanan,pasien.alamat,daftar.bayar from daftar,pasien 
							where daftar.no_rm=pasien.no_rm AND daftar.tgl_daftar=curdate() order by daftar.iddaftar asc");
            while ($has = mysqli_fetch_row($qu)) {
              $tgl = explode("-", $has[2]);
            ?>
              <tr>
                <td><?= $has[1]; ?></td>
                <td><?= $has[3]; ?></td>
                <td><?= $has[4]; ?></td>
                <td><?= $has[5]; ?></td>
                <td><?= date('d-m-Y', strtotime($has[2])); ?></td>
                <td style='text-align:center'>
                  <?php
                  if ($has[6] == 0) {
                    echo "<a href='index.php?page=formbayar&id=$has[0]'><span data-placement='top' data-toggle='tooltip' title='Pendaftaran'><button class='btn btn-success btn-xs' data-title='Edit' data-toggle='modal' data-target='#edit' > <span class='glyphicon glyphicon-file'></span> Bayar </button><span></a>";
                  } else {
                    echo "<a href='cetakstruk.php?id=$has[0]' class='btn btn-warning btn-xs' target='_blank'>Cetak</a>";
                  }
                  ?>
                </td>
              </tr>
            <?php
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