<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Team;

class TeamController extends Controller
{
    
    // public function index() {
    //     return view('team.index');
    // }

    public function listAll() {
        $teams = Team::all();
        return view('manage.teams', compact('teams'));
    }

    public function find(int $id) {
        $team = Team::find($id);
        return view('team.find', compact('team'));
    }


}
