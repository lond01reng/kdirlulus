<div class="modal fade" id="edModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Edit Biodata</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
      <form action="<?= base_url('admin/simpan_biodata/'.$data->sw_nis); ?>" method="POST" enctype="multipart/form-data">
      <?= csrf_field() ?>
        <table class="table table-sm table-borderless">
          <tr><td>NIS/NISN </td><td> <?=$data->sw_nis;?>/<input type="text" name="bio_nisn" class="form-control w-75 d-inline" value="<?=$data->sw_nisn;?>"></td></tr>
          <tr><td>Nama</td><td><input type="text" name="bio_nama" class="form-control" value="<?=$data->sw_nama;?>"></td></tr>
          <tr><td>Lahir</td><td>
            <!-- <div class="d-inline"> -->
              <input type="text" name="bio_tempat" class="form-control w-50 d-inline" value="<?=$data->sw_tempat;?>"> 
              <input type="date" name="bio_tgl" class="form-control w-auto d-inline" value="<?=$data->sw_tgl;?>">
            <!-- </div> -->
          </td></tr>
          <tr><td>Kelas</td><td>
            <input type="text" name="bio_kelas" class="form-control w-25 d-inline" value="<?=$data->sw_kelas;?>"> 
            <input type="text" name="bio_jurusan" class="form-control w-auto d-inline" value="<?=$data->sw_jurusan;?>">
          </td></tr>
          <tr><td>Status</td><td>
            <div class="custom-control custom-switch">
              <input type="checkbox" name="bio_stat" class="custom-control-input" value="1" id="status" <?= $data->sw_status==1?"checked":""?>>
              <label class="custom-control-label" for="status"><?= $data->sw_status==1?"Lulus":"Tidak Lulus";?></label>
            </div>


          </td></tr>

        </table>
        <button type="submit" class="btn btn-sm btn-primary float-right ml-3"><i class="fas fa-save"></i> Simpan</button>
        <button type="button" class="btn btn-sm btn-danger float-right" data-bs-dismiss="modal"><i class="fas fa-times-circle"></i> Batal</button>
      </form>
      </div>

    </div>
  </div>
</div>

<!-- <script>
  const checkbox = document.getElementById("status");
  const label = document.getElementById("status-label");

  checkbox.addEventListener("change", function() {
    if (checkbox.checked) {
      label.textContent = "Lulus";
    } else {
      label.textContent = "Tidak Lulus";
    }
  });
</script> -->
