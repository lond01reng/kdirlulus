<div class="tab-pane fade" id="a_surat" role="tabpanel" aria-labelledby="item_surat">
  <form action="<?= base_url('admin/gantisurat'); ?>" method="post">
  <?= csrf_field() ?>
    <div class="row">
      <div class="col-sm-3">
      <img src="<?=base_url();?>assets/img/favicon.png" alt="kdirLULUS Logo" class="img-fluid elevation-3" style="opacity: .8">
      </div>
      <div class="col-sm-9">
        <div class="row">
          <div class="col-md-2">
          Provinsi
          </div>
          <div class="col-md-10">
            <input type="text" class="form-control" id="npsn"  name="npsn" placeholder="NPSN" value="501">
          </div>
          <div class="col-sm-2">
          Dinas
          </div>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="sch"  name="sch" placeholder="Sekolah" value="501">
            <?= session('errors.npsn')?'<div class="text-sm text-danger mt-n3 mb-3">'.session('errors.npsn').'</div>':''; ?>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block">Ganti Password</button>
  </form>                   
</div>