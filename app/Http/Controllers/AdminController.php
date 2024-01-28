<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Team;
use App\Models\Player;
use App\Models\MatchModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $match = MatchModel::all();
        $teams =  Team::all();

        return view('matches.create', compact('match', 'teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $match = new MatchModel();
        $match->match_date = $request->input('match_date');
        $match->home_team_id = $request->input('home_team_id');
        $match->away_team_id = $request->input('away_team_id');
        $match->save();

        return redirect()->route('matches');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */


    public function teamsCreate(Request $request)
    {
        $team = Team::all();

        return view('teams.create', compact('team'));
    }
    public function teamsStore(Request $request)
    {
        $team = new Team();
        $team->name = $request->input('name');
        $team->year_of_foundation = $request->input('year_of_foundation');
        $team->save();

        return redirect()->route('teams');
    }
    public function destroyTeam(Team $team,)
    {
        try {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            $matchesToDelete = MatchModel::where('home_team_id', $team->id)
                ->orWhere('away_team_id', $team->id)
                ->pluck('id');

            DB::table('player_match')->whereIn('match_id', $matchesToDelete)->delete();

            MatchModel::where('home_team_id', $team->id)->delete();

            MatchModel::where('away_team_id', $team->id)->delete();

            $team->delete();

            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            return redirect()->route('teams')->with('success', 'Team deleted successfully.');
        } catch (\Exception $e) {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            return redirect()->route('teams')->with('error', 'Error deleting team: ' . $e->getMessage());
        }
    }


    public function playersCreate(Request $request)
    {
        $players = Player::all();
        $teams = Team::all();

        return view('players.create', compact('players', 'teams'));
    }

    public function playersStore(Request $request)
    {

        $player = new Player();
        $player->first_name = $request->input('first_name');
        $player->last_name = $request->input('last_name');
        $player->date_of_birth = $request->input('date_of_birth');
        $player->team_id = $request->input('team_id');
        $player->save();
        return redirect()->route('players');
    }
    public function destroyPlayer(Player $player)
    {
        $player->delete();

        return redirect()->route('players')->with('success', 'Player deleted successfully.');
    }

    public function editPlayer(Player $player)
    {

        $teams = Team::all();
        return view('players.edit', compact('player', 'teams'));
    }
    public function updatePlayer(
        Request $request,
        Player $player
    ) {

        $player->first_name = $request->input('first_name');
        $player->last_name = $request->input('last_name');
        $player->date_of_birth = $request->input('date_of_birth');
        $player->team_id = $request->input('team_id');
        $player->save();
        return redirect()->route('players');
    }


    public function editTeam(Team $team)
    {

        $teams = Team::all();
        return view('teams.edit', compact('teams', 'team'));
    }
    public function updateTeam(
        Request $request,
        Team $team
    ) {

        $team->name = $request->input('name');
        $team->year_of_foundation = $request->input('year_of_foundation');
        $team->save();
        return redirect()->route('teams');
    }
}
