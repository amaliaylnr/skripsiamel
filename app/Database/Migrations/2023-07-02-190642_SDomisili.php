<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SDomisili extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nik' => [
                'type'           => 'BIGINT',
                'constraint'     => 25,
                'unsigned'       => true,
            ],
            'jenis_surat' => [
                'type'       => 'varchar',
                'constraint'=> 255,
            ],
            'keperluan' => [
                'type'       => 'varchar',
                'constraint'=> 255,
            ],
            'pengambilan' => [
                'type' => 'VARCHAR',
                'constraint'=> 25,
                'null' => true,
            ],
            
            // 'identitas' => [
            //     'type' => 'VARCHAR',
            //     'constraint'=> 255,
            // ],
            
            'status' => [
                'type' => 'VARCHAR',
                'constraint'=> 255,
            ],
            'mulai' => [
                'type' => 'VARCHAR',
                'constraint'=> 255,
                'null' => true,
            ],
            'selesai' => [
                'type' => 'VARCHAR',
                'constraint'=> 255,
                'null' => true,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_date datetime default current_timestamp',
            'updated_date datetime default current_timestamp on update current_timestamp',
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('nik', 'tb_warga', 'nik',  'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_s_domisili');
    }

    public function down()
    {
        $this->forge->dropTable('tb_s_domisili');
    }
}
