<?= $this->extend('template/topm') ?>
<?= $this->section('css') ?>
<?= $this->endSection() ?> 
<?= $this->extend('template/topm') ?>
<?= $this->section('konten') ?>
  <div class="card-body">
    <div class="row">
    <?php if($info->sw_status==1){
      $ucapan="Selamat ";
      $status="LULUS";
      $bg="purple";
      $ribbon="success";
    }
    else{
      $ucapan="Mohon Maaf ";
      $status="MENGULANG";
      $bg="gray";
      $ribbon="dark";
    }
    ?>
    <div class="position-relative p-3 bg-<?=$bg;?> d-flex justify-content-center align-items-center">
      <div class="ribbon-wrapper ribbon-lg">
        <div class="ribbon bg-<?=$ribbon;?> text-sm">
          <?=$ucapan;?>
        </div>
      </div>
      <div class="card text-dark">
        <div class="card-header d-flex justify-content-center text-center">
          <h3 class="card-title">Pengumuman Kelulusan <?=$sch->sc_nama;?><br>Tahun <?='20'.$info->sw_tapel.'/20'.($info->sw_tapel+1);?></h3>
        </div>
        <div class="card-body">
          <table class="table table-borderless table-sm">
          <i class="fa fa-star fa-background"></i>
            <tbody>
              <tr>
                <td>Nama</td><td><?=strtoupper($info->sw_nama);?></td>
              </tr>
              <tr>
                <td>NIS/NISN</td><td><?=$info->sw_nis.'/'.$info->sw_nisn;?></td>
              </tr>
              <tr>
                <td>TTL</td><td><?=$info->sw_tempat.', '.date_id($info->sw_tgl);?></td>
              </tr>
              <tr>
                <td>Kelas </td><td><?=$info->sw_kelas.' ('.$info->sw_jurusan.')';?></td>
              </tr>
              <tr>
                <td colspan=2>Rapat Kelulusan tahun <?='20'.$info->sw_tapel.'/20'.($info->sw_tapel+1);?> <?=$sch->sc_nama;?> menyatakan: </td>
              </tr>
              <tr>
                <td colspan=2 class="text-center">
                  <button class="btn btn-<?=$ribbon;?> w-100"><h4><?=$ucapan?> Anda <?=$status;?><h4></button>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php
  ?>
    </div>
  </div>
<?= $this->endSection() ?> 

<?= $this->extend('template/topm') ?>
<?= $this->section('js') ?>

<?= $this->endSection() ?> 