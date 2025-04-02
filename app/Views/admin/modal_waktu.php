<div class="modal fade" id="mWaktu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-bs-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Edit Waktu Pengumuman</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php if($data->pb_status==='1'): ?>
          Pengumuman sudah dipublish, tidak bisa melakukan perubahan data
        <?php else: ?>
        <form action="<?= base_url('admin/simpan_waktu'); ?>" method="POST" enctype="multipart/form-data">
        <?= csrf_field() ?>
          Pilih Tanggal dan Jam:
          <input type="datetime-local" name="wk_publis" class="form-control w-100 d-inline mb-3" value="<?=!empty($data->pb_waktu)? date('Y-m-d\TH:i', strtotime($data->pb_waktu)) :date('Y-m-d H:i');?>">
          <button type="submit" class="btn btn-sm btn-primary float-right ml-3"><i class="fas fa-save"></i> Simpan</button>
        </form>
        <?php endif; ?>
        <button type="button" class="btn btn-sm btn-danger float-right" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
      </div>
    </div>
  </div>
</div>