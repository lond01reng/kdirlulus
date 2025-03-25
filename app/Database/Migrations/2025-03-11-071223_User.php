<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'adm_id'    =>  [
                'type'           => 'TINYINT',
				'constraint'     => 3,
				'unsigned'       => true,
				'auto_increment' => true
            ],
            'adm_uname'  =>  [
                'type'           => 'VARCHAR',
				'constraint'     => '100',
                'unique'         => true
            ],
            'adm_pasw'  =>  [
                'type'           => 'VARCHAR',
				'constraint'     => '255'
            ],
            'adm_nama'  =>  [
                'type'           => 'VARCHAR',
				'constraint'     => '100'
            ],
            'adm_level'     => [
                'type'          => 'ENUM',
                'constraint'    => "'sup','adm','opr'",
                'default'       => 'adm'
            ],
            'adm_status'    => [
                'type'          => 'ENUM',
                'constraint'    => "'vl','nv'",
                'default'       => 'nv',
            ],
            'adm_cr DATETIME DEFAULT CURRENT_TIMESTAMP',
            'adm_up DATETIME NULL on update current_timestamp',
            'adm_dl' => [
                'type'           => 'DATETIME',
                'null'           => true,
            ]
        ]);  
        $this->forge->addKey('adm_id', TRUE);
        $this->forge->createTable('useradm', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('useradm');
    }
}
