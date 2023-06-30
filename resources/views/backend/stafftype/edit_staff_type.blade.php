@extends('admin.admin_master')
@section('title', 'Edit Staff Type')
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
                <form id="myForm" class="form" method="POST" action="{{ route('staff-type.update') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $editData->id }}">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Name</label>
                                <input class="form-control" value="{{ $editData->name }}" type="text" readonly>
                                <small class="form-control-feedback">
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Phone</label>
                                <input class="form-control" value="{{ $editData->phone }}" type="tel" readonly>
                                <small class="form-control-feedback">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Gender</label>
                                <input class="form-control" value="{{ $editData->gender }}" type="text" readonly>
                                <small class="form-control-feedback">
                                @error('gender')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Email</label>
                                <input class="form-control" value="{{ $editData->email }}" type="text" readonly>
                                <small class="form-control-feedback">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="col-form-label">Staff Type</label>
                                <select class="select" name="staff_type" required>
                                    <option value="" selected="" disabled="">-- Select --</option>
                                    <option value="regular" {{ ($editData->staff_type == "regular" ? "selected": "") }}>Regular Staff</option>
                                    <option value="independent" {{ ($editData->staff_type == "independent" ? "selected": "") }}>Independent Staff</option>
                                </select>
                                <small class="form-control-feedback">
                                @error('staff_type')
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
