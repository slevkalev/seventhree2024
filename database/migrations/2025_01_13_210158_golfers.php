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

        Schema::create('golfers', function (Blueprint $table) {
            $table->id();
            $table->string('golfer_name');
            $table->integer('r1');
            $table->integer('r2');
            $table->integer('r3');
            $table->integer('r4');
            $table->integer('round_status'); //this value will be 0 if the golfer hasn't started, the hole number if they are in the middle of the round, or 19 if the round is complete
            $table->integer('active'); //1 = golfer has neen selected by a pool participant
            $table->integer('golfer_status');  //999 = golfer missed the cut 888 = golfer withdrew 0 = golfer made the cut ... all golfers begin as 0
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
