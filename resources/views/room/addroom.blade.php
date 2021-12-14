@extends('layouts.master')
@section('menu')
@extends('sidebar.addroom')
@endsection
@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title mt-5">Add Room</h3>
                    </div>
                </div>
            </div>
            <form action="{{ route('form/room/save') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="row formtype">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Room Number</label>
                                <input class="form-control" type="text" value="BKG-0001">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Room Type</label>
                                <select class="form-control" id="sel1" name="room_type">
                                    <option disabled selected>--Select--</option>
                                    <option value="Single">Single</option>
                                    <option value="Double">Double</option>
                                    <option value="Quad">Quad</option>
                                    <option value="King">King</option>
                                    <option value="Suite">Suite</option>
                                    <option value="Villa">Villa</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>AC/NON-AC</label>
                                <select class="form-control" id="ac_non_ac" name="ac_non_ac">
                                    <option disabled selected>--Select--</option>
                                    <option value="AC">AC</option>
                                    <option value="NON-AC">NON-AC</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Food</label>
                                <select class="form-control" id="food" name="food">
                                    <option disabled selected>--Select--</option>
                                    <option value="Free Breakfast">Free Breakfast</option>
                                    <option value="Free Lunch">Free Lunch</option>
                                    <option value="Free Dinner">Free Dinner</option>
                                    <option value="Free Breakfast & Dinner">Free Breakfast & Dinner</option>
                                    <option value="Free Welcome Drink">Free Welcome Drink</option>
                                    <option value="No Free Food">No Free Food</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Bed Count</label>
                                <select class="form-control" id="bed_count" name="bed_count">
                                    <option disabled selected>--Select--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Charges For cancellation</label>
                                <select class="form-control" id="charges_for_cancellation" name="charges_for_cancellation">
                                    <option disabled selected> --Select--</option>
                                    <option value="Free">Free</option>
                                    <option value="5% Before 24Hours">5% Before 24Hours</option>
                                    <option value="No Cancellation Allow">No Cancellation Allow</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Rent</label>
                                <input type="text" class="form-control" id="rent" name="rent">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="number" class="form-control" id="usr1" name="phone_number">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>File Upload</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="fileupload" name="fileupload">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" rows="1.5" id="message" name="message"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary buttonedit ml-2">Save</button>
            <button type="button" class="btn btn-primary buttonedit">Cancel</button>
        </form>

        </div>
    </div>
@endsection