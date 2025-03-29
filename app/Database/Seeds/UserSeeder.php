<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
  public function run()
  {
    $data = [
      'adm_uname' =>  '4demin',
      'adm_pasw'  =>  password_hash('loroG@2022', PASSWORD_BCRYPT),
      'adm_nama'  => 'Admin',
      'adm_level' => 'adm',
      'adm_status'=> 'vl'
    ];
    $this->db->table('user')->insert($data);
  }
}
