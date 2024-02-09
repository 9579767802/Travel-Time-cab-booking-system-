<?php

namespace App\Http\Controllers;

use App\DataTables\VehiclesDataTable;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VehicleController extends Controller
{
    public function index(VehiclesDataTable $dataTable)
    {

        return $dataTable->render('vehicles.index');
    }

    public function create()
    {
        return view('vehicles.create');
    }
    public function show()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'model_name' => 'required',
            'passenger_capacity' => 'required|integer',
            'vehicle_no' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageUrl = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('images', $imageName, 'public');

            $imageUrl = Storage::url("images/{$imageName}");
        }

        $requestData = $request->all();
        $requestData['image'] = $imageUrl;

        Vehicle::create($requestData);

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
            'image' => 'required',
        ]);
        $imageUrl = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
            $imageUrl = Storage::url("images/{$imageName}");
        }
        $requestData = $request->all();
        $requestData['image'] = $imageUrl;
        $vehicle->update($requestData);

        return redirect()->route('vehicles.index')
            ->with('success', 'Vehicle updated successfully');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::where('id', $id);
        $vehicle->delete();
        return redirect()->
            back()->with('success', 'Vehicle deleted successfully');
    }
    public function getAllVehicles()
    {
        $vehicles = Vehicle::all();
        return response()->json(['msg' => 'success', 'data' => $vehicles]);
    }
}
