<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= base_url()?>/favicon.ico" type="image/ico" />
  <title><?= $title; ?></title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="<?= base_url()?>assets/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/lte/css/adminlte.min.css">
  <?= $this->renderSection('css') ?>
</head>
<?php
$clr='purple';
?>
<body class="layout-fixed sidebar-closed control-sidebar-slide-open layout-navbar-fixed sidebar-open sidebar-mini-xs accent-<?= $clr;?> layout-footer-fixed" style="height: auto;">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <h4 class="nav-link mb-n3"><?= $title; ?> Tahun 20<?= session('tapel')?>/20<?= (session('tapel')+1)?></h4>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-bs-toggle="dropdown" href="#">
          <i class="fas fa-user-cog text-dark"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item"><i class="fas fa-user-circle mr-2"></i><?= session()->get('name'); ?></a>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url(); ?>admin/logout" class="dropdown-item">
            <i class="fas fa-power-off mr-2 text-<?=$clr;?>"></i>Logout
            <span class="float-right text-muted text-sm"></span>
          </a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-<?=$clr;?> elevation-2">
    <!-- Brand Logo -->
    <a href="<?=base_url();?>" class="brand-link">
      <img src="<?=base_url();?>assets/img/favicon.png" alt="kdirLULUS Logo" class="brand-image img-circle elevation-1" style="opacity: .8">
      <span class="brand-text font-weight-light"><?=$sch->sc_nama;?></span>
    </a>

    <!-- Sidebar -->

    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url();?>dist/img/favicon.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          
        </div>
      </div> -->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-flat nav-compact" data-widget="treeview" role="menu" data-accordion="false">

          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Pengguna
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/UI/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/icons.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Alumni</p>
                </a>
              </li>
            </ul>
          </li> -->
          

          <!-- <li class="nav-item">
            <a href="<?= base_url('admin/profil');?>" class="nav-link<?= $act=='profil'? ' active text-warning':'' ?>">
            <i class="nav-icon fas fa-user"></i>
              <p>
                Profil
              </p>
            </a>
          </li>    -->

          <?= view('template/menu_admin'); ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper pt-3">
    <?= $this->renderSection('konten'); ?>
  </div>
  <footer class="main-footer text-sm">
    <strong>Copyright &copy; 2025 <a href="#">kdirLULUS</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<script src="<?= base_url()?>assets/jquery/jquery.min.js"></script>
<script src="<?= base_url()?>assets/popper/popper.min.js"></script>
<script src="<?= base_url()?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url()?>assets/lte/js/adminlte.js"></script>
<?= $this->renderSection('js') ?>
</body>
</html>