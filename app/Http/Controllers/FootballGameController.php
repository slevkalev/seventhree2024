<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;

class FootballGameController extends Controller
{
    public function index() {

        $games = Game::all();

        $user = Auth::user();
        $userId = Auth::id();
        $firstname = $user->first_name;
        $lastname = $user->last_name;
        $email = $user->email;

        return view('football.dashboard.games.index', [
            'games' => $games,
            'email' => $email
        ]);

    }

    public function create() {
        return view('football.dashboard.games.create');
    }

    public function show(Game $game) {



        return view('football.dashboard.games.show', ['game' => $game]);

    }

    public function store() {
        request()->validate([
            'week'=>['required'],
            'game_date'=>['required'],
            'game_time'=>['required'],
            'home_team'=>['required'],
            'away_team'=>['required'],
            'home_pts'=>['required'],
            'away_pts'=>['required'],
            'game_status'=>['required'],
            'locked'=>['required']
        ]);

        Game::create([
            'week'=>request('week'),
            'game_date'=>request('game_date'),
            'game_time'=>request('game_time'),
            'home_team'=>request('home_team'),
            'away_team'=>request('away_team'),
            'home_pts'=>request('home_pts'),
            'away_pts'=>request('away_pts'),
            'game_status'=>request('game_status'),
            'locked'=>request('locked')
        ]);

        return redirect('/dashboard/games');
    }

    public function edit(Game $game) {

        return view('football.dashboard.games.edit', [ 'game'=>$game ]);

    }

    public function update(Game $game) {
        request()->validate([
            'week'=>['required'],
            'game_date'=>['required'],
            'game_time'=>['required'],
            'home_team'=>['required'],
            'away_team'=>['required'],
            'home_pts'=>['required'],
            'away_pts'=>['required'],
            'game_status'=>['required'],
            'locked'=>['required']
        ]);

        $game->update([
            'week'=>request('week'),
            'game_date'=>request('game_date'),
            'game_time'=>request('game_time'),
            'home_team'=>request('home_team'),
            'away_team'=>request('away_team'),
            'home_pts'=>request('home_pts'),
            'away_pts'=>request('away_pts'),
            'game_status'=>request('game_status'),
            'locked'=>request('locked')
        ]);

        return redirect('/dashboard/games/' . $game->id);
    }

    public function destroy(Game $game) {
        $game->delete();

        return redirect('/dashboard/games');
    }
}
