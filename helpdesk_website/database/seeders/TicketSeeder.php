<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ticket::create([
            'subject' => 'Pengajuan Mutasi',
            'description' => 'Saya ingin mengajukan mutasi ke kantor cabang lain. Bagaimana caranya?',
            'user_id' => 3,
            'category_id' => 5,
            'status_id' => 1,
        ]);
        Ticket::create([
            'subject' => 'Pengajuan Cuti',
            'description' => 'Saya ingin mengajukan cuti selama 3 hari. Bagaimana caranya?',
            'user_id' => 3,
            'category_id' => 1,
            'status_id' => 1,
        ]);
        Ticket::create([
            'subject' => 'Informasi Kenaikan Gaji',
            'description' => 'Saya ingin menanyakan informasi kenaikan gaji. Apakah sudah ada?',
            'user_id' => 4,
            'category_id' => 1,
            'status_id' => 1,
        ]);
        Ticket::create([
            'subject' => 'Pengajuan Cuti',
            'description' => 'Saya ingin mengajukan cuti selama 3 hari. Bagaimana caranya?',
            'user_id' => 1,
            'category_id' => 4,
            'status_id' => 4,
        ]);
    }
}
