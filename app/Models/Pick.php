<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pick extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class, 'user');
    }

    public function game() {
        return $this->belongsTo(Game::class, 'game');
    }


    public function team() {
        return $this->belongsTo(Team::class, 'pick');
    }

    public function pointsWon() {

        $winner = $this->game()->get()->first()->winner();

        //game not Final return 0
        if($winner === "TBD"){

            return 0;

        }

        //game complete and pick is correct or it is a tie
        if($this->pick === $winner){

            return $this->points;

        }elseif($winner === 999){

            return($this->points);

        }else{

            return 0;

        }
    }

    public function pointsMissed() {

        $winner = $this->game()->get()->first()->winner();

        //game not Final return 0
        if($winner === "TBD"){

            return 0;

        }

        if($winner === 999){}
        {

            return 0;

        }if($this->pick === $winner){

            return 0;

        }else{

            return 0 - $this->points;

        }

    }

}
