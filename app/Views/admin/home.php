<?= $this->extend('template/temp') ?>
<?= $this->section('css') ?>
<?= $this->endSection() ?> 

<?= $this->extend('template/temp') ?>
<?= $this->section('konten') ?>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <?= view('admin/info_sesi'); ?>
          <div class="col-lg-6 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$clulus;?></h3>
                <p>Siswa Lulus</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-graduate"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-6">
            <div class="small-box bg-dark">
              <div class="inner">
                <h3><?=$cgagal;?></h3>
                <p>Siswa Tidak Lulus</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-slash"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-6">
            <div class="small-box bg-<?=!empty($waktu->pb_waktu)?$clr:'secondary';?>">
              <div class="inner">
                <?php 
                  if (!empty($waktu->pb_waktu)){
                    echo '<h3>'.$tgl=date('Y-m-d', strtotime($waktu->pb_waktu)).'</h3>';
                    echo '<h3>'.$jam=date('H:i:s', strtotime($waktu->pb_waktu)).'</h3>';
                  }else{
                    echo '<h3>Waktu Pengumuman</h3>';
                    echo '<h3>Belum Disetting</h3>';
                  }
                ?>
                Waktu Pengumuman
              </div>
              <div class="icon">
              <i class="fas fa-clock"></i>
              </div>
            </div>
          </div>
        <div class="col-lg-6 col-6">
            <div class="small-box bg-<?=(empty($waktu->pb_status)|| $waktu->pb_status==0)?'secondary':$clr;?>">
              <div class="inner">
                <?php 
                  if (empty($waktu->pb_status)|| $waktu->pb_status==0){
                    echo '<h3>Belum </h3>';
                    echo '<h3>Dipublikasikan</h3>';
                  }else{
                    echo '<h3>Bisa ';
                    echo '<h3>Diakses Siswa</h3>';                   
                  }
                ?>
                Publikasi Pengumuman
              </div>
              <div class="icon">
                <i class="fas fa-network-wired"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?> 

<?= $this->extend('template/temp') ?>
<?= $this->section('js') ?>
<?php if(session()->get('level')==='sup'): ?>
<?php endif; ?>
<?= $this->endSection() ?> 