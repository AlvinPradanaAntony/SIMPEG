<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'status' => 'Terkirim',
        ]);
        Status::create([
            'status' => 'Terjawab',
        ]);
        Status::create([
            'status' => 'Terbalas',
        ]);
        Status::create([
            'status' => 'Tertutup',
        ]);
    }
}
