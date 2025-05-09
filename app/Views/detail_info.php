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

    .foto-td {
      width: 120px;
    }
    .foto-siswa {
      object-fit: cover;
      height: 100%;
      width: 100%;
      display: block;
    }
    .table td {
      vertical-align: top;
    }
</style>
<?= $this->endSection() ?> 
<?= $this->extend('template/topm') ?>
<?= $this->section('konten') ?>
  <div class="card-body">
    <div class="row d-flex justify-content-center align-items-center">
    <?php if($siswa->sw_status==1){
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
          <h3 class="card-title">Pengumuman Kelulusan <?=$sch;?><br>Tahun <?='20'.$siswa->sw_tapel.'/20'.($siswa->sw_tapel+1);?></h3>
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
                <td rowspan="4"   class="foto-td" ><img src="https://hadir.smknngadirojo.sch.id/foto_siswa/<?=$siswa->sw_nisn;?>.jpg" alt=""  class="foto-siswa"></td><td>Nama</td><td><?=strtoupper($siswa->sw_nama);?></td>
              </tr>
              <tr>
                <td>NIS/NISN</td><td><?=$siswa->sw_nis.'/'.$siswa->sw_nisn;?></td>
              </tr>
              <tr>
                <td>TTL</td><td><?=$siswa->sw_tempat.', '.date_id($siswa->sw_tgl);?></td>
              </tr>
              <tr>
                <td>Kelas </td><td><?=$siswa->sw_kelas.' ('.$siswa->sw_jurusan.')';?></td>
              </tr>
              <tr>
                <td colspan=3>Rapat Kelulusan tahun <?='20'.$siswa->sw_tapel.'/20'.($siswa->sw_tapel+1);?> <?=$sch;?> menyatakan: </td>
              </tr>
              <tr>
                <td colspan=3 class="text-center">
                  <button class="btn btn-<?=$ribbon;?> w-100"><h4><?=$ucapan?> Anda <?=$status;?><h4></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row d-flex justify-content-center align-items-cente">
      <div class="card card-outline card-primary w-50 col-12 col-md-6">
        <div class="card-header">
          <h3 class="card-title">Informasi Penting</h3>
        </div>
        <div class="card-body">
          <?php
          $i=1;
          foreach($info as $inf){
            echo $i++.'. '.$inf->if_desc.'<br>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?> 

<?= $this->extend('template/topm') ?>
<?= $this->section('js') ?>

<?= $this->endSection() ?> 