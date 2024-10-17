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
        Schema::create('kuis', function (Blueprint $table) {
        $table->id();
        $table->foreignId('submateri_id')->constrained('sub_materi');
        $table->string('pertanyaan');
        $table->string('pilihan_1');
        $table->string('pilihan_2');
        $table->string('pilihan_3');
        $table->string('jawaban');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
