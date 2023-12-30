<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
    }
}
