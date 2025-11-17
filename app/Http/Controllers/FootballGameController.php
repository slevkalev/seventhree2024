<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;
use App\Helper\Helper;
use Carbon\Carbon;


class FootballGameController extends Controller
{
    public function index() {
        $user = Auth::user();

        if(Auth::guest()){
            return redirect('/login');
        }

        $games = Game::all();

        // dd($games);

        $userId = Auth::id();
        $currentUser = Auth::user() ?? "";
        $today = Carbon::now()->format('m/d/Y');
        $weeks = Helper::schedule();
        $weekId = Helper::get_week_id($today, $weeks);
        $firstname = $user->first_name;
        $lastname = $user->last_name;
        $email = $user->email;


        return view('football.dashboard.games.index', [
            'games' => $games,
            'email' => $email,
            'week' => $weekId,
            'currentUser'=>$currentUser,
        ]);

    }

    public function create() {
        return view('football.dashboard.games.create');
    }

    public function show(Game $game) {

        $currentUser = Auth::user() ?? "";

        return view('football.dashboard.games.show', ['game' => $game, 'currentUser'=>$currentUser, ]);

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

        $currentUser = Auth::user() ?? "";

        return view('football.dashboard.games.edit', [ 'game'=>$game,  'currentUser'=>$currentUser, ]);

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

        // return redirect('/dashboard/games/' . $game->id);
        return redirect()->to(route('dashboard.games.index') . '#section' . $game->id);

    }

    public function destroy(Game $game) {
        $game->delete();

        return redirect('/dashboard/games');
    }
}
