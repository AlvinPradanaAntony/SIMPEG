<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nip' => 'superadmin',
            'name' => 'Super Admin',
            'email' => 'superadmin@mail.com',
            'password' => bcrypt('superadmin'),
            'level_id' => 4,
        ]);
        User::create([
            'nip' => 'pegawai',
            'name' => 'Pegawai',
            'email' => 'pegawai@mail.com',
            'password' => bcrypt('pegawai'),
            'level_id' => 1,
        ]);
    }
}
