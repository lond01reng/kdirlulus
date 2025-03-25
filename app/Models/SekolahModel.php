<?php

namespace App\Models;
use App\Models\PublishModel;

use CodeIgniter\Model;

class SekolahModel extends Model
{
  protected $table            = 'sekolah';
  protected $primaryKey       = 'sc_tapel';
  protected $useAutoIncrement = false;
  protected $returnType       = 'object';
  protected $useSoftDeletes   = true;
  protected $protectFields    = true;
  protected $allowedFields    = ['sc_npsn','sc_nama','sc_ks','sc_nip','sc_tapel'];
  // Dates
  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'sc_cr';
  protected $updatedField  = 'sc_up';
  protected $deletedField  = 'sc_dl';

  public function __construct()
  {
    $this->publish=new PublishModel();
  }

  public function getSch() {
    $this->table($this->table);
    $this->where('sc_tapel', session('tapel'));
    return $this->get()->getRow();
  }

  public function getPSch() {
    $this->join('publish','pb_id=sc_tapel');
    $this->where('pb_status','1');
    return $this->get()->getRow();
  }

  public function getOSch(){
    $this->orderBy('sc_tapel','DESC');
    return $this->get()->getRow();
  }

  public function editSekolah($data) {
    return $this->save($data);
  }
}
