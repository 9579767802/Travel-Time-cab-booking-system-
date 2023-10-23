<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('layouts.index', compact('vehicles'));
    }

    public function create()
    {
        return view('vehicles.create');
    }
    public function show()
    {
         $vehicles = Vehicle::all();
         return view('layouts.index', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'model_name' => 'required',
            'passenger_capacity' => 'required|integer',
            'vehicle_no' => 'required',
        ]);

        Vehicle::create($request->all());

        return redirect()->route('vehicles.index')
            ->with('success', 'Vehicle created successfully');
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'model_name' => 'required',
            'passenger_capacity' => 'required|integer',
            'vehicle_no' => 'required',
        ]);

        $vehicle->update($request->all());

        return redirect()->route('vehicles.index')
            ->with('success', 'Vehicle updated successfully');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()->route('vehicles.index')
            ->with('success', 'Vehicle deleted successfully');
    }
}
