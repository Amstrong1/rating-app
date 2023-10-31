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
        Schema::create('place_quizzes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('structure_id');
            $table->foreignId('place_id');
            $table->foreignId('quiz_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('place_quizzes');
    }
};
