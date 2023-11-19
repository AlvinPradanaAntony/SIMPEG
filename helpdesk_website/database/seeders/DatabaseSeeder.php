<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();
        User::create([
            'nip' => 'superadmin',
            'name' => 'Super Admin',
            'email' => 'superadmin@mail.com',
            'password' => bcrypt('superadmin'),
        ]);
        User::create([
            'nip' => 'pegawai',
            'name' => 'Pegawai',
            'email' => 'pegawai@mail.com',
            'password' => bcrypt('pegawai'),
        ]);
    }
}
