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
        $player = new Player;
        $player->name = $request->name;
        $player->surname = $request->surname;
        $player->position = $request->position;
        $player->salary = $request->salary;
        $player->save();
        
        $message = "Player " . $player->name . " added successfully";

        return redirect('/manage/players')->with('message', $message);
    }
}
