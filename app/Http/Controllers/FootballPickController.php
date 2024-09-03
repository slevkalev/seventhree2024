<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pick;

class FootballPickController extends Controller
{
    public function index() {
        $picks = Pick::all();

        return view('football.dashboard.picks.index', [
            'picks' => $picks
        ]);
    }

    public function create() {
        request()->validate([
            'game'=>['required'],
            'user'=>['required'],
            'pick'=>['required'],
            'points'=>['required']
        ]);

        Pick::create([
            'game' => $request('game'),
            'user' => $request('user'),
            'pick' => $request('pick'), // 'home' or 'away'
            'points' => $request('points')
        ]);

        return redirect('dashboard/picks');

    }

    public function show(Pick $pick) {
        return view('football.dashboard.games.show', ['pick' => $pick ]);
    }

    public function store() {
        request()->validate([
            'game'=>['required'],
            'user'=>['required'],
            'pick'=>['required'],
            'points'=>['required']
        ]);

        Game::create([
            'game'=>request('game'),
            'user'=>request('user'),
            'pick'=>request('pick'),
            'points'=>request('points'),
            'away_team'=>request('away_team')
        ]);

        return redirect('/dashboard/picks');
    }

    public function edit() {

    }

    public function update() {

    }

    public function destroy() {

    }
}
