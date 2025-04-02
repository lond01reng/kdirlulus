<div class="tab-pane fade" id="a_sekolah" role="tabpanel" aria-labelledby="item_sekolah">
    <div class="row">
      <div class="col-sm-3 d-flex justify-content-center align-items-center">
      <form action="<?=base_url('admin/upload_logo_sekolah') ?>" method="post" enctype="multipart/form-data">
      <?= csrf_field() ?>
        <div>
          <?php
          $uploadPath = ROOTPATH . 'public/uploads/logo_sekolah.jpg';
          if (file_exists($uploadPath)):
          ?>
            <img class="img-fluid elevation-3" style="opacity: .8" id="imagePreview" src="<?= base_url('uploads/logo_sekolah.jpg') ?>" width="200px" alt="Current Image">
          <?php else: ?>
            <img src="<?=base_url();?>assets/img/favicon.png" id="imagePreview" alt="kdirLULUS Logo" class="img-fluid elevation-3" style="opacity: .8" width="200px" >
          <?php endif; ?>
        </div>
        <?php if($isPub!=='1'): ?>
        <input type="file" name="image" class="d-none" id="imageInput" onchange="this.form.submit()">
        <button class="btn w-100" onclick="document.getElementById('imageInput').click();">Ganti Gambar</button>
        <?php endif;?>
      </form>
      </div>
      <div class="col-sm-9">
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
          <div class="row mb-3">
            <div class="col-sm-2">
            Sekolah
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="sch"  name="sch" placeholder="Sekolah" value="<?=!empty($sch)?$sch->sc_nama:''?>">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-2">
            Kepala Sekolah
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="ks"  name="ks" placeholder="Kepala Sekolah" value="<?=!empty($sch)?$sch->sc_ks:''?>">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-sm-2">
            NIP
            </div>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nip"  name="nip" placeholder="NIP" value="<?=!empty($sch)?$sch->sc_nip:''?>">
            </div>
          </div>
          <?php if($isPub!=='1'):?>
          <button type="submit" class="btn btn-primary btn-block">Simpan Profil</button>
          <?php endif; ?>
        </form> 
      </div>
    </div>
    <script>
        document.getElementById('imagePreview').addEventListener('click', function() {
            document.getElementById('imageInput').click();
        });
    </script>
</div>