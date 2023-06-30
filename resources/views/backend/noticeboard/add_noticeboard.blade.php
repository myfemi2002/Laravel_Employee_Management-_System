@extends('admin.admin_master')
@section('title', 'Add Notice')
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
    <div class="col-md-9 mx-auto">
        <div class="card">

            <div class="card-body">
                <form id="myForm" class="form" method="POST" action="{{ route('noticeboard.store') }}">
                    @csrf
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Date</label>
                                <input class="form-control" type="text" name="date" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}" readonly>
                                <small class="form-control-feedback">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-10">
                            <div class="form-group">
                                <label class="col-form-label">Message</label>
                                <textarea class="form-control" rows="4" name="post_notice" required></textarea>
                                <small class="form-control-feedback">
                                @error('post_notice')
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
