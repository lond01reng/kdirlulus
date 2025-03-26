<?php

namespace App\Models;

use CodeIgniter\Model;

class TapelModel extends Model
{
  protected $table            = 'tapel';
  protected $primaryKey       = 'tp_id';
  protected $useAutoIncrement = true;
  protected $returnType       = 'object';
  protected $useSoftDeletes   = true;
  protected $protectFields    = true;
  protected $allowedFields    = ['tp_id','tp_nama'];

  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'tp_cr';
  protected $updatedField  = 'tp_up';
  protected $deletedField  = 'tp_dl';

  public function allTp(){
    $this->db->table($this->table);
    $this->orderBy('tp_Nama', 'DESC');
    return $this->find();
  }

  public function acTp(){
    $this->where();
  }
  public function getTp($srtp){
    return $this->db->table($this->table)->where('tp_id', $srtp)->get();
  }
  public function cekTp($srtp,$lgtp){
    $tp=$this->getTp($srtp)->getRow();
    if(empty($tp) && strlen($lgtp)=='9') {
      return $this->insertTp($srtp, $lgtp);
    }elseif(!empty($tp)){
      return true;
    }else{
      return false;
    }
  }

  public function insertTp($srtp,$lgtp) {
    $data = [
      'tp_id' => $srtp,
      'tp_nama' => $lgtp,
    ];
    $insert=$this->db->table($this->table)->insert($data);
    if ($insert) {
      return true;
    } else {
      return false;
    }
  }

   
}
