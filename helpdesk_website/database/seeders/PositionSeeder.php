<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Position::create([
            'position' => 'Jabatan 1',
        ]);
        Position::create([
            'position' => 'Jabatan 2',
        ]);
        Position::create([
            'position' => 'Jabatan 3',
        ]);
        Position::create([
            'position' => 'Jabatan 4',
        ]);
        Position::create([
            'position' => 'Jabatan 5',
        ]);
    }
}
