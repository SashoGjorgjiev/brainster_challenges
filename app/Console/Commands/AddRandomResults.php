<?php

namespace App\Console\Commands;

use App\Models\MatchModel;
use Illuminate\Console\Command;

class AddRandomResults extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:random-results';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add random results to matches played over the last 24 hours';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Your logic to add random results to matches played over the last 24 hours
        $matches = MatchModel::whereBetween('match_date', [now()->subDay(), now()])->get();


        foreach ($matches as $match) {
            $match->update([
                'home_team_score' => rand(0, 5),
                'away_team_score' => rand(0, 5),
            ]);
        }

        $this->info('Random results added successfully.');
    }
}
