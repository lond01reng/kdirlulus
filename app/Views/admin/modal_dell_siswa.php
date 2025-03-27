<div class="modal fade" id="mDelete" tabindex="-1" role="dialog" aria-labelledby="myModalDel" data-bs-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalDel">Hapus Data Siswa</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 text-center">
          <h6>Apakah anda yakin menghapus</h6>
          <h4><?=$data->sw_nama?>(<?=$data->sw_nisn?>)</h4>
          <h6>dari data siswa</h6>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
          <form action="<?=base_url('admin/hapus_data_siswa')?>" method="POST">
          <?= csrf_field() ?>
            <input type="hidden" name="dlSiswa" value="<?=$data->sw_nis?>">
            <button type="submit"  class="btn btn-sm btn-dark w-100" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus Data</button>
        </form>
          </div>
          <div class="col-6">
          <button type="button" class="btn btn-sm btn-danger w-100" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>