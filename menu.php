<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <!-- search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MENU NAVIGATION</li>
      <?php if ($_SESSION['level'] == 'owner') { ?>
        <li class="treeview">
          <a href="index.php?page=home">
            <i class="glyphicon glyphicon-home"></i> <span>Home</span>
            <i class="fa fa-angle-right pull-right"></i>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-file"></i> <span>Laporan</span>
            <i class="fa fa-angle-right pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?page=lap"><i class="glyphicon glyphicon-pencil"></i> Preview Data</a></li>
            <li><a href="index.php?page=cetak"><i class="glyphicon glyphicon-list active"></i> Print Data</a></li>
            <li><a href="index.php?page=grafik"><i class="glyphicon glyphicon-book active"></i> Grafik</a></li>
          </ul>
        </li>
        <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>
      <?php } else { ?>
        <li class="treeview">
          <a href="index.php?page=home">
            <i class="glyphicon glyphicon-home"></i> <span>Home</span>
            <i class="fa fa-angle-right pull-right"></i>
          </a>
        </li>

        <li class="treeview">
          <a href="">
            <i class="glyphicon glyphicon-list"></i> <span>Data Master</span>
            <i class="fa fa-angle-right pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?page=dokter"><i class="glyphicon glyphicon-file"></i> Data Dokter</a></li>
            <li><a href="index.php?page=layanan"><i class="glyphicon glyphicon-file"></i> Data Layanan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="index.php?page=pasien">
            <i class="glyphicon glyphicon-pencil"></i> <span>Pendaftaran</span>
            <i class="fa fa-angle-right pull-right"></i>
          </a>
        </li>
        <li class="treeview">
          <a href="index.php?page=bayar">
            <i class="glyphicon glyphicon-book"></i> <span>Pembayaran</span>
            <i class="fa fa-angle-right pull-right"></i>
          </a>
        </li>
        <li class="treeview">
          <a href="index.php?page=medis">
            <i class="glyphicon glyphicon-list-alt"></i> <span>Data Medis</span>
            <i class="fa fa-angle-right pull-right"></i>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-file"></i> <span>Laporan</span>
            <i class="fa fa-angle-right pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?page=lap"><i class="glyphicon glyphicon-pencil"></i> Preview Data</a></li>
            <li><a href="index.php?page=cetak"><i class="glyphicon glyphicon-list active"></i> Print Data</a></li>
            <li><a href="index.php?page=grafik"><i class="glyphicon glyphicon-book active"></i> Grafik Pasien</a></li>
            <li><a href="index.php?page=grafiktransaksi"><i class="glyphicon glyphicon-book active"></i> Grafik Transaksi</a></li>
          </ul>
        </li>
        <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a></li>
      <?php } ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>