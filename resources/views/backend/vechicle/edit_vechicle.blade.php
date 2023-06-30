@extends('admin.admin_master')
@section('title', 'Edit Vechicle')
@section('admin')

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
    <div class="col-md-7 mx-auto">
        <div class="card">

            <div class="card-body">
                <form id="myForm" class="form" method="POST" action="{{ route('vechicle.update') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $editData->id }}">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">vechicle Name</label>
                            <input class="form-control" name="vechicle_name" type="text" value="{{ $editData->vechicle_name }}" required>
                            <small class="form-control-feedback">
                            @error('vechicle_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </small>
                                </small>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Vechicle Seater</label>
                                <input class="form-control" name="seater" type="number" min="1"  value="{{ $editData->seater }}"  required>
                                <small class="form-control-feedback">
                                @error('seater')
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
