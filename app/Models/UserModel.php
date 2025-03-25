<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table            = 'useradm';
  protected $primaryKey       = 'adm_id';
  protected $useAutoIncrement = true;
  protected $returnType       = 'object';
  protected $useSoftDeletes   = true;
  protected $protectFields    = true;
  protected $allowedFields    = ['adm_uname','adm_pasw','adm_nama','adm_level','adm_status'];

  protected $useTimestamps = true;
  protected $dateFormat    = 'datetime';
  protected $createdField  = 'adm_cr';
  protected $updatedField  = 'adm_up';
  protected $deletedField  = 'adm_dl';

  public function cekuser($username){
    $this->where('adm_uname', $username);
    return $this->first();
  }

  public function gantiPassword($username,$password){
    $pass=password_hash(strrev($password), PASSWORD_BCRYPT);
    $this->set('adm_pasw', $pass);
    $this->where('adm_uname',$username);
    return $this->update();
  }
}
