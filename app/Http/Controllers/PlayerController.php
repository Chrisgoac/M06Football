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
}
