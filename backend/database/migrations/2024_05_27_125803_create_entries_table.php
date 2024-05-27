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
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->unsignedBigInteger('primary_emotion_id')->nullable();
            $table->unsignedBigInteger('secondary_emotion_id')->nullable();
            $table->foreign('primary_emotion_id')->references('id')->on('emotions')->onDelete('cascade');
            $table->foreign('secondary_emotion_id')->references('id')->on('secondary_emotions')->onDelete('cascade');
            $table->text('journal')->nullable();
            $table->boolean('stress-analysis')->nullable();
            $table->boolean('depression-analysis')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entries');
    }
};
