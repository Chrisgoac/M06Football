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

// Route::get('/manage/teams', function () {
//     return view('manage.teams');
// });

// Route::get('/manage/players', function () {
//     return view('manage.players');
// });

Route::get('/manage/teams', [TeamController::class, 'listAll']);
Route::get('/team/{id}', [TeamController::class, 'find']);

Route::get('/manage/players', [PlayerController::class, 'listAll']);
Route::get('/player/{id}', [PlayerController::class, 'find']);
