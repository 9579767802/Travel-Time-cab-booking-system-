<!-- resources/views/drivers/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Add Driver</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('drivers.store') }}" id="addDriver" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control name" id="name" placeholder="name">
                        <label for="name">Name</label>
                        <span class="nameError"></span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="license_no" class="form-control license_no"id="license_no"
                            placeholder="license no">
                        <label for="license_no">License No</label>
                        <span class="licenseNoError"></span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="aadhar_no" class="form-control aadhar_no"id="aadhar_no"
                            placeholder="aadhar no">
                        <label for="aadhar_no">Aadhar No</label>
                        <span class="aadharNoError"></span>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="address" class="form-control address"id="address" placeholder="address">
                        <label for="address">Address</label>
                        <span class="addressError"></span>
                    </div>
                    <button type="submit" class="btn btn-success  float-end mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
