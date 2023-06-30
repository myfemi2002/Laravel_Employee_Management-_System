@extends('admin.admin_master')
@section('title', 'Admin Change Staff Password')
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
    <div class="col-md-10 mx-auto">
        <div class="card">

            <div class="card-body">
                <form id="myForm" class="form" method="POST" action="{{ route('adminstaffpassword.update') }}">
                    @csrf
                    <input type="hidden" name="id" value="{{ $editData->id }}">
                    <div class="row">

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Staff Name</label>
                                <input class="form-control" value="{{ $editData->name }}" type="text" readonly>
                                <small class="form-control-feedback">
                                @error('newpassword')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Staff Email</label>
                                <input class="form-control" value="{{ $editData->email }}" type="text" readonly>
                                <small class="form-control-feedback">
                                @error('newpassword')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label">Staff Phone</label>
                                <input class="form-control" value="{{ $editData->phone }}" type="text" readonly>
                                <small class="form-control-feedback">
                                @error('newpassword')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Change Password</label>
                                <input class="form-control"  name="newpassword" id="newpassword" type="text" required>
                                <small class="form-control-feedback">
                                @error('newpassword')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Confirm Password</label>
                                <input class="form-control"  name="confirm_password" id="confirm_password"  type="text" required>
                                <small class="form-control-feedback">
                                @error('confirm_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
