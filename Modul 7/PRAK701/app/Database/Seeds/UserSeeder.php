<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username' => 'daka69',
            'email'    => 'daka@example.com',
            'password' => password_hash('password123', PASSWORD_DEFAULT),
        ];

        $this->db->table('user')->insert($data);
    }
}