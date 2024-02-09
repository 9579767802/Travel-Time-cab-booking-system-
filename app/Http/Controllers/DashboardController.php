<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $driversCount = Driver::count();
        $vehiclesCount = Vehicle::count();
        $bookingsCount = Booking::count();

        return view('dashboard', compact('driversCount', 'vehiclesCount', 'bookingsCount'));
    }
}
