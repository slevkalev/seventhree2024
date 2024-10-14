<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Team;
use App\Models\Pick;
use App\Models\User;
use App\Helper\Helper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



class BigboardController extends Controller
{
    public function index() {
        $currentUser = Auth::user() ?? "";

        if(Auth::guest()){
            return redirect('/login');
        }

        $today = Carbon::now()->format('m/d/Y');
        $weeks = Helper::schedule();
        $weekId = Helper::get_week_id($today, $weeks);


        return $this->show($weekId);

    }

    public function show($week){

        $currentUser = Auth::user() ?? "";

        if(Auth::guest()){
            return redirect('/login');
        }


        $today = Carbon::now()->format('m/d/Y');
        $weeks = Helper::schedule();
        // $weekId = Helper::get_week_id($today, $weeks);
        $weekId = $week;
        $numberOfGames = $weeks[$week - 1]['nog'];
        $games = Game::all();
        $picks = Pick::all();
        $teams = Team::all();
        $maxPoints = Helper::getMaxPointsInWeek($numberOfGames);
        $users = User::select('id', 'first_name', 'last_name')->get();

        return view('football.bigboard.show',[
            'week'=>$week,
            'games' => $games,
            'picks' => $picks,
            'teams' => $teams,
            'users' => $users,
            'currentUser' => $currentUser,
            'maxPoints' => $maxPoints,
            'numberOfGames' => $numberOfGames
        ]);

    }
}
