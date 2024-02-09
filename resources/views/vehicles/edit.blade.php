@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Edit Vehicle</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('vehicles.update', $vehicle->id) }}" id="vehicleAdd" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-floating mb-3">
                        <input type="text" name="model_name" class="form-control model_name" value="{{ $vehicle->model_name }}"
                            id="model_name" placeholder="Model Name">
                        <label for="model_name">Model Name</label>
                        <span class="modelNameError"></span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" name="passenger_capacity" class="form-control passenger_capacity"
                            value="{{ $vehicle->passenger_capacity }}" id="passenger_capacity"
                            placeholder="Passenger Capacity">
                        <label for="passenger_capacity">Passenger Capacity</label>
                        <span class="passengerCapacityError"></span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="vehicle_no" class="form-control vehicle_no" value="{{ $vehicle->vehicle_no }}"
                            id="vehicle_no" placeholder="Vehicle No">
                        <label for="vehicle_no">Vehicle No</label>  
                        <span class="vehicleNoError"></span>                      
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-label">Image:</label>
                        <input class="form-control image" name="image" type="file" id="formFile">
                        <span class="imageError"></span>
                    </div>
                    <button type="submit" class="btn btn-primary float-end mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
