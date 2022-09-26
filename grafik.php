<?php
$label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

for ($bulan = 1; $bulan < 13; $bulan++) {
  $query = mysqli_query($con, "select count(iddaftar) as jumlah from daftar where MONTH(tgl_daftar)='$bulan' ");
  $row = mysqli_fetch_array($query);
  $jumlah_daftar[] = $row['jumlah'];
}
?>
<div class="row">
  <div class="col-xs-12">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Grafik Pendaftaran Pasien</h3>
      </div>
      <!-- /.box-header -->


      <div class="box-body">
        <div style="width: 900px;height: 800px">
          <canvas id="myChart"></canvas>
        </div>


        <script>
          var ctx = document.getElementById("myChart").getContext('2d');
          var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
              labels: <?php echo json_encode($label); ?>,
              datasets: [{
                label: 'Grafik Pendaftaran Pasien 2022',
                data: <?php echo json_encode($jumlah_daftar); ?>,
                backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
                ],
                borderWidth: 1
              }]
            },
            options: {
              scales: {
                yAxes: [{
                  ticks: {
                    beginAtZero: true
                  }
                }]
              }
            }
          });
        </script>
      </div>
      <!-- /.box-body -->


      <!-- /.box-body -->
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<!-- /.col -->

</div>
<!-- /.row -->