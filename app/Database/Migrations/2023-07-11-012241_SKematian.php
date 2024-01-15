<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SKematian extends Migration
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
            
            'nama_meninggal' => [
                'type' => 'VARCHAR',
                'constraint'=> 255,
            ],
            
            'tgl_kelahiran' => [
                'type' => 'DATE',
                'null'=> true,
            ],
            'tgl_meninggal' => [
                'type' => 'DATE',
                'null'=> true,
            ],
            'usia_meninggal' => [
                'type' => 'VARCHAR',
                'constraint'=> 12,
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null'=> true,
            ],
            'created_date datetime default current_timestamp',
            'updated_date datetime default current_timestamp on update current_timestamp',
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('nik', 'tb_warga', 'nik', 'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_s_kematian');
    }

    public function down()
    {
        $this->forge->dropTable('tb_s_kematian');
    }
}
