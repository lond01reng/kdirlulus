<?= $this->extend('template/topm') ?>
<?= $this->section('konten') ?>
<?php
// $tp='20'.$publish->pb_id.'/20'.$publish->pb_id+1;
?>

  <div class="card-body">
    <div class="row text-center">
    <?php if($info->sw_status==1){
      $ucapan="SELAMAT";
      $status="LULUS";
      $bg="purple";
      $ribbon="success";
    }
    else{
      $ucapan="MAAF";
      $status="BELUM LULUS";
      $bg="gray";
      $ribbon="dark";
    }
    ?>
    <div class="position-relative p-3 bg-<?=$bg;?>">
      <div class="ribbon-wrapper ribbon-lg">
        <div class="ribbon bg-<?=$ribbon;?> text-lg">
          <?=$ucapan;?>
        </div>
      </div>
      SMKN_
      <h3><?=$ucapan;?></h3>
      <h1><?=strtoupper($info->sw_nama)?></h1>
      <h3>Dinyatakan <?=$status;?> dari SMKN</h3>
    </div>
    <?php
  print_r($info);
  ?>
    </div>
  </div>
<?= $this->endSection() ?> 

<?= $this->extend('template/topm') ?>
<?= $this->section('js') ?>

<?= $this->endSection() ?> 