<?php

namespace App\Http\Controllers;

use App\DataTables\driversDataTable;
use App\Models\driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{

    public function index(driversDataTable $dataTable)
    {

        return $dataTable->render('drivers.index');
    }

    public function create()
    {
        return view('drivers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'license_no' => 'required',
            'aadhar_no' => 'required',
            'address' => 'required',
        ]);

        Driver::create($request->all());

        return redirect()->route('drivers.index')
            ->with('success', 'Driver created successfully');
    }

    public function edit(Driver $driver)
    {
        return view('drivers.edit', compact('driver'));
    }

    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'name' => 'required',
            'license_no' => 'required',
            'aadhar_no' => 'required',
            'address' => 'required',
        ]);

        $driver->update($request->all());

        return redirect()->route('drivers.index')
            ->with('success', 'Driver updated successfully');
    }

    public function destroy($id)
    {
        $driver = Driver::where('id', $id);
        $driver->delete();

        return redirect()->route('drivers.index')
            ->with('success', 'Driver deleted successfully');
    }
}
