@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Vehicles</h2>
        <a href="{{ route('vehicles.create') }}" class="btn btn-success">Add Vehicle</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Model Name</th>
                    <th>Passenger Capacity</th>
                    <th>Vehicle No</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr>
                        <td>{{ $vehicle->id }}</td>
                        <td>{{ $vehicle->model_name }}</td>
                        <td>{{ $vehicle->passenger_capacity }}</td>
                        <td>{{ $vehicle->vehicle_no }}</td>
                        <td>
                            <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection



