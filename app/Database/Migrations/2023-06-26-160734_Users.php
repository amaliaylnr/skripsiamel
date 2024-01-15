<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nipd' => [
                'type'       => 'BIGINT',
                'constraint'=> 16,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint'=> 255,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint'=> 255,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint'=> 255,
            ],
            'role' => [
                'type' => 'VARCHAR',
                'constraint'=> 25,
            ],
            'created_date datetime default current_timestamp',
            'updated_date datetime default current_timestamp on update current_timestamp',
            
        ]);
        $this->forge->addKey('id_user', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
