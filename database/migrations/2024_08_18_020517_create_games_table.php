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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->integer('week');
            $table->string('game_date');
            $table->string('game_time');
            $table->foreignId('home_team')->references('id')->on('teams');
            $table->foreignId('away_team')->references('id')->on('teams');
            $table->string('home_pts');
            $table->string('away_pts');
            $table->string('game_status');
            $table->string('locked');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
