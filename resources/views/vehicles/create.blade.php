@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Add Vehicle</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('vehicles.store') }}" id="vehicleAdd" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="model_name" class="form-control model_name" id="model_name"
                            placeholder="model name">
                        <label for="model_name">Model Name</label>
                        <span class="modelNameError"></span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" name="passenger_capacity" class="form-control passenger_capacity"
                            id="passenger_capacity" placeholder="passanger capacity">
                        <label for="passenger_capacity">Passenger Capacity</label>
                        <span class="passengerCapacityError"></span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="vehicle_no" class="form-control vehicle_no" id="vehicle_no"
                            placeholder="vehicle no">
                        <label for="vehicle_no">Vehicle No</label>
                        <span class="vehicleNoError"></span>
                    </div>
                    <div class="form-group">
                        <label for="formFile" class="form-label">Image:</label>
                        <input class="form-control image" name="image" type="file" id="formFile">
                        <span class="imageError"></span>
                    </div>
                    <button type="submit" class="btn btn-success float-end mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
