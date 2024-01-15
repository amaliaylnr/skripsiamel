<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Berita extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_berita' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul' => [
                'type'       => 'varchar',
                'constraint'=> 125,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint'=> 255,
            ],
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint'=> 125,
            ],
            'isi' => [
                'type' => 'text',
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint'=> 255,
            ],
            'penulis' => [
                'type' => 'text',
                'null' => true,
            ],
            'tanggal' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'publish' => [
                'type' => 'ENUM',
                'constraint' => ['publish', 'edit', 'pratinjau'],
                'default' => 'edit', // Atur nilai default sesuai kebutuhan
            ],
            'created_date datetime default current_timestamp',
            'updated_date datetime default current_timestamp on update current_timestamp',
            
        ]);
        $this->forge->addKey('id_berita', true);
        $this->forge->createTable('berita');
    }

    public function down()
    {
        $this->forge->dropTable('berita');
    }
}
