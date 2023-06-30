@extends('admin.admin_master')
@section('title', 'Edit Designations')
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
                <form id="myForm" class="form" method="POST" action="{{ route('assigndesignations.update',$editData->id) }}">
                    @csrf
                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Staff Name</label>
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
                                <label class="col-form-label">Designations Name</label>
                                <select name="designations" class="select">
                                    <option value="" selected="" disabled="">-- Select --</option>
                                    @foreach($allData as $items)
                                    <option value="{{ $items->designations }}" {{ $items->designations == $editData->designations ? 'selected' : '' }} >{{ $items->designations }}</option>
                                    @endforeach
                                </select>
                                <small class="form-control-feedback">
                                @error('designations')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                    </div>
                    <div class="submit-section">
                        <button type="submit" class="btn btn-primary submit-btn">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
