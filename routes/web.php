<?php

use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});

Route::get('/manage/teams', [TeamController::class, 'listAll']);
Route::get('/team/add', function () {
    return view('team.add');
});
Route::get('/team/{team}', [TeamController::class, 'find']);

Route::post('/team/add', [TeamController::class, 'add']);

Route::get('/manage/players', [PlayerController::class, 'listAll']);
Route::get('/player/add', function () {
    return view('player.add');
});
Route::get('/player/{player}', [PlayerController::class, 'find']);
Route::post('/player/add', [PlayerController::class, 'add']);

Route::post('/edit/team', [TeamController::class, 'update']);
Route::get('/edit/team/{team}', [TeamController::class, 'edit']);

Route::post('/edit/player/{player}', [PlayerController::class, 'update']);
Route::get('/edit/player/{player}', [PlayerController::class, 'edit']);

Route::post('/delete/player/{player}', [PlayerController::class, 'delete']);
Route::post('/delete/team/{team}', [TeamController::class, 'delete']);

Route::fallback(function () {
    return redirect()->back();
});