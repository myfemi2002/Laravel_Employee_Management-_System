@extends('staff.staff_master')
@section('title', 'Add My Client')
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
                <form id="myForm" class="form" method="POST" action="{{ route('myclients.store') }}">
                    @csrf
                    <div class="row">

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Client Id</label>
                                <input class="form-control" type="text" name="client_id" value="CLT-{{ substr(rand(0,time()),0,7) }}" readonly>
                                <small class="form-control-feedback">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Date</label>
                                <input class="form-control" type="text" name="date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" readonly>
                                <small class="form-control-feedback">
                                @error('date')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Contact Person</label>
                                <input class="form-control" type="text" value="{{ Auth::user()->name}}" readonly>
                                <small class="form-control-feedback">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>



                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Clients Name<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" required>
                                <small class="form-control-feedback">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Clients Phone<span class="text-danger">*</span></label>
                                <input class="form-control" type="tel" name="phone" required>
                                <small class="form-control-feedback">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Clients Email<span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="email" required>
                                <small class="form-control-feedback">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Clients Gender<span class="text-danger">*</span></label>
                                <select class="select" name="gender" required>
                                    <option value="" selected="" disabled="">-- Select --</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                                <small class="form-control-feedback">
                                @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Payment Status<span class="text-danger">*</span></label>
                                <select class="select" name="payment_status" required>
                                    <option value="" selected="" disabled="">-- Select --</option>
                                    <option value="1">Paid</option>
                                    <option value="2">Partially Paid</option>
                                    <option value="0">Unpaid</option>
                                </select>
                                <small class="form-control-feedback">
                                @error('payment_status')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Remark <span class="text-danger">( Optional)</span></label>
                                <textarea class="form-control" rows="4" name="remark" ></textarea>
                                <small class="form-control-feedback">
                                @error('remark')
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
