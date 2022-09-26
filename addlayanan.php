<?php
//include "kodeauto.php";
if (isset($_POST['save'])) {

  mysqli_query($con, "insert into layanan values('','$nama_layanan','$harga')");
  echo "<div class='alert alert-success' role='alert'>Data Layanan Berhasil Tersimpan</div>";
} elseif (isset($_POST['update'])) {
  $id = $_GET['id'];
  mysqli_query($con, "update layanan set nama_layanan='$nama_layanan',harga='$harga' where idlayanan='$id'");
  echo "<div class='alert alert-success' role='alert'>Data Layanan Berhasil Terupdate</div>";
}

if (isset($_GET['id'])) {
  $data = mysqli_fetch_row(mysqli_query($con, "select * from layanan where idlayanan='" . $_GET['id'] . "'"));
}
?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Form Data Layanan</h3>
      </div>
      <form class="form-horizontal" method="post">
        <div class="box-body">

          <div class="form-group">
            <label for="dua" class="col-sm-2 control-label">Nama Layanan</label>
            <div class="col-sm-10">
              <input type="hidden" value="<?php echo isset($data[0]) ? $data[0] : ''; ?>" name="idlayanan" class="form-control" placeholder="isi nama layanan">
              <input type="text" value="<?php echo isset($data[1]) ? $data[1] : ''; ?>" name="nama_layanan" class="form-control" placeholder="isi nama layanan">
            </div>
          </div>
          <div class="form-group">
            <label for="dua" class="col-sm-2 control-label">Harga</label>
            <div class="col-sm-10">
              <input type="text" value="<?php echo isset($data[2]) ? $data[2] : ''; ?>" name="harga" class="form-control" placeholder="isi harga layanan">
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