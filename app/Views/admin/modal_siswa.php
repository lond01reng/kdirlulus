<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Import Siswa</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <div class="modal-body">
            <form action="<?= base_url('admin/simpan_siswa'); ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" name="f_csv" id="f_csv">
                    <label class="input-group-text"  for="f_csv">Pilih file format csv</label>
                </div>
              <button type="submit" class="btn btn-sm btn-primary float-right ml-3"><i class="fas fa-save"></i> Simpan</button>
              <button type="submit" class="btn btn-sm btn-success"><a href="<?= base_url('assets/template/DataKelulusanSiswa.csv')?>" class="text-white"><i class="fas fa-file-csv"></i> Download Template</a></button>
              <button type="button" class="btn btn-sm btn-danger float-right" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
            </form>
            </div>

        </div>
    </div>
</div>

