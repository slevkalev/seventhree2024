<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Helper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class GolfHomeController extends Controller
{

    public function index() {
        $today = Carbon::now()->format('m/d/Y H:i:s');
        $tournaments = Helper::golfTournaments();
        // $current = Helper::golfTournaments()[4];
        $current = Helper::golfTournaments();



        return view('golf2', [
            'today'=>$today,
            'tournaments'=>$tournaments,
            'current'=>$current,
        ]);
    }
}
