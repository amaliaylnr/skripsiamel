<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Warga extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nik' => [
                'type'           => 'BIGINT',
                'constraint'     => 25,
                'unsigned'       => true,
            ],
            'no_kk' => [
                'type'           => 'BIGINT',
                'constraint'     => 25,
            ],
            'nama' => [
                'type'       => 'varchar',
                'constraint'=> 125,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint'=> 255,
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint'=> 125,
            ],
            'tgl_lahir' => [
                'type' => 'DATE',
            ],
            'jenis_kelamin' => [
                'type' => 'VARCHAR',
                'constraint'=> 25,
            ],
            'agama' => [
                'type' => 'VARCHAR',
                'constraint'=> 25,
            ],
            'kewarganegaraan' => [
                'type' => 'VARCHAR',
                'constraint'=> 125,
            ],
            'ayah' => [
                'type' => 'VARCHAR',
                'constraint'=> 125,
                'null'  => true,
            ],
            'ibu' => [
                'type' => 'VARCHAR',
                'constraint'=> 125,
                'null'  => true,
            ],
            'status_perkawinan' => [
                'type' => 'VARCHAR',
                'constraint'=> 25,
            ],
            'pekerjaan' => [
                'type' => 'VARCHAR',
                'constraint'=> 25,
                'null'  => true,
            ],
            'pendidikan' => [
                'type' => 'VARCHAR',
                'constraint'=> 125,
                'null'  => true,
            ],
            
            'rt' => [
                'type' => 'VARCHAR',
                'constraint'=> 25,
                'null'  => true,
            ],
            'rw' => [
                'type' => 'VARCHAR',
                'constraint'=> 25,
                'null'  => true,
            ],
            'dusun' => [
                'type' => 'VARCHAR',
                'constraint'=> 125,
                'null'  => true,
            ],
            'alamat' => [
                'type' => 'text',
            ],
            'no_urut_kk' => [
                'type' => 'VARCHAR',
                'constraint'=> 25,
                'null'  => true,
            ],
            'umur' => [
                'type' => 'VARCHAR',
                'constraint'=> 25,
                'null'  => true,
            ],
            'shdk' => [
                'type' => 'VARCHAR',
                'constraint'=> 125,
                'null'  => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint'=> 125,
            ],
            'telepon' => [
                'type' => 'VARCHAR',
                'constraint'=> 25,
                'null'  => true,
            ],
            
            'identitas' => [
                'type' => 'VARCHAR',
                'constraint'=> 255,
            ],
            'created_date datetime default current_timestamp',
            'updated_date datetime default current_timestamp on update current_timestamp',
            
        ]);
        $this->forge->addKey('nik', true);
        $this->forge->createTable('tb_warga');
    }

    public function down()
    {
        $this->forge->dropTable('tb_warga');
    }
}
