<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\FootballTeamController;
use App\Http\Controllers\FootballGameController;
use App\Http\Controllers\FootballPickController;
use App\Http\Controllers\GamesByWeekController;
use App\Http\Controllers\UserPicksController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\BigboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GolfHomeController;
use App\Http\Controllers\GolferController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\GolfLeaderboardController;
use App\Http\Controllers\GolfEntryConfirmed;
use App\Http\Controllers\GolfTournamentInfoController;
use App\Http\Controllers\GolfScoresController;


Route::get('/', [HomeController::class, 'home']);


//login routes
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

//register routes
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);


//leaderboard routes
Route::get('/leaderboard', [LeaderboardController::class, 'index']);


//bigboard routes
Route::get('/bigboard', [BigboardController::class, 'index']);
Route::get('/bigboard/{week}', [BigboardController::class, 'show']);


Route::get('/games', [GamesByWeekController::class, 'index']);
Route::get('/games/{week}', [GamesByWeekController::class, 'show']);


//user picks - create, edit, update, delete a pick
Route::get('/user-picks', [UserPicksController::class, 'index']);
Route::get('/user-picks/create/{game}', [UserPicksController::class, 'create']);
Route::get('/user-picks/{week}', [UserPicksController::class, 'show']);
Route::post('/user-picks', [UserPicksController::class, 'store'])
    ->middleware('auth');

Route::get('/user-picks/{pick}/edit', [UserPicksController::class, 'edit'])
    ->middleware('auth')
    ->can('edit-pick', 'pick');

Route::patch('/user-picks/{pick}', [UserPicksController::class, 'update'])
    ->middleware('auth')
    ->can('edit-pick', 'pick');

Route::delete('/user-picks/{pick}', [UserPicksController::class, 'destroy'])
    ->middleware('auth')
    ->can('edit-pick', 'pick');


//teams dashboard - create, edit, update, delete a team
Route::get('/dashboard/teams', [FootballTeamController::class, 'index']);
Route::get('/dashboard/teams/create', [FootballTeamController::class, 'create']);
Route::post('dashboard/teams', [FootballTeamController::class, 'store']);
Route::get('/dashboard/teams/{team}', [FootballTeamController::class, 'show']);
Route::get('/dashboard/teams/{team}/edit', [FootballTeamController::class, 'edit']);
Route::patch('/dashboard/teams/{team}', [FootballTeamController::class, 'update']);
Route::delete('/dashboard/teams/{team}', [FootballTeamController::class, 'destroy']);


//games dashboard - create, edit, update, delete a game
Route::get('/dashboard/games', [FootballGameController::class, 'index']);
Route::get('/dashboard/games/create', [FootballGameController::class, 'create']);
Route::post('dashboard/games', [FootballGameController::class, 'store']);
Route::get('/dashboard/games/{game}', [FootballGameController::class, 'show']);
Route::get('/dashboard/games/{game}/edit', [FootballGameController::class, 'edit']);
Route::patch('/dashboard/games/{game}', [FootballGameController::class, 'update']);
Route::delete('/dashboard/games/{game}', [FootballGameController::class, 'destroy']);


//picks dashboard - create, edit, update, delete a pick
Route::get('/dashboard/picks', [FootballPickController::class, 'index']);
Route::get('/dashboard/picks/create', [FootballPickController::class, 'create']);
Route::post('dashboard/picks', [FootballPickController::class, 'store']);
Route::get('/dashboard/picks/{pick}', [FootballPickController::class, 'show']);
Route::get('/dashboard/picks/{pick}/edit', [FootballPickController::class, 'edit']);
Route::patch('/dashboard/picks/{pick}', [FootballPickController::class, 'update']);
Route::delete('/dashboard/picks/{pick}', [FootballPickController::class, 'destroy']);


//golfers - dashboard for uploading field data
Route::get('/golf-dashboard', [GolferController::class, 'index']);
Route::post('/golf-dashboard',[GolferController::class, 'store']);

//golfer - scores
Route::get('/golf-scores',[GolfScoresController::class,'index']);
Route::get('/golf-scores/{golfer}/edit',[GolfScoresController::class, 'edit']);
Route::patch('/golf-scores/{golfer}',[GolfScoresController::class, 'update']);
// Route::delete('/golf-scores/{golfer}',[GolfScoresController::class, 'destroy']);


//player entry
Route::get('/golf-entry', [PlayerController::class, 'index']);
Route::post('/golf-entry',[PlayerController::class, 'store']);

//player entry confirmation page
Route::get('/golf-entry-confirmed', [GolfEntryConfirmed::class, 'index']);

//golf home
Route::get('/golf', [GolfHomeController::class, 'index']);


//Golf pool leaderboard
Route::get('/golf-leaderboard',[GolfLeaderboardController::class, 'index']);

Route::get('/golf-tournament',[GolfTournamentInfoController::class, 'index']);
