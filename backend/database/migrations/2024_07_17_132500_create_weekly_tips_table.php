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
        Schema::create('weekly_tips', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('weekly_aspect_id')->constrained()->onDelete('cascade');
            $table->string('tip');
            $table->string('tag');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weekly_tips');
    }
};
