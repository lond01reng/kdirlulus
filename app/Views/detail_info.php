<?= $this->extend('template/topm') ?>
<?= $this->section('css') ?>
<style>
.background-icon {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      /* z-index: -1; Pastikan ikon berada di belakang tabel */
      font-size: 10rem; /* Ukuran ikon bisa disesuaikan */
      color: rgba(0, 0, 0, 0.15); /* Warna ikon dengan transparansi */
      display: flex;
      justify-content: center;
      align-items: center;
    }
    </style>
<?= $this->endSection() ?> 
<?= $this->extend('template/topm') ?>
<?= $this->section('konten') ?>
  <div class="card-body">
    <div class="row d-flex justify-content-center align-items-center"">
    <?php if($info->sw_status==1){
      $ucapan="Selamat ";
      $status="LULUS";
      $bg="light";
      $ribbon="success";
      $ico="graduate";
    }
    else{
      $ucapan="Mohon Maaf ";
      $status="MENGULANG";
      $bg="secondary";
      $ribbon="dark";
      $ico="slash";
    }
    $sch=!empty($sch->sc_nama)?$sch->sc_nama:'kdir';
    ?>
      <div class="card text-dark w-50 bg-<?=$bg;?> bg-gradient col-12 col-md-6">
        <div class="card-header d-flex justify-content-center text-center">
          <h3 class="card-title">Pengumuman Kelulusan <?=$sch;?><br>Tahun <?='20'.$info->sw_tapel.'/20'.($info->sw_tapel+1);?></h3>
        </div>
        <div class="card-body">
          <div class="ribbon-wrapper ribbon-lg">
          <div class="ribbon bg-<?=$ribbon;?> text-sm">
            <?=$ucapan;?>
          </div>
        </div>
        <i class="fas fa-user-<?=$ico;?> background-icon"></i>
          <table class="table table-borderless table-sm">
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
                <td colspan=2>Rapat Kelulusan tahun <?='20'.$info->sw_tapel.'/20'.($info->sw_tapel+1);?> <?=$sch;?> menyatakan: </td>
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
    <?php
  ?>
    </div>
  </div>
<?= $this->endSection() ?> 

<?= $this->extend('template/topm') ?>
<?= $this->section('js') ?>

<?= $this->endSection() ?> 