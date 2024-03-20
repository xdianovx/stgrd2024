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
        Schema::create('planning_solutions', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('square');
            $table->string('ipoteka');
            $table->string('price');
            $table->string('slug')->nullable();
            $table->string('plan')->nullable();
            $table->foreignId('block_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planning_solutions');
    }
};
