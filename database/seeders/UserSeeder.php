<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);

        User::create([
        'name' => 'Admin',
        'email' => 'admin@test.com',
        'password' => 'password',
        'role' => 'admin',
        ]);

        User::create([
            'name' => 'Dosen',
            'email' => 'dosen@mail.com', 
            'password' => 'password',
            'role' => 'dosen',

        ]);

        User::create([
                'name' => 'Mahasiswa',
                'email' => 'mahasiswa@mail.com',
                'password' => 'password',
                'role' => 'mahasiswa',
        ]);
    }
}
