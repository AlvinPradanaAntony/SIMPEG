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
   

        $this->call([
            RolesSeeder::class,
            StatusSeeder::class,
            DepartmentsSeeder::class,
            PositionSeeder::class,
            CategorySeeder::class,
            ReviewSeeder::class,
            FaqSeeder::class,
            UsersSeeder::class,
        ]);
        // User::factory(5)->create();
        $this->call([
            TicketSeeder::class,
            // CommentSeeder::class,
        ]);
    }
}
