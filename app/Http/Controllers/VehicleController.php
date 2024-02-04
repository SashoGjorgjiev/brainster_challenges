<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Requests\VehicleRequest;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return response()->json(['vehicles' => $vehicles], 200);
    }

    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return response()->json(['vehicle' => $vehicle], 200);
    }

    public function store(Request $request)
    {

        $request->validate([
            'brand' => 'required',
            'model' => 'required',
            'plate_number' => 'required',
            'insurance_date' => 'required',
        ]);

        $vehicle = Vehicle::create($request->all());
        // return response()->json(['vehicle' => $vehicle], 201);
        return redirect()->route('dashboard')->with('success', 'Vehicle created successfully.');
    }
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);



        return view('vehicles.edit', ['vehicle' => $vehicle]);
        return redirect()->route('dashboard')->with('success', 'Vehicle edit successfully.');
    }
    public function update(VehicleRequest $request, $id)
    {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return response()->json(['message' => 'Vehicle not found'], 404);
        }

        $updated = $vehicle->update([
            'brand' => $request->input('brand'),
            'model' => $request->input('model'),
            'plate_number' => $request->input('plate_number'),
            'insurance_date' => $request->input('insurance_date'),
        ]);

        if ($updated) {
            return redirect()->route('dashboard')->with('success', 'Vehicle edit successfully.');
        }
    }

    public function create()
    {
        return view('vehicles.create');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::find($id);

        if (!$vehicle) {
            return response()->json(['message' => 'Vehicle not found'], 404);
        }

        $vehicle->delete();

        return response()->json(['message' => 'Vehicle record soft-deleted successfully'], 200);
        return redirect()->route('dashboard')->with('success', 'Vehicle deleted successfully.');
    }
}
