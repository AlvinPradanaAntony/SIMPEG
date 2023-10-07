<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $table = 'faqs';
    
}
// Mengambil semua pertanyaan (semua record dari tabel "faqs")
// $faqs = Faq::all();

// // Menambahkan pertanyaan baru
// $newFaq = new Faq;
// $newFaq->question = 'Pertanyaan Baru';
// $newFaq->answer = 'Jawaban Pertanyaan Baru';
// $newFaq->save();
