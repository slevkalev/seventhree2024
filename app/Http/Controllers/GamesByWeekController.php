<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Helper\Helper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



class GamesByWeekController extends Controller
{
    public function index() {


        $today = Carbon::now()->format('m/d/Y');
        $currentUser = Auth::user() ?? "";
        $weeks = Helper::schedule();
        $weekId = Helper::get_week_id($today, $weeks);
        $user = Auth::user();
        $userId = Auth::id();



        function getGamesByWeek($week){
            return Game::where('week', $week)->get();
        }

        $games = getGamesByWeek($weekId);

        return view('football.games.index', [
            'games' => $games,
            'currentUser'=> $currentUser

        ]);

    }

    public function show($week){


        $today = Carbon::now()->format('m/d/Y');
        $currentUser = Auth::user() ?? "";
        $weeks = Helper::schedule();
        $weekId = Helper::get_week_id($today, $weeks);
        $user = Auth::user();
        $userId = Auth::id();
        $games = Game::where('week', $week)->get();

        return view('football.games.show', [
            'week'=> $week,
            'games'=> $games,
            'currentUser'=> $currentUser
        ]);
    }
}


