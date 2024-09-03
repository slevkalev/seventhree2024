<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Helper\Helper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LeaderboardController extends Controller
{
    public function index() {





        return view('football.leaderboard.index', [
            'games'=>$games,
            'week'=>$week,
            'user'=>$user,

        ]);
    }
}
