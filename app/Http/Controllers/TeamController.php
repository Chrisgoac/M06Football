<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Team;
use App\Models\Player;

use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    
    // public function index() {
    //     return view('team.index');
    // }

    // Show the page to enroll a player to a team
    public function showEnrollPage(Team $team) {
        $players = Player::all();
        return view('player.enroll', compact('team', 'players'));
    }

    // Enroll a player to a team
    public function enrollPlayer(Request $request, Player $player, Team $team) {
        // Check if the player is already enrolled in the selected team
        if ($player->team_id == $team->id) {
            $message = "The player is already enrolled in this team.";
            return redirect()->back()->with('message', $message);
        }
    
        // Check if the player is enrolled in another team
        if ($player->team_id) {
            // Show a confirmation message to unenroll the player from the current team
            // and then enroll them in the new team
            $confirmationMessage = "The player is currently enrolled in another team ({$player->team->name}). Do you want to unenroll them from the current team and enroll them in this team?";
            
            return redirect()->back()->with('confirmation', $confirmationMessage)->with('player_id', $player->id)->with('team_id', $team->id);
        }
    
        // If the player is not enrolled in any team, enroll them in the new team
        $player->team_id = $team->id;
        
        // You can use a transaction here to ensure the atomicity of the operations
        DB::beginTransaction();
    
        try {
            $player->save();
            DB::commit();
    
            $message = "The player has been enrolled in the {$team->name} team.";
            return redirect()->back()->with('message', $message);
        } catch (\Exception $e) {
            DB::rollback();
            $message = "There was an error enrolling the player. Please try again.";
            return redirect()->back()->with('error', $message);
        }
    }

    // List all teams
    public function listAll() {
        $teams = Team::all();
        return view('manage.teams', compact('teams'));
    }

    // Find a team by ID
    public function find(int $id) {
        $team = Team::find($id);
        return view('team.find', compact('team'));
    }

    // Add a new team
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

    // Confirm enrolling a player to a team
    public function confirmEnrollPlayer(Request $request, Player $player, Team $team) {
        // Check if the player is already enrolled in the selected team
        if ($player->team_id == $team->id) {
            $message = "The player is already enrolled in this team.";
            return redirect()->back()->with('message', $message);
        }
    
        // If the player is not enrolled in any team, enroll them in the new team
        $player->team_id = $team->id;
        
        // You can use a transaction here to ensure the atomicity of the operations
        DB::beginTransaction();
    
        try {
            $player->save();
            DB::commit();
    
            $message = "The player has been enrolled in the {$team->name} team.";
            return redirect()->back()->with('message', $message);
        } catch (\Exception $e) {
            DB::rollback();
            $message = "There was an error enrolling the player. Please try again.";
            return redirect()->back()->with('error', $message);
        }
    }

    // Update team details
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

    // Remove a player from a team
    public function removePlayer(Player $player) {
        if ($player) {
            $player->team_id = null; // Unenroll the player from the team
            $player->save();

            $message = "Player {$player->name} has been removed from the team.";
            return redirect()->back()->with('message', $message);
        } else {
            $message = "Player not found.";
            return redirect()->back()->with('error', $message);
        }
    }

    // Delete a team
    public function delete(Team $team){
        // Check if there are associated players
        if ($team->players()->exists()) {
            $message = "Cannot delete team {$team->name}. Please remove all associated players first.";
            return redirect()->back()->with('message', $message);
        }
    
        // If no associated players, proceed with deletion
        $team->delete();
    
        $message = "Team " . $team->name . " deleted successfully";
    
        return redirect()->back()->with('message', $message);
    }

    // Edit team details
    public function edit(Team $team) {
        return view('team.edit', compact('team'));
    }
}
