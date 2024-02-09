<?php

namespace App\Http\Controllers;

use App\DataTables\bookingsDataTable;
use App\Models\Booking;
use App\Models\driver;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $users = User::all();
        $vehicles = Vehicle::all();
        $drivers = driver::all();

        return view('bookings.create', compact('users', 'vehicles', 'drivers'));
    }
    public function show()
    {

    }

    public function store(Request $request)
    {
        dd($request->all());
        $request->validate([

        ]);

        Booking::create($request->all());

        return redirect()->route('bookings.index')
            ->with('success', 'Booking created successfully.');
    }

    public function edit(Booking $booking)
    {
        return view('bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([

        ]);

        $booking->update($request->all());

        return redirect()->route('bookings.index')
            ->with('success', 'Booking updated successfully');
    }

    public function destroy($id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found');
        }

        $booking->delete();

        return redirect()->back()->with('success', 'Booking deleted successfully');
    }
    public function searchByDateRange(Request $request)
    {

        $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date',

        ]);

        $bookingVehicleIds = Booking::whereBetween('from_date', [$request->from_date, $request->to_date])
            ->orWhereBetween('to_date', [$request->from_date, $request->to_date])
            ->pluck('vehicle_id');
        $vehicles = Vehicle::whereNotIn('id', $bookingVehicleIds)->get();

        return response()->json(['msg' => 'success', 'data' => $vehicles]);

    }

    public function bookUser(Request $request, $vehicle_id, $driver_id)
    {
        // dd($request->all(), $vehicle_id, $driver_id);

        $request->validate([
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'from_location' => 'required|string',
            'to_location' => 'required|string',

        ]);

        $bookedDrivers = Booking::where('driver_id', $driver_id)
            ->whereBetween('from_date', [$request->from_date, $request->to_date])
            ->orWhereBetween('to_date', [$request->from_date, $request->to_date])
            ->pluck('driver_id');

        $availableDrivers = driver::whereNotIn('id', $bookedDrivers)->pluck('id')->all();

        $selectedDriverKey = array_rand($availableDrivers);

        $booking = new Booking();
        $booking->user_id = \Illuminate\Support\Facades\Auth::id();
        $booking->vehicle_id = $vehicle_id;
        $booking->driver_id = $availableDrivers[$selectedDriverKey];
        $booking->from_date = $request->input('from_date');
        $booking->to_date = $request->input('to_date');
        $booking->from_location = $request->input('from_location');
        $booking->to_location = $request->input('to_location');
        $booking->status = 'Active';

        $booking->save();

        return response()->json(['success' => 'Booking successful', 'booking' => $booking]);
    }

    public function allBookings(bookingsDataTable $datatable)
    {

        return $datatable->render('bookings.bookinglist');
    }

    public function bookingData(Request $request, BookingsDataTable $dataTable)
    {
        return $dataTable->render('bookings.bookinglist');
    }

}
