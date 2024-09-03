<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class FootballTeamController extends Controller
{
    public function index() {
        $teams = Team::all();

        return view('football.dashboard.teams.index', [
            'teams' => $teams
        ]);

    }

    public function create() {
        return view('football.dashboard.teams.create');
    }

    public function show(Team $team) {
        return view('football.dashboard.teams.show', ['team' => $team ]);
    }

    public function store() {
        request()->validate([
            'city'=>['required'],
            'name'=>['required'],
            'short_name'=>['required'],
            'conference'=>['required'],
            'division'=>['required'],
            'image'=>['required']
        ]);

        Team::create([
            'city'=>request('city'),
            'name'=>request('name'),
            'short_name'=>request('short_name'),
            'conference'=>request('conference'),
            'division'=>request('division'),
            'image'=>request('image'),
        ]);

        return redirect('/dashboard/teams');
    }

    public function edit(Team $team) {

        return view('football.dashboard.teams.edit', [ 'team'=>$team ]);

    }

    public function update(Team $team)     {
        request()->validate([
            'city'=>['required'],
            'name'=>['required'],
            'short_name'=>['required'],
            'conference'=>['required'],
            'division'=>['required'],
            'image'=>['required']
        ]);

        // update the team
        $team->update([
            'city'=>request('city'),
            'name'=>request('name'),
            'short_name'=>request('short_name'),
            'conference'=>request('conference'),
            'division'=>request('division'),
            'image'=>request('image'),
        ]);
        return redirect('/dashboard/teams/' . $team->id);
    }

    public function destroy(Team $team) {

        $team->delete();

        return redirect('/dashboard/teams');

    }
}
