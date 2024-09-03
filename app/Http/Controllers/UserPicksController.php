<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pick;
use App\Models\Game;
use Carbon\Carbon;
use App\Helper\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserPicksController extends Controller
{
    public function index() {

        //paginate by games this week
        //check to see if there are any picks made for this game by this user
        //if no pick exists already display game with action=/create
        //if a pick exists already dispgame with action=/update


        $today = Carbon::now()->format('m/d/Y');
        $currentUser = Auth::user();
        $weeks = Helper::schedule();
        $weekId = Helper::get_week_id($today, $weeks);
        $games = Game::where('week', $weekId)->get();
        // $picks = Pick::where('user', $currentUser)
        //     -where('game', 2)
        //     ->get();



        return view('football.user-picks.index', [
            // 'picks' => $picks,
            'games' => $games,
            'today' => $today,
            'currentWeek' => $weekId
        ]);

    }

    public function create(Game $game) {

        if(Auth::guest()){
            return redirect('/login');
        }

        if($game->locked) {
            return redirect('/user-picks');
        }

        $today = Carbon::now()->format('m/d/Y');
        $currentUser = Auth::user();
        $weeks = Helper::schedule();
        $weekId = Helper::get_week_id($today, $weeks);
        $numberOfGames = $weeks[$weekId-1]['nog'];

        function getUserPointsForWeek($userId, $week) {
            return Pick::select('picks.points')
                ->join('games', 'picks.game', '=', 'games.id')
                ->where('games.week', $week)
                ->where('picks.user', $userId)
                ->get()
                ->pluck('points')
                ->toArray();
        }

        function getUserGamesPickedForWeek($userId, $week) {
            return Pick::select('picks.game')
                ->join('games', 'picks.game', '=', 'games.id')
                ->where('games.week', $week)
                ->where('picks.user', $userId)
                ->get()
                ->pluck('game')
                ->toArray();
        }


        $gamesPicked = getUserGamesPickedForWeek($currentUser->id, $weekId);

        if(in_array($game->id, $gamesPicked)){
            $pick = Pick::select('id')
            ->where('user', $currentUser->id)
            ->where('game', $game->id);

            return redirect('/user-picks/'. $pick->pluck('id')->first() . '/edit');
        }

        $picked =  json_encode(getUserPointsForWeek($currentUser->id, $weekId));


        return view('football/user-picks/create', [
            'game'=>$game,
            'today'=>$today,
            'user'=>$currentUser,
            'week'=>$weekId,
            'numberOfGames'=>$numberOfGames,
            'picked'=> $picked
        ]);

    }


    public function show(Pick $pick){
        dd("hello pick");
    }


    public function store() {

        request()->validate([
            'user'=>['required'],
            'game'=>['required'],
            'pick'=>['required'],
            'points'=>['required']
        ]);

        Pick::create([
            'user'=>request('user'),
            'game'=>request('game'),
            'pick'=>request('pick'),
            'points'=>request('points'),
        ]);

        return redirect('/user-picks');
    }


    public function edit(Pick $pick){

        Gate::authorize('edit-pick', $pick);

        $game = Game::where('id', $pick->game)->get();



        if($game[0]['locked'] == 1) {
            return redirect('/user-picks');
        }

        $today = Carbon::now()->format('m/d/Y');
        $currentUser = Auth::user();
        $weeks = Helper::schedule();
        $weekId = Helper::get_week_id($today, $weeks);
        $numberOfGames = $weeks[$weekId-1]['nog'];





        function getUserPointsForWeek($userId, $week) {
            return Pick::select('picks.points')
                ->join('games', 'picks.game', '=', 'games.id')
                ->where('games.week', $week)
                ->where('picks.user', $userId)
                ->get()
                ->pluck('points')
                ->toArray();
        }

        $picked =  json_encode(getUserPointsForWeek($currentUser->id, $weekId));


        return view('football.user-picks.edit', [
            'game' => $game,
            'user' => $currentUser,
            'pick' => $pick,
            'numberOfGames' => $numberOfGames,
            'picked' => $picked

        ]);
    }


    public function update(Pick $pick) {
        request()->validate([
            'pick'=>['required'],
            'points'=>['required']
        ]);

        $pick->update([
            'pick'=>request('pick'),
            'points'=>request('points')
        ]);

        return redirect('/user-picks');
    }


    public function destroy(Pick $pick) {
        $pick->delete();
        return redirect('/user-picks');
    }
}
