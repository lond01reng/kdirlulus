<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataSekolah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'sc_tapel'=>[
                'type'=>'varchar',
                'constraint'=>2,
                'unique'=>true
            ],
            'sc_npsn'=>[
                'type'=>'varchar',
                'constraint'=>'8',
            ],
            'sc_nama'=>[
                'type'=>'varchar',
                'constraint'=>'64',
            ],
            'sc_ks'=>[
                'type'=>'varchar',
                'constraint'=>'64',
            ],
            'sc_nip'=>[

                'type'=>'varchar',
                'constraint'=>'18',
            ],
            'sc_cr DATETIME DEFAULT CURRENT_TIMESTAMP',
            'sc_up DATETIME NULL on update current_timestamp',
            'sc_dl' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ]
        ]);
        $this->forge->addKey('sc_tapel', TRUE);
        $this->forge->addForeignKey('sc_tapel','tapel','tp_id','CASCADE','CASCADE','fk_tpsch'); 
        $this->forge->createTable('sekolah', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('sekolah', TRUE);
    }
}
