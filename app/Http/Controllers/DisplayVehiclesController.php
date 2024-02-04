<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class DisplayVehiclesController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('dashboard', compact('vehicles'));
    }
}
