<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class GolfEntryConfirmed extends Controller
{
    public function index() {

        $today = Carbon::now()->format('m/d/Y');


        return view('/golf-entry-confirmed', [
            'today'=>$today,
        ]);

    }
}
