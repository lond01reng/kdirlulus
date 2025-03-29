<div class="tab-pane fade" id="a_surat" role="tabpanel" aria-labelledby="item_surat">
    <div class="row">
      <div class="col-sm-3 d-flex justify-content-center align-items-center">
      <form action="<?=base_url('admin/upload_logo_surat') ?>" method="post" enctype="multipart/form-data">
      <?= csrf_field() ?>
        <div>
          <?php
          $uploadPath = ROOTPATH . 'public/uploads/logo_surat.jpg';
          if (file_exists($uploadPath)):
          ?>
            <img class="img-fluid elevation-3" style="opacity: .8" id="imgSuratPreview" src="<?= base_url('uploads/logo_surat.jpg') ?>" width="200px" alt="Current Image">
          <?php else: ?>
            <img src="<?=base_url();?>assets/img/favicon.png" id="imgSuratPreview" alt="kdirLULUS Logo" class="img-fluid elevation-3" style="opacity: .8" width="200px" >
          <?php endif; ?>
        </div>
        <input type="file" name="imgsurat" class="d-none" id="imageSurat" onchange="this.form.submit()">
        <button class="btn w-100" onclick="document.getElementById('imageSurat').click();">Ganti Gambar</button>
      </form>
      </div>
      <div class="col-sm-9">
      <form action="<?= base_url('admin/gantisurat'); ?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="tab" value="surat">
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
          <button type="submit" class="btn btn-primary btn-block">Simpan Profil</button>
        </form> 
      </div>
    </div>
    <script>
        document.getElementById('imgSuratPreview').addEventListener('click', function() {
            document.getElementById('imageSurat').click();
        });
    </script>
</div>