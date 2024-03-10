<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    public function listAll() {
        $players = Player::all();
        return view('manage.players', compact('players'));
    }

    public function find(int $id) {
        $player = Player::find($id);
        return view('player.find', compact('player'));
    }

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

    public function delete(Player $player){
        $player->delete();

        $message = "Player " . $player->name . " deleted successfully";


        return redirect()->back()->with('message', $message);
    }

    public function edit(Player $player) {
        return view('player.edit', compact('player'));
    }
}
