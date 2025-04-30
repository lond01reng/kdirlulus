<?= $this->extend('template/topm') ?>
<?= $this->section('konten') ?>

<?php if(!empty($publish)): ?>
<?php
$tp='20'.$publish->pb_id.'/20'.$publish->pb_id+1;
$scnm=(!empty($sch->sc_nama))?esc($sch->sc_nama):"kdir";
?>
    <div class="row text-center">
      <div class="col-12">
      <?php  $uploadPath = ROOTPATH . 'public/uploads/logo_sekolah.jpg';
        if (file_exists($uploadPath)){
          $img=base_url('uploads/logo_sekolah.jpg');
        }else{
          $img= base_url('assets/img/favicon.png');
        }
      ?>
      <img src="<?=$img;?>" alt="sekolahLogo" class="" width="150px">
      <h2>
      <?= $scnm; ?>
      </h2>
      </div>
    </div>
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
    <?php else: ?>
      <div class="col-12 d-flex justify-content-center align-items-center">
        <div class="d-flex align-items-center">
          <i class="fas fa-exclamation-triangle text-warning mr-2" style="font-size: 72px;"></i>
          <div>
            <h1>Pengumuman Kelulusan</h1>
            <h1><span class="text-warning">BELUM</span> Dipublikasikan</h1>
          </div>
        </div>
      </div>
    <?php endif; ?>

    </div>
<?php else: ?>
  <div class="card-body bg-dark text-center">
    <h1><i class="fas fa-pencil-ruler text-warning"></i> Maintenance...</h1>
  </div>
<?php endif ?>
<?= $this->endSection() ?> 

<?= $this->extend('template/topm') ?>
<?= $this->section('js') ?>
<?php if(!empty($publish)): ?>
<script>
  $(document).ready(function () {
    <?php
      $publish= $publish->pb_waktu;
      $publish = str_replace(' ', 'T', $publish);
    ?>
      var countDownDate = new Date("<?php echo date('Y-m-d\TH:i:s', strtotime($publish)); ?>").getTime();
      function padZero(num) {
        return num < 10 ? '0' + num : num;
      }

      var x = setInterval(function () {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        $("#days").html(padZero(days));
        $("#hours").html(padZero(hours));
        $("#minutes").html(padZero(minutes));
        $("#seconds").html(padZero(seconds));
        if (distance < 0) {
          clearInterval(x);
          $("#days").html("00");
          $("#hours").html("00");
          $("#minutes").html("00");
          $("#seconds").html("00");
        }
      }, 1000);
  });
</script>
<?php endif ?>
<?= $this->endSection() ?> 