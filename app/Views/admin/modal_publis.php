<div class="modal fade" id="mPublis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-bs-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Edit Publikasi Pengumuman</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?= base_url('admin/simpan_publis'); ?>" method="POST" enctype="multipart/form-data">
      <?= csrf_field() ?>
        <div class="d-flex justify-content-start mb-5 mt-3">
          <input type="radio" class="btn-check" name="publik" id="success-outlined" autocomplete="off" <?= $data->pb_status==1?'checked':''; ?> value='1'>
          <label class="btn btn-outline-success w-100 text-center" for="success-outlined"><?= $data->pb_status==1?'Sudah Diterbitkan':'Terbitkan'; ?></label>
          <input type="radio" class="btn-check" name="publik" id="danger-outlined" autocomplete="off" <?= $data->pb_status==0?'checked':''; ?> value='0'>
          <label class="btn btn-outline-dark w-100 text-center" for="danger-outlined"><?= $data->pb_status==0?'Belum Diterbitkan':'Rahasiakan'; ?></label>
        </div>
        <div class="mt-5">
        <button type="submit" class="btn btn-sm btn-primary float-right ml-3"><i class="fas fa-save"></i> Simpan</button>
        <button type="button" class="btn btn-sm btn-danger float-right" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>