<section class="content-header">
  <h1>
    Dashboard
    <small>Admin panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-lg-3 col-xs-6">

      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>
            <?php

            $kunjungan = mysqli_num_rows(mysqli_query($con, "select * from daftar where tgl_daftar=curdate()"));
            echo $kunjungan;
            ?>
          </h3>
          <p>Kunjungan Hari ini</p>
        </div>
        <div class="icon">
          <i class="fa fa-hospital-user"></i>
        </div>
        <a href="index.php?page=medis" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">

      <div class="small-box bg-green">
        <div class="inner">
          <h3>
            <?php
            $allpasien = mysqli_num_rows(mysqli_query($con, "select * from pasien"));
            echo $allpasien;
            ?>
          </h3>
          <p>Semua Pasien</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">

      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>
            <?php
            $alldokter = mysqli_num_rows(mysqli_query($con, "select * from dokter"));
            echo $alldokter;
            ?>
          </h3>
          <p>Dokter</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-xs-6">

      <div class="small-box bg-red">
        <div class="inner">
          <h3>
            <?php
            $alllay = mysqli_num_rows(mysqli_query($con, "select * from layanan"));
            echo $alllay;
            ?>
          </h3>
          <p>Layanan</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>

  </div>
</section>