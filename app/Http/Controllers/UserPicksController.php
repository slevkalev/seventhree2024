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

class UserPicksController extends Controller
{
    public function index() {

        $today = Carbon::now()->format('m/d/Y');
        $weeks = Helper::schedule();
        $weekId = Helper::get_week_id($today, $weeks);

        return $this->show($weekId);

    }

    public function create(Game $game) {

        if(Auth::guest()){
            return redirect('/login');
        }

        if($game->locked) {
            return redirect('user-picks/'.$game->week);
        }



        $today = Carbon::now()->format('m/d/Y');
        $currentUser = Auth::user();
        $weeks = Helper::schedule();
        // $weekId = Helper::get_week_id($today, $weeks);
        $weekId = $game->week;
        $numberOfGames = $weeks[$weekId-1]['nog'];

        //Returns an array of point values already selected by this user this week.
        function getUserPointsForWeek($userId, $week) {
            return Pick::select('picks.points')
                ->join('games', 'picks.game', '=', 'games.id')
                ->where('games.week', $week)
                ->where('picks.user', $userId)
                ->get()
                ->pluck('points')
                ->toArray();
        }

        //Returns an array of game id values for each pick made this week.
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

        //If the pick has already been made for this game then redirect to edit the pick rather than create a new pick.
        if(in_array($game->id, $gamesPicked)){
            $pick = Pick::select('id')
            ->where('user', $currentUser->id)
            ->where('game', $game->id);

            return redirect('user-picks/'. $pick->pluck('id')->first() .'/edit');
        }

        // this instance of picked array is used to create the selection options in the view.
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


    public function show($week){

        if(Auth::guest()){
            return redirect('/login');
        }

        $today = Carbon::now()->format('m/d/Y');
        $currentUser = Auth::user() ?? "";
        $userId = Auth::id() ?? "";
        $today = Carbon::now()->format('m/d/Y');
        $weeks = Helper::schedule();
        $gamesThisWeek = Game::where('week', $week)->get();

        $picks = $currentUser->picks()->with(['game'])
        ->whereHas('game', function ($query) use ($week){
            $query->where('week', $week);
        })
        ->orderBy('points', 'desc')
        ->get();
        $picks->load('game.homeTeam', 'game.awayTeam');

        return view('football.user-picks.show',[
            'user'=>$currentUser,
            'today'=>$today,
            'week'=>$week,
            'picks'=>$picks


        ]);
    }


    public function store() {

        request()->validate([
            'user'=>['required'],
            'game'=>['required'],
            'pick'=>['required'],
            'points'=>['required']
        ]);


        // Check for an existing record with this user and game
        $exists = Pick::where('user', request('user'))
                    ->where('game', request('game'))
                    ->exists();

        if ($exists) {
            // Redirect back with an error message, or handle as you prefer
            return redirect('/games');

        }

        // Create the pick if no duplicate found

        Pick::create([
            'user'=>request('user'),
            'game'=>request('game'),
            'pick'=>request('pick'),
            'points'=>request('points'),
        ]);

        return redirect('/games');
    }


    public function edit(Pick $pick){

        Gate::authorize('edit-pick', $pick);

        //retrieve game info for the pick to edit
        $game = Game::where('id', $pick->game)->first();



        if($game['locked'] == 1) {
            return redirect('/user-picks');
        }

        $pick_week = $game->week;
        $today = Carbon::now()->format('m/d/Y');
        $currentUser = Auth::user();
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



        return view('football.user-picks.edit', [
            'game' => $game,
            'user' => $currentUser,
            'pick' => $pick,
            'numberOfGames' => $numberOfGames,
            'picked' => $picked
        ]);


    }


    public function update(Pick $pick) {

        $week = $pick->game()->pluck('week')->first();

        request()->validate([
            'pick'=>['required'],
            'points'=>['required']
        ]);

        $pick->update([
            'pick'=>request('pick'),
            'points'=>request('points')
        ]);




        return redirect('/games');

    }


    public function destroy(Pick $pick) {
        $pick->delete();
        return redirect('/user-picks');
    }
}
