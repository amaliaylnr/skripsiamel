<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SWaris extends Migration
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
            'nik_ahli_waris' => [
                'type'           => 'BIGINT',
                'constraint'     => 25,
                'unsigned'       => true,
            ],
            'ns_waris' => [
                'type'           => 'VARCHAR',
                'constraint'     => 223,
            ],
            'slug' => [
                'type'           => 'VARCHAR',
                'constraint'     => 123,
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
            //     'constraint'=> 25,
            // ],
            
            'status' => [
                'type' => 'VARCHAR',
                'constraint'=> 255,
            ],
            
            'nama_ahli_waris' => [
                'type' => 'VARCHAR',
                'constraint'=> 155,
            ],
            
            'kelamin_waris' => [
                'type' => 'VARCHAR',
                'constraint'=> 125,
            ],
            'umur' => [
                'type' => 'VARCHAR',
                'constraint'=> 125,
            ],
            
            'tgl_lahir_ahli_waris' => [
                'type' => 'DATE',
                'null'=> true,
            ],
            
            'hubungan_keluarga' => [
                'type' => 'VARCHAR',
                'constraint'=> 25,
            ],
            'created_date datetime default current_timestamp',
            'updated_date datetime default current_timestamp on update current_timestamp',
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('nik', 'tb_warga', 'nik',  'CASCADE', 'CASCADE');
        $this->forge->createTable('tb_s_waris');
    }

    public function down()
    {
        $this->forge->dropTable('tb_s_waris');
    }
}
