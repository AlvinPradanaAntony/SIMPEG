<?php

namespace Database\Seeders;

use App\Models\Comments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comments::create([
            'comment' => 'Silahkan mengajukan mutasi melalui aplikasi ini. Terima kasih.',
            'ticket_id' => 1,
            'user_id' => 1,
        ]);
        Comments::create([
            'comment' => 'Silahkan mengajukan cuti melalui aplikasi ini. Terima kasih.',
            'ticket_id' => 2,
            'user_id' => 1,
        ]);
        Comments::create([
            'comment' => 'Mohon ditunggu, kami akan segera menginformasikan kenaikan gaji.',
            'ticket_id' => 3,
            'user_id' => 8,
        ]);
    }
}
