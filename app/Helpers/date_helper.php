<?php
function date_id($date) {
  $blid = [
    1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
  ];
  $timestamp = strtotime($date);
  $hari = date('j', $timestamp);
  $bulan = $blid[date('n', $timestamp)];
  $tahun = date('Y', $timestamp); 
  return "$hari $bulan $tahun";
}