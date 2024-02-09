@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card col-sm-10 mx-auto">
            <div class="card-body">
                <h2>Book Vehicle</h2>
                <form id="booking_form" action="{{ route('bookings.searchByDateRange') }}">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="from_location" class="mt-3">From Location:</label>
                                <input type="text" name="from_location" id="from_location" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="to_location" class="mt-3">To Location:</label>
                                <input type="text" name="to_location" id="to_location" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="from_date" class="mt-3">From Date:</label>
                                <input type="datetime-local" name="from_date" id="from_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="to_date" class="mt-3">To Date:</label>
                                <input type="datetime-local" name="to_date" id="to_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary mt-3 float-end" id="searchBtn">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="container">
                <div class="row mt-4" id="searchResult">
                </div>
            </div>
        @endsection
