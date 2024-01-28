<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/matches', [DashboardController::class, 'showMatches'])->name('matches');;
Route::get('/matches/create', [AdminController::class, 'create'])->middleware('auth', 'admin')->name('matches.create');
Route::post('matches/store', [AdminController::class, 'store'])->middleware('auth', 'admin')->name('matches.store');
Route::get('/teams', [DashboardController::class, 'showTeams'])->middleware('auth', 'admin')->name('teams');
Route::get('/teams/create', [AdminController::class, 'teamsCreate'])->middleware('auth', 'admin')->name('teams.create');
Route::post('teams/store', [AdminController::class, 'teamsStore'])->middleware('auth', 'admin')->name('teams.store');
Route::get('/players', [DashboardController::class, 'showPlayers'])->middleware('auth', 'admin')->name('players');
Route::get('/players/create', [AdminController::class, 'playersCreate'])->middleware('auth', 'admin')->name('players.create');
Route::post('/players/store', [AdminController::class, 'playersStore'])->middleware('auth', 'admin')->name('players.store');
Route::delete('/players/{player}', [AdminController::class, 'destroyPlayer'])
    ->middleware('auth', 'admin')
    ->name('players.destroy');


Route::get('/players/{player}/edit', [AdminController::class, 'editPlayer'])->middleware('auth', 'admin')
    ->name('players.edit');

Route::put('/players/{player}', [AdminController::class, 'updatePlayer'])->middleware('auth', 'admin')->name('players.update');

Route::get('/teams/{team}/edit', [AdminController::class, 'editTeam'])->middleware('auth', 'admin')
    ->name('teams.edit');

Route::put('/teams/{team}', [AdminController::class, 'updateTeam'])->middleware('auth', 'admin')->name('teams.update');



Route::get('/matches/{match}/edit', [MatchController::class, 'edit'])->middleware('auth', 'admin')->name('matches.edit');
Route::put('/matches/{match}', [MatchController::class, 'update'])->middleware('auth', 'admin')->name('matches.update');

Route::middleware(['web'])->group(function () {
    Route::delete('players/{player}', [AdminController::class, 'destroyPlayer'])->name('players.destroy');
    Route::delete('/matches/{match}', [MatchController::class, 'destroy'])->name('matches.destroy');
    Route::delete('/teams/{team}', [AdminController::class, 'destroyTeam'])
        ->middleware('auth', 'admin')
        ->name('teams.destroy');
});
