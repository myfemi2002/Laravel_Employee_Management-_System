@extends('staff.staff_master')
@section('title', 'Ride Request')
@section('staff')

<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">@yield('title')</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('staff.dashobard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">@yield('title')</li>
            </ul>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-9 mx-auto">
        <div class="card">

            <div class="card-body">
                <form id="myForm" class="form" method="POST" action="{{ route('riderequest.store') }}">
                    @csrf
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Staff Name<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" value="{{ Auth::user()->name}}" readonly>
                                <small class="form-control-feedback">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Staff Phone<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" value="{{ Auth::user()->phone}}" readonly>
                                <small class="form-control-feedback">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="col-form-label">Pickup Address<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="pickup_address" required>
                                <small class="form-control-feedback">
                                @error('pickup_address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="col-form-label">Pickup Date <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" name="pickup_date" type="text" >
                                    <small class="form-control-feedback">
                                    @error('pickup_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="col-form-label">Pickup Time<span class="text-danger">*</span></label>
                                <input class="form-control" type="time" name="pickup_time" required>
                                <small class="form-control-feedback">
                                @error('pickup_time')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="col-form-label">Drop Off Address <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="dropoff_address" required>
                                <small class="form-control-feedback">
                                @error('dropoff_address')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Passengers No<span class="text-danger">*</span></label>
                                <input class="form-control" type="number" min="1" name="passengers_no" required>
                                <small class="form-control-feedback">
                                @error('passengers_no')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Return Trip<span class="text-danger">*</span></label>
                                <select class="select" name="return_trip" required>
                                    <option value="" selected="" disabled="">-- Select --</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                                <small class="form-control-feedback">
                                @error('return_trip')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Note <span class="text-danger">( Optional )</span></label>
                                <textarea class="form-control" rows="4" name="note" ></textarea>
                                <small class="form-control-feedback">
                                @error('note')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
