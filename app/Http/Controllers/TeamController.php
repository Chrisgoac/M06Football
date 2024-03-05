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

    public function add(Request $request) {

        $validatedData = $request->validate([
            'name' => 'required|string|max:20',
            'stadium' => 'required|string|max:50',
            'numMembers' => 'required|integer',
            'budget' => 'required|integer'
        ]);

        $team = new Team;
        $team->name = $request->name;
        $team->stadium = $request->stadium;
        $team->numMembers = $request->numMembers;
        $team->budget = $request->budget;
        $team->save();
        
        $message = "Team " . $team->name . " added successfully";

        return redirect('/manage/teams')->with('message', $message);
    }

    public function update(Request $request, Team $team) {

        $validatedData = $request->validate([
            'name' => 'required|string|max:20',
            'stadium' => 'required|string|max:50',
            'numMembers' => 'required|integer',
            'budget' => 'required|integer'
        ]);

        $editTeam = Team::find($team->id);
        $editTeam->name = $request->name;
        $editTeam->stadium = $request->stadium;
        $editTeam->numMembers = $request->numMembers;
        $editTeam->budget = $request->budget;
        $editTeam->save();

        $message = "Team " . $team->name . " modified successfully";
        
        return redirect("/manage/teams")->with('message', $message);
    }

    public function delete(Team $team){
        $team->delete();

        $message = "Team " . $team->name . " deleted successfully";

        return redirect()->back()->with('message', $message);
    }

    public function edit(Team $team) {
        return view('team.edit', compact('team'));
    }


}
