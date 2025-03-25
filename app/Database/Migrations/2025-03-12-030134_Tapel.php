<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tapel extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'tp_id'=>[
        'type'=>'varchar',
        'constraint'=>2,
        'unique'=>true
        ],
      'tp_nama'=>[
        'type'=>'varchar',
        'constraint'=>9,
        'unique'=>true
      ],
      'tp_cr DATETIME DEFAULT CURRENT_TIMESTAMP',
      'tp_up DATETIME NULL on update current_timestamp',
      'tp_dl' => [
        'type'           => 'DATETIME',
        'null'           => true,
      ]
    ]);
    $this->forge->addKey('tp_id', TRUE);
    $this->forge->createTable('tapel', TRUE);
  }

    public function down()
    {
      $this->forge->dropTable('tapel', TRUE);
    }
}
