<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Game extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function homeTeam():BelongsTo
    {

        return $this->belongsTo(Team::class, 'home_team');
    }

    public function awayTeam():BelongsTo
    {
        return $this->belongsTo(Team::class, 'away_team');
    }

    public function picks():HasMany
    {
        return this->hasMany(Pick::class, 'game');
    }



    public function winner() {

        if($this->game_status === 'F'){

            if ($this->home_pts > $this->away_pts){
                return $this->home_team;
            }

            if($this->away_pts > $this->home_team){
                return $this->away_team;
            }

            if($this->home_pts === $this->away_pts){
                return 999;
            }

        }

        return "TBD";

    }


}
