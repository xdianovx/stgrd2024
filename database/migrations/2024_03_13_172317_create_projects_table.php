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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('poster');
            $table->text('text');
            $table->text('text_card');
            $table->string('link');
            $table->string('link_title');
            $table->string('presentation');
          //info
            $table->string('address');
            $table->string('flats');
            $table->string('deadline');
            $table->string('interior');
            $table->string('floors');
            $table->string('corpuses');

            $table->foreignId('city_id');
            $table->foreignId('status_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
