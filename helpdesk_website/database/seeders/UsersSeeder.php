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
            'password' => bcrypt('secret'),
            'role_id' => 2,
        ]);
        User::create([
            'nip' => 'user1',
            'name' => 'user1',
            'email' => 'user1@mail.com',
            'password' => bcrypt('secret'),
            'role_id' => 1,
        ]);
        User::create([
            'nip' => 'user2',
            'name' => 'user2',
            'email' => 'user2@mail.com',
            'password' => bcrypt('secret'),
            'role_id' => 1,
        ]);
        User::create([
            'nip' => 'user3',
            'name' => 'user3',
            'email' => 'user3@mail.com',
            'password' => bcrypt('secret'),
            'role_id' => 1,
        ]);
        // User::create([
        //     'nip' => 'khoirul',
        //     'name' => 'Khoirul',
        //     'email' => 'mkhoirulr97@gmail.com',
        //     'password' => bcrypt('khoirul123'),
        //     'role_id' => 3,
        // ]);
        // User::create([
        //     'nip' => 'tony',
        //     'name' => 'Alvin Pradana',
        //     'email' => 'tony@gmail.com',
        //     'password' => bcrypt('laki-laki321'),
        //     'role_id' => 4,
        // ]);
    }
}
