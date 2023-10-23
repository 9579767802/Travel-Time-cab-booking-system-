@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add Vehicle</h2>
        <form action="{{ route('vehicles.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="model_name">Model Name:</label>
                <input type="text" name="model_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="passenger_capacity">Passenger Capacity:</label>
                <input type="number" name="passenger_capacity" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="vehicle_no">Vehicle No:</label>
                <input type="text" name="vehicle_no" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success mt-2">Submit</button>
        </form>
    </div>
@endsection
