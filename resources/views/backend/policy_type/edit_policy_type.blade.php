@extends('admin.admin_master')
@section('title', 'Edit Policy Type')
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
    <div class="col-md-7">
        <div class="card">

            <div class="card-body">
                <form id="myForm" class="form" method="POST" action="{{ route('policytype.update',$editData->id) }}" enctype="multipart/form-data" >@csrf
                    <input type="hidden" name="old_image" value="{{ $editData->policy_pdf }}">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="col-form-label">Policy Type Name</label>
                                <input class="form-control" name="policy_name" value="{{ $editData->policy_name }}" type="text" required>
                                <small class="form-control-feedback">
                                @error('policy_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" rows="4" required>{{ $editData->description }}</textarea>
                                <small class="form-control-feedback">
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="form-group">
                            <label class="col-form-label">Upload Pdf<span class="text-danger">*</span></label>
                            <input type="file" name="policy_pdf" class="form-control"  id="image"   />
                            <small class="form-control-feedback">
                            @error('policy_pdf')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </small>
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
