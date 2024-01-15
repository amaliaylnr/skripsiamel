<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProdukDesa extends Migration
{

    // produk desa: id, namaproduk, slug, deskripsi, gambar, telepon, alamat, gmaps, harga, kategori
    public function up()
    {
        $this->forge->addField([
            'id_produk' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'varchar',
                'constraint'=> 125,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint'=> 255,
            ],
            'deskripsi' => [
                'type' => 'text',
                'null' => true,
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint'=> 255,
            ],
            'created_date datetime default current_timestamp',
            'updated_date datetime default current_timestamp on update current_timestamp',
            
        ]);
        $this->forge->addKey('id_produk', true);
        $this->forge->createTable('produk');
    }

    public function down()
    {
        $this->forge->dropTable('produk');
    }
}
