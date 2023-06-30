@extends('staff.staff_master')
@section('title', 'Daily Report')
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
    <div class="col-md-12">
        <div class="card">

            <div class="card-body">
                <form id="myForm" class="form" method="POST" action="{{ route('staffreport.store') }}">
                    @csrf
                    <input class="form-control" type="text" name="report_id" value="{{ substr(rand(0,time()),0,7) }}" hidden>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Employee Name</label>
                                <input type="text" name="staff_name" class="form-control" value="{{ Auth::user()->name}}" readonly>
                                @error('report')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date & Time</label>
                                <input type="text"  class="form-control" value="{{ Carbon\Carbon::now()->format('Y-m-d')." & ".Carbon\Carbon::now()->format('H:i') }}">
                                @error('report')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Report</label>
                                <textarea class="ckeditor form-control" cols="5"  name="report"></textarea>
                                <small class="form-control-feedback">
                                @error('report')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                    </div>


                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
