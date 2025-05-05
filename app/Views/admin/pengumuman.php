<?= $this->extend('template/temp') ?>
<?= $this->section('css') ?>
<?= $this->endSection() ?> 

<?= $this->extend('template/temp') ?>
<?= $this->section('konten') ?>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <?= view('admin/info_sesi'); ?>
        <div class="col-lg-6 col-6">
          <div class="small-box bg-<?=!empty($publish->pb_waktu)?$clr:'secondary';?>">
            <div class="inner">
              <?php 
                if (!empty($publish->pb_waktu)){
                  echo '<h3>'.$tgl=date('Y-m-d', strtotime($publish->pb_waktu)).'</h3>';
                  echo '<h3>'.$jam=date('H:i:s', strtotime($publish->pb_waktu)).'</h3>';
                }else{
                  echo '<h3>Waktu Pengumuman</h3>';
                  echo '<h3>Belum Disetting</h3>';
                }
              ?>
              Waktu Pengumuman
            </div>
            <div class="icon">
            <i class="fas fa-clock"></i>
            </div>
            <button type="button" class="btn btn-sm w-100 small-box-footer" id="<?=!empty(session('tapel'))?"omWaktu":"onWaktu";?>">
            <?php if (!empty($publish->pb_waktu)): ?>
                Ubah Waktu Pengumuman <i class="fas fa-arrow-circle-right"></i>
            <?php else: ?>
                Isikan Waktu Pengumuman <i class="fas fa-arrow-circle-right"></i>               
            <?php endif; ?>
            </button>
          </div>
        </div>
        <div class="col-lg-6 col-6">
          <div class="small-box bg-<?=empty($publish) or $publish->pb_status=='0'?'info':$clr;?>">
            <div class="inner">
              <?php 
                if ($publish->pb_status==1){
                  echo '<h3>Bisa ';
                  echo '<h3>Diakses Siswa</h3>';
                }else{
                  echo '<h3>Belum </h3>';
                  echo '<h3>Dipublikasikan</h3>';
                }
              ?>
              Publikasi Pengumuman
            </div>
            <div class="icon">
              <i class="fas fa-network-wired"></i>
            </div>
              <button type="button" class="btn btn-sm w-100 small-box-footer" id="<?=!empty($publish->pb_waktu)?'publis':'publish'?>">
              <?php if ($publish->pb_status==1): ?>
                  Jangan Publikasikan <i class="fas fa-arrow-circle-right"></i>
              <?php else: ?>
                  Mulai Pubikasikan <i class="fas fa-arrow-circle-right"></i>               
              <?php endif; ?>
              </button>

          </div>
        </div>
        <div class="col-12">
        <h4>Pengumuman Kelulusan</h4>
        <form action="<?= base_url('admin/simpan_info') ?>" method="POST">
        <?= csrf_field()?>
          <div id="divInfo"></div>
          <div class="mb-3">
            <?php if(!empty($publish->pb_waktu) AND $publish ->pb_status==0):?>
            <button type="button" class="btn btn-primary" onclick="tambahInfo(); return false;">Tambah Pengumuman</button> <button type="submit" class="btn btn-success">Simpan</button>
            <?php endif; ?>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>

<?= $this->endSection() ?> 

<?= $this->extend('template/temp') ?>
<?= $this->section('js') ?>
<script>
  $(document).ready(function () {
    function showModal(modalId, url) {
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

    $('#omWaktu').click(function () {
      showModal('#mWaktu', '<?= base_url('admin/edit_waktu'); ?>');
    });

    $('#publis').click(function () {
      showModal('#mPublis', '<?= base_url('admin/edit_publis'); ?>');
    });
  });
</script> 
<script>
  let ctInfo = 0;
  const status = <?= $publish->pb_status ?>;
  
  // Update the button dynamically based on status
  function getButton() {
    return (status !== 1) ? `<button type="button" class="btn btn-danger" onclick="delInfo(${ctInfo})">Hapus</button>` : '';
  }

  console.log(status);

  // Function to add new info field
  function tambahInfo() {
    ctInfo++;
    const divInfo = document.getElementById('divInfo');
    const newDiv = document.createElement('div');
    newDiv.id = 'info_' + ctInfo;
    newDiv.classList.add('mb-3');
    newDiv.innerHTML = `
      <div class="input-group">
        <span type="button" class="btn btn-danger">${ctInfo}</span>
        <input type="text" name="info[]" class="form-control" placeholder="Pengumuman">
        ${getButton()}
      </div>
    `;
    divInfo.appendChild(newDiv);
  }

  // Function to delete an info field
  function delInfo(id) {
    const infoDiv = document.getElementById('info_' + id);          
    if (!infoDiv) {
      console.log('Elemen dengan id "info_' + id + '" tidak ditemukan.');
      return;
    }
    infoDiv.remove();

    const infoIdElement = infoDiv.querySelector('input[name="info_id[]"]');
    if (infoIdElement) {
        const infoId = infoIdElement.value;
        fetch('<?= base_url('admin/hapus_info') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
            },
            body: JSON.stringify({ info_id: infoId })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                console.log('Data berhasil dihapus');
            } else {
                console.log('Gagal menghapus data');
            }
        })
        .catch(error => {
            // console.log('Terjadi kesalahan: ', error);
            window.location.href = '<?= base_url('admin/pengumuman') ?>';
        });
    } else {
        console.log('info_id tidak ditemukan');
    }
  }

  // Populate the form with existing data
  const dataPengumuman = <?= json_encode($info) ?>;
  
  function isiForm(data) {
    const divInfo = document.getElementById('divInfo');
    divInfo.innerHTML = '';
    data.forEach((item, index) => {
      ctInfo++;
      const newDiv = document.createElement('div');
      newDiv.id = 'info_' + ctInfo;
      newDiv.classList.add('mb-2');
      newDiv.innerHTML = `
        <div class="input-group">
          <input type="hidden" name="info_id[]" value="${item.if_id}">
          <span type="button" class="btn btn-danger">${ctInfo}</span>
          <input type="text" name="info[]" class="form-control" value="${item.if_desc || ''}">
          ${getButton()}
        </div>
      `;
      divInfo.appendChild(newDiv);
    });
  }

  // If there are existing announcements, populate the form
  if (dataPengumuman.length > 0) {
    isiForm(dataPengumuman);
  }
</script>



<?= $this->endSection() ?> 