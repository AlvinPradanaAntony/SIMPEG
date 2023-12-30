<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'department' => 'Sekretariat',
        ]);
        Department::create([
            'department' => 'Bidang Pembinaan Perundang-Undangan dan Kesejahteraan Pegawai',
        ]);
        Department::create([
            'department' => 'Bidang Formasi dan Pengembangan Pegawai',
        ]);
        Department::create([
            'department' => 'Bidang Data, Dokumentasi dan Informasi Kepegawaian',
        ]);
        Department::create([
            'department' => 'Bidang Mutasi Pegawai (Jenis Jabatan Struktural)',
        ]);
    }
}
