<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create(['name'=>'Admin','email'=>'admin@kampus.test','password'=>'password','role'=>'admin']);
        User::create(['name'=>'Dosen','email'=>'dosen@kampus.test','password'=>'password','role'=>'dosen']);
        User::create(['name'=>'Mahasiswa','email'=>'mahasiswa@kampus.test','password'=>'password','role'=>'mahasiswa']);
    }
}
