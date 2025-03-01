<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Helper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class GolfHomeController extends Controller
{

    public function index() {
        $today = Carbon::now()->format('m/d/Y');
        $tournaments = Helper::golfTournaments();
        $current = Helper::golfTournaments()[0];

        return view('golf', [
            'today'=>$today,
            'tournaments'=>$tournaments,
            'current'=>$current,
        ]);
    }
}
