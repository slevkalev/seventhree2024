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

        $today = Carbon::now()->format('m/d/Y');
        $currentUser = Auth::user() ?? "";
        $weeks = Helper::schedule();
        $weekId = Helper::get_week_id($today, $weeks);
        $numberOfGames = $weeks[$weekId]['nog'];
        $games = Game::all();
        $picks = Pick::all();
        $teams = Team::all();
        $maxPoints = Helper::getMaxPointsInWeek($numberOfGames);
        $users = User::select('id', 'first_name', 'last_name')->get();


        return view('football.bigboard.index', [
            'games' => $games,
            'picks' => $picks,
            'teams' => $teams,
            'users' => $users,
            'currentUser' => $currentUser,
            'maxPoints' => $maxPoints,
            'numberOfGames' => $numberOfGames
        ]);

    }

    public function show($week){


        $today = Carbon::now()->format('m/d/Y');
        $currentUser = Auth::user() ?? "";
        $weeks = Helper::schedule();
        $weekId = Helper::get_week_id($today, $weeks);
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
