<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'nipd' => 3522122211980001,
            'nama' => 'Dani Hartanto',
            'email'    => 'danihartanto@gmail.com',
            'password' => password_hash('dani12345',PASSWORD_DEFAULT),
            'role'      => 'superadmin'
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO users (username, email) VALUES(:username:, :email:)', $data);

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}
