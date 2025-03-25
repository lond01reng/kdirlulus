<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= base_url()?>/favicon.ico" type="image/ico" />
  <title><?= $title; ?></title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= base_url()?>assets/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/lte/css/adminlte.min.css">
</head>
<?php
$clr='purple';
$tp='20'.$publish->pb_id.'/20'.$publish->pb_id+1;
?>
<body class="layout-top-nav layout-footer-fixed" style="height: auto;">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white ">
    <div class="container">
      <a href="../../index3.html" class="navbar-brand">
        <img src="<?=base_url();?>assets/img/favicon.png" alt="kdirLULUS Logo" class="brand-image img-circle elevation-1" style="opacity: .8">

        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index3.html" class="nav-link">Home</a>
          </li>
        </ul>
      </div> -->

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item">
        <h6 id="date-time" class="text-center nav-link"></h6>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper<?= $publish->pb_status !== '1'?' bg-dark text-white':''; ?>" style="min-height: 537px;">
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12 mt-3">
            <div class="card card-primary card-outline <?= $publish->pb_status !== '1'?' bg-dark text-white':''; ?>">
              <!-- <div class="card-header">
                <h3 class="card-title"></h3>
              </div> -->
              <div class="card-body">
                <div class="row text-center">

                <?php if($publish->pb_status==='1'): ?>
                  <?php if($publish->pb_waktu > date('Y-m-d H:i:s')): ?>
                    <div class="col-12">
                      <h3>Waktu Menuju Pengumuman Kelulusan <?=$tp?></h3>
                    </div>
                    <div class="col-3">
                      <div class="p-4 bg-light rounded shadow-sm">
                        <div id="days" class="display-1 text-primary w-100"></div>
                        <div class="small text-muted">Hari</div>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="p-4 bg-light rounded shadow-sm">
                        <div id="hours" class="display-1 text-primary"></div>
                        <div class="small text-muted">Jam</div>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="p-4 bg-light rounded shadow-sm">
                        <div id="minutes" class="display-1 text-primary"></div>
                        <div class="small text-muted">Menit</div>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="p-4 bg-light rounded shadow-sm">
                        <div id="seconds" class="display-1 text-primary"></div>
                        <div class="small text-muted">Detik</div>
                      </div>
                    </div>
                  <?php else: ?>


                    <div class="col-12">
                      <h3 class="text-primary">Pengumuman Kelulusan <?=$tp?></h3>
                    </div>
                    <form action="<?= base_url('cari_data'); ?>" method="POST">
                    <?= csrf_field() ?>
                      <div class="row justify-content-center pt-4">
                        <div class="col-sm-3">
                          <!-- text input -->
                          <div class="form-group">
                            <label class="d-block text-left mb-n1">NISN</label>
                            <input type="text" name="nisn" class="form-control" placeholder="NISN">
                          </div>
                          <?= session('errors.nisn')?'<div class="text-sm text-danger mt-n3 mb-3  text-left">'.session('errors.nisn').'</div>':''; ?>
                        </div>
                        <div class="col-sm-3">
                          <div class="form-group">
                            <label class="d-block text-left mb-n1">Tanggal Lahir</label>
                            <input type="date" name="tgl" class="form-control" >
                          </div>
                          <?= session('errors.tgl')?'<div class="text-sm text-danger mt-n3 mb-3 text-left">'.session('errors.tgl').'</div>':''; ?>
                        </div>
                      </div>
                      <div class="row justify-content-center px-3">
                        <button type="submit" class="btn btn-primary w-50"><i class="fas fa-search"></i> Cari Data</button>
                      </div>
                    </div>

                    </form>
                  <?php endif; ?>
                    <!-- Countdown -->

                    <!-- Countdown -->
                <?php else: ?>


                  <div class="col-12 d-flex justify-content-center align-items-center">
                    <div class="d-flex align-items-center">
                      <!-- Segitiga dengan Icon FontAwesome -->
                      <i class="fas fa-exclamation-triangle text-warning mr-2" style="font-size: 72px;"></i>
                      
                      <!-- Teks Pengumuman -->
                      <div>
                        <h1>Pengumuman Kelulusan</h1>
                        <h1><span class="text-warning">BELUM</span> Dipublikasikan</h1>
                      </div>
                    </div>
                  </div>

                <?php endif; ?>

                </div>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>

  <!-- Main Footer -->
  <footer class="main-footer text-sm">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      dikembangkan oleh SMKN<strong>Ngadirojo</strong>
    </div>
    <!-- Default to the left -->
    <strong>Copyright © 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->


<script src="<?= base_url()?>assets/jquery/jquery.min.js"></script>
<script src="<?= base_url()?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url()?>assets/lte/js/adminlte.js"></script>

<script>
    $(document).ready(function () {
      <?php
        $publish= $publish->pb_waktu;
        $publish = str_replace(' ', 'T', $publish);
      ?>
        // Set the date we're counting down to
        // var countDownDate = new Date("March 25, 2025 00:00:00").getTime();
        var countDownDate = new Date("<?php echo date('Y-m-d\TH:i:s', strtotime($publish)); ?>").getTime();
        console.log(countDownDate);

        // Update the countdown every 1 second
        var x = setInterval(function () {
            // Get the current date and time
            var now = new Date().getTime();
            
            // Find the distance between now and the count down date
            var distance = countDownDate - now;
            
            // Time calculations for days, hours, minutes, and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            // Display the result in respective elements
            $("#days").html(days);
            $("#hours").html(hours);
            $("#minutes").html(minutes);
            $("#seconds").html(seconds);
            
            // If the countdown is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                $("#days").html("0");
                $("#hours").html("0");
                $("#minutes").html("0");
                $("#seconds").html("0");
            }
        }, 1000);
    });
</script>

<script>
        function updateDateTime() {
            var now = new Date();
            var day = now.getDate().toString().padStart(2, '0');
            var year = now.getFullYear();
            var hours = now.getHours().toString().padStart(2, '0');
            var minutes = now.getMinutes().toString().padStart(2, '0');
            var seconds = now.getSeconds().toString().padStart(2, '0');

            // Nama bulan
            var months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            var month = months[now.getMonth()]; // Ambil nama bulan berdasarkan angka bulan

            var currentDateTime = `${day} ${month} ${year} ${hours}:${minutes}:${seconds}`;
            document.getElementById("date-time").innerText = currentDateTime;
        }

        setInterval(updateDateTime, 1000); // Update setiap detik
        updateDateTime(); // Panggil pertama kali untuk menampilkan waktu langsung
    </script>
</body>
</html>