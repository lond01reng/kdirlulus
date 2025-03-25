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
            <button type="button" class="btn btn-sm btn-primary w-100" id="mSiswa"><i class="fas fa-plus-circle"></i> Tambah Siswa</button>
            <table class="table table-bordered table-striped table-sm">
              <thead class="text-center">
                <tr>
                  <td>NIS</td>
                  <td>NISN</td>
                  <td>Nama</td>
                  <td>TTL</td>
                  <td>Kelas</td>
                  <td>Jurusan</td>
                  <td>Status</td>
                  <td>Aksi</td>
                </tr>
              </thead>
              <tbody>

              <?php foreach($siswa as $sw): ?>
                <tr class="table-<?=$sw->sw_status=='1'?"info":"danger";?>">
                  <td><?=$sw->sw_nis;?></td>
                  <td><?=$sw->sw_nisn;?></td>
                  <td><?=$sw->sw_nama;?></td>
                  <td><?=$sw->sw_tempat.', '.$sw->sw_tgl;?></td>
                  <td><?=$sw->sw_kelas;?></td>
                  <td><?=$sw->sw_jurusan;?></td>
                  <td><?=$sw->sw_status=='1'?'Lulus':'Tidak Lulus';?></td>
                  <td>
                  <button type="button" class="btn btn-sm btn-primary mEdit" data-id="<?=$sw->sw_nis;?>"><i class="fas fa-user-edit"></i></button> 
                  <button type="button" class="btn btn-sm btn-danger mDell" data-id="<?=$sw->sw_nis;?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus siswa"><i class="fas fa-trash"></i></button> 
                  </td>
                </tr>
              <?php endforeach;?>
              </tbody>
            </table>

            <?php if(!empty($del_siswa)):?>
              Daftar Siswa Dihapus Dari Pengumuman
              <table class="table table-bordered table-dark table-sm">
              <thead class="text-center">
                <tr>
                  <td>NIS</td>
                  <td>NISN</td>
                  <td>Nama</td>
                  <td>TTL</td>
                  <td>Kelas</td>
                  <td>Jurusan</td>
                  <td>Status</td>
                  <td>Aksi</td>
                </tr>
              </thead>
              <tbody>

              <?php foreach($del_siswa as $del): ?>
                <tr>
                  <td><?=$del->sw_nis;?></td>
                  <td><?=$del->sw_nisn;?></td>
                  <td><?=$del->sw_nama;?></td>
                  <td><?=$del->sw_tempat.', '.$del->sw_tgl;?></td>
                  <td><?=$del->sw_kelas;?></td>
                  <td><?=$del->sw_jurusan;?></td>
                  <td><?=$del->sw_status=='1'?'Lulus':'Tidak Lulus';?></td>
                  <td>
                  <button type="button" class="btn btn-sm btn-danger mRestore" data-id="<?=$del->sw_nis;?>"><i class="fas fa-trash-restore"></i> Pulihkan</button> 
                  </td>
                </tr>
              <?php endforeach;?>
              </tbody>
            </table>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  <!-- </div> -->
<?= $this->endSection() ?> 

<?= $this->extend('template/temp') ?>
<?= $this->section('js') ?>

<?php if(session()->get('level')==='sup'): ?>
<script>

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})

  $(document).ready(function () {
  // Fungsi untuk menangani AJAX request dan menampilkan modal
  function loadModal(url, modalId) {
    $.ajax({
      url: url,
      type: 'GET',
      success: function (data) {
        $('body').append(data);
        $(modalId).modal('show');
      },
      error: function () {
        alert('Gagal memuat konten modal.');
      }
    });
  }

  // Event untuk tombol tambah siswa
  $('#mSiswa').click(function () {
    loadModal('<?= base_url('admin/tambah_siswa'); ?>', '#myModal');
  });

  // Event untuk tombol edit siswa
  $(document).on('click', '.mEdit', function () {
    var id = $(this).data('id');
    loadModal('<?= base_url('admin/edit_biodata/'); ?>' + id, '#edModal');
  });


  $(document).on('click', '.mDell', function () {
    var id = $(this).data('id');
    loadModal('<?= base_url('admin/hapus_siswa/'); ?>'+ id, '#mDelete');
  });
  
  $(document).on('click', '.mRestore', function () {
    var id = $(this).data('id');
    loadModal('<?= base_url('admin/pulihkan_siswa/'); ?>'+ id, '#mRestore');
  });

  // Hapus modal setelah ditutup
  $(document).on('hidden.bs.modal', '.modal', function () {
    $(this).remove();
  });
});

  </script>
<?php endif; ?>
<?= $this->endSection() ?> 