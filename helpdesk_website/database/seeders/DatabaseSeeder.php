<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Faq::factory(2)->create();
        User::factory(5)->create();
        Category::create([
            'category' => 'Pendaftaran dan Verifikasi Data Pegawai Baru',
            'department_id' => '1',
        ]);
        Category::create([
            'category' => 'Koordinasi Rapat dan Acara',
            'department_id' => '1',
        ]);
        Category::create([
            'category' => 'Konsultasi Hukum Kepegawaian',
            'department_id' => '2',
        ]);
        Category::create([
            'category' => 'Pengarsipan Dokumen',
            'department_id' => '4',
        ]);
        Category::create([
            'category' => 'Proses Mutasi Internal',
            'department_id' => '5',
        ]);
        Category::create([
            'category' => 'Penanganan Persyaratan Mutasi',
            'department_id' => '5',
        ]);
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
        
        $this->call([
            FaqSeeder::class,
            UsersSeeder::class,
            PositionSeeder::class,
        ]);
    }
}
