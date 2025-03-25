<div class="tab-pane fade show active" id="a_admin" role="tabpanel" aria-labelledby="item_admin">
<form action="<?= base_url('admin/edit_sekolah'); ?>" method="post">
  <?= csrf_field() ?>
  <input type="hidden" name="tab" value="sekolah">
    <div class="row mb-3">
      <div class="col-sm-2">
      NPSN
      </div>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="npsn"  name="npsn" placeholder="NPSN" value="<?=!empty($sch)?$sch->sc_npsn:''?>">
      </div>
    </div>
    
    <button type="submit" class="btn btn-primary btn-block">Simpan Profil</button>
  </form> 
</div>