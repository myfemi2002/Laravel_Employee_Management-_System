@extends('admin.admin_master')
@section('title', 'Add Goal Tracking')
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
                <form id="myForm" class="form" method="POST" action="{{ route('goaltracking.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                
                                <label class="col-form-label">Goal Type Name</label>
                                <select name="goal_type_id" class="select">
                                    <option value="" selected="" disabled="">-- Select --</option>
                                    @foreach($goalType as $items)
                                    <option value="{{ $items->id }}">{{ $items->goal_name }}</option>
                                    @endforeach
                                </select>
                                <small class="form-control-feedback">
                                @error('goal_type_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Staff Name</label>                                
                                <select name="user_id" class="select">
                                    <option value="" selected="" disabled="">-- Select --</option>
                                    @foreach($activeStaff as $items)
                                    <option value="{{ $items->id }}">{{ $items->name }}</option>
                                    @endforeach
                                </select>
                                <small class="form-control-feedback">
                                @error('staff name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Goal Type Subject</label>
                                <input class="form-control" type="text" name="subject" required>
                                <small class="form-control-feedback">
                                @error('subject')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Target Achievement</label>
                                <input class="form-control" type="text" name="target_achievement" required>
                                <small class="form-control-feedback">
                                @error('target_achievement')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Start Date <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" name="start_date" type="text" >
                                    <small class="form-control-feedback">
                                    @error('start_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </small>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">End Date <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                    <input class="form-control datetimepicker" name="end_date" type="text" >
                                    <small class="form-control-feedback">
                                    @error('end_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-form-label">Status</label>
                                <select class="select" name="status" required>
                                    <option value="" selected="" disabled="">-- Select --</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <small class="form-control-feedback">
                                @error('progress')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                            </div>
                        </div>

                        <div class="col-sm-6 mb-3 mx-auto">
                            <div class="form-group">
                                <label for="customRange">Progress</label>
                                <input type="range" class="form-control-range form-range" name="progress" id="customRange">
                                <small class="form-control-feedback">
                                @error('progress')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </small>
                                <div class="mt-2" id="result">Progress Value: <b></b></div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" rows="4" name="description" ></textarea>
                                <small class="form-control-feedback">
                                @error('description')
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
