<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Helper\Helper;
use Carbon\Carbon;
use App\Models\Golfer;
use App\Models\Player;

class GolfLeaderboardController extends Controller
{


    public function index() {
        $today = Carbon::now()->format('m/d/Y');
        $golfers = Golfer::all();
        $entries = Player::all();
        $tournament = Helper::golfTournaments()[3];




        return view('golf-leaderboard', [
            'today'=>$today,
            'golfers'=>$golfers,
            'entries'=>$entries,
            'tournament'=>$tournament,
        ]);
    }
}
