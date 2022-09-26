<?php

if (isset($_POST['save'])) {

  mysqli_query($con, "insert into dokter values('','$nama_dokter','$jenis_dokter')");
  echo "<div class='alert alert-success' role='alert'>Data Dokter Berhasil Tersimpan</div>";
} elseif (isset($_POST['update'])) {
  mysqli_query($con, "update dokter set nama_dokter='$nama_dokter',jenis_dokter='$jenis_dokter' where iddokter='$iddokter'");
  //echo "<div class='alert alert-success' role='alert'>Data Dokter Berhasil Terupdate</div>";
  echo "<script> 
            alert('Data Dokter berhasil diubah!');
            document.location.href = 'index.php?page=dokter';
        </script>
    ";
}

if (isset($_GET['id'])) {
  $data = mysqli_fetch_row(mysqli_query($con, "select * from dokter where iddokter='" . $_GET['id'] . "'"));
}
?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Form Data Dokter</h3>
      </div>
      <form class="form-horizontal" method="post">
        <div class="box-body">

          <div class="form-group">
            <label for="dua" class="col-sm-2 control-label">Nama Dokter</label>
            <div class="col-sm-10">
              <input type="hidden" value="<?php echo isset($data[0]) ? $data[0] : ''; ?>" name="iddokter" class="form-control">
              <input type="text" value="<?php echo isset($data[1]) ? $data[1] : ''; ?>" name="nama_dokter" class="form-control" id="dua" placeholder="isi nama dokter">
            </div>
          </div>
          <div class="form-group">
            <label for="dua" class="col-sm-2 control-label">Jenis Dokter</label>
            <div class="col-sm-10">
              <input type="text" value="<?php echo isset($data[2]) ? $data[2] : ''; ?>" name="jenis_dokter" class="form-control" placeholder="isi jenis dokter">
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