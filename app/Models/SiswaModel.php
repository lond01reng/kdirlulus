<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\TapelModel;

class SiswaModel extends Model
{
  protected $table            = 'siswa';
  protected $primaryKey       = 'sw_nis';
  protected $useAutoIncrement = true;
  protected $returnType       = 'object';
  protected $useSoftDeletes   = true;
  protected $protectFields    = true;
  protected $allowedFields    = ['sw_nis','sw_nisn','sw_nama','sw_tempat','sw_tgl','sw_kelas','sw_jurusan','sw_status','sw_tapel','sw_dl'];

  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'sw_cr';
  protected $updatedField  = 'sw_up';
  protected $deletedField  = 'sw_dl';

  public function getData() {
    $this->db->table($this->table);
    $this->where('sw_tapel', session('tapel'));
    $this->orderBy('sw_kelas', 'ASC');
    $this->orderBy('sw_nama', 'ASC');
    return $this->find();
  }
  public function getHapus(){
    return $this->onlyDeleted()->findAll();   
  }

  public function getNis($nis) {
    $this->db->table($this->table);
    $this->where('sw_nis', $nis);
    return $this->first();
  }

  public function getDel($nis) {
    $this->db->table($this->table);
    $this->where('sw_nis', $nis);
    $this->where('sw_dl IS NOT NULL');
    return $this->withDeleted()->first();
  }
  public function getNisn($nis,$tgl) {
    $this->db->table($this->table);
    $this->where('sw_nisn', $nis);
    $this->where('sw_tgl',$tgl);
    return $this->first();
  }

  public function importSiswa($csv) {
    if(!file_exists($csv)){
      return 'file_not_found';
    }
    // else{
      $file=fopen($csv,'r');
      if(!$file){
        return 'file_not_found';
      }
      // else{
        $header = fgetcsv($file,0,';');
        if(!$header){
          fclose($file);
          return 'invalid_data';
        }
        // else{
          $vlCol=['sw_nis','sw_nisn','sw_nama','sw_tempat','sw_tgl','sw_kelas','sw_jurusan','sw_status','sw_tapel'];
          if (array_diff($vlCol, $header)) {
            fclose($file);
            unlink($csv);
            return 'invalid_column_names';
          } 

          $csvth=fgetcsv($file, 0, ';');
          $dtRow=array_combine($header,$csvth);
          $lgth=$dtRow['sw_tapel'];
          $srth=substr($lgth,2,2);

          $tapelModel = new \App\Models\TapelModel();
          $cektpmodel=$tapelModel->cekTp($srth, $lgth);

//cek kembali          
          if($cektpmodel===FALSE){
            fclose($file);
            unlink($csv);  
            return 'dbtp_insert_error';
          }
//cek kembali
          fseek($file, 0, SEEK_SET); 
          fgetcsv($file, 0, ';'); 
          $data=[];
          while(($row=fgetcsv($file, 0, ';'))!== false){
            $dtRow=array_combine($header,$row);
            $dtRow['sw_nisn']=substr('00000'.$dtRow['sw_nisn'],-10);
            $lgtp=$dtRow['sw_tapel'];
            $srtp=substr($lgtp,2,2);
            $dtRow['sw_tapel']=$srtp;
            $dtRow['sw_status']=trim(strtolower($dtRow['sw_status']))=='lulus'?'1':'0';
            $tgl = \DateTime::createFromFormat('d/m/Y', $dtRow['sw_tgl']);
            if ($tgl !== false) {
                $dtRow['sw_tgl'] = $tgl->format('Y-m-d');
            }
            $data[]=$dtRow;
          }
          fclose($file);

          if(!$this->svBatch($data)){
            unlink($csv);
            return 'db_insert_error';
          }else{
            unlink($csv);
            session()->setFlashdata('inth', $lgtp);
            return true;
          }
        // }
      // }
    // }
  }
  public function svBatch(array $data) {
    if (count($data) > 0) {
      foreach ($data as $dtRow) {
        if ($this->isDataExist($dtRow)) {
          if (!$this->updateSiswa($dtRow)) {
            return false;
          }
      } else {
          if (!$this->insertSiswa($dtRow)) {
            return 'db_insert_erro';
          }
        }
      }
      return true;
    } else {
      return false;
    }
  }

  public function isDataExist($dtRow) {
    $query = $this->db->table($this->table)
                      ->where('sw_nis', $dtRow['sw_nis'])
                      ->get();
    return $query->getNumRows() > 0;
  }

  public function updateSiswa($dtRow) {
      return $this->db->table($this->table)
                      ->where('sw_nis', $dtRow['sw_nis'])
                      ->update($dtRow);
  }

  public function insertSiswa($dtRow) {
      return $this->db->table($this->table)->insert($dtRow);
  }

  public function updateBio($nis, $data){
    return $this->update(['sw_nis' => $nis],$data);
  }
  public function delSiswa($nis){
    return $this->delete($nis);
  }
  public function restoreSiswa($nis){
    $data = ['sw_dl' => NULL];
    $this->where(['sw_nis'=>$nis]);
    return $this->update(null,$data);
  }
  public function cLulus(){
    $this->where('sw_status','1');
    $this->where('sw_tapel', session('tapel'));
    return $this->countAllResults();
  }
  public function cGagal(){
    $this->where('sw_status !=','1');
    $this->where('sw_tapel', session('tapel'));
    return $this->countAllResults();
  }
}
