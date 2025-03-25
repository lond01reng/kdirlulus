<?php $text='purple';?>
<li class="nav-item">
  <a href="<?= base_url('admin/beranda');?>" class="nav-link<?= $act=='beranda'?' active text-'.$text:''; ?>">
    <i class="nav-icon fas fa-tachometer-alt"></i>
    <p>
      Dashboard
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="<?= base_url('admin/data_siswa');?>" class="nav-link<?= $act=='data_siswa'? ' active text-'.$text:'' ?>">
  <i class="nav-icon fas fa-users"></i>
    <p>
      Data Siswa
    </p>
  </a>
</li>  
<li class="nav-item">
  <a href="<?= base_url('admin/pengumuman');?>" class="nav-link<?= $act=='pengumuman'? ' active text-'.$text:'' ?>">
  <i class="nav-icon fas fa-clock"></i>
    <p>
      Pengumuman
    </p>
  </a>
</li>  
<li class="nav-item">
  <a href="<?= base_url('admin/profil');?>" class="nav-link<?= $act=='profil'? ' active text-'.$text:'' ?>">
  <i class="nav-icon fas fa-user"></i>
    <p>
      Profil
    </p>
  </a>
</li>  