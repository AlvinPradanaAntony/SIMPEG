<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        
        $this->call([
            DepartmentsSeeder::class,
            CategorySeeder::class,
            StatusSeeder::class,
            ReviewSeeder::class,
            RolesSeeder::class,
            FaqSeeder::class,
            UsersSeeder::class,
            PositionSeeder::class,
        ]);
    }
}
