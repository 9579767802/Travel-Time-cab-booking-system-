{{-- <!-- resources/views/dashboard.blade.php -->
{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Dashboard</h2>

        <div class="card">
            <div class="card-header">
                Admin Statistics
            </div>
            <div class="card-body">
                <p>Total Drivers: {{ $driversCount }}</p>
                <p>Total Vehicles: {{ $vehiclesCount }}</p>
                <p>Total Bookings: {{ $bookingsCount }}</p>
            </div>
        </div>

        <!-- Other dashboard content goes here -->
    </div>
@endsection --}}
<!-- resources/views/dashboard.blade.php -->
{{-- @extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Dashboard</h2>

        <div class="row">
            <div class="col-md-4">
                
                <div class="card bg-info text-white" style="height: 200px;">
                    <div class="card-header bg-info text-white text-center"><h2>Drivers</h2></div>
                    <div class="card-body bg-info text-white">
                        <h1 class="text-center"> {{ $driversCount }} </h1>
                       
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-secondary text-white text-center" style="height: 200px">
                    <div class="card-header "><h2> Vehicles</h2></div>
                    <div class="card-body">
                        <h1 class="text-center"> {{ $vehiclesCount }} </h1>
                      
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-warning text-white text-center" style="height: 200px">
                    <div class="card-header"><h2>Bookings</h2></div>
                    <div class="card-body">
                        <h1 class="text-center"> {{ $bookingsCount }}</h1>
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Your other dashboard content goes here -->
    </div>
@endsection --}}

<!-- resources/views/dashboard.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Dashboard</h2>

        <div class="row">
            <div class="col-md-4">
                <a  style="text-decoration: none" href="{{ route('drivers.index') }}">
                    <div class="card bg-white">
                        <div class="card-header">
                            <h2> <i class="fas fa-user "></i> Drivers</h2>
                        </div>
                        <div class="card-body">
                            <span class="fs-3">Total</span>
                            <span class="card-text float-end fs-3 me-4"> {{ $driversCount }}</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a  style="text-decoration: none" href="{{ route('vehicles.index') }}">
                    <div class="card bg-white">
                        <div class="card-header">
                            <h2> <i class="fas fa-car"></i> Vehicles</h2>
                        </div>
                        <div class="card-body">
                            <span class="fs-3">Total</span>
                            <span class="card-text float-end fs-3 me-4">{{ $vehiclesCount }}</span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a style="text-decoration: none"  href="{{ route('bookings.get-booking') }}">
                    <div class="card bg-white">
                        <div class="card-header ">
                            <h2> <i class="fas fa-calendar-alt "></i> Bookings </h2>
                        </div>
                        <div class="card-body ">
                            <span class="fs-3">Total</span>
                            <span class="card-text float-end fs-3 me-4">{{ $bookingsCount }} </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
