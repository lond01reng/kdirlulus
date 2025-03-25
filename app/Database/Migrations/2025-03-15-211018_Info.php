<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Info extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'if_id'    =>  [
        'type'           => 'INT',
        'constraint'     => 5,
        'unsigned'       => true,
        'auto_increment' => true
      ],
      'if_desc'=>[
        'type'=>'varchar',
        'constraint'=>160,
      ],
      'if_tapel'=>[
        'type'=>'varchar',
        'constraint'=>2,
      ],
      'if_cr DATETIME DEFAULT CURRENT_TIMESTAMP',
      'if_up DATETIME NULL on update current_timestamp',
      'if_dl' => [
          'type'           => 'DATETIME',
          'null'           => true,
      ]
    ]);
    $this->forge->addKey('if_id', TRUE);
    $this->forge->addForeignKey('if_tapel','tapel','tp_id','CASCADE','CASCADE','fk_info'); 
    $this->forge->createTable('info', TRUE);
  }

  public function down()
  {
    $this->forge->dropTable('info');
  }
}
