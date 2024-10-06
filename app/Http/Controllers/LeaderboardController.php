<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Pick;
use App\Models\User;
use App\Models\Team;
use App\Helper\Helper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LeaderboardController extends Controller
{
    public function index() {

        $games = Game::all();
        $today = Carbon::now()->format('m/d/Y');
        $weeks = Helper::schedule();
        $weekId = Helper::get_week_id($today, $weeks);
        $user = Auth::user() ?? "";
        $users = User::all(['id', 'first_name', 'last_name']);
        $userId = Auth::id();
        $picks = Pick::all();
        $teams = Team::all();

        return view('football.leaderboard.index', [
            'games'=>$games,
            'week'=>$weekId,
            'user'=>$user,
            'users'=>$users,
            'picks'=>$picks,
            'today'=>$today,
            'week'=>$weekId,
            'teams'=>$teams

        ]);
    }
}
