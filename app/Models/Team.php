<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function homeGames():HasMany
    {
        return $this->hasMany(Game::class, 'home_team');
    }

    public function awayGames():HasMany
    {
        return $this->hasMany(Game::class, 'away_team');
    }

    public function getAllTeamGames($teamId){

        $team = Team::findOrFail($teamId);

        return $this->homeGames->merge($team->awayGames);
    }

    public function picks():HasMany
    {

        return $this->hasMany(Pick::class, 'pick');
    }

}
