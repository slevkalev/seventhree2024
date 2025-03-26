<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Player;
use App\Helper\Helper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PlayerController extends Controller
{
    public function index() {
        $today = Carbon::now();
        $tournament = Helper::golfTournaments()[1];
        $start_date = Carbon::parse($tournament['start']);
        // dd($today->greaterThan($start_date));

        if($today->greaterThan($start_date)){
            return redirect('golf-leaderboard');
        }


        $field = Helper::tournamentField("field.json");



        return view('golf-entry', [
            'today'=>$today,
            'tournament'=>$tournament,
            'field'=>$field,
        ]);
    }

    public function store(Request $request) {


        $request->validate([
            'player_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15', // Adjust max length as needed
            'golfers' => 'required|array|min:6|max:6', // Ensure exactly 6 options are selected
            'golfers.*' => 'string' // Valid options
        ]);

        // Initialize an array to hold the selections
        $selections = [
            'player_name' => $request->input('player_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            // Assign selected options to corresponding columns
            'selection1' => isset($request->input('golfers')[0]) ? $request->input('golfers')[0] : null,
            'selection2' => isset($request->input('golfers')[1]) ? $request->input('golfers')[1] : null,
            'selection3' => isset($request->input('golfers')[2]) ? $request->input('golfers')[2] : null,
            'selection4' => isset($request->input('golfers')[3]) ? $request->input('golfers')[3] : null,
            'selection5' => isset($request->input('golfers')[4]) ? $request->input('golfers')[4] : null,
            'selection6' => isset($request->input('golfers')[5]) ? $request->input('golfers')[5] : null,
        ];



        // Create a new record in the database
        Player::create($selections);


        return redirect('/golf-entry-confirmed');
    }



}

