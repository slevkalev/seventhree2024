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
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('player_name');
            $table->string('email');
            $table->string('phone');
            $table->string('selection1');
            $table->string('selection2');
            $table->string('selection3');
            $table->string('selection4');
            $table->string('selection5');
            $table->string('selection6');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('golfers');
    }
};
