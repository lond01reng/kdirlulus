<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('cari_data', 'Home::getSiswaLulus');
$routes->get('info_detail', 'Home::detailInfo');

$routes->group('auth',['filter'=>'isauth'],static function($routes){
  $routes->get('/','Auth::index');
  $routes->get('/login','Auth::index');
  $routes->post('logproses', 'Auth::logProses');
});
$routes->group('admin',['filter'=>'cekauth'], static function($routes){
  $routes->get('/', 'Admin\Home::index');
  $routes->get('beranda', 'Admin\Home::index');
  $routes->get('logout', 'Auth::logout');
  //Profil
  $routes->get('profil', 'Admin\User::index');
  $routes->post('gantipassword', 'Auth::gantiPassword');
  $routes->post('edit_sekolah', 'Admin\User::editSekolah');
  $routes->post('upload_logo_sekolah', 'Admin\User::uploadLogoSekolah');
  //Data Siswa
  $routes->get('data_siswa', 'Admin\Siswa::index');
  $routes->get('tambah_siswa', 'Admin\Siswa::mTambahSiswa');
  $routes->post('simpan_siswa', 'Admin\Siswa::simpanSiswa');
  $routes->get('edit_biodata/(:num)', 'Admin\Siswa::editBiodata/$1');
  $routes->POST('simpan_biodata/(:num)', 'Admin\Siswa::simpanBiodata/$1');
  $routes->get('hapus_siswa/(:num)', 'Admin\Siswa::hapusSiswa/$1');
  $routes->POST('hapus_data_siswa', 'Admin\Siswa::dellSiswa');
  $routes->get('pulihkan_siswa/(:num)', 'Admin\Siswa::pulihkanSiswa/$1');
  $routes->POST('pulihkan_data_siswa', 'Admin\Siswa::restoreSiswa');

  // $routes->get('cGagal', 'Admin\Siswa::cGagal');
  // $routes->get('cLulus', 'Admin\Siswa::cLulus');
  //pengumuman
  $routes->get('pengumuman', 'Admin\Pengumuman::index');
  $routes->get('edit_waktu', 'Admin\Pengumuman::editWaktu');
  $routes->post('simpan_waktu', 'Admin\Pengumuman::simpanWaktu');
  $routes->get('edit_publis', 'Admin\Pengumuman::editPublis');
  $routes->post('simpan_publis', 'Admin\Pengumuman::simpanPublis');
  $routes->post('simpan_info', 'Admin\Pengumuman::simpanInfo');
  $routes->post('hapus_info', 'Admin\Pengumuman::hapusInfo');

});