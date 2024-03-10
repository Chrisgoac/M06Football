<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Team;

class PlayerController extends Controller {

    // Display a list of all players
    public function listAll() {
        $players = Player::all();
        return view('manage.players', compact('players'));
    }

    // Find and display a specific player
    public function find(int $id) {
        $player = Player::find($id);
        return view('player.find', compact('player'));
    }

    // Add a new player
    public function add(Request $request) {

        $validatedData = $request->validate([
            'name' => 'required|string|max:20',
            'surname' => 'required|string|max:50',
            'position' => 'required|string|max:20',
            'salary' => 'required|integer'
        ]);

        $player = new Player;
        $player->name = $request->name;
        $player->surname = $request->surname;
        $player->position = $request->position;
        $player->salary = $request->salary;
        $player->save();
        
        $message = "Player " . $player->name . " added successfully";

        return redirect('/manage/players')->with('message', $message);
    }

    // Update player information
    public function update(Request $request, Player $player) {

        $validatedData = $request->validate([
            'name' => 'required|string|max:20',
            'surname' => 'required|string|max:50',
            'position' => 'required|string|max:20',
            'salary' => 'required|integer'
        ]);

        $editPlayer = Player::find($player->id);
        $editPlayer->name = $request->name;
        $editPlayer->surname = $request->surname;
        $editPlayer->position = $request->position;
        $editPlayer->salary = $request->salary;
        $editPlayer->save();

        $message = "Player " . $player->name . " modified successfully";
        
        return redirect("/manage/players")->with('message', $message);
    }

    // Delete a player
    public function delete(Player $player){
        // Check if the player is enrolled in a team
        if ($player->team_id) {
            $message = "Player " . $player->name . " cannot be deleted because they are currently enrolled in a team. Please remove them from the team first.";
            return redirect('/manage/players')->with('message', $message);
        }
    
        // If the player is not enrolled in any team, proceed with deletion
        $player->delete();
    
        $message = "Player " . $player->name . " deleted successfully";
    
        return redirect('/manage/players')->with('message', $message);
    }

    // Display the edit form for a player
    public function edit(Player $player) {
        return view('player.edit', compact('player'));
    }
}

