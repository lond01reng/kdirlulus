<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Publish extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'pb_id'=>[
        'type'=>'varchar',
        'constraint'=>2,
        'unique'=>true
      ],
      'pb_waktu' => [
        'type' => 'DATETIME',
      ],
      'pb_status'=>[
        'type'=>'ENUM',
        'constraint'=>"'0','1'",
        'default'=>'0'
      ],
      'pb_cr DATETIME DEFAULT CURRENT_TIMESTAMP',
      'pb_up DATETIME NULL on update current_timestamp',
      'pb_dl' => [
          'type'           => 'DATETIME',
          'null'           => true,
      ]
    ]);
    $this->forge->addKey('pb_id', TRUE);
    $this->forge->addForeignKey('pb_id','tapel','tp_id','CASCADE','CASCADE','fk_publish'); 
    $this->forge->createTable('publish', TRUE);
  }

  public function down()
  {
    $this->forge->dropTable('publish');
  }
}
