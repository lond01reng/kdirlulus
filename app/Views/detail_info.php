<?= $this->extend('template/topm') ?>
<?= $this->section('konten') ?>
  <div class="card-body">
    <div class="row text-center">
    <?php if($info->sw_status==1){
      $ucapan="SELAMAT";
      $status="LULUS dari";
      $bg="purple";
      $ribbon="success";
    }
    else{
      $ucapan="MAAF";
      $status="MENGULANG di";
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
      <?=!empty($sch->sc_nama)?$sch->sc_nama:'kdir';?>
      <h3><?=$ucapan;?></h3>
      <h1><?=strtoupper($info->sw_nama)?></h1>
      <h3>Dinyatakan <?= $status?> <?=!empty($sch->sc_nama)?$sch->sc_nama:'kdir';?> </h3>
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