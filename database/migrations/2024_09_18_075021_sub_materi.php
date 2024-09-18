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
          Schema::create('sub_materi', function (Blueprint $table) {
            $table->id();
           $table->unsignedBigInteger('pelajaran_id');
            $table->string('title');
            $table->string('type');
            $table->string('content');
            $table->timestamps();

             $table->foreign('pelajaran_id')->references('id')->on('pelajaran')->onDelete('cascade');
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
