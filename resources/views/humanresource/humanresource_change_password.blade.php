@extends('humanresource.humanresource_master')
@section('title', 'Change Password')
@section('humanresource')


<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <h3 class="page-title">@yield('title')</h3>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('human-resource.dashobard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">@yield('title')</li>
            </ul>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-7 mx-auto">
        <div class="card">

            <div class="card-body">
                <form method="post" action="{{ route('human-resource.update.password') }}">@csrf
                    @csrf
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Old Password</label>
                                <input type="password" name="old_password" class="form-control"  id="current_password" placeholder="Old Password" required/>
                                <small class="form-control-feedback">
                                @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">New Password</label>
                                <input type="password" name="new_password" class="form-control"  id="new_password"   placeholder="New Password" required/>
                                <small class="form-control-feedback">
                                    @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </small>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Confirm New Password</label>
                                <input type="password" name="new_password_confirmation" class="form-control" id="new_password_confirmation"   placeholder="Confirm New Password" required/>
                                    <small class="form-control-feedback">
                                    @error('new_password_confirmation')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </small>
                            </div>
                        </div>

                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-danger submit-btn">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
