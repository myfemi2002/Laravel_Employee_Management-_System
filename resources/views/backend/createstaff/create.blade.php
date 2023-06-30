@extends('admin.admin_master')
@section('title', 'Create Staff')
@section('admin')

<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">@yield('title')</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashobard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">@yield('title')</li>
            </ul>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-10 mx-auto">
        <div class="card">

            <div class="card-body">
                <form id="myForm" class="form" method="POST" action="{{ route('create-staff.store') }}">
                    @csrf
                    <input  type="text" hidden name="uuid" value="{{ substr(rand(0,time()),0,7) }}">
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Name</label>
                                <input class="form-control" name="name" type="text" required>
                                <small class="form-control-feedback">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Email</label>
                                <input class="form-control" name="email" type="email" required>
                                <small class="form-control-feedback">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Phone No</label>
                                <input class="form-control" name="phone" type="tel" required>
                                <small class="form-control-feedback">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Password</label>
                                <input class="form-control" name="password" id="password" type="password" required>
                                <small class="form-control-feedback">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Confirm Password</label>
                                <input class="form-control" id="confirm_password" name="confirm_password" type="password" required>
                                <small class="form-control-feedback">
                                @error('confirm_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-form-label">Assign Role</label>
                                <select class="select" name="role" required>
                                    <option value="" selected="" disabled="">-- Select --</option>
                                    <option value="staff"> Staff</option>
                                    <option value="hr" >Human Resource</option>
                                    <option value="sales">Sales</option>
                                </select>
                                <small class="form-control-feedback">
                                @error('role')
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
