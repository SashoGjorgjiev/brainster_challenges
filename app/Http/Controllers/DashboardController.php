<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use App\Models\MatchModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch matches or data you want to display
        $matches = MatchModel::all();

        return view('dashboard', compact('matches'));
    }
    public function showMatches()
    {
        $currentDate = now();

        $pastMatches = MatchModel::where('match_date', '<', $currentDate)->get();

        $upcomingMatches = MatchModel::where('match_date', '>', $currentDate)->get();

        return view('matches.index', compact('pastMatches', 'upcomingMatches'));
    }


    public function showTeams()
    {
        $teams = Team::all();

        return view('teams.index', compact('teams'));
    }

    public function showPlayers()
    {
        $players = Player::all();
        $teams = Team::all();
        return view('players.index', compact('players', 'teams'));
    }
}
