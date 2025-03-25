<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'sw_nis'=>[
        'type'=>'varchar',
        'constraint'=>6,
        'unique'=>true
        ],
      'sw_nisn'=>[
        'type'=>'varchar',
        'constraint'=>10,
        'unique'=>true
        ],
      'sw_nama'=>[
        'type'=>'varchar',
        'constraint'=>100,   
      ],
      'sw_tempat'=>[
        'type'=>'varchar',
        'constraint'=>24,
        ],
      'sw_tgl'=>[
        'type'=>'date',
        ],
      'sw_kelas'=>[
        'type'=>'varchar',
        'constraint'=>10,
        ],
      'sw_jurusan'=>[
        'type'=>'varchar',
        'constraint'=>48,
        ],
      'sw_status'=>[
        'type'=>'ENUM',
        'constraint'=>"'0','1'",
        'default'=>'1'
      ],
      'sw_tapel'=>[
        'type'=>'varchar',
        'constraint'=>2,
      ],
      'sw_cr DATETIME DEFAULT CURRENT_TIMESTAMP',
      'sw_up DATETIME NULL on update current_timestamp',
      'sw_dl' => [
        'type'           => 'DATETIME',
        'null'           => true,
      ]
    ]);
    $this->forge->addKey('sw_nis', TRUE);
    $this->forge->addForeignKey('sw_tapel','tapel','tp_id','CASCADE','CASCADE','fk_tapel'); 
    $this->forge->createTable('siswa', TRUE);
  }

  public function down()
  {
    $this->forge->dropTable('siswa', TRUE);
  }
}
