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
            'role_id' => 4,
        ]);
        User::create([
            'nip' => 'pegawai',
            'name' => 'Pegawai',
            'email' => 'pegawai@mail.com',
            'password' => bcrypt('pegawai'),
            'role_id' => 1,
        ]);
        User::create([
            'nip' => 'khoirul',
            'name' => 'Khoirul',
            'email' => 'mkhoirulr97@gmail.com',
            'password' => bcrypt('khoirul123'),
            'role_id' => 4,
        ]);
    }
}
