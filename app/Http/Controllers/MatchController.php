<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\MatchModel;
use Illuminate\Http\Request;

class MatchController extends Controller
{

    public function edit(MatchModel $match)
    {
        $teams = Team::all();
        return view('matches.edit', compact('match', 'teams'));
    }

    public function update(Request $request, MatchModel $match)
    {
        $request->validate([
            'home_team_id' => 'required',
            'away_team_id' => 'required',
            'match_date' => 'required|date',
        ]);

        $match->update($request->only(['home_team_id', 'away_team_id', 'match_date']));

        return redirect()->route('matches')->with('success', 'Match updated successfully');
    }
    public function destroy(MatchModel $match)
    {
        $match->delete();

        // You can add a success message if needed
        return redirect()->route('matches')->with('success', 'Match deleted successfully');
    }
}
