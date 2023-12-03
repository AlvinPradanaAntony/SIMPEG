<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('ticket_id');
            $table->string('question');
            $table->string('answer')->nullable();
            $table->string('file_name')->nullable();
            $table->binary('file_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_tickets');
    }
};
