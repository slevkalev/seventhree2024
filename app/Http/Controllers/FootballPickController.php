<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pick;
use App\Models\Game;
use App\Models\Team;
use Carbon\Carbon;
use App\Helper\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class FootballPickController extends Controller
{
    public function index() {
        $picks = Pick::all();

        return view('football.dashboard.picks.index', [
            'picks' => $picks
        ]);
    }

    public function create() {
        request()->validate([
            'game'=>['required'],
            'user'=>['required'],
            'pick'=>['required'],
            'points'=>['required']
        ]);

        Pick::create([
            'game' => $request('game'),
            'user' => $request('user'),
            'pick' => $request('pick'), // 'home' or 'away'
            'points' => $request('points')
        ]);

        return redirect('dashboard/picks');

    }

    public function show(Pick $pick) {
        return view('football.dashboard.games.show', ['pick' => $pick ]);
    }

    public function store() {
        request()->validate([
            'game'=>['required'],
            'user'=>['required'],
            'pick'=>['required'],
            'points'=>['required']
        ]);

        Game::create([
            'game'=>request('game'),
            'user'=>request('user'),
            'pick'=>request('pick'),
            'points'=>request('points'),
            'away_team'=>request('away_team')
        ]);

        return redirect('/dashboard/picks');
    }


    public function edit(Pick $pick){

        Gate::authorize('edit-pick', $pick);
        $currentUser = Auth::user();

        if(!$currentUser->id==1){
            return redirect('/login');
        }

        //retrieve game info for the pick to edit
        $game = Game::where('id', $pick->game)->first();



        // if($game['locked'] == 1) {
        //     return redirect('/user-picks');
        // }

        $pick_week = $game->week;
        $today = Carbon::now()->format('m/d/Y');
        $weeks = Helper::schedule();
        $numberOfGames = $weeks[$pick_week-1]['nog'];



        function getUserPointsForWeek($userId, $week) {
            return Pick::select('picks.points')
                ->join('games', 'picks.game', '=', 'games.id')
                ->where('games.week', $week)
                ->where('picks.user', $userId)
                ->get()
                ->pluck('points')
                ->toArray();
        }

        $picked =  json_encode(getUserPointsForWeek($currentUser->id, $pick_week));



        return view('football.dashboard.picks.edit', [
            'game' => $game,
            'user' => $currentUser,
            'pick' => $pick,
            'numberOfGames' => $numberOfGames,
            'picked' => $picked
        ]);


    }


    public function update() {

    }

    public function destroy() {

    }
}
