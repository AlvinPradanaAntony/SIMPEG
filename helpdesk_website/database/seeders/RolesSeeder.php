<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'role' => 'Pegawai',
        ]);
        Role::create([
            'role' => 'Admin Bidang',
        ]);
        Role::create([
            'role' => 'Kepala Bidang',
        ]);
        Role::create([
            'role' => 'Developer',
        ]);
    }
}
