<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Pick;
use App\Helper\Helper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;





class GamesByWeekController extends Controller
{
    public function index() {

        $today = Carbon::now()->format('m/d/Y');
        $weeks = Helper::schedule();
        $weekId = Helper::get_week_id($today, $weeks);

        return $this->show($weekId);

    }

    public function show($week){


        $today = Carbon::now()->format('m/d/Y');
        $currentUser = Auth::user() ?? "";
        $weeks = Helper::schedule();
        $weekId = Helper::get_week_id($today, $weeks);
        $user = Auth::user();
        $userId = Auth::id();
        $games = Game::where('week', $week)->get();
        $picks = Pick::with('game')
        ->where('user', $userId)
        ->whereHas('game', function ($query) use ($week) {
            $query->where('week', $week);
        })
        ->pluck('game');

        // $picksFull = Pick::with('game')
        // ->where('user', $userId)
        // ->whereHas('game', function ($query) use ($week) {
        //     $query->where('week', $week);
        // })
        // ->get();


        $picksFull = Pick::all();

        return view('football.games.show', [
            'week'=> $week,
            'games'=> $games,
            'currentUser'=> $currentUser,
            'picks'=> $picks,
            'picksFull' => $picksFull,
            'today'=>$today,
            'user' => $userId
        ]);
    }
}


