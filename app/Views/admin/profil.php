<?= $this->extend('template/temp') ?>
<?= $this->section('css') ?>
<?= $this->endSection() ?> 

<?= $this->extend('template/temp') ?>
<?= $this->section('konten') ?>
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 table-responsive">
            <?= view('admin/info_sesi'); ?>
<!-- tab -->
            <div class="card card-<?=$clr;?> card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="tab_profil" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="item_admin" data-toggle="pill" href="#a_admin" role="tab" aria-controls="a_admin" aria-selected="false">Profil Admin</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="item_sekolah" data-toggle="pill" href="#a_sekolah" role="tab" aria-controls="a_sekolah" aria-selected="false">Profil Sekolah</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="item_surat" data-toggle="pill" href="#a_surat" role="tab" aria-controls="a_surat" aria-selected="false">Profil Surat</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="item_password" data-toggle="pill" href="#a_password" role="tab" aria-controls="a_password" aria-selected="false">Manajemen Password</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="tab_profilContent">
                  <?= view('admin/profil_admin'); ?>
                  <?= view('admin/profil_sekolah'); ?>
                  <?= view('admin/profil_surat'); ?>
                  <?= view('admin/profil_password'); ?>
                </div>
              </div>
            </div>
<!-- tab -->
          </div>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?> 

<?= $this->extend('template/temp') ?>
<?= $this->section('js') ?>
<?php if(session()->get('level')==='sup'): ?>
<script>

  $(document).ready(function () {
    // Ketika tab diklik
    $('#tab_profil a').on('click', function (e) {
        e.preventDefault();
        
        // Menyimpan id tab yang dipilih di sessionStorage
        var activeTab = $(this).attr('href');
        sessionStorage.setItem('activeTab', activeTab);
        
        // Menampilkan tab yang dipilih
        $(this).tab('show');
    });

    // Memulihkan tab yang aktif saat halaman dimuat
    var activeTab = sessionStorage.getItem('activeTab');
    if (activeTab) {
        // Memulihkan tab yang tersimpan sebelumnya
        $('#tab_profil a[href="' + activeTab + '"]').tab('show');
    }
});

</script>
<?php endif; ?>
<?= $this->endSection() ?> 