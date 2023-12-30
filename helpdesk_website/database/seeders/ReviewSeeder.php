<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::create([
            'rating' => '5',
            'review' => 'Sangat Baik',
        ]);
        Review::create([
            'rating' => '4',
            'review' => 'Baik',
        ]);
        Review::create([
            'rating' => '3',
            'review' => 'Cukup',
        ]);
        Review::create([
            'rating' => '2',
            'review' => 'Kurang',
        ]);
        Review::create([
            'rating' => '1',
            'review' => 'Sangat Kurang',
        ]);
    }
}
