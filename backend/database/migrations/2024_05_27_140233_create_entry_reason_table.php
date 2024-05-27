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
        Schema::create('entry_reason', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('entry_id')->constrained()->cascadeOnDelete();
            $table->foreignId('reason_id')->constrained()->cascadeOnDelete();
            $table->unique(['entry_id','reason_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entry_reason');
    }
};
